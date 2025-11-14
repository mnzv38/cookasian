================================================================================
📄 README | COOKASIAN | Version FR
Projet MVC en PHP – Recettes asiatiques
================================================================================


INTRODUCTION
------------
Cookasian est un petit projet web que j’ai développé pour mieux comprendre
le fonctionnement d’un site dynamique en PHP, en codant tout moi-même
sans framework.

L’objectif principal est de comprendre ce qui se passe entre le navigateur,
le serveur, les vues, les contrôleurs, les modèles et la base de données.

Le thème de la cuisine asiatique permet d’avoir un site visuellement agréable
tout en travaillant sérieusement la partie technique.


FONCTIONNALITÉS DU SITE
-----------------------
Le site propose :

- une page d’accueil avec mise en avant de recettes
- une page listant toutes les recettes
- une fiche détaillée pour chaque recette
- un système de compte utilisateur :
    - inscription
    - connexion
    - déconnexion
- une gestion des favoris (liés à l’utilisateur connecté)
- une page de contact reliée à MySQL
- une page “Notre histoire” (équivalent de “À propos”)
- un design responsive mobile-first (format iPhone SE)

L’objectif global est de proposer un petit site complet, cohérent et fonctionnel.


TECHNOLOGIES UTILISÉES
----------------------
Stack utilisée :

- PHP 8.2 avec une architecture MVC maison
- MySQL via PDO sécurisé (requêtes préparées)
- SCSS compilé via Node Sass
- JavaScript natif
- Composer (autoload PSR-4)
- PHPUnit pour les tests unitaires
- HTML sémantique


ARBORESCENCE GÉNÉRALE
---------------------
Organisation des principaux dossiers :

- app/
    - Controllers/
    - Models/
    - Views/
    - Router.php
    - routes.php

- public/
    - index.php (point d’entrée unique)
    - assets/ (css, js, images)

- src/
    - SCSS (pages, layout, components, utils)

- sql/
    - scripts SQL (structure et données)

- tests/
    - tests unitaires

- vendor/
    - dépendances Composer

- docs/
    - notes et documents internes


INSTALLATION DU PROJET
----------------------
1. Installer les dépendances PHP :
   composer install

2. Installer les dépendances SCSS :
   npm install

3. Compiler le SCSS :
   - mode watch :
       npm run watch
   - compilation simple :
       npm run build

4. Importer les fichiers SQL du dossier "sql/" dans MySQL.


LANCER LES TESTS UNITAIRES
--------------------------
Les tests se trouvent dans le dossier "tests".

Ils permettent de vérifier :
- le hashage et la vérification des mots de passe
- l’enregistrement et la gestion des routes dans le routeur

Commande pour exécuter les tests :

php vendor/bin/phpunit --testdox tests


SÉCURITÉ
--------
Le projet applique plusieurs bonnes pratiques :

- mots de passe hashés (password_hash / password_verify)
- requêtes SQL préparées (PDO)
- protection des sorties avec htmlspecialchars
- séparation stricte MVC entre logique, données et affichage


COMPILATION SCSS
----------------
Fichier SCSS principal :
src/main.scss

Fichier CSS généré :
public/assets/css/main.css


ADRESSE LOCALE DU SITE
-----------------------
http://cookasian.localhost:8080/


GIT & DÉPÔT DU PROJET
---------------------
Dépôt GitHub :
https://github.com/mnzv38/cookasian

Commandes utiles :

git add .  
git commit -m "Mise à jour du projet Cookasian"  
git push


CONCLUSION
----------
Cookasian est un projet simple mais complet, conçu pour apprendre les bases
d’un site dynamique en PHP : gestion des routes, vues, modèles, sécurité,
interactions avec MySQL, compilation SCSS et tests unitaires.

Le projet est volontairement accessible, lisible et facile à améliorer.
Il peut servir de base d’apprentissage ou de petite démonstration technique.
