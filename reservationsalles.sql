-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2021 at 05:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationsalles`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'glissade en bouclier', 'glissade en bouclier', '2021-01-22 08:00:00', '2021-01-22 09:00:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(12, 'jeanfifou', '$2y$10$5RohcsauPVe.660wTPzdP.wcmRVNiQrkddrUTnw9Zme.YHu8TfLIi'),
(11, 'jeanjean', '$2y$10$D7iWA.Sg6g.tCgTh5Erpk.B0gG01SlBhp8PlPZGumuOS/fAhFprt2'),
(13, 'jeanmich', '$2y$10$KkyKwvL09kCbzAOClmlP7uVUXCpBTLV3904U7MX5EiwOYHlmywBa2'),
(14, 'jeanphi', '$2y$10$8TtbpKOAPhpj0ZQWncoFH.zRUCeIqz/V6N3rBoGJf6F7kdiw/jaci'),
(15, 'jeanjaures', '$2y$10$EnWV8231m1gYWn5Gn7Nhk.aESqChbg4ToVfCMCcY0DYv5iMqEmTwi'),
(16, 'jeanjean2', '$2y$10$lEwzFt.rgRsmObq.28QWxOQlEMAngrimmAnr/aeU2.ySCcd.G5UYO'),
(17, 'JeanRuben', '$2y$10$R2dxq9gyqZZojhnQ3qv8aOgLIToA3Z.ijXt4YDGyjGM2LQAcMyC3.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
