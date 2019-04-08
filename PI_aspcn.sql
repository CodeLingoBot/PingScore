-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 avr. 2019 à 12:36
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pi_aspcn`
--

-- --------------------------------------------------------

--
-- Structure de la table `court`
--

DROP TABLE IF EXISTS `court`;
CREATE TABLE IF NOT EXISTS `court` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `court`
--

INSERT INTO `court` (`id`, `match_id`, `video`, `chat`) VALUES
(1, 6, '', 0),
(2, 4, 'https://www.youtube.com/embed/hHW1oY26kxQ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
CREATE TABLE IF NOT EXISTS `matchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blue_player` int(11) NOT NULL,
  `red_player` int(11) NOT NULL,
  `hour` time NOT NULL,
  `court` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `score` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `BLUE_PLAYER` (`blue_player`,`red_player`),
  UNIQUE KEY `court` (`court`),
  KEY `RED_PLAYER` (`red_player`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id`, `blue_player`, `red_player`, `hour`, `court`, `state`, `score`) VALUES
(1, 1, 2, '17:00:00', 2, 0, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}'),
(2, 3, 4, '16:30:00', 3, 1, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}'),
(4, 1, 4, '18:00:00', 4, 1, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}'),
(5, 3, 5, '15:00:00', 5, 1, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}'),
(6, 2, 4, '15:00:00', 0, 2, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}'),
(7, 3, 1, '15:30:00', 6, 2, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}');

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat` tinyint(50) NOT NULL,
  `club` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rank` smallint(6) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`id`, `surname`, `name`, `cat`, `club`, `rank`, `picture`) VALUES
(0, '---', '', 0, '---', 0, 'vide.png'),
(1, 'MARTI', 'Hugo', 42, 'ASPCN', 69, 'hugo.jpg'),
(2, 'NICOLAS', 'Luc', 2, 'ASPCN', 123, 'luc.jpg'),
(3, 'FRANCHET', 'Matthieu', 3, 'PPN', 250, 'matthieu.jpg'),
(4, 'MONGEOT', 'Clement', 20, 'CPC', 666, 'clement.jpg'),
(5, 'LIMOUSIN', 'Jeremy', 5, 'Linux Pong Club', 33, 'jeremy.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'root', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'admin');

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
