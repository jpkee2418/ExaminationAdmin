-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 08:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `lectNum` varchar(255) NOT NULL,
  `lectName` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Faculty` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `RegNo` varchar(255) NOT NULL,
  `StudentName` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Faculty` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `contactno` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Year`, `RegNo`, `StudentName`, `age`, `Faculty`, `Email`, `contactno`) VALUES
(1, '2018/2019', '2018ICTS05', 'jayapradha perinparajah', 24, 'Technology faculty', 'pradhajp2408@gmail.com', 704899858);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('Student','DR','Dean','HOD','Lecturer') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 'DR', 'UOV/DR', 'e2fc714c4727ee9395f324cd2e7f331f', 'DR uov'),
(2, 'Dean', 'UOV/Dean', 'e2fc714c4727ee9395f324cd2e7f331f', 'Dean uov'),
(3, 'HOD', 'UOV/HOD', 'e2fc714c4727ee9395f324cd2e7f331f', 'HOD uov'),
(4, 'Student', 'UOV/Stu', 'e2fc714c4727ee9395f324cd2e7f331f', 'Stu uov'),
(5, 'Lecturer', 'UOV/Lect', 'e2fc714c4727ee9395f324cd2e7f331f', 'lect uov');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
