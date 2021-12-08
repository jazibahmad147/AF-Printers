-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 02:08 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(7, 0, 'Screen Printing', '1'),
(10, 0, 'Sublimation', '1'),
(13, 0, 'Laser Printing', '1'),
(17, 0, 'Flexography', '1'),
(19, 0, 'BN20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cid` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cid`, `company_name`, `client_name`, `contact_number`, `status`, `balance`) VALUES
(1, 'creative officials', 'Ahsan Salman', '3364216108', '1', 2000),
(3, 'company', 'client@gmail.com', '+964564874658', '1', 865),
(5, 'RJC', 'Akmal Ahmad', '+92336585485', '1', 2127),
(7, 'METRO', 'Faraz', '+26665865454854', '1', 1617),
(8, 'IMRAN BOOK SHOP', 'Imran', '+23335456456465', '1', 80),
(9, 'AFZAL JEWLER', 'Afzal Ahmad', '+925565586465468', '1', 3),
(10, 'KAHSIF JEWLERS', 'kahsif ahmad', '8556554546435', '1', 590),
(11, 'AMJAD ', 'amjad ahmad', '566656876565', '1', 250),
(12, 'KHAN', 'khuram khan', '', '1', 500),
(15, 'PTCL', 'Faisla', '', '1', 1287),
(16, 'SOFTWARE WEB', 'Jazib Ahmad', '+923364216108', '1', 775);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `expense` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `expense`, `description`, `amount`) VALUES
(1, '2019-10-24', 'Fruit Chat', 'For Kashif bhai (GUEST)', 250),
(2, '2019-10-24', 'Roti', 'For Lunch ', 500),
(3, '2019-10-24', 'Mouse', '4 mouses for sublimation machine', 800),
(4, '2019-10-24', 'Keyboard', 'A Keyboard for laptop', 750),
(5, '2019-10-24', 'Juice', '5 Juices for guests', 350),
(6, '2019-10-24', 'Printer', 'For Daniyal Pc', 6500),
(7, '2019-10-24', 'Ice', 'For water', 50),
(8, '2019-10-24', 'Tea', 'For all staf', 540),
(9, '2019-10-24', 'Pepsi', 'For Lunch', 120),
(10, '2019-10-24', 'Easy Load', 'For calling clients', 100),
(11, '2019-10-24', 'Petrol', 'For picking guest', 250),
(12, '2019-10-28', 'Laptop', 'Buy a laptop for printer 2', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `extra_discount`
--

CREATE TABLE `extra_discount` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_discount`
--

INSERT INTO `extra_discount` (`id`, `company_name`, `amount`, `date`) VALUES
(1, 'RJC', 1000, '2019-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `old_balance` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` text NOT NULL,
  `update_date` date NOT NULL,
  `payment` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `company_name`, `order_date`, `sub_total`, `gst`, `discount`, `old_balance`, `net_total`, `paid`, `due`, `payment_type`, `update_date`, `payment`, `order_status`) VALUES
