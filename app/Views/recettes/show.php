<?php

use Cookasian\Models\FavorisModel;

// Vérifie la connexion utilisateur
$estConnecte = !empty($_SESSION['utilisateur']['id'] ?? null);
$estFavori = false;

// Favoris
if ($estConnecte && !empty($recette['id'])) {
    $favorisModel = new FavorisModel();
    $estFavori = $favorisModel->estFavori(
        (int)$_SESSION['utilisateur']['id'],
        (int)$recette['id']
    );
}

// Construction URL de l'image
$image = $baseUrl . '/assets/images/recettes/' . ltrim($recette['image_url'], '/');

?>

<article class="recette">

    <header class="entete-recette">
        <h1><?= htmlspecialchars($recette['titre']) ?></h1>
    </header>

    <figure class="image-recette">
        <img 
            class="image-zoomable"
            src="<?= htmlspecialchars($image) ?>" 
            alt="Photographie de la recette : <?= htmlspecialchars($recette['titre']) ?> – <?= htmlspecialchars($recette['description']) ?>"
        >
    </figure>

    <!-- LIGHTBOX -->
    <div class="lightbox" id="lightbox">
        <button class="lightbox-close" id="lightboxClose">✖</button>
        <img id="lightboxImg" src="" alt="">
    </div>

    <section class="infos-recette">
        <h2>Informations</h2>
        <ul>
            <li>Pays d’origine : <?= htmlspecialchars($recette['pays_origine']) ?></li>
            <li>Difficulté : <?= htmlspecialchars($recette['difficulte']) ?></li>
            <li>Préparation : <?= htmlspecialchars($recette['temps_preparation']) ?> min</li>
            <li>Cuisson : <?= htmlspecialchars($recette['temps_cuisson']) ?> min</li>
            <li>Portions : <?= htmlspecialchars($recette['nombre_personnes']) ?> personnes</li>
        </ul>
    </section>

    <section class="description-recette">
        <h2>Description</h2>
        <p><?= nl2br(htmlspecialchars($recette['description'])) ?></p>
    </section>

    <!-- ⭐ FAVORIS -->
    <section class="favori-recette">

        <?php if ($estConnecte): ?>

            <?php if ($estFavori): ?>

                <!-- VERSION DESKTOP -->
                <footer class="actions-recette desktop-only">
                    <a class="bouton clair" href="/favoris/supprimer/<?= (int)$recette['id'] ?>">
                        Retirer des favoris
                    </a>
                    <a class="bouton secondaire" href="/mon-compte">
                        Voir mes favoris
                    </a>
                </footer>

                <!-- VERSION MOBILE -->
                <nav class="actions-recette-mobile mobile-only">
                    <a class="bouton clair" href="/favoris/supprimer/<?= (int)$recette['id'] ?>">
                        💔 Retirer
                    </a>
                    <a class="bouton secondaire" href="/mon-compte">
                        📃 Voir
                    </a>
                </nav>

            <?php else: ?>

                <!-- VERSION DESKTOP -->
                <footer class="actions-recette desktop-only">
                    <a class="bouton primaire" href="/favoris/ajouter/<?= (int)$recette['id'] ?>">
                        Ajouter aux favoris
                    </a>
                    <a class="bouton secondaire" href="/mon-compte">
                        Voir mes favoris
                    </a>
                </footer>

                <!-- VERSION MOBILE -->
                <nav class="actions-recette-mobile mobile-only">
                    <a class="bouton primaire" href="/favoris/ajouter/<?= (int)$recette['id'] ?>">
                        ❤️ Ajouter
                    </a>
                    <a class="bouton secondaire" href="/mon-compte">
                        ⭐ Mes favoris
                    </a>
                </nav>

            <?php endif; ?>

        <?php else: ?>

            <div class="bloc-connexion-recette">
                <p class="texte-connexion">
                    Connecte-toi pour ajouter cette recette à tes favoris.
                </p>
                <a class="bouton primaire bouton-connexion" href="/connexion">
                    Se connecter
                </a>
            </div>

        <?php endif; ?>

    </section>

    <section class="ingredients-recette">
        <h2>Ingrédients</h2>
        <ul>
            <?php foreach ($recette['ingredients'] as $ingredient): ?>
                <li><?= htmlspecialchars($ingredient['quantite']) ?> <?= htmlspecialchars($ingredient['nom']) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="etapes-recette">
        <h2>Préparation</h2>
        <ol>
            <?php foreach ($recette['etapes'] as $etape): ?>
                <li><?= htmlspecialchars($etape['description']) ?></li>
            <?php endforeach; ?>
        </ol>
    </section>

    <nav class="navigation-recette">
        <a href="/recettes" class="bouton-retour">← Retour à la liste des recettes</a>
    </nav>

</article>

?>
