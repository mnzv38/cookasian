<?php

namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

class ContactModel
{
    private PDO $pdo;

    public function __construct()
    {
        // Je récupère ici ma connexion PDO
        $this->pdo = Database::pdo();
    }

    /**
     * Enregistre un message envoyé via le formulaire de contact
     */
    public function enregistrerMessage(string $nom, string $email, string $message): bool
    {
        // Je prépare une requête simple pour enregistrer le message
        $sql = "INSERT INTO contact_messages (nom, email, message) 
                VALUES (:nom, :email, :message)";

        $stmt = $this->pdo->prepare($sql);

        // J'exécute avec les valeurs du formulaire
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':message' => $message
        ]);
    }
}
?>
