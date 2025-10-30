<section class="page-auth">
    <article class="carte-auth">
        <h1 class="titre-page">Inscription</h1>

        <?php if (!empty($erreur)): ?>
            <p class="message-erreur"><?= htmlspecialchars($erreur) ?></p>
        <?php endif; ?>

        <form method="post" class="formulaire-auth">
            <!-- Champ NOM -->
            <label class="bloc-champ">
                <span class="label-texte">Nom</span>
                <input class="champ" type="text" name="name" required placeholder="Ton prénom ou pseudo">
            </label>

            <!-- Champ EMAIL -->
            <label class="bloc-champ">
                <span class="label-texte">Adresse e-mail</span>
                <input class="champ" type="email" name="email" required placeholder="exemple@mail.com">
            </label>

            <!-- Champ MOT DE PASSE -->
            <label class="bloc-champ">
                <span class="label-texte">Mot de passe</span>
                <div class="groupe-champ">
                    <input class="champ champ-mdp" type="password" name="mot_de_passe" required placeholder="Crée ton mot de passe" autocomplete="new-password">
                    <button type="button" class="btn-oeil">👁️</button>
                </div>
                <small class="aide">Min 8 caractères, 1 majuscule, 1 chiffre, 1 caractère spécial.</small>
            </label>

            <!-- Champ CONFIRMATION -->
            <label class="bloc-champ">
                <span class="label-texte">Confirme le mot de passe</span>
                <div class="groupe-champ">
                    <input class="champ champ-mdp" type="password" name="confirmation" required placeholder="Confirme ton mot de passe" autocomplete="new-password">
                    <button type="button" class="btn-oeil">👁️</button>
                </div>
            </label>

            <!-- Case Politique -->
            <label class="bloc-choix">
                <input class="case" type="checkbox" name="accept_policy" value="1" required>
                <span class="texte-choix">J'accepte la politique de confidentialité et le stockage de mes données.</span>
            </label>

            <button type="submit" class="bouton">S’inscrire</button>
        </form>

        <footer class="lien-alternatif">
            <p>Déjà un compte ? <a href="/connexion">Se connecter</a></p>
        </footer>
    </article>
</section>

<!-- Script JS pour œil et validations -->
<script src="/assets/js/auth.js"></script>
