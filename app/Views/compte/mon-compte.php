<section class="page-compte">
    <article class="contenu-compte">

        <!-- Titre principal de l'espace utilisateur -->
        <h1 class="titre-page">Mon espace personnel</h1>

        <?php if (!empty($utilisateur)): ?>

            <section class="infos-utilisateur">
                <h2>Mes informations</h2>

                <!-- Ligne d'info simple : j'évite <span> partout → sémantique + lisible -->
                <p class="info-ligne">
                    <strong class="label">Nom :</strong>
                    <?= htmlspecialchars($utilisateur['name']) ?>
                </p>

                <p class="info-ligne">
                    <strong class="label">Email :</strong>
                    <?= htmlspecialchars($utilisateur['email']) ?>
                </p>

                <!-- Lien modification profil -->
                <a class="bouton secondaire" href="/mon-compte/modifier">
                    Modifier mes informations
                </a>

                <!-- Version mobile : bouton déconnexion dédié -->
                <a class="bouton secondaire bouton-deconnexion-mobile mobile-only" href="/deconnexion">
                    Déconnexion
                </a>

            </section>

        <?php endif; ?>

        <!-- ============================================================
             SECTION FAVORIS UTILISATEUR
        ============================================================= -->
        <section class="favoris-utilisateur">
            <h2>Mes recettes favorites</h2>

            <?php if (!empty($favoris)): ?>

                <ul class="liste-favoris">

                    <?php foreach ($favoris as $recette): ?>
                        <li>
                            <article class="carte-recette">

                                <!-- Image + titre -->
                                <figure class="image-recette">

                                    <!-- Image de la recette → ajout lazy pour perf -->
                                    <img 
                                        src="<?= htmlspecialchars($baseUrl . '/assets/images/recettes/' . ltrim($recette['image_url'], '/')) ?>"
                                        loading="lazy"
                                        alt="<?= htmlspecialchars($recette['titre']) ?>"
                                    >

                                    <figcaption><?= htmlspecialchars($recette['titre']) ?></figcaption>
                                </figure>

                                <!-- Description courte -->
                                <p class="contenu-recette">
                                    <?= htmlspecialchars($recette['description']) ?>
                                </p>

                                <!-- Version desktop : deux boutons alignés -->
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

                                <!-- Version mobile : boutons compacts -->
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

                <!-- Au cas où aucun favori n'est enregistré -->
                <p class="texte-compte">Tu n’as encore rien ajouté à tes favoris 💔</p>

                <a class="bouton primaire" href="/recettes">
                    Découvrir les recettes
                </a>

            <?php endif; ?>

        </section>

    </article>
</section>
?>
