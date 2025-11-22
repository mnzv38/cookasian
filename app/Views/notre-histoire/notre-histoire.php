<?php
/**
 * Page "Notre histoire"
 * 
 * Cette page présente :
 * - une introduction (titre + texte)
 * - trois valeurs sous forme de cartes (images + texte)
 * - une conclusion inspirante
 * 
 * Page entièrement statique, aucun traitement serveur.
 */
?>

<!-- ============================================================
     🧧 INTRODUCTION - première section visible de la page
     ============================================================ -->
<section class="histoire-intro">

    <!-- Conteneur centré du texte d’introduction -->
    <article class="contenu-histoire">

        <!-- Titre principal de la page -->
        <h1 class="titre-page">Notre histoire</h1>

        <!-- Premier paragraphe - introduction courte -->
        <p class="texte-intro">
            Cookasian est né d’une idée simple : partager la passion des recettes asiatiques de manière accessible et authentique.
        </p>

        <!-- Deuxième paragraphe - précise le contexte humain du projet -->
        <p class="texte-intro">
            Ce site est avant tout une aventure humaine, inspirée par les saveurs de l’Asie, les rencontres et la transmission du savoir-faire culinaire.
        </p>

    </article>
</section>


<!-- ============================================================
     ❤️ NOS VALEURS - 3 cartes avec images responsive
     ============================================================ -->
<section class="histoire-valeurs">

    <!-- En-tête de la section (titre + texte d’intro) -->
    <header>
        <h2 class="titre-section">Nos valeurs</h2>

        <p class="texte-intro">
            Chaque recette, chaque image, chaque mot reflète l’esprit Cookasian : sincérité, partage et simplicité.
        </p>
    </header>

    <!-- Liste UL contenant les trois valeurs → structure sémantique propre -->
    <ul class="liste-valeurs">

        <?php
        // 📌 Chemin commun des images pour éviter les répétitions
        $base = "/assets/images/accueil";
        ?>

        <!-- ============================================================
             🥢 VALEUR 1 : PARTAGE
             ============================================================ -->
        <li>
            <!-- Carte complète de la valeur -->
            <article class="carte-valeur">

                <!-- Conteneur de l’image + légende -->
                <figure>

                    <!-- Nom du fichier image -->
                    <?php $img = "partage.webp"; ?>

                    <!-- Image responsive (3 tailles servies selon l’écran) -->
                    <img
                        class="image-valeur"
                        src="<?= $base ?>/400/<?= $img ?>"  
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "                                  
                        sizes="(max-width: 480px) 320px,
                               (max-width: 900px) 600px,
                               1200px"                       
                        fetchpriority="high"                
                        alt="Repas asiatique partagé entre amis autour d’une table chaleureuse">

                    <!-- Titre court sous l’image -->
                    <figcaption>Le partage</figcaption>
                </figure>

                <!-- Petit texte explicatif de la valeur -->
                <p class="texte-valeur">
                    Cuisiner, c’est rassembler. Nous croyons que la cuisine rapproche les gens, peu importe leurs origines.
                </p>

            </article>
        </li>


        <!-- ============================================================
             🌿 VALEUR 2 : SIMPLICITÉ
             ============================================================ -->
        <li>
            <article class="carte-valeur">
                <figure>

                    <!-- Nom de l'image pour cette valeur -->
                    <?php $img = "simplicite.webp"; ?>

                    <!-- Image responsive (lazy loading pour performance) -->
                    <img
                        class="image-valeur"
                        src="<?= $base ?>/400/<?= $img ?>"
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "
                        sizes="(max-width: 480px) 320px,
                               (max-width: 900px) 600px,
                               1200px"
                        loading="lazy"  
                        alt="Bol de riz simple avec baguettes en bois sur une table épurée">

                    <figcaption>La simplicité</figcaption>
                </figure>

                <!-- Texte de la valeur -->
                <p class="texte-valeur">
                    Pas besoin de techniques compliquées : la beauté d’un plat réside dans la sincérité de ses ingrédients.
                </p>

            </article>
        </li>


        <!-- ============================================================
             🔥 VALEUR 3 : AUTHENTICITÉ
             ============================================================ -->
        <li>
            <article class="carte-valeur">
                <figure>

                    <!-- Nom de l'image -->
                    <?php $img = "authenticite.webp"; ?>

                    <!-- Image responsive -->
                    <img
                        class="image-valeur"
                        src="<?= $base ?>/400/<?= $img ?>"
                        srcset="
                            <?= $base ?>/400/<?= $img ?> 400w,
                            <?= $base ?>/800/<?= $img ?> 800w,
                            <?= $base ?>/1200/<?= $img ?> 1200w
                        "
                        sizes="(max-width: 480px) 320px,
                               (max-width: 900px) 600px,
                               1200px"
                        loading="lazy"
                        alt="Cuisson au wok dans une cuisine asiatique traditionnelle">

                    <figcaption>L’authenticité</figcaption>
                </figure>

                <!-- Texte associé à la valeur -->
                <p class="texte-valeur">
                    Nous restons fidèles aux traditions tout en les adaptant aux cuisines modernes et à la vie quotidienne.
                </p>

            </article>
        </li>

    </ul>
</section>


<!-- ============================================================
     🌸 CONCLUSION — message final
     ============================================================ -->
<section class="histoire-conclusion">

    <!-- Conteneur du texte -->
    <article class="bloc-conclusion">

        <!-- Titre de la section finale -->
        <h2 class="titre-section">Un mot pour toi</h2>

        <!-- Texte de clôture -->
        <p class="texte-intro">
            Que tu sois passionné ou débutant, Cookasian t’accompagne pour faire voyager tes papilles et ton cœur.
        </p>

    </article>
</section>
