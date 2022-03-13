-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 10:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `habit_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `habits`
--

CREATE TABLE `habits` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_everyday` tinyint(1) NOT NULL,
  `min_times` int(5) DEFAULT NULL,
  `max_times` int(5) DEFAULT NULL,
  `build_up_amount` int(5) DEFAULT NULL,
  `bounty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `habits`
--

INSERT INTO `habits` (`id`, `name`, `description`, `start_date`, `end_date`, `is_everyday`, `min_times`, `max_times`, `build_up_amount`, `bounty`) VALUES
(1, 'first habit ', 'this is the first habit to be created using this form', '2022-03-02', '2022-03-18', 0, 0, 0, 0, 0),
(2, 'sdasd', '213123', '2022-03-02', '2023-03-02', 1, 0, 0, 0, 0),
(5, '2131 23', 'ewfwerw 2', '2025-06-08', '2027-08-09', 1, 5, 11, 8, 19);

-- --------------------------------------------------------

--
-- Table structure for table `habit_progress`
--

CREATE TABLE `habit_progress` (
  `habit_id` int(11) NOT NULL,
  `progress_tracker` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`progress_tracker`)),
  `comments_tracker` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`comments_tracker`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `habits`
--
ALTER TABLE `habits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habit_progress`
--
ALTER TABLE `habit_progress`
  ADD UNIQUE KEY `habit_id` (`habit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `habits`
--
ALTER TABLE `habits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
