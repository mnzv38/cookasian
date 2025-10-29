<section class="page-compte">
    <article class="carte-compte">
        <h1 class="titre-page">Mon compte</h1>

        <?php if (!empty($utilisateur)): ?>
            <p class="texte-compte">
                Tu es connecté avec l’adresse : <em><?= htmlspecialchars($utilisateur['email']) ?></em>
            </p>
        <?php else: ?>
            <p class="texte-compte">Tu es connecté.</p>
        <?php endif; ?>

        <section class="bloc-actions">
            <h2 class="titre-section">Actions rapides</h2>
            <ul class="liste-actions">
                <li><a class="bouton" href="/recettes">Voir les recettes</a></li>
                <li><a class="bouton" href="/deconnexion">Se déconnecter</a></li>
            </ul>
        </section>

        <section class="bloc-favoris">
            <h2 class="titre-section">Mes favoris</h2>

            <?php if (!empty($favoris)): ?>
                <ul class="liste-favoris">
                    <?php foreach ($favoris as $r): ?>
                        <li>
                            <article class="carte-recette">
                                <figure>
                                    <img class="image-recette" src="/assets/images/placeholder.jpg" alt="<?= htmlspecialchars($r['titre']) ?>">
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
                <p class="texte-compte">Aucun favori pour le moment.</p>
            <?php endif; ?>
        </section>
    </article>
</section>
