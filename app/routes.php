<?php
/**
 * Ici je liste toutes les routes de mon site.
 * Ça me permet de voir tout d’un coup et de m’y retrouver plus facilement.
 */

use Cookasian\Router;

$router = new Router();

// ==============================
// 🏠 Accueil
// ==============================
$router->get('/', 'AccueilController', 'index');

// ==============================
// 🍜 Recettes
// ==============================
$router->get('/recettes', 'RecettesController', 'index');
$router->get('/recettes/{slug}', 'RecettesController', 'show');

// ==============================
// 📖 Notre histoire
// ==============================
$router->get('/notre-histoire', 'HistoireController', 'index');

// ==============================
// 🔐 Authentification
// ==============================
$router->get('/connexion', 'AuthController', 'connexion');
$router->post('/connexion', 'AuthController', 'connexion');

$router->get('/inscription', 'AuthController', 'inscription');
$router->post('/inscription', 'AuthController', 'inscription');

$router->get('/deconnexion', 'AuthController', 'deconnexion');

// ==============================
// 👤 Mon compte
// ==============================
$router->get('/mon-compte', 'CompteController', 'index');

// Modifier compte
$router->get('/mon-compte/modifier', 'CompteController', 'modifier');
$router->post('/mon-compte/modifier', 'CompteController', 'modifier');

// ==============================
// ❤️ Favoris
// ==============================
$router->get('/favoris/ajouter/{id}', 'FavorisController', 'ajouter');
$router->get('/favoris/supprimer/{id}', 'FavorisController', 'supprimer');

// ==============================
// ✉️ Contact
// ==============================
$router->get('/contact', 'ContactController', 'index');
$router->post('/contact', 'ContactController', 'index');

// ==============================
// Je retourne le routeur pour que index.php puisse l'utiliser
// ==============================
return $router;
?>
