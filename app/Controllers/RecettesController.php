<?php
namespace Cookasian\Controllers;

use Cookasian\Models\RecettesModel;
use Cookasian\Controller; // On hérite de la classe mère Controller

class RecettesController extends Controller
{
    private RecettesModel $recetteModel;

    public function __construct()
    {
        $this->recetteModel = new RecettesModel();
    }

    /**
     * 🥢 Page liste des recettes
     */
    public function index(): void
    {
        // 🔹 Récupère le paramètre de tri dans l’URL (par défaut : tri alphabétique par pays)
        $tri = $_GET['tri'] ?? 'pays';

        // 🔹 Récupération de toutes les recettes selon le tri choisi
        $recettes = $this->recetteModel->getAll($tri);

        // 🔹 Données à transmettre à la vue
        $data = [
            'title' => "Toutes les recettes - Cookasian",
            'pageActive' => 'recettes',
            'recettes' => $recettes
        ];

        // 🔹 Affichage via la méthode render()
        $this->render('recettes/index', $data);
    }

    /**
     * 🍜 Page détail d’une recette individuelle
     */
    public function show(string $slug): void
    {
        // 🔹 Récupération de la recette correspondante
        $recette = $this->recetteModel->getBySlug($slug);

        if (!$recette) {
            http_response_code(404);
            $this->render('erreurs/404', [
                'title' => "Page non trouvée - Cookasian"
            ]);
            return;
        }

        // 🔹 Données à transmettre à la vue
        $data = [
            'title' => $recette['titre'] . " - Cookasian",
            'pageActive' => 'recettes',
            'recette' => $recette
        ];

        // 🔹 Affichage via la méthode render()
        $this->render('recettes/show', $data);
    }
}
?>
