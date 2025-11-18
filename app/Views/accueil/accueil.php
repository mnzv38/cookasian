<!-- Bandeau d’accueil (le grand bloc visuel du haut) -->
<section class="bandeau-accueil">
    <article class="contenu-hero">

        <!-- Titre principal de la page -->
        <h1 class="titre-hero">Explore la cuisine asiatique, simplement.</h1>

        <!-- Petit texte d’intro qui accompagne le titre -->
        <p class="texte-hero">
            Des recettes authentiques, faciles à refaire à la maison, pour voyager depuis ta cuisine.
        </p>

        <!-- Deux boutons d’action principaux -->
        <footer class="actions-hero">
            <a href="/recettes" class="bouton clair">Voir les recettes</a>
            <a href="/notre-histoire" class="bouton sombre">Notre histoire</a>
        </footer>
    </article>
</section>


<!-- Bloc : recettes populaires affichées sur l’accueil -->
<section class="recettes-populaires">

    <!-- En-tête de la section (titre + petite intro) -->
    <header class="entete-recettes">
        <h2 class="titre-section">Recettes populaires</h2>
        <p class="texte-intro">
            Quelques idées pour commencer ton voyage gustatif.
        </p>
    </header>

    <?php if (!empty($recettesPopulaires)): ?>
        <ul class="liste-recettes">

            <?php foreach ($recettesPopulaires as $index => $recette): ?>

                <?php
                    // Je prépare l’URL de l’image au cas où elle ne commencerait pas déjà par /assets/
                    $image = $recette['image_url'] ?? '';
                    if (!str_starts_with($image, '/assets/')) {
                        $image = '/assets/images/recettes/' . $image;
                    }
                ?>

                <li>
                    <article class="carte-recette">

                        <figure class="image-recette">

                            <!-- L’image seule est cliquable -->
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']); ?>" class="lien-image-recette">

                                <!-- Image de la recette (chargée en lazy pour le confort) -->
                                <img
                                    src="<?= htmlspecialchars($image); ?>"
                                    alt="<?= htmlspecialchars($recette['titre']); ?>"
                                    width="600"
                                    height="400"
                                    loading="lazy"
                                >

                            </a>

                            <!-- Titre sous l’image (non cliquable pour éviter le doublon) -->
                            <figcaption><?= htmlspecialchars($recette['titre']); ?></figcaption>
                        </figure>

                        <!-- Petite description de la recette -->
                        <p class="contenu-recette">
                            <?= htmlspecialchars($recette['description']); ?>
                        </p>

                        <!-- Bouton pour aller sur la fiche recette -->
                        <footer class="infos-recette">
                            <a href="/recettes/<?= htmlspecialchars($recette['slug']); ?>" class="bouton sombre">
                                Découvrir
                            </a>
                        </footer>

                    </article>
                </li>

            <?php endforeach; ?>

        </ul>

    <?php else: ?>
        <!-- Message si aucune recette n'est renvoyée -->
        <p class="message-vide">Aucune recette disponible pour le moment.</p>
    <?php endif; ?>

    <!-- Bouton global pour voir toute la liste -->
    <footer class="actions-section">
        <a href="/recettes" class="bouton clair">Voir toutes les recettes</a>
    </footer>
</section>


<!-- Dernier bloc : petite présentation de la philosophie du site -->
<section class="a-propos">
    <article class="bloc-texte">

        <h2 class="titre-section">Notre philosophie</h2>

        <!-- Texte sur l’esprit du site -->
        <p class="texte-intro">
            Cookasian est né d’un amour commun pour la cuisine asiatique et la simplicité.
            Ici, on partage des recettes authentiques, testées et expliquées pas à pas, sans artifice.
        </p>

        <p class="texte-intro">
            L’idée : cuisiner avec le cœur, sans se compliquer la vie.
        </p>

        <!-- Bouton vers la page “Notre histoire” -->
        <footer class="actions-section">
            <a href="/notre-histoire" class="bouton sombre">En savoir plus</a>
        </footer>
    </article>
</section>
