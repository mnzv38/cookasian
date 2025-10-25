<?php include __DIR__ . '/../layout/header.php'; ?>

<article class="recette">

    <!-- Titre principal -->
    <header class="entete-recette">
        <h1><?= htmlspecialchars($recette['titre']) ?></h1>
    </header>

    <!-- Image principale -->
    <figure class="image-recette">
        <img 
            src="<?= htmlspecialchars($recette['image_url']) ?>" 
            alt="<?= htmlspecialchars($recette['titre']) ?>">
        <figcaption>
            Recette <?= htmlspecialchars($recette['titre']) ?> (<?= htmlspecialchars($recette['pays_origine']) ?>)
        </figcaption>
    </figure>

    <!-- Informations pratiques -->
    <section class="infos-recette">
        <h2>Informations</h2>
        <ul>
            <li>Pays d’origine : <?= htmlspecialchars($recette['pays_origine']) ?></li>
            <li>Difficulté : <?= htmlspecialchars($recette['difficulte']) ?></li>
            <li>Préparation : <?= htmlspecialchars($recette['temps_preparation']) ?> min</li>
            <li>Cuisson : <?= htmlspecialchars($recette['temps_cuisson']) ?> min</li>
            <li>Portions : <?= htmlspecialchars($recette['nombre_personnes']) ?> personnes</li>
        </ul>
    </section>

    <!-- Description -->
    <section class="description-recette">
        <h2>Description</h2>
        <p><?= nl2br(htmlspecialchars($recette['description'])) ?></p>
    </section>

    <!-- Ingrédients -->
    <section class="ingredients-recette">
        <h2>Ingrédients</h2>
        <ul>
            <?php foreach ($recette['ingredients'] as $ingredient): ?>
                <li>
                    <?= htmlspecialchars($ingredient['quantite']) ?> <?= htmlspecialchars($ingredient['nom']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- Étapes de préparation -->
    <section class="etapes-recette">
        <h2>Préparation</h2>
        <ol>
            <?php foreach ($recette['etapes'] as $etape): ?>
                <li><?= htmlspecialchars($etape['description']) ?></li>
            <?php endforeach; ?>
        </ol>
    </section>

    <!-- Lien de retour -->
    <nav class="navigation-recette">
        <a href="/recettes" class="bouton-retour">← Retour à la liste des recettes</a>
    </nav>

</article>

<?php include __DIR__ . '/../layout/footer.php'; ?>
