<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

/**
 * Modèle RecettesModel
 * Gère toutes les opérations liées aux recettes (lecture, recherche, populaires…)
 */
class RecettesModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }

    /**
     * Récupère toutes les recettes classées par date de création (les plus récentes en premier).
     */
    public function getAll(): array
    {
        $sql = "SELECT * FROM recettes ORDER BY date_creation DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une recette spécifique à partir de son slug.
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

        // Ingrédients associés
        $sqlIng = "SELECT nom, quantite, ordre 
                   FROM ingredients 
                   WHERE recette_id = :id 
                   ORDER BY ordre ASC";
        $stmtIng = $this->pdo->prepare($sqlIng);
        $stmtIng->execute(['id' => $recette['id']]);
        $recette['ingredients'] = $stmtIng->fetchAll(PDO::FETCH_ASSOC);

        // Étapes associées
        $sqlEtapes = "SELECT numero, description 
                      FROM etapes 
                      WHERE recette_id = :id 
                      ORDER BY numero ASC";
        $stmtEtapes = $this->pdo->prepare($sqlEtapes);
        $stmtEtapes->execute(['id' => $recette['id']]);
        $recette['etapes'] = $stmtEtapes->fetchAll(PDO::FETCH_ASSOC);

        return $recette;
    }

    /**
     * Récupère un nombre limité de recettes populaires
     *
     * @param int $limite
     * @return array
     */
    public function getRecettesPopulaires(int $limite = 3): array
    {
        // On sélectionne seulement les colonnes existantes
        $sql = "SELECT id, titre, description, slug
                FROM recettes
                ORDER BY date_creation DESC
                LIMIT :limite";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
