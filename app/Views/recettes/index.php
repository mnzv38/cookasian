<?php include __DIR__ . '/../layout/header.php'; ?>

<section class="section-recettes">
    <header class="entete-recettes">
        <h1>Toutes les recettes</h1>
        <p>
            Découvrez nos spécialités asiatiques classées par pays :
            Japon, Thaïlande, Vietnam, Chine et Corée.
        </p>
    </header>

    <?php if (!empty($recettes)): ?>
        <ul class="liste-recettes">
            <?php foreach ($recettes as $recette): ?>
                <li class="item-recette">
                    <article class="carte-recette">

                        <figure class="image-recette">
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">
                                <img 
                                    src="<?= htmlspecialchars($recette['image_url']) ?>" 
                                    alt="<?= htmlspecialchars($recette['titre']) ?>">
                            </a>
                            <figcaption><?= htmlspecialchars($recette['titre']) ?></figcaption>
                        </figure>

                        <div class="contenu-recette">
                            <p><?= htmlspecialchars($recette['description']) ?></p>

                            <ul class="infos-recette">
                                <li>Pays : <?= htmlspecialchars($recette['pays_origine']) ?></li>
                                <li>Difficulté : <?= htmlspecialchars($recette['difficulte']) ?></li>
                                <li>Préparation : <?= htmlspecialchars($recette['temps_preparation']) ?> min</li>
                                <li>Cuisson : <?= htmlspecialchars($recette['temps_cuisson']) ?> min</li>
                            </ul>

                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>" class="lien-recette">
                                Voir la recette →
                            </a>
                        </div>

                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune recette disponible pour le moment.</p>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
