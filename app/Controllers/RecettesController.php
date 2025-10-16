<?php
namespace Cookasian\Controllers;

use Cookasian\Models\RecettesModel;

class RecettesController
{
    private RecettesModel $recetteModel;

    public function __construct()
    {
        $this->recetteModel = new RecettesModel();
    }

    public function index(): void
    {
        $recettes = $this->recetteModel->getAll();
        require __DIR__ . '/../Views/recettes/index.php'; // ← corrige ici (un seul ../)
    }

    public function show(string $slug): void
    {
        $recette = $this->recetteModel->getBySlug($slug);

        if (!$recette) {
            http_response_code(404);
            require __DIR__ . '/../Views/erreurs/404.php'; // idem
            return;
        }

        require __DIR__ . '/../Views/recettes/show.php';
    }
}
?>
