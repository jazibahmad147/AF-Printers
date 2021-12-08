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
(1, 'creative officials', 'Ahsan Salman', '3364216108', '1', 97),
(3, 'company', 'client@gmail.com', '+964564874658', '1', 369),
(5, 'RJC', 'Akmal Ahmad', '+92336585485', '1', 0),
(7, 'METRO', 'Faraz', '+26665865454854', '1', 602),
(8, 'IMRAN BOOK SHOP', 'Imran', '+23335456456465', '1', 80),
(9, 'AFZAL JEWLER', 'Afzal Ahmad', '+925565586465468', '1', 3),
(10, 'KAHSIF JEWLERS', 'kahsif ahmad', '8556554546435', '1', 590),
(11, 'AMJAD ', 'amjad ahmad', '566656876565', '1', 250),
(12, 'KHAN', 'khuram khan', '', '1', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
