<section class="page-auth page-auth-inscription">
    <article class="carte-auth">

        <!-- Titre principal de la page -->
        <h1 class="titre-page">Inscription</h1>

        <!-- Message d'erreur global (ex : email déjà utilisé) -->
        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <!-- Formulaire d'inscription -->
        <form method="post" class="formulaire-auth">

            <!-- Champ Nom : prénom ou pseudo -->
            <label class="bloc-champ">
                <span class="label-texte">Nom</span>
                <input 
                    class="champ" 
                    type="text" 
                    name="name" 
                    placeholder="Ton prénom ou pseudo"
                    autocomplete="name"
                    required
                >
            </label>

            <!-- Champ Email -->
            <label class="bloc-champ">
                <span class="label-texte">Adresse e-mail</span>
                <input 
                    class="champ" 
                    type="email" 
                    name="email" 
                    placeholder="exemple@mail.com"
                    autocomplete="email"
                    required
                >
            </label>

            <!-- Mot de passe -->
            <label class="bloc-champ champ-mdp-container">
                <span class="label-texte">Mot de passe</span>

                <input 
                    class="champ champ-mdp"
                    type="password"
                    name="mot_de_passe"
                    placeholder="Crée ton mot de passe"
                    autocomplete="new-password"
                    required
                >

                <!-- Icône pour afficher / masquer le mot de passe -->
                <span class="icone-mdp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" 
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>

                <!-- Petit conseil visible uniquement ici -->
                <small class="aide">
                    Min 8 caractères, 1 majuscule, 1 chiffre, 1 caractère spécial.
                </small>
            </label>

            <!-- Confirmation du mot de passe -->
            <label class="bloc-champ champ-mdp-container">
                <span class="label-texte">Confirme le mot de passe</span>

                <input 
                    class="champ champ-mdp"
                    type="password"
                    name="confirmation"
                    placeholder="Mot de passe"
                    autocomplete="new-password"
                    required
                >

                <span class="icone-mdp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" 
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
            </label>

            <!-- Politique de confidentialité -->
            <label class="bloc-choix">
                <input class="case" type="checkbox" name="accept_policy" value="1" required>
                
                <!-- Simplifié mais toujours lisible -->
                <span class="texte-choix" style="font-size:0.78rem; line-height:1;">
                    J'accepte la politique de confidentialité et le stockage de mes données.
                </span>
            </label>

            <!-- Bouton de validation -->
            <button type="submit" class="bouton">
                S’inscrire
            </button>

        </form>

        <!-- Lien vers la connexion -->
        <footer class="lien-alternatif">
            <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
        </footer>

    </article>
</section>

<!-- Petit JS pour l'icône de visibilité du mot de passe -->
<script src="/assets/js/auth.js"></script>
