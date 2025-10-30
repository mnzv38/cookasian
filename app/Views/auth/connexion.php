<section class="page-auth">
    <article class="carte-auth">
        <h1 class="titre-page">Connexion</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">
            <label class="bloc-champ">
                <span class="label-texte">Adresse e-mail</span>
                <input class="champ" type="email" name="email" required placeholder="exemple@mail.com">
            </label>

            <label class="bloc-champ">
                <span class="label-texte">Mot de passe</span>
                <div class="groupe-champ">
                    <input class="champ champ-mdp" type="password" name="mot_de_passe" required placeholder="Ton mot de passe" autocomplete="current-password">
                    <button type="button" class="btn-oeil">👁️</button>
                </div>
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

<!-- JS local pour oeil et mini validations -->
<script src="/assets/js/auth.js"></script>
