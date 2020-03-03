-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 11:35 AM
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
-- Database: `afterschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites_reg`
--

CREATE TABLE `activites_reg` (
  `studentid` varchar(30) NOT NULL,
  `activity_id` varchar(50) NOT NULL,
  `date_of_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activities_list`
--

CREATE TABLE `activities_list` (
  `activity_id` varchar(50) NOT NULL,
  `activity_name` text NOT NULL,
  `age_group` varchar(30) NOT NULL,
  `fees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `studentid` varchar(30) NOT NULL,
  `activity_id` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fees_transaction`
--

CREATE TABLE `fees_transaction` (
  `studentid` varchar(30) NOT NULL,
  `activity_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `paid By` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `gender` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `parent1` text NOT NULL,
  `phone1` decimal(10,1) NOT NULL,
  `parent2` text NOT NULL,
  `phone2` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites_reg`
--
ALTER TABLE `activites_reg`
  ADD PRIMARY KEY (`studentid`,`activity_id`),
  ADD KEY `activity_fk_reg` (`activity_id`);

--
-- Indexes for table `activities_list`
--
ALTER TABLE `activities_list`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `student_fk` (`studentid`),
  ADD KEY `activity_fk` (`activity_id`);

--
-- Indexes for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD KEY `student_fk_fee` (`studentid`),
  ADD KEY `activity_fk_fee` (`activity_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activites_reg`
--
ALTER TABLE `activites_reg`
  ADD CONSTRAINT `activity_fk_reg` FOREIGN KEY (`activity_id`) REFERENCES `activities_list` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_fk_reg` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `activity_fk` FOREIGN KEY (`activity_id`) REFERENCES `activities_list` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees_transaction`
--
ALTER TABLE `fees_transaction`
  ADD CONSTRAINT `activity_fk_fee` FOREIGN KEY (`activity_id`) REFERENCES `activities_list` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_fk_fee` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
