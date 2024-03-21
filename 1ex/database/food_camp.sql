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
-- Database: `food_camp`
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
(1, 'uploads/food-bank.jpg', 'Nourish Neighbors: Share the Joy of Giving', 'Our \'Nourish Neighbors\' campaign is a heartfelt initiative dedicated to helping those in our community facing food insecurity. We believe that no one should ever go to bed hungry, and with your support, we can make a significant impact. Together, we aim to collect non-perishable food items, essential groceries, and funds to provide nutritious meals to families and individuals in need. Your contribution will be a lifeline for those facing food scarcity, ensuring they can enjoy nourishing meals and a brighter future. Join us in spreading the joy of giving and making our community a place where no one has to worry about where their next meal will come from.', 'Families in need', 'Kathmandu Valley', '9849918371', '2023-10-22', 'Ongoing', 'Donated');

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
