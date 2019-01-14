-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2019 at 12:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ydetbkzc_interpay`
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
  `value` varchar(100) NOT NULL,
  `RCNO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gw_settings`
--

INSERT INTO `gw_settings` (`id`, `name`, `value`, `RCNO`) VALUES
(1, 'GW_Name', 'InterPAY.', ''),
(3, 'RCNO', '1102939', ''),
(4, 'Year_Established', '2017.', '');

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
  `status` int(10) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'merchant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `account_type`, `company_name`, `surname`, `first_name`, `last_name`, `acct_number`, `bank_name`, `email`, `password`, `merch_secret`, `status`, `role`) VALUES
(1, 'corporate', 'R2-Soft', 'Akamukali', 'Nnamdi', 'Alexander', '1010101010', 'GTBank', 'easymagic1@gmail.com', 'admin', '09a6f75849b', 1, 'merchant'),
(2, 'individual', '', 'Nakamu', 'EMG', 'AKL', '2020202020', 'Access Bank', 'nnamware@yahoo.com', 'mmmm', 'f89cc14862c', 1, 'merchant'),
(3, 'corporate', 'NMS-Technologies', 'Alexander', 'Akamukali', 'AKL', '9029292929', 'First Bank', 'easymagic2@gmail.com', 'bbbb', 'fd9f2a7baf3', 1, 'merchant');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(50) NOT NULL,
  `merchant_reference` varchar(100) NOT NULL,
  `memo` text NOT NULL,
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
  `paystack_auth_url` varchar(300) NOT NULL,
  `transaction_type` varchar(100) NOT NULL DEFAULT 'pay-in',
  `paystack_fund_init_echo_data` text NOT NULL,
  `paystack_fund_commit_echo_data` text NOT NULL,
  `recipient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `merchant_reference`, `memo`, `merchant_id`, `interpay_reference`, `paystack_reference`, `merchant_feedback_page`, `amount`, `email`, `date_created`, `pstatus`, `paystack_echo_init_data`, `paystack_echo_response_data`, `interpay_auth_url`, `paystack_auth_url`, `transaction_type`, `paystack_fund_init_echo_data`, `paystack_fund_commit_echo_data`, `recipient`) VALUES
