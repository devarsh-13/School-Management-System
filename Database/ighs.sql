-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 09:38 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ighs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_id` bigint(20) UNSIGNED NOT NULL,
  `A_Photo` varchar(50) DEFAULT NULL,
  `A_name` varchar(60) NOT NULL,
  `A_mobile` varchar(10) NOT NULL,
  `A_address` varchar(255) NOT NULL,
  `A_password` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `A_dob` date NOT NULL,
  `Created_on` date NOT NULL ,
  `Created_by` bigint(20) UNSIGNED NOT NULL,
  `notification_count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `A_Photo`, `A_name`, `A_mobile`, `A_address`, `A_password`, `is_deleted`, `A_dob`, `Created_on`, `Created_by`, `notification_count`) VALUES
(1, 'admin_default.jpg', 'mayank', '8980462257', 'anjar', '0+Uz', 0, '2000-02-20', '2021-07-14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_id` bigint(20) UNSIGNED NOT NULL,
  `C_no` int(11) NOT NULL,
  `Stream` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_id`, `C_no`, `Stream`) VALUES
(1, 9, ''),
(2, 10, ''),
(3, 11, 'Arts'),
(4, 12, 'Arts'),
(5, 11, 'Commerce'),
(6, 12, 'Commerce'),
(7, 11, 'Science'),
(8, 12, 'Science'),
(9, 11, 'Home Science'),
(10, 12, 'Home Science');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `chat_text` varchar(255) NOT NULL,
  `Created_on` date NOT NULL ,
  `S_srn` bigint(20) UNSIGNED NOT NULL,
  `T_srn` bigint(20) UNSIGNED NOT NULL,
  `is_c_deleted` tinyint(1) NOT NULL,
  `sender_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Sr_n` bigint(20) UNSIGNED NOT NULL,
  `Event_topic` varchar(120) NOT NULL,
  `Event_text` varchar(120) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `Created_on` date NOT NULL ,
  `event_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `Uploaded_on` date NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `Sr_n` bigint(20) UNSIGNED NOT NULL,
  `L_Date` date NOT NULL,
  `L_Time` time NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Authority` varchar(10) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Action` varchar(255) NOT NULL,
  `Status` text NOT NULL,
  `IP_address` varchar(35) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Sr_n` bigint(20) UNSIGNED NOT NULL,
  `Notification_topic` varchar(120) NOT NULL,
  `Notification_text` varchar(120) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `Created_on` date NOT NULL ,
  `N_Time` time NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `n_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `R_id` bigint(20) UNSIGNED NOT NULL,
  `R_path` varchar(250) NOT NULL,
  `Created_on` date NOT NULL ,
  `Created_by` bigint(20) UNSIGNED NOT NULL,
  `Sub_id` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `S_srn` bigint(20) UNSIGNED NOT NULL,
  `S_photo` varchar(50) DEFAULT NULL,
  `S_grn` int(5) NOT NULL,
  `S_uidn` varchar(18) NOT NULL,
  `S_name` varchar(50) NOT NULL,
  `S_caste` varchar(50) NOT NULL,
  `S_category` varchar(50) NOT NULL,
  `S_dob` date NOT NULL,
  `S_contact` varchar(10) NOT NULL,
  `S_ad_date` date NOT NULL,
  `Class_id` bigint(20) UNSIGNED NOT NULL,
  `S_adharn` varchar(12) NOT NULL,
  `S_hostel` varchar(80) NOT NULL,
  `S_home` varchar(80) NOT NULL,
  `S_handicapped` varchar(5) NOT NULL,
  `S_describe` varchar(80) NOT NULL,
  `S_password` varchar(50) NOT NULL,
  `S_remarks` varchar(50) NOT NULL,
  `Academic_year` varchar(15) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `Created_on` date NOT NULL ,
  `s_status` varchar(20) NOT NULL,
  `updated` int(2) NOT NULL,
  `notification_count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Sub_id` bigint(20) UNSIGNED NOT NULL,
  `Sub_name` varchar(40) NOT NULL,
  `Class_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Sub_id`, `Sub_name`, `Class_id`) VALUES
