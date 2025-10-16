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

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM recettes ORDER BY date_creation DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM recettes WHERE slug = :slug");
        $stmt->execute(['slug' => $slug]);
        $recette = $stmt->fetch(PDO::FETCH_ASSOC);
        return $recette ?: null;
    }
}
?>
