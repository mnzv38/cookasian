<!-- <section class="page-auth"> -->
<section class="page-auth page-auth-inscription">
    <article class="carte-auth">
        <h1 class="titre-page">Inscription</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">

            <!-- Nom -->
            <label class="bloc-champ">
                <span class="label-texte">Nom</span>
                <input class="champ" type="text" name="name" required placeholder="Ton prénom ou pseudo">
            </label>

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
                       placeholder="Crée ton mot de passe"
                       autocomplete="new-password">

                <span class="icone-mdp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>

                <small class="aide">Min 8 caractères, 1 majuscule, 1 chiffre, 1 caractère spécial.</small>
            </label>

            <!-- Confirmation -->
            <label class="bloc-champ champ-mdp-container">
                <span class="label-texte">Confirme le mot de passe</span>

                <input class="champ champ-mdp"
                       type="password"
                       name="confirmation"
                       required
                       placeholder="Mot de passe"
                       autocomplete="new-password">

                <span class="icone-mdp">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </span>
            </label>

            <!-- Politique -->
            <label class="bloc-choix">
                <input class="case" type="checkbox" name="accept_policy" value="1" required>
                <span class="texte-choix" style="font-size:0.78rem; line-height:1;">
                    J'accepte la politique de confidentialité et le stockage de mes données.
                </span>
            </label>

            <button type="submit" class="bouton">S’inscrire</button>
        </form>

        <footer class="lien-alternatif">
            <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
        </footer>
    </article>
</section>

<script src="/assets/js/auth.js"></script>
