-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 01:35 PM
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
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(6) UNSIGNED NOT NULL,
  `campaignId` int(6) UNSIGNED NOT NULL,
  `campaignTitle` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `materials` varchar(255) NOT NULL,
  `bookAmount` varchar(255) DEFAULT NULL,
  `copyAmount` varchar(255) DEFAULT NULL,
  `penAmount` varchar(255) DEFAULT NULL,
  `bagAmount` varchar(255) DEFAULT NULL,
  `shoesAmount` varchar(255) DEFAULT NULL,
  `otherAmount` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `collectionMethod` varchar(255) DEFAULT NULL,
  `donationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `donationStatus` varchar(255) DEFAULT NULL,
  `beneficiaries` varchar(255) DEFAULT NULL,
  `beneficiaries_location` varchar(255) DEFAULT NULL,
  `beneficiaries_phone` varchar(255) DEFAULT NULL,
  `campaign_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `campaignId`, `campaignTitle`, `name`, `email`, `location`, `materials`, `bookAmount`, `copyAmount`, `penAmount`, `bagAmount`, `shoesAmount`, `otherAmount`, `description`, `collectionMethod`, `donationDate`, `status`, `username`, `donationStatus`, `beneficiaries`, `beneficiaries_location`, `beneficiaries_phone`, `campaign_end_date`) VALUES
(13, 6, 'Education starts with Materials', 'Radhika Shrestha', 'Radhika@gmail.com', 'New Baneshwor, Kathmandu', 'Pencil/Pen, Bags', '', '', '1-5 boxes', '6-10 pieces', '', '', '', 'SELF', '2023-06-26 20:11:43', 'Not Collected', NULL, 'Donated', 'hjjhhjjh', 'hjhghh', '99888787', '2023-07-05'),
(46, 23, 'Gift of Knowledge', 'Riya Sharma', 'Riya@gmail.com', 'Jawalakhel, Lalitpur', 'Copy, Shoes', '', '11-20 dozens', '', '', '11-20 pairs', '', '', 'SELF', '2023-07-19 09:49:15', 'Not Collected', 'riya', 'Donated', NULL, NULL, NULL, NULL),
(47, 23, 'Gift of Knowledge', 'Liza K.C', 'liza@gmail.com', 'Samakhushi, Kathmandu', 'Bags, Shoes', '', '', '', 'more than 50 pieces', '6-10 pairs', '', '', 'SELF', '2023-07-19 09:50:30', 'Collected', 'Liza', 'Donated', NULL, NULL, NULL, NULL),
(91, 29, 'Books for Bright Minds', 'Sirpa Hada', 'hadasirpa@gmail.com', 'Sorakhutte, Kathmandu', 'Pencil/Pen, Bags', '', '', '6-10 boxes', '6-10 pieces', '', '', '', 'SELF', '2023-08-30 21:20:50', 'Collected', 'sirpa', 'Not Donated', 'Sigma Secondary High School', 'Khusibu, Kathmandu', '01-4585848', '2023-10-18'),
(92, 33, 'Colorful Horizons', 'sirpa hada', 'hadasirpa@gmail.com', 'New Baneshwor, Kathmandu', 'Bags, Shoes', '', '', '', '6-10 pieces', '11-20 pairs', '', '', 'PICK', '2023-09-06 07:23:42', 'Collected', 'sirpa', 'Not Donated', 'Manaslu High School', 'Nayabazar, Kathmandu', '01-4465484', '2023-11-29');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
