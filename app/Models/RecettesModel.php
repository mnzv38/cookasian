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
        return $recette ?: null;
    }
}
?>
