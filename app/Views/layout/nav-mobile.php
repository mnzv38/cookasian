<nav class="nav-mobile">
    <ul class="nav-mobile-liste">

        <li>
            <a href="/" class="nav-mobile-lien <?= (isset($pageActive) && $pageActive === 'accueil') ? 'actif' : '' ?>">
                🏠
                <span class="nav-mobile-texte">Accueil</span>
            </a>
        </li>

        <li>
            <a href="/recettes" class="nav-mobile-lien <?= (isset($pageActive) && $pageActive === 'recettes') ? 'actif' : '' ?>">
                🍜
                <span class="nav-mobile-texte">Recettes</span>
            </a>
        </li>

        <li>
            <a href="/notre-histoire" class="nav-mobile-lien <?= (isset($pageActive) && $pageActive === 'histoire') ? 'actif' : '' ?>">
                📖
                <span class="nav-mobile-texte">Histoire</span>
            </a>
        </li>

        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <li>
                <a href="/mon-compte" class="nav-mobile-lien <?= (isset($pageActive) && $pageActive === 'compte') ? 'actif' : '' ?>">
                    👤
                    <span class="nav-mobile-texte">Compte</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if (empty($_SESSION['utilisateur'])): ?>
            <li>
                <a href="/connexion" class="nav-mobile-lien">
                    👤
                    <span class="nav-mobile-texte">Connexion</span>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
