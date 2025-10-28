<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\RecettesModel;

/**
 * Contrôleur de la page d'accueil Cookasian
 * Affiche les recettes populaires et le texte d'introduction.
 */
class AccueilController extends Controller
{
    public function index(): void
    {
        $pageTitle = 'Accueil - COOKASIAN | Blog de recettes asiatiques';
        $pageDescription = 'Découvrez les meilleures recettes de cuisine asiatique : ramen, sushi, pad thaï et bien plus encore.';

        // Le modèle gère sa propre connexion à la base
        $model = new RecettesModel();
        $recettesPopulaires = $model->getRecettesPopulaires(3);

        // Envoi des données à la vue
        $this->render('accueil/accueil', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'recettesPopulaires' => $recettesPopulaires
        ]);
    }
}
?>
