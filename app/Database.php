<?php
namespace Cookasian;

use PDO;
use PDOException;

/**
 * Classe Database — connexion unique à la base de données via PDO
 */
final class Database
{
    private static ?PDO $pdo = null;

    /**
     * Retourne une instance PDO unique (singleton)
     */
    public static function pdo(): PDO
    {
        if (self::$pdo === null) {
            $host = $_ENV['DB_HOST'] ?? 'mysql';
            $dbname = $_ENV['DB_NAME'] ?? 'cookasian';
            $user = $_ENV['DB_USER'] ?? 'root';
            $pass = $_ENV['DB_PASS'] ?? 'root';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                die("Erreur de connexion PDO : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
?>
