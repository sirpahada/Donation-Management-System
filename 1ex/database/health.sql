-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `campaignId` int(6) DEFAULT NULL,
  `campaignTitle` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `health` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `collectionMethod` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `donationStatus` varchar(255) DEFAULT NULL,
  `donationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `beneficiaries` varchar(255) DEFAULT NULL,
  `beneficiaries_location` varchar(255) DEFAULT NULL,
  `beneficiaries_phone` varchar(255) DEFAULT NULL,
  `campaign_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `campaignId`, `campaignTitle`, `name`, `email`, `location`, `health`, `amount`, `description`, `collectionMethod`, `username`, `status`, `donationStatus`, `donationDate`, `beneficiaries`, `beneficiaries_location`, `beneficiaries_phone`, `campaign_end_date`) VALUES
(26, 2, 'Empower Women\'s Health: A Path to Wellness', 'Sirpa Hada', 'hadasirpa@gmail.com', 'Samakhushi, Kathmandu', 'Preventive Malaria Medicine', 'more than 100 people', '', 'PICK', 'sirpa', 'Collected', 'Donated', '2023-10-11 11:37:38', 'Midwifery Society of Nepal', 'Kumarimarg, Kathmandu', '01-4537281', '2023-10-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
