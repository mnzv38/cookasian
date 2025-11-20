================================================================================

# README | 🥢 COOKASIAN | Version FR

# Projet MVC en PHP – Recettes asiatiques

================================================================================

Blog de recettes asiatiques, développé en :

- PHP 8.2 MVC maison,
- SCSS,
- MySQL,
- Docker,
- JavaScript natif (sans framework)

Site optimisé :

- Mobile (iPhone SE)
- Performances
- SEO
- Accessibilité
- Conformes au référentiel RNCP - DWWM

================================================================================

# 📌 Sommaire

================================================================================

- Présentation
- Fonctionnalités
- Technologies
- Installation
- Démarrer le projet au quotidien
- Structure du projet
- Architecture MVC
- Routes du site
- Base de données
- Sécurité
- Performances
- Accessibilité
- Tests
- Limitations actuelles
- Roadmap & évolutions prévues
- Auteure

================================================================================

# 🥡 Présentation

================================================================================

Cookasian est un site de recettes asiatiques construit entièrement à la main, sans framework, pour démontrer :

- une architecture MVC claire
- une base de données relationnelle complète
- une gestion utilisateur sécurisée
- une interface moderne mobile-first
- un développement conforme aux bonnes pratiques RNCP (CCP1 & CCP2)

================================================================================

# 🌟 Fonctionnalités

================================================================================

# 👤 Compte utilisateur

- Inscription
- Connexion
- Déconnexion
- Modification du profil
- Page personnelle “Mon compte”
- Liste des favoris

# ⭐ Favoris

- Ajouter / retirer un favori
- Affichage dynamique de l’état (connecté/déconnecté)
- Icônes adaptées desktop / mobile
- Toast visuels ajout / suppression
- Liste paginée (jusqu’à 3 colonnes desktop)

# 🍜 Recettes

- Listing complet
- Filtres :
  → par pays (A-Z)
  → tri alphabétique : nom de la recette (A-Z)
  → par temps de préparation
  → par temps de cuisson
  → par difficulté
  → les plus récentes

- Page individuelle
- Images responsive (400/800/1200)
- Zoom plein écran avec lightbox
- Bouton retour
- Micro-interactions hover

# 📱 Mobile / Responsive

- Menu mobile fixe en bas
- Ajustements spécifiques iPhone SE
- Ajustements spécifiques laptop / tablette (≥ 481px – 990px)
- Grilles adaptatives
- Icônes recalibrées selon résolution

# ✉️ Contact

- Formulaire
- Validation serveur
- Messages d’erreur / succès
- Bloc coordonnées

# 🌈 Design & UI

- SCSS structure claire (utils, layout, pages, components)
- Boutons réutilisables
- Cartes recettes homogènes
- Contrastes validés Lighthouse

================================================================================

# 🛠️ Technologies

================================================================================

- PHP 8.2
- MySQL 8
- SCSS
- Docker
- Nginx (dans le projet parent developpement-web/)
- Composer
- JavaScript natif
- Autoload PSR-4 via Composer
- Compilation SCSS via Node (npm run watch)

================================================================================

# 🐳 Installation

================================================================================

1️⃣ Pré-requis

- Docker Desktop
- Git
- Composer (local Windows)
- Navigateur Chrome

2️⃣ Cloner le projet

git clone https://github.com/mnzv38/cookasian
cd cookasian

3️⃣ Lancer Docker

docker compose up -d

Ports utilisés : http://cookasian.localhost:8080/

4️⃣ Importer la base  
→ phpMyAdmin → importer cookasian.sql

5️⃣ Watch SCSS

docker compose exec node npm run watch

6️⃣ Autoload Composer (local Windows)

composer dump-autoload

================================================================================

# 📂 Démarrer le projet au quotidien

================================================================================

1. Ouvrir Docker Desktop
2. Dans le terminal VS Code → dossier developpement-web/
3. docker compose up -d
4. Accéder au site : **http://cookasian.localhost:8080/**
5. Lancer le watch SCSS :
   docker compose exec node npm run watch

================================================================================

# 🧱 Structure technique du projet

================================================================================

