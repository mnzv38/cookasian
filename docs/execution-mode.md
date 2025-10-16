# 🧩 COOKASIAN v2 — EXECUTION MODE (RNCP STRICT)

🎯 Objectif :  
Créer le site **COOKASIAN**, blog culinaire d’Asie, en **MVC PHP 8.2** sans framework, 100 % conforme au **Titre Professionnel DWWM niveau 5**.

---

## ⚙️ TECH STACK

- PHP 8.2
- SCSS (compilé via Node + Sass watch)
- MySQL 8 (PDO)
- Docker : Nginx + PHP + MySQL + phpMyAdmin + Node
- Composer local
- Namespace PSR-4 : `Cookasian\\` → `app/`
- OS : Windows
- Terminal : VS Code → PowerShell
- GitHub : 1 repo, branches `feat/<page>` / `fix/<page>`

---

## 🧱 STRUCTURE MVC

cookasian/
├─ app/
│ ├─ Router.php
│ ├─ Controller.php
│ ├─ Model.php
│ ├─ Database.php
│ └─ routes.php
├─ controllers/
├─ models/
├─ views/
├─ public/
│ ├─ index.php
│ ├─ assets/
│ └─ scss/
│ ├─ utils/
│ ├─ layout/
│ ├─ components/
│ └─ pages/
├─ tests/
└─ composer.json

---

## 📦 COMPOSER

```json
{
  "name": "cookasian/project",
  "type": "project",
  "autoload": { "psr-4": { "Cookasian\\": "app/" } },
  "require": {},
  "require-dev": { "phpunit/phpunit": "^10.5" }
}

🧭 Commandes PowerShell :

cd ..\developpement-web\cookasian
composer dump-autoload
docker compose up --build -d
docker compose logs -f node
# Hard refresh Chrome (Ctrl+F5)


Toujours exécuter composer dump-autoload après tout ajout / suppression / renommage de fichier PHP.


🧭 STRUCTURE SCSS
public/scss/
├─ utils/ → variables, mixins, functions
├─ layout/ → reset, base, header, footer
├─ components/commun/ → bouton, formulaire, tag
└─ pages/<page>/ → _<page>.scss + components/

🧱 PAGES REQUISES

Accueil /

Recettes /recettes

Recette unique /recette/{slug}

Notre histoire /histoire

Connexion / Inscription /utilisateur

Profil /utilisateur/profil

Mentions légales /mentions-legales

Politique de confidentialité /politique-confidentialite

404 personnalisée /404

🧪 TESTS UNITAIRES

1️⃣ tests/RouteurTest.php → routes /recettes, /recette/{slug}, 404
2️⃣ tests/AuthTest.php → password_hash() / password_verify()

📦 Installation :

composer require --dev phpunit/phpunit

🔐 EXIGENCES RNCP
Domaine	Attendu
Front-end (CCP1)	Maquettage, interface statique + dynamique, accessibilité
Back-end (CCP2)	Base de données, PDO, sécurité, composants métier
Transversales	Documentation, veille, tests, audits qualité
⚙️ RÈGLES DE CODE

🚫 Aucun AJAX

🐬 MySQL via PDO préparé

📱 Responsive unique iPhone SE 375 px

♿ Accessibilité (aria-label, focus visible, contrastes)

🔒 Sécurité (hashage, validation POST, PDO prepare)

🔍 SEO (title, meta, alt, URL propres)

⚡ Perf ≥ 85 % Lighthouse

🧾 Dossier projet RNCP 30–50 pages

🧾 DOSSIER PROJET RNCP (plan à générer)

Expression des besoins

Environnement technique

Maquettes / captures

Code front + back (commenté)

Schéma BDD + script SQL

Sécurité (hashage, PDO prepare)

Jeu d’essai (entrées / sorties / analyse)

Veille sécurité / vulnérabilités

Synthèse finale

🧠 FORMAT DE RÉPONSE IMPÉRATIF

À chaque étape, répondre dans cet ordre :

1️⃣ Objectif pédagogique
2️⃣ Fichiers impactés
3️⃣ Code complet commenté
4️⃣ Commandes PowerShell exactes
5️⃣ Explication simple
6️⃣ Checklist de vérification
7️⃣ Git (branche + commit)
8️⃣ Bloc RNCP couvert (CCP1, CCP2, Transversales)
9️⃣ Audit (Perf / A11y / Sécurité)

🔁 BLOC STANDARD DE RELANCE
composer dump-autoload
docker compose up --build -d
docker compose logs -f node
# Hard refresh Chrome (Ctrl+F5)


💡 Toute suggestion dépassant le référentiel RNCP doit être signalée et simplifiée avant implémentation.
```
