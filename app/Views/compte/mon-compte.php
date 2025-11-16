<section class="page-compte">
    <article class="contenu-compte">

        <h1 class="titre-page">Mon espace personnel</h1>

        <?php if (!empty($utilisateur)): ?>
            <section class="infos-utilisateur">
                <h2>Mes informations</h2>

                <p class="info-ligne">
                    <span class="label">Nom :</span>
                    <span class="valeur"><?= htmlspecialchars($utilisateur['name']) ?></span>
                </p>

                <p class="info-ligne">
                    <span class="label">Email :</span>
                    <span class="valeur"><?= htmlspecialchars($utilisateur['email']) ?></span>
                </p>

                <a class="bouton secondaire" href="/mon-compte/modifier">
                    Modifier mes informations
                </a>
            </section>
        <?php endif; ?>

        <section class="favoris-utilisateur">
            <h2>Mes recettes favorites</h2>

            <?php if (!empty($favoris)): ?>
                <ul class="liste-favoris">
                    <?php foreach ($favoris as $recette): ?>
                        <li>
                            <article class="carte-recette">

                                <!-- IMAGE + TITRE -->
                                <figure class="image-recette">
                                    <img 
                                        src="<?= htmlspecialchars($baseUrl . '/assets/images/recettes/' . ltrim($recette['image_url'], '/')) ?>"
                                        alt="<?= htmlspecialchars($recette['titre']) ?>"
                                    >
                                    <figcaption><?= htmlspecialchars($recette['titre']) ?></figcaption>
                                </figure>

                                <!-- DESCRIPTION -->
                                <p class="contenu-recette">
                                    <?= htmlspecialchars($recette['description']) ?>
                                </p>

                                <!-- ========================= -->
                                <!--   ACTIONS FAVORIS — DESKTOP -->
                                <!-- ========================= -->
                                <footer class="infos-recette desktop-only">

                                    <a class="bouton primaire"
                                    href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">
                                        Voir la recette
                                    </a>

                                    <a class="bouton secondaire"
                                       href="/favoris/supprimer/<?= (int)$recette['id'] ?>">
                                        Retirer
                                    </a>

                                </footer>

                                <!-- ========================= -->
                                <!--   ACTIONS FAVORIS — MOBILE -->
                                <!-- ========================= -->
                                <nav class="infos-recette-mobile mobile-only">

                                    <a class="bouton primaire"
                                    href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">
                                        📃 Voir
                                    </a>

                                    <a class="bouton secondaire"
                                    href="/favoris/supprimer/<?= (int)$recette['id'] ?>">
                                        💔 Retirer
                                    </a>

                                </nav>

                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php else: ?>

                <p class="texte-compte">Tu n’as encore rien ajouté à tes favoris 💔</p>
                <a class="bouton primaire" href="/recettes">Découvrir les recettes</a>

            <?php endif; ?>
        </section>

    </article>
</section>

?>
