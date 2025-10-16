<?php include __DIR__ . '/../layout/header.php'; ?>

<main id="contenu-principal">
    <article class="recette" itemscope itemtype="https://schema.org/Recipe">

        <!-- 🏷️ Titre principal -->
        <header class="recette__header">
            <h1 itemprop="name"><?= htmlspecialchars($recette['titre']) ?></h1>
        </header>

        <!-- 🖼️ Image principale -->
        <figure class="recette__image">
            <img src="<?= htmlspecialchars($recette['image_url']) ?>"
                 alt="Photo de <?= htmlspecialchars($recette['titre']) ?>"
                 itemprop="image">
            <figcaption>Recette <?= htmlspecialchars($recette['titre']) ?> — <?= htmlspecialchars($recette['pays_origine']) ?></figcaption>
        </figure>

        <!-- 🕒 Informations pratiques -->
        <section class="recette__infos" aria-labelledby="infos-recette">
            <h2 id="infos-recette">Informations</h2>
            <ul>
                <li><strong>Pays d’origine :</strong> <span itemprop="recipeCuisine"><?= htmlspecialchars($recette['pays_origine']) ?></span></li>
                <li><strong>Difficulté :</strong> <span itemprop="difficulty"><?= htmlspecialchars($recette['difficulte']) ?></span></li>
                <li><strong>Préparation :</strong> <time itemprop="prepTime" datetime="PT<?= htmlspecialchars($recette['temps_preparation']) ?>M"><?= htmlspecialchars($recette['temps_preparation']) ?> min</time></li>
                <li><strong>Cuisson :</strong> <time itemprop="cookTime" datetime="PT<?= htmlspecialchars($recette['temps_cuisson']) ?>M"><?= htmlspecialchars($recette['temps_cuisson']) ?> min</time></li>
                <li><strong>Portions :</strong> <span itemprop="recipeYield"><?= htmlspecialchars($recette['nombre_personnes']) ?> personnes</span></li>
            </ul>
        </section>

        <!-- 🧾 Description -->
        <section class="recette__description" aria-labelledby="desc-recette">
            <h2 id="desc-recette">Description</h2>
            <p itemprop="description"><?= nl2br(htmlspecialchars($recette['description'])) ?></p>
        </section>

        <!-- 🧂 Liste des ingrédients -->
        <section class="recette__ingredients" aria-labelledby="ingredients-recette">
            <h2 id="ingredients-recette">Ingrédients</h2>
            <ul itemprop="recipeIngredient">
                <?php foreach ($recette['ingredients'] as $ingredient): ?>
                    <li>
                        <span class="quantite"><?= htmlspecialchars($ingredient['quantite']) ?></span>
                        <span class="nom"><?= htmlspecialchars($ingredient['nom']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- 🍳 Étapes de préparation -->
        <section class="recette__etapes" aria-labelledby="etapes-recette">
            <h2 id="etapes-recette">Préparation</h2>
            <ol itemprop="recipeInstructions">
                <?php foreach ($recette['etapes'] as $etape): ?>
                    <li><?= htmlspecialchars($etape['description']) ?></li>
                <?php endforeach; ?>
            </ol>
        </section>

        <!-- 🔙 Lien de retour -->
        <nav class="recette__navigation" aria-label="Navigation secondaire">
            <a href="/recettes" class="bouton-retour">← Retour à la liste des recettes</a>
        </nav>

    </article>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
