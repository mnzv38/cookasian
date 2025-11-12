<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\FavorisModel;
use Cookasian\Models\UsersModel;
use Cookasian\Database;

class FavorisController extends Controller
{
    /** ✅ Ajoute une recette aux favoris */
    public function ajouter(int $id): void
    {
        // Vérifie la connexion (sécurité minimale)
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        // Connexion à la BDD
        $pdo = Database::pdo();
        $users = new UsersModel($pdo);
        $u = $users->findByEmail($userSession['email']);

        if (!$u || empty($u['id'])) {
            $this->redirect('/connexion');
            return;
        }

        $favoris = new FavorisModel();
        $favoris->ajouter((int)$u['id'], (int)$id);

        // ✅ Message de confirmation temporaire
        $_SESSION['flash_message'] = 'Recette ajoutée à tes favoris 🍜';

        // Retour sur la page précédente ou espace personnel
        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }

    /** ✅ Supprime une recette des favoris */
    public function supprimer(int $id): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        // Connexion à la BDD
        $pdo = Database::pdo();
        $users = new UsersModel($pdo);
        $u = $users->findByEmail($userSession['email']);

        if (!$u || empty($u['id'])) {
            $this->redirect('/connexion');
            return;
        }

        $favoris = new FavorisModel();
        $favoris->supprimer((int)$u['id'], (int)$id);

        // ✅ Message de suppression temporaire
        $_SESSION['flash_message'] = 'Recette retirée de tes favoris 💨';

        // Retour sur la page précédente ou espace personnel
        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }
}
?>
