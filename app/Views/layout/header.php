<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // On accepte 'metaDescription' / 'title' comme clés (controllers actuels)
    // et on garde des valeurs par défaut si absentes.
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

    <!-- CSS principal compilé (nginx sert /public comme racine) -->
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>

<header class="entete-site">
    <figure class="logo-site">
        <a href="/" class="lien-logo">🥢 Cookasian</a>
    </figure>

    <?php if (!empty($_SESSION['utilisateur'])): ?>
        <p class="message-bienvenue">
            Bienvenue, <?= htmlspecialchars($_SESSION['utilisateur']['email']) ?> 👋
        </p>
    <?php endif; ?>

    <nav class="menu-principal">
        <ul class="liste-nav">
            <li><a href="/" class="lien-nav <?= (isset($pageActive) && $pageActive === 'accueil') ? 'actif' : '' ?>">Accueil</a></li>
            <li><a href="/recettes" class="lien-nav <?= (isset($pageActive) && $pageActive === 'recettes') ? 'actif' : '' ?>">Recettes</a></li>
            <li><a href="/notre-histoire" class="lien-nav <?= (isset($pageActive) && $pageActive === 'histoire') ? 'actif' : '' ?>">Notre histoire</a></li>

            <?php if (!empty($_SESSION['utilisateur'])): ?>
                <li><a href="/deconnexion" class="lien-nav bouton">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="/connexion" class="lien-nav bouton <?= (isset($pageActive) && $pageActive === 'connexion') ? 'actif' : '' ?>">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main class="contenu-principal">
