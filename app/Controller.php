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
     * @param string $view Chemin de la vue (ex: accueil/index)
     * @param array $data Données à passer à la vue
     * @return void
     */
    protected function render(string $view, array $data = []): void
    {
        // Extraction des données pour les rendre accessibles dans la vue
        extract($data);
        
        // Chargement du header
        require_once __DIR__ . '/../views/layout/header.php';
        
        // Chargement de la vue principale
        require_once __DIR__ . '/../views/' . $view . '.php';
        
        // Chargement du footer
        require_once __DIR__ . '/../views/layout/footer.php';
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