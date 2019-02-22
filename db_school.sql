-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 02:11 AM
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
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `correction` longtext NOT NULL,
  `date_prior` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `user_id`, `subject_id`, `class`, `term`, `content`, `correction`, `date_prior`, `date_created`) VALUES
(6, '', '8', 'nursery-1', 'second-term', '<p>test assignment content</p>\r\n', '<p>test correction content.</p>\r\n', '', '2019-02-06 03:27:05'),
(7, '1', '8', 'nursery-1', 'second-term', 'demo assignment question.', 'demo assignment ans.', '', '2019-02-21 02:27:34'),
(8, '1', '17', 'nursery-1', 'second-term', 'demo q', 'demo a', '', '2019-02-21 02:28:33'),
(9, '1', '19', 'basic-4', 'second-term', 'demo content', 'demo correction', '', '2019-02-21 02:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `other_names` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `guardian_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1',
  `class` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `passport` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `surname`, `first_name`, `other_names`, `gender`, `email`, `guardian_email`, `password`, `address`, `phone`, `date_created`, `status`, `class`, `term`, `passport`) VALUES
(3, 'Akamukali', 'Nnamdi', 'Alexander', 'male', 'easymagic1@gmail.com', 'easymagic1@gmail.com', 'student', '10 Sodipo Street Badore Ajah', '+2348175299162', '', '1', 'nursery-1', 'second-term', 'uploads/student/passport/5c6ed4095a748error1.PNG'),
(6, 'Akamukali', 'Uchenna', 'Alexander', 'male', 'easymagic2@gmail.com', 'easymagic1@gmail.com', 'password', '10 Sodipo Street Badore Ajah', '+2348175299162', '', '1', 'nursery-1', 'second-term', 'uploads/student/passport/5c6dd7a3f1f9ab-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `id` int(10) NOT NULL,
  `assignment_id` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `student_response` longtext NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_prior` varchar(100) NOT NULL,
  `date_submitted` varchar(100) NOT NULL,
  `passed` varchar(100) NOT NULL,
  `failed` varchar(100) NOT NULL,
  `correction` longtext NOT NULL,
  `result` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `attended_to` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`id`, `assignment_id`, `term`, `class`, `student_id`, `student_response`, `date_created`, `date_prior`, `date_submitted`, `passed`, `failed`, `correction`, `result`, `remark`, `attended_to`) VALUES
(1, '6', 'second-term', 'nursery-1', '3', 'my student response....\r\n', '2019-02-06 03:27:05', '', '', '', '', '<p>new correction updated from backend.</p>\n', '', '', ''),
(2, '7', 'second-term', 'nursery-1', '3', 'demo assignment answer.', '2019-02-21 02:27:34', '', '', '', '', 'demo assignment ans.', '', '', ''),
(3, '7', 'second-term', 'nursery-1', '6', '', '2019-02-21 02:27:34', '', '', '', '', 'demo assignment ans.', '', '', ''),
(4, '8', 'second-term', 'nursery-1', '3', '', '2019-02-21 02:28:33', '', '', 'yes you passed', 'no', 'demo a', '', 'Good', '1'),
(5, '8', 'second-term', 'nursery-1', '6', '', '2019-02-21 02:28:33', '', '', '', '', 'demo a', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_test`
--

CREATE TABLE `student_test` (
  `id` int(10) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `student_response` longtext NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `date_prior` varchar(100) NOT NULL,
  `date_submitted` varchar(100) NOT NULL,
  `passed` varchar(100) NOT NULL,
  `failed` varchar(100) NOT NULL,
  `correction` longtext NOT NULL,
  `result` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `attended_to` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_test`
--

INSERT INTO `student_test` (`id`, `test_id`, `term`, `class`, `student_id`, `student_response`, `date_created`, `date_prior`, `date_submitted`, `passed`, `failed`, `correction`, `result`, `remark`, `attended_to`) VALUES
(7, '15', 'second-term', 'nursery-1', '3', 'my answer updated...', '2019-01-30 07:32:35', '', '', '', '', 'corrected', '', '', ''),
(11, '18', 'second-term', 'nursery-1', '6', '', '2019-02-21 01:57:38', '', '', 'yes', 'no', 'Ans: A noun is a name of any person , animal , place or thing.\r\ne.g Man, Apple , Lagos, Plastic.', '', 'Excellent', '1'),
(10, '18', 'second-term', 'nursery-1', '3', 'name of any person , animal , place or thing.', '2019-02-21 01:57:38', '', '', 'yes', '', 'Ans: A noun is a name of any person , animal , place or thing.', '', '', '0'),
(12, '19', 'second-term', 'nursery-1', '3', '', '2019-02-21 02:04:06', '', '', '', '', 'another answer.', '', '', ''),
(13, '19', 'second-term', 'nursery-1', '6', '', '2019-02-21 02:04:06', '', '', '', '', 'another answer.', '', '', ''),
(14, '20', 'second-term', 'nursery-1', '3', '', '2019-02-21 02:04:38', '', '', '', '', 'a1', '', '', ''),
(15, '20', 'second-term', 'nursery-1', '6', '', '2019-02-21 02:04:38', '', '', '', '', 'a1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `class` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `last_updated` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `class`, `term`, `name`, `date_created`, `last_updated`) VALUES
(9, 'basic-2', 'second-term', 'test subject', '2019-01-30 07:39:45', ''),
(8, 'nursery-1', 'second-term', 'Basic Drawing ', '2019-01-30 07:18:29', '2019-02-21 12:28:45'),
(7, 'nursery-1', 'first-term', 'Legos Building Blocks  (101)', '2019-01-29 11:45:40', '2019-02-21 12:26:02'),
(6, 'nursery-1', 'first-term', 'Drawing Part I', '2019-01-29 11:44:58', '2019-02-21 12:25:48'),
(15, 'nursery-1', 'first-term', 'Drawing Part III', '2019-02-21 12:20:01', '2019-02-21 12:20:01'),
(14, 'nursery-1', 'first-term', 'Drawing Part II', '2019-02-21 12:19:48', '2019-02-21 12:19:48'),
(16, 'nursery-1', 'first-term', 'Drawing Part IV', '2019-02-21 12:26:14', '2019-02-21 12:26:14'),
(17, 'nursery-1', 'second-term', 'A To Z', '2019-02-21 12:29:22', '2019-02-21 12:29:22'),
(18, 'nursery-1', 'second-term', 'One Two Three.', '2019-02-21 12:31:26', '2019-02-21 05:29:39'),
(19, 'basic-4', 'second-term', 'Basic Drawing  basic 4', '2019-02-21 02:30:42', '2019-02-21 02:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `term` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `correction` longtext NOT NULL,
  `date_prior` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user_id`, `subject_id`, `class`, `term`, `content`, `correction`, `date_prior`, `date_created`) VALUES
(16, '', '9', 'basic-2', 'second-term', 'new content.123......', '<p>basic 2 correction</p>\r\n', '', '2019-01-30 07:50:38'),
(15, '', '8', 'nursery-1', 'second-term', '<p>test content</p>\r\n', '<p>test correction.</p>\r\n', '', '2019-01-30 07:32:35'),
(18, '1', '8', 'nursery-1', 'second-term', 'Q. What is a noun?', 'Ans: A noun is a name of any person , animal , place or thing.', '', '2019-02-21 01:57:38'),
(19, '1', '8', 'nursery-1', 'second-term', 'another question', 'another answer.', '', '2019-02-21 02:04:06'),
(20, '1', '18', 'nursery-1', 'second-term', 'q1', 'a1', '', '2019-02-21 02:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `test_test`
--

CREATE TABLE `test_test` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_test`
--

INSERT INTO `test_test` (`id`, `name`) VALUES
(1, 'check1'),
(2, 'check2'),
(3, '<->cool check'),
(4, '23<->nice'),
(5, '23<->another data'),
(6, '23<->fdfdfd'),
(7, '23<->dffd'),
(8, '23<->werwerf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `role` varchar(100) NOT NULL DEFAULT '0',
  `date_created` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `address`, `phone`, `status`, `role`, `date_created`) VALUES
(1, 'admin', 'super-admin', 'admin', '', '', '1', 'admin', ''),
(2, 'staff@domain.com', 'staff username2', 'staff', '', '', '0', 'staff', ''),
(3, 'staff2@domain.com', 'staff2', 'admin', '', '', '1', 'staff', ''),
(9, 'admin2', 'admin2 user....123', 'admin', '', '', '0', 'staff', ''),
(10, 'admin3', 'admin3 us', 'admin', '', '', '0', 'staff', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_test`
--
ALTER TABLE `student_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_test`
--
ALTER TABLE `test_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_test`
--
ALTER TABLE `student_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `test_test`
--
ALTER TABLE `test_test`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
