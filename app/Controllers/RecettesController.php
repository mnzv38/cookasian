<?php
namespace Cookasian\Controllers;

use Cookasian\Models\RecettesModel;
use Cookasian\Controller;

class RecettesController extends Controller
{
    private RecettesModel $recetteModel;

    public function __construct()
    {
        $this->recetteModel = new RecettesModel();
    }

    /** Page liste des recettes */
    public function index(): void
    {
        $tri = $_GET['tri'] ?? 'pays';
        $recettes = $this->recetteModel->getAll($tri);

        $data = [
            'title' => "Toutes les recettes - Cookasian",
            'pageActive' => 'recettes',
            'recettes' => $recettes
        ];

        $this->render('recettes/index', $data);
    }

    /** Page détail d’une recette individuelle */
    public function show(string $slug): void
    {
        $recette = $this->recetteModel->getBySlug($slug);

        if (!$recette) {
            http_response_code(404);
            $this->render('erreurs/404', ['title' => "Page non trouvée - Cookasian"]);
            return;
        }

        $data = [
            'title' => $recette['titre'] . " - Cookasian",
            'pageActive' => 'recettes',
            'recette' => $recette
        ];

        $this->render('recettes/show', $data);
    }
}
?>
