<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\RecettesModel;

/**
 * Contrôleur de ma page d'accueil.
 * C’est ici que je prépare les données que je veux afficher sur l'écran.
 */
class AccueilController extends Controller
{
    public function index(): void
    {
        // Je prépare mon titre pour la balise <title>
        $pageTitle = 'Accueil';

        // Ma petite description pour le SEO
        $pageDescription = 'Découvrez les meilleures recettes de cuisine asiatique : ramen, sushi, pad thaï et bien plus encore.';

        // J'appelle mon modèle pour récupérer les recettes populaires
        $model = new RecettesModel();
        $recettesPopulaires = $model->getRecettesPopulaires(3);

        // J'envoie toutes mes données à la vue correspondante
        $this->render('accueil/accueil', [
            'pageTitle'          => $pageTitle,
            'pageDescription'    => $pageDescription,
            'recettesPopulaires' => $recettesPopulaires
        ]);
    }
}
?>
