-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 05, 2019 at 09:27 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PI_aspcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'root', '$2y$10$HEqzM3fSle47ViauC.l1iOs62RxFixXK1PYiUaKo/gcAgRQNy4cAm');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(11) NOT NULL,
  `blue_player` int(11) NOT NULL,
  `red_player` int(11) NOT NULL,
  `hour` time NOT NULL,
  `court` smallint(50) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `score` json NOT NULL,
  `cam` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `blue_player`, `red_player`, `hour`, `court`, `state`, `score`, `cam`, `chat`) VALUES
(1, 1, 2, '17:00:00', 2, 0, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}', '', ''),
(2, 3, 4, '16:30:00', 3, 1, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}', '', ''),
(3, 5, 6, '17:30:00', 1, 0, '{\"round1\": {\"red\": 1, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 6}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}', '', ''),
(4, 1, 4, '18:00:00', 4, 1, '{\"round1\": {\"red\": 0, \"blue\": 0}, \"round2\": {\"red\": 0, \"blue\": 0}, \"round3\": {\"red\": 0, \"blue\": 0}, \"round4\": {\"red\": 0, \"blue\": 0}, \"round5\": {\"red\": 0, \"blue\": 0}}', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(20) NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat` tinyint(50) NOT NULL,
  `rank` smallint(6) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `club` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `surname`, `name`, `cat`, `rank`, `picture`, `club`) VALUES
(1, 'MARTI', 'Hugo', 42, 69, 'hugo.jpg', 'ASPCN'),
(2, 'NICOLAS', 'Luc', 2, 123, 'luc.jpg', 'ASPCN'),
(3, 'FRANCHET', 'Matthieu', 69, 250, 'matthieu.jpg', 'PPN'),
(4, 'MONGEOT', 'Clément', 20, 666, 'clement.jpg', 'CPC'),
(5, 'LIMOUSIN', 'Jeremy', 5, 33, 'jeremy.jpg', 'Linux Pong Club'),
(6, 'RICHIER', 'Eddie', 1, -2, 'eddie.jpg', 'PongESportClub');

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE `referee` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `referee`
--
ALTER TABLE `referee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `referee`
--
ALTER TABLE `referee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`blue_player`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`red_player`) REFERENCES `players` (`id`);