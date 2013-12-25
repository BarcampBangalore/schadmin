-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2013 at 08:07 AM
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
-- Table structure for table `sch_selected_sessions`
--

CREATE TABLE IF NOT EXISTS `sch_selected_sessions` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `author` varchar(40) NOT NULL,
  `post_title` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_post` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `sch_selected_sessions`
--

INSERT INTO `sch_selected_sessions` (`id`, `post_id`, `author`, `post_title`) VALUES
(181, 2204, 'siva.sap', 'Introduction to Cloud Computing'),
(182, 2232, 'hiemanshu', 'Working on the Android ROMs. Why, What and How!'),
(183, 2430, 'vishwasmudagal', 'Technology Innovation In Legal Industry'),
(184, 2318, 'soham', 'Make an android music player in 40 minutes flat'),
(185, 2143, 'laforge49', 'Distributed, Robust Software Made Easy'),
(186, 2398, 'vasudeva', 'Creating Astonishing mobile UX'),
(187, 2132, 'saifikhan', 'Lua (with C) an embeddable extensible scripting language'),
(188, 2480, 'arun.alpha', 'Randomness and Bias'),
(189, 2504, 'vibha', 'So it is BYOD now'),
(190, 2292, 'Sunanda', 'Graphology'),
(191, 2615, 'NJ666', 'Questioning Authority and Freedom'),
(192, 2300, 'AnujDuggal', 'Enhancing User Experience &#8211; Explain your product better'),
(193, 2314, 'pranayairan', 'Reverse Engineering an Android app &#8211;  securing your android apps against attacks'),
(194, 2284, 'anandvns', 'No JS + Intro to DartCon'),
(195, 2076, 'sathyabhat', 'Password Management &#038; You'),
(196, 2408, 'pavanv', 'How you could have survived the AWS Christmas eve outage'),
(197, 2404, 'twsitedlog', 'Taking Web Application Deployment from infancy to maturity using Cloud'),
(198, 2159, 'mail2akhtar', 'Storage as a Service and OpenStack storage services'),
(199, 2513, 'geekoo', 'Become a Better Programmer'),
(200, 2486, 'muqsith', 'Creating a Heatmap for Google Maps'),
(201, 2139, 'Ratzzz', 'Mathematics in Photography'),
(202, 2245, 'Gautam', 'Gamification'),
(203, 2155, 'Raghu25289', 'Why do people become entrepreneurs?'),
(204, 2147, 'ruchir89', 'A siteless vision: the power of accessibility'),
(205, 2424, 'adityabhushan61', 'Standing out or Outstanding: Networked life and the power of weak Links'),
(206, 2389, 'brandbull', 'New Trends in eCommerce &#8211; where do you fit in?'),
(207, 2185, 'thava', 'Python Concurrency'),
(208, 2509, 'deepakagra', 'BigQuery by Google'),
(209, 2200, 'caulagi', 'Expose your data'),
(210, 2496, 'fagun', 'Javascript &#8211; the winner!'),
(211, 2236, 'uday', 'Democracy Powered by Political Network (aka Social Network)'),
(212, 2263, 'rizmaverick', 'Get groovy with Groovy!'),
(213, 2518, 'Amrit Sanjeev', 'User Experience Designing for Mobile applications &#8211; What developers should know !'),
(214, 2453, 'Aravind', 'Mowbly'),
(215, 2228, 'djds4rce', 'True story of The Internet'),
(216, 2338, 'shankarsoma', 'Video Search Optimization &amp; VSEO');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
