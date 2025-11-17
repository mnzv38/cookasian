<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;

class HistoireController extends Controller
{
    public function index(): void
    {
        // Ici j'affiche simplement la page "Notre histoire" équivalent de “à propos”
        
        // Titre pour la balise <title>
        $pageTitle = 'Notre histoire';

        // Ma petite description pour le SEO
        $pageDescription = 'L’aventure humaine derrière Cookasian : partage, simplicité et authenticité.';

        // Pour savoir quelle page est active dans la navigation
        $pageActive = 'histoire';

        // J'envoie toutes mes infos à la vue correspondante
        $this->render('notre-histoire/notre-histoire', [
            'title'            => $pageTitle,
            'metaDescription'  => $pageDescription,
            'pageActive'       => $pageActive
        ]);
    }
}
?>
