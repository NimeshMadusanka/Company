-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 07:40 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `html` int(10) NOT NULL,
  `css` int(10) NOT NULL,
  `javascript` int(10) NOT NULL,
  `php` int(10) NOT NULL,
  `phone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `relationship`, `address`, `html`, `css`, `javascript`, `php`, `phone`) VALUES
(1, 'Lahieu', 'Male', 'Single', 'premarathana road ,welhengoda,Ahangama', 1, 0, 1, 0, 771316633),
(7, 'Kumari', 'Female', 'Married', 'kalidasa Mawatha , hadala , wattala', 1, 0, 1, 1, 759648563),
(8, 'Ishan', 'Male', 'Single', 'Isurupura road, Malabe, Colombo', 1, 1, 0, 0, 452639567),
(9, 'Nayana', 'Female', 'Married', 'no:42/A, gukula , Rabukkana', 1, 1, 1, 1, 912635781),
(10, 'suranga', 'Male', 'Married', 'no:56/B, premarathana road ,welhengoda,Ahangama', 1, 1, 0, 0, 771316633),
(11, 'Perera', 'Female', 'Single', 'no:2/D, wataraka , padukka', 0, 1, 1, 1, 754756231),
(12, 'Gruge', 'Male', 'Married', 'no:8/mada Widiya, Kalaniya', 1, 1, 1, 1, 785678956);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
