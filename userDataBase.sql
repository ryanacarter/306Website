-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2013 at 07:49 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `meal_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `e-id` varchar(9) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`e-id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`e-id`, `password`) VALUES
('999999999', 'checkout');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `rFid` varchar(100) NOT NULL,
  `e_id` varchar(9) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `punches` int(11) NOT NULL,
  `dining` double NOT NULL,
  `flex` double NOT NULL,
  PRIMARY KEY (`rFid`),
  UNIQUE KEY `e_id` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`rFid`, `e_id`, `first_name`, `last_name`, `punches`, `dining`, `flex`) VALUES
('2io25o3i4u5', '999999999', 'Dumby', 'Dumby', 14, 250, 12.53);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`e-id`) REFERENCES `user` (`e_id`) ON UPDATE CASCADE;
