-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 10:58 PM
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
(1, 8, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(2, 5, ''),
(3, 6, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(4, 7, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(5, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(6, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(7, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(8, 17, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(9, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(10, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(11, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(12, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(13, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(14, 16, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(15, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ'),
(16, NULL, 'https://www.youtube.com/embed/hHW1oY26kxQ');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `blue_player`, `red_player`, `hour`, `state`, `score`) VALUES
(4, 1, 2, '09:00:00', 2, '{\"round1\": {\"red\": 0, \"blue\": 12, \"state\": 2}, \"round2\": {\"red\": 7, \"blue\": 12, \"state\": 2}, \"round3\": {\"red\": 5, \"blue\": 12, \"state\": 2}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(5, 3, 6, '09:00:00', 1, '{\"round1\": {\"red\": 9, \"blue\": 12, \"state\": 2}, \"round2\": {\"red\": 12, \"blue\": 4, \"state\": 2}, \"round3\": {\"red\": 0, \"blue\": 4, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(6, 4, 5, '10:00:00', 1, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(7, 7, 8, '11:00:00', 1, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(8, 1, 8, '12:00:00', 1, '{\"round1\": {\"red\": 4, \"blue\": 2, \"state\": 2}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(9, 2, 7, '13:00:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(12, 4, 6, '14:00:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(14, 5, 3, '15:00:00', 0, '{\"round1\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(16, 10, 9, '09:30:00', 1, '{\"round1\": {\"red\": 5, \"blue\": 5, \"state\": 2}, \"round2\": {\"red\": 3, \"blue\": 4, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}'),
(17, 11, 1, '10:30:00', 1, '{\"round1\": {\"red\": -3, \"blue\": 9, \"state\": 0}, \"round2\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round3\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round4\": {\"red\": 0, \"blue\": 0, \"state\": 0}, \"round5\": {\"red\": 0, \"blue\": 0, \"state\": 0}}');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` tinyint(50) NOT NULL,
  `club` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rank` smallint(6) NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `surname`, `name`, `cat`, `club`, `rank`, `picture`) VALUES
(1, 'NICOLAS', 'Luc', 1, 'ASPCN', 12, 'luc.jpg'),
(2, 'MARTI', 'Hugo', 2, 'ASPCN', 5, 'hugo.jpg'),
(3, 'RICHIER', 'Eddy', 2, 'ASPCN', 8, NULL),
(4, 'DOUILLET', 'Frédéric', 3, 'AGFN', 13, NULL),
(5, 'VALEDYRON', 'Julien', 3, 'ChichaClub', 22, NULL),
(6, 'JAR', 'Alexis', 2, 'AGFN', 20, NULL),
(7, 'LIMOUSIN', 'Jérémy', 10, 'AuditPro', 15, NULL),
(8, 'FRANCHET', 'Matthieu', 10, 'AuditPro', 1, 'matthieu.jpg'),
(9, 'BAKHOUCHE', 'Sofiane', 1, 'La Caravane du Pongiste', 47, NULL),
(10, 'MONGEOT', 'Clément', 2, 'Absent', 6, 'clement.jpg'),
(11, 'CAMBET PETIT-JEAN', 'Carole', 1, 'St Dio Ping', 52, NULL),
(12, 'TALAVERA', 'Jean-Michel', 6, 'IN\'TECH Ping', 75, NULL);

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
(1, 'root', '$2y$10$D2Oajot8QdRoTy7Qcyklf.VW2tp8kDGP79jQL7rimi11Y8SoUVVL2', 'admin'),
(2, 'referee', '$2y$10$evuSPXIWvlIoZjgslT8Fnef9JeWp0QUOUe8Sz6Wgfx1ZwPdSBsyQm', 'referee');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
