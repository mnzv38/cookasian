<?php
/**
 * Point d'entrée unique du site COOKASIAN
 * Charge l'autoload Composer et lance le routeur
 * 
 * @author Cookasian Project
 * @version 1.0.0
 */

// ========================================
// ⚙️ CONFIGURATION GLOBALE
// ========================================

// Activation des erreurs (en environnement de dev)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Démarrage de la session PHP
// (obligatoire pour la connexion, la déconnexion et le menu dynamique)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ========================================
// 🚀 CHARGEMENT DE L'AUTOLAOD ET DU ROUTEUR
// ========================================

require_once __DIR__ . '/../vendor/autoload.php';

use Cookasian\Router;

// Chargement et récupération du routeur configuré
$router = require __DIR__ . '/../app/routes.php';

// Lancement du routeur
$router->dispatch();
?>
