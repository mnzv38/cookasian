<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Database;

class AuthController extends Controller
{
    public function connexion(): void
    {
        $pageTitle = 'Connexion — Cookasian';
        $pageDescription = 'Connecte-toi à ton espace personnel pour accéder à tes recettes préférées.';
        $pageActive = 'connexion';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';

            // ✅ Connexion à la base
            $db = new Database();
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);

            // ⚠️ corriger le nom de la méthode si besoin
            $utilisateur = $usersModel->findByEmail($email);

            if ($utilisateur && password_verify($motDePasse, $utilisateur['password_hash'])) {
            $_SESSION['utilisateur'] = [
                'id' => $utilisateur['id'],
                'email' => $utilisateur['email'],
                'name' => $utilisateur['name']
            ];
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

    public function inscription(): void
    {
        $pageTitle = 'Inscription — Cookasian';
        $pageDescription = 'Crée ton compte pour enregistrer tes recettes préférées.';
        $pageActive = 'connexion';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $motDePasse = $_POST['mot_de_passe'] ?? '';

            // ✅ Connexion à la base
            $db = new Database();
            $pdo = Database::pdo();
            $usersModel = new UsersModel($pdo);

            $existant = $usersModel->findByEmail($email);

            if ($existant) {
                $erreur = "Un compte existe déjà avec cet email.";
            } else {
                $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
                $usersModel->create('Nom par défaut', $email, $hash);

                $_SESSION['utilisateur'] = [
                    'email' => $email
                ];
                $this->redirect('/');
                return;
            }
        }

        $this->render('auth/inscription', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive,
            'erreur' => $erreur ?? null
        ]);
    }

    public function deconnexion(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}
?>
