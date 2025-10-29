<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\FavorisModel;
use Cookasian\Models\UsersModel;
use PDO;

class FavorisController extends Controller
{
    public function ajouter(int $id): void
    {
        $this->requireLogin();

        $user = $_SESSION['utilisateur'] ?? null;
        if (!$user || empty($user['email'])) {
            $this->redirect('/connexion');
            return;
        }

        // Récupère l'ID utilisateur via son email
        $users = new UsersModel();
        $u = $users->trouverParEmail($user['email']);
        if (!$u) {
            $this->redirect('/connexion');
            return;
        }

        $favoris = new FavorisModel();
        $favoris->ajouter((int)$u['id'], (int)$id);

        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }

    public function supprimer(int $id): void
    {
        $this->requireLogin();

        $user = $_SESSION['utilisateur'] ?? null;
        if (!$user || empty($user['email'])) {
            $this->redirect('/connexion');
            return;
        }

        $users = new UsersModel();
        $u = $users->trouverParEmail($user['email']);
        if (!$u) {
            $this->redirect('/connexion');
            return;
        }

        $favoris = new FavorisModel();
        $favoris->supprimer((int)$u['id'], (int)$id);

        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }
}
?>
