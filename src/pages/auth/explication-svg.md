🎤 Comment expliquer au le jury

« J’avais deux pages avec le même champ mot de passe, mais des fonds différents : clair pour Connexion, sombre pour Inscription.
Comme elles utilisaient les mêmes classes, la couleur de l’icône entrait en conflit.
J’ai donc isolé la page Inscription avec une classe de page et appliqué une règle CSS ciblée uniquement pour elle.
Cela me permet d’avoir l’icône noire d’un côté, blanche de l’autre, sans toucher à la structure HTML.
Le !important est utilisé uniquement sur cette propriété, car la spécificité était strictement identique et nécessitait une surcharge contrôlée. »
