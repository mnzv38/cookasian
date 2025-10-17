<!-- Section Héro -->
<section class="hero">
    <div class="hero__contenu">
        <h1 class="hero__titre">Découvrez les saveurs authentiques d'Asie</h1>
        <p class="hero__sous-titre">
            Des recettes traditionnelles et modernes pour voyager à travers la cuisine asiatique depuis votre cuisine.
        </p>
        <div class="hero__actions">
            <a href="/recettes" class="bouton bouton--grand hero__bouton--blanc">
                Voir toutes les recettes
                <span class="bouton__icone">→</span>
            </a>
            <a href="/histoire" class="bouton bouton--grand bouton--secondaire">
                Notre histoire
            </a>
        </div>
    </div>
</section>

<!-- Section Recettes Populaires -->
<section class="recettes-populaires">
    <div class="recettes-populaires__entete">
        <h2 class="recettes-populaires__titre">Recettes populaires</h2>
        <p class="recettes-populaires__description">
            Découvrez nos recettes les plus appréciées par la communauté
        </p>
    </div>
    
    <div class="recettes-populaires__grille">
        <?php if (!empty($recettes)): ?>
            <?php foreach ($recettes as $recette): ?>
                <article class="carte-recette">
                    <div class="carte-recette__image-conteneur">
                        <img 
                            src="<?= htmlspecialchars($recette['image'] ?? '/assets/images/default-recette.jpg') ?>" 
                            alt="<?= htmlspecialchars($recette['titre']) ?>"
                            class="carte-recette__image"
                        >
                        <?php if (!empty($recette['nouveau'])): ?>
                            <span class="carte-recette__badge">Nouveau</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="carte-recette__contenu">
                        <h3 class="carte-recette__titre">
                            <a href="/recette/<?= htmlspecialchars($recette['slug']) ?>">
                                <?= htmlspecialchars($recette['titre']) ?>
                            </a>
                        </h3>
                        
                        <p class="carte-recette__description">
                            <?= htmlspecialchars($recette['description']) ?>
                        </p>
                        
                        <div class="carte-recette__meta">
                            <span class="carte-recette__meta-item">
                                <span>⏱️</span>
                                <?= htmlspecialchars($recette['temps']) ?> min
                            </span>
                            <span class="carte-recette__meta-item">
                                <span>👨‍🍳</span>
                                <?= htmlspecialchars($recette['difficulte']) ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="carte-recette__footer">
                        <a href="/recette/<?= htmlspecialchars($recette['slug']) ?>" class="carte-recette__lien">
                            Voir la recette
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune recette disponible pour le moment.</p>
        <?php endif; ?>
    </div>
    
    <div class="recettes-populaires__actions">
        <a href="/recettes" class="bouton bouton--primaire bouton--grand">
            Voir toutes les recettes
            <span class="bouton__icone">→</span>
        </a>
    </div>
</section>

<!-- Section À propos -->
<section class="a-propos">
    <div class="a-propos__conteneur">
        <h2 class="a-propos__titre">À propos de Cookasian</h2>
        <p class="a-propos__texte">
            Cookasian est né d'une passion pour la cuisine asiatique et le désir de partager 
            des recettes authentiques avec une communauté de passionnés.
        </p>
        <p class="a-propos__texte">
            Nous croyons que la cuisine est un voyage, et chaque recette est une invitation 
            à découvrir de nouvelles saveurs, techniques et traditions.
        </p>
        <a href="/histoire" class="bouton bouton--secondaire">
            Découvrir notre histoire
        </a>
    </div>
</section>

<!-- Section CTA finale -->
<section class="cta">
    <h2 class="cta__titre">Prêt à commencer votre voyage culinaire ?</h2>
    <p class="cta__description">
        Inscrivez-vous pour sauvegarder vos recettes préférées et recevoir nos nouveautés.
    </p>
    <a href="/utilisateur" class="bouton bouton--primaire bouton--grand">
        Créer un compte
        <span class="bouton__icone">✨</span>
    </a>
</section>