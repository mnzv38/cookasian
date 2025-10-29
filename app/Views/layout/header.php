<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $meta = isset($metaDescription) ? (string)$metaDescription : "Cookasian - Blog de recettes asiatiques authentiques";
    $ttl  = isset($title) ? (string)$title : "Cookasian - Recettes d'Asie";
    ?>
    <meta name="description" content="<?= htmlspecialchars($meta) ?>">
    <title><?= htmlspecialchars($ttl) ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <!-- Polices -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- CSS principal -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<header class="entete-site">
    <!-- Ligne 1 : logo centré -->
    <figure class="logo-site">
        <a href="/" class="lien-logo">🥢 Cookasian</a>
    </figure>

    <!-- Ligne 2 : menu centré + zone utilisateur à droite -->
    <div class="barre-nav">
        <nav class="menu-principal">
            <ul class="liste-nav">
                <li><a href="/" class="lien-nav <?= (isset($pageActive) && $pageActive === 'accueil') ? 'actif' : '' ?>">Accueil</a></li>
                <li><a href="/recettes" class="lien-nav <?= (isset($pageActive) && $pageActive === 'recettes') ? 'actif' : '' ?>">Recettes</a></li>
                <li><a href="/notre-histoire" class="lien-nav <?= (isset($pageActive) && $pageActive === 'histoire') ? 'actif' : '' ?>">Notre histoire</a></li>
            </ul>
        </nav>

        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <div class="zone-utilisateur">
                <p class="nom-utilisateur">
                    <?= htmlspecialchars($_SESSION['utilisateur']['name'] ?? 'Utilisateur') ?> 👋
                </p>
                <a class="btn-deconnexion" href="/deconnexion">Déconnexion</a>
            </div>
        <?php else: ?>
            <div class="zone-utilisateur">
                <a class="btn-connexion" href="/connexion">Connexion</a>
            </div>
        <?php endif; ?>
    </div>
</header>

<main class="contenu-principal">
