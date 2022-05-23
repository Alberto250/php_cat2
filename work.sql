-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 07:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work`
--

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE `bought` (
  `id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `car` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bought`
--

INSERT INTO `bought` (`id`, `buyer`, `seller`, `car`, `quantity`, `date`, `time`) VALUES
(1, 3, 0, 5, 3, '2022-05-23', '00:18:35'),
(2, 3, 0, 5, 3, '2022-05-23', '00:18:35'),
(3, 3, 0, 7, 1, '2022-05-23', '00:27:49'),
(4, 3, 0, 7, 1, '2022-05-23', '00:27:49'),
(5, 3, 0, 5, 5, '2022-05-23', '00:56:04'),
(6, 3, 0, 5, 7, '2022-05-23', '00:59:36'),
(7, 3, 0, 5, 3, '2022-05-24', '04:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `sn` int(11) NOT NULL,
  `cname` text NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` text NOT NULL,
  `location` text NOT NULL,
  `mdate` text NOT NULL,
  `type` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`sn`, `cname`, `cost`, `quantity`, `color`, `location`, `mdate`, `type`, `image`) VALUES
(1, 'BMW', 35000, 35, 'White', 'Germany', '2022-05-24', 'Manual', 'download.jpeg'),
(5, 'BMW', 250, 1, 'black', 'Japan', '2022-04-27', 'Manual', '2022_bmw_5_series_angularfront.jpg'),
(7, 'BMW', 250, 17, 'white', 'Japan', '2022-04-27', 'Automatic', '2022-BMW-i4-white-full_color-driver_side_front_quarter.png'),
(14, 'Aston MArtin', 12435, 100, 'Red & White', 'USA', '2022-05-24', 'Automatic', 'Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `type`) VALUES
(1, 'CRA', 'car shop', 'car@a.rw', '123', 0),
(3, 'Alba', 'N', 'a@gmail.com', 'abana123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bought`
--
ALTER TABLE `bought`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bought`
--
ALTER TABLE `bought`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bought`
--
ALTER TABLE `bought`
  ADD CONSTRAINT `bought_ibfk_1` FOREIGN KEY (`buyer`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
