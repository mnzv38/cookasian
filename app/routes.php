<?php
/**
 * Fichier de définition des routes COOKASIAN
 * Centralise toutes les routes du site
 */

use Cookasian\Router;

$router = new Router();

// Route page d'accueil
$router->get('/', 'AccueilController', 'index');

// Routes à venir :
// $router->get('/recettes', 'RecettesController', 'index');
// $router->get('/recette/{slug}', 'RecettesController', 'show');
// $router->get('/histoire', 'HistoireController', 'index');
// $router->get('/utilisateur', 'UtilisateurController', 'connexion');

return $router;
?>