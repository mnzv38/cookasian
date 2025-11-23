🧭 Les préfixes Git (issus du standard “Conventional Commits”)

Ils servent à indiquer l’intention du travail dans le nom d’une branche ou d’un commit,
ce qui permet à toute l’équipe (ou au jury) de comprendre ton workflow au premier coup d’œil.

**git commit -m** suivi de "feat: maj" par exemple.

| Préfixe         | Signification                                    | Quand l’utiliser                                                                                                                   |
| --------------- | ------------------------------------------------ | ---------------------------------------------------------------------------------------------------------------------------------- |
| **`feat/`**     | _feature_ → nouvelle fonctionnalité              | quand tu ajoutes une **nouvelle partie fonctionnelle** (ex : une page, un composant, une logique métier)                           |
| **`fix/`**      | _bug fix_ → correction                           | quand tu **corriges un bug** existant (CSS, PHP, requête SQL, etc.)                                                                |
| **`chore/`**    | _chore = tâche ménagère_ → maintenance technique | pour tout ce qui **n’affecte pas directement le code fonctionnel** (Docker, config Composer, Git, structure de projet, .env, etc.) |
| **`docs/`**     | _documentation_                                  | quand tu rédiges ou modifies la doc (README, diagramme, etc.)                                                                      |
| **`style/`**    | mise en forme, indentation, lint                 | quand tu ajustes la présentation du code sans changer son comportement                                                             |
| **`refactor/`** | refactorisation                                  | quand tu réorganises ou simplifies du code existant sans modifier le résultat                                                      |
| **`test/`**     | ajout ou correction de tests                     | pour les tests unitaires ou d’intégration                                                                                          |
