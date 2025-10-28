<section class="page-auth">
    <article class="carte-auth">
        <h1 class="titre-page">Inscription</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">
            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" required placeholder="exemple@mail.com">

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" required placeholder="Crée ton mot de passe">

            <button type="submit" class="bouton">S’inscrire</button>
        </form>

        <footer class="lien-alternatif">
            <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
        </footer>
    </article>
</section>
