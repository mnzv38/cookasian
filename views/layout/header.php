<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription ?? 'COOKASIAN - Blog de recettes asiatiques'); ?>">
    <title><?php echo htmlspecialchars($pageTitle ?? 'COOKASIAN'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <header role="banner">
        <nav aria-label="Navigation principale">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/recettes">Recettes</a></li>
                <li><a href="/histoire">Notre histoire</a></li>
                <li><a href="/utilisateur">Connexion</a></li>
            </ul>
        </nav>
    </header>
    
    <main id="contenu" tabindex="-1">