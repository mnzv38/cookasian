<!-- Section Héro -->
<section class="hero">
    <h1>Découvrez les saveurs authentiques d'Asie</h1>
    <p>Des recettes traditionnelles et modernes pour voyager à travers la cuisine asiatique depuis votre cuisine.</p>

    <nav class="actions-hero">
        <a href="/recettes" class="bouton grand clair">
            Voir toutes les recettes →
        </a>
        <a href="/histoire" class="bouton grand secondaire">
            Notre histoire
        </a>
    </nav>
</section>


<!-- Section Recettes Populaires -->
<section class="recettes-populaires">
    <header class="entete-section">
        <h2>Recettes populaires</h2>
        <p>Découvrez nos recettes les plus appréciées par la communauté.</p>
    </header>

    <div class="grille-recettes">
        <?php if (!empty($recettes)): ?>
            <?php foreach ($recettes as $recette): ?>
                <article class="carte-recette">

                    <figure class="image-recette">
                        <img 
                            src="<?= htmlspecialchars($recette['image'] ?? '/assets/images/default-recette.jpg') ?>" 
                            alt="<?= htmlspecialchars($recette['titre']) ?>"
                        >
                        <?php if (!empty($recette['nouveau'])): ?>
                            <figcaption class="badge-nouveau">Nouveau</figcaption>
                        <?php endif; ?>
                    </figure>

                    <div class="contenu-recette">
                        <h3>
                            <a href="/recette/<?= htmlspecialchars($recette['slug']) ?>">
                                <?= htmlspecialchars($recette['titre']) ?>
                            </a>
                        </h3>

                        <p><?= htmlspecialchars($recette['description']) ?></p>

                        <ul class="infos-recette">
                            <li>⏱️ <?= htmlspecialchars($recette['temps']) ?> min</li>
                            <li>👨‍🍳 <?= htmlspecialchars($recette['difficulte']) ?></li>
                        </ul>
                    </div>

                    <footer class="bas-carte">
                        <a href="/recette/<?= htmlspecialchars($recette['slug']) ?>" class="lien-recette">
                            Voir la recette
                        </a>
                    </footer>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune recette disponible pour le moment.</p>
        <?php endif; ?>
    </div>

    <div class="actions-section">
        <a href="/recettes" class="bouton grand primaire">
            Voir toutes les recettes →
        </a>
    </div>
</section>


<!-- Section À propos -->
<section class="a-propos">
    <h2>À propos de Cookasian</h2>
    <p>
        Cookasian est né d'une passion pour la cuisine asiatique et le désir de partager 
        des recettes authentiques avec une communauté de passionnés.
    </p>
    <p>
        Nous croyons que la cuisine est un voyage, et chaque recette est une invitation 
        à découvrir de nouvelles saveurs, techniques et traditions.
    </p>
    <a href="/histoire" class="bouton secondaire">
        Découvrir notre histoire
    </a>
</section>


<!-- Section Appel à l’action -->
<section class="cta">
    <h2>Prêt à commencer votre voyage culinaire&nbsp;?</h2>
    <p>
        Inscrivez-vous pour sauvegarder vos recettes préférées et recevoir nos nouveautés.
    </p>
    <a href="/utilisateur" class="bouton grand primaire">
        Créer un compte ✨
    </a>
</section>
