-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 10:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `Attendee_ID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Speciality_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`Attendee_ID`, `firstname`, `lastname`, `DOB`, `EmailAddress`, `ContactNumber`, `Speciality_id`) VALUES
(8, 'AYMARKI', 'SHAIK', '2000-08-26', 'ikram.18bes7029@vitap.ac.in', '09110511575', 3),
(10, 'yasin', 'shaik', '0000-00-00', 'shaikikramshaikikram@gmail.com', '9010515575', 3),
(11, 'yasin', 'shaik', '0000-00-00', 'shaikikramshaikikram@gmail.com', '9010515575', 3),
(12, 'shahid', 'SHAIK', '2001-08-10', 'shaik.yasinshahidikram1999@gmail.com', '9110511575', 3),
(13, 'IKRAM', 'SHAIK', '0000-00-00', 'ikram.18bes7029@vitap.ac.in', '9110511575', 4);

-- --------------------------------------------------------

--
-- Table structure for table `speciality_id`
--

CREATE TABLE `speciality_id` (
  `Speciality_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speciality_id`
--

INSERT INTO `speciality_id` (`Speciality_id`, `name`) VALUES
(1, 'Database Admin'),
(3, 'Software Developer'),
(4, 'web Administrator'),
(5, 'Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`Attendee_ID`),
  ADD KEY `fk_attendee_specialities` (`Speciality_id`);

--
-- Indexes for table `speciality_id`
--
ALTER TABLE `speciality_id`
  ADD PRIMARY KEY (`Speciality_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `Attendee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `speciality_id`
--
ALTER TABLE `speciality_id`
  MODIFY `Speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `fk_attendee_specialities` FOREIGN KEY (`Speciality_id`) REFERENCES `speciality_id` (`Speciality_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
