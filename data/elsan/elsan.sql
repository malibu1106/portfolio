-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db_elsan
-- Généré le : jeu. 07 nov. 2024 à 09:27
-- Version du serveur : 8.0.39
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elsan`
--

-- --------------------------------------------------------

--
-- Structure de la table `benefits`
--

CREATE TABLE `benefits` (
  `benefit_id` int NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `benefits`
--

INSERT INTO `benefits` (`benefit_id`, `company_name`, `image_url`, `description`, `category`, `address`) VALUES
(1, 'Chocolats', '../images/uploads/chocolaterie.png', 'test test test', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(2, 'Leclerc test', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(3, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(4, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(5, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(6, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(7, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(8, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(9, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(10, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(11, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches'),
(12, 'Leclerc', '../images/uploads/leclerc.png', 'Avec le Comité d\'Entreprise Leclerc, profitez d\'avantages exclusifs : 10% de réduction sur les produits frais, dont le poisson et la charcuterie, un chèque cadeau de 50€ valable en magasin chaque trimestre, des tarifs préférentiels pour vos loisirs et vacances, ainsi que des offres spéciales sur les appareils électroménagers et high-tech.', 'alimentation', '4 avenue du trésor, 58110 Biches');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'culture'),
(2, 'alimentation'),
(3, 'loisirs'),
(4, 'bien-etre'),
(5, 'transport'),
(6, 'education'),
(7, 'famille'),
(8, 'vacances'),
(9, 'technologie');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `news_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`news_id`, `title`, `text`, `date`) VALUES
(1, 'Le chocolat au lait', 'Le chocolat au lait est un mélange savoureux de cacao, de lait et de sucre, offrant une texture crémeuse et un goût doux. Populaire dans les desserts et les collations, il est apprécié pour sa douceur équilibrée et son fondant en bouche.', '2025-10-07 21:58:52'),
(2, 'La girafe dorée', 'La girafe dorée, créature rare et imaginaire, évoque l\'élégance et la grandeur. Sa silhouette élancée, recouverte d\'une teinte dorée scintillante, lui confère un air majestueux et presque mystique. Ce symbole de beauté et de noblesse captive l\'imagination avec son éclat inégalé.', '2025-10-09 21:59:06'),
(3, 'La différence entre un pigeon', 'La différence entre un pigeon et d\'autres oiseaux réside principalement dans son adaptation à la vie urbaine. Oiseau commun des villes, le pigeon est souvent associé aux environnements humains, se nourrissant de déchets et vivant en groupes.', '2025-10-14 21:59:21'),
(4, 'Le chocolat au lait', 'Le chocolat au lait est un mélange savoureux de cacao, de lait et de sucre, offrant une texture crémeuse et un goût doux. Populaire dans les desserts et les collations, il est apprécié pour sa douceur équilibrée et son fondant en bouche.', '2025-10-18 21:58:51'),
(5, 'La girafe dorée', 'La girafe dorée, créature rare et imaginaire, évoque l\'élégance et la grandeur. Sa silhouette élancée, recouverte d\'une teinte dorée scintillante, lui confère un air majestueux et presque mystique. Ce symbole de beauté et de noblesse captive l\'imagination avec son éclat inégalé.', '2025-10-19 21:59:06'),
(6, 'La différence entre un pigeon', 'La différence entre un pigeon et d\'autres oiseaux réside principalement dans son adaptation à la vie urbaine. Oiseau commun des villes, le pigeon est souvent associé aux environnements humains, se nourrissant de déchets et vivant en groupes.', '2025-10-24 21:59:21'),
(7, 'La girafe dorée test', 'La girafe dorée, créature rare et imaginaire, évoque l\'élégance et la grandeur. Sa silhouette élancée, recouverte d\'une teinte dorée scintillante, lui confère un air majestueux et presque mystique. Ce symbole de beauté et de noblesse captive l\'imagination avec son éclat inégalé.', '2025-11-07 08:55:30');

-- --------------------------------------------------------

--
-- Structure de la table `permanences`
--

