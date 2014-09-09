-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2014. szept. 08. 22:36
-- Szerver verzió: 5.5.27
-- PHP verzió: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `cv`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_message` (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Tábla szerkezet: `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id_quote` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quote` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `author_img` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_quote`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
