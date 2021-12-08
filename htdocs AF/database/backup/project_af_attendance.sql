-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 02:09 PM
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
-- Database: `project_af_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `extra_hours` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `name`, `status`, `extra_hours`, `bonus`) VALUES
(46, '2019-12-01', 'Akmal Ahmad', 'Present', 0, 0),
(47, '2019-12-02', 'Akmal Ahmad', 'Present', 0, 50),
(48, '2019-12-03', 'Akmal Ahmad', 'Half-Day', 0, 0),
(49, '2019-12-04', 'Akmal Ahmad', 'Absent', 0, 0),
(50, '2019-12-05', 'Akmal Ahmad', 'Present', 2, 0),
(51, '2019-12-01', 'Waleed Latif', 'Present', 0, 0),
(52, '2019-12-02', 'Waleed Latif', 'Application', 0, 0),
(53, '2019-12-03', 'Waleed Latif', 'Present', 0, 100),
(54, '2019-12-04', 'Waleed Latif', 'Present', 2, 0),
(55, '2019-12-05', 'Waleed Latif', 'Present', 0, 0),
(56, '2019-12-01', 'M. Kashif', 'Present', 0, 0),
(57, '2019-12-02', 'M. Kashif', 'Present', 2, 0),
(58, '2019-12-03', 'M. Kashif', 'Absent', 0, 0),
(59, '2019-12-04', 'M. Kashif', 'Present', 0, 0),
(60, '2019-12-05', 'M. Kashif', 'Absent', 0, 0),
(61, '2019-12-06', 'Akmal Ahmad', 'Present', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `working_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `number`, `salary`, `working_hours`) VALUES
(9, 'Akmal Ahmad', 'akmal@gmail.com', '+92336525285', 15000, 8),
(10, 'Waleed Latif', 'waleed@hotmail.com', '+92336544848', 13500, 8),
(11, 'M. Kashif', 'kashif123@yahoo.com', '92336584848', 16500, 8);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `total_presents` int(11) NOT NULL,
  `total_half_days` int(11) NOT NULL,
  `total_applications` int(11) NOT NULL,
  `total_absents` int(11) NOT NULL,
  `total_bonus` int(11) NOT NULL,
  `total_over_time` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
