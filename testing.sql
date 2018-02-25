-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 08:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `business_name` varchar(300) NOT NULL,
  `address` text NOT NULL,
  `Amenities` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `business_name`, `address`, `Amenities`) VALUES
(1, 'Palazzo Cinemas', 'Forum Mall,\r\nVadapalani,\r\nChennai - 600028', 'Multiplex'),
(2, 'Sathyam Cinemas', 'Mount Road,\r\nChennai - 600024', 'Independent Theatre'),
(3, 'S2 Cinemas', 'Perambur,\r\nChennai-600030', 'Spectrum Mall');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `business_id`, `rating`) VALUES
(1, 6, 3),
(2, 6, 1),
(3, 6, 5),
(4, 6, 5),
(5, 6, 5),
(6, 5, 4),
(7, 5, 1),
(8, 5, 5),
(9, 4, 3),
(10, 5, 5),
(11, 5, 5),
(12, 4, 5),
(13, 3, 3),
(14, 6, 1),
(15, 3, 5),
(16, 3, 1),
(17, 3, 1),
(18, 3, 1),
(19, 4, 1),
(20, 5, 1),
(21, 5, 2),
(22, 6, 5),
(23, 2, 2),
(24, 2, 5),
(25, 2, 1),
(26, 6, 5),
(27, 5, 4),
(28, 4, 4),
(29, 6, 3),
(30, 6, 5),
(31, 1, 2),
(32, 1, 4),
(33, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
