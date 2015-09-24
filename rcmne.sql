-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2008 at 03:07 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rcmne`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(16) NOT NULL auto_increment,
  `password` tinytext collate utf8_unicode_ci,
  `user_level` char(1) collate utf8_unicode_ci default NULL,
  `first_name` tinytext collate utf8_unicode_ci NOT NULL,
  `last_name` tinytext collate utf8_unicode_ci NOT NULL,
  `street` tinytext collate utf8_unicode_ci,
  `city` tinytext collate utf8_unicode_ci,
  `state_name` tinytext collate utf8_unicode_ci,
  `zipcode` tinytext collate utf8_unicode_ci,
  `phone` tinytext collate utf8_unicode_ci,
  `email` tinytext collate utf8_unicode_ci,
  `institution` tinytext collate utf8_unicode_ci,
  `last_verified` tinytext collate utf8_unicode_ci,
  PRIMARY KEY  (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `password`, `user_level`, `first_name`, `last_name`, `street`, `city`, `state_name`, `zipcode`, `phone`, `email`, `institution`, `last_verified`) VALUES
(1, 'password', 'M', 'Ruth', 'Cannon', '516 Pond Rd', 'Lewiston', 'ME', '04240', '207-786-3929', 'ruthcannon@prexar.com', 'UMC/Auburn', ''),
(2, 'password', 'M', 'Mary Ann', 'Haxton', '106 Black Mountain Rd', 'Sumner', 'ME', '04292', '207-388-2979', 'thyme@mealink.net', 'UMC/Auburn', ''),
(3, 'password', 'C', 'Cherylann', 'Richards', 'PO Box 61', 'Cummington', 'MA', '01026', '413-634-5621', 'cherylannrichards@earthlink.net', '', ''),
(4, 'password', 'C', 'Carol', 'Kelly', '5 Vaughan Ct', 'Waterville', 'ME', '04901', '207-872-0826', 'maincandc@roadrunner.com', 'Pleasant St/Waterville', ''),
(5, 'password', 'C', 'David', 'Christie', '12 True Rd', 'Lincolnville', 'ME', '04849', '207-789-5560', 'chris-ts@midcoast.com', 'John Street/Camden', ''),
(6, 'password', 'C', 'Graham', 'DeCoster', 'PO Box 185', 'Orrs Island', 'ME', '', '207-833-5582', 'revsueme@aol.com', 'Orrs/Bailey UMC', ''),
(7, 'password', 'C', 'Amy', 'Earickson', '22 N Riverside Dr', 'Waterville', 'ME', '04901', '207-877-9676', '', 'Pleasant St/Waterville', ''),
(8, 'password', 'C', 'Rufus', 'Foshee', 'PO Box 839', 'Camden', 'ME', '04843', '', 'rufus@rufusfosheeantiques.com', 'John Street/Camden', ''),
(9, 'password', 'C', 'Charles', 'Kelly', '5 Vaughan Ct', 'Waterville', 'ME', '04901', '207-872-0826', 'maincandc@roadrunner.com', 'Pleasant St/Waterville', ''),
(10, 'password', 'C', 'Linda', 'Keniston-Duboca', '126 Ellis Pond Rd', 'Oakland', 'ME', '04963', '', 'drkendu@gwi.net', 'Pleasant St/Waterville', ''),
(11, 'password', 'C', 'Susan', 'MacKenzie', '324 Trafton Rd', 'Waterville', 'ME', '04901', '207-872-9994', 'shmacken@colby.com', 'Pleasant St/Waterville', ''),
(12, 'password', 'C', 'Shirley', 'Mattson', '37 US Hwy One', 'Verona Island', 'ME', '', '207-469-7069', 'debora@midmaine.com', 'First UMC/Brewer', ''),
(13, 'password', 'C', 'Bill', 'Meyer', 'PO Box 167', 'Belgrade Lakes', 'ME', '04918', '207-397-4028', 'unionch@gwi.net', 'Union Church/Belgrade Lakes', ''),
(14, 'password', 'C', 'Susan', 'Randall', '42 Oakland Dr', 'Belgrade', 'ME', '04917', '207-495-3876', 'sdrandall@gwi.net', 'Union Church/Belgrade Lakes', ''),
(15, 'password', 'C', 'Bob', 'Sammons', 'PO Box 234', 'Orrs Island', 'ME', '', '207-833-5274', 'resretrev@aol.com', 'Orrs/Bailey UMC', ''),
(16, 'password', 'A', 'Sharon', 'Saunders', '2 Clearview Ave', 'Waterville', 'ME', '04901', '207-872-0682', 'ssaunder@bates.edu', 'Pleasant St/Waterville', ''),
(33, 'password', 'C', 'Barbara', 'Temple', '70 Gogan Rd', 'Benton', 'ME', '04901', '207-453-4762', 'kerbart@gwi.net', 'Pleasant St/Waterville', ''),
(38, 'password', 'A', 'Jerry', 'Mouse', 'asdf', 'Oakland', 'ME', '04963', '207-111-2345', 'joeblow@no.place', 'Mental', '1/1/2008');
