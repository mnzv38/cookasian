<?php include __DIR__ . '/../layout/header.php'; ?>

<main id="contenu-principal">
    <section class="recettes" aria-labelledby="titre-recettes">
        <header class="recettes__header">
            <h1 id="titre-recettes">Toutes les recettes</h1>
            <p>Découvrez nos spécialités asiatiques classées par pays : Japon, Thaïlande, Vietnam, Chine et Corée.</p>
        </header>

        <!-- Liste sémantique des recettes -->
        <ul class="recettes__liste">
            <?php foreach ($recettes as $recette): ?>
                <li class="recettes__item">
                    <article class="carte-recette" itemscope itemtype="https://schema.org/Recipe">

                        <!-- Image et titre -->
                        <figure class="carte-recette__figure">
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>" title="Voir la recette complète de <?= htmlspecialchars($recette['titre']) ?>">
                                <img src="<?= htmlspecialchars($recette['image_url']) ?>"
                                     alt="Photo de <?= htmlspecialchars($recette['titre']) ?>"
                                     itemprop="image">
                            </a>
                            <figcaption itemprop="name"><?= htmlspecialchars($recette['titre']) ?></figcaption>
                        </figure>

                        <!-- Brève description -->
                        <div class="carte-recette__contenu">
                            <p class="carte-recette__description" itemprop="description">
                                <?= htmlspecialchars($recette['description']) ?>
                            </p>

                            <ul class="carte-recette__infos">
                                <li><strong>Pays :</strong> <span itemprop="recipeCuisine"><?= htmlspecialchars($recette['pays_origine']) ?></span></li>
                                <li><strong>Difficulté :</strong> <?= htmlspecialchars($recette['difficulte']) ?></li>
                                <li><strong>Préparation :</strong> <time datetime="PT<?= htmlspecialchars($recette['temps_preparation']) ?>M"><?= htmlspecialchars($recette['temps_preparation']) ?> min</time></li>
                                <li><strong>Cuisson :</strong> <time datetime="PT<?= htmlspecialchars($recette['temps_cuisson']) ?>M"><?= htmlspecialchars($recette['temps_cuisson']) ?> min</time></li>
                            </ul>

                            <!-- Lien vers la recette complète -->
                            <nav aria-label="Accès à la recette">
                                <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>"
                                   class="bouton bouton--primaire"
                                   title="Voir la recette de <?= htmlspecialchars($recette['titre']) ?>">
                                    Voir la recette →
                                </a>
                            </nav>
                        </div>

                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>
