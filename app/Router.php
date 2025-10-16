<?php
/**
 * Routeur principal COOKASIAN
 * Gère les URLs propres et dispatch vers les contrôleurs
 */

namespace Cookasian;

class Router
{
    /**
     * @var array $routes Liste des routes enregistrées
     */
    private array $routes = [];

    /**
     * Enregistre une route GET
     * 
     * @param string $path Chemin URL (ex: /recette/{slug})
     * @param string $controller Contrôleur à appeler
     * @param string $method Méthode du contrôleur
     * @return void
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
     * 
     * @param string $path Chemin URL
     * @param string $controller Contrôleur à appeler
     * @param string $method Méthode du contrôleur
     * @return void
     */
    public function post(string $path, string $controller, string $method): void
    {
        $this->routes['POST'][$path] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Dispatche la requête vers le bon contrôleur
     * 
     * @return void
     */
    public function dispatch(): void
    {
        // Récupération de la méthode HTTP
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        
        // Récupération de l'URI sans query string
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Recherche de la route correspondante
        foreach ($this->routes[$requestMethod] ?? [] as $path => $route) {
            // Conversion du pattern en regex (ex: /recette/{slug} => /recette/([^/]+))
            $pattern = preg_replace('/\{[a-zA-Z]+\}/', '([^/]+)', $path);
            $pattern = '#^' . $pattern . '$#';
            
            if (preg_match($pattern, $uri, $matches)) {
                // Suppression du premier élément (URI complète)
                array_shift($matches);
                
                // Instanciation du contrôleur
                $controllerName = $route['controller'];
                $controller = new $controllerName();
                
                // Appel de la méthode avec les paramètres
                $method = $route['method'];
                call_user_func_array([$controller, $method], $matches);
                return;
            }
        }
        
        // Aucune route trouvée : erreur 404
        http_response_code(404);
        require_once __DIR__ . '/../views/erreurs/404.php';
    }

    /**
     * Retourne toutes les routes enregistrées (utile pour les tests)
     * 
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
?>