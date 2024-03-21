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
-- Database: `health_camp`
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
(1, 'uploads/medial.jpg', 'Healthy Heart, Happy Life', 'Join us in the \"Healthy Heart, Happy Life\" campaign and take proactive steps towards better heart health! Heart disease is a leading cause of illness and death worldwide, but many risk factors are manageable with simple lifestyle changes. Our campaign aims to raise awareness about the importance of cardiovascular health and encourage individuals to adopt heart-healthy habits. Through educational workshops, fitness challenges, and nutritional guidance, we empower you to make informed choices that can lead to a longer, happier life. Let\'s work together to keep our hearts strong and full of life!', 'Irkhu Health Post', 'Chautara Sangachok Gadhi, Sindhupalchowk', '01-4385743', '2023-10-10', 'Ended', 'Donated'),
(2, 'uploads/women.jpg', 'Empower Women\'s Health: A Path to Wellness', 'Join our campaign to support women\'s health and wellness. We aim to make a positive impact on the lives of women by addressing their unique healthcare needs and promoting overall well-being. Together, we can make a difference in the following ways:\r\n\r\nCampaign Purpose:\r\n\r\nRaise Awareness: Increase awareness about women\'s health issues and the importance of preventive care.\r\n1. Access to Healthcare: Improve access to quality healthcare services for women, especially those in underserved communities.\r\n2. Education: Provide educational resources on women\'s health, including reproductive health, mental health, and nutrition.\r\n3. Research: Support research initiatives to better understand and address women\'s health concerns.\r\nSupport for Survivors: Offer support to survivors of domestic violence, sexual assault, and other traumas affecting women.\r\n4. Mental Health Advocacy: Promote mental health awareness and resources for women dealing with stress, anxiety, and depression.\r\n5. Wellness Programs: Implement wellness programs, fitness activities, and nutrition workshops to empower women to lead healthier lives.\r\n6. Empowerment: Empower women to take control of their health and make informed decisions about their well-being.\r\n7. Community Building: Create a supportive community where women can share their experiences, challenges, and successes.\r\n8. Advocacy: Advocate for policies that protect and promote women\'s health and reproductive rights.\r\n\r\nJoin us in our mission to uplift women\'s health and ensure that every woman has the opportunity to lead a healthy, fulfilling life. Together, we can make a lasting impact on women\'s well-being and create a brighter, healthier future for all.', 'Midwifery Society of Nepal', 'Kumarimarg, Kathmandu', '01-4537281', '2023-10-29', 'Ongoing', 'Donated');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
