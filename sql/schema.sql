-- Base de données COOKASIAN
-- Création de la table recettes

CREATE TABLE IF NOT EXISTS recettes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    temps_preparation INT UNSIGNED NOT NULL COMMENT 'Temps en minutes',
    temps_cuisson INT UNSIGNED NOT NULL COMMENT 'Temps en minutes',
    difficulte ENUM('facile', 'moyen', 'difficile') NOT NULL DEFAULT 'moyen',
    nombre_personnes TINYINT UNSIGNED NOT NULL DEFAULT 4,
    image_url VARCHAR(500) NOT NULL,
    pays_origine VARCHAR(100) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_slug (slug),
    INDEX idx_pays (pays_origine)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des ingrédients par recette
CREATE TABLE IF NOT EXISTS ingredients (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    recette_id INT UNSIGNED NOT NULL,
    nom VARCHAR(255) NOT NULL,
    quantite VARCHAR(100) NOT NULL,
    ordre TINYINT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY (recette_id) REFERENCES recettes(id) ON DELETE CASCADE,
    INDEX idx_recette (recette_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table des étapes de préparation
CREATE TABLE IF NOT EXISTS etapes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    recette_id INT UNSIGNED NOT NULL,
    numero TINYINT UNSIGNED NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (recette_id) REFERENCES recettes(id) ON DELETE CASCADE,
    INDEX idx_recette (recette_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion de données de test (recettes déjà existantes)
INSERT INTO recettes (titre, slug, description, temps_preparation, temps_cuisson, difficulte, nombre_personnes, image_url, pays_origine) VALUES
('Ramen Shoyu', 'ramen-shoyu', 'Soupe de nouilles japonaise au bouillon de soja, garnie de porc chashu, œuf mollet et légumes croquants.', 30, 120, 'moyen', 4, '/assets/images/ramen-shoyu.jpg', 'Japon'),
('Pad Thaï aux crevettes', 'pad-thai-crevettes', 'Nouilles de riz sautées typiques de Thaïlande, accompagnées de crevettes, cacahuètes et citron vert.', 20, 15, 'facile', 2, '/assets/images/pad-thai.jpg', 'Thaïlande'),
('Bo Bun vietnamien', 'bo-bun-vietnamien', 'Salade de vermicelles de riz avec bœuf mariné, herbes fraîches et sauce nuoc mam.', 40, 10, 'facile', 4, '/assets/images/bo-bun.jpg', 'Vietnam'),
('Poulet au curry japonais', 'poulet-curry-japonais', 'Curry doux et parfumé servi avec du riz blanc et des légumes fondants.', 15, 25, 'facile', 4, '/assets/images/curry-japonais.jpg', 'Japon'),
('Dumplings aux légumes', 'dumplings-legumes', 'Raviolis vapeur chinois farcis aux légumes croquants, servis avec sauce soja.', 60, 20, 'difficile', 6, '/assets/images/dumplings.jpg', 'Chine'),
('Bibimbap coréen', 'bibimbap-coreen', 'Bol de riz garni de légumes sautés, viande, œuf et sauce gochujang épicée.', 30, 20, 'moyen', 2, '/assets/images/bibimbap.jpg', 'Corée du Sud')
ON DUPLICATE KEY UPDATE titre=titre;

-- Ingrédients pour Ramen Shoyu (id 1)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(1, 'Nouilles ramen', '400g', 1),
(1, 'Bouillon de poulet', '1,5L', 2),
(1, 'Sauce soja', '100ml', 3),
(1, 'Poitrine de porc', '300g', 4),
(1, 'Œufs', '4', 5),
(1, 'Oignons verts', '2 tiges', 6),
(1, 'Algue nori', '4 feuilles', 7),
(1, 'Champignons shiitake', '8', 8);

-- Étapes pour Ramen Shoyu (id 1)
INSERT INTO etapes (recette_id, numero, description) VALUES
(1, 1, 'Préparer le bouillon : faire mijoter le bouillon de poulet avec la sauce soja pendant 1h30.'),
(1, 2, 'Mariner le porc avec de l\'ail et du gingembre, puis le cuire à feu doux pendant 45 minutes.'),
(1, 3, 'Faire cuire les œufs 6 minutes pour obtenir des œufs mollets. Les refroidir et les écaler.'),
(1, 4, 'Cuire les nouilles ramen selon les instructions du paquet (environ 3-4 minutes).'),
(1, 5, 'Faire revenir les champignons shiitake dans un peu d\'huile de sésame.'),
(1, 6, 'Assembler : verser le bouillon chaud sur les nouilles, ajouter les tranches de porc, l\'œuf coupé en deux, les champignons, les oignons verts et les algues nori.');

-- Ingrédients pour Pad Thaï (id 2)
INSERT INTO ingredients (recette_id, nom, quantite, ordre) VALUES
(2, 'Nouilles de riz', '250g', 1),
(2, 'Crevettes décortiquées', '300g', 2),
(2, 'Œufs', '2', 3),
(2, 'Sauce de poisson', '3 cuillères à soupe', 4),
(2, 'Sucre de palme', '2 cuillères à soupe', 5),
(2, 'Cacahuètes', '50g', 6),
(2, 'Citron vert', '1', 7),
(2, 'Pousses de soja', '100g', 8);

-- Étapes pour Pad Thaï (id 2)
INSERT INTO etapes (recette_id, numero, description) VALUES
(2, 1, 'Faire tremper les nouilles de riz dans l\'eau tiède pendant 20 minutes.'),
(2, 2, 'Préparer la sauce en mélangeant sauce de poisson, sucre de palme et jus de citron vert.'),
(2, 3, 'Faire chauffer un wok avec de l\'huile et faire revenir les crevettes 2-3 minutes.'),
(2, 4, 'Pousser les crevettes sur le côté, casser les œufs et les brouiller rapidement.'),
(2, 5, 'Ajouter les nouilles égouttées et la sauce, mélanger pendant 2 minutes à feu vif.'),
(2, 6, 'Servir avec les cacahuètes concassées, pousses de soja et quartiers de citron vert.');