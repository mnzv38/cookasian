<?php
/**
 * Routeur principal COOKASIAN
 * Gère les URLs propres et dispatch vers les contrôleurs
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
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes[$requestMethod] ?? [] as $path => $route) {

            // Transformation : /recettes/{slug}
            $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([^/]+)', $path);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                // Namespace complet PSR-4
                $controllerClass = 'Cookasian\\Controllers\\' . $route['controller'];

                if (!class_exists($controllerClass)) {
                    echo "<h1>Erreur : contrôleur introuvable</h1>";
                    echo "<p>Classe recherchée : <code>{$controllerClass}</code></p>";
                    return;
                }

                $controller = new $controllerClass();
                $method = $route['method'];

                if (!method_exists($controller, $method)) {
                    echo "<h1>Erreur : méthode non trouvée</h1>";
                    echo "<p>Dans la classe : <code>{$controllerClass}</code></p>";
                    return;
                }

                call_user_func_array([$controller, $method], $matches);
                return;
            }
        }

        // ==========================
        // 🔥 PAGE 404 PERSONNALISÉE
        // ==========================

        http_response_code(404);

        $errorView = __DIR__ . '/../Views/erreurs/erreur-404.php';

        if (file_exists($errorView)) {
            require $errorView;
            exit;     // ❗ essentiel
        }

        // Fallback si la vue n'existe pas
        echo "<h1>Erreur 404 - Page non trouvée</h1>";
        echo "<p>La page demandée ({$uri}) est introuvable.</p>";
        exit;
    }

    /**
     * Retourne toutes les routes (utile pour debug)
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
