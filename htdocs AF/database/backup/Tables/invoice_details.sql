-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 06:27 AM
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
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `product_description`, `category_name`, `price`, `qty`) VALUES
(155, 124, 'Trouser Left Player Name', '', '', 45, 11),
(156, 126, 'Short Left Logo', '', '', 75, 15),
(157, 127, 'Shirt Back Logo + Name', '', '', 45, 15),
(158, 129, '', '', '', 45, 11),
(159, 130, 'Trouser Left Logo', '', '', 45, 11),
(160, 131, 'Short Right Logo', '', '', 65, 15),
(161, 132, 'Right Shirt Arm Logo', '', '', 45, 11),
(162, 133, 'Shirt Back Name', '', '', 45, 14),
(163, 134, 'Short Left Logo', '', 'Short Left Logo', 85, 11),
(164, 135, 'Shirt Back Logo + Name', '', '', 55, 15),
(165, 136, 'Shirt Back Logo + Name', '', '', 55, 15),
(166, 137, 'Trouser Right Logo', '', '', 55, 15),
(167, 138, 'Shirt Back Logo', '', '', 45, 11),
(168, 139, 'Shirt Back Logo', '', '18', 45, 15),
(169, 142, 'Shirt Back Name', '', '', 45, 15),
(170, 143, 'Trouser Right Logo', '', 'BN20', 45, 11),
(171, 144, 'Shirt Back Logo + Name', '', '', 65, 15),
(172, 146, 'Shirt Back Logo + Name', '', '', 85, 15),
(173, 147, 'Cap Front Logo', '', '7', 55, 30),
(174, 148, 'Trouser Right Logo', '', 'Digital Printing', 45, 15),
(175, 148, 'Left Shirt Arm Logo', '', 'Flexography', 55, 15),
(176, 148, 'Shirt Back Logo', '', 'Sublimation', 85, 15),
(177, 148, 'Shirt Back Logo + Name', '', 'BN20', 70, 15),
(178, 149, 'Shirt Back Logo', '', 'Sublimation', 45, 11),
(179, 150, 'Shirt Back Logo', '', 'Sublimation', 55, 15),
(180, 151, 'Trouser Left Player Name', '', 'Screen Printing', 45, 11),
(181, 153, 'Shirt Back Logo', 'this is a description', 'Sublimation', 55, 15),
(182, 153, 'Left Shirt Arm Logo', 'this is a 2nd description', 'Sublimation', 65, 15),
(183, 154, 'Shirt Back Logo + Name', 'dhskjhd', 'Sublimation', 78, 15),
(184, 155, 'Shirt Back Logo', '4description', 'Laser Printing', 85, 15),
(185, 156, 'Right Shirt Arm Logo', 'desc', 'BN20', 75, 15),
(186, 156, 'Shirt Back Name', 'desc2', 'Digital Printing', 65, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
