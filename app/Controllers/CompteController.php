<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\UsersModel;
use Cookasian\Models\FavorisModel;

class CompteController extends Controller
{
    public function index(): void
    {
        $this->requireLogin();

        $pageTitle = 'Mon compte — Cookasian';
        $pageDescription = 'Gère tes informations et retrouve tes actions récentes.';
        $pageActive = 'connexion';

        $email = $_SESSION['utilisateur']['email'] ?? null;
        $utilisateur = null;
        $favoris = [];

        if ($email) {
            $users = new UsersModel();
            $users->trouverParEmail($email);

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
