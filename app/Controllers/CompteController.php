<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Models\FavorisModel;
use Cookasian\Database;

class CompteController extends Controller
{
    /** ✅ Espace personnel complet */
    public function index(): void
    {
        $this->requireLogin();

        $pageTitle = 'Mon espace personnel — Cookasian';
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
}
?>
