<section class="page-auth">
    <article class="carte-auth">

        <!-- Titre de la page -->
        <h1 class="titre-page">Connexion</h1>

        <!-- Message d'erreur si la connexion échoue -->
        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form method="post" class="formulaire-auth">

            <!-- Champ email -->
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

            <!-- Champ mot de passe -->
            <label class="bloc-champ champ-mdp-container">
                <span class="label-texte">Mot de passe</span>

                <input 
                    class="champ champ-mdp"
                    type="password"
                    name="mot_de_passe"
                    placeholder="Ton mot de passe"
                    autocomplete="current-password"
                    required
                >

                <!-- Icône "voir le mot de passe" (JS natif dans auth.js) -->
                <span class="icone-mdp">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        width="22" height="22" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2"
                    >
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
            </label>

            <!-- Option : garder la session active -->
            <label class="bloc-choix">
                <input class="case" type="checkbox" name="se_souvenir" value="1">
                <span class="texte-choix">Se souvenir de moi</span>
            </label>

            <!-- Bouton de connexion -->
            <button type="submit" class="bouton">
                Se connecter
            </button>

        </form>

        <!-- Lien vers la page d'inscription -->
        <footer class="lien-alternatif">
            <p>Pas encore de compte ? <a href="/inscription">Créer un compte</a></p>
        </footer>

    </article>
</section>

<!-- Script JS très léger pour gérer l'œil du mot de passe -->
<script src="/assets/js/auth.js"></script>
