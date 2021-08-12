-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2020 at 08:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_expense_details`
--

DROP TABLE IF EXISTS `new_expense_details`;
CREATE TABLE IF NOT EXISTS `new_expense_details` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `expense_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_date` date NOT NULL,
  `amount_spent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_dir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nid`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persondetails`
--

DROP TABLE IF EXISTS `persondetails`;
CREATE TABLE IF NOT EXISTS `persondetails` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `user_id` (`user_id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plandetails`
--

DROP TABLE IF EXISTS `plandetails`;
CREATE TABLE IF NOT EXISTS `plandetails` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `initial_budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `new_expense_details`
--
ALTER TABLE `new_expense_details`
  ADD CONSTRAINT `new_expense_details_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `plandetails` (`pid`);

--
-- Constraints for table `persondetails`
--
ALTER TABLE `persondetails`
  ADD CONSTRAINT `persondetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `plandetails`
--
ALTER TABLE `plandetails`
  ADD CONSTRAINT `plandetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
