-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 06:28 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_af`
--

-- --------------------------------------------------------

--
-- Table structure for table `quote_details`
--

CREATE TABLE `quote_details` (
  `id` int(11) NOT NULL,
  `quote_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_name` date NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_details`
--

INSERT INTO `quote_details` (`id`, `quote_no`, `product_name`, `category_name`, `price`, `qty`) VALUES
(1, 1, '', '0000-00-00', 55, 45),
(2, 2, '', '0000-00-00', 55, 45),
(3, 3, '', '0000-00-00', 55, 45),
(4, 4, '4', '0000-00-00', 85, 15),
(5, 5, 'Shirt Back Name', '0000-00-00', 55, 45),
(6, 5, 'Left Shirt Arm Logo', '0000-00-00', 45, 15),
(7, 6, 'Shirt Back Name', '0000-00-00', 55, 85),
(8, 6, 'Shirt Back Logo + Name', '0000-00-00', 75, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quote_details`
--
ALTER TABLE `quote_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_no` (`quote_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quote_details`
--
ALTER TABLE `quote_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quote_details`
--
ALTER TABLE `quote_details`
  ADD CONSTRAINT `quote_details_ibfk_1` FOREIGN KEY (`quote_no`) REFERENCES `quote` (`quote_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
