<nav class="nav-mobile">
    <ul class="nav-mobile-liste">

        <!-- Accueil -->
        <li>
            <a href="/" class="nav-mobile-lien <?= ($pageActive ?? '') === 'accueil' ? 'actif' : '' ?>">
                <svg class="icone-nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12L12 3l9 9" />
                    <path d="M5 10v10h5v-5h4v5h5V10" />
                </svg>
                <span class="nav-mobile-texte">Accueil</span>
            </a>
        </li>

        <!-- Recettes -->
        <li>
            <a href="/recettes" class="nav-mobile-lien <?= ($pageActive ?? '') === 'recettes' ? 'actif' : '' ?>">
                <svg class="icone-nav soup-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21a9 9 0 0 0 9-9H3a9 9 0 0 0 9 9Z"/>
                    <path d="M7 21h10"/>
                    <path d="M19.5 12 22 6"/>
                    <path d="M16.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.73 1.62"/>
                    <path d="M11.25 3c.27.1.8.53.74 1.36-.05.83-.93 1.2-.98 2.02-.06.78.33 1.24.72 1.62"/>
                    <path d="M6.25 3c.27.1.8.53.75 1.36-.06.83-.93 1.2-1 2.02-.05.78.34 1.24.74 1.62"/>
                </svg>
                <span class="nav-mobile-texte">Recettes</span>
            </a>
        </li>

        <!-- Histoire -->
        <li>
            <a href="/notre-histoire" class="nav-mobile-lien <?= ($pageActive ?? '') === 'histoire' ? 'actif' : '' ?>">
                <svg class="icone-nav book-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 7v14"/>
                    <path d="M16 12h2"/>
                    <path d="M16 8h2"/>
                    <path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/>
                    <path d="M6 12h2"/>
                    <path d="M6 8h2"/>
                </svg>
                <span class="nav-mobile-texte">Histoire</span>
            </a>
        </li>

        <!-- Compte -->
        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <li>
                <a href="/mon-compte" class="nav-mobile-lien <?= ($pageActive ?? '') === 'compte' ? 'actif' : '' ?>">
                    <svg class="icone-nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c1.7-4 4.5-6 8-6s6.3 2 8 6"/>
                    </svg>
                    <span class="nav-mobile-texte">Compte</span>
                </a>
            </li>
        <?php else: ?>
            <li>
                <a href="/connexion" class="nav-mobile-lien <?= ($pageActive ?? '') === 'connexion' ? 'actif' : '' ?>">
                    <svg class="icone-nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c1.7-4 4.5-6 8-6s6.3 2 8 6"/>
                    </svg>
                    <span class="nav-mobile-texte">Compte</span>
                </a>
            </li>
        <?php endif; ?>

        <!-- Contact -->
        <li>
            <a href="/contact" class="nav-mobile-lien <?= ($pageActive ?? '') === 'contact' ? 'actif' : '' ?>">
                <svg class="icone-nav" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                    <path d="M3 7l9 6 9-6"/>
                </svg>
                <span class="nav-mobile-texte">Contact</span>
            </a>
        </li>

    </ul>
</nav>
