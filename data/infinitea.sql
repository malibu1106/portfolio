-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 19 juin 2024 à 09:55
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `infinitea`
--

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `weight` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'thé noir'),
(2, 'thé vert'),
(3, 'thé blanc'),
(4, 'thé oolong'),
(5, 'rooibos'),
(6, 'infusions'),
(7, 'coffrets'),
(8, 'accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `date` date DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `content` text NOT NULL,
  `price` int NOT NULL,
  `date` date DEFAULT NULL,
  `paid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `processed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description_courte` varchar(255) NOT NULL,
  `description` varchar(8000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `composition` varchar(255) NOT NULL,
  `price_kg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` int NOT NULL,
  `weight` varchar(255) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `temperature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `temps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `added_by` int NOT NULL,
  `highlight` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description_courte`, `description`, `composition`, `price_kg`, `price`, `weight`, `image_filename`, `temperature`, `temps`, `added_by`, `highlight`) VALUES
(10, 'Pluton', 'thé vert', 'Notes de pomme et de cranberry', 'Explorez la mystérieuse planète naine avec notre thé vert Pluton. Ce mélange harmonieux révèle des notes fruitées de pomme sucrée et de cranberry acidulé. Les feuilles vertes créent une expérience de dégustation équilibrée et délicate, évoquant la beauté austère et la richesse de Pluton dans le système solaire.', 'Notes de pomme et de cranberry', '45', 0, '', '../images/produits/8mmOjc2eMvmRHYXEmDfC.png', '80°C', '3 min', 5, 0),
(11, 'Aurora Boréalis', 'thé vert', 'Touches de yuzu et de fleurs de cerisier', 'Plongez dans les nuances enchanteresses de l\'aurore boréale avec notre thé vert Aurora Boréalis. Ce mélange exquis marie des touches vibrantes de yuzu rafraîchissant et la délicatesse des fleurs de cerisier. Les feuilles vertes offrent une expérience de dégustation envoûtante et équilibrée, capturant la magie et la beauté des lumières nordiques dans le ciel nocturne.', 'Touches de yuzu et de fleurs de cerisier', '57', 0, '', '../images/produits/EZ1IZsFLnW1vYgoASCDC.png', '95°C', '4 min', 5, 0),
(12, 'Cygnus', 'thé vert', 'Arômes de gingembre et de citronnelle', 'Explorez la constellation du Cygne avec notre thé vert Cygnus. Ce mélange captivant réunit des arômes épicés de gingembre et des notes fraîches de citronelle. Les feuilles vertes créent une expérience de dégustation dynamique et revitalisante, évoquant la grâce et la puissance du cygne dans le cosmos.', 'Arômes de gingembre et de citronnelle', '57', 0, '', '../images/produits/YNQFaiQFv1IscAUt30LJ.png', '75°C', '5 min', 5, 1),
(13, 'Comète', 'thé vert', 'Touches de jasmin et d\'ananas', 'Explorez la brillance fugace d\'une comète avec notre thé vert Comète. Ce mélange délicat marie harmonieusement des notes florales de jasmin envoûtant et la douceur exotique de l\'ananas. Les feuilles vertes offrent une expérience de dégustation lumineuse et rafraîchissante, capturant l\'éclat et l\'énergie fugace d\'une comète traversant le ciel nocturne.', 'Touches de jasmin et d\'ananas', '45', 0, '', '../images/produits/142ywvPPPiqcQXG4bQwz.png', '80°C', '5 min', 5, 0),
(14, 'Deneb', 'thé vert', 'Notes de menthe poivrée et d\'agrumes thé vert', 'Plongez dans la fraîcheur cosmique avec notre thé vert Deneb. Ce mélange revigorant associe des notes vives de menthe poivrée rafraîchissante et des accents d\'agrumes pétillants. Les feuilles vertes créent une expérience de dégustation dynamique et rafraîchissante, évoquant la brillance et la clarté de l\'étoile Deneb dans le firmament céleste.', 'Notes de menthe poivrée et d\'agrumes thé vert', '46', 0, '', '../images/produits/svllphBCPoZt8ywKNfr8.png', '95°C', '3 min', 5, 0),
(15, 'Éclipse', 'thé noir', 'Notes de cacao et de vanille', 'Explorez la douceur céleste avec notre thé noir Voie Lactée, une infusion délicate qui évoque les mystères de la galaxie. Ses feuilles sombres sont parsemées de touches exquises de noix de coco et d\'amande, créant un mélange harmonieux et réconfortant. Chaque tasse est une invitation à voyager à travers les étoiles, où les saveurs douces et crémeuses se fondent en une symphonie gustative.', 'Notes de cacao et de vanille', '45', 0, '', '../images/produits/uMrHmqwQlTL85CBqPWtH.png', '80°C', '5 min', 1, 0),
(16, 'Supernova', 'thé noir', 'Arômes cannelle et de zestes d\'orange', 'Découvrez la puissance explosive du thé noir Supernova, un mélange étincelant qui capte l\'essence des étoiles en fusion. Ses feuilles sombres libèrent des arômes captivants de cannelle épicée et de zestes d\'orange vibrants. Chaque tasse est une explosion de saveurs, évoquant la grandeur et l\'énergie d\'une supernova, illuminant votre palais avec une combinaison audacieuse et revigorante.', 'Arômes cannelle et de zestes d\'orange', '57', 0, '', '../images/produits/rGsRJ92a1zOOyufILxMS.png', '85°C', '5 min', 1, 0),
(17, 'Nébuleuse', 'thé noir', 'Touches de lavande et de bleuet', 'Plongez dans le mystère et la beauté du cosmos avec notre thé noir Nébuleuse. Cette infusion envoûtante est enrichie de touches délicates de lavande apaisante et de bleuet floral. Les feuilles sombres s\'entrelacent avec ces fleurs, créant une symphonie de saveurs douces et relaxantes, rappelant les nuances et les teintes d\'une nébuleuse dans l\'immensité de l\'univers.', 'Touches de lavande et de bleuet', '63', 0, '', '../images/produits/c6OXP64ExQ3b88fajGg7.png', '90°C', '3 min', 1, 0),
(18, 'Galaxie', 'thé noir', 'Notes de jasmin et pêche blanche', 'Embarquez pour un voyage interstellaire avec notre thé noir Galaxie. Cette infusion raffinée mêle harmonieusement des notes florales de jasmin envoûtant et la douceur fruitée de la pêche blanche. Les feuilles sombres créent une constellation de saveurs délicates et rafraîchissantes, évoquant la beauté et l\'immensité d\'une galaxie lointaine.', 'Notes de jasmin et pêche blanche', '120', 0, '', '../images/produits/TGr9mvomaPxPTpMT8zfF.png', '85°C', '4 min', 1, 0),
(19, 'Voie lactée', 'thé noir', 'Touches de noix de coco et d\'amande', 'Explorez la douceur céleste avec notre thé noir Voie Lactée, une infusion délicate qui évoque les mystères de la galaxie. Ses feuilles sombres sont parsemées de touches exquises de noix de coco et d\'amande, créant un mélange harmonieux et réconfortant. Chaque tasse est une invitation à voyager à travers les étoiles, où les saveurs douces et crémeuses se fondent en une symphonie gustative.', 'Touches de noix de coco et d\'amande', '69', 0, '', '../images/produits/e97WEkfzX2iXtO9jSft3.png', '85°C', '5 min', 1, 1),
(20, 'Mimas', 'thé blanc', 'Notes de poire et de fleur de sureau', 'Évadez-vous vers la lune glacée de Saturne avec notre thé blanc Mimas. Ce mélange délicat et élégant associe des notes subtiles de poire juteuse et de fleur de sureau parfumée. Les feuilles claires capturent une essence rafraîchissante et florale, offrant une expérience de dégustation légère et aérienne, semblable à la surface cristalline de Mimas.', 'Notes de poire et de fleur de sureau', '87', 0, '', '../images/produits/eMsuaztXsxic6kPX2oge.png', '95°C', '3 min', 1, 0),
(21, 'Vesper', 'thé blanc', 'Touches de pamplemousse et jasmin', 'Explorez les mystères du crépuscule avec notre thé blanc Vesper. Ce mélange délicat combine des touches vives de pamplemousse et des notes florales de jasmin envoûtant. Les feuilles claires offrent une expérience de dégustation à la fois rafraîchissante et élégante, rappelant la sérénité et la beauté du ciel au coucher du soleil.', 'Touches de pamplemousse et jasmin', '62', 0, '', '../images/produits/WdpdU7zoAmeByIEuf8Kp.png', '75°C', '5 min', 1, 1),
(22, 'Saturne', 'thé blanc', 'Arômes de vanille et de lavande', 'Voyagez vers la majestueuse planète aux anneaux avec notre thé blanc Saturne. Ce mélange sophistiqué marie les arômes apaisants de la vanille douce et les notes florales de la lavande. Les feuilles claires créent une expérience gustative sereine et raffinée, évoquant la beauté et la grandeur de Saturne dans l\'immensité du cosmos.', 'Arômes de vanille et de lavande', '120', 0, '', '../images/produits/lrhIAeQrKExLkQ5yn7Xj.png', '95°C', '5 min', 1, 0),
(23, 'Météor', 'thé blanc', 'Touches de citron et de miel', 'Traversez le ciel étoilé avec notre thé blanc Météor. Ce mélange lumineux associe des touches vives de citron rafraîchissant et la douceur naturelle du miel. Les feuilles claires offrent une expérience de dégustation éclatante et réconfortante, rappelant la lueur d\'une météorite traversant l\'atmosphère.', 'Touches de citron et de miel', '57', 0, '', '../images/produits/5PPujXXVGuC8z88XLN5e.png', '80°C', '5 min', 1, 0),
(24, 'Thétys', 'thé blanc', 'Notes de litchi et de rose', 'Découvrez la délicatesse de la lune glacée avec notre thé blanc Thétys. Ce mélange raffiné combine des notes exquises de litchi juteux et la douceur florale de la rose. Les feuilles claires créent une expérience de dégustation élégante et parfumée, évoquant la beauté et la sérénité de Thétys dans l\'immensité de l\'espace.', 'Notes de litchi et de rose', '127', 0, '', '../images/produits/36TcacRnK9TLrzWhSvIe.png', '85°C', '5 min', 1, 0),
(25, 'Neptune', 'thé oolong', 'Notes de jasmin et d\'orchidée', 'Plongez dans les profondeurs mystérieuses de la géante bleue avec notre thé oolong Neptune. Ce mélange sophistiqué marie des notes florales de jasmin envoûtant et la délicatesse parfumée de l\'orchidée. Les feuilles d\'oolong créent une expérience de dégustation complexe et élégante, évoquant la majesté et l\'énigme de Neptune dans l\'immensité de l\'espace.', 'Notes de jasmin et d\'orchidée', '125', 0, '', '../images/produits/OwdsBRWQWtJpuC42GQXW.png', '85°C', '3 min', 1, 0),
(26, 'Pandore', 'thé oolong', 'Touches de noisette et de caramel', 'Ouvrez la boîte aux merveilles avec notre thé oolong Pandore. Ce mélange gourmand révèle des touches de noisette croquante et de caramel onctueux. Les feuilles d\'oolong créent une expérience de dégustation riche et veloutée, évoquant les trésors cachés et les délices inattendus de Pandore.', 'Touches de noisette et de caramel', '57', 0, '', '../images/produits/sQJu6QexTXHvQvGu6igl.png', '80°C', '4 min', 1, 1),
(27, 'Proxima Centuri', 'thé oolong', 'Arômes de pêche et d\'abricot', 'Voyagez vers notre étoile voisine avec le thé oolong Proxima Centauri. Ce mélange fruité combine harmonieusement les arômes juteux de pêche et d\'abricot. Les feuilles d\'oolong offrent une expérience de dégustation douce et éclatante, évoquant la proximité et la chaleur de Proxima Centauri dans l\'immensité de l\'univers.', 'Arômes de pêche et d\'abricot', '140', 0, '', '../images/produits/yPQ3szKrCc1TVEmhU2zq.png', '75°C', '3 min', 1, 0),
(28, 'Eris', 'thé oolong', 'Touches de poire et de fleur d\'oranger', 'Explorez les confins du système solaire avec notre thé oolong Eris. Ce mélange délicat et sophistiqué marie des touches subtiles de poire juteuse et de fleur d\'oranger parfumée. Les feuilles d\'oolong créent une expérience de dégustation élégante et harmonieuse, rappelant la beauté mystérieuse et l\'éloignement d\'Eris dans l\'univers.', 'Touches de poire et de fleur d\'oranger', '46', 0, '', '../images/produits/X9otHEagJusywJbgpAFP.png', '95°C', '5 min', 1, 0),
(29, 'Cérès', 'thé oolong', 'Notes de citronelle et de gingembre', 'Découvrez la richesse de la ceinture d\'astéroïdes avec notre thé oolong Cérès. Ce mélange vibrant associe des notes fraîches de citronnelle et des touches épicées de gingembre. Les feuilles d\'oolong offrent une expérience de dégustation vivifiante et équilibrée, rappelant la diversité et la vitalité de Cérès, la reine des astéroïdes.', 'Notes de citronelle et de gingembre', '81', 0, '', '../images/produits/7iDzw5DEavN5GBVwNeWD.png', '85°C', '5 min', 1, 0),
(30, 'Mars', 'rooibos', 'Notes de vanille et d\'orange sanguine', 'Explorez la planète rouge avec notre rooibos Mars. Ce mélange audacieux marie des notes riches de vanille douce et des touches vives d\'orange sanguine. Les feuilles de rooibos créent une expérience de dégustation complexe et énergisante, évoquant la robustesse et le mystère de Mars dans l\'univers.', 'Notes de vanille et d\'orange sanguine', '120', 0, '', '../images/produits/wfiNePkIJfKNVAah2qVA.png', '95°C', '7 min', 1, 0),
(31, 'Tempête solaire', 'rooibos', 'Touches de gingembre et de cannelle', 'Plongez dans l\'énergie ardente d\'une tempête solaire avec notre rooibos Tempête Solaire. Ce mélange envoûtant associe des touches épicées de gingembre et de cannelle. Les feuilles de rooibos créent une expérience de dégustation chaude et revigorante, évoquant la puissance et la beauté des phénomènes solaires dans l\'espace.', 'Touches de gingembre et de cannelle', '120', 0, '', '../images/produits/2YGFBnAbVvaIsz3AUalu.png', '90°C', '6 min', 1, 1),
(32, 'Crépuscule', 'rooibos', 'Arômes d\'hibiscus et de baies de sureau', 'Plongez dans la tranquillité du crépuscule avec notre rooibos Crépuscule. Ce mélange apaisant révèle des arômes d\'hibiscus vibrants et de baies de sureau. Les feuilles de rooibos offrent une expérience de dégustation douce et fruitée, évoquant la beauté paisible du ciel au coucher du soleil.', 'Arômes d\'hibiscus et de baies de sureau', '120', 0, '', '../images/produits/O3cVaVUxLX9cIswoRr8m.png', '80°C', '6 min', 1, 0),
(33, 'Pulsar', 'rooibos', 'Touches d\'écorces d\'orange et de cardamone', 'Découvrez l\'énergie pulsante d\'un pulsar avec notre rooibos Pulsar. Ce mélange captivant associe des touches vibrantes d\'écorces d\'orange et de cardamome. Les feuilles de rooibos créent une expérience de dégustation dynamique et épicée, évoquant la force et le mystère des étoiles à neutrons dans l\'univers.', 'Touches d\'écorces d\'orange et de cardamone', '110', 0, '', '../images/produits/MzNa37T1XrBz8RsTC9WS.png', '95°C', '7 min', 1, 0),
(34, 'Solstice', 'rooibos', 'Notes de baies de goji et de citronnelle', 'Célébrez le solstice avec notre rooibos Solstice. Ce mélange harmonieux révèle des notes vibrantes de baies de goji et de citronnelle. Les feuilles de rooibos offrent une expérience de dégustation fruitée et rafraîchissante, rappelant les couleurs et les saveurs éclatantes de cette période spéciale de l\'année.', 'Notes de baies de goji et de citronnelle', '100', 0, '', '../images/produits/zAPLHJUj9l6KEl04YAIR.png', '75°C', '5 min', 1, 0),
(35, 'Encelade', 'infusions', 'Notes de camomille et de menthe', 'Découvrez la quiétude glacée d\'Encelade avec notre infusion. Ce mélange apaisant marie des notes douces de camomille et de menthe fraîche. Les feuilles d\'infusion créent une expérience délicate et apaisante, évoquant la beauté mystérieuse de la lune gelée d\'Encelade dans le système solaire.', 'Notes de camomille et de menthe', '80', 0, '', '../images/produits/n12FHnAIhVqPPJImRGgP.png', '85°C', '6 min', 1, 0),
(36, 'Ganymède', 'infusions', 'Touches de sauge et de romarin', 'Explorez la majesté de Ganymède avec notre infusion. Ce mélange harmonieux révèle des touches subtiles de sauge et de romarin. Les feuilles d\'infusion offrent une expérience de dégustation équilibrée et revigorante, évoquant la robustesse et la beauté du plus grand satellite naturel de Jupiter.', 'Touches de sauge et de romarin', '90', 0, '', '../images/produits/ueSLW7VIVStmSGiujN0p.png', '95°C', '4 min', 1, 0),
(37, 'Dione', 'infusions', 'Arômes d\'échinacée et de réglisse', 'Explorez la tranquillité de Dione avec notre infusion. Ce mélange unique révèle des arômes apaisants d\'échinacée et de réglisse. Les feuilles d\'infusion créent une expérience de dégustation douce et réconfortante, évoquant la sérénité et la beauté de ce satellite de Saturne.', 'Arômes d\'échinacée et de réglisse', '100', 0, '', '../images/produits/fKudGQGODDWtOeEW7vTO.png', '90°C', '4 min', 1, 0),
(38, 'Mercure', 'infusions', 'Touches de menthe et de fenouil', 'Explorez la vivacité de Mercure avec notre infusion. Ce mélange rafraîchissant révèle des touches vives de menthe et de fenouil. Les feuilles d\'infusion offrent une expérience de dégustation dynamique et revitalisante, évoquant la rapidité et l\'agilité de la planète la plus proche du Soleil.', 'Touches de menthe et de fenouil', '45', 0, '', '../images/produits/mxHAuYW2Bb1A469KzlSq.png', '80°C', '3 min', 1, 0),
(39, 'Sedna', 'infusions', 'Notes de mélisse et d\'orties', 'Plongez dans la tranquillité lointaine de Sedna avec notre infusion. Ce mélange apaisant révèle des notes douces de mélisse et d\'orties. Les feuilles d\'infusion offrent une expérience de dégustation douce et équilibrée, évoquant la quiétude et la beauté mystérieuse de cet objet transneptunien.', 'Notes de mélisse et d\'orties', '90', 0, '', '../images/produits/y7bGQQpCfKUYNT5EwZ2A.png', '75°C', '7 min', 1, 0),
(40, 'Étoile Filante', 'coffrets', ' ', 'Ce coffret découverte Étoile Filante vous invite à explorer une sélection de thés et infusions inspirés par l\'univers. Chaque variété offre une expérience unique, capturant les saveurs et les sensations des étoiles et des planètes.\r\n\r\nThé Vert Aurora Boréalis - Notes de yuzu et de fleurs de cerisier.\r\n\r\nRooibos Tempête Solaire - Touches de gingembre et de canelle.\r\n\r\nInfusion Ganymède - Touches de sauge et de romarin.\r\n\r\nThé Oolong Mars - Notes de vanille et d\'orange sanguine.\r\n\r\nInfusion Sedna - Notes de mélisse et d\'orties.\r\n\r\nChaque infusion est présentée dans un emballage distinct, prête à être savourée et à vous transporter à travers les merveilles de l\'espace.', 'Coffret découverte', '45', 0, '', '../images/produits/MYz1HmajM19atQ1YW9tR.jpg', ' ', ' ', 1, 0),
(41, 'Prestige étoilé', 'coffrets', 'Coffret haut de gamme', 'Plongez dans une expérience sensorielle exceptionnelle avec notre coffret Prestige Étoilé. Ce coffret haut de gamme est une véritable invitation à explorer les délices des thés et infusions inspirés par l\'univers. Chaque boîte est méticuleusement assemblée pour offrir une sélection exquise qui ravira les amateurs de thé.\r\n\r\nContenu du coffret :\r\n\r\nThé Noir Galaxie - Notes de jasmin et pêche blanche.\r\n\r\nRooibos Crépuscule - Arômes d\'hibiscus et de baies de sureau.\r\n\r\nThé Oolong Proxima Centauri - Arômes de pêche et d\'abricot.\r\n\r\nInfusion Encelade - Notes de camomille et de menthe.\r\n\r\nThé Vert Aurora Boréalis - Touches de yuzu et de fleurs de cerisier.\r\n\r\nChaque variété est choisie pour sa qualité exceptionnelle et son potentiel à offrir une expérience gustative unique. Le coffret Prestige Étoilé est un cadeau parfait pour ceux qui apprécient le raffinement et l\'aventure dans une tasse de thé.', 'Coffret haut de gamme', '75', 0, '', '../images/produits/zT7a6L2Z0j5MsJMoZt8z.jpg', ' ', ' ', 1, 0),
(42, 'Coffret Constellations', 'coffrets', 'Coffret cadeau', 'Découvrez nos meilleures ventes avec le coffret Constellations. Ce coffret cadeau est soigneusement sélectionné pour offrir une expérience gustative exceptionnelle à travers une seule variété de thé populaire inspiré par les constellations.\r\n\r\nContenu du coffret :\r\n\r\nThé Noir Galaxie - Notes de jasmin et pêche blanche.\r\nChaque boîte contient une quantité généreuse de notre thé Noir Galaxie, réputé pour ses arômes délicats et sa qualité supérieure. Offrez ou découvrez cette option raffinée et appréciée des amateurs de thé.', 'Coffret cadeau', '30', 30, '', '../images/produits/RzGlxy1VOO0MJt3csJcB.jpg', ' ', ' ', 1, 0),
(43, 'Nuit Astrale', 'accessoires', 'Notre meilleure vente', 'Plongez dans l\'élégance et la magie de l\'univers avec notre set Nuit Astrale en porcelaine. Ce set exquis comprend une sélection raffinée de thés inspirés par les étoiles et les constellations, accompagnée de pièces de porcelaine artistiquement conçues pour enrichir votre expérience de dégustation.', 'Notre meilleure vente', '120', 120, '', '../images/produits/hpZFh0JoKpMVYLhIU2II.jpg', ' ', ' ', 1, 0),
(44, 'Ensemble Étoilé', 'accessoires', 'Le cadeau idéal', 'Plongez dans l\'élégance avec notre ensemble Étoilé en Porcelaine Rose. Ce set exquis est conçu pour enrichir votre rituel du thé avec une touche de sophistication et de douceur. Chaque pièce de porcelaine est soigneusement sélectionnée pour sa qualité et son esthétique, créant une expérience de dégustation raffinée et mémorable. Chaque tasse et chaque pièce complémentaire, du plateau au pot à thé, sont teintés d\'un rose délicat pour ajouter une touche de beauté à votre moment thé.', 'Le cadeau idéal', '50', 50, '', '../images/produits/NFgJCo5pB3XpvuJLUdRz.jpg', ' ', ' ', 1, 0),
(45, 'Vert de lune', 'accessoires', 'Pour un tea time en duo', 'Découvrez l\'harmonie et la détente avec notre ensemble Vert de lune pour Deux. Conçu spécialement pour les couples, cet ensemble exquis en couleur vert offre une expérience de thé apaisante et raffinée, parfaitement adaptée pour partager des moments précieux ensemble.', 'Pour un tea time en duo', '65', 65, ' ', '../images/produits/AfHvXIpMRFTZBEvb7JG6.jpg', ' ', ' ', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_registration` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rights` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `adresse`, `zipcode`, `ville`, `gender`, `date_of_birth`, `date_of_registration`, `email`, `password`, `rights`) VALUES
(4, 'super', 'user', '', 0, '', '', NULL, NULL, 'superuser@infinitea.com', '$2y$10$k2QgjJHq5lkBc74k8esgUuprTQVz11F9vwIWmqqcCytc0Gi09zQ96', 'full'),
(5, 'Mathilde', 'Jourden', '', 0, '', '', NULL, NULL, 'mathilde@infinitea.com', '$2y$10$ft6XjbvMZfi2c2LDbzOPD.Lgqs7stmm5j.u5LqWYFPriQYk3OFIq2', 'self'),
(6, 'Roberto', 'De Sousa', '', 0, '', '', NULL, NULL, 'roberto@infinitea.com', '$2y$10$riE4fdj3x0RNji6WfvLTNe/dD3/QF9OllkGCACcdjHbdtmMeTYsyu', 'self');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
