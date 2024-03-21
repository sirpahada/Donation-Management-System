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
-- Database: `cloth_camp`
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
(1, 'uploads/c1.jpg', 'Clothes for a Cause', 'Our \'Clothes for a Cause\' campaign recognizes that clothing can be more than just fabric; it\'s a source of empowerment. We seek to collect gently used clothing items and provide them to individuals facing challenging circumstances, including those transitioning out of homelessness, survivors of domestic abuse, and low-income families. Your contributions are more than just clothes; they\'re a pathway to self-esteem, confidence, and empowerment. When someone receives clean, well-fitting clothing, it can help them regain their dignity and take positive steps forward in their lives.', 'Cloth Bank', 'Anamnagar, Kathmandu', '', '2023-10-28', 'Ongoing', 'Donated');

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
