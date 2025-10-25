➡️ Cela :
restaure tous les fichiers modifiés depuis le dernier commit Git,
supprime les fichiers non suivis (nouveaux fichiers non enregistrés).

git restore .
git clean -fd

🔁 Reviens exactement à la dernière version du dépôt GitHub

git fetch origin
git reset --hard origin/main

🧼 Vérifie que tout est revenu comme avant

git status