(9, '1234567928299', '', 1, '7c6ad26', 'hrzrnq01dq', 'http://localhost/interpay/Payment/FeedbackOther', '100', 'nnamware@yahoo.com', '2018-12-28 04:36:02', 'pending', '{\"status\":true,\"message\":\"Authorization URL created\",\"data\":{\"authorization_url\":\"https://checkout.paystack.com/ss297ez2xasbqlo\",\"access_code\":\"ss297ez2xasbqlo\",\"reference\":\"hrzrnq01dq\"}}', '', 'http://interpay.r2soft.com.ng/WebPayment/GateWay/7c6ad26', 'https://checkout.paystack.com/ss297ez2xasbqlo', 'pay-in', '', '', ''),
(10, '2234567928299', 'Payment for Recharge Card', 1, '163e820', 'simhj2mfp3', 'http://localhost/interpay/Payment/FeedbackOther', '100', 'nnamware@yahoo.com', '2019-01-01 01:47:17', 'success', '{\"status\":true,\"message\":\"Authorization URL created\",\"data\":{\"authorization_url\":\"https://checkout.paystack.com/evz3v7dq9splade\",\"access_code\":\"evz3v7dq9splade\",\"reference\":\"simhj2mfp3\"}}', '{\"id\":89788769,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"simhj2mfp3\",\"amount\":10000,\"message\":null,\"gateway_response\":\"Successful\",\"paid_at\":\"2019-01-01T01:51:32.000Z\",\"created_at\":\"2019-01-01T01:47:17.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"41.190.2.241\",\"metadata\":\"\",\"log\":{\"start_time\":1546307457,\"time_spent\":36,\"attempts\":1,\"errors\":0,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"open\",\"message\":\"Opened checkout\",\"time\":0},{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":0},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":35},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":36}]},\"fees\":150,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_q6ouexgewn\",\"bin\":\"408408\",\"last4\":\"4081\",\"exp_month\":\"12\",\"exp_year\":\"2020\",\"channel\":\"card\",\"card_type\":\"visa DEBIT\",\"bank\":\"Test Bank\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_rWyZBSLymvbUAFdpacPA\"},\"customer\":{\"id\":366162,\"first_name\":\"Akamu\",\"last_name\":\"Nnamdi\",\"email\":\"nnamware@yahoo.com\",\"customer_code\":\"CUS_8iq3amnbyue75z4\",\"phone\":null,\"metadata\":{\"photos\":[{\"type\":\"facebook\",\"typeId\":\"facebook\",\"typeName\":\"Facebook\",\"url\":\"https://d2ojpxxtu63wzl.cloudfront.net/static/f9c313b1b2fb85388211d04ddcd1eb34_8c6285e361b24eb5e7cd5d293b19278a6ca5c215e5951fd0ed9ee0d132b3e73e\",\"isPrimary\":true}]},\"risk_action\":\"default\"},\"plan\":null,\"paidAt\":\"2019-01-01T01:51:32.000Z\",\"createdAt\":\"2019-01-01T01:47:17.000Z\",\"transaction_date\":\"2019-01-01T01:47:17.000Z\",\"plan_object\":{},\"subaccount\":{}}', 'http://interpay.r2soft.com.ng/WebPayment/GateWay/163e820', 'https://checkout.paystack.com/evz3v7dq9splade', 'pay-in', '', '', ''),
(11, '2234567928298', 'Payment for Recharge Card', 1, '2652dca', 'szooc1ahhy', 'http://localhost/interpay/Payment/FeedbackOther', '100', 'nnamware@yahoo.com', '2019-01-01 02:01:44', 'success', '{\"status\":true,\"message\":\"Authorization URL created\",\"data\":{\"authorization_url\":\"https://checkout.paystack.com/hk9a88rzh0zihmj\",\"access_code\":\"hk9a88rzh0zihmj\",\"reference\":\"szooc1ahhy\"}}', '{\"id\":89790146,\"domain\":\"test\",\"status\":\"success\",\"reference\":\"szooc1ahhy\",\"amount\":10000,\"message\":\"test-3ds\",\"gateway_response\":\"[Test] Approved\",\"paid_at\":\"2019-01-01T02:06:01.000Z\",\"created_at\":\"2019-01-01T02:01:45.000Z\",\"channel\":\"card\",\"currency\":\"NGN\",\"ip_address\":\"41.190.2.241\",\"metadata\":\"\",\"log\":{\"start_time\":1546308305,\"time_spent\":57,\"attempts\":2,\"authentication\":\"3DS\",\"errors\":1,\"success\":true,\"mobile\":false,\"input\":[],\"history\":[{\"type\":\"open\",\"message\":\"Opened checkout\",\"time\":0},{\"type\":\"action\",\"message\":\"Set payment method to: card\",\"time\":0},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":24},{\"type\":\"error\",\"message\":\"Error: Declined\",\"time\":25},{\"type\":\"action\",\"message\":\"Attempted to pay with card\",\"time\":47},{\"type\":\"auth\",\"message\":\"Authentication Required: 3DS\",\"time\":48},{\"type\":\"success\",\"message\":\"Successfully paid with card\",\"time\":57}]},\"fees\":150,\"fees_split\":null,\"authorization\":{\"authorization_code\":\"AUTH_o1rzwq35sg\",\"bin\":\"408408\",\"last4\":\"0409\",\"exp_month\":\"12\",\"exp_year\":\"2020\",\"channel\":\"card\",\"card_type\":\"visa DEBIT\",\"bank\":\"Test Bank\",\"country_code\":\"NG\",\"brand\":\"visa\",\"reusable\":true,\"signature\":\"SIG_rfFNPxfWDMe8bJxcT80a\"},\"customer\":{\"id\":366162,\"first_name\":\"Akamu\",\"last_name\":\"Nnamdi\",\"email\":\"nnamware@yahoo.com\",\"customer_code\":\"CUS_8iq3amnbyue75z4\",\"phone\":null,\"metadata\":{\"photos\":[{\"type\":\"facebook\",\"typeId\":\"facebook\",\"typeName\":\"Facebook\",\"url\":\"https://d2ojpxxtu63wzl.cloudfront.net/static/f9c313b1b2fb85388211d04ddcd1eb34_8c6285e361b24eb5e7cd5d293b19278a6ca5c215e5951fd0ed9ee0d132b3e73e\",\"isPrimary\":true}]},\"risk_action\":\"default\"},\"plan\":null,\"paidAt\":\"2019-01-01T02:06:01.000Z\",\"createdAt\":\"2019-01-01T02:01:45.000Z\",\"transaction_date\":\"2019-01-01T02:01:45.000Z\",\"plan_object\":{},\"subaccount\":{}}', 'http://interpay.r2soft.com.ng/WebPayment/GateWay/2652dca', 'https://checkout.paystack.com/hk9a88rzh0zihmj', 'pay-in', '', '', ''),
(14, '2234567928297', 'Incentive To Agent', 1, '5ffdc56', '', 'http://localhost/interpay/Payment/FeedbackOther', '100', 'nnamware@yahoo.com', '2019-01-06 11:01:42', 'pending', '', '', 'http://interpay.r2soft.com.ng/WebPayment/GateWay/5ffdc56', '', 'pay-out', '{\"status\":true,\"message\":\"Transfer recipient created successfully\",\"data\":{\"active\":true,\"createdAt\":\"2018-11-19T03:12:18.000Z\",\"currency\":\"NGN\",\"description\":\"Incentive To Agent\",\"domain\":\"test\",\"email\":null,\"id\":725260,\"integration\":113618,\"metadata\":{\"job\":\"Agent\"},\"name\":\"Nnamdi\",\"recipient_code\":\"RCP_0s157edikocw4nc\",\"type\":\"nuban\",\"updatedAt\":\"2019-01-06T23:01:43.000Z\",\"is_deleted\":false,\"details\":{\"authorization_code\":null,\"account_number\":\"0163769577\",\"account_name\":null,\"bank_code\":\"058\",\"bank_name\":\"Guaranty Trust Bank\"}}}', '', 'RCP_0s157edikocw4nc');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
