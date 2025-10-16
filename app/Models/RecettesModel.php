<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

class RecettesModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }

    /**
     * Récupère toutes les recettes.
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM recettes ORDER BY date_creation DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une recette spécifique par son slug.
     */
    public function getBySlug(string $slug): ?array
    {
        $sql = "SELECT * FROM recettes WHERE slug = :slug";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['slug' => $slug]);
        $recette = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$recette) {
            return null;
        }

        // Récupère les ingrédients associés
        $sqlIng = "SELECT nom, quantite, ordre FROM ingredients WHERE recette_id = :id ORDER BY ordre ASC";
        $stmtIng = $this->pdo->prepare($sqlIng);
        $stmtIng->execute(['id' => $recette['id']]);
        $recette['ingredients'] = $stmtIng->fetchAll(PDO::FETCH_ASSOC);

        // Récupère les étapes associées
        $sqlEtapes = "SELECT numero, description FROM etapes WHERE recette_id = :id ORDER BY numero ASC";
        $stmtEtapes = $this->pdo->prepare($sqlEtapes);
        $stmtEtapes->execute(['id' => $recette['id']]);
        $recette['etapes'] = $stmtEtapes->fetchAll(PDO::FETCH_ASSOC);

        return $recette;
    }
}
?>
