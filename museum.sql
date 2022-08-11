-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 07:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `museum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`) VALUES
(3, 'success', 'admin123', '1'),
(4, 'admin2', 'admin2@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_museum`
--

CREATE TABLE `tbl_museum` (
  `id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_description` varchar(255) NOT NULL,
  `m_location` varchar(100) NOT NULL,
  `m_image` varchar(100) NOT NULL,
  `nc_p` int(100) NOT NULL,
  `ns_p` int(100) NOT NULL,
  `fc_p` int(100) NOT NULL,
  `sa_p` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_museum`
--

INSERT INTO `tbl_museum` (`id`, `m_name`, `m_description`, `m_location`, `m_image`, `nc_p`, `ns_p`, `fc_p`, `sa_p`) VALUES
(22, 'kathmandu', '     ghfds', 'werty', ' ', 2, 2, 11, 1),
(23, 'kathmandu', ' ', '', ' ', 0, 0, 0, 0),
(24, 'qwer', ' gd', 'dd', ' Capture (2).PNG', 4, 4, 4, 4),
(25, '234', ' sfd', 'sfd', ' ', 4, 3, 3, 0),
(27, 'patan campus', '   patan campus   details', 'partada', ' ', 1210, 23, 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`id`, `title`, `description`, `date`) VALUES
(4, 'sucessh', 'sdfdsfsdfsdf', '2022-06-22'),
(5, 'HOliDAY', 'holy ki moly', '2022-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticketbooking`
--

CREATE TABLE `tbl_ticketbooking` (
  `id` int(11) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `b_date` date NOT NULL,
  `no_of_nc` int(3) NOT NULL DEFAULT 0,
  `no_of_ns` int(3) NOT NULL DEFAULT 0,
  `no_of_fc` int(3) NOT NULL DEFAULT 0,
  `no_of_sa` int(3) NOT NULL DEFAULT 0,
  `payment_type` varchar(100) NOT NULL,
  `transction_no` varchar(100) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ticketbooking`
--

INSERT INTO `tbl_ticketbooking` (`id`, `u_name`, `m_name`, `b_date`, `no_of_nc`, `no_of_ns`, `no_of_fc`, `no_of_sa`, `payment_type`, `transction_no`, `amount`) VALUES
(10, 'hair1', 'patan ', '2022-06-21', 2, 5, 25, 0, 'esewa', '23456', 100),
(11, 'sdfsdf', 'sdfsdf', '2022-06-21', 4, 0, 0, 12, 'sdfsdf', 'sdfsdf', 50000),
(12, 'dfdsf', 'dsfsdf', '2022-06-28', 1, 2, 3, 4, 'dsffsd', 'dsf', 23434);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `phone`, `status`) VALUES
(11, 'harihairom', 'userhari@gmail.com', '007792d9705d9a35d649193c13ed4c69', 9812345678, 0),
(12, 'hari', 'userhari@gmail.com', '38ec9b0ed5ccadb56b3aed9186d6b52c', 9867123456, 1),
(13, 'user', 'user@gmail.com', '3616de58b9d2b617c2d687dcffcb4e5b', 9867654321, 1),
(14, 'ram bahadur', 'ram@gmail.com', '1265242', 3256984125, 1),
(15, 'jon2', 'jon2@gmail.com', '1c5a9ddc9d9f6202fc6c6a353d743e9f', 98671234567, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_museum`
--
ALTER TABLE `tbl_museum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticketbooking`
--
ALTER TABLE `tbl_ticketbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_museum`
--
ALTER TABLE `tbl_museum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ticketbooking`
--
ALTER TABLE `tbl_ticketbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
