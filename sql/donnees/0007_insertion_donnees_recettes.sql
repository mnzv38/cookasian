-- Données propre pour démonstration : recettes + ingrédients + étapes

INSERT INTO recettes (id, titre, slug, description, temps_preparation, temps_cuisson, difficulte, nombre_personnes, image_url, pays_origine)
VALUES
(1, 'Ramen Shoyu', 'ramen-shoyu', 'Soupe de nouilles japonaise au bouillon de soja, garnie de porc chashu et œuf mollet.', 30, 120, 'moyen', 4, 'ramen-shoyu.webp', 'Japon'),
(2, 'Pad Thaï aux crevettes', 'pad-thai-crevettes', 'Nouilles de riz sautées façon Thaïlande avec crevettes et citron vert.', 20, 15, 'facile', 2, 'pad-thai.webp', 'Thaïlande'),
(3, 'Bo Bun vietnamien', 'bo-bun-vietnamien', 'Salade vietnamienne complète avec vermicelles, bœuf mariné et herbes fraîches.', 40, 10, 'facile', 4, 'bo-bun.webp', 'Vietnam'),
(4, 'Poulet au curry japonais', 'poulet-curry-japonais', 'Curry doux japonais accompagné de riz.', 15, 25, 'facile', 4, 'curry-japonais.webp', 'Japon'),
(5, 'Dumplings aux légumes', 'dumplings-legumes', 'Raviolis vapeur chinois farcis aux légumes.', 60, 20, 'difficile', 6, 'dumplings.webp', 'Chine'),
(6, 'Bibimbap coréen', 'bibimbap-coreen', 'Bol coréen : riz, légumes, viande, œuf et gochujang.', 30, 20, 'moyen', 2, 'bibimbap.webp', 'Corée du Sud');

-- INGREDIENTS 

INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
-- Ramen Shoyu
(1, 'Nouilles ramen', '400g', 1),
(1, 'Bouillon de poulet', '1,5L', 2),
(1, 'Sauce soja', '100ml', 3),
(1, 'Poitrine de porc', '300g', 4),
(1, 'Œufs', '4', 5),
(1, 'Oignons verts', '2 tiges', 6),
(1, 'Algue nori', '4 feuilles', 7),
(1, 'Champignons shiitake', '8', 8),

-- Pad Thaï
(2, 'Nouilles de riz', '250g', 1),
(2, 'Crevettes décortiquées', '300g', 2),
(2, 'Œufs', '2', 3),
(2, 'Sauce de poisson', '3 c. à s.', 4),
(2, 'Sucre de palme', '2 c. à s.', 5),
(2, 'Cacahuètes', '50g', 6),
(2, 'Citron vert', '1', 7),
(2, 'Pousses de soja', '100g', 8),

-- Bo Bun
(3, 'Vermicelles de riz', '200g', 1),
(3, 'Bœuf émincé', '250g', 2),
(3, 'Carottes râpées', '100g', 3),
(3, 'Concombre', '100g', 4),
(3, 'Herbes fraîches', '1 poignée', 5),
(3, 'Sauce nuoc mam', '50ml', 6),
(3, 'Cacahuètes', '2 c. à s.', 7),

-- Curry japonais
(4, 'Poulet', '400g', 1),
(4, 'Pommes de terre', '2', 2),
(4, 'Carottes', '2', 3),
(4, 'Oignon', '1', 4),
(4, 'Pâte de curry', '100g', 5),
(4, 'Bouillon', '600ml', 6),
(4, 'Riz', '2 bols', 7),

-- Dumplings
(5, 'Pâte à dumplings', '24 feuilles', 1),
(5, 'Chou chinois', '200g', 2),
(5, 'Carottes', '80g', 3),
(5, 'Champignons noirs', '50g', 4),
(5, 'Cébette', '1 tige', 5),
(5, 'Sauce soja', '2 c. à s.', 6),
(5, 'Huile de sésame', '1 c. à s.', 7),

-- Bibimbap
(6, 'Riz chaud', '2 bols', 1),
(6, 'Bœuf sauté', '150g', 2),
(6, 'Épinards', '100g', 3),
(6, 'Carottes', '1', 4),
(6, 'Courgette', '1', 5),
(6, 'Œuf', '2', 6),
(6, 'Sauce gochujang', '2 c. à s.', 7),
(6, 'Huile de sésame', '1 c. à s.', 8);

-- ETAPES
INSERT INTO etapes (recette_id, numero, description) VALUES
-- Ramen Shoyu
(1, 1, 'Préparer le bouillon.'),
(1, 2, 'Cuire et mariner le porc.'),
(1, 3, 'Cuire les œufs.'),
(1, 4, 'Cuire les nouilles.'),
(1, 5, 'Sauter les shiitake.'),
(1, 6, 'Assembler le bol.'),

-- Pad Thai
(2, 1, 'Faire tremper les nouilles.'),
(2, 2, 'Préparer la sauce.'),
(2, 3, 'Cuire les crevettes.'),
(2, 4, 'Ajouter les œufs.'),
(2, 5, 'Ajouter les nouilles + sauce.'),
(2, 6, 'Servir.'),

-- Bo Bun
(3, 1, 'Cuire vermicelles.'),
(3, 2, 'Mariner le bœuf.'),
(3, 3, 'Sauter le bœuf.'),
(3, 4, 'Préparer les légumes.'),
(3, 5, 'Assembler.'),
(3, 6, 'Servir.'),

-- Curry
(4, 1, 'Dorer le poulet.'),
(4, 2, 'Ajouter légumes.'),
(4, 3, 'Ajouter bouillon.'),
(4, 4, 'Mijoter.'),
(4, 5, 'Ajouter pâte.'),
(4, 6, 'Servir.'),

-- Dumplings
(5, 1, 'Préparer garniture.'),
(5, 2, 'Cuire garniture.'),
(5, 3, 'Assaisonner.'),
(5, 4, 'Former dumplings.'),
(5, 5, 'Cuire.'),

-- Bibimbap
(6, 1, 'Cuire légumes séparément.'),
(6, 2, 'Cuire viande.'),
(6, 3, 'Cuire œuf.'),
(6, 4, 'Poser riz.'),
(6, 5, 'Assembler.'),
(6, 6, 'Ajouter sauce.');