(15, 'SW', '2019-10-06', 1342, 0, 10, 20, 1207.8, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(16, 'CO', '2019-10-06', 1210, 0, 0, 20, 1210, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(17, 'RJC', '2019-10-06', 13026, 0, 0, 20, 13026, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(18, 'LSW', '2019-10-06', 29025, 0, 0, 20, 29025, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(19, 'MID', '2019-10-06', 16370, 0, 0, 20, 16370, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(20, 'WAP', '2019-10-06', 4500, 0, 0, 20, 4500, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(21, 'SW', '2019-10-07', 825, 0, 0, 0, 825, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(22, 'company', '2019-10-07', 624, 0, 0, 25, 624, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(23, 'company', '2019-10-07', 624, 0, 0, 25, 624, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(24, 'Creative Officials', '2019-10-07', 275, 0, 0, 24, 275, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(25, 'creative officials', '2019-10-08', 870, 0, 0, 75, 870, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(26, 'company', '2019-10-08', 495, 0, 0, 70, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(27, 'company', '2019-10-08', 1540, 0, 0, 95, 1540, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(28, 'RJC', '2019-10-08', 3825, 0, 0, 540, 3825, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(29, 'company', '2019-10-08', 2475, 0, 0, 825, 2475, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(30, 'RJC', '2019-10-08', 495, 0, 0, 475, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(31, 'company', '2019-10-08', 275, 0, 0, 95, 275, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(32, 'RJC', '2019-10-08', 495, 0, 0, 75, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(33, 'company', '2019-10-08', 7215, 0, 0, 95, 7215, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(34, 'company', '2019-10-08', 935, 0, 0, 215, 935, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(35, 'RJC', '2019-10-08', 62160, 0, 0, 35, 62160, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(36, 'RJC', '2019-10-08', 605, 0, 0, 56160, 605, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(37, 'RJC', '2019-10-08', 935, 0, 0, 5, 935, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(38, 'company', '2019-10-08', 58, 0, 0, 35, 58, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(39, 'RJC', '2019-10-08', 935, 0, 0, 8, 935, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(40, 'RJC', '2019-10-08', 495, 0, 0, 900, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(41, 'creative officials', '2019-10-08', 616, 0, 0, 95, 616, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(42, 'creative officials', '2019-10-08', 605, 0, 0, 16, 605, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(43, 'company', '2019-10-08', 495, 0, 0, 5, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(44, 'RJC', '2019-10-08', 638, 0, 0, 95, 638, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(45, 'RJC', '2019-10-08', 935, 0, 0, 38, 935, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(46, 'RJC', '2019-10-08', 4590, 0, 0, 35, 4590, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(47, 'RJC', '2019-10-08', 616, 0, 0, 590, 616, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(48, 'RJC', '2019-10-08', 616, 0, 0, 16, 616, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(49, 'creative officials', '2019-10-08', 3825, 0, 0, 600, 3825, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(50, 'company', '2019-10-08', 7975, 0, 0, 825, 7975, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(51, 'creative officials', '2019-10-08', 495, 0, 0, 975, 495, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(52, 'company', '2019-10-08', 9425, 0, 0, 975, 9425, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(53, 'company', '2019-10-08', 9740, 0, 10, 4425, 13191, 600, 1365.25, 'Card', '0000-00-00', 0, ''),
(54, 'company', '2019-10-09', 5000, 850.0000000000001, 10, 3191, 8456, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(55, 'AFZAL JEWLER', '2019-10-09', 2250, 382.5, 0, 0, 2632.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(56, 'IMRAN BOOK SHOP', '2019-10-09', 770, 130.9, 0, 0, 900.9, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(57, 'METRO', '2019-10-09', 1430, 243.10000000000002, 0, 0, 1673.1, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(58, 'creative officials', '2019-10-09', 495, 84.15, 0, 95, 674.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(59, 'creative officials', '2019-10-09', 495, 84.15, 0, 95, 674.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(60, 'creative officials', '2019-10-09', 495, 84.15, 0, 0, 579.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(61, 'AFZAL JEWLER', '2019-10-09', 1485, 252.45000000000002, 0, 133, 1870.45, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(62, 'company', '2019-10-09', 495, 84.15, 0, 56, 635.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(63, 'AFZAL JEWLER', '2019-10-09', 495, 84.15, 0, 70, 649.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(64, 'METRO', '2019-10-09', 605, 102.85000000000001, 0, 73, 780.85, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(65, 'METRO', '2019-10-09', 495, 84.15, 0, 1, 580.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(66, 'creative officials', '2019-10-09', 495, 84.15, 0, 29, 608.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(67, 'IMRAN BOOK SHOP', '2019-10-09', 935, 158.95000000000002, 0, 1, 1094.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(68, 'company', '2019-10-09', 21025, 3574.2500000000005, 0, 0, 24599.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(69, 'RJC', '2019-10-09', 5400, 918.0000000000001, 0, 600, 6918, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(70, 'creative officials', '2019-10-09', 275, 46.75, 0, 8, 329.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(71, 'company', '2019-10-09', 1575, 267.75, 0, 0, 1842.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(72, 'IMRAN BOOK SHOP', '2019-10-09', 6500, 1105, 0, 1, 7606, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(73, 'METRO', '2019-10-09', 825, 140.25, 0, 0, 965.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(74, 'METRO', '2019-10-09', 4500, 765, 0, 0, 5265, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(75, 'METRO', '2019-10-09', 495, 84.15, 0, 0, 579.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(76, 'METRO', '2019-10-09', 2925, 497.25000000000006, 0, 0, 3422.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(77, 'METRO', '2019-10-09', 275, 46.75, 0, 0, 321.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(78, 'METRO', '2019-10-09', 1045, 177.65, 0, 0, 1222.65, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(79, 'METRO', '2019-10-09', 495, 84.15, 0, 23, 602.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(80, 'IMRAN BOOK SHOP', '2019-10-09', 4500, 765, 10, 106, 4844.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(81, 'METRO', '2019-10-09', 600, 102.00000000000001, 0, 2, 704, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(82, 'creative officials', '2019-10-09', 495, 84.15, 0, 8, 587.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(83, 'company', '2019-10-09', 495, 84.15, 10, 43, 564.235, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(84, 'IMRAN BOOK SHOP', '2019-10-09', 975, 165.75, 10, 345, 1371.675, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(85, 'creative officials', '2019-10-09', 495, 84.15, 0, 87, 666.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(86, 'company', '2019-10-09', 1275, 216.75000000000003, 0, 64, 1555.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(87, 'company', '2019-10-09', 1125, 191.25, 0, 56, 1372.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(88, 'company', '2019-10-09', 2925, 497.25000000000006, 0, 72, 3494.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(89, 'METRO', '2019-10-09', 660, 112.2, 0, 2, 774.2, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(90, 'METRO', '2019-10-09', 1950, 331.5, 0, 2, 2283.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(91, 'company', '2019-10-09', 385, 65.45, 0, 94, 544.45, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(92, 'creative officials', '2019-10-09', 750, 127.50000000000001, 0, 66, 943.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(93, 'creative officials', '2019-10-09', 935, 158.95000000000002, 0, 44, 1137.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(94, 'creative officials', '2019-10-09', 495, 84.15, 0, 38, 617.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(95, 'company', '2019-10-09', 1350, 229.50000000000003, 0, 44, 1623.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(96, 'creative officials', '2019-10-09', 1500, 255.00000000000003, 0, 17, 1772, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(97, 'METRO', '2019-10-09', 2925, 497.25000000000006, 0, 284, 3706.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(98, 'creative officials', '2019-10-09', 2475, 420.75000000000006, 0, 72, 2967.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(99, 'METRO', '2019-10-09', 5550, 943.5000000000001, 0, 6, 6499.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(100, 'METRO', '2019-10-11', 2475, 420.75000000000006, 0, 500, 3395.75, 600, 1365.25, 'Card', '0000-00-00', 0, ''),
(101, 'KAHSIF JEWLERS', '2019-10-15', 2002, 340.34000000000003, 10, 0, 2108.106, 600, 1365.25, 'Draft', '0000-00-00', 0, ''),
(102, 'AMJAD ', '2019-10-15', 20745, 3526.65, 10, 0, 21844.485, 600, 1365.25, 'Cheque', '0000-00-00', 0, ''),
(103, 'company', '2019-10-15', 1100, 187, 0, 24, 1311, 600, 1365.25, 'Cheque', '0000-00-00', 0, ''),
(104, 'company', '2019-10-15', 1430, 243.10000000000002, 10, 311, 1816.79, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(105, 'company', '2019-10-15', 495, 84.15, 0, 1817, 2396.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(106, 'company', '2019-10-15', 880, 149.60000000000002, 10, 396, 1322.6399999999999, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(107, 'AFZAL JEWLER', '2019-10-15', 495, 84.15, 0, 49, 628.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(108, 'AFZAL JEWLER', '2019-10-15', 935, 158.95000000000002, 0, 28, 1121.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(109, 'RJC', '2019-10-15', 605, 102.85000000000001, 0, 293, 1000.85, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(110, 'KAHSIF JEWLERS', '2019-10-15', 1595, 271.15000000000003, 0, 108, 1974.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(111, 'creative officials', '2019-10-15', 495, 84.15, 0, 468, 1047.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(112, 'AMJAD ', '2019-10-15', 605, 102.85000000000001, 0, 1844, 2551.85, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(113, 'company', '2019-10-15', 495, 84.15, 0, 323, 902.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(114, 'creative officials', '2019-10-15', 495, 84.15, 0, 47, 626.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(115, 'company', '2019-10-15', 495, 84.15, 0, 2, 581.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(116, 'company', '2019-10-15', 495, 84.15, 0, 81, 660.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(117, 'AMJAD ', '2019-10-15', 495, 84.15, 0, 552, 1131.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(118, 'RJC', '2019-10-15', 5445, 925.6500000000001, 0, 1, 6371.65, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(119, 'company', '2019-10-15', 935, 158.95000000000002, 0, 10, 1103.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(120, 'company', '2019-10-15', 935, 158.95000000000002, 0, 104, 1197.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(121, 'creative officials', '2019-10-15', 495, 84.15, 0, 26, 605.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(122, 'creative officials', '2019-10-15', 975, 165.75, 0, 5, 1145.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(123, 'company', '2019-10-16', 605, 102.85000000000001, 0, 198, 905.85, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(124, 'company', '2019-10-16', 495, 84.15, 0, 6, 585.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(125, 'AMJAD ', '2019-10-16', 1275, 216.75000000000003, 0, 131, 1622.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(126, 'AFZAL JEWLER', '2019-10-16', 1125, 191.25, 0, 22, 1338.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(127, 'METRO', '2019-10-16', 675, 114.75000000000001, 0, 396, 1185.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(128, 'IMRAN BOOK SHOP', '2019-10-16', 605, 102.85000000000001, 0, 72, 779.85, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(129, 'KAHSIF JEWLERS', '2019-10-16', 495, 84.15, 0, 74, 653.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(130, 'company', '2019-10-16', 495, 84.15, 0, 85, 664.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(131, 'RJC', '2019-10-16', 975, 165.75, 0, 372, 1512.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(132, 'creative officials', '2019-10-16', 495, 84.15, 0, 146, 725.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(133, 'METRO', '2019-10-16', 630, 107.10000000000001, 0, 86, 823.1, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(134, 'creative officials', '2019-10-16', 935, 158.95000000000002, 0, 25, 1118.95, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(135, 'AFZAL JEWLER', '2019-10-16', 825, 140.25, 0, 38, 1003.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(136, 'RJC', '2019-10-16', 825, 140.25, 0, 13, 978.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(137, 'creative officials', '2019-10-16', 825, 140.25, 0, 119, 1084.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(138, 'company', '2019-10-16', 495, 84.15, 0, 64, 643.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(139, 'company', '2019-10-16', 675, 114.75000000000001, 0, 43, 832.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(140, 'creative officials', '2019-10-16', 1650, 280.5, 0, 84, 2014.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(141, 'RJC', '2019-10-16', 525, 89.25, 0, 78, 692.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(142, 'creative officials', '2019-10-16', 675, 114.75000000000001, 0, 15, 804.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(143, 'RJC', '2019-10-17', 495, 84.15, 0, 42, 621.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(144, 'company', '2019-10-17', 975, 165.75, 0, 33, 1173.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(145, 'AMJAD ', '2019-10-17', 825, 140.25, 0, 23, 988.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(146, 'company', '2019-10-17', 1275, 216.75000000000003, 0, 174, 1665.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(147, 'KAHSIF JEWLERS', '2019-10-17', 1650, 280.5, 0, 53, 1983.5, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(148, 'company', '2019-10-17', 3825, 650.25, 0, 166, 4641.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(149, 'RJC', '2019-10-18', 495, 84.15, 0, 21, 600.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(150, 'company', '2019-10-20', 825, 140.25, 17, 641, 1466, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(151, 'RJC', '2019-10-20', 495, 84.15, 0, 0, 579.15, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(152, 'METRO', '2019-10-20', 825, 140.25, 0, 23, 988.25, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(153, 'KAHSIF JEWLERS', '2019-10-20', 1800, 306, 0, 484, 2590, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(154, 'COMPANY', '2019-10-22', 1170, 198.9, 0, 0, 1368.9, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(155, 'creative officials', '2019-10-22', 1275, 216.75000000000003, 0, 5, 1496.75, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(156, 'METRO', '2019-10-23', 2100, 357, 0, 245, 2702, 600, 1365.25, 'Cash', '0000-00-00', 0, ''),
(159, 'METRO', '2019-11-02', 100, 17, 0, 1617, 3117, 600, 1365.25, 'Cash', '2019-11-02', 0, 'Pending'),
(160, 'PTCL', '2019-10-26', 1000, 170, 0, 1287, 1287, 600, 1365.25, 'Cash', '2019-10-28', 0, 'Pending'),
(161, 'RJC', '2019-10-30', 275, 46.75, 0, 2500, 2821.75, 600, 1365.25, 'Cash', '0000-00-00', 0, 'Pending'),
(162, 'RJC', '2019-11-02', 2905, 493.85, 0, 21, 6020.85, 600, 1365.25, 'Cash', '2019-11-02', 0, 'Pending'),
(163, 'RJC', '2019-11-02', 1800, 306, 0, 2127, 2127, 600, 1365.25, 'Cash', '2019-11-02', 0, 'Pending'),
(164, 'company', '2019-11-12', 825, 140.25, 0, 369, 1334.25, 600, 1365.25, 'Cash', '0000-00-00', 0, 'Pending'),
(165, 'SOFTWARE WEB', '2019-11-17', 2775, 471.75000000000006, 17, 3000, 5775, 600, 1365.25, 'Cash', '0000-00-00', 0, 'Pending'),
(166, 'company', '2019-11-20', 825, 140.25, 0, 1000, 1965.25, 1100, 865.25, 'Cash', '0000-00-00', 0, 'Pending');

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
(186, 156, 'Shirt Back Name', 'desc2', 'Digital Printing', 65, 15),
(192, 160, 'Left Shirt Arm Logo', 'description', 'Digital Printing', 5, 100),
(193, 160, 'Short Left Logo', 'description2', 'Laser Printing', 100, 5),
(194, 161, 'Left Shirt Arm Logo', 'desc2', 'Sublimation', 55, 5),
(196, 159, 'Shirt Back ', 'desc2', 'Laser Printing', 50, 1),
(207, 163, 'Trouser Right Player Name', 'dadff', 'blue Printing', 55, 15),
(208, 163, 'Shirt Back Logo And', 'fdfs', 'Laser Printing', 65, 15),
(209, 164, 'Trouser Right Logo', 'djkbkj', 'Sublimation', 55, 15),
(210, 165, 'Shirt Back Logo', 'description', 'Sublimation', 95, 15),
(211, 165, 'Shirt Back Name', 'descriptipn 2', 'Flexography', 90, 15),
(212, 166, 'Left Shirt Arm Logo', '12', 'Screen Printing', 15, 55);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `order_net_total` int(11) NOT NULL,
  `advance` int(11) NOT NULL,
  `order_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `company_name`, `order_no`, `payment`, `date`, `order_net_total`, `advance`, `order_due`) VALUES
(1, 'METRO', 0, '245', '2019-10-22', 0, 0, 0),
(2, 'RJC', 0, '45', '2019-10-22', 0, 0, 0),
(3, 'RJC', 0, '34', '2019-10-22', 0, 0, 0),
(4, 'METRO', 0, '100', '2019-10-23', 0, 0, 0),
(5, 'METRO', 0, '1500', '2019-10-28', 0, 0, 0),
(6, 'RJC', 0, '1500', '2019-10-29', 0, 0, 0),
(7, 'COMPANY', 164, '34', '2019-11-12', 0, 0, 0),
(8, 'COMPANY', 166, '100', '2019-11-20', 0, 0, 0),
(9, 'COMPANY', 166, '500', '2019-11-20', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `Status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `product_name`, `Status`) VALUES
(1, 'Left Shirt Arm Logo', '1'),
(2, 'Right Shirt Arm Logo', '1'),
(3, 'Shirt Back Logo', '1'),
(4, 'Shirt Back Name', '1'),
(6, 'Trouser Left Logo', '1'),
(7, 'Trouser Right Logo', '1'),
(8, 'Short Left Logo', '1'),
(9, 'Short Right Logo', '1'),
(10, 'Shirt Front Logo', '1'),
(11, 'Cap Front Logo', '1'),
(12, 'Trouser Left Player Name', '1'),
(13, 'Shirt Front + Back Logo', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `quote_no` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `quote_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`quote_no`, `company_name`, `quote_date`, `sub_total`, `gst`, `discount`, `net_total`) VALUES
(1, 'company', '2019-10-18', 2475, 420.75000000000006, 0, 2895.75),
(2, 'company', '2019-10-18', 2475, 420.75000000000006, 0, 2895.75),
(3, 'creative officials', '2019-10-18', 2475, 420.75000000000006, 0, 2895.75),
(4, 'company', '2019-10-18', 1275, 216.75000000000003, 0, 1491.75),
(5, 'RJC', '2019-10-18', 3150, 535.5, 0, 3685.5),
(6, 'AMJAD ', '2019-10-18', 11050, 1878.5000000000002, 0, 12928.5),
(7, 'company', '2019-10-27', 40, 6.800000000000001, 0, 46.8),
(8, 'RJC', '2019-10-27', 8775, 1491.75, 0, 10266.75),
(9, 'RJC', '2019-10-27', 8775, 1491.75, 0, 10266.75);

-- --------------------------------------------------------

--
-- Table structure for table `quote_details`
--

CREATE TABLE `quote_details` (
  `id` int(11) NOT NULL,
  `quote_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_details`
--

INSERT INTO `quote_details` (`id`, `quote_no`, `product_name`, `product_description`, `category_name`, `price`, `qty`) VALUES
(1, 1, '', '', '0000-00-00', 55, 45),
(2, 2, '', '', '0000-00-00', 55, 45),
(3, 3, '', '', '0000-00-00', 55, 45),
(4, 4, '4', '', '0000-00-00', 85, 15),
(5, 5, 'Shirt Back Name', '', '0000-00-00', 55, 45),
(6, 5, 'Left Shirt Arm Logo', '', '0000-00-00', 45, 15),
(7, 6, 'Shirt Back Name', '', '0000-00-00', 55, 85),
(8, 6, 'Shirt Back Logo + Name', '', '0000-00-00', 75, 85),
(9, 7, 'Left Shirt Arm Logo', '', '0000-00-00', 4, 5),
(10, 7, 'Cap Front Logo', '', '0000-00-00', 5, 4),
(11, 9, 'Shirt Back Logo', 'description', '0000-00-00', 55, 45),
(12, 9, 'Shirt Front Logo', 'description 2', '0000-00-00', 65, 45),
(13, 9, 'Cap Front Logo', 'description 3', '0000-00-00', 75, 45);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` int(11) NOT NULL,
  `p_code` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `p_code`, `product_name`, `unit`, `quantity`) VALUES
(1, 25415, 'Green Cloth', 'Kilogram (KG)', 50),
(9, 41525, 'Yellow Cloth', 'Meter (M)', 35);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products_detail`
--

CREATE TABLE `stock_products_detail` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `p_code` int(11) NOT NULL,
  `purchaser` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_products_detail`
--

INSERT INTO `stock_products_detail` (`id`, `date`, `p_code`, `purchaser`, `product_name`, `unit`, `quantity`, `price`) VALUES
(1, '2019-12-09', 25415, 'Rehman Ali', 'Green Cloth', 'Kilogram (KG)', 50, 45),
(9, '2019-12-09', 41525, 'Rehman Ali', 'Yellow Cloth', 'Meter (M)', 35, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `register_date`, `last_login`, `notes`) VALUES
(1, 'jazib', 'jazib.ahmad147@gmail.com', '$2y$08$06DwjwokBekS6BFncb0yxuc6J997smZ8nrVg2Y1yh2SSfe.8kOVSO', '2019-09-27', '2019-12-22 10:12:24', ''),
(2, 'Daniyal Masood', 'amirprinters305@gmail.com', '$2y$08$wdbWD0.uMwrMfSHh.1HZg.csvxh0VYrOfS0LxPLhqOen9Wnc7lTyW', '2019-10-19', '0000-00-00 00:00:00', ''),
(3, 'Amir Farooq', 'af_printers@yahoo.com', '$2y$08$xvFS/m0ANiRIFLjj/bkMIONINm2Fc5/Gcl7hDIFScCtc5u87DFBsS', '2019-10-19', '0000-00-00 00:00:00', ''),
(4, 'Faizan Umer', 'faizanumer3@gmail.com', '$2y$08$Av7kCQDnZ2Q6lxCcUvkI1exZnhPnMJpBFmnhCYbCZLo.IwojxS.bO', '2019-10-19', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_discount`
--
ALTER TABLE `extra_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`quote_no`);

--
-- Indexes for table `quote_details`
--
ALTER TABLE `quote_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_no` (`quote_no`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_products_detail`
--
ALTER TABLE `stock_products_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `extra_discount`
--
ALTER TABLE `extra_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `quote_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quote_details`
--
ALTER TABLE `quote_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_products_detail`
--
ALTER TABLE `stock_products_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `quote_details`
--
ALTER TABLE `quote_details`
  ADD CONSTRAINT `quote_details_ibfk_1` FOREIGN KEY (`quote_no`) REFERENCES `quote` (`quote_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
