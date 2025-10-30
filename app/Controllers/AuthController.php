<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Database;

class AuthController extends Controller
{
    /**
     * Connexion utilisateur
     */
    public function connexion(): void
    {
        $pageTitle = 'Connexion — Cookasian';
        $pageDescription = 'Connecte-toi à ton espace personnel pour accéder à tes recettes préférées.';
        $pageActive = 'connexion';

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';
            $remember = !empty($_POST['se_souvenir']);

            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);
            $utilisateur = $usersModel->findByEmail($email);

            if ($utilisateur && password_verify($motDePasse, $utilisateur['password_hash'])) {
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateur['id'],
                    'email' => $utilisateur['email'],
                    'name' => $utilisateur['name']
                ];

                // ✅ Option "Se souvenir de moi"
                if ($remember) {
                    $selector = bin2hex(random_bytes(8));
                    $validator = bin2hex(random_bytes(32));
                    $hashedValidator = hash('sha256', $validator);
                    $dbToken = $selector . ':' . $hashedValidator;

                    $usersModel->saveRememberToken((int)$utilisateur['id'], $dbToken);

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
                    $usersModel->saveRememberToken((int)$utilisateur['id'], null);
                    if (isset($_COOKIE['rememberme'])) {
                        setcookie('rememberme', '', time() - 3600, '/');
                    }
                }

                $this->redirect('/');
                return;
            }

            $erreur = "Email ou mot de passe incorrect.";
        }

        $this->render('auth/connexion', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive,
            'erreur' => $erreur ?? null
        ]);
    }

    /**
     * Inscription utilisateur
     */
    public function inscription(): void
    {
        $pageTitle = 'Inscription — Cookasian';
        $pageDescription = 'Crée ton compte pour enregistrer tes recettes préférées.';
        $pageActive = 'connexion';

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';
            $confirmation = $_POST['confirmation'] ?? '';
            $acceptPolicy = !empty($_POST['accept_policy']);

            $erreurs = [];

            if ($name === '') {
                $erreurs[] = "Le nom est obligatoire.";
            }

            // 🔒 Vérifications de sécurité du mot de passe
            $ok = true;
            if (strlen($motDePasse) < 8) $ok = false;
            if (!preg_match('/[A-Z]/', $motDePasse)) $ok = false;
            if (!preg_match('/\d/', $motDePasse)) $ok = false;
            if (!preg_match('/[\W_]/', $motDePasse)) $ok = false;
            if (!$ok) {
                $erreurs[] = "Mot de passe : 8 caractères min, 1 majuscule, 1 chiffre et 1 caractère spécial.";
            }

            if ($motDePasse !== $confirmation) {
                $erreurs[] = "La confirmation du mot de passe ne correspond pas.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs[] = "L'adresse email est invalide.";
            }

            if (!$acceptPolicy) {
                $erreurs[] = "Vous devez accepter la politique de confidentialité.";
            }

            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);

            if ($usersModel->findByEmail($email)) {
                $erreurs[] = "Un compte existe déjà avec cet email.";
            }

            if (empty($erreurs)) {
                $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

                // 🔹 Crée l’utilisateur avec son vrai nom
                $userId = $usersModel->create($name, $email, $hash);

                // ✅ Connexion automatique
                $_SESSION['utilisateur'] = [
                    'id'    => $userId,
                    'email' => $email,
                    'name'  => $name
                ];

                $this->redirect('/');
                return;
            } else {
                $erreur = implode(' ', $erreurs);
            }
        }

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
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!empty($_SESSION['utilisateur']['id'])) {
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);
            $usersModel->saveRememberToken((int)$_SESSION['utilisateur']['id'], null);
        }

        if (isset($_COOKIE['rememberme'])) {
            setcookie('rememberme', '', time() - 3600, '/');
        }

        $_SESSION = [];
        session_destroy();

        $this->redirect('/');
    }
}
?>
