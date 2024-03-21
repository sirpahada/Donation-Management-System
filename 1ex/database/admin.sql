-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 01:34 PM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_id`, `admin_password`, `email`, `phone_number`, `fullname`, `position`, `address`, `profile_picture`) VALUES
(1, 'Manasvi01', '$2y$10$VICNShz5f/vgzzCdaIO1gefK4PIBu4E8rOACJhdt5Rj7Z9KZyvNCy', 'manasvilamichhane@gmail.com', '986046004', 'Manasvi Lamichhane', 'Project Manager', 'Katyanimandir, Kathmandu', 'uploads/vission.jpg'),
(2, 'RamTh', '$2y$10$WMcmzVu7HzHXEY5GWZPwp.A1Hb7rMGtrwdlGqK7OjOZG7Rcfk5y3q', 'Ram@gmail.com', '9849917151', 'Ram Thapa', 'Human Resource Manager', NULL, NULL),
(3, 'RiyaShr', '$2y$10$uX5qLk0FquLaXGL2NdMeN.BULsiwbYzeDYBy8NekiGUdcQqKCJMGu', 'riya@gmail.com', '9841227661', 'Riya Shrestha', 'Project Manager', NULL, NULL),
(4, 'Sarina', '$2y$10$JL0dBt8G5PBy0LG9QDHDS.7.rQ/iKz112foSV44sA4evkzjpEju1q', 'sarina@gmail.com', '9849991221', 'Sarina Baidya', 'Receptionist', NULL, NULL),
(5, 'Shreyash', '$2y$10$bAVBbmIS/7CqHIrqL.2DdOlG/ePrdDVtPnKiR38xEqM6HIFjasxrq', 'shreyash@gmail.com', '9849384931', 'Shreyash Singh', 'Administrator', NULL, NULL),
(6, 'sabrina', '$2y$10$7JMrnvRteISbUu3Y.VWFzuTgQY8VcsvUCnIWQC1htGT3W02BwADue', 'sabrina@gmail.com', '9849492211', 'Sabrina Rana', 'Human Resource Manager', 'Kumaripati, Lalitpur', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
