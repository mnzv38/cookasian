<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Database;

class AuthController extends Controller
{
    /**
     * Page de connexion utilisateur
     */
    public function connexion(): void
    {
        // Titre pour <title>
        $pageTitle = 'Connexion';

        // Description SEO
        $pageDescription = 'Connecte-toi à ton espace personnel pour accéder à tes recettes préférées.';
        $pageActive = 'connexion';

        // Je m'assure que la session est bien démarrée
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Si le formulaire a été envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Je récupère les champs du formulaire
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';
            $remember = !empty($_POST['se_souvenir']);

            // Je récupère l'utilisateur associé à l'email
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);
            $utilisateur = $usersModel->findByEmail($email);

            // Vérification du mot de passe
            if ($utilisateur && password_verify($motDePasse, $utilisateur['password_hash'])) {

                // Je stocke les infos utiles dans la session
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateur['id'],
                    'email' => $utilisateur['email'],
                    'name' => $utilisateur['name']
                ];

                // Option "Se souvenir de moi"
                if ($remember) {

                    // Je génère un token simple (selector + validator)
                    $selector = bin2hex(random_bytes(8));
                    $validator = bin2hex(random_bytes(32));
                    $hashedValidator = hash('sha256', $validator);
                    $dbToken = $selector . ':' . $hashedValidator;

                    // J'enregistre le token côté base de données
                    $usersModel->saveRememberToken((int)$utilisateur['id'], $dbToken);

                    // Je crée un cookie pour l'utilisateur
                    $cookieValue = $selector . ':' . $validator;
                    $expires = time() + 60 * 60 * 24 * 30; // 30 jours
                    setcookie(
                        'rememberme',
                        $cookieValue,
                        [
                            'expires'  => $expires,
                            'path'     => '/',
                            'secure'   => isset($_SERVER['HTTPS']),
                            'httponly' => true,
                            'samesite' => 'Lax',
                        ]
                    );
                } else {
                    // Si l'utilisateur n'active pas "se souvenir", je nettoie l'ancien token
                    $usersModel->saveRememberToken((int)$utilisateur['id'], null);
                    if (isset($_COOKIE['rememberme'])) {
                        setcookie('rememberme', '', time() - 3600, '/');
                    }
                }

                // Je redirige vers l'espace personnel
                $this->redirect('/mon-compte');
                return;
            }

            // Si j'arrive ici : email ou mot de passe incorrect
            $erreur = "Email ou mot de passe incorrect.";
        }

        // J'affiche la vue de connexion
        $this->render('auth/connexion', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive,
            'erreur' => $erreur ?? null
        ]);
    }

    /**
     * Page d'inscription utilisateur
     */
    public function inscription(): void
    {
        // Titre pour <title>
        $pageTitle = 'Inscription';

        $pageDescription = 'Crée ton compte pour enregistrer tes recettes préférées.';
        $pageActive = 'connexion';

        // Je démarre la session au cas où
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Si le formulaire est envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Je récupère les champs
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';
            $confirmation = $_POST['confirmation'] ?? '';
            $acceptPolicy = !empty($_POST['accept_policy']);

            $erreurs = [];

            // Vérification simple du nom
            if ($name === '') {
                $erreurs[] = "Le nom est obligatoire.";
            }

            // Vérifications du mot de passe
            $ok = true;
            if (strlen($motDePasse) < 8) $ok = false;
            if (!preg_match('/[A-Z]/', $motDePasse)) $ok = false;
            if (!preg_match('/\d/', $motDePasse)) $ok = false;
            if (!preg_match('/[\W_]/', $motDePasse)) $ok = false;
            if (!$ok) {
                $erreurs[] = "Mot de passe : 8 caractères min, 1 majuscule, 1 chiffre et 1 caractère spécial.";
            }

            // Mot de passe ≠ confirmation
            if ($motDePasse !== $confirmation) {
                $erreurs[] = "La confirmation du mot de passe ne correspond pas.";
            }

            // Vérification email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs[] = "L'adresse email est invalide.";
            }

            // Politique de confidentialité
            if (!$acceptPolicy) {
                $erreurs[] = "Vous devez accepter la politique de confidentialité.";
            }

            // Vérifie si l'email existe déjà
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);

            if ($usersModel->findByEmail($email)) {
                $erreurs[] = "Un compte existe déjà avec cet email.";
            }

            // Si aucune erreur, je crée le compte
            if (empty($erreurs)) {

                $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

                // Création du compte
                $userId = $usersModel->create($name, $email, $hash);

                // Connexion automatique juste après l'inscription
                $_SESSION['utilisateur'] = [
                    'id'    => $userId,
                    'email' => $email,
                    'name'  => $name
                ];

                // Redirection vers l'espace perso
                $this->redirect('/mon-compte');
                return;

            } else {
                // Je rassemble toutes les erreurs dans une seule variable
                $erreur = implode(' ', $erreurs);
            }
        }

        // J'affiche la vue d'inscription
        $this->render('auth/inscription', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive,
            'erreur' => $erreur ?? null
        ]);
    }

    /**
     * Déconnexion utilisateur
     */
    public function deconnexion(): void
    {
        // Je m'assure que la session est lancée
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Si l'utilisateur existe, je supprime son token remember me
        if (!empty($_SESSION['utilisateur']['id'])) {
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);
            $usersModel->saveRememberToken((int)$_SESSION['utilisateur']['id'], null);
        }

        // Je supprime le cookie remember me
        if (isset($_COOKIE['rememberme'])) {
            setcookie('rememberme', '', time() - 3600, '/');
        }

        // Je vide la session et je la détruis
        $_SESSION = [];
        session_destroy();

        // Je redirige vers l'accueil
        $this->redirect('/');
    }
}
?>
