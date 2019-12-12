-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 10:39 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weekend_wardrobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `booth_plan`
--

CREATE TABLE `booth_plan` (
  `section` varchar(1) NOT NULL,
  `number` int(1) NOT NULL,
  `operator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booth_plan`
--

INSERT INTO `booth_plan` (`section`, `number`, `operator`) VALUES
('A', 1, 'A1 AAA'),
('A', 2, 'A2 AAA'),
('A', 3, 'A3 AAA'),
('B', 1, 'B1 BBB'),
('B', 2, 'B2 BBB'),
('C', 1, 'C1 CCC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booth_plan`
--
ALTER TABLE `booth_plan`
  ADD PRIMARY KEY (`section`,`number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
