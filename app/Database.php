<?php
namespace Cookasian;

use PDO;
use PDOException;

/**
 * Classe Database — connexion unique à la base de données via PDO
 * J'ai fait quelque chose de simple pour ne pas répéter la connexion partout.
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

            // Je récupère mes infos de connexion ici (avec mes valeurs par défaut)
            $host = $_ENV['DB_HOST'] ?? 'mysql';
            $dbname = $_ENV['DB_NAME'] ?? 'cookasian';
            $user = $_ENV['DB_USER'] ?? 'root';
            $pass = $_ENV['DB_PASS'] ?? 'root';
            $charset = 'utf8mb4';

            // Le DSN c'est juste l'adresse complète pour que PDO sache où se connecter
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            try {

                // Je mets mes options PDO ici, ça me permet d'avoir les erreurs visibles
                // et un format de données simple à utiliser
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                    // Je garde cette option car elle force l'utilisation des "vraies" requêtes préparées
                    // (c'est une petite bonne pratique, ça ne change rien pour moi dans l'utilisation)
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);

            } catch (PDOException $e) {
                // Si la connexion échoue, j'affiche simplement l'erreur pour comprendre le problème
                die("Erreur de connexion PDO : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
?>
