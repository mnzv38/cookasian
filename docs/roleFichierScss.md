⚙️ 1. \_reset.scss — Le balai magique 🧹
🎯 Rôle :

Supprimer les styles par défaut des navigateurs (marges, polices, listes, etc.).

Assurer un rendu identique sur Chrome, Firefox, Safari et Edge.

🧩 Contenu :

Réinitialisation de base (margin: 0, padding: 0, box-sizing: border-box).

Neutralisation des listes, liens, boutons et tableaux.

Petites règles d’accessibilité (:focus-visible, ::selection).

💬 Phrase à dire au jury :

“J’ai créé un fichier \_reset.scss qui efface tous les styles par défaut des navigateurs, pour que mon site parte d’une base propre et identique partout.”

🏗️ 2. \_base.scss — Les fondations du site ⚒️
🎯 Rôle :

Définir les styles généraux et la typographie du site.

Gérer les marges, les espacements et la structure globale.

🧩 Contenu :

Police, couleur de fond, couleur du texte.

Styles par défaut des titres (h1, h2, h3, h4), paragraphes et liens.

Classes utilitaires (.conteneur, .grille, .message, .lien-contenu).

Animations globales légères (fadeInUp, fadeIn).

💬 Phrase à dire au jury :

“Le fichier \_base.scss pose les fondations du design : typographie, couleurs globales, mise en page, animations simples. C’est ma base de cohérence visuelle.”

🎨 3. \_variables.scss — La boîte à couleurs 🎨
🎯 Rôle :

Centraliser toutes les couleurs, polices et espacements du site.

Faciliter les modifications futures (changer une couleur → tout le site s’adapte).

🧩 Contenu :

Couleurs principales ($couleur-primaire, $couleur-fond, $couleur-texte).

Polices ($font-principale, $font-titre).

Espacements ($espace-sm, $espace-md, etc.).

Breakpoints responsive.

💬 Phrase à dire au jury :

“J’ai regroupé toutes mes variables dans un seul fichier pour pouvoir changer facilement les couleurs ou la typographie du site sans modifier plusieurs fichiers.”

🧱 4. \_header.scss — L’en-tête du site 🧭
🎯 Rôle :

Styliser la barre de navigation principale (logo + liens).

Gérer la position sticky et le design responsive.

🧩 Contenu :

.entete-site, .logo-site, .menu-principal, .lien-nav, .bouton.

Couleurs sombres, accent rouge, transitions au survol.

Adaptation mobile et animation d’apparition.

💬 Phrase à dire au jury :

“Le fichier \_header.scss gère toute la partie haute du site : le logo, la navigation et le style sticky. J’ai harmonisé les classes avec mon HTML humanisé.”

🦶 5. \_footer.scss — Le pied du site 👣
🎯 Rôle :

Gérer la structure du pied de page, ses liens et les informations légales.

Assurer une cohérence visuelle avec le header (fond sombre, texte clair).

🧩 Contenu :

.pied-site, .bloc-footer, .titre-footer, .liste-footer, .lien-footer, .bas-page.

Dégradé vertical, typographie élégante, liens animés.

💬 Phrase à dire au jury :

“Le fichier \_footer.scss reprend les mêmes codes visuels que le header : fond sombre, texte clair, hiérarchie claire. C’est la clôture visuelle du site.”

💠 6. Composants (/components/commun/) — Les briques réutilisables 🧩
🧩 Contenu :

\_carte-recette.scss → style des cartes de recettes (images, titres, badges).

\_bouton.scss → boutons principaux, secondaires et grands formats.

💬 Phrase à dire au jury :

“Les composants sont les éléments réutilisables sur plusieurs pages : cartes, boutons, etc. Cela permet d’avoir une cohérence visuelle sur tout le site.”

📄 7. Pages (/pages/) — Le style par vue MVC 📜
🎯 Rôle :

Adapter les styles selon chaque vue du projet (accueil, recettes, fiche).

🧩 Contenu :

/accueil/\_accueil.scss

/recettes/\_index.scss (liste)

/recettes/\_show.scss (fiche détaillée)

💬 Phrase à dire au jury :

“Chaque vue du MVC a son propre fichier SCSS dans /pages/. Cela m’aide à localiser rapidement un style lié à une page précise sans mélanger les fichiers.”

🧠 8. Utils (\_mixins.scss, \_functions.scss) — Les outils du chef 👨‍🍳
🎯 Rôle :

Contenir des petits outils Sass (fonctions et mixins) réutilisables.

Exemple : une mixin pour les media queries, ou une fonction pour éclaircir une couleur.

💬 Phrase à dire au jury :

“J’ai prévu un dossier utils pour centraliser les outils SASS comme les variables, mixins et fonctions. C’est une bonne pratique de structure.”

💡 9. main.scss — La recette finale 🍲
🎯 Rôle :

C’est le fichier maître qui importe tous les autres partiels SCSS.

Une fois compilé, il génère main.css, le seul fichier chargé dans ton HTML.

💬 Phrase à dire au jury :

“main.scss est la porte d’entrée du style. Il rassemble toutes les parties du site grâce à @use, ce qui me donne un CSS global propre et organisé.”

✅ Résumé rapide (schéma logique)
RESET → Nettoie tout
BASE → Pose les fondations
UTILS → Fournit les outils
LAYOUT → Structure le site (header/footer)
COMPONENTS → Crée les éléments réutilisables
PAGES → Habille chaque vue MVC
MAIN → Assemble le tout