CREATE TABLE `permanences` (
  `permanence_id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `representative` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `permanences`
--

INSERT INTO `permanences` (`permanence_id`, `date`, `time`, `representative`) VALUES
(1, '08/10/25', '13h30/14h30', 'Sabine'),
(2, '14/10/25', '10h30/11h30', 'Corinne'),
(3, '22/10/25', '15h30/16h30', 'Monique'),
(4, '08/11/25', '13h30/14h30', 'Sabine');

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `current_request_id` int NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`current_request_id`, `company_name`, `image_url`, `description`, `date`, `status`, `address`, `category`) VALUES
(1, 'Leclerc', '../images/uploads/leclerc.png', 'blablabla', '2024-10-10 11:26:50', 'défavorable', '5 avenue du pape, 92100 jeannot', 'alimentation');

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `suggestion_id` int NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `suggestions`
--

INSERT INTO `suggestions` (`suggestion_id`, `company_name`, `description`, `image_url`, `date`, `address`, `user_id`, `is_visible`) VALUES
(1, 'Leclerc', 'Oui bon voilà alors ce serait cool d’avoir des réductions chez Leclerc', '../images/uploads/leclerc.png', '2024-10-07 22:12:48', '4 avenue du trésor, 58110 Biches', 1, 1),
(2, 'La chocolaterie', 'Oui bon voilà alors ce serait cool d’avoir des réductions à la chocolaterie de ma grande tante Tessy', '../images/uploads/chocolaterie.png', '2024-10-12 22:12:48', '4 avenue du général Louis, 58000 Nevers', 1, 1),
(3, 'Saveurs d’orient', 'J’adore les kebabs ! La viande et le pain sont faits maison, alors ça vaut le coup !', '../images/uploads/kebab.png', '2024-10-16 22:12:48', 'Pas loin de la cathédrale de Nevers', 1, 1),
(4, 'Leclerc', 'Oui bon voilà alors ce serait cool d’avoir des réductions chez Leclerc', '../images/uploads/leclerc.png', '2024-10-21 22:12:48', '4 avenue du trésor, 58110 Biches', 1, 1),
(5, 'La chocolaterie', 'Oui bon voilà alors ce serait cool d’avoir des réductions à la chocolaterie de ma grande tante Tessy', '../images/uploads/chocolaterie.png', '2024-10-25 22:12:48', '4 avenue du général Louis, 58000 Nevers', 1, 1),
(6, 'Saveurs d’orient', 'J’adore les kebabs ! La viande et le pain sont faits maison, alors ça vaut le coup !', '../images/uploads/kebab.png', '2024-10-30 22:12:48', 'Pas loin de la cathédrale de Nevers', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'Roberto', 'De Sousa', 'malibu1106@gmail.com', '$2y$10$gNKVYa5G0WSdCH8WNM93aO9Tr0.DzQeNvYu.7y0IxuE1lIasCsDDu', 'admin'),
(2, 'Gepeto', 'Jean-Paul', 'jeanpaulgepeto@gmail.com', '$2y$10$zm5dX9QO.tvmnOYJYLG8dey/gjFpEYiIh1138iB9w37cmzp4AMRnS', 'user'),
(3, 'Jean', 'Dupond', 'jeandupond@gmail.com', '$2y$10$zm5dX9QO.tvmnOYJYLG8dey/gjFpEYiIh1138iB9w37cmzp4AMRnS', 'to_approve'),
(4, 'super', 'user', 'superuser@elsan.com', '$2y$10$sVKaqpTHC0FzpTeLf49cluIEinFtAUDZHxExCphRWS2KLh6zYeTWO', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int NOT NULL,
  `user_id` int NOT NULL,
  `suggestion_id` int NOT NULL,
  `vote_value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`vote_id`, `user_id`, `suggestion_id`, `vote_value`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, -1),
(4, 1, 6, 1),
(5, 1, 5, 1),
(6, 2, 6, -1),
(7, 1, 10, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`benefit_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Index pour la table `permanences`
--
ALTER TABLE `permanences`
  ADD PRIMARY KEY (`permanence_id`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`current_request_id`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `benefit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `permanences`
--
ALTER TABLE `permanences`
  MODIFY `permanence_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `current_request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
