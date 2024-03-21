-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:02 PM
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
-- Database: `edu_camp`
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
(6, 'uploads/school.jpg', 'Education starts with Materials', 'Donate stationary for students', 'Merryland Public Higher Secondary School', 'Sadobato,Lalitpur', '01-4358427', '2023-08-11', 'Ended', 'Donated'),
(23, 'uploads/book.jpg', 'Gift of Knowledge', 'We believe in the transformative power of books. Our campaign aims to spread the joy of reading and empower communities by collecting and distributing donated books. By providing access to literature, we hope to nurture a love for learning, enriching the lives of countless individuals. Join us in this noble endeavour as we bridge the gap to a brighter future, one book at a time. Your contribution will create a lasting impact, empowering minds and fostering a culture of education for future generations.', 'Kathmandu Model School', 'Nayabazar, Kathmandu', '01-4356620', '2023-12-15', 'Ongoing', 'Donated'),
(29, 'uploads/bd.jpg', 'Books for Bright Minds', 'Join us in our \"Books for Bright Minds\" campaign to provide underprivileged children with access to quality educational books. We believe that every child deserves the chance to learn and explore the world through reading. Your donations will directly contribute to building a diverse library of books, ranging from classic literature to STEM resources, fostering a love for learning in young minds. Let\'s empower children with the gift of knowledge and imagination!', 'Sigma Secondary High School', 'Khusibu, Kathmandu', '01-4585848', '2023-10-18', 'Ongoing', 'Not Donated'),
(33, 'uploads/1.jpg', 'Colorful Horizons', 'Unleash the power of colors and creativity by participating in the \"Colorful Horizons\" campaign. We\'re collecting a rainbow of stationery supplies - markers, colored pencils, sketchbooks, and more - to distribute to schools in need. By enabling children to express themselves artistically, we\'re fostering a love for learning and helping them see education as a vibrant journey. Let\'s paint a brighter future for these young minds, one stationery kit at a time.', 'Manaslu High School', 'Nayabazar, Kathmandu', '01-4465484', '2023-11-29', 'Ongoing', 'Not Donated');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
