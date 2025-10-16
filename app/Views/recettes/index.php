<section aria-labelledby="titre-recettes">
    <h1 id="titre-recettes">Nos recettes asiatiques</h1>
    
    <p>Explorez notre collection de <strong><?php echo $totalRecettes; ?> recettes</strong> authentiques venues de toute l'Asie.</p>
    
    <?php if (empty($recettes)): ?>
        <p>Aucune recette disponible pour le moment.</p>
    <?php else: ?>
        <ul class="liste-recettes">
            <?php foreach ($recettes as $recette): ?>
                <li class="carte-recette">
                    <article>
                        <figure>
                            <img 
                                src="<?php echo htmlspecialchars($recette['image_url']); ?>" 
                                alt="<?php echo htmlspecialchars($recette['titre']); ?> - Recette <?php echo htmlspecialchars($recette['pays_origine']); ?>"
                                width="375"
                                height="250"
                                loading="lazy"
                            >
                            <figcaption class="visually-hidden">
                                Photo de <?php echo htmlspecialchars($recette['titre']); ?>
                            </figcaption>
                        </figure>
                        
                        <h2><?php echo htmlspecialchars($recette['titre']); ?></h2>
                        
                        <p><?php echo htmlspecialchars($recette['description']); ?></p>
                        
                        <ul class="infos-recette" aria-label="Informations de la recette">
                            <li>
                                <strong>Pays :</strong> 
                                <?php echo htmlspecialchars($recette['pays_origine']); ?>
                            </li>
                            <li>
                                <strong>Préparation :</strong> 
                                <?php echo $recette['temps_preparation']; ?> min
                            </li>
                            <li>
                                <strong>Cuisson :</strong> 
                                <?php echo $recette['temps_cuisson']; ?> min
                            </li>
                            <li>
                                <strong>Difficulté :</strong> 
                                <?php echo ucfirst(htmlspecialchars($recette['difficulte'])); ?>
                            </li>
                            <li>
                                <strong>Pour :</strong> 
                                <?php echo $recette['nombre_personnes']; ?> personne<?php echo $recette['nombre_personnes'] > 1 ? 's' : ''; ?>
                            </li>
                        </ul>
                        
                        <a 
                            href="/recette/<?php echo htmlspecialchars($recette['slug']); ?>" 
                            class="bouton-principal"
                            aria-label="Voir la recette complète de <?php echo htmlspecialchars($recette['titre']); ?>"
                        >
                            Voir la recette
                        </a>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>