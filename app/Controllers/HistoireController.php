<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;

class HistoireController extends Controller
{
    public function index(): void
    {
        // 🔥 Titre propre (le header ajoutera automatiquement " - Cookasian")
        $pageTitle = 'Notre histoire';

        // Meta description SEO
        $pageDescription = 'L’aventure humaine derrière Cookasian : partage, simplicité et authenticité.';

        $pageActive = 'histoire';

        $this->render('notre-histoire/notre-histoire', [
            'title' => $pageTitle,
            'metaDescription' => $pageDescription,
            'pageActive' => $pageActive
        ]);
    }
}
?>
