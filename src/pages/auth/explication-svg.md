« J’ai rencontré un cas intéressant avec l’icône du champ mot de passe.
La même icône SVG était utilisée sur deux pages, mais avec des contextes visuels opposés : fond clair pour la Connexion, fond sombre pour l’Inscription.
Avec les mêmes classes, la couleur appliquée au SVG s’appliquait partout, ce qui posait un vrai problème de lisibilité.

J’ai d’abord testé plusieurs approches, jusqu’à comprendre une règle clé :
pour un SVG inline, ce n’est pas color qui agit, mais stroke ou fill.
Ensuite, j’ai isolé la page Inscription avec sa classe de contexte et j’ai forcé la bonne couleur uniquement sur celle-ci.
Comme les deux sélecteurs avaient exactement la même spécificité, j’ai utilisé !important volontairement, de façon contrôlée.

Résultat : deux comportements propres, lisibles, cohérents, et un code HTML inchangé.
Juste une bonne gestion de la cascade CSS et des propriétés SVG. »