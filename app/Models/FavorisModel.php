<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

class FavorisModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }

    /** Ajoute un favori (idempotent via INSERT IGNORE) */
    public function ajouter(int $userId, int $recetteId): void
    {
        $sql = "INSERT IGNORE INTO favoris (utilisateur_id, recette_id, date_creation)
                VALUES (:uid, :rid, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId, 'rid' => $recetteId]);
    }

    /** Supprime un favori */
    public function supprimer(int $userId, int $recetteId): void
    {
        $sql = "DELETE FROM favoris WHERE utilisateur_id = :uid AND recette_id = :rid";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId, 'rid' => $recetteId]);
    }

    /** Vrai si la recette est déjà en favoris pour cet utilisateur */
    public function estFavori(int $userId, int $recetteId): bool
    {
        $sql = "SELECT 1 FROM favoris WHERE utilisateur_id = :uid AND recette_id = :rid LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId, 'rid' => $recetteId]);
        return (bool) $stmt->fetchColumn();
    }

    /** Liste des recettes favorites d’un utilisateur (avec données recette) */
    public function listerPourUtilisateur(int $userId): array
    {
        $sql = "SELECT r.id, r.titre, r.slug, r.description, r.image_url
                FROM favoris f
                JOIN recettes r ON r.id = f.recette_id
                WHERE f.utilisateur_id = :uid
                ORDER BY f.date_creation DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Alias pratique si tu préfères ce nom dans les contrôleurs */
    public function getByUtilisateur(int $userId): array
    {
        return $this->listerPourUtilisateur($userId);
    }
}
?>
