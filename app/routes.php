<?php
/**
 * Fichier de définition des routes COOKASIAN
 * Centralise toutes les routes du site
 */

use Cookasian\Router;

// Création du routeur
$router = new Router();

// === ROUTES PRINCIPALES ===

// Accueil
$router->get('/', 'AccueilController', 'index');

// Recettes
$router->get('/recettes', 'RecettesController', 'index');
$router->get('/recettes/{slug}', 'RecettesController', 'show');

// Notre histoire
$router->get('/notre-histoire', 'HistoireController', 'index');

// Connexion / Inscription (on les préparera ensuite)
$router->get('/connexion', 'AuthController', 'connexion');
$router->get('/inscription', 'AuthController', 'inscription');
$router->get('/deconnexion', 'AuthController', 'deconnexion');


// Retourne l'objet Router
return $router;
?>
