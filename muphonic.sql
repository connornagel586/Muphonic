-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2018 at 12:36 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `masters_classes`
--

DROP TABLE IF EXISTS `masters_classes`;
CREATE TABLE IF NOT EXISTS `masters_classes` (
  `class_id` int(4) NOT NULL AUTO_INCREMENT,
  `class_number` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `class_name` char(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `professor` char(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `term_year` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `class_description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `course_credits` int(2) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `Class ID` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_classes`
--

INSERT INTO `masters_classes` (`class_id`, `class_number`, `class_name`, `professor`, `term_year`, `class_description`, `course_credits`, `student_id`) VALUES
(1, '555', 'Super Computers', 'Dr. DOOM', 'Spring 2018', 'This is where the description goes....', 4, 33322211),
(2, '565', 'Hacking', 'Dr. Qwerty', 'Fall 2018', 'This is a note', 3, 1111222233),
(3, '567', 'Global Websites', 'Dr. Smith', 'Spring 2018', 'Notes', 4, 33322211),
(4, '577', 'Making Cash with Phone Apps', 'Dr. Bling', 'Fall 2018', 'Notes', 3, 1111222233),
(5, '588', 'Algorithms', 'Dr. Barney', 'Spring 2018', 'Notes', 2, 213111666),
(6, '569', 'Legacy Programing', 'Dr. Walter', 'Fall 2018', 'Notes', 2, 33322211);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `middle_initial` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `email_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `advisor` varchar(100) NOT NULL,
  `major` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `program_start` date NOT NULL,
  `expected_grad_date` date DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `Student ID` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`first_name`, `middle_initial`, `last_name`, `student_id`, `phone_number`, `address`, `email_address`, `advisor`, `major`, `program_start`, `expected_grad_date`) VALUES
('Fred', 'E', 'Gullible', 33322211, 2085552222, '654 Where rd Boise ID 83704', 'fgullible@email.com', 'Roganson', 'Computer Science', '2018-02-14', '2011-01-10'),
('Jason', 'R', 'Moore', 213111666, 2085553333, '345 Time str Boise ID 83712', 'jmoore@email.com', 'Thompson', 'Computer Science', '2018-02-01', '2020-01-10'),
('Tom', 'D', 'Smith', 1111222233, 2085554444, '234 Rock st. Boise, ID 83716', 'tsmith@email.com', 'Sanford', 'Computer Science', '2018-02-04', '2019-02-06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