cookasian/
│
├── app/
│ ├── Controllers/
│ ├── Models/
│ ├── Views/
│ ├── Router.php
│ └── routes.php
│
├── public/
│ ├── index.php
│ ├── assets/
│ ├── css/
│ ├── images/
│ └── js/
│
├── src/
│ ├── pages/
│ ├── accueil/
│ ├── auth/
│ ├── compte/
│ ├── contact/
│ ├── erreurs/
│ ├── notre-histoire/
│ └── recettes/
│
├── sql/
│ └── cookasian.sql
│
├── tests/
│ (structure prête pour PHPUnit)
│
├── docs/
│ (notes internes, captures, audit, documentation du projet)
│
├── vendor/
│
├── composer.json
├── README_FR.md
└── README.md (version anglaise)

================================================================================

# 🏛️ Architecture MVC

================================================================================

# Controllers

Gèrent la logique : Recettes, Compte, Auth, Favoris, Contact.

# Models

Requêtes PDO sécurisées :

- UsersModel
- RecettesModel
- FavorisModel

# Views

Templates HTML sémantiques, sans balises inutiles.

# Router

Fichier unique listant toutes les routes du site.

================================================================================

# 🧭 Routes du site

================================================================================

GET / Accueil
GET /recettes Liste des recettes
GET /recettes/{slug} Page recette
GET /notre-histoire Page histoire
GET /contact Page contact
POST /contact Envoi du formulaire

GET /connexion Formulaire connexion
POST /connexion Traitement connexion
GET /inscription Formulaire inscription
POST /inscription Création utilisateur
GET /deconnexion Déconnexion

GET /mon-compte Espace utilisateur
GET /mon-compte/modifier Modifier profil
POST /mon-compte/modifier Enregistrement modifications

GET /favoris/ajouter/{id} Ajouter un favori
GET /favoris/supprimer/{id} Retirer un favori

================================================================================

# 🗄️ Base de données

================================================================================

# Tables principales

- users
- recettes
- ingredients
- etapes
- favoris (table pivot)

# Points importants

- relations 1-N et N-N
- contraintes d’intégrité
- champs nettoyés
- requêtes préparées
- aucune donnée sensible en clair

================================================================================

# 🔐 Sécurité

================================================================================

- htmlspecialchars()
- password_hash()
- password_verify()
- Requêtes PDO préparées
- requireLogin()
- Sessions sécurisées
- Pas d’AJAX → aucune API exposée
- Filtrage serveur

================================================================================

# ⚡ Performances

================================================================================

- Images multi-tailles (400/800/1200)
- Compression
- Lightbox native
- CSS optimisé
- JS minimal
- Lighthouse :
  ✅ Performance 100
  ✅ Accessibilité 100
  ✅ Bonnes pratiques 100
  ✅ SEO 100

================================================================================

# ♿ Accessibilité

================================================================================

- Couleurs AA - Norme WCAG (accessibilité) = lisibilité suffisante entre fond + texte → Contraste ≥ 4.5:1
- focus-visible
- Alt text cohérents
- Balises sémantiques
- Labels / champs correctement liés

================================================================================

# 🧪 Tests

================================================================================

# ✔ Tests manuels

- Navigation globale
- Recettes
- Connexion / inscription
- Gestion des favoris
- Responsive iPhone SE
- page 404

# ✔ Tests techniques

- HTML validé
- Vérification du hashage et de la validation des mots de passe
- Lighthouse
- Tests du routeur (chargement et résolution des routes)
- Autoload PSR-4 validé
- Tests PHPunit

/tests/
│
├── AuthTest.php
└── RouteurTest.php

L’exécution des tests se fait avec : php vendor/bin/phpunit --testdox

================================================================================

# ❗ Limitations actuelles du projet

================================================================================

- Pas de back-office admin
- Pas de pagination complète
- Pas d’indication visuelle permettant de savoir si une recette est déjà en favoris
- Pas de compteur indiquant le total de favoris de l’utilisateur
- Pas d’upload image recette
- Pas de filtre multi-ingrédients
- Pas de système de notation
- Pas de système de commentaires utilisateur
- Pas de version anglaise complète

================================================================================

# 🧭 Roadmap & évolutions prévues

================================================================================

- Pagination
- Back-office
- Upload image
- Filtres avancés
- Notes utilisateur
- Ajouter une icône “favori” visible directement sur les cartes recettes
- Ajouter un compteur de favoris dans l’espace utilisateur
- Version anglaise

================================================================================

## 👩‍💻 Auteure

================================================================================

**Mélodie VANG**  
Développeuse Web – Formation DWWM  
GitHub : https://github.com/mnzv38

Projet : **Cookasian (MVC natif)**
