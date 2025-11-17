<?php
namespace Cookasian\Controllers;

use Cookasian\Models\RecettesModel;
use Cookasian\Controller;

class RecettesController extends Controller
{
    private RecettesModel $recetteModel;

    public function __construct()
    {
        // Je prépare mon modèle ici pour pouvoir l'utiliser dans toute la classe
        $this->recetteModel = new RecettesModel();
    }

    /** Page liste des recettes */
    public function index(): void
    {
        // Je récupère le tri si l'utilisateur en a mis un, sinon je mets "pays" par défaut
        $tri = $_GET['tri'] ?? 'pays';

        // Je récupère toutes les recettes via mon modèle
        $recettes = $this->recetteModel->getAll($tri);

        // Je prépare mes données pour la vue
        $data = [
            'title' => "Toutes les recettes",
            'pageActive' => 'recettes',
            'recettes' => $recettes
        ];

        // J'affiche la vue correspondante
        $this->render('recettes/index', $data);
    }

    /** Page détail d’une recette individuelle */
    public function show(string $slug): void
    {
        // Je cherche la recette qui correspond au slug
        $recette = $this->recetteModel->getBySlug($slug);

        // Si aucune recette n'est trouvée, j'affiche une 404
        if (!$recette) {
            http_response_code(404);

            $this->render('erreurs/404', [
                'title' => "Page non trouvée"
            ]);
            return;
        }

        // Si la recette existe, je prépare les infos pour la vue
        $data = [
            'title' => $recette['titre'],
            'pageActive' => 'recettes',
            'recette' => $recette
        ];

        // J'affiche la page détail de la recette
        $this->render('recettes/show', $data);
    }
}
?>
