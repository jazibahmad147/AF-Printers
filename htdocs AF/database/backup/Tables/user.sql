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
(1, 'jazib', 'jazib@gmail.com', '$2y$08$06DwjwokBekS6BFncb0yxuc6J997smZ8nrVg2Y1yh2SSfe.8kOVSO', '2019-09-27', '2019-10-23 05:10:55', ''),
(2, 'Daniyal Masood', 'amirprinters305@gmail.com', '$2y$08$wdbWD0.uMwrMfSHh.1HZg.csvxh0VYrOfS0LxPLhqOen9Wnc7lTyW', '2019-10-19', '0000-00-00 00:00:00', ''),
(3, 'Amir Farooq', 'af_printers@yahoo.com', '$2y$08$xvFS/m0ANiRIFLjj/bkMIONINm2Fc5/Gcl7hDIFScCtc5u87DFBsS', '2019-10-19', '0000-00-00 00:00:00', ''),
(4, 'Faizan Umer', 'faizanumer3@gmail.com', '$2y$08$Av7kCQDnZ2Q6lxCcUvkI1exZnhPnMJpBFmnhCYbCZLo.IwojxS.bO', '2019-10-19', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
