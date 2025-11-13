<section class="bandeau-accueil">
    <article class="contenu-hero">
        <h1 class="titre-hero">Explore la cuisine asiatique, simplement.</h1>
        <p class="texte-hero">
            Des recettes authentiques, faciles à refaire à la maison, pour voyager depuis ta cuisine.
        </p>
        <footer class="actions-hero">
            <a href="/recettes" class="bouton clair">Voir les recettes</a>
            <a href="/notre-histoire" class="bouton sombre">Notre histoire</a>
        </footer>
    </article>
</section>

<section class="recettes-populaires">
    <header class="entete-recettes">
        <h2 class="titre-section">Recettes populaires</h2>
        <p class="texte-intro">
            Quelques idées pour commencer ton voyage gustatif.
        </p>
    </header>

    <?php if (!empty($recettesPopulaires)): ?>
        <ul class="liste-recettes">
            <?php foreach ($recettesPopulaires as $recette): ?>
                <li>
                    <article class="carte-recette">
                        <figure>
                            <img
                                class="image-recette"
                                src="<?php echo htmlspecialchars($recette['image_url']); ?>"
                                alt="<?php echo htmlspecialchars($recette['titre']); ?>">
                            <figcaption><?php echo htmlspecialchars($recette['titre']); ?></figcaption>
                        </figure>

                        <p class="contenu-recette">
                            <?php echo htmlspecialchars($recette['description']); ?>
                        </p>

                        <footer class="infos-recette">
                            <a href="/recettes/<?php echo htmlspecialchars($recette['slug']); ?>" class="bouton">
                                Découvrir
                            </a>
                        </footer>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="message-vide">Aucune recette disponible pour le moment.</p>
    <?php endif; ?>

    <footer class="actions-section">
        <a href="/recettes" class="bouton clair">Voir toutes les recettes</a>
    </footer>
</section>

<section class="a-propos">
    <article class="bloc-texte">
        <h2 class="titre-section">Notre philosophie</h2>
        <p class="texte-intro">
            Cookasian est né d’un amour commun pour la cuisine asiatique et la simplicité.
            Ici, on partage des recettes authentiques, testées et expliquées pas à pas, sans artifice.
        </p>
        <p class="texte-intro">
            L’idée : cuisiner avec le cœur, sans se compliquer la vie.
        </p>
        <footer class="actions-section">
            <a href="/notre-histoire" class="bouton sombre">En savoir plus</a>
        </footer>
    </article>
</section>
