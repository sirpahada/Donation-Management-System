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
-- Database: `donor`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_table`
--

CREATE TABLE `donor_table` (
  `id` int(11) NOT NULL,
  `donor_id` varchar(255) NOT NULL,
  `donor_password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_table`
--

INSERT INTO `donor_table` (`id`, `donor_id`, `donor_password`, `fullname`, `location`, `email`, `phone_number`, `profile_picture`) VALUES
(1, 'Rakesh', '$2y$10$dpAP7hlJItytXoYPUi5JEOtciUrc3hW/gOW0skzfg9QJjBClMmaom', 'Rakesh Shrestha', 'New Baneshwor, Kathmandu', 'rakesh@gmail.com', '9849492211', 'uploads/man.png'),
(2, 'radhika', '$2y$10$rpr9vJo45eooL.PyDZ7wFu1nD9H/nyNO8mNG9v3TPGjv4l8ll12sG', 'Radhika Sharma', 'New Baneshwor, Kathmandu', 'Radhika@gmail.com', '98494922', 'uploads/IMG-20210414-WA0040.jpg'),
(3, 'sam', '$2y$10$ORgvcMMC2hGl6uB9Y2YxF.aWQUhvkOgelZeh1gG0gvcXwJcLJ.ijy', 'Sam Joshi', 'Chabil, Kathmandu', 'sam@gmail.com', '985958331', NULL),
(4, 'riya', '$2y$10$ZVDNyjdz/P.FC.rIl7bIreBsU4bvsAYyeNtYlr34KulIXgyz/ivW2', 'Riya Sharma', 'Gwarko, Lalitpur', 'riya@gmail.com', '9849492233', NULL),
(5, 'liza', '$2y$10$HoD2Xs1/9s8a98mIAu4SyOL6ulIs/pqDVlrSOACZFNFxVo4CcDyJW', 'Liza K.C', 'Samakhushi, Kathmandu', 'liza@gmail.com', '9849492276', NULL),
(6, 'shrijana', '$2y$10$6ArOS/m3gWmbsbbE9g.nFeb/WSjRqzJvG9kKoVcAR6rkZQwTmj7Ci', 'Shrijana Shrestha', 'Satdobato, Lalitpur', 'shrijana@gmail.com', '9849492211', NULL),
(7, 'Ram', '$2y$10$ulp45x48Kv0NjlGqXzrxluSMypdTj27g0GgLsmd4iT/ft.9K4hd56', 'Ram K.C', 'Jamal, Kathmandu', 'Ram@gmail.com', '984938311', NULL),
(8, 'sirpa', '$2y$10$HRfp/z3iQyS6wtr2v7LcdOtnA9Zw1S3ebxOFlWho6WMGNyxu/F1IS', 'Sirpa Hada', 'Sorakhutte, Kathmandu', 'hadasirpa@gmail.com', '9849917151', 'uploads/woman.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_table`
--
ALTER TABLE `donor_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_table`
--
ALTER TABLE `donor_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
