-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2016 at 03:10 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackaton`
--

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `nom`, `prenom`, `age`) VALUES
(1, 'Paola', 'paola', 'paola.mauceri7@gmail.com', 'paola.mauceri7@gmail.com', 1, 'gfcu7li981s0swkg40w04w4wk8c4w4g', '$2y$13$gfcu7li981s0swkg40w04u0J6xFMrEQIbbSGfXQxndwunsYkAFGLy', '2016-05-13 02:31:52', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Mauceri', 'Paola', 28),
(2, 'Timou', 'timou', 'timou@gmail.com', 'timou@gmail.com', 1, 'fpv27m2886os8wokos848gsgwco08c8', '$2y$13$fpv27m2886os8wokos848eKPlDnn9YhiBBOJac5mjMwc/30iVN7Ni', '2016-05-13 02:34:02', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Vellarde', 'Timothee', 18),
(3, 'Charlix', 'charlix', 'tim@gmail.com', 'tim@gmail.com', 1, 'ix0ccravty8koscowwg8ooggg0soc44', '$2y$13$ix0ccravty8koscowwg8oe/1xLprF5S/FLjeEX0sd4HzSwm2r3ggq', '2016-05-13 02:35:52', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Dussault', 'Charlie', 26);

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `distance_total` int(11) NOT NULL,
  `badges` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EDBFD5EC6E38C0DB` (`parcours_id`),
  KEY `IDX_EDBFD5EC68D3EA09` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `duree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `distance` int(11) NOT NULL,
  `type_locomotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parcours`
--

INSERT INTO `parcours` (`id`, `nom`, `niveau`, `duree`, `distance`, `type_locomotion`, `lieu`) VALUES
(1, 'Trek Rando', 10, '1h00', 50, 'marche à pied', 'La Ciotat');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `FK_EDBFD5EC68D3EA09` FOREIGN KEY (`User_id`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_EDBFD5EC6E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
