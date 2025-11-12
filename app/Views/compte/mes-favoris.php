<section class="page-favoris">
    <article class="contenu-favoris">
        <header class="entete-favoris">
            <h1 class="titre-page">Mes favoris</h1>
            <p class="texte-intro">
                Voici toutes les recettes que tu as ajoutées à tes favoris 🍜
            </p>
        </header>

        <?php if (!empty($favoris)): ?>
            <ul class="liste-favoris">
                <?php foreach ($favoris as $r): ?>
                    <li>
                        <article class="carte-recette">
                            <figure>
                                <img 
                                    class="image-recette" 
                                    src="<?= htmlspecialchars($r['image_url'] ?? '/assets/images/placeholder.jpg') ?>" 
                                    alt="<?= htmlspecialchars($r['titre']) ?>">
                                <figcaption><?= htmlspecialchars($r['titre']) ?></figcaption>
                            </figure>

                            <p class="contenu-recette">
                                <?= htmlspecialchars($r['description'] ?? 'Recette enregistrée dans tes favoris.') ?>
                            </p>

                            <footer class="infos-recette">
                                <a class="bouton" href="/recettes/<?= htmlspecialchars($r['slug']) ?>">Voir la recette</a>
                                <a class="bouton" href="/favoris/supprimer/<?= (int)$r['id'] ?>">Retirer</a>
                            </footer>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php else: ?>
            <div class="bloc-aucun-favori">
                <p class="texte-compte">
                    Tu n’as encore rien ajouté à tes favoris 💔
                </p>
                <p>
                    <a class="bouton" href="/recettes">Découvrir les recettes</a>
                </p>
            </div>
        <?php endif; ?>
    </article>
</section>
