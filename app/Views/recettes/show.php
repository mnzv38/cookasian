<?php
use Cookasian\Models\FavorisModel;

// Vérifie si l’utilisateur est connecté
$estConnecte = !empty($_SESSION['utilisateur']['id'] ?? null);
$estFavori = false;

// Si connecté et recette valide, on vérifie si elle est en favoris
if ($estConnecte && !empty($recette['id'])) {
    $favorisModel = new FavorisModel();
    $estFavori = $favorisModel->estFavori(
        (int)$_SESSION['utilisateur']['id'],
        (int)$recette['id']
    );
}
?>

<article class="recette">

    <!-- Titre principal -->
    <header class="entete-recette">
        <h1><?= htmlspecialchars($recette['titre']) ?></h1>
    </header>

    <!-- Image principale -->
    <figure class="image-recette">
        <img 
            src="<?= htmlspecialchars($recette['image_url']) ?>" 
            alt="<?= htmlspecialchars($recette['titre']) ?>">
        <figcaption>
            Recette <?= htmlspecialchars($recette['titre']) ?> (<?= htmlspecialchars($recette['pays_origine']) ?>)
        </figcaption>
    </figure>

    <!-- Informations pratiques -->
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

    <!-- Description -->
    <section class="description-recette">
        <h2>Description</h2>
        <p><?= nl2br(htmlspecialchars($recette['description'])) ?></p>
    </section>

    <!-- Favori -->
    <section class="favori-recette">
        <?php if ($estConnecte && !empty($recette['id'])): ?>
            <footer class="actions-recette">
                <?php if ($estFavori): ?>
                    <div class="boutons-favoris">
                        <a class="bouton clair" href="/favoris/supprimer/<?= (int)$recette['id'] ?>">💔 Retirer des favoris</a>
                        <a class="bouton secondaire" href="/mes-favoris">⭐ Voir mes favoris</a>
                    </div>
                <?php else: ?>
                    <a class="bouton primaire" href="/favoris/ajouter/<?= (int)$recette['id'] ?>">❤️ Ajouter aux favoris</a>
                <?php endif; ?>
            </footer>
        <?php else: ?>
            <p class="texte-intro">
                Connecte-toi pour ajouter cette recette à tes favoris.
                <a class="bouton" href="/connexion">Se connecter</a>
            </p>
        <?php endif; ?>
    </section>

    <!-- Ingrédients -->
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

    <!-- Étapes de préparation -->
    <section class="etapes-recette">
        <h2>Préparation</h2>
        <ol>
            <?php foreach ($recette['etapes'] as $etape): ?>
                <li><?= htmlspecialchars($etape['description']) ?></li>
            <?php endforeach; ?>
        </ol>
    </section>

    <!-- Lien de retour -->
    <nav class="navigation-recette">
        <a href="/recettes" class="bouton-retour">← Retour à la liste des recettes</a>
    </nav>

</article>
