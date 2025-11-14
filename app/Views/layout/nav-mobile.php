<nav class="nav-mobile">
    <ul class="nav-mobile-liste">

        <li>
            <a href="/" class="nav-mobile-lien <?= ($pageActive ?? '') === 'accueil' ? 'actif' : '' ?>">
                🏠
                <span class="nav-mobile-texte">Accueil</span>
            </a>
        </li>

        <li>
            <a href="/recettes" class="nav-mobile-lien <?= ($pageActive ?? '') === 'recettes' ? 'actif' : '' ?>">
                🍜
                <span class="nav-mobile-texte">Recettes</span>
            </a>
        </li>

        <li>
            <a href="/notre-histoire" class="nav-mobile-lien <?= ($pageActive ?? '') === 'histoire' ? 'actif' : '' ?>">
                📖
                <span class="nav-mobile-texte">Histoire</span>
            </a>
        </li>

        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <li>
                <a href="/mon-compte" class="nav-mobile-lien <?= ($pageActive ?? '') === 'compte' ? 'actif' : '' ?>">
                    👤
                    <span class="nav-mobile-texte">Compte</span>
                </a>
            </li>
        <?php else: ?>
            <li>
                <a href="/connexion" class="nav-mobile-lien <?= ($pageActive ?? '') === 'connexion' ? 'actif' : '' ?>">
                    👤
                    <span class="nav-mobile-texte">Compte</span>
                </a>
            </li>
        <?php endif; ?>

        <li>
            <a href="/contact" class="nav-mobile-lien <?= ($pageActive ?? '') === 'contact' ? 'actif' : '' ?>">
                ✉️
                <span class="nav-mobile-texte">Contact</span>
            </a>
        </li>

    </ul>
</nav>
