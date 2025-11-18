<?php
namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

/**
 * Modèle des utilisateurs.
 * Ici je centralise toutes les actions liées aux users (chercher, créer, mettre à jour…)
 */
class UsersModel
{
    private PDO $pdo;

    public function __construct()
    {
        // Je récupère ma connexion PDO une bonne fois pour toutes
        $this->pdo = Database::pdo();
    }

    /**
     * Recherche un utilisateur à partir de son adresse e-mail
     */
    public function findByEmail(string $email): ?array
    {
        $sql = 'SELECT id, name, email, password_hash, remember_token FROM users WHERE email = :email LIMIT 1';
        $stmt = $this->pdo->prepare($sql);

        // J’exécute la requête avec le paramètre "email"
        $stmt->execute(['email' => $email]);

        // Je récupère le résultat (ou null si rien trouvé)
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat ?: null;
    }

    /**
     * Ancien nom de méthode, je garde pour compatibilité
     */
    public function trouverParEmail(string $email): ?array
    {
        return $this->findByEmail($email);
    }

    /**
     * Crée un nouvel utilisateur dans la base
     */
    public function create(string $name, string $email, string $passwordHash): int
    {
        $sql = 'INSERT INTO users (name, email, password_hash, created_at) VALUES (:name, :email, :password_hash, NOW())';
        $stmt = $this->pdo->prepare($sql);

        // Je passe les valeurs à la requête
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => $passwordHash
        ]);

        // Je retourne l'ID du nouvel utilisateur
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Enregistre ou supprime le token "se souvenir de moi"
     */
    public function saveRememberToken(int $userId, ?string $token): void
    {
        $sql = 'UPDATE users SET remember_token = :t WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        // Je mets à jour le token (ou NULL)
        $stmt->execute(['t' => $token, 'id' => $userId]);
    }

    /**
     * Cherche un utilisateur selon le "selector" du remember me
     */
    public function findByRememberSelector(string $selector): ?array
    {
        $sql = 'SELECT id, name, email, password_hash, remember_token FROM users 
                WHERE remember_token LIKE :pfx LIMIT 1';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['pfx' => $selector . ':%']);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Met à jour les infos d’un utilisateur (name + email).
     * J’ai choisi une version simple et claire.
     */
    public function updateUser(int $userId, array $donnees): void
    {
        // Je mets seulement à jour ce dont j’ai besoin
        $sql = 'UPDATE users SET name = :name, email = :email WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'name' => $donnees['name'],
            'email' => $donnees['email'],
            'id' => $userId
        ]);
    }
}
?>
