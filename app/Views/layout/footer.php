</main>
    
    <!-- Pied de page -->
    <footer class="footer" role="contentinfo">
        <div class="footer__conteneur">
            
            <!-- Section 1 : À propos -->
            <div class="footer__section">
                <h3 class="footer__titre">🥢 Cookasian</h3>
                <p class="footer__description">
                    Découvrez l'authenticité des saveurs asiatiques à travers nos recettes traditionnelles et modernes.
                </p>
            </div>
            
            <!-- Section 2 : Navigation -->
            <div class="footer__section">
                <h4 class="footer__titre">Navigation</h4>
                <ul class="footer__liste">
                    <li><a href="/" class="footer__lien">Accueil</a></li>
                    <li><a href="/recettes" class="footer__lien">Recettes</a></li>
                    <li><a href="/histoire" class="footer__lien">Notre Histoire</a></li>
                    <li><a href="/utilisateur" class="footer__lien">Mon Compte</a></li>
                </ul>
            </div>
            
            <!-- Section 3 : Légal -->
            <div class="footer__section">
                <h4 class="footer__titre">Informations légales</h4>
                <ul class="footer__liste">
                    <li><a href="/mentions-legales" class="footer__lien">Mentions légales</a></li>
                    <li><a href="/politique-confidentialite" class="footer__lien">Politique de confidentialité</a></li>
                </ul>
            </div>
            
            <!-- Section 4 : Contact -->
            <div class="footer__section">
                <h4 class="footer__titre">Contact</h4>
                <ul class="footer__liste">
                    <li class="footer__contact">
                        <span aria-label="Email">📧</span>
                        <a href="mailto:contact@cookasian.fr" class="footer__lien">contact@cookasian.fr</a>
                    </li>
                </ul>
            </div>
            
        </div>
        
        <!-- Barre de copyright -->
        <div class="footer__copyright">
            <div class="footer__conteneur">
                <p>© <?= date('Y') ?> Cookasian. Tous droits réservés.</p>
                <p class="footer__credit">
                    Développé avec ❤️ dans le cadre du Titre Professionnel DWWM
                </p>
            </div>
        </div>
    </footer>
    
</body>
</html>