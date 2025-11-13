<section class="section-recettes">
    <header class="entete-recettes">
        <h1>Toutes les recettes</h1>
        <p>
            Découvrez nos spécialités asiatiques classées selon votre préférence de tri.
        </p>

        <form method="get" class="form-tri-recettes">
            <label>Trier par :</label>
            <select name="tri" onchange="this.form.submit()">
                <option value="pays" <?= ($_GET['tri'] ?? '') === 'pays' ? 'selected' : '' ?>>Pays d’origine (A–Z)</option>
                <option value="titre" <?= ($_GET['tri'] ?? '') === 'titre' ? 'selected' : '' ?>>Nom de la recette (A–Z)</option>
                <option value="difficulte" <?= ($_GET['tri'] ?? '') === 'difficulte' ? 'selected' : '' ?>>Difficulté</option>
                <option value="preparation" <?= ($_GET['tri'] ?? '') === 'preparation' ? 'selected' : '' ?>>Temps de préparation</option>
                <option value="cuisson" <?= ($_GET['tri'] ?? '') === 'cuisson' ? 'selected' : '' ?>>Temps de cuisson</option>
                <option value="recentes" <?= ($_GET['tri'] ?? '') === 'recentes' ? 'selected' : '' ?>>Les plus récentes</option>
            </select>
        </form>
    </header>

    <?php if (!empty($recettes)): ?>
        <ul class="liste-recettes">
            <?php foreach ($recettes as $recette): ?>

                <?php
                // normalisation du chemin image
                $image = $recette['image_url'];
                if (!str_starts_with($image, '/assets/')) {
                    $image = '/assets/images/recettes/' . $image;
                }
                ?>

                <li class="item-recette">
                    <article class="carte-recette">

                        <figure class="image-recette">
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">
                                <img 
                                    src="<?= htmlspecialchars($image) ?>" 
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
