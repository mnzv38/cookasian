<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // Description SEO
    $meta = isset($metaDescription) ? (string)$metaDescription : "Cookasian - Blog de recettes asiatiques authentiques";

    // Titre complet envoyé par les contrôleurs
    // On harmonise ici automatiquement : "Nom de page - Cookasian"
    $pageName = isset($title) ? (string)$title : "Accueil";
    $ttl = $pageName . " - Cookasian";

    // URL base
    $baseUrl = "http://cookasian.localhost:8080";
    ?>

    <!-- Meta SEO -->
    <meta name="description" content="<?= htmlspecialchars($meta) ?>">

    <!-- 🥢 Titre unifié et homogène -->
    <title>🥢 <?= htmlspecialchars($ttl) ?></title>

    <!-- Favicon PNG -->
    <link rel="icon" type="image/png" href="<?= $baseUrl ?>/assets/images/favicon.png">

    <!-- Polices Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS principal -->
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
