<section class="page-compte">
    <article class="contenu-compte">
        <h1 class="titre-page">Mon espace personnel</h1>

        <?php if (!empty($utilisateur)): ?>
            <section class="infos-utilisateur">
                <h2>Mes informations</h2>
                <p>Nom : <strong><?= htmlspecialchars($utilisateur['name']) ?></strong></p>
                <p>Email : <strong><?= htmlspecialchars($utilisateur['email']) ?></strong></p>

                <a class="bouton secondaire" href="#">Modifier mes informations</a>
            </section>
        <?php endif; ?>

        <section class="favoris-utilisateur">
            <h2>Mes recettes favorites</h2>

            <?php if (!empty($favoris)): ?>
                <ul class="liste-favoris">
                    <?php foreach ($favoris as $recette): ?>
                        <li>
                            <article class="carte-recette">
                                <figure>
                                    <img class="image-recette" src="<?= htmlspecialchars($recette['image_url'] ?? '/assets/images/placeholder.jpg') ?>" alt="<?= htmlspecialchars($recette['titre']) ?>">
                                    <figcaption><?= htmlspecialchars($recette['titre']) ?></figcaption>
                                </figure>
                                <p class="contenu-recette">
                                    <?= htmlspecialchars($recette['description'] ?? 'Recette enregistrée dans tes favoris.') ?>
                                </p>
                                <footer class="infos-recette">
                                    <a class="bouton primaire" href="/recettes/<?= htmlspecialchars($recette['slug']) ?>">Voir la recette</a>
                                    <a class="bouton secondaire" href="/favoris/supprimer/<?= (int)$recette['id'] ?>">Retirer</a>
                                </footer>
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
