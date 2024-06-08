-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2024 at 06:51 PM
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
(12, 'Sport new', 0),
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
(2, '2022-12-16 18:22:39', '2022-12-16 18:22:39', '01:00:00', 'monther al-hosni', '99999999', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-20', '2022-12-2001:00PM-02:00PM##142', '01:00 PM - 02:00 PM', 20.000, '2', 1, 1, '1 hour - 20 OMR', NULL, 14, 2),
(3, '2022-12-16 18:23:22', '2022-12-16 18:23:22', '08:00:00', 'عمر علي محمد', '23333333', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-21', '2022-12-2108:00AM-09:00AM##143', '08:00 AM - 09:00 AM', 20.000, '2', 1, 1, '1 hour - 20 OMR', NULL, 14, 3),
(4, '2022-12-16 18:23:59', '2022-12-16 18:23:59', '08:00:00', 'monther al-hosni', '98888888', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-21', '2022-12-2108:00AM-09:00AM##152', '08:00 AM - 09:00 AM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 2),
(5, '2022-12-16 18:25:27', '2022-12-16 18:25:27', '08:00:00', 'عمر علي محمد', '33333333', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-22', '2022-12-2208:00AM-09:00AM##152', '08:00 AM - 09:00 AM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 2),
(6, '2022-12-16 18:26:09', '2022-12-16 18:26:09', '08:00:00', 'monther al-hosni', '96667951', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-22', '2022-12-2208:00AM-09:00AM##143', '08:00 AM - 09:00 AM', 20.000, '2', 1, 1, '1 hour - 20 OMR', NULL, 14, 3),
(7, '2022-12-16 19:57:14', '2022-12-16 19:57:14', '08:00:00', 'monther al-hosni', '96667951', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-17', '2022-12-1708:00AM-09:00AM##143', '08:00 AM -10:00 AM', 40.000, '2', 1, 2, '2 hours - 40 OMR', NULL, 14, 3),
(8, '2022-12-19 10:30:28', '2022-12-19 10:30:28', '03:00:00', 'عمر علي محمد', '99999999', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-19', '2022-12-1903:00PM-04:00PM##142', '03:00 PM - 04:00 PM', 20.000, '2', 1, 1, '1 hour - 20 OMR', NULL, 14, 2),
(9, '2022-12-19 10:32:24', '2022-12-19 10:32:24', '03:00:00', 'monther al-hosni', '99999999', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-19', '2022-12-1903:00PM-04:00PM##153', '03:00 PM - 04:00 PM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 3),
(11, '2022-12-19 11:00:24', '2022-12-19 11:00:24', '06:00:00', 'monther al-hosni', '98848848', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-19', '2022-12-1906:00PM-07:00PM##152', '06:00 PM - 07:00 PM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 2),
(14, '2022-12-20 17:07:15', '2022-12-20 17:06:13', '10:00:00', 'monther al-hosni', '93993939', 'monther.alhosni@gmail.com', '14', '', '0', '0.00', '0.00', 'Approved', '2022-12-21', '2022-12-2110:00AM-11:00AM##163', '10:00 AM -11:00 AM', 10.000, '1', 1, 1, '1 hour - 10 OMR', NULL, 16, 3),
(16, '2024-05-07 22:26:21', '2024-05-07 22:26:21', '08:00 AM - 09:00 AM', 'Ahmed ali', '98399989', 'xmo1996@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-08', '2024-05-0808:00AM-09:00AM##152', '08:00 AM - 09:00 AM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 2),
(17, '2024-05-07 22:26:58', '2024-05-07 22:26:58', '09:00 AM - 10:00 AM', 'Ahmed ali', '94884888', 'xmo1996@gmail.com', '14', '', '', '', '', 'Approved', '2024-05-08', '2024-05-0809:00AM-10:00AM##153', '09:00 AM - 10:00 AM', 15.000, '2', 1, 1, '1 hour - 15 OMR', NULL, 15, 3);

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

--
-- Dumping data for table `reservation_support`
--

INSERT INTO `reservation_support` (`period_id`, `reservation_id`, `r_code`, `r_state`) VALUES
(1, 7, '2022-12-1709:00AM-10:00AM##14', 'Approved');

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
(6, 'Hola Room #1', 1, 'General', 'This is our best room.', 30.000, '6351184f54759.jpg', 1, 15, 0),
(7, 'Hola Room #2', 1, 'General', 'Our secound room.', 24.000, '6346efbc1f453.jpg', 1, 30, 0),
(9, 'Hola school #11', 11, 'General', 'Test school room.', 23.000, '636343674b892.png', 1, 15, 0),
(10, 'Hola Room #3', 1, 'General', 'Our Visa Room', 20.000, '634cfc8550e28.jpg', 1, 30, 1),
(11, 'Hola Room #4', 1, 'General', 'Our Cash room.', 15.000, '634cfcdde683e.jpg', 1, 30, 2),
(13, 'Hola Room #12', 1, 'General', 'our checks', 20.000, '63634a3bd358a.jpg', 1, 30, 1),
(14, 'Horse number #1', 14, '', 'info', 20.000, '639b68276e19f.jpg', 1, 60, 2),
(15, 'Horse number #2', 14, '', 'some information.', 15.000, '639b6b94890ef.jpg', 1, 60, 2),
(16, 'Horse number #3', 14, '', 'any info visa', 10.000, '639c88219249d.jpg', 1, 60, 1);

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

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `desc`, `pic`, `res_id`) VALUES
(7, 'Ahmed naser 4', '44', '663f913903503.jpg', 1),
(8, 'Ahmed naser55', '5555', '', 1),
(9, 'Ahmed naser443', 'wsdwd', '', 1),
(10, 'Ahmed nasersss', 'sssdd', '663f97d1ddac4.png', 1),
(11, 'Ahmed naser3323', '33e', '663f985e9471f.png', 1),
(12, 'Ahmed naser999', 'kkkojoj', '663f98b80088e.png', 1),
(13, '', '', '', 1),
(14, 'Ahmed naser33233', '3322', '663fa158ba85f.', 1);

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
(6, 'Ahmed ali noni', 'x2@gmail.com', '96664666', 'e10adc3949ba59abbe56e057f20f883e', '', 'user');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reservation_support`
--
ALTER TABLE `reservation_support`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
