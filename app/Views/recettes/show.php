<?php
use Cookasian\Models\FavorisModel;

$estConnecte = !empty($_SESSION['utilisateur']['id'] ?? null);
$estFavori = false;

// Vérifie si la recette est en favoris
if ($estConnecte && !empty($recette['id'])) {
    $favorisModel = new FavorisModel();
    $estFavori = $favorisModel->estFavori(
        (int)$_SESSION['utilisateur']['id'],
        (int)$recette['id']
    );
}

// normalisation du chemin image
$image = $recette['image_url'];
if (!str_starts_with($image, '/assets/')) {
    $image = '/assets/images/recettes/' . $image;
}
?>

<article class="recette">

    <header class="entete-recette">
        <h1><?= htmlspecialchars($recette['titre']) ?></h1>
    </header>

    <figure class="image-recette">
        <img 
            src="<?= htmlspecialchars($image) ?>" 
            alt="<?= htmlspecialchars($recette['titre']) ?>">
        <figcaption>
            Recette <?= htmlspecialchars($recette['titre']) ?> (<?= htmlspecialchars($recette['pays_origine']) ?>)
        </figcaption>
    </figure>

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

    <section class="favori-recette">
        <?php if ($estConnecte && !empty($recette['id'])): ?>
            <footer class="actions-recette">

                <?php if ($estFavori): ?>
                    <div class="boutons-favoris">
                        <a class="bouton clair" 
                           href="/favoris/supprimer/<?= (int)$recette['id'] ?>">
                            💔 Retirer des favoris
                        </a>
                        <a class="bouton secondaire" href="/mon-compte">
                            ⭐ Voir mes favoris
                        </a>
                    </div>

                <?php else: ?>
                    <div class="boutons-favoris">
                        <a class="bouton primaire" 
                           href="/favoris/ajouter/<?= (int)$recette['id'] ?>">
                            ❤️ Ajouter aux favoris
                        </a>
                        <a class="bouton secondaire" href="/mon-compte">
                            ⭐ Voir mes favoris
                        </a>
                    </div>
                <?php endif; ?>

            </footer>

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
                <li>
                    <?= htmlspecialchars($ingredient['quantite']) ?> <?= htmlspecialchars($ingredient['nom']) ?>
                </li>
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
