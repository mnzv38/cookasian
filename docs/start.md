🧾 MÉMO – Démarrage quotidien du projet COOKASIAN

🚀 1️⃣ Ouvrir Docker Desktop

Depuis le terminal de VS Code (PowerShell) :

Start-Process "C:\Program Files\Docker\Docker\Docker Desktop.exe"

➡️ Attends quelques secondes que Docker affiche “Running”.
(ou vérifie avec docker version)

⚙️ 2️⃣ Se placer dans le dossier parent
cd "C:\Users\mvang\Documents\DEV 2024\developpement-web"

💡 Ce dossier contient le fichier docker-compose.yml principal,
c’est lui qui gère tous les projets enfants (Cookasian, MySQL, Node, etc.).

🐳 3️⃣ Lancer tous les conteneurs
docker compose up -d

➡️ Démarre automatiquement :

cookasian → Apache + PHP + autoload Composer ⚙️

cookasian-node → watcher Sass 🧶

mysql et phpmyadmin → base de données 💾

nginx → serveur web (port 8080) 🌐

🧠 4️⃣ Vérifier que tout tourne
docker compose ps

Tu dois voir STATUS = Up pour tous les services.

Optionnel :

docker compose logs -f node # Sass watch actif
docker compose logs -f cookasian # Autoload et Apache démarrés

🌐 5️⃣ Ouvrir ton site

👉 http://cookasian.localhost:8080

Tout est prêt :

Tes fichiers .scss se recompilent automatiquement

Tes fichiers PHP sont exécutés en direct

Aucune commande manuelle n’est requise

🧩 6️⃣ Si tu veux tout arrêter proprement
docker compose down

Arrête tous les conteneurs sans les supprimer.

💡 Résumé express
Étape Commande Où ?
1️⃣ Démarrer Docker Start-Process "C:\Program Files\Docker\Docker\Docker Desktop.exe" Partout
2️⃣ Aller au bon dossier cd "C:\Users\mvang\Documents\DEV 2024\developpement-web" Parent
3️⃣ Lancer tout docker compose up -d Parent
4️⃣ Vérifier docker compose ps Parent
5️⃣ Ouvrir le site http://cookasian.localhost:8080
Navigateur
6️⃣ Stopper tout docker compose down Parent
