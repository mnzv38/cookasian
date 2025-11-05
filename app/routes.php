<?php
/**
 * Fichier de définition des routes COOKASIAN
 * Centralise toutes les routes du site
 */

use Cookasian\Router;

$router = new Router();

// Accueil
$router->get('/', 'AccueilController', 'index');

// Recettes
$router->get('/recettes', 'RecettesController', 'index');
$router->get('/recettes/{slug}', 'RecettesController', 'show');

// Notre histoire
$router->get('/notre-histoire', 'HistoireController', 'index');

// Authentification
$router->get('/connexion', 'AuthController', 'connexion');
$router->post('/connexion', 'AuthController', 'connexion');
$router->get('/inscription', 'AuthController', 'inscription');
$router->post('/inscription', 'AuthController', 'inscription');
$router->get('/deconnexion', 'AuthController', 'deconnexion');

// Mon compte (zone réservée)
$router->get('/mon-compte', 'CompteController', 'index');

// Favoris (actions réservées)
$router->get('/favoris/ajouter/{id}', 'FavorisController', 'ajouter');
$router->get('/favoris/supprimer/{id}', 'FavorisController', 'supprimer');

// Contact (route dédiée au traitement du formulaire depuis "Notre histoire")
$router->get('/contact', 'ContactController', 'index');   // Optionnel (si tu veux une page dédiée plus tard)
$router->post('/contact', 'ContactController', 'index');

// Retourne l'objet Router
return $router;
?>
