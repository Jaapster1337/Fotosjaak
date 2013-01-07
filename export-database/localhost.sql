-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 11 dec 2012 om 13:56
-- Serverversie: 5.5.16
-- PHP-Versie: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `websitefotosjaak`
--
CREATE DATABASE `websitefotosjaak` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `websitefotosjaak`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userrole` enum('root','sjaak','customer','developer') NOT NULL,
  `activated` enum('yes','no') NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Gegevens worden uitgevoerd voor tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `userrole`, `activated`, `datetime`) VALUES
(171, 'adruijter@gmail.com', 'geheim', 'customer', 'yes', '2012-12-06 06:32:18');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `order_short` varchar(250) NOT NULL,
  `order_long` text NOT NULL,
  `deliverydate` date NOT NULL,
  `eventdate` date NOT NULL,
  `color_pictures` enum('color','black-white') NOT NULL,
  `number_of_pictures` smallint(6) NOT NULL,
  `orderdate` datetime NOT NULL,
  `confirmed` enum('yes','no') NOT NULL DEFAULT 'no',
  `charge` decimal(7,2) NOT NULL,
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_short`, `order_long`, `deliverydate`, `eventdate`, `color_pictures`, `number_of_pictures`, `orderdate`, `confirmed`, `charge`, `paid`) VALUES
(3, 171, 'Leeuwen in Kenia', 'Het uitschakelen van een olifant in de savanne.', '2012-12-25', '2012-12-25', 'black-white', 800, '2012-12-11 14:31:00', 'no', '3400.00', 'no'),
(4, 171, 'sdfksj', 'lsdkj', '2012-12-12', '2012-12-18', 'black-white', 950, '2012-12-11 14:31:00', 'no', '3400.00', 'no');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `infix` varchar(10) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `addressnumber` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `country` varchar(200) NOT NULL,
  `telephonenumber` varchar(13) NOT NULL,
  `mobilenumber` varchar(13) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `infix`, `surname`, `address`, `addressnumber`, `city`, `zipcode`, `country`, `telephonenumber`, `mobilenumber`) VALUES
(171, 'Arjan', 'de', 'Ruijter', 'Prins Hendrikstraat', '17', 'Castricum', '1901CB', 'Nederland', '0616161616161', '0616161616161');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;