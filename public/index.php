<?php
/**
 * Point d'entrée unique du site COOKASIAN
 * Charge l'autoload Composer et lance le routeur
 * 
 * @author Cookasian Project
 * @version 1.0.0
 */

// Activation des erreurs en développement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Chargement de l'autoload Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Cookasian\Router;

// Chargement et récupération du routeur configuré
$router = require __DIR__ . '/../app/routes.php';

// Lancement du routeur
$router->dispatch();
?>
