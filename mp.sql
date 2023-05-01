-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 08:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp`
--

-- --------------------------------------------------------

--
-- Table structure for table `mad`
--

CREATE TABLE `mad` (
  `sr_no` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `ques` varchar(100) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `php`
--

CREATE TABLE `php` (
  `sr_no` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `ques` varchar(100) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `php`
--

INSERT INTO `php` (`sr_no`, `q_no`, `test_name`, `ques`, `op1`, `op2`, `op3`, `op4`, `correct`, `test_id`) VALUES
(1, 1, 'chapter1', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 1),
(2, 2, 'chapter1', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 'this is a test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwp`
--

CREATE TABLE `pwp` (
  `sr_no` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `ques` varchar(100) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwp`
--

INSERT INTO `pwp` (`sr_no`, `q_no`, `test_name`, `ques`, `op1`, `op2`, `op3`, `op4`, `correct`, `test_id`) VALUES
(1, 1, 'chapter1', 'What is IDLE', 'idle', 'rEALLY idle', 'Integrated Environment', 'Nothing', 'Integrated Environment', 1),
(2, 2, 'chapter1', 'Who made python', 'Guido Von rossum', 'Me', 'Steve', 'iDK', 'Guido Von rossum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `test_id` int(11) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`test_id`, `sub`, `test_name`, `total`, `description`) VALUES
(1, 'PWP', 'chapter1', 2, '11');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `sr_no` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`sr_no`, `test_id`, `user_id`, `score`) VALUES
(1, 1, 'Sharif Tasleem', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_role` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `roll_num` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_role`, `name`, `number`, `roll_num`, `email`, `password`) VALUES
(1, 'Sharif Tasleem', 2147483647, 20417, 'hamdulesharif555@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mad`
--
ALTER TABLE `mad`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `php`
--
ALTER TABLE `php`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `pwp`
--
ALTER TABLE `pwp`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mad`
--
ALTER TABLE `mad`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `php`
--
ALTER TABLE `php`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pwp`
--
ALTER TABLE `pwp`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `php`
--
ALTER TABLE `php`
  ADD CONSTRAINT `php_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `quizes` (`test_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
