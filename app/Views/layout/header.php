<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    $meta = isset($metaDescription) ? (string)$metaDescription : "Cookasian - Blog de recettes asiatiques authentiques";
    $pageName = isset($title) ? (string)$title : "Accueil";
    $ttl = $pageName . " - Cookasian";
    $baseUrl = "http://cookasian.localhost:8080";
    ?>

    <meta name="description" content="<?= htmlspecialchars($meta) ?>">
    <title><?= htmlspecialchars($ttl) ?></title>

    <link 
        rel="icon"
        href="data:image/svg+xml,
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
            <text y='0.9em' font-size='80'>🥢</text>
        </svg>"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" href="<?= $baseUrl ?>/assets/css/main.css" as="style">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/main.css">
</head>

<body>

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
            <li><a href="<?= $baseUrl ?>/" class="lien-nav <?= ($pageActive ?? '') === 'accueil' ? 'actif' : '' ?>">Accueil</a></li>
            <li><a href="<?= $baseUrl ?>/recettes" class="lien-nav <?= ($pageActive ?? '') === 'recettes' ? 'actif' : '' ?>">Recettes</a></li>
            <li><a href="<?= $baseUrl ?>/notre-histoire" class="lien-nav <?= ($pageActive ?? '') === 'histoire' ? 'actif' : '' ?>">Notre histoire</a></li>

            <?php if (!empty($_SESSION['utilisateur'])): ?>
                <li><a href="<?= $baseUrl ?>/mon-compte" class="lien-nav <?= ($pageActive ?? '') === 'compte' ? 'actif' : '' ?>">Mon compte</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="zone-utilisateur">
        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <p class="nom-utilisateur">
                <?= htmlspecialchars($_SESSION['utilisateur']['name']) ?> 👋
            </p>
            <a class="btn-deconnexion" href="<?= $baseUrl ?>/deconnexion">Déconnexion</a>
        <?php else: ?>
            <a class="btn-connexion" href="<?= $baseUrl ?>/connexion">Connexion</a>
        <?php endif; ?>
    </div>
</header>

<main class="contenu-principal">

</main>

<?php require __DIR__ . '/nav-mobile.php'; ?>

</body>
</html>
