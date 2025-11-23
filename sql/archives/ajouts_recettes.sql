-- =====================================================
-- AJOUTS RECETTES - TABLES ingredients & etapes
-- =====================================================
-- Date : 2025-11-05
-- Projet : COOKASIAN
-- Description : Données complémentaires pour les recettes 3 à 6
-- =====================================================

-- 🇻🇳 Bo Bun vietnamien (id = 3)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(3, 'Vermicelles de riz', '200g', 1),
(3, 'Bœuf émincé', '250g', 2),
(3, 'Carottes râpées', '100g', 3),
(3, 'Concombre', '100g', 4),
(3, 'Menthe et coriandre fraîches', '1 poignée', 5),
(3, 'Sauce nuoc mam préparée', '50ml', 6),
(3, 'Cacahuètes concassées', '2 cuillères à soupe', 7);

INSERT INTO etapes (recette_id, numero, description) VALUES
(3, 1, 'Cuire les vermicelles de riz selon les instructions, puis les rincer à l’eau froide.'),
(3, 2, 'Faire mariner le bœuf avec ail, sucre, nuoc mam et citronnelle.'),
(3, 3, 'Faire sauter le bœuf dans un wok bien chaud 3 à 4 minutes.'),
(3, 4, 'Préparer les légumes : râper les carottes, couper le concombre en fins bâtonnets.'),
(3, 5, 'Dans un grand bol, disposer les vermicelles, les légumes, le bœuf, les herbes et les cacahuètes.'),
(3, 6, 'Verser un peu de sauce nuoc mam au moment de servir.');

-- 🇯🇵 Poulet au curry japonais (id = 4)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(4, 'Poulet (cuisses ou blancs)', '400g', 1),
(4, 'Pommes de terre', '2 moyennes', 2),
(4, 'Carottes', '2', 3),
(4, 'Oignon', '1 gros', 4),
(4, 'Pâte de curry japonais (roux)', '100g', 5),
(4, 'Bouillon de volaille', '600ml', 6),
(4, 'Riz blanc cuit', '2 bols', 7);

INSERT INTO etapes (recette_id, numero, description) VALUES
(4, 1, 'Faire revenir le poulet dans une casserole avec un peu d’huile jusqu’à coloration.'),
(4, 2, 'Ajouter l’oignon émincé, les carottes et les pommes de terre coupées en morceaux.'),
(4, 3, 'Verser le bouillon de volaille et porter à ébullition.'),
(4, 4, 'Couvrir et laisser mijoter 20 à 25 minutes à feu moyen.'),
(4, 5, 'Incorporer la pâte de curry japonais, bien remuer pour l’épaissir.'),
(4, 6, 'Servir chaud avec le riz blanc.');

-- 🇨🇳 Dumplings aux légumes (id = 5)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(5, 'Pâte à dumplings (ronds)', '24 feuilles', 1),
(5, 'Chou chinois', '200g', 2),
(5, 'Carottes râpées', '80g', 3),
(5, 'Champignons noirs', '50g', 4),
(5, 'Cébette', '1 tige', 5),
(5, 'Sauce soja', '2 cuillères à soupe', 6),
(5, 'Huile de sésame', '1 cuillère à soupe', 7);

INSERT INTO etapes (recette_id, numero, description) VALUES
(5, 1, 'Hacher finement le chou chinois, la carotte, la cébette et les champignons.'),
(5, 2, 'Faire revenir le tout 5 minutes avec un filet d’huile de sésame.'),
(5, 3, 'Assaisonner avec la sauce soja, laisser refroidir.'),
(5, 4, 'Déposer une cuillère de farce au centre de chaque pâte et refermer en pinçant les bords.'),
(5, 5, 'Cuire à la vapeur pendant 8 minutes ou à la poêle avec un fond d’eau (méthode potsticker).');

-- 🇰🇷 Bibimbap coréen (id = 6)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(6, 'Riz cuit chaud', '2 bols', 1),
(6, 'Bœuf haché ou émincé', '150g', 2),
(6, 'Épinards', '100g', 3),
(6, 'Carottes', '1', 4),
(6, 'Courgette', '1', 5),
(6, 'Œuf', '2', 6),
(6, 'Sauce gochujang', '2 cuillères à soupe', 7),
(6, 'Huile de sésame', '1 cuillère à soupe', 8);

INSERT INTO etapes (recette_id, numero, description) VALUES
(6, 1, 'Faire revenir séparément les légumes émincés dans un peu d’huile de sésame.'),
(6, 2, 'Faire sauter le bœuf avec sauce soja, sucre et ail haché.'),
(6, 3, 'Cuire les œufs sur le plat.'),
(6, 4, 'Dans un grand bol, déposer le riz chaud au fond.'),
(6, 5, 'Disposer joliment les légumes, le bœuf et l’œuf au-dessus.'),
(6, 6, 'Ajouter une cuillère de gochujang et un filet d’huile de sésame avant de servir.');
