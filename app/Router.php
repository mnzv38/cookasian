<?php
/**
 * Routeur principal COOKASIAN
 * Gère les URLs propres et envoie vers les bons contrôleurs
 */

namespace Cookasian;

class Router
{
    private array $routes = [];

    /**
     * Enregistre une route GET
     */
    public function get(string $path, string $controller, string $method): void
    {
        $this->routes['GET'][$path] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Enregistre une route POST
     */
    public function post(string $path, string $controller, string $method): void
    {
        $this->routes['POST'][$path] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Analyse l’URL et appelle le bon contrôleur / méthode
     */
    public function dispatch(): void
    {
        // Je récupère la méthode HTTP (GET ou POST)
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        // Je récupère juste le chemin, sans les paramètres
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Je retire seulement les slashes à la fin, mais jamais pour la page d'accueil
        $uri = rtrim($uri, '/');
        if ($uri === '') {
            $uri = '/';
}


        foreach ($this->routes[$requestMethod] ?? [] as $path => $route) {

            // Je transforme ce format : /recettes/{slug}
            // en une petite regex qui permet de capturer la valeur entre les accolades
            $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([^/]+)', $path);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {

                // Le premier élément n'est pas utile (match complet)
                array_shift($matches);

                // Je construis le namespace complet de mon contrôleur
                $controllerClass = 'Cookasian\\Controllers\\' . $route['controller'];

                // Je vérifie que la classe existe vraiment
                if (!class_exists($controllerClass)) {
                    echo "<h1>Erreur : contrôleur introuvable</h1>";
                    echo "<p>Classe recherchée : <code>{$controllerClass}</code></p>";
                    return;
                }

                // Je crée l'objet du contrôleur
                $controller = new $controllerClass();
                $method = $route['method'];

                // Je vérifie que la méthode existe bien dans ce contrôleur
                if (!method_exists($controller, $method)) {
                    echo "<h1>Erreur : méthode non trouvée</h1>";
                    echo "<p>Dans la classe : <code>{$controllerClass}</code></p>";
                    return;
                }

                // J'appelle la méthode en lui passant les éventuels paramètres capturés
                call_user_func_array([$controller, $method], $matches);
                return;
            }
        }

        // ==========================
        // 🔥 PAGE 404 PERSONNALISÉE
        // ==========================

        http_response_code(404);

        // Ici je pointe vers ma vue 404 personnalisée
        $errorView = __DIR__ . '/Views/erreurs/erreur-404.php';

        if (file_exists($errorView)) {
            require $errorView;
            exit; // essentiel
        }

        // Si jamais la vue n'existe pas, j'affiche une 404 toute simple
        echo "<h1>Erreur 404 - Page non trouvée</h1>";
        echo "<p>La page demandée ({$uri}) est introuvable.</p>";
        exit;
    }

    /**
     * Retourne toutes les routes (pratique pour debug)
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
?>
