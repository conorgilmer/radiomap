
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2015 at 07:26 PM
-- Server version: 5.1.71
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `signal` varchar(40) COLLATE utf8_unicode_ci DEFAULT 'Clear',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `signal`) VALUES
(1, 'RTE 252 Transmitter', 'Clarkstown, Co. Meath', 53.462650, -6.677589, 'tx', '500kv Capacity '),
(5, 'Cushendall', 'Co. Antrim', 55.082886, -6.058960, 'rx', 'Clear'),
(20, 'Joe', 'Scotland, UK', 56.000000, -4.000000, 'rx', 'Good');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
