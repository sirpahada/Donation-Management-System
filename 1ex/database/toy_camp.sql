-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:04 PM
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
-- Database: `toy_camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `campaignImageURL` varchar(255) NOT NULL,
  `campaignTitle` varchar(255) NOT NULL,
  `campaignDescription` text NOT NULL,
  `beneficiaries` varchar(255) DEFAULT NULL,
  `beneficiariesLocation` varchar(255) DEFAULT NULL,
  `beneficiariesPhone` varchar(20) DEFAULT NULL,
  `campaignEndDate` date DEFAULT NULL,
  `campaignStatus` varchar(20) DEFAULT NULL,
  `donationStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaignImageURL`, `campaignTitle`, `campaignDescription`, `beneficiaries`, `beneficiariesLocation`, `beneficiariesPhone`, `campaignEndDate`, `campaignStatus`, `donationStatus`) VALUES
(1, 'uploads/toys.jpg', 'Toys for Tots!', '\"Toys for Tots\" is a compassionate campaign with the profound purpose of brightening the lives of less fortunate children during the holiday season. Our mission is to collect new, unwrapped toys and distribute them to kids who might not otherwise experience the magic of the holidays. Through the generosity of individuals, organizations, and communities, we aim to provide a sense of hope and joy to countless youngsters. Our distribution method is meticulous and thoughtful, ensuring that each child receives a suitable and cherished gift. We collaborate with local social service agencies and community organizations to identify those in need and work tirelessly to ensure that no child is left without a present during the holidays. With your support, we can make this season truly special for children, giving them the chance to create cherished memories and experience the spirit of giving and love. Join us in making a difference in the lives of these little ones, one toy at a time.', 'Mission Himalaya\'s Eco and Farm Orphanage', 'Sankhu, Kathmandu', '01-4637822', '2023-11-30', 'Ongoing', 'Not Donated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
