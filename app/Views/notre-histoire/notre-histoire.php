<section class="histoire-intro">
    <article class="contenu-histoire">
        <h1 class="titre-page">Notre histoire</h1>
        <p class="texte-intro">
            Cookasian est né d’une idée simple : partager la passion des recettes asiatiques de manière accessible et authentique.
        </p>
        <p class="texte-intro">
            Ce site est avant tout une aventure humaine, inspirée par les saveurs de l’Asie, les rencontres et la transmission du savoir-faire culinaire.
        </p>
    </article>
</section>

<section class="histoire-valeurs">
    <header>
        <h2 class="titre-section">Nos valeurs</h2>
        <p class="texte-intro">
            Chaque recette, chaque image, chaque mot reflète l’esprit Cookasian : sincérité, partage et simplicité.
        </p>
    </header>

    <ul class="liste-valeurs">

        <!-- VALEUR 1 : PARTAGE -->
        <li>
            <article class="carte-valeur">
                <figure>

                    <?php
                        $img = "partage.webp";
                        $base = "/assets/images/accueil";
                    ?>

                    <img 
                        class="image-valeur"
                        src="<?= $base ?>/<?= $img ?>"
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "
                        sizes="(max-width: 480px) 322px,
                               (max-width: 900px) 600px,
                               1200px"
                        fetchpriority="high"
                        alt="Table asiatique partagée entre amis">
                    
                    <figcaption>Le partage</figcaption>
                </figure>

                <p class="texte-valeur">
                    Cuisiner, c’est rassembler. Nous croyons que la cuisine rapproche les gens, peu importe leurs origines.
                </p>
            </article>
        </li>

        <!-- VALEUR 2 : SIMPLICITÉ -->
        <li>
            <article class="carte-valeur">
                <figure>
                    <?php $img = "simplicite.webp"; ?>

                    <img 
                        class="image-valeur"
                        src="<?= $base ?>/<?= $img ?>"
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "
                        sizes="(max-width: 480px) 322px,
                               (max-width: 900px) 600px,
                               1200px"
                        loading="lazy"
                        alt="Bol de riz et baguettes en bois sur une table claire">

                    <figcaption>La simplicité</figcaption>
                </figure>

                <p class="texte-valeur">
                    Pas besoin de techniques compliquées : la beauté d’un plat réside dans la sincérité de ses ingrédients.
                </p>
            </article>
        </li>

        <!-- VALEUR 3 : AUTHENTICITÉ -->
        <li>
            <article class="carte-valeur">
                <figure>
                    <?php $img = "authenticite.webp"; ?>

                    <img 
                        class="image-valeur"
                        src="<?= $base ?>/<?= $img ?>"
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "
                        sizes="(max-width: 480px) 322px,
                               (max-width: 900px) 600px,
                               1200px"
                        loading="lazy"
                        alt="Cuisine asiatique traditionnelle au wok">

                    <figcaption>L’authenticité</figcaption>
                </figure>

                <p class="texte-valeur">
                    Nous restons fidèles aux traditions tout en les adaptant aux cuisines modernes et à la vie quotidienne.
                </p>
            </article>
        </li>

    </ul>
</section>

<section class="histoire-conclusion">
    <article class="bloc-conclusion">
        <h2 class="titre-section">Un mot pour toi</h2>
        <p class="texte-intro">
            Que tu sois passionné ou débutant, Cookasian t’accompagne pour faire voyager tes papilles et ton cœur.
        </p>
    </article>
</section>
