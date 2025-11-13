<?php

namespace Cookasian\Models;

use Cookasian\Database;
use PDO;

class ContactModel
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::pdo();
    }

    public function enregistrerMessage(string $nom, string $email, string $message): bool
    {
        $sql = "INSERT INTO contact_messages (nom, email, message) 
                VALUES (:nom, :email, :message)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':message' => $message
        ]);
    }
}
?>
