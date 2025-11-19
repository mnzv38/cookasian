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
        // Je vérifie que l'utilisateur est bien connecté
        $this->requireLogin();

        // Titre pour <title>
        $pageTitle = 'Mon espace personnel';

        // Ma petite description pour le SEO
        $pageDescription = 'Gère ton profil et retrouve tes recettes favorites.';
        $pageActive = 'compte';

        // Je récupère l'email stocké en session
        $email = $_SESSION['utilisateur']['email'] ?? null;
        $utilisateur = null;
        $favoris = [];

        if ($email) {
            // Je récupère les infos de l'utilisateur
            $pdo = Database::pdo();
            $users = new UsersModel($pdo);
            $utilisateur = $users->findByEmail($email);

            // Je récupère aussi ses favoris s'il y en a
            if (!empty($utilisateur['id'])) {
                $favModel = new FavorisModel();
                $favoris = $favModel->listerPourUtilisateur((int)$utilisateur['id']);
            }
        }

        // J'envoie toutes les infos à ma vue
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
        // Vérifie que l'utilisateur est connecté
        $this->requireLogin();

        // Je récupère mon modèle utilisateur
        $pdo = Database::pdo();
        $users = new UsersModel($pdo);

        // Je récupère les infos actuelles via l'email en session
        $email = $_SESSION['utilisateur']['email'];
        $utilisateur = $users->findByEmail($email);

        $erreurs = [];
        $success = null;

        // Si le formulaire est envoyé
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Je récupère les champs du formulaire
            $nom = trim($_POST['name'] ?? '');
            $newEmail = trim($_POST['email'] ?? '');

            // Vérifications simples
            if ($nom === '') {
                $erreurs['name'] = 'Le nom est obligatoire.';
            }

            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                $erreurs['email'] = 'Email invalide.';
            }

            // Si pas d’erreurs, je mets à jour les données
            if (empty($erreurs)) {

                // Je mets à jour les infos de l'utilisateur
                $users->updateUser((int)$utilisateur['id'], [
                    'name' => $nom,
                    'email' => $newEmail
                ]);

                // Je mets aussi la session à jour pour rester connecté(e)
                $_SESSION['utilisateur']['email'] = $newEmail;

                // Je mets aussi à jour le nom stocké dans la session sinon le header garde l'ancien
                $_SESSION['utilisateur']['name'] = $nom;

                // Message de confirmation
                $success = "Informations mises à jour avec succès.";

                // Je recharge les infos pour afficher la vue avec les données récentes
                $utilisateur = $users->findByEmail($newEmail);
            }
        }

        // J'envoie les données à la vue "modifier"
        $this->render('compte/modifier-compte', [
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
