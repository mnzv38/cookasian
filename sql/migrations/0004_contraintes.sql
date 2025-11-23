-- Ajout des clés primaires, uniques et index

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);

ALTER TABLE recettes
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY slug (slug);

ALTER TABLE ingredients
  ADD PRIMARY KEY (id),
  ADD KEY idx_recette (recette_id);

ALTER TABLE etapes
  ADD PRIMARY KEY (id),
  ADD KEY idx_recette (recette_id);

ALTER TABLE favoris
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY unique_favori (utilisateur_id, recette_id),
  ADD KEY fk_favoris_recette (recette_id);

ALTER TABLE contact_messages
  ADD PRIMARY KEY (id);
