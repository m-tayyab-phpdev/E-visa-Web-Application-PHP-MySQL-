-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 11:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali-visa`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_info`
--

CREATE TABLE `applicant_info` (
  `app_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `visa_category` varchar(50) NOT NULL,
  `visa_sub-category` varchar(50) NOT NULL,
  `application_type` varchar(50) NOT NULL,
  `visa_type` varchar(50) NOT NULL,
  `applied_for` varchar(30) NOT NULL,
  `passport_no` varchar(20) NOT NULL,
  `visit_purpose` varchar(50) NOT NULL,
  `number_duration` int(20) NOT NULL,
  `varchar_duration` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `entry_port` varchar(50) NOT NULL,
  `departure_port` varchar(50) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `picture` text NOT NULL DEFAULT 'avatar.png',
  `application_status` varchar(30) NOT NULL,
  `visa_status` text NOT NULL,
  `interview` text NOT NULL DEFAULT 'Not Schedule',
  `approve_num_duration` int(20) NOT NULL,
  `approve_var_duration` varchar(30) NOT NULL,
  `approve_issue_date` date NOT NULL,
  `approve_from_date` date NOT NULL,
  `approve_expire_date` date NOT NULL,
  `address` text NOT NULL,
  `review` varchar(50) NOT NULL DEFAULT 'unreviewed',
  `challan` int(20) NOT NULL,
  `application_fee` varchar(30) NOT NULL DEFAULT 'Not Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `inter_id` int(1) NOT NULL,
  `inter_date` date NOT NULL,
  `inter_time` time NOT NULL,
  `inter_cmt` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `result_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_acc_status` varchar(50) NOT NULL DEFAULT 'Unverified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_type`, `user_acc_status`) VALUES
(9, 'Ali Raza', 'bc210200836@vu.edu.pk', '$2y$10$sB8FejRZ3eQ09wZeiZJQq.p0uxY0L2tjZY.o5Zeu63tVJYXSLVlkC', '+923204860294', 'Admin', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_info`
--
ALTER TABLE `applicant_info`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `fk_01` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_04` (`sender_id`),
  ADD KEY `fk_05` (`receiver_id`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`inter_id`),
  ADD KEY `fk_02` (`app_id`),
  ADD KEY `fk_03` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_info`
--
ALTER TABLE `applicant_info`
  MODIFY `app_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `inter_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_info`
--
ALTER TABLE `applicant_info`
  ADD CONSTRAINT `fk_01` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
