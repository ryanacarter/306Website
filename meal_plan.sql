-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2013 at 01:17 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meal_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `e_id` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`e_id`, `password`) VALUES
('107833556', '2014jmu'),
('107864325', '2014jmu'),
('122783745', '2014jmu'),
('1928348', '2014jmu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `e_id` varchar(9) NOT NULL,
  `rfid` varchar(10) NOT NULL,
  `punches` int(11) NOT NULL,
  `dining` double NOT NULL,
  `flex` double NOT NULL,
  `picture_location` varchar(250) NOT NULL,
  KEY `e_id` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `e_id`, `rfid`, `punches`, `dining`, `flex`, `picture_location`) VALUES
('Katie', 'Sasek', '122783745', '123456789', 0, 69.8, 50, 'img/userPictures/IMG_0332.jpg'),
('Marky', 'Duarte', '107833556', '2374586970', 0, 90, 70, 'img/userPictures/IMG_1965.jpg'),
('Aaron ', 'Doherty', '107864325', '3487652309', 2, 34, 99, ''),
('Jaclyn', 'Ayers', '1928348', '1234652387', 2, 0, 12, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `user` (`e_id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
