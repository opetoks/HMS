-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2022 at 09:30 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-38+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxuryHotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(12) NOT NULL,
  `userRole` varchar(12) DEFAULT NULL,
  `aemail` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `userRole`, `aemail`, `password`) VALUES
(1, 'Super Admin', 'admin@admin.com', '0659c7992e268962384eb17fafe88364');

-- --------------------------------------------------------

--
-- Table structure for table `BookingHistory`
--

CREATE TABLE `BookingHistory` (
  `id` int(12) DEFAULT NULL,
  `roomNo` varchar(12) DEFAULT NULL,
  `StayDuration` varchar(30) DEFAULT NULL,
  `CheckInDate` varchar(25) DEFAULT NULL,
  `CheckOutDate` varchar(15) DEFAULT NULL,
  `occupantName` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_cart`
--

CREATE TABLE `booking_cart` (
  `id` int(12) NOT NULL,
  `user_id` varchar(12) DEFAULT NULL,
  `roomNo` int(12) DEFAULT NULL,
  `quantity` int(12) DEFAULT NULL,
  `price` varchar(12) NOT NULL,
  `roomType` varchar(12) NOT NULL,
  `roomImg` varchar(12) NOT NULL,
  `roomDescription` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_cart`
--

INSERT INTO `booking_cart` (`id`, `user_id`, `roomNo`, `quantity`, `price`, `roomType`, `roomImg`, `roomDescription`) VALUES
(4, '2', 8, 1, '55000', 'Single Room', '1008.jpg', 'SMALL');

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `roomID` int(12) NOT NULL,
  `id` varchar(12) DEFAULT NULL,
  `roomNo` varchar(12) DEFAULT NULL,
  `roomDescription` varchar(30) DEFAULT NULL,
  `roomType` varchar(20) DEFAULT NULL,
  `price` varchar(12) DEFAULT NULL,
  `Rstatus` varchar(15) DEFAULT NULL,
  `Registeredtime` timestamp(6) NULL DEFAULT NULL,
  `roomPICT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`roomID`, `id`, `roomNo`, `roomDescription`, `roomType`, `price`, `Rstatus`, `Registeredtime`, `roomPICT`) VALUES
(6, NULL, '006', 'MEDIUM', 'Single Room', '100000', 'YES', NULL, '10007.jpg'),
(7, NULL, '007', 'MEDIUM', 'Twin Room', '120000', 'YES', NULL, 'hotel-room.jpg'),
(8, NULL, '008', 'SMALL', 'Single Room', '55000', 'YES', NULL, '1008.jpg'),
(9, NULL, '1', 'MEDIUM', 'Single Room', '12000', 'YES', NULL, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(12) NOT NULL,
  `fullame` varchar(100) NOT NULL,
  `position` int(30) NOT NULL,
  `staff_role` int(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `staffemail` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `ProductPrice` decimal(10,0) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `CategoryName`, `ProductName`, `ProductPrice`, `PostingDate`, `UpdationDate`) VALUES
(2, 'Milk', 'Toned milk 1ltr', '42', '2021-06-05 00:23:50', '2022-11-05 02:51:11'),
(3, 'Milk', 'Full Cream Milk 500ml', '26', '2021-06-05 00:24:18', '2021-06-05 00:24:18'),
(4, 'Milk', 'Full Cream Milk 1ltr', '60', '2021-06-12 17:09:05', '2021-06-12 17:09:05'),
(5, 'Butter', 'Butter 100mg', '46', '2021-06-05 00:25:23', '2021-06-05 00:25:23'),
(6, 'Bread', 'Sandwich Bread', '30', '2021-06-05 00:25:37', '2022-11-05 02:51:11'),
(7, 'Ghee', 'Ghee 500mg', '350', '2021-06-13 06:06:10', '2021-06-13 06:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_recovery` text,
  `mailsent` varchar(12) DEFAULT NULL,
  `email_verified` int(11) DEFAULT NULL,
  `email_hash` varchar(100) DEFAULT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  `role` int(2) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `signup_time` int(11) DEFAULT NULL,
  `mobile_verified` int(11) DEFAULT NULL,
  `mobile_number` text,
  `userCertified` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `ewallet` varchar(12) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `password_recovery`, `mailsent`, `email_verified`, `email_hash`, `emailaddress`, `role`, `ip`, `last_login`, `signup_time`, `mobile_verified`, `mobile_number`, `userCertified`, `picture`, `ewallet`) VALUES
(1, 'Opeyemi Tosin', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, 'opeyemitosinakinluyi@yahoo.com', NULL, '127.0.0.1', NULL, 1667388789, NULL, NULL, NULL, NULL, '30000'),
(2, 'Adeola Adebisi', '1a64a010767f0725fb52111b0a9e9f84', NULL, NULL, 0, NULL, 'adeoladebisi@gmail.com', NULL, '127.0.0.1', 1667759655, 1667659129, NULL, NULL, NULL, NULL, '30000'),
(3, 'Olumide Akintulerewa', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 0, NULL, 'olumide@gmail.com', NULL, '127.0.0.1', NULL, 1667662746, NULL, NULL, NULL, NULL, '30000'),
(4, 'Olueole Toyin', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 0, NULL, 'toyin@gmail.com', NULL, '127.0.0.1', NULL, 1667662870, NULL, NULL, NULL, NULL, '30000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cart`
--
ALTER TABLE `booking_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_cart`
--
ALTER TABLE `booking_cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Rooms`
--
ALTER TABLE `Rooms`
  MODIFY `roomID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
