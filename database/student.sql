-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2020 at 07:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--
CREATE DATABASE IF NOT EXISTS `student` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student`;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `IndexNo` varchar(10) NOT NULL,
  `StName` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`IndexNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`IndexNo`, `StName`, `Address`, `Gender`, `DOB`) VALUES
('ML/001/25', 'Manish', '165/A,Wanduramba,Galle.', 'Male', '2020-02-29'),
('ML/001/21', 'Navod', '25/A,Thalawa,Wanduramba,Galle.', 'Male', '2020-02-27'),
('ML/001/28', 'Oshani', '55/B,Makuluwa,Galle.', 'Female', '2020-02-10'),
('ML/001/22', 'Amal', '25/A,Thalawa,Wanduramba,Galle.', 'Male', '2019-02-18'),
('ML/001/15', 'Malsha', '55/B,Makuluwa,Galle.', 'Female', '1990-02-27'),
('ML/001/29', 'Namidu', '55/B,Unawatuna,Galle.', 'Male', '1992-02-21'),
('ML/001/11', 'Madushani', '25/A,Thalawa,Galle.', 'Female', '1995-02-28'),
('ML/001/23', 'Eranga', '25/A,Hikkaduwa,Galle.', 'Male', '1994-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(12) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `AdminType` varchar(100) NOT NULL,
  `AssignedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `UserName`, `Password`, `AdminType`, `AssignedDate`) VALUES
(23, 'Manish', '631ab95b5d065158e73eed2835fe6dd38a851181', 'Admin', '2020-02-16 05:18:35'),
(25, 'Fernando', '945903c4303d774570727e5c8b8af6ee9fcc791f', 'Co-Admin', '2020-02-16 05:19:53'),
(26, 'Oshani', '051823e651318e9768c181fd156c93d7d841bec7', 'Admin', '2020-02-16 05:20:11'),
(27, 'Navod', '83ef47a836d024dc5594954530a725b508698da7', 'Co-Admin', '2020-02-16 05:20:31'),
(29, 'Prashan', '4e8a4b63b765f4cd448bbb86b3ca534dc8bd7a69', 'Co-Admin', '2020-02-16 05:42:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
