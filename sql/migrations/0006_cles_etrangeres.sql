-- Ajout des clés étrangères

ALTER TABLE ingredients
  ADD CONSTRAINT fk_ingredients_recette
  FOREIGN KEY (recette_id) REFERENCES recettes(id)
  ON DELETE CASCADE;

ALTER TABLE etapes
  ADD CONSTRAINT fk_etapes_recette
  FOREIGN KEY (recette_id) REFERENCES recettes(id)
  ON DELETE CASCADE;

ALTER TABLE favoris
  ADD CONSTRAINT fk_favoris_recette
  FOREIGN KEY (recette_id) REFERENCES recettes(id)
  ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_favoris_user
  FOREIGN KEY (utilisateur_id) REFERENCES users(id)
  ON DELETE CASCADE ON UPDATE CASCADE;
