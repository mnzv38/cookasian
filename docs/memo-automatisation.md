🧾 MÉMO – Lancement automatique Docker (COOKASIAN)

🚀 Démarrage

Quand tu ouvres Docker Desktop
ou que tu exécutes :

cd "C:\Users\mvang\Documents\DEV 2024\developpement-web"
docker compose up -d


👉 Tout ton environnement se lance automatiquement.

⚙️ Ce que ça fait

Conteneurs actifs : cookasian, cookasian-node, mysql, nginx, etc.

Watch Sass → tourne dans cookasian-node 🧶

Composer autoload → s’exécute dans cookasian ⚙️

Apache / PHP / MySQL → démarrent automatiquement 🚀

Tant que Docker Desktop est ouvert et que tout est marqué “Running”,
ton site COOKASIAN tourne sans commande manuelle.

💡 En résumé
| Action                                                       | Obligatoire ?                                    | Pourquoi                                              |
| ------------------------------------------------------------ | ------------------------------------------------ | ----------------------------------------------------- |
| **Ouvrir Docker Desktop**                                    | ✅ Oui                                            | C’est le moteur qui fait tourner les conteneurs       |
| **Lancer `docker compose up -d` depuis `developpement-web`** | ✅ Une seule fois (ou si tu veux redémarrer tout) | Relance l’écosystème complet                          |
| **Ouvrir “Watch Sass” dans VS Code**                         | ❌ Non                                            | Le watcher est déjà géré dans le conteneur Node       |
| **Lancer `composer dump-autoload`**                          | ❌ Non                                            | L’autoload est automatisé dans le conteneur Cookasian |


✅ En résumé final :

Il te suffit d’allumer Docker Desktop.
Si les conteneurs se lancent → tout fonctionne (autoload, Sass, PHP, MySQL).
Sinon, exécute simplement docker compose up -d dans le dossier parent developpement-web 🎯
