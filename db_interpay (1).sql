-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2018 at 03:24 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_interpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(50) NOT NULL DEFAULT '0',
  `role` varchar(50) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `status`, `role`) VALUES
(1, 'Super Admin', 'admin', 'admin', 1, 'admin'),
(2, '', 'admin@domain.com', 'admin', 0, 'staff'),
(3, '', 'admin2@test.com', 'test', 1, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `gw_settings`
--

CREATE TABLE `gw_settings` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_established` varchar(100) NOT NULL,
  `RCNO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id` int(50) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `acct_number` varchar(10) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `merch_secret` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `account_type`, `company_name`, `surname`, `first_name`, `last_name`, `acct_number`, `bank_name`, `email`, `password`, `merch_secret`, `status`) VALUES
(1, 'corporate', 'R2-Soft', 'Akamukali', 'Nnamdi', 'Alexander', '1010101010', 'GTBank', 'easymagic1@gmail.com', 'merchant', '09a6f75849b', 1),
(2, 'individual', '', 'Nakamu', 'EMG', 'AKL', '2020202020', 'Access Bank', 'nnamware@yahoo.com', 'mmmm', 'f89cc14862c', 1),
(3, 'corporate', 'NMS-Technologies', 'Alexander', 'Akamukali', 'AKL', '9029292929', 'First Bank', 'easymagic2@gmail.com', 'bbbb', 'fd9f2a7baf3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(50) NOT NULL,
  `merchant_reference` varchar(100) NOT NULL,
  `merchant_id` int(50) NOT NULL,
  `interpay_reference` varchar(100) NOT NULL,
  `paystack_reference` varchar(100) NOT NULL,
  `merchant_feedback_page` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `pstatus` varchar(50) NOT NULL DEFAULT 'pending',
  `paystack_echo_init_data` text NOT NULL,
  `paystack_echo_response_data` text NOT NULL,
  `interpay_auth_url` varchar(300) NOT NULL,
  `paystack_auth_url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `merchant_reference`, `merchant_id`, `interpay_reference`, `paystack_reference`, `merchant_feedback_page`, `amount`, `email`, `date_created`, `pstatus`, `paystack_echo_init_data`, `paystack_echo_response_data`, `interpay_auth_url`, `paystack_auth_url`) VALUES
(9, '1234567928299', 1, '7c6ad26', 'hrzrnq01dq', 'http://localhost/interpay/Payment/FeedbackOther', '100', 'nnamware@yahoo.com', '2018-12-28 04:36:02', '0', '{\"status\":true,\"message\":\"Authorization URL created\",\"data\":{\"authorization_url\":\"https://checkout.paystack.com/ss297ez2xasbqlo\",\"access_code\":\"ss297ez2xasbqlo\",\"reference\":\"hrzrnq01dq\"}}', '', 'http://localhost/interpay/WebPayment/GateWay/7c6ad26', 'https://checkout.paystack.com/ss297ez2xasbqlo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gw_settings`
--
ALTER TABLE `gw_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gw_settings`
--
ALTER TABLE `gw_settings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
