<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Models\FavorisModel;
use Cookasian\Database;

class CompteController extends Controller
{
    /** Page principale du compte */
    public function index(): void
    {
        $this->requireLogin();

        // 🔥 Titre propre (le header ajoutera automatiquement " - Cookasian")
        $pageTitle = 'Mon espace personnel';

        $pageDescription = 'Gère ton profil et retrouve tes recettes favorites.';
        $pageActive = 'compte';

        $email = $_SESSION['utilisateur']['email'] ?? null;
        $utilisateur = null;
        $favoris = [];

        if ($email) {
            $pdo = Database::pdo();
            $users = new UsersModel($pdo);
            $utilisateur = $users->findByEmail($email);

            if (!empty($utilisateur['id'])) {
                $favModel = new FavorisModel();
                $favoris = $favModel->listerPourUtilisateur((int)$utilisateur['id']);
            }
        }

        $this->render('compte/mon-compte', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive,
            'utilisateur' => $utilisateur,
            'favoris' => $favoris
        ]);
    }

    /** ➕ Modifier les infos du compte */
    public function modifier(): void
    {
        $this->requireLogin();

        $pdo = Database::pdo();
        $users = new UsersModel($pdo);

        $email = $_SESSION['utilisateur']['email'];
        $utilisateur = $users->findByEmail($email);

        $erreurs = [];
        $success = null;

        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = trim($_POST['name'] ?? '');
            $newEmail = trim($_POST['email'] ?? '');

            if ($nom === '') {
                $erreurs['name'] = 'Le nom est obligatoire.';
            }

            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                $erreurs['email'] = 'Email invalide.';
            }

            if (empty($erreurs)) {
                $users->updateUser((int)$utilisateur['id'], [
                    'name' => $nom,
                    'email' => $newEmail
                ]);

                $_SESSION['utilisateur']['email'] = $newEmail;

                $success = "Informations mises à jour avec succès.";
                $utilisateur = $users->findByEmail($newEmail);
            }
        }

        $this->render('compte/modifier-compte', [
            // 🔥 Titre propre sans Cookasian
            'title' => 'Modifier mon compte',
            'metaDescription' => 'Modification de ton profil Cookasian.',
            'pageActive' => 'compte',
            'utilisateur' => $utilisateur,
            'erreurs' => $erreurs,
            'success' => $success
        ]);
    }
}
?>
