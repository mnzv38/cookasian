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
     * Récupère toutes les recettes selon le type de tri choisi
     */
    public function getAll(string $tri = 'pays'): array
    {
        // Je garde ici les tris autorisés pour éviter les erreurs côté SQL
        $tris = [
            'pays' => 'pays_origine ASC, titre ASC',
            'titre' => 'titre ASC',
            'difficulte' => 'difficulte ASC',
            'preparation' => 'temps_preparation ASC',
            'cuisson' => 'temps_cuisson ASC',
            'recentes' => 'date_creation DESC'
        ];

        $ordre = $tris[$tri] ?? $tris['pays'];

        $sql = "SELECT * FROM recettes ORDER BY $ordre";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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
     * Récupère les recettes affichées en page d'accueil
     */
    public function getRecettesPopulaires(int $limite = 3): array
    {
        $sql = "SELECT id, titre, description, slug, image_url
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
