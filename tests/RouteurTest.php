<?php
/**
 * Tests unitaires du routeur COOKASIAN
 * Vérifie le bon fonctionnement des routes
 */

use PHPUnit\Framework\TestCase;
use Cookasian\Router;

class RouteurTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        $this->router = new Router();
        
        // Enregistrement de routes de test
        $this->router->get('/', 'AccueilController', 'index');
        $this->router->get('/recettes', 'RecettesController', 'index');
        $this->router->get('/recette/{slug}', 'RecettesController', 'show');
    }

    /**
     * Test : Vérifier que la route d'accueil est enregistrée
     */
    public function testRouteAccueilEnregistree(): void
    {
        $routes = $this->router->getRoutes();
        
        $this->assertArrayHasKey('GET', $routes);
        $this->assertArrayHasKey('/', $routes['GET']);
        $this->assertEquals('AccueilController', $routes['GET']['/']['controller']);
    }

    /**
     * Test : Vérifier que la route /recettes est enregistrée
     */
    public function testRouteRecettesEnregistree(): void
    {
        $routes = $this->router->getRoutes();
        
        $this->assertArrayHasKey('/recettes', $routes['GET']);
        $this->assertEquals('RecettesController', $routes['GET']['/recettes']['controller']);
    }

    /**
     * Test : Vérifier que la route dynamique /recette/{slug} est enregistrée
     */
    public function testRouteRecetteDynamiqueEnregistree(): void
    {
        $routes = $this->router->getRoutes();
        
        $this->assertArrayHasKey('/recette/{slug}', $routes['GET']);
        $this->assertEquals('show', $routes['GET']['/recette/{slug}']['method']);
    }
}
?>