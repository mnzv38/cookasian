<section class="page-auth">
    <article class="carte-auth">
        <h1 class="titre-page">Connexion</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" required placeholder="exemple@mail.com">

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" required placeholder="Ton mot de passe">

            <button type="submit" class="bouton">Se connecter</button>
        </form>

        <footer class="lien-alternatif">
            <p>Pas encore de compte ? <a href="/inscription">Créer un compte</a></p>
        </footer>
    </article>
</section>
