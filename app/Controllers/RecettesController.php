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

        // 🔥 Titre propre (le header ajoutera " - Cookasian")
        $data = [
            'title' => "Toutes les recettes",
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

            // 🔥 Titre propre sans suffixe
            $this->render('erreurs/404', [
                'title' => "Page non trouvée"
            ]);
            return;
        }

        // 🔥 Titre propre basé sur le nom de la recette
        $data = [
            'title' => $recette['titre'],
            'pageActive' => 'recettes',
            'recette' => $recette
        ];

        $this->render('recettes/show', $data);
    }
}
?>
