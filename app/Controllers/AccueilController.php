<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;

class AccueilController extends Controller
{
    public function index(): void
    {
        $pageTitle = 'Accueil - COOKASIAN | Blog de recettes asiatiques';
        $pageDescription = 'Découvrez les meilleures recettes de cuisine asiatique : ramen, sushi, pad thaï et bien plus encore.';

        $this->render('accueil/accueil', [
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription
        ]);
    }
}
?>
