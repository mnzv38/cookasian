<?php include __DIR__ . '/../layout/header.php'; ?>

<main class="page-recette">
    <article class="recette-detail">
        <h1><?= htmlspecialchars($recette['titre']) ?></h1>
        <img src="<?= htmlspecialchars($recette['image_url']) ?>" alt="<?= htmlspecialchars($recette['titre']) ?>">
        <p><?= htmlspecialchars($recette['description']) ?></p>

        <ul>
            <li><strong>Pays :</strong> <?= htmlspecialchars($recette['pays_origine']) ?></li>
            <li><strong>Difficulté :</strong> <?= htmlspecialchars($recette['difficulte']) ?></li>
            <li><strong>Préparation :</strong> <?= htmlspecialchars($recette['temps_preparation']) ?> min</li>
            <li><strong>Cuisson :</strong> <?= htmlspecialchars($recette['temps_cuisson']) ?> min</li>
        </ul>
    </article>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
