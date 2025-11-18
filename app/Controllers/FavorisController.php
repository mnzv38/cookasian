<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\FavorisModel;
use Cookasian\Models\UsersModel;
use Cookasian\Database;

class FavorisController extends Controller
{
    /** Ajoute une recette aux favoris */
    public function ajouter(int $id): void
    {
        // Je vérifie que la session est bien démarrée
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Je vérifie que l'utilisateur est bien connecté
        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        // Je récupère l'utilisateur complet via son email
        $pdo = Database::pdo();
        $users = new UsersModel($pdo);
        $u = $users->findByEmail($userSession['email']);

        // Par sécurité, je revérifie que j'ai bien un utilisateur valide
        if (!$u || empty($u['id'])) {
            $this->redirect('/connexion');
            return;
        }

        // J'ajoute la recette dans les favoris de cet utilisateur
        $favoris = new FavorisModel();
        $favoris->ajouter((int)$u['id'], (int)$id);

        // Petit message positif pour l'utilisateur
        $_SESSION['flash_message'] = 'Recette ajoutée à tes favoris 🍜';

        // Je renvoie vers la page précédente (ou mon compte si besoin)
        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }

    /** Supprime une recette des favoris */
    public function supprimer(int $id): void
    {
        // Je vérifie la session comme dans l'autre méthode
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Je vérifie que l'utilisateur est bien connecté
        $userSession = $_SESSION['utilisateur'] ?? null;
        if (!$userSession || empty($userSession['email'])) {
            $this->redirect('/connexion');
            return;
        }

        // Je récupère l'utilisateur complet
        $pdo = Database::pdo();
        $users = new UsersModel($pdo);
        $u = $users->findByEmail($userSession['email']);

        if (!$u || empty($u['id'])) {
            $this->redirect('/connexion');
            return;
        }

        // Je supprime la recette de ses favoris
        $favoris = new FavorisModel();
        $favoris->supprimer((int)$u['id'], (int)$id);

        // Message temporaire pour informer l'utilisateur
        $_SESSION['flash_message'] = 'Recette retirée de tes favoris 🗑️';

        // Je renvoie vers la page précédente
        $this->redirect($_SERVER['HTTP_REFERER'] ?? '/mon-compte');
    }
}
?>
