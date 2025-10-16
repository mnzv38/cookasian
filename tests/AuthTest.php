<?php
/**
 * Tests unitaires d'authentification COOKASIAN
 * Vérifie le hashage et la vérification des mots de passe
 */

use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test : Vérifier que password_hash() fonctionne correctement
     */
    public function testPasswordHash(): void
    {
        $motDePasse = 'MonMotDePasse123!';
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        
        // Le hash ne doit pas être vide
        $this->assertNotEmpty($hash);
        
        // Le hash doit être différent du mot de passe
        $this->assertNotEquals($motDePasse, $hash);
        
        // Le hash doit commencer par $2y$ (bcrypt)
        $this->assertStringStartsWith('$2y$', $hash);
    }

    /**
     * Test : Vérifier que password_verify() valide un bon mot de passe
     */
    public function testPasswordVerifyAvecBonMotDePasse(): void
    {
        $motDePasse = 'MonMotDePasse123!';
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        
        $resultat = password_verify($motDePasse, $hash);
        
        $this->assertTrue($resultat);
    }

    /**
     * Test : Vérifier que password_verify() rejette un mauvais mot de passe
     */
    public function testPasswordVerifyAvecMauvaisMotDePasse(): void
    {
        $motDePasse = 'MonMotDePasse123!';
        $mauvaisMotDePasse = 'MauvaisMotDePasse456!';
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        
        $resultat = password_verify($mauvaisMotDePasse, $hash);
        
        $this->assertFalse($resultat);
    }
}
?>