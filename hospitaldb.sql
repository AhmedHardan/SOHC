-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2025 at 10:27 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `patient_username` varchar(50) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_username`, `doctor_name`, `department`, `appointment_date`, `status`) VALUES
(1, 'Khalid', 'Ahmed', 'Cardiology', '2025-12-15', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `second_name` varchar(50) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `national_id` varchar(20) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `second_name`, `gender`, `username`, `mobile_number`, `national_id`, `password_hash`) VALUES
(1, 'Ahmed', 'Mohammed', 'M', 'reke', '90000000', '232', '$2y$10$kWJF8F1JdMhqkIBcQhPia.Ohf0FiDWDq4ILNnCzK8l4A3qjqIp/eO'),
(2, 'Mohammed', 'Abdullah ', '', 'Masu', '12345677', '1211', '$2y$10$K2EC2P/tJwLpyvHb5.rgZOfWXG.RIL6WV3v1/1DeT/jEFO9m4EhV.'),
(3, 'Khalid ', 'Ali', '', 'Khalid1', '99095405', '12144', '$2y$10$p97iMq1P.q/xkzyWoQiOWOtlDZswndWgdgGGhM23SWL3EPfHnplM2');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password_hash`) VALUES
(1, 'staff', '$2y$10$sz/0jqF7Kx5Pda/t1TVPt.iAXZChbLmOKDLRDdu8KBKmjLuqEtQpK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
