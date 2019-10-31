-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 05:08 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `date_created`, `username`, `password`, `first_name`, `last_name`) VALUES
(1, '0000-00-00', 'anthony@gmail.com', '$2y$10$dl9XP8HCi2WwDIY5MBSfqOydDgQHlrEXLk3R0UIrhvLDmEPu6xWh6', 'Anthony', 'Buentipo');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `latitude` int(20) NOT NULL,
  `longitude` int(20) NOT NULL,
  `respondent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `date_created`, `category`, `latitude`, `longitude`, `respondent`) VALUES
(1, '10/30/2019 22:10:03', 'Bus', 12, 10, ''),
(2, '10/30/2019 22:10:09', 'Taxi', 11, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `date_created`, `hospital`, `username`, `password`) VALUES
(1, '10/30/2019 22:10:13', 'East Avenue Medical Center', 'eamc@gmail.com', '$2y$10$tbEyzTSUTfRT/eBew3YXauDFQIMth2XH849jzePNqO64HXSfqmb/O'),
(2, '10/30/2019 22:10:03', 'Quezon City General Hospital', 'qcgh@gmail.com', '$2y$10$vEFYnNX659Alr2mHn4TrEeqlXtHz7/9R0/BTK33SwHDBJFDPv2jqi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
