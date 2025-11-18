<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    // Je prépare ici mon titre et ma meta description pour le SEO
    $meta = isset($metaDescription) ? (string)$metaDescription : "Cookasian - Blog de recettes asiatiques authentiques";
    $pageName = isset($title) ? (string)$title : "Accueil";
    $ttl = $pageName . " - Cookasian";
    $baseUrl = "http://cookasian.localhost:8080";
    ?>

    <meta name="description" content="<?= htmlspecialchars($meta) ?>">
    <title><?= htmlspecialchars($ttl) ?></title>

    <!-- Petite icône du site -->
    <link 
        rel="icon"
        href="data:image/svg+xml,
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'>
            <text y='0.9em' font-size='80'>🥢</text>
        </svg>"
    >

    <!-- Préchargement et chargement du CSS principal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preload" href="<?= $baseUrl ?>/assets/css/main.css" as="style">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/main.css">

    <!-- Petit script pour la lightbox (rien de compliqué) -->
    <script src="/assets/js/lightbox.js" defer></script>
</head>

<body>

<?php if (!empty($_SESSION['flash_message'])): ?>
    <?php
        // Je récupère mon message temporaire pour l’afficher en haut de la page
        $flashMessage = (string) $_SESSION['flash_message'];
        $flashClass = str_contains($flashMessage, 'ajoutée')
            ? 'flash-ajout'
            : 'flash-suppression';
    ?>
    <div class="flash-message <?= $flashClass ?>">
        <p><?= htmlspecialchars($flashMessage) ?></p>
        <button class="fermer-toast">×</button>
    </div>
    <?php unset($_SESSION['flash_message']); ?>
<?php endif; ?>

<header class="entete-site">

    <!-- Mon logo en version simple -->
    <figure class="logo-site">
        <a href="<?= $baseUrl ?>/" class="lien-logo">🥢 Cookasian</a>
    </figure>

    <!-- Menu principal du site -->
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

    <!-- Petite zone utilisateur (connecté / pas connecté) -->
    <div class="zone-utilisateur">
        <?php if (!empty($_SESSION['utilisateur'])): ?>
            <p class="nom-utilisateur">
                <?= htmlspecialchars($_SESSION['utilisateur']['name']) ?> 🟢
            </p>
            <a class="btn-deconnexion" href="<?= $baseUrl ?>/deconnexion">Déconnexion</a>
        <?php else: ?>
            <a class="btn-connexion" href="<?= $baseUrl ?>/connexion">Connexion</a>
        <?php endif; ?>
    </div>
</header>

<?php require __DIR__ . '/nav-mobile.php'; ?>

<script>
// Petit script fermer le message flash correspondant au toast
document.addEventListener("click", function(e) {
  if (e.target.classList.contains("fermer-toast")) {
      e.target.parentElement.style.display = "none";
  }
});
</script>
