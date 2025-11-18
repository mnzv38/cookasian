<section class="section-recettes">

    <!-- Petit bloc d’intro + tri (simple, clair pour l'utilisateur) -->
    <header class="entete-recettes">
        <h1>Toutes les recettes</h1>

        <!-- Texte d’accroche pour contextualiser -->
        <p>
            Découvrez nos spécialités asiatiques classées selon votre préférence de tri.
        </p>

        <!-- Formulaire GET très léger (pas d’AJAX, juste rechargement naturel) -->
        <form method="get" class="form-tri-recettes">
            <label class="label-tri-recettes">
                Trier par :

                <!-- Le onchange submit est OK ici, logique et simple -->
                <select name="tri" class="select-tri-recettes" onchange="this.form.submit()">

                    <option value="pays" <?= ($_GET['tri'] ?? '') === 'pays' ? 'selected' : '' ?>>
                        Pays d’origine (A–Z)
                    </option>

                    <option value="titre" <?= ($_GET['tri'] ?? '') === 'titre' ? 'selected' : '' ?>>
                        Nom de la recette (A–Z)
                    </option>

                    <option value="difficulte" <?= ($_GET['tri'] ?? '') === 'difficulte' ? 'selected' : '' ?>>
                        Difficulté
                    </option>

                    <option value="preparation" <?= ($_GET['tri'] ?? '') === 'preparation' ? 'selected' : '' ?>>
                        Temps de préparation
                    </option>

                    <option value="cuisson" <?= ($_GET['tri'] ?? '') === 'cuisson' ? 'selected' : '' ?>>
                        Temps de cuisson
                    </option>

                    <option value="recentes" <?= ($_GET['tri'] ?? '') === 'recentes' ? 'selected' : '' ?>>
                        Les plus récentes
                    </option>

                </select>
            </label>
        </form>
    </header>

    <?php if (!empty($recettes)): ?>

        <!-- Liste sémantique des recettes -->
        <ul class="liste-recettes">

            <?php foreach ($recettes as $recette): ?>

                <?php
                // Je récupère le nom du fichier image proprement
                $filename = htmlspecialchars($recette['image_url']);

                // Versions responsives déjà prêtes dans mes dossiers
                $img400  = "/assets/images/recettes/400/{$filename}";
                $img800  = "/assets/images/recettes/800/{$filename}";
                $img1200 = "/assets/images/recettes/1200/{$filename}";

                // Version fallback s'il n'y a pas de srcset compatible
                $imgFallback = "/assets/images/recettes/{$filename}";
                ?>

                <li class="item-recette">

                    <!-- Carte recette (structure simple) -->
                    <article class="carte-recette">

                        <!-- Image principale -->
                        <figure class="image-recette">

                            <!-- Lien vers la page de la recette -->
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">

                                <!-- Image responsive -->
                                <img
                                    src="<?= $imgFallback ?>"
                                    srcset="
                                        <?= $img400 ?> 400w,
                                        <?= $img800 ?> 800w,
                                        <?= $img1200 ?> 1200w
                                    "
                                    sizes="(max-width: 480px) 354px,
                                           (max-width: 900px) 700px,
                                           1200px"
                                    alt="<?= htmlspecialchars($recette['titre']) ?>"
                                    loading="lazy"> <!-- petit ajout safe pour les performances -->
                            </a>

                            <!-- Titre sous l’image -->
                            <figcaption><?= htmlspecialchars($recette['titre']) ?></figcaption>
                        </figure>

                        <!-- Informations principales de la recette -->
                        <div class="contenu-recette">

                            <!-- Description courte -->
                            <p><?= htmlspecialchars($recette['description']) ?></p>

                            <!-- Détails (pays, difficulté, temps...) -->
                            <ul class="infos-recette">
                                <li>Pays : <?= htmlspecialchars($recette['pays_origine']) ?></li>
                                <li>Difficulté : <?= htmlspecialchars($recette['difficulte']) ?></li>
                                <li>Préparation : <?= htmlspecialchars($recette['temps_preparation']) ?> min</li>
                                <li>Cuisson : <?= htmlspecialchars($recette['temps_cuisson']) ?> min</li>
                            </ul>

                            <!-- Lien vers la fiche complète -->
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']) ?>" class="lien-recette">
                                Voir la recette →
                            </a>
                        </div>

                    </article>

                </li>

            <?php endforeach; ?>

        </ul>

    <?php else: ?>

        <!-- Cas où il n'y a aucune recette -->
        <p>Aucune recette disponible pour le moment.</p>

    <?php endif; ?>

</section>
