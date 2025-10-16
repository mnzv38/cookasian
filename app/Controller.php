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
        // Extraction des données pour les rendre accessibles dans la vue
        extract($data);

        // Construction des chemins absolus vers le dossier Views
        $baseDir = __DIR__ . '/Views/';
        $viewPath = $baseDir . $view . '.php';
        $headerPath = $baseDir . 'layout/header.php';
        $footerPath = $baseDir . 'layout/footer.php';

        // Vérifie que la vue existe avant de la charger
        if (!file_exists($viewPath)) {
            echo "<h1>Erreur 404 — Vue introuvable</h1>";
            echo "<p>Chemin recherché : <code>{$viewPath}</code></p>";
            return;
        }

        // Chargement du header (si présent)
        if (file_exists($headerPath)) {
            require $headerPath;
        }

        // Chargement de la vue principale
        require $viewPath;

        // Chargement du footer (si présent)
        if (file_exists($footerPath)) {
            require $footerPath;
        }
    }

    /**
     * Redirige vers une URL
     * 
     * @param string $url URL de redirection
     * @return void
     */
    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
?>
