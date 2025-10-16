<?php
/**
 * Gestionnaire de connexion BDD COOKASIAN
 * Pattern Singleton pour une seule instance PDO
 */

namespace Cookasian;

use PDO;
use PDOException;

class Database
{
    /**
     * @var PDO|null $instance Instance unique de PDO
     */
    private static ?PDO $instance = null;

    /**
     * Empêche l'instanciation directe
     */
    private function __construct() {}

    /**
     * Empêche le clonage
     */
    private function __clone() {}

    /**
     * Retourne l'instance PDO unique
     * 
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                // Configuration de la connexion
                $host = 'db'; // Nom du service Docker
                $dbname = 'cookasian';
                $username = 'cookasian_user';
                $password = 'cookasian_password';
                
                $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
                
                // Options PDO sécurisées
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                
                self::$instance = new PDO($dsn, $username, $password, $options);
                
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        
        return self::$instance;
    }
}
?>