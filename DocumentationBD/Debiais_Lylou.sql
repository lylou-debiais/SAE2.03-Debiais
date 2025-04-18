-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 avr. 2025 à 07:06
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `debiais7`
--

-- --------------------------------------------------------

--
-- Structure de la table `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comédie'),
(3, 'Drame'),
(4, 'Science-fiction'),
(5, 'Animation'),
(6, 'Thriller'),
(7, 'Horreur'),
(8, 'Aventure'),
(9, 'Fantaisie'),
(10, 'Documentaire');

-- --------------------------------------------------------

--
-- Structure de la table `Favoris`
--

CREATE TABLE `Favoris` (
  `id_movie` int(11) NOT NULL,
  `id_profils` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Favoris`
--

INSERT INTO `Favoris` (`id_movie`, `id_profils`) VALUES
(7, 13),
(7, 18),
(12, 12),
(12, 18),
(17, 12),
(53, 19),
(57, 19),
(58, 12),
(59, 13),
(61, 19);

-- --------------------------------------------------------

--
-- Structure de la table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `mise_en_avant` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `Movie`
--

INSERT INTO `Movie` (`id`, `name`, `year`, `length`, `description`, `director`, `id_category`, `image`, `trailer`, `min_age`, `mise_en_avant`) VALUES
(7, 'Interstellar', 2014, 169, 'Un groupe d\'explorateurs voyage à travers un trou de ver pour sauver l\'humanité.', 'Christopher Nolan', 4, 'interstellar.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU?si=76Ke4uw4LYjuLuQ6', 12, 1),
(12, 'La Liste de Schindler', 1993, 195, 'Un industriel allemand sauve des milliers de Juifs pendant l\'Holocauste.', 'Steven Spielberg', 3, 'schindler.webp', 'https://www.youtube.com/embed/ONWtyxzl-GE?si=xC3ASGGPy5Ib-aPn', 16, 1),
(17, 'Your Name', 2016, 107, 'Deux adolescents échangent leurs corps de manière mystérieuse.', 'Makoto Shinkai', 5, 'your_name.jpg', 'https://www.youtube.com/embed/AROOK45LXXg?si=aUQyGk2VMCb_ToUL', 10, 1),
(27, 'Le Bon, la Brute et le Truand', 1966, 161, 'Trois hommes se lancent à la recherche d\'un trésor caché.', 'Sergio Leone', 8, 'bon_brute_truand.jpg', 'https://www.youtube.com/embed/WA1hCZFOPqs?si=TwNZAoM4oj4KpGja', 12, 0),
(50, 'Captain America: Brave New World', 2025, 118, 'Peu après avoir fait la connaissance du nouveau président des Etats-Unis Thaddeus Ross, Sam Wilson se retrouve plongé au coeur d\'un gigantesque incident international. Dans une lutte acharnée contre la montre, il se retrouve contraint de découvrir la raison de cet infâme complot avant que le véritable cerveau de l’opération ne mette bientôt le monde entier à feu et à sang…', 'Julius Onah', 1, 'captaine.webp', 'https://www.youtube.com/embed/1pHDWnXmK7Y?si=ss53TXf5BxtKFRHQ', 12, 0),
(52, 'Vaiana, la légende du bout du monde', 2016, 107, 'Il y a 3 000 ans, les plus grands marins du monde voyagèrent dans le vaste océan Pacifique, à la découverte des innombrables îles de l\'Océanie. Mais pendant le millénaire qui suivit, ils cessèrent de voyager. Et personne ne sait pourquoi...\r\n\r\nVaiana, la légende du bout du monde raconte l\'aventure d\'une jeune fille téméraire qui se lance dans un voyage audacieux pour accomplir la quête inachevée de ses ancêtres et sauver son peuple. Au cours de sa traversée du vaste océan, Vaiana va rencontrer Maui, un demi-dieu. Ensemble, ils vont accomplir un voyage épique riche d\'action, de rencontres et d\'épreuves... En accomplissant la quête inaboutie de ses ancêtres, Vaiana va découvrir la seule chose qu\'elle a toujours cherchée : elle-même.', 'John Musker et Ron Clements', 5, 'vaiana.jpg', 'https://www.youtube.com/embed/JIl74jge_Wg?si=eJjU8nzA_cP48Y_U', 1, 0),
(53, 'La Septième Compagnie', 1973, 95, 'Pendant la débâcle française de 1940, la 7ème compagnie se réfugie dans les bois. Mais, elle est prise en embuscade par l\'armée allemande. Seuls trois hommes partis en éclaireur en réchappent. Ils se retrouvent livrés à eux-mêmes dans une France occupée.\r\n\r\n', ' Robert Lamoureux', 2, 'laseptieme.jpg', 'https://www.youtube.com/embed/3Ob1XwvGC1A?si=lGIr0OYDS-9oz-mK', 1, 0),
(57, 'Rio', 2011, 90, 'Blu, un perroquet bleu d’une espèce très rare, quitte sa petite ville sous la neige et le confort de sa cage pour s’aventurer au cœur des merveilles exotiques de Rio de Janeiro. Sachant qu’il n’a jamais appris à voler, l’aventure grandiose qui l’attend au Brésil va lui faire perdre quelques plumes ! Heureusement, ses nouveaux amis hauts en couleurs sont prêts à tout pour réveiller le héros qui est en lui, et lui faire découvrir tout le sens de l’expression « prendre son envol ».', 'Carlos Saldanha', 5, 'rio.webp', 'https://www.youtube.com/embed/51o_vzq-nwc?si=4F5hI9FhgLvEmigz\" title=\"YouTube video player', 1, 1),
(58, 'Resistance', 1976, 90, 'A travers l\'examen du role joue par la Resistance francaise pendant la Seconde Guerre mondiale et celle de l\'individu face a l\'exposition de son propre inconscient, \"Resistance\" interroge le concept de resistance dans le sens politique et historique.', 'Ken McMullen', 10, 'resistance.jpg', 'https://www.youtube.com/embed/B48hwisZvEI?si=jLyTNQI_v7GA64nK', 12, 1),
(59, 'Loups-Garous', 2024, 94, 'Après avoir découvert un mystérieux jeu de cartes, une famille se retrouve dans un village au Moyen Âge et doit chaque nuit affronter de dangereux loups-garous.\r\n\r\n', 'François Uzan', 9, 'loups-garous.jpg', 'https://www.youtube.com/embed/b34IHa3z-RA?si=I2YUYlmYyeSVutUg', 12, 1),
(60, 'Ca', 2017, 135, 'À Derry, dans le Maine, sept gamins ayant du mal à s\'intégrer se sont regroupés au sein du \"Club des Ratés\". Rejetés par leurs camarades, ils sont les cibles favorites des gros durs de l\'école. Ils ont aussi en commun d\'avoir éprouvé leur plus grande terreur face à un terrible prédateur métamorphe qu\'ils appellent \"Ça\"…\r\n\r\nCar depuis toujours, Derry est en proie à une créature qui émerge des égouts tous les 27 ans pour se nourrir des terreurs de ses victimes de choix : les enfants. Bien décidés à rester soudés, les Ratés tentent de surmonter leurs peurs pour enrayer un nouveau cycle meurtrier. Un cycle qui a commencé un jour de pluie lorsqu\'un petit garçon poursuivant son bateau en papier s\'est retrouvé face-à-face avec le Clown Grippe-Sou …', 'Cary Joji Fukunaga et Chase Palmer', 7, 'ca.webp', 'https://www.youtube.com/embed/0zkm6IPr3Jw?si=tDb8UBEBRSQp2JZM', 12, 1),
(61, 'Selon la police', 2022, 111, 'Un matin, un flic de terrain usé jusqu’à la corde, que tous dans son commissariat appellent Ping-Pong, brûle sa carte de police et disparaît sans prévenir. Durant un jour et une nuit, ses collègues le cherchent, le croisent et le perdent dans Toulouse et sa banlieue. Mais chaque heure qui passe rapproche un peu plus Ping-Pong de son destin.', 'Frédéric Videau ', 6, 'selonlapolice.webp', 'https://www.youtube.com/embed/e7FvPUdHIZU?si=rgHl-umjlGgWP3fJ', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Profile`
--

CREATE TABLE `Profile` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `avatar` varchar(150) DEFAULT NULL,
  `age` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Profile`
--

INSERT INTO `Profile` (`id`, `nom`, `avatar`, `age`) VALUES
(12, 'Meignant', '', 12),
(13, 'Guichon', '', 16),
(18, 'Pinard', '', 18),
(19, 'Debiais', '', 1),
(27, 'Bounissou', '', 18);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Favoris`
--
ALTER TABLE `Favoris`
  ADD PRIMARY KEY (`id_movie`,`id_profils`),
  ADD KEY `id_profils` (`id_profils`);

--
-- Index pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `Profile`
--
ALTER TABLE `Profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `Profile`
--
ALTER TABLE `Profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Favoris`
--
ALTER TABLE `Favoris`
  ADD CONSTRAINT `Favoris_ibfk_1` FOREIGN KEY (`id_movie`) REFERENCES `Movie` (`id`),
  ADD CONSTRAINT `Favoris_ibfk_2` FOREIGN KEY (`id_profils`) REFERENCES `Profile` (`id`);

--
-- Contraintes pour la table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
