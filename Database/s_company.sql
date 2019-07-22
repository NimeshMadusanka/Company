-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 06:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

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
  `phone` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `relationship`, `address`, `html`, `css`, `javascript`, `php`, `phone`, `image`, `email`, `password`) VALUES
(7, 'Kumari', 'Female', 'Married', 'kalidasa Mawatha , hadala , wattala', 1, 0, 1, 1, '0759648563', 'image/1563517738.jpg', '', ''),
(8, 'Ishan', 'Male', 'Single', 'Isurupura road, Malabe, Colombo', 1, 1, 0, 0, '0452639567', 'image/1563517754.jpg', '', ''),
(9, 'Nayana', 'Female', 'Married', 'no:42/A, gukula , Rabukkana', 1, 1, 1, 1, '0912635781', 'image/1563517767.jpg', '', ''),
(10, 'suranga', 'Male', 'Married', 'no:56/B, premarathana road ,welhengoda,Ahangama', 1, 1, 0, 0, '0771316633', 'image/1563517782.jpg', '', ''),
(11, 'Perera', 'Female', 'Single', 'no:2/D, wataraka , padukka', 0, 1, 1, 1, '754756231', '', '', ''),
(12, 'Gruge', 'Male', 'Married', 'no:8/mada Widiya, Kalaniya', 1, 1, 1, 1, '785678956', '', '', ''),
(13, 'lahiru', 'Male', 'Single', 'premarathana road ,welhengoda,Ahangama', 1, 1, 0, 0, '771316633', '', '', ''),
(14, 'Chamika', 'Male', 'Single', 'no:49, Araliya Road, Horana', 1, 0, 0, 1, '756329574', '', '', ''),
(15, 'Anupama', 'Female', 'Married', '06, Frist lane, Korawalla , Moratuwa', 1, 1, 1, 0, '0789856237', 'image/1563518755.jpg', '', ''),
(16, 'Wasana', 'Female', 'Single', 'No: 87, N/A ,Kolonnawa Rd Wellampit', 0, 1, 0, 1, '765629876', '', '', ''),
(17, 'Miyushan', 'Male', 'Single', '65 Palm Grove Avenue Ratmalana', 1, 1, 0, 0, '715987623', '', '', ''),
(18, 'Seneviratne', 'Male', 'Married', '574 Galle Road, colombo 03', 1, 0, 1, 1, '771316633', '', '', ''),
(19, 'Nimesh', 'Male', 'Single', 'adada', 1, 1, 1, 1, '0771973176', 'image/1563517728.jpg', '', ''),
(20, 'Nimesh', 'Male', 'Single', 'matara', 1, 1, 0, 0, '0771973176', 'image/1563517646.jpg', '', ''),
(21, 'Nimesh2', 'Male', 'Single', 'Galle', 1, 0, 0, 0, '0771973176', 'image/1563516560.jpg', '', ''),
(22, 'Nimesh3', 'Male', 'Single', 'Matara', 1, 1, 0, 0, '0771973176', 'image/1563517336.jpg', '', ''),
(23, 'Lakindu', 'Female', 'Married', 'no:45/galle road, Matara', 1, 0, 1, 1, '0912635781', 'image/1563518569.jpg', '', ''),
(24, 'Nimesh', 'Male', 'Single', 'dadad', 1, 1, 1, 0, '0771973176', 'image/1563524654.jpg', '', ''),
(25, 'Nimesh', 'Male', 'Single', 'matara', 1, 1, 0, 0, '0912635781', 'image/1563527956.jpg', 'madusankan909@gmail.com', 'Nimesh123@#'),
(26, 'Kalana', 'Male', 'Married', 'Matara', 1, 0, 1, 0, '0789856237', 'image/1563528094.jpg', 'madusankan909@gmail.com', 'S2FsYW5hMTJA'),
(27, 'Nimesh', 'Male', 'Single', 'gjhga', 1, 1, 0, 0, '0789856237', 'image/1563532851.jpg', 'madusankan909@gmail.com', 'TmltZXNoMTJAIw=='),
(28, 'Nimesh', 'Male', 'Married', 'jhkjh', 1, 0, 1, 0, '0789856237', 'image/1563533001.jpg', 'kk@kk.com', 'S2sxMjM0NTY=');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
