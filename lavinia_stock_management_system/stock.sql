-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 10:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `pname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `pname`) VALUES
(002, 'maize'),
(003, 'rice'),
(004, 'sorghum'),
(005, 'maizef');

-- --------------------------------------------------------

--
-- Table structure for table `productin`
--

CREATE TABLE `productin` (
  `stid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(11) NOT NULL,
  `uprice` int(11) NOT NULL,
  `tprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productin`
--

INSERT INTO `productin` (`stid`, `date`, `pid`, `quantity`, `uprice`, `tprice`) VALUES
(004, '2024-06-18 13:56:40', 003, 60, 1000, 60000),
(005, '2024-06-18 15:12:53', 004, 26, 2300, 59800),
(006, '2024-06-18 17:05:48', 002, 18, 230, 4140);

-- --------------------------------------------------------

--
-- Table structure for table `productout`
--

CREATE TABLE `productout` (
  `stid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pid` int(3) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(11) NOT NULL,
  `uprice` int(11) NOT NULL,
  `tprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productout`
--

INSERT INTO `productout` (`stid`, `date`, `pid`, `quantity`, `uprice`, `tprice`) VALUES
(004, '2024-06-18 13:53:46', 002, 1, 13, 13),
(005, '2024-06-18 13:54:07', 002, 1, 12, 12),
(007, '2024-06-19 03:40:37', 003, 20, 1900, 38000),
(008, '2024-06-19 03:43:10', 002, 7, 200, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `password`) VALUES
(001, 'donatien', '123456'),
(002, 'ishfab', '123456'),
(003, 'alex', 'mugabe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `productin`
--
ALTER TABLE `productin`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `productout`
--
ALTER TABLE `productout`
  ADD PRIMARY KEY (`stid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productin`
--
ALTER TABLE `productin`
  MODIFY `stid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productout`
--
ALTER TABLE `productout`
  MODIFY `stid` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productin`
--
ALTER TABLE `productin`
  ADD CONSTRAINT `productin_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productout`
--
ALTER TABLE `productout`
  ADD CONSTRAINT `productout_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
