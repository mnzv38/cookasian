<?php
/**
 * Contrôleur de la page d'accueil COOKASIAN
 */

use Cookasian\Controller;

class AccueilController extends Controller
{
    /**
     * Affiche la page d'accueil
     * 
     * @return void
     */
    public function index(): void
    {
        // Données SEO
        $pageTitle = 'Accueil - COOKASIAN | Blog de recettes asiatiques';
        $pageDescription = 'Découvrez les meilleures recettes de cuisine asiatique : ramen, sushi, pad thaï et bien plus encore.';
        
        // Rendu de la vue
        $this->render('accueil/index', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription
        ]);
    }
}
?>