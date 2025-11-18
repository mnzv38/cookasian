<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

class FavorisModel
{
    private PDO $pdo;

    public function __construct()
    {
        // Je récupère ma connexion PDO une seule fois
        $this->pdo = Database::pdo();
    }

    /** Ajoute un favori pour un utilisateur */
    public function ajouter(int $userId, int $recetteId): void
    {
        // INSERT IGNORE permet d'éviter les doublons sans erreur
        $sql = "INSERT IGNORE INTO favoris (utilisateur_id, recette_id, date_creation)
                VALUES (:uid, :rid, NOW())";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'uid' => $userId,
            'rid' => $recetteId
        ]);
    }

    /** Supprime un favori */
    public function supprimer(int $userId, int $recetteId): void
    {
        $sql = "DELETE FROM favoris 
                WHERE utilisateur_id = :uid AND recette_id = :rid";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'uid' => $userId,
            'rid' => $recetteId
        ]);
    }

    /** Vérifie si une recette est déjà dans les favoris */
    public function estFavori(int $userId, int $recetteId): bool
    {
        $sql = "SELECT 1 
                FROM favoris 
                WHERE utilisateur_id = :uid AND recette_id = :rid 
                LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'uid' => $userId,
            'rid' => $recetteId
        ]);

        return (bool) $stmt->fetchColumn();
    }

    /** Liste les recettes favorites d’un utilisateur */
    public function listerPourUtilisateur(int $userId): array
    {
        // Je récupère les infos des recettes favorites avec un JOIN tout simple
        $sql = "SELECT r.id, r.titre, r.slug, r.description, r.image_url
                FROM favoris f
                JOIN recettes r ON r.id = f.recette_id
                WHERE f.utilisateur_id = :uid
                ORDER BY f.date_creation DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['uid' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Petit alias si je veux utiliser un autre nom dans les contrôleurs */
    public function getByUtilisateur(int $userId): array
    {
        return $this->listerPourUtilisateur($userId);
    }
}
?>
