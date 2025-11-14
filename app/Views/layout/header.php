<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    // SEO : description
    $meta = isset($metaDescription) ? (string)$metaDescription : "Cookasian - Blog de recettes asiatiques authentiques";

    // Titre "Nom de page - Cookasian"
    $pageName = isset($title) ? (string)$title : "Accueil";
    $ttl = $pageName . " - Cookasian";

    // Base URL
    $baseUrl = "http://cookasian.localhost:8080";
    ?>

    <!-- Meta SEO -->
    <meta name="description" content="<?= htmlspecialchars($meta) ?>">

    <!-- Titre -->
    <title><?= htmlspecialchars($ttl) ?></title>

    <!-- 🥢 Favicon emoji en SVG -->
    <link 
        rel="icon"
        href="data:image/svg+xml,
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
            <text y='0.9em' font-size='80'>🥢</text>
        </svg>"
    >

    <!-- Fonts optimisées (preconnect + crossOrigin + swap) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Préchargement crucial pour la performance -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&family=Quicksand:wght@400;600;700&display=swap" as="style">

    <!-- Polices Google optimisées -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS principal (préchargé + caché long terme via Nginx) -->
    <link rel="preload" href="<?= $baseUrl ?>/assets/css/main.css" as="style">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/main.css">
</head>

<body>

<!-- 🔔 Message flash -->
<?php if (!empty($_SESSION['flash_message'])): ?>
    <div class="flash-message">
        <?= htmlspecialchars($_SESSION['flash_message']) ?>
    </div>
    <?php unset($_SESSION['flash_message']); ?>
<?php endif; ?>

<header class="entete-site">

    <figure class="logo-site">
        <a href="<?= $baseUrl ?>/" class="lien-logo">🥢 Cookasian</a>
    </figure>

    <nav class="menu-principal">
        <ul class="liste-nav">
            <li><a href="<?= $baseUrl ?>/" class="lien-nav <?= (isset($pageActive) && $pageActive === 'accueil') ? 'actif' : '' ?>">Accueil</a></li>
            <li><a href="<?= $baseUrl ?>/recettes" class="lien-nav <?= (isset($pageActive) && $pageActive === 'recettes') ? 'actif' : '' ?>">Recettes</a></li>
            <li><a href="<?= $baseUrl ?>/notre-histoire" class="lien-nav <?= (isset($pageActive) && $pageActive === 'histoire') ? 'actif' : '' ?>">Notre histoire</a></li>

            <?php if (!empty($_SESSION['utilisateur'])): ?>
                <li><a href="<?= $baseUrl ?>/mon-compte" class="lien-nav <?= (isset($pageActive) && $pageActive === 'compte') ? 'actif' : '' ?>">Mon compte</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="zone-utilisateur">
        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <p class="nom-utilisateur">
                <?= htmlspecialchars($_SESSION['utilisateur']['name'] ?? 'Utilisateur') ?> 👋
            </p>
            <a class="btn-deconnexion" href="<?= $baseUrl ?>/deconnexion">Déconnexion</a>
        <?php else: ?>
            <a class="btn-connexion" href="<?= $baseUrl ?>/connexion">Connexion</a>
        <?php endif; ?>
    </div>
</header>

<main class="contenu-principal">
