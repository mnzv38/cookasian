<?php
/**
 * Fichier de définition des routes COOKASIAN
 * Centralise toutes les routes du site
 */

use Cookasian\Router;

// Création du routeur
$router = new Router();

// === ROUTES PRINCIPALES ===

// Page d'accueil
$router->get('/', 'AccueilController', 'index');

// Pages recettes
$router->get('/recettes', 'RecettesController', 'index');
$router->get('/recette/{slug}', 'RecettesController', 'show');

// === Routes futures ===
// $router->get('/histoire', 'HistoireController', 'index');
// $router->get('/utilisateur', 'UtilisateurController', 'connexion');

// Retourne l'objet Router prêt à être lancé
return $router;
?>
