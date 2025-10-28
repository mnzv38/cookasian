<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;

class HistoireController extends Controller
{
    public function index(): void
    {
        $pageTitle = 'Notre histoire — Cookasian';
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
