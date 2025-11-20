<?php include __DIR__ . '/../layout/header.php'; ?> 

<section class="page-contact">
    <article class="contenu-contact">

        <!-- Titre + intro -->
        <h1 class="titre-page">Nous contacter</h1>
        <p class="texte-intro">
            Une question, une suggestion ou un partenariat ? <br>
            Écris-nous, on lit tout avec attention 💌
        </p>

        <!-- Message de succès -->
        <?php if (!empty($contactSuccess)): ?>
            <p class="message-succes"><?= htmlspecialchars($contactSuccess) ?></p>
        <?php endif; ?>

        <!-- Liste des erreurs -->
        <?php if (!empty($contactErrors)): ?>
            <ul class="liste-erreurs">
                <?php foreach ($contactErrors as $champ => $erreur): ?>
                    <li class="erreur-item"><?= htmlspecialchars($erreur) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="bloc-contact">

            <!-- FORMULAIRE DE CONTACT -->
            <form class="formulaire-contact" method="post" action="/contact">

                <!-- Champ nom -->
                <div class="champ">
                    <label class="etiquette">Nom</label>
                    <input 
                        class="controle" 
                        type="text" 
                        name="nom"
                        value="<?= htmlspecialchars($contactValues['nom'] ?? '') ?>"
                        placeholder="Votre nom"
                        autocomplete="name"
                    >
                </div>

                <!-- Champ email -->
                <div class="champ">
                    <label class="etiquette">E-mail</label>
                    <input 
                        class="controle" 
                        type="email" 
                        name="email"
                        value="<?= htmlspecialchars($contactValues['email'] ?? '') ?>"
                        placeholder="votre.email@example.com"
                        autocomplete="email"
                    >
                </div>

                <!-- Champ message -->
                <div class="champ">
                    <label class="etiquette">Message</label>
                    <textarea 
                        class="controle zone-texte" 
                        name="message" 
                        rows="6"
                        placeholder="Votre message..."
                    ><?= htmlspecialchars($contactValues['message'] ?? '') ?></textarea>
                </div>

                <div class="actions-formulaire">
                    <button class="bouton primaire" type="submit">Envoyer</button>
                </div>

            </form>

            <!-- COORDONNÉES -->
            <aside class="coordonnees-contact">
                <h2 class="titre-section">Coordonnées</h2>

                <p class="nom-structure">Cookasian</p>

                <ul class="liste-coordonnees">
                    <li>📍 6 rue Elysium – 69970 Marennes</li>
                    <li>☎️ 04 78 34 90 22</li>
                    <li>✉️ <a href="mailto:info@cookasian.fr">info@cookasian.fr</a></li>
                </ul>
            </aside>

        </div>
    </article>
</section>

<?php include __DIR__ . '/../layout/footer.php'; ?>
