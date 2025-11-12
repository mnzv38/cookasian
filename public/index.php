<?php
/**
 * Point d'entrée unique du site COOKASIAN
 * Initialise la configuration, charge l'autoload Composer et lance le routeur MVC
 *
 * @author Cookasian
 * @version 1.0.0
 */

// ========================================
// ⚙️ CONFIGURATION GLOBALE
// ========================================

// Activation des erreurs (en environnement de dev)
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Démarrage de la session PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ========================================
// 🚀 CHARGEMENT DE L'AUTOLOAD COMPOSER
// ========================================

$autoload = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($autoload)) {
    die('<h1 style="font-family: sans-serif; color: #c00;">Erreur critique :</h1>'
       . '<p>Le fichier <code>vendor/autoload.php</code> est introuvable.</p>'
       . '<p>Exécutez la commande suivante depuis votre terminal :</p>'
       . '<pre style="background: #222; color: #fff; padding: 10px;">composer install</pre>');
}

require_once $autoload;

// ========================================
// 🧭 LANCEMENT DU ROUTEUR
// ========================================

use Cookasian\Router;

try {
    // Chargement des routes depuis app/routes.php
    $router = require __DIR__ . '/../app/routes.php';

    // Exécution du routeur
    if ($router instanceof Router) {
        $router->dispatch();
    } else {
        throw new Exception('Le routeur n’a pas pu être initialisé correctement.');
    }

} catch (Throwable $e) {
    // Gestion des exceptions globales (affichage en dev)
    http_response_code(500);
    echo '<h1 style="font-family: sans-serif; color: #c00;">Erreur interne du serveur</h1>';
    echo '<p><strong>Message :</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>Fichier :</strong> ' . htmlspecialchars($e->getFile()) . '</p>';
    echo '<p><strong>Ligne :</strong> ' . htmlspecialchars($e->getLine()) . '</p>';
    echo '<pre style="background: #111; color: #eee; padding: 10px;">' . $e->getTraceAsString() . '</pre>';
    exit;
}
?>
