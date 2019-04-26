-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 02:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lucnicol_aspcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `id` int(11) NOT NULL,
  `match_id` int(11) DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `match_id`, `video`) VALUES
(1, 2, ''),
(2, 4, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(3, NULL, ''),
(4, NULL, ''),
(5, NULL, ''),
(6, NULL, ''),
(7, 3, ''),
(8, NULL, ''),
(9, NULL, ''),
(10, NULL, ''),
(11, NULL, ''),
(12, NULL, ''),
(13, NULL, ''),
(14, NULL, ''),
(15, NULL, ''),
(16, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(11) NOT NULL,
  `blue_player` int(11) NOT NULL,
  `red_player` int(11) NOT NULL,
  `hour` time NOT NULL,
  `state` tinyint(4) NOT NULL,
  `score` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `blue_player`, `red_player`, `hour`, `state`, `score`) VALUES
(2, 2, 5, '14:00:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 1}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(3, 3, 1, '12:00:00', 1, '{\"round1\": {\"red\": 7, \"blue\": 0, \"state\": 1}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(4, 2, 6, '15:20:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 1}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(5, 5, 3, '11:00:00', 2, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 1}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(6, 3, 2, '13:12:00', 1, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 1}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(7, 1, 6, '16:00:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat` tinyint(50) NOT NULL,
  `club` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rank` smallint(6) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `surname`, `name`, `cat`, `club`, `rank`, `picture`) VALUES
(0, '---', '', 0, '---', 0, 'vide.png'),
(1, 'MARTI', 'Hugo', 3, 'ASPCN', 69, 'hugo.jpg'),
(2, 'NICOLAS', 'Luc', 1, 'ASPCN', 123, 'luc.jpg'),
(3, 'FRANCHET', 'Matthieu', 3, 'PPN', 250, 'matthieu.jpg'),
(4, 'MONGEOT', 'Clement', 3, 'CPC', 666, 'clement.jpg'),
(5, 'LIMOUSIN', 'Jeremy', 5, 'Linux Pong Club', 33, 'jeremy.jpg'),
(6, 'DOUILLET', 'Frédéric', 3, 'Ouiheberg TT', 49, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'root', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'admin'),
(2, 'referee2', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'referee'),
(4, 'referee1', '$2y$10$fYHppxCShB.2oMSeRIBb9.M869JdDxsmgyz/5dEa2LhO9S5HSiUuy', 'referee'),
(5, 'referee3', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'referee'),
(6, 'admin', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'admin'),
(7, 'referee4', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'referee'),
(8, 'referee5', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm', 'referee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `BLUE_PLAYER` (`blue_player`,`red_player`),
  ADD KEY `RED_PLAYER` (`red_player`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`blue_player`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`red_player`) REFERENCES `players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
