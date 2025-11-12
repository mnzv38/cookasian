<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\FavorisModel;
use Cookasian\Models\UsersModel;

class FavorisController extends Controller
{
    public function ajouter(int $id): void
    {
        $this->requireLogin();

        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        $users = new UsersModel();
        $u = $users->trouverParEmail($userSession['email']);
        if (!$u || empty($u['id'])) {
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

        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        $users = new UsersModel();
        $u = $users->trouverParEmail($userSession['email']);
        if (!$u || empty($u['id'])) {
            $this->redirect('/connexion');
            return;
        }

        $favoris = new FavorisModel();
        $favoris->supprimer((int)$u['id'], (int)$id);

        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }
}
?>
