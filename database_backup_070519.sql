-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 07:10 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
