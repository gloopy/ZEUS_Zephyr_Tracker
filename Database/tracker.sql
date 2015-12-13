-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2015 at 08:47 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `DataPoint`
--

CREATE TABLE IF NOT EXISTS `DataPoint` (
  `time` varchar(255) NOT NULL,
  `acceleration` double NOT NULL,
  `pointID` int(11) NOT NULL AUTO_INCREMENT,
  `velocity` double NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `altitude` double NOT NULL,
  `dataID` int(11) NOT NULL,
  PRIMARY KEY (`pointID`),
  KEY `dataID` (`dataID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DataSet`
--

CREATE TABLE IF NOT EXISTS `DataSet` (
  `dataID` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `raceID` int(11) NOT NULL,
  PRIMARY KEY (`dataID`),
  KEY `addedBy` (`addedBy`),
  KEY `raceID` (`raceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Member`
--

CREATE TABLE IF NOT EXISTS `Member` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Race`
--

CREATE TABLE IF NOT EXISTS `Race` (
  `raceID` int(11) NOT NULL AUTO_INCREMENT,
  `raceName` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `createdBy` int(11) NOT NULL,
  PRIMARY KEY (`raceID`),
  KEY `createdBy` (`createdBy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DataPoint`
--
ALTER TABLE `DataPoint`
  ADD CONSTRAINT `DataPoint_ibfk_1` FOREIGN KEY (`dataID`) REFERENCES `DataSet` (`dataID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DataSet`
--
ALTER TABLE `DataSet`
  ADD CONSTRAINT `DataSet_ibfk_2` FOREIGN KEY (`addedBy`) REFERENCES `Member` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DataSet_ibfk_3` FOREIGN KEY (`raceID`) REFERENCES `Race` (`raceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Race`
--
ALTER TABLE `Race`
  ADD CONSTRAINT `Race_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `Member` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
