<?php
namespace Cookasian\Controllers;

use Cookasian\Controller;
use Cookasian\Models\RecettesModel;

class RecettesController extends Controller
{
    private RecettesModel $model;

    public function __construct()
    {
        $this->model = new RecettesModel();
    }

    public function index(): void
    {
        $recettes = $this->model->getAll();

        $this->render('recettes/index', [
            'pageTitle' => 'Toutes les recettes',
            'recettes' => $recettes
        ]);
    }

    public function show(string $slug): void
    {
        $recette = $this->model->getBySlug($slug);

        if (!$recette) {
            http_response_code(404);
            $this->render('erreurs/404');
            return;
        }

        $this->render('recettes/show', [
            'pageTitle' => $recette['titre'],
            'recette' => $recette
        ]);
    }
}
?>
