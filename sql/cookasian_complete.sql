-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : dim. 23 nov. 2025
-- Version du serveur : 8.0.43
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cookasian`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_envoi` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `nom`, `email`, `message`, `date_envoi`) VALUES
(1, 'Bryan Fury', 'bryan.fury@namco.com', 'Bonjour Cookasian,\r\n\r\nJe voulais juste signaler une anomalie…  \r\nChaque fois que je regarde vos créations culinaires, mon rythme moteur devient irrégulier.  \r\nJe pense que ça s’appelle “être impressionné”.  \r\nSi vous avez un conseil pour un plat simple à préparer sans tout faire exploser, je suis volontaire.\r\n\r\nBryan', '2025-11-13 15:07:26');

-- --------------------------------------------------------

--
-- Structure de la table `etapes`
--

CREATE TABLE `etapes` (
  `id` int UNSIGNED NOT NULL,
  `recette_id` int UNSIGNED NOT NULL,
  `numero` tinyint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etapes`
--

INSERT INTO `etapes` (`id`, `recette_id`, `numero`, `description`) VALUES
(1, 1, 1, 'Préparer le bouillon : faire mijoter le bouillon de poulet avec la sauce soja pendant 1h30.'),
(2, 1, 2, 'Mariner le porc avec de l\'ail et du gingembre, puis le cuire à feu doux pendant 45 minutes.'),
(3, 1, 3, 'Faire cuire les œufs 6 minutes pour obtenir des œufs mollets. Les refroidir et les écaler.'),
(4, 1, 4, 'Cuire les nouilles ramen selon les instructions du paquet (environ 3-4 minutes).'),
(5, 1, 5, 'Faire revenir les champignons shiitake dans un peu d\'huile de sésame.'),
(6, 1, 6, 'Assembler : verser le bouillon chaud sur les nouilles, ajouter les tranches de porc, l\'œuf coupé en deux, les champignons, les oignons verts et les algues nori.'),
(7, 2, 1, 'Faire tremper les nouilles de riz dans l\'eau tiède pendant 20 minutes.'),
(8, 2, 2, 'Préparer la sauce en mélangeant sauce de poisson, sucre de palme et jus de citron vert.'),
(9, 2, 3, 'Faire chauffer un wok avec de l\'huile et faire revenir les crevettes 2-3 minutes.'),
(10, 2, 4, 'Pousser les crevettes sur le côté, casser les œufs et les brouiller rapidement.'),
(11, 2, 5, 'Ajouter les nouilles égouttées et la sauce, mélanger pendant 2 minutes à feu vif.'),
(12, 2, 6, 'Servir avec les cacahuètes concassées, pousses de soja et quartiers de citron vert.'),
(13, 3, 1, 'Cuire les vermicelles de riz selon les instructions, puis les rincer à l’eau froide.'),
(14, 3, 2, 'Faire mariner le bœuf avec ail, sucre, nuoc mam et citronnelle.'),
(15, 3, 3, 'Faire sauter le bœuf dans un wok bien chaud 3 à 4 minutes.'),
(16, 3, 4, 'Préparer les légumes : râper les carottes, couper le concombre en fins bâtonnets.'),
(17, 3, 5, 'Dans un grand bol, disposer les vermicelles, les légumes, le bœuf, les herbes et les cacahuètes.'),
(18, 3, 6, 'Verser un peu de sauce nuoc mam au moment de servir.'),
(19, 4, 1, 'Faire revenir le poulet dans une casserole avec un peu d’huile jusqu’à coloration.'),
(20, 4, 2, 'Ajouter l’oignon émincé, les carottes et les pommes de terre coupées en morceaux.'),
(21, 4, 3, 'Verser le bouillon de volaille et porter à ébullition.'),
(22, 4, 4, 'Couvrir et laisser mijoter 20 à 25 minutes à feu moyen.'),
(23, 4, 5, 'Incorporer la pâte de curry japonais, bien remuer pour l’épaissir.'),
(24, 4, 6, 'Servir chaud avec le riz blanc.'),
(25, 5, 1, 'Hacher finement le chou chinois, la carotte, la cébette et les champignons.'),
(26, 5, 2, 'Faire revenir le tout 5 minutes avec un filet d’huile de sésame.'),
(27, 5, 3, 'Assaisonner avec la sauce soja, laisser refroidir.'),
(28, 5, 4, 'Déposer une cuillère de farce au centre de chaque pâte et refermer en pinçant les bords.'),
(29, 5, 5, 'Cuire à la vapeur pendant 8 minutes ou à la poêle avec un fond d’eau (méthode potsticker).'),
(30, 6, 1, 'Faire revenir séparément les légumes émincés dans un peu d’huile de sésame.'),
(31, 6, 2, 'Faire sauter le bœuf avec sauce soja, sucre et ail haché.'),
(32, 6, 3, 'Cuire les œufs sur le plat.'),
(33, 6, 4, 'Dans un grand bol, déposer le riz chaud au fond.'),
(34, 6, 5, 'Disposer joliment les légumes, le bœuf et l’œuf au-dessus.'),
(35, 6, 6, 'Ajouter une cuillère de gochujang et un filet d’huile de sésame avant de servir.');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int UNSIGNED NOT NULL,
  `utilisateur_id` int UNSIGNED NOT NULL,
  `recette_id` int UNSIGNED NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `utilisateur_id`, `recette_id`, `date_creation`) VALUES
(58, 1, 6, '2025-11-16 03:25:14'),
(61, 1, 3, '2025-11-16 03:25:46'),
(94, 1, 1, '2025-11-20 12:49:59'),
(97, 1, 2, '2025-11-20 21:09:33');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int UNSIGNED NOT NULL,
  `recette_id` int UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` tinyint UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recette_id`, `nom`, `quantite`, `ordre`) VALUES
(1, 1, 'Nouilles ramen', '400g', 1),
(2, 1, 'Bouillon de poulet', '1,5L', 2),
(3, 1, 'Sauce soja', '100ml', 3),
(4, 1, 'Poitrine de porc', '300g', 4),
(5, 1, 'Œufs', '4', 5),
(6, 1, 'Oignons verts', '2 tiges', 6),
(7, 1, 'Algue nori', '4 feuilles', 7),
(8, 1, 'Champignons shiitake', '8', 8),
(9, 2, 'Nouilles de riz', '250g', 1),
(10, 2, 'Crevettes décortiquées', '300g', 2),
(11, 2, 'Œufs', '2', 3),
(12, 2, 'Sauce de poisson', '3 cuillères à soupe', 4),
(13, 2, 'Sucre de palme', '2 cuillères à soupe', 5),
(14, 2, 'Cacahuètes', '50g', 6),
(15, 2, 'Citron vert', '1', 7),
(16, 2, 'Pousses de soja', '100g', 8),
(17, 3, 'Vermicelles de riz', '200g', 1),
(18, 3, 'Bœuf émincé', '250g', 2),
(19, 3, 'Carottes râpées', '100g', 3),
(20, 3, 'Concombre', '100g', 4),
(21, 3, 'Menthe et coriandre fraîches', '1 poignée', 5),
(22, 3, 'Sauce nuoc mam préparée', '50ml', 6),
(23, 3, 'Cacahuètes concassées', '2 cuillères à soupe', 7),
(24, 4, 'Poulet (cuisses ou blancs)', '400g', 1),
(25, 4, 'Pommes de terre', '2 moyennes', 2),
(26, 4, 'Carottes', '2', 3),
(27, 4, 'Oignon', '1 gros', 4),
(28, 4, 'Pâte de curry japonais (roux)', '100g', 5),
(29, 4, 'Bouillon de volaille', '600ml', 6),
(30, 4, 'Riz blanc cuit', '2 bols', 7),
(31, 5, 'Pâte à dumplings (ronds)', '24 feuilles', 1),
(32, 5, 'Chou chinois', '200g', 2),
(33, 5, 'Carottes râpées', '80g', 3),
(34, 5, 'Champignons noirs', '50g', 4),
(35, 5, 'Cébette', '1 tige', 5),
(36, 5, 'Sauce soja', '2 cuillères à soupe', 6),
(37, 5, 'Huile de sésame', '1 cuillère à soupe', 7),
(38, 6, 'Riz cuit chaud', '2 bols', 1),
(39, 6, 'Bœuf haché ou émincé', '150g', 2),
(40, 6, 'Épinards', '100g', 3),
(41, 6, 'Carottes', '1', 4),
(42, 6, 'Courgette', '1', 5),
(43, 6, 'Œuf', '2', 6),
(44, 6, 'Sauce gochujang', '2 cuillères à soupe', 7),
(45, 6, 'Huile de sésame', '1 cuillère à soupe', 8);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `temps_preparation` int UNSIGNED NOT NULL,
  `temps_cuisson` int UNSIGNED NOT NULL,
  `difficulte` enum('facile','moyen','difficile') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'moyen',
  `nombre_personnes` tinyint UNSIGNED NOT NULL DEFAULT '4',
  `image_url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `pays_origine` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modification` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `titre`, `slug`, `description`, `temps_preparation`, `temps_cuisson`, `difficulte`, `nombre_personnes`, `image_url`, `pays_origine`, `date_creation`, `date_modification`) VALUES
(1, 'Ramen Shoyu', 'ramen-shoyu', 'Soupe de nouilles japonaise au bouillon de soja, garnie de porc chashu, œuf mollet et légumes croquants.', 30, 120, 'moyen', 4, 'ramen-shoyu.webp', 'Japon', '2025-10-16 02:54:11', '2025-11-15 00:13:38'),
(2, 'Pad Thaï aux crevettes', 'pad-thai-crevettes', 'Nouilles de riz sautées typiques de Thaïlande, accompagnées de crevettes, cacahuètes et citron vert.', 20, 15, 'facile', 2, 'pad-thai.webp', 'Thaïlande', '2025-10-16 02:54:11', '2025-11-15 00:13:39'),
(3, 'Bo Bun vietnamien', 'bo-bun-vietnamien', 'Salade de vermicelles de riz avec bœuf mariné, herbes fraîches et sauce nuoc mam.', 40, 10, 'facile', 4, 'bo-bun.webp', 'Vietnam', '2025-10-16 02:54:11', '2025-11-15 00:13:39'),
(4, 'Poulet au curry japonais', 'poulet-curry-japonais', 'Curry doux et parfumé servi avec du riz blanc et des légumes fondants.', 15, 25, 'facile', 4, 'curry-japonais.webp', 'Japon', '2025-10-16 02:54:11', '2025-11-15 00:13:39'),
(5, 'Dumplings aux légumes', 'dumplings-legumes', 'Raviolis vapeur chinois farcis aux légumes croquants, servis avec sauce soja.', 60, 20, 'difficile', 6, 'dumplings.webp', 'Chine', '2025-10-16 02:54:11', '2025-11-15 00:13:39'),
(6, 'Bibimbap coréen', 'bibimbap-coreen', 'Bol de riz garni de légumes sautés, viande, œuf et sauce gochujang épicée.', 30, 20, 'moyen', 2, 'bibimbap.webp', 'Corée du Sud', '2025-10-16 02:54:11', '2025-11-15 00:13:39');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password_hash`, `remember_token`, `created_at`) VALUES
(1, 'jun.kazama@namco.com', 'Jun KAZAMA', '$2y$10$UM5FrMPnLqRcuO8CqN196OA8C1ukejy0eDDnIiLQxsSc0a6wAVRPu', NULL, '2025-10-28 17:02:58'),
(2, 'lee.chaolan@namco.com', 'Lee Chaolan', '$2y$12$094WuOy0TwsfpfaEWoy4JuLSmfHbr/iWV3uo0fjD2rOKFNdThcSpa', NULL, '2025-10-30 15:25:28'),
(3, 'jade.green@mk.com', 'Jade Green', '$2y$12$AKIlK3rmsFlNSDjGFAovqu3QegPr3r5VIj93DLZyVOYBSeyoGauiS', NULL, '2025-10-30 15:39:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_recette` (`recette_id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_favori` (`utilisateur_id`,`recette_id`),
  ADD KEY `fk_favoris_recette` (`recette_id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_recette` (`recette_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `etapes_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_favoris_recette` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favoris_user` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recette_id`) REFERENCES `recettes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
