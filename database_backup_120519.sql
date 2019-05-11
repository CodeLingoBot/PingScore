-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 12 mai 2019 à 00:05
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lucnicol_aspcn`
--

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `challenge`
--

INSERT INTO `challenge` (`id`, `name`, `poster`, `description`) VALUES
(1, 'Championnat de France Elite de Tennis de table Handisport', 'Affiche.png', 'Une compétition organisée par l\'ASPC Nîmes');

-- --------------------------------------------------------

--
-- Structure de la table `courts`
--

CREATE TABLE `courts` (
  `id` int(11) NOT NULL,
  `match_id` int(11) DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `courts`
--

INSERT INTO `courts` (`id`, `match_id`, `video`) VALUES
(1, NULL, ''),
(2, NULL, ''),
(3, NULL, ''),
(4, NULL, ''),
(5, NULL, ''),
(6, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(11) NOT NULL,
  `blue_player` int(11) NOT NULL,
  `red_player` int(11) NOT NULL,
  `hour` time NOT NULL,
  `state` tinyint(4) NOT NULL,
  `score` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `club` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` smallint(6) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`id`, `surname`, `name`, `cat`, `club`, `rank`, `picture`) VALUES
(1, 'NICOLAS', 'Luc', '1', 'PingScore', 1, NULL),
(2, 'MARTI', 'Hugo', '1', 'PingScore', 2, NULL),
(3, 'FRANCHET', 'Matthieu', '1', 'AuditPro', 3, NULL),
(4, 'MONGEOT', '', '1', 'PortalSport', 451, NULL),
(5, 'DOUILLET', '', '1', 'PortalSport', 32767, NULL),
(6, 'VALDEYRON', 'Julien', '1', 'AuditPro', 652, NULL),
(7, 'JAR', 'Alexis', '1', 'PortalSport', 15, NULL),
(8, 'RICHIER', 'Eddie', '1', 'PingScore', 36, NULL),
(9, 'LIMOUSIN', '', '1', 'AuditPro', 74, NULL),
(10, 'CAMBET PETIT-JEAN', 'Carole', '1', 'In\'tech', 62, NULL),
(11, 'BAKHOUCHE', 'Sofiane', '1', 'In\'tech', 5132, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'root', '$2y$10$D2Oajot8QdRoTy7Qcyklf.VW2tp8kDGP79jQL7rimi11Y8SoUVVL2', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RED_PLAYER` (`red_player`),
  ADD KEY `BLUE_PLAYER` (`blue_player`,`red_player`) USING BTREE;

--
-- Index pour la table `players`
--
ALTER TABLE `players`
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
-- AUTO_INCREMENT pour la table `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`blue_player`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`red_player`) REFERENCES `players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