(53, 'Accountancy', 5),
(61, 'Accountancy', 6),
(91, 'Advance Housekeeping', 9),
(100, 'Advance Housekeeping', 10),
(9, 'Beauty', 1),
(22, 'Beauty', 2),
(36, 'Beauty', 3),
(49, 'Beauty', 4),
(69, 'Biology', 7),
(77, 'Biology', 8),
(71, 'Chemistry', 7),
(79, 'Chemistry', 8),
(11, 'Computer', 1),
(24, 'Computer', 2),
(35, 'Computer', 3),
(48, 'Computer', 4),
(60, 'Computer', 5),
(68, 'Computer', 6),
(76, 'Computer', 7),
(84, 'Computer', 8),
(13, 'Drawing', 1),
(26, 'Drawing', 2),
(30, 'Economics', 3),
(43, 'Economics', 4),
(56, 'Economics', 5),
(64, 'Economics', 6),
(90, 'Economics', 9),
(99, 'Economics', 10),
(4, 'English', 1),
(17, 'English', 2),
(32, 'English', 3),
(45, 'English', 4),
(59, 'English', 5),
(67, 'English', 6),
(74, 'English', 7),
(82, 'English', 8),
(86, 'English', 9),
(95, 'English', 10),
(29, 'Geography', 3),
(42, 'Geography', 4),
(1, 'Gujarati', 1),
(14, 'Gujarati', 2),
(31, 'Gujarati', 3),
(44, 'Gujarati', 4),
(58, 'Gujarati', 5),
(66, 'Gujarati', 6),
(73, 'Gujarati', 7),
(81, 'Gujarati', 8),
(85, 'Gujarati', 9),
(94, 'Gujarati', 10),
(10, 'Health', 1),
(23, 'Health', 2),
(37, 'Health', 3),
(50, 'Health', 4),
(2, 'Hindi', 1),
(15, 'Hindi', 2),
(39, 'History', 3),
(52, 'History', 4),
(92, 'Interior Decoration', 9),
(101, 'Interior Decoration', 10),
(34, 'Logic', 3),
(47, 'Logic', 4),
(5, 'Maths', 1),
(18, 'Maths', 2),
(72, 'Maths', 7),
(80, 'Maths', 8),
(8, 'Music', 1),
(21, 'Music', 2),
(38, 'Music', 3),
(51, 'Music', 4),
(54, 'Org. of Commerce', 5),
(62, 'Org. of Commerce', 6),
(7, 'P.T.', 1),
(20, 'P.T.', 2),
(75, 'P.T.', 7),
(83, 'P.T.', 8),
(33, 'Philosophy', 3),
(46, 'Philosophy', 4),
(70, 'Physics', 7),
(78, 'Physics', 8),
(27, 'Psychology', 3),
(40, 'Psychology', 4),
(88, 'Psychology', 9),
(97, 'Psychology', 10),
(55, 'S.P. & C.C.', 5),
(63, 'S.P. & C.C.', 6),
(3, 'Sanskrit', 1),
(16, 'Sanskrit', 2),
(6, 'Science', 1),
(19, 'Science', 2),
(12, 'Social Science', 1),
(25, 'Social Science', 2),
(93, 'Social skill And Reportable matters', 9),
(102, 'Social skill And Reportable matters', 10),
(28, 'Sociology', 3),
(41, 'Sociology', 4),
(87, 'Sociology', 9),
(96, 'Sociology', 10),
(57, 'Statistics', 5),
(65, 'Statistics', 6),
(89, 'Udhyog Sahsikta', 9),
(98, 'Udhyog Sahsikta', 10);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `T_srn` bigint(20) UNSIGNED NOT NULL,
  `login_count` int(11) NOT NULL,
  `T_photo` varchar(50) DEFAULT NULL,
  `T_name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Degree` varchar(50) NOT NULL,
  `A_date` date NOT NULL,
  `Joining_date` date NOT NULL,
  `Retire_date` date NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `Created_on` date NOT NULL ,
  `t_status` varchar(20) NOT NULL,
  `notification_count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacherstd`
--

CREATE TABLE `teacherstd` (
  `ts_id` bigint(20) UNSIGNED NOT NULL,
  `id_sub` bigint(20) UNSIGNED NOT NULL,
  `id_teacher` bigint(20) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_id`),
  ADD UNIQUE KEY `A_id` (`A_id`),
  ADD UNIQUE KEY `A_mobile` (`A_mobile`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_id`),
  ADD UNIQUE KEY `Class_id` (`Class_id`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD UNIQUE KEY `chat_id` (`chat_id`),
  ADD KEY `S_srn` (`S_srn`),
  ADD KEY `T_srn` (`T_srn`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Sr_n`),
  ADD UNIQUE KEY `Sr_n` (`Sr_n`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Uploaded_by` (`Uploaded_by`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`Sr_n`),
  ADD UNIQUE KEY `Sr_n` (`Sr_n`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Sr_n`),
  ADD UNIQUE KEY `Sr_n` (`Sr_n`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`R_id`),
  ADD UNIQUE KEY `R_id` (`R_id`),
  ADD KEY `Created_by` (`Created_by`),
  ADD KEY `Sub_id` (`Sub_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`S_srn`),
  ADD UNIQUE KEY `S_srn` (`S_srn`),
  ADD UNIQUE KEY `S_name` (`S_name`,`S_contact`,`Academic_year`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Sub_id`),
  ADD UNIQUE KEY `Sub_id` (`Sub_id`),
  ADD UNIQUE KEY `Sub_name` (`Sub_name`,`Class_id`),
  ADD KEY `Class_id` (`Class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`T_srn`),
  ADD UNIQUE KEY `T_srn` (`T_srn`),
  ADD UNIQUE KEY `Contact` (`Contact`);

--
-- Indexes for table `teacherstd`
--
ALTER TABLE `teacherstd`
  ADD PRIMARY KEY (`ts_id`),
  ADD UNIQUE KEY `ts_id` (`ts_id`),
  ADD KEY `id_teacher` (`id_teacher`),
  ADD KEY `id_sub` (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `chat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Sr_n` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `Sr_n` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Sr_n` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `R_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `S_srn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Sub_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `T_srn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherstd`
--
ALTER TABLE `teacherstd`
  MODIFY `ts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`S_srn`) REFERENCES `students` (`S_srn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`T_srn`) REFERENCES `teachers` (`T_srn`) ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admin` (`A_id`) ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`Uploaded_by`) REFERENCES `admin` (`A_id`) ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `admin` (`A_id`) ON UPDATE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `teachers` (`T_srn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`Sub_id`) REFERENCES `subjects` (`Sub_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_id`) ON UPDATE CASCADE;

--
-- Constraints for table `teacherstd`
--
ALTER TABLE `teacherstd`
  ADD CONSTRAINT `teacherstd_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`T_srn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherstd_ibfk_2` FOREIGN KEY (`id_sub`) REFERENCES `subjects` (`Sub_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
