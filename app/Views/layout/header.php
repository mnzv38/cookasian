<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($metaDescription ?? 'Cookasian - Blog de recettes asiatiques authentiques') ?>">
    <title><?= htmlspecialchars($title ?? 'Cookasian - Recettes d\'Asie') ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    
    <!-- Police Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <!-- CSS principal -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <!-- Lien d'évitement (accessibilité) -->
    <a href="#contenu-principal" class="skip-link">Aller au contenu principal</a>
    
    <!-- En-tête du site -->
    <header class="header" role="banner">
        <div class="header__conteneur">
            <!-- Logo -->
            <div class="header__logo">
                <a href="/" aria-label="Retour à l'accueil de Cookasian">
                    <span class="header__logo-texte">🥢 Cookasian</span>
                </a>
            </div>
            
            <!-- Navigation principale -->
            <nav class="header__nav" aria-label="Navigation principale">
                <ul class="header__menu">
                    <li class="header__menu-item">
                        <a href="/" class="header__lien <?= $pageActive === 'accueil' ? 'header__lien--actif' : '' ?>">
                            Accueil
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="/recettes" class="header__lien <?= $pageActive === 'recettes' ? 'header__lien--actif' : '' ?>">
                            Recettes
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="/histoire" class="header__lien <?= $pageActive === 'histoire' ? 'header__lien--actif' : '' ?>">
                            Notre Histoire
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="/utilisateur" class="header__lien header__lien--bouton <?= $pageActive === 'utilisateur' ? 'header__lien--actif' : '' ?>">
                            Connexion
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Contenu principal -->
    <main id="contenu-principal" tabindex="-1">