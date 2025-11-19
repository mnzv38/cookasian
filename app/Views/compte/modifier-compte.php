<section class="page-modif-compte">
    <article class="contenu-modif-compte">

        <!-- Titre + messages de retour utilisateur -->
        <header class="entete-modif">
            <h1 class="titre-page">Modifier mes informations</h1>

            <!-- Message de succès si tout s'est bien passé -->
            <?php if (!empty($success)): ?>
                <p class="message-succes"><?= htmlspecialchars($success) ?></p>
            <?php endif; ?>

            <!-- Liste des erreurs du formulaire -->
            <?php if (!empty($erreurs)): ?>
                <ul class="liste-erreurs">
                    <?php foreach ($erreurs as $e): ?>
                        <li class="message-erreur"><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </header>

        <!-- Formulaire de modification -->
        <form method="post" class="formulaire-modif">

            <!-- Champ : nom affiché dans le compte -->
            <div class="champ">
                <label class="etiquette">Nom</label>
                <input 
                    type="text" 
                    name="name"
                    value="<?= htmlspecialchars($utilisateur['name'] ?? '') ?>"
                    placeholder="Ton nom d’affichage"
                    autocomplete="name"
                    required
                >
            </div>

            <!-- Champ : adresse email -->
            <div class="champ">
                <label class="etiquette">Email</label>
                <input 
                    type="email" 
                    name="email"
                    value="<?= htmlspecialchars($utilisateur['email'] ?? '') ?>"
                    placeholder="Ton email"
                    autocomplete="email"
                    required
                >
            </div>

            <!-- Champ facultatif : changement de mot de passe -->
            <div class="champ">
                <label class="etiquette">Nouveau mot de passe</label>
                <input 
                    type="password" 
                    name="mot_de_passe"
                    placeholder="(laisse vide si tu ne veux pas le changer)"
                    autocomplete="new-password"
                >
            </div>

            <!-- Boutons d'action -->
            <footer class="actions-formulaire">
                <button type="submit" class="bouton primaire grand">
                    💾 Enregistrer les modifications
                </button>

                <a href="/mon-compte" class="bouton secondaire grand">
                    ← Retour à mon espace
                </a>
            </footer>
        </form>

        <!-- Petit message conseil -->
        <p class="texte-conseil">
            💡 <em>Astuce : un mot de passe sûr contient au moins 8 caractères, une majuscule, un chiffre et un symbole.</em>
        </p>

    </article>
</section>

