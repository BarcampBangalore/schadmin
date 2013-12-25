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
-- Table structure for table `sch_generated_schedule`
--

CREATE TABLE IF NOT EXISTS `sch_generated_schedule` (
  `timeslot` int(11) NOT NULL,
  `track` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_generated_schedule`
--

INSERT INTO `sch_generated_schedule` (`timeslot`, `track`, `session`) VALUES
(0, 0, 2204),
(0, 1, 2318),
(0, 2, 2143),
(0, 3, 2513),
(0, 4, 2424),
(0, 5, 2389),
(1, 0, 2139),
(1, 1, 2404),
(1, 2, 2132),
(1, 3, 2398),
(1, 4, 2284),
(1, 5, 2236),
(2, 0, 2155),
(2, 1, 2200),
(2, 2, 2496),
(2, 3, 2263),
(2, 4, 2480),
(2, 5, 2504),
(3, 0, 2232),
(3, 1, 2292),
(3, 2, 2147),
(3, 3, 2518),
(3, 4, 2430),
(3, 5, 2408),
(4, 0, 2245),
(4, 1, 2159),
(4, 2, 2314),
(4, 3, 2228),
(4, 4, 2338),
(4, 5, 2615),
(5, 0, 2185),
(5, 1, 2076),
(5, 2, 2300),
(5, 3, 2509),
(5, 4, 2453),
(5, 5, 2486);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
