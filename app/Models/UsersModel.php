<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

/**
 * Modèle gérant les utilisateurs
 * Fournit les méthodes pour chercher et créer un utilisateur dans la base de données.
 */
class UsersModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }

    /**
     * Recherche un utilisateur à partir de son adresse e-mail
     */
    public function findByEmail(string $email): ?array
    {
        $sql = 'SELECT id, name, email, password_hash, remember_token FROM users WHERE email = :email LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultat ?: null;
    }

    /**
     * Alias de compatibilité pour les anciens contrôleurs
     */
    public function trouverParEmail(string $email): ?array
    {
        return $this->findByEmail($email);
    }

    /**
     * Crée un nouvel utilisateur dans la base de données
     */
    public function create(string $name, string $email, string $passwordHash): int
    {
        $sql = 'INSERT INTO users (name, email, password_hash, created_at) VALUES (:name, :email, :password_hash, NOW())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => $passwordHash
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Enregistre ou supprime le remember_token
     */
    public function saveRememberToken(int $userId, ?string $token): void
    {
        $sql = 'UPDATE users SET remember_token = :t WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['t' => $token, 'id' => $userId]);
    }

    /**
     * Retrouve un utilisateur par selector
     */
    public function findByRememberSelector(string $selector): ?array
    {
        $sql = 'SELECT id, name, email, password_hash, remember_token FROM users WHERE remember_token LIKE :pfx LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['pfx' => $selector . ':%']);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}
?>
