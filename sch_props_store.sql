-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2013 at 08:06 AM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barcampb_bcbcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `sch_props_store`
--

CREATE TABLE IF NOT EXISTS `sch_props_store` (
  `option_key` varchar(500) NOT NULL,
  `option_val` varchar(1000) NOT NULL,
  UNIQUE KEY `unique_key` (`option_key`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_props_store`
--

INSERT INTO `sch_props_store` (`option_key`, `option_val`) VALUES
('ANDROID_JSON_VERSION', '17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
