-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 04:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `User_Details` varchar(20) DEFAULT NULL,
  `login_date` date NOT NULL,
  `login_time` time(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`User_Details`, `login_date`, `login_time`) VALUES
('{78BE8137-63A1-A264-', '2020-04-04', '19:23:00.000000'),
('{DDE7D54C-563F-2126-', '2020-04-04', '19:56:53.000000'),
('{DDE7D54C-563F-2126-', '2020-04-04', '23:26:47.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '00:58:25.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '02:25:37.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '02:58:28.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '03:08:21.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '03:35:49.000000'),
('{DDE7D54C-563F-2126-', '2020-04-05', '03:57:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `Quiz_id` varchar(20) NOT NULL,
  `percentage` int(3) DEFAULT NULL,
  `points_earned` int(100) DEFAULT NULL,
  `date_completed` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`Quiz_id`, `percentage`, `points_earned`, `date_completed`) VALUES
('{55F0764E-7D43-3E0D-', 60, 6, '2020-04-05'),
('{9FF934DC-AEA3-5749-', 50, 5, '2020-04-05'),
('{FA03E1B5-A5A4-85E4-', 40, 4, '2020-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `User_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`User_id`, `first_name`, `surname`, `email_address`, `password`, `age`) VALUES
('{78BE8137-63A1-A264-', 'Test', 'Account', 'test@account.com', '16d7a4fca7442dda3ad93c9a726597e4', 12),
('{DDE7D54C-563F-2126-', 'Test', 'Mail', 'test@mail.com', '16d7a4fca7442dda3ad93c9a726597e4', 18);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `User_Details` varchar(20) DEFAULT NULL,
  `user_level` int(10) DEFAULT NULL,
  `points_earned` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`User_Details`, `user_level`, `points_earned`) VALUES
('{DDE7D54C-563F-2126-', 13, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD KEY `User_Details` (`User_Details`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`Quiz_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD KEY `User_Details` (`User_Details`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`User_Details`) REFERENCES `user_details` (`User_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user_level`
--
ALTER TABLE `user_level`
  ADD CONSTRAINT `user_level_ibfk_1` FOREIGN KEY (`User_Details`) REFERENCES `user_details` (`User_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
