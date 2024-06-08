-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 02:28 PM
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
-- Database: `teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_comment`
--

CREATE TABLE `booking_comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_comment`
--

INSERT INTO `booking_comment` (`id`, `comment`, `reservation_id`) VALUES
(1, 'good teacher.', 19),
(2, 'nice room.', 18),
(3, 'hi', 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `res_id`) VALUES
(14, 'General', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_time` varchar(255) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `r_address` varchar(100) NOT NULL COMMENT 'this is cat id ',
  `r_type` varchar(30) NOT NULL,
  `team_id` text NOT NULL,
  `payable` text NOT NULL,
  `balance` text NOT NULL,
  `r_status` varchar(10) NOT NULL,
  `date_reserved` date NOT NULL,
  `r_code` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `modeofpayment` varchar(50) NOT NULL,
  `res_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `info` text NOT NULL COMMENT 'period_msg',
  `payment_transaction_id` int(11) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `trainers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rid`, `created_at`, `updated_at`, `r_time`, `full_name`, `mobile`, `r_email`, `r_address`, `r_type`, `team_id`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `note`, `price`, `modeofpayment`, `res_id`, `duration`, `info`, `payment_transaction_id`, `room_id`, `trainers_id`) VALUES
(1, '2024-05-12 21:01:11', '2024-05-12 21:01:11', '10:00 AM - 11:00 AM', 'Noorrr', '98488484', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1310:00AM-11:00AM##1', '10:00 AM - 11:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 1, 0),
(2, '2024-05-12 21:01:45', '2024-05-12 21:01:45', '08:00 AM - 09:00 AM', 'Noorvrrr', '94874747', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1308:00AM-09:00AM##1', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 1, 0),
(3, '2024-05-12 21:08:27', '2024-05-12 21:08:27', '11:00 AM - 12:00 PM', 'Nooreeedd', '94877447', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1311:00AM-12:00PM##1', '11:00 AM - 12:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 1, 0),
(4, '2024-05-12 21:16:06', '2024-05-12 21:16:06', '09:00 AM - 10:00 AM', 'Nooreeedd', '98488484', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1309:00AM-10:00AM##2', '09:00 AM - 10:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 2, 0),
(5, '2024-05-12 21:20:38', '2024-05-12 21:20:38', '08:00 AM - 09:00 AM', 'Nooreeedd', '94884884', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1308:00AM-09:00AM##2', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 2, 0),
(6, '2024-05-12 21:34:24', '2024-05-12 21:34:24', '08:00 AM - 09:00 AM', 'Nooreeedd', '95555555', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1308:00AM-09:00AM##3', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(7, '2024-05-12 21:35:53', '2024-05-12 21:35:53', '09:00 AM - 10:00 AM', 'Nooreeedd', '98484994', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1309:00AM-10:00AM##3', '09:00 AM - 10:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(8, '2024-05-12 21:38:54', '2024-05-12 21:38:54', '10:00 AM - 11:00 AM', 'Nooreeedd', '99393939', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1310:00AM-11:00AM##3', '10:00 AM - 11:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(9, '2024-05-12 21:43:03', '2024-05-12 21:43:03', '12:00 PM - 01:00 PM', 'Nooreeedd', '98484848', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1312:00PM-01:00PM##3', '12:00 PM - 01:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(10, '2024-05-12 21:44:07', '2024-05-12 21:44:07', '', 'Nooreeedd', '94984884', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-13##3', '', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(11, '2024-05-12 21:48:05', '2024-05-12 21:48:05', '01:00 PM - 02:00 PM', 'Nooreeedd', '94874747', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1301:00PM-02:00PM##3', '01:00 PM - 02:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(12, '2024-05-12 21:49:16', '2024-05-12 21:49:16', '02:00 PM - 03:00 PM', 'Nooreeedd', '94884848', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1302:00PM-03:00PM##3', '02:00 PM - 03:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(13, '2024-05-12 21:49:43', '2024-05-12 21:49:43', '11:00 AM - 12:00 PM', 'Nooreeedd', '94774747', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1311:00AM-12:00PM##3', '11:00 AM - 12:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(14, '2024-05-12 21:50:46', '2024-05-12 21:50:46', '08:00 AM - 09:00 AM', 'Nooreeedd', '94874747', 'n@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-14', '2024-05-1408:00AM-09:00AM##3', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(15, '2024-05-12 21:51:08', '2024-05-12 21:51:08', '10:00 AM - 11:00 AM', 'Nooreeedd', '94747477', 'kf@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-14', '2024-05-1410:00AM-11:00AM##3', '10:00 AM - 11:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(16, '2024-05-13 10:35:03', '2024-05-13 10:35:03', '12:00 PM - 01:00 PM', 'Omar noor', '93663663', 'x3@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-14', '2024-05-1412:00PM-01:00PM##3', '12:00 PM - 01:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(17, '2024-05-13 10:35:20', '2024-05-13 10:35:20', '02:00 PM - 03:00 PM', 'Omar noor', '93663663', 'x3@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-16', '2024-05-1602:00PM-03:00PM##3', '02:00 PM - 03:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(18, '2024-05-13 10:39:35', '2024-05-13 10:39:35', '03:00 PM - 04:00 PM', 'Ahmed ali noni', '96664666', 'x2@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-13', '2024-05-1303:00PM-04:00PM##3', '03:00 PM - 04:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(19, '2024-05-13 10:46:15', '2024-05-13 10:46:15', '03:00 PM - 04:00 PM', 'Ahmed ali noni', '96664666', 'x2@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-14', '2024-05-1403:00PM-04:00PM##3', '03:00 PM - 04:00 PM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(20, '2024-05-13 12:37:25', '2024-05-13 12:37:25', '08:00 AM - 09:00 AM', 'Ahmed ali noni', '96664666', 'x2@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-14', '2024-05-1408:00AM-09:00AM##4', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 4, 0),
(21, '2024-06-02 19:33:13', '2024-06-02 19:33:13', '08:00 AM - 09:00 AM', 'Ahmed ali', '93773777', 'ali@gmail.com', '14', '', '', '', '', 'Approved', '2024-06-10', '2024-06-1008:00AM-09:00AM##3', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(22, '2024-06-02 19:49:10', '2024-06-02 19:49:10', '08:00 AM - 09:00 AM', 'Ahmed ali', '93773777', 'ali@gmail.com', '14', '', '', '', '', 'Approved', '2024-06-12', '2024-06-1208:00AM-09:00AM##3', '08:00 AM - 09:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0),
(23, '2024-06-02 22:00:52', '2024-06-02 22:00:52', '10:00 AM - 11:00 AM', 'Ahmed ali noni', '96664666', 'x2@gmail.com', '14', '', '', '', '', 'Approved', '2024-06-03', '2024-06-0310:00AM-11:00AM##3', '10:00 AM - 11:00 AM', 0.000, '2', 1, 1, '1 hour - 0 OMR', NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_support`
--

CREATE TABLE `reservation_support` (
  `period_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `r_code` varchar(100) NOT NULL,
  `r_state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `subcat_id` varchar(30) NOT NULL,
  `room_desc` varchar(100) NOT NULL,
  `room_price` decimal(10,3) NOT NULL COMMENT 'for one hour',
  `room_pic` varchar(100) NOT NULL,
  `res_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'time - 15 - 30 - 1 hour ',
  `payment` int(11) NOT NULL COMMENT '1- Visa \r\n2-cash '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `cat_id`, `subcat_id`, `room_desc`, `room_price`, `room_pic`, `res_id`, `duration`, `payment`) VALUES
(3, 'Ahmed noor', 14, '', 'math', 0.000, '6641347ee877c.jpg', 1, 60, 2),
(4, 'Ahmed mohammed', 14, '', 'free room', 0.000, '664209679aa63.jpg', 1, 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `birth_date` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `username`, `mobile`, `password`, `birth_date`, `role`) VALUES
(1, 'Admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', '', 'admin'),
(2, 'FATMMA ALI', 'x@gmail.com', '96667951', 'e10adc3949ba59abbe56e057f20f883e', '2012-02-15', 'user'),
(3, 'FATMMA ALI', 'xx@gmail.com', '96667951', 'a9582dc65c956bedc4a0709e4c262c27', '1999-12-14', 'user'),
(4, 'monther', 's@gmail.com', '96667951', '25d55ad283aa400af464c76d713c07ad', '2015-01-01', 'user'),
(5, 'Ahmed ali', 'xmo1996@gmail.com', '96664666', 'ddb0d4ce9fcd7b8d2f1433cb11b9d7b8', '2002-12-30', 'user'),
(6, 'Ahmed ali noni', 'x2@gmail.com', '96664666', 'e10adc3949ba59abbe56e057f20f883e', '', 'user'),
(7, 'Omar noor', 'x3@gmail.com', '93663663', 'cdf0f5f7f43db0defaf97e441403a025', '', 'user'),
(8, 'Ahmed ali', 'ali@gmail.com', '93773777', 'e10adc3949ba59abbe56e057f20f883e', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_comment`
--
ALTER TABLE `booking_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `reservation_support`
--
ALTER TABLE `reservation_support`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_comment`
--
ALTER TABLE `booking_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reservation_support`
--
ALTER TABLE `reservation_support`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
