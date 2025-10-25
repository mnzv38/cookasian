<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($metaDescription ?? 'Cookasian - Blog de recettes asiatiques authentiques') ?>">
    <title><?= htmlspecialchars($title ?? 'Cookasian - Recettes d\'Asie') ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <!-- Polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Feuille de style principale -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

    <!-- Lien d’accès direct au contenu -->
    <a href="#contenu-principal" class="lien-contenu">Aller au contenu principal</a>

    <!-- En-tête du site -->
    <header class="entete-site">

        <!-- Logo du site -->
        <figure class="logo-site">
            <a href="/" class="lien-logo">🥢 Cookasian</a>
        </figure>

        <!-- Menu principal -->
        <nav class="menu-principal">
            <ul class="liste-nav">
                <li>
                    <a href="/" class="lien-nav <?= $pageActive === 'accueil' ? 'actif' : '' ?>">Accueil</a>
                </li>
                <li>
                    <a href="/recettes" class="lien-nav <?= $pageActive === 'recettes' ? 'actif' : '' ?>">Recettes</a>
                </li>
                <li>
                    <a href="/histoire" class="lien-nav <?= $pageActive === 'histoire' ? 'actif' : '' ?>">Notre histoire</a>
                </li>
                <li>
                    <a href="/utilisateur" class="lien-nav bouton <?= $pageActive === 'utilisateur' ? 'actif' : '' ?>">Connexion</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="contenu-principal">
