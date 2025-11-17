<section class="page-auth">
    <article class="carte-auth">
        <h1 class="titre-page">Connexion</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">

            <!-- Email -->
            <label class="bloc-champ">
                <span class="label-texte">Adresse e-mail</span>
                <input class="champ" type="email" name="email" required placeholder="exemple@mail.com">
            </label>

            <!-- Mot de passe -->
            <label class="bloc-champ champ-mdp-container">
                <span class="label-texte">Mot de passe</span>

                <input class="champ champ-mdp"
                       type="password"
                       name="mot_de_passe"
                       required
                       placeholder="Ton mot de passe"
                       autocomplete="current-password">

                <!-- Icône SVG intégrée -->
                <span class="icone-mdp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
            </label>

            <label class="bloc-choix">
                <input class="case" type="checkbox" name="se_souvenir" value="1">
                <span class="texte-choix">Se souvenir de moi</span>
            </label>

            <button type="submit" class="bouton">Se connecter</button>
        </form>

        <footer class="lien-alternatif">
            <p>Pas encore de compte ? <a href="/inscription">Créer un compte</a></p>
        </footer>
    </article>
</section>

<script src="/assets/js/auth.js"></script>
