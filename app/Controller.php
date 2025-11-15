<?php
/**
 * Contrôleur abstrait COOKASIAN
 * Fournit les méthodes communes à tous les contrôleurs
 */

namespace Cookasian;

abstract class Controller
{
    /**
     * Charge une vue avec des données
     * 
     * @param string $view Chemin de la vue (ex: accueil/accueil)
     * @param array $data Données à passer à la vue
     * @return void
     */
    protected function render(string $view, array $data = []): void
    {
        // Les données deviennent accessibles dans la vue
        extract($data);

        // Chemins vers les fichiers du dossier Views
        $baseDir    = __DIR__ . '/Views/';
        $viewPath   = $baseDir . $view . '.php';
        $headerPath = $baseDir . 'layout/header.php';
        $footerPath = $baseDir . 'layout/footer.php';

        // Si la vue n'existe pas → message simple
        if (!file_exists($viewPath)) {
            echo "<h1>Erreur 404 — Vue introuvable</h1>";
            echo "<p>Chemin recherché : <code>{$viewPath}</code></p>";
            return;
        }

        // Affiche le header si dispo
        if (file_exists($headerPath)) {
            require $headerPath;
        }

        // Ouverture propre du contenu principal
        echo '<main class="contenu-principal">';

        // Affiche la vue
        require $viewPath;

        // Fermeture du contenu principal
        echo '</main>';

        // Affiche le footer si dispo
        if (file_exists($footerPath)) {
            require $footerPath;
        }
    }

    /**
     * Redirige vers une URL
     */
    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Vérifie qu’un utilisateur est connecté
     */
    protected function requireLogin(): void
    {
        if (empty($_SESSION['utilisateur']['email'])) {
            $this->redirect('/connexion');
        }
    }
}
?>
