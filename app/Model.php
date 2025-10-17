<?php
/**
 * Modèle abstrait COOKASIAN
 * Fournit l'accès à la base de données via PDO
 */

namespace Cookasian;

abstract class Model
{
    /**
     * @var \PDO|null $db Connexion PDO
     */
    protected ?\PDO $db = null;

    /**
     * Constructeur : initialise la connexion BDD
     */
    public function __construct()
    {
        $this->db = Database::pdo();
    }

    /**
     * Retourne la connexion PDO (utile pour les tests)
     * 
     * @return \PDO|null
     */
    public function getDb(): ?\PDO
    {
        return $this->db;
    }
}
?>