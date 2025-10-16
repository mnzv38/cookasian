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

-- Insertion de données de test
INSERT INTO recettes (titre, slug, description, temps_preparation, temps_cuisson, difficulte, nombre_personnes, image_url, pays_origine) VALUES
('Ramen Shoyu', 'ramen-shoyu', 'Soupe de nouilles japonaise au bouillon de soja, garnie de porc chashu, œuf mollet et légumes croquants.', 30, 120, 'moyen', 4, '/assets/images/ramen-shoyu.jpg', 'Japon'),
('Pad Thaï aux crevettes', 'pad-thai-crevettes', 'Nouilles de riz sautées typiques de Thaïlande, accompagnées de crevettes, cacahuètes et citron vert.', 20, 15, 'facile', 2, '/assets/images/pad-thai.jpg', 'Thaïlande'),
('Bo Bun vietnamien', 'bo-bun-vietnamien', 'Salade de vermicelles de riz avec bœuf mariné, herbes fraîches et sauce nuoc mam.', 40, 10, 'facile', 4, '/assets/images/bo-bun.jpg', 'Vietnam'),
('Poulet au curry japonais', 'poulet-curry-japonais', 'Curry doux et parfumé servi avec du riz blanc et des légumes fondants.', 15, 25, 'facile', 4, '/assets/images/curry-japonais.jpg', 'Japon'),
('Dumplings aux légumes', 'dumplings-legumes', 'Raviolis vapeur chinois farcis aux légumes croquants, servis avec sauce soja.', 60, 20, 'difficile', 6, '/assets/images/dumplings.jpg', 'Chine'),
('Bibimbap coréen', 'bibimbap-coreen', 'Bol de riz garni de légumes sautés, viande, œuf et sauce gochujang épicée.', 30, 20, 'moyen', 2, '/assets/images/bibimbap.jpg', 'Corée du Sud');