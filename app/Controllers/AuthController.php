<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;

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

            $usersModel = new UsersModel();
            $utilisateur = $usersModel->trouverParEmail($email);

            if ($utilisateur && password_verify($motDePasse, $utilisateur['mot_de_passe'])) {
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateur['id'],
                    'email' => $utilisateur['email']
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

            if ($email && $motDePasse) {
                $usersModel = new UsersModel();
                $existant = $usersModel->trouverParEmail($email);

                if ($existant) {
                    $erreur = "Un compte existe déjà avec cet email.";
                } else {
                    $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
                    $usersModel->ajouter($email, $hash);

                    $_SESSION['utilisateur'] = [
                        'email' => $email
                    ];
                    $this->redirect('/');
                    return;
                }
            } else {
                $erreur = "Tous les champs sont requis.";
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
