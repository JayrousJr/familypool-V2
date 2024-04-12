-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 01:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u969269024_familypool`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_tb`
--

CREATE TABLE `applicant_tb` (
  `ID` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `streetAddress` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` int(12) NOT NULL,
  `birthdate` date NOT NULL,
  `workHour` int(200) NOT NULL,
  `ApplicationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_tb`
--

INSERT INTO `applicant_tb` (`ID`, `fname`, `sname`, `streetAddress`, `city`, `state`, `zip`, `email`, `phone`, `birthdate`, `workHour`, `ApplicationDate`) VALUES
(1, 'joshua', 'jayrous', 'nyasaka', 'Mwanza', 'Tanzania', '5537', 'joshuajayrous@gmail.com', 754219539, '2020-03-04', 70, '2022-08-09 12:03:24'),
(2, 'joshua', 'jayrous', 'nyasaka', 'Mwanza', 'Tanzania', '5537', 'joshuajayrous@gmail.com', 754219539, '0004-03-03', 70, '2022-08-09 12:03:52'),
(3, 'akimi', 'elikana', 'nyasaka', 'Mwanza', 'Tanzania', '5537', 'joshuajayrous@gmail.com', 754219539, '2000-02-03', 90, '2022-08-09 13:40:24'),
(4, 'maseduani', 'malisha', '217 ln', 'manchester', 'manchester', '1256', 'sylvia@gmail.com', 754219539, '1999-12-09', 120, '2022-08-09 13:42:38'),
(5, 'maseduani', 'malisha', '217 ln', 'manchester', 'manchester', '1256', 'sylvia@gmail.com', 754219539, '1999-12-09', 120, '2022-08-09 13:43:05'),
(6, 'eliakana', 'manema', 'Doncaster Lane', 'Michigan', 'Tennessee', '1257 MS', 'doncasterlane.now@yahoo.com', 1234567890, '1989-12-08', 149, '2022-08-09 14:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_tb`
--
ALTER TABLE `applicant_tb`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_tb`
--
ALTER TABLE `applicant_tb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
