-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 11:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seba_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_username` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_category` varchar(255) NOT NULL,
  `a_status` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_img` varchar(255) NOT NULL,
  `a_creater_id` varchar(255) NOT NULL,
  `a_creat_date` varchar(255) NOT NULL,
  `a_updater_id` varchar(255) NOT NULL,
  `a_update_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_username`, `a_password`, `a_category`, `a_status`, `a_email`, `a_img`, `a_creater_id`, `a_creat_date`, `a_updater_id`, `a_update_date`) VALUES
(17, 'test1112', 'Seba12111', 'c5ca28f67333e12198c8cd4fa5c60c4a', '2', '1', 'n.m.zamanov@gmail.com', 'coordina4.png', '1', '2021-09-08 01:17:13', '1', '2021-10-17 23:51:56'),
(18, 'tester', 'Seba2', 'c5ca28f67333e12198c8cd4fa5c60c4a', '2', '1', 'sethubpro@gmail.com', 'derece19.png', '17', '2021-09-08 01:21:45', '20', '2021-09-08 06:20:28'),
(20, 'test111222', 'Ayla5', '303e2e06668f0c6ac01987f5ea2f7326', '1', '1', 'sethubpro@gmail.com', 'Screenshot_68.png', '17', '2021-09-08 01:32:19', '20', '2021-10-17 23:54:38'),
(21, 'Rza Talibov551i', 'hunter', 'c5ca28f67333e12198c8cd4fa5c60c4a', '2', '1', 'sethubpro@gmail.com', '934784_740563112669976_1063021022593717974_n.jpg', '20', '2021-09-08 04:04:32', '21', '2021-11-28 11:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `admincategory`
--

CREATE TABLE `admincategory` (
  `a_c_id` int(11) NOT NULL,
  `a_c_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admincategory`
--

INSERT INTO `admincategory` (`a_c_id`, `a_c_value`) VALUES
(1, 'Admin'),
(2, 'Redactor');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ru` varchar(255) DEFAULT NULL,
  `title_tr` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `description_en` longtext DEFAULT NULL,
  `description_ru` longtext DEFAULT NULL,
  `description_tr` longtext DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `creater_id` varchar(255) DEFAULT NULL,
  `creat_date` varchar(255) DEFAULT NULL,
  `updater_id` varchar(255) DEFAULT NULL,
  `update_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `url`, `title`, `title_en`, `title_ru`, `title_tr`, `description`, `description_en`, `description_ru`, `description_tr`, `rank`, `date`, `category`, `img`, `status`, `creater_id`, `creat_date`, `updater_id`, `update_date`) VALUES
(23, NULL, 'Tibb bacısı az', '', '', '', '<p>asddasdasd</p>', '', '', '', NULL, '2021-12-29', '1', '', 1, '21', '2021-12-28 22:11:33', NULL, NULL),
(24, NULL, 'Tibb bacısı az2', '', '', '', '<p>sadfsdsad</p>', '', '', '', NULL, '2021-12-30', '2', '', 2, '21', '2021-12-28 22:11:44', NULL, NULL),
(25, NULL, 'Tibb bacısı az3', '', '', '', '<p>asddasd</p>', '', '', '', NULL, '2021-12-30', '1', '', 2, '21', '2021-12-28 22:12:50', NULL, NULL),
(26, NULL, 'Tibb bacısı az 4', '', '', '', '<p>sdsadsadasdasd</p>', '', '', '', NULL, '2021-12-29', '1', '', 1, '21', '2021-12-28 22:13:04', NULL, NULL),
(27, NULL, '4ytrytr', '', '', '', '<p>uty<strong>utyutyuy</strong>tu</p>', '', '', '', NULL, '2022-01-26', '1', '', 2, '21', '2022-01-08 14:10:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `i_c_id` int(11) NOT NULL,
  `i_c_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`i_c_id`, `i_c_name`) VALUES
(1, 'Sports'),
(2, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE `item_status` (
  `i_s_id` int(11) NOT NULL,
  `i_s_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_status`
--

INSERT INTO `item_status` (`i_s_id`, `i_s_name`) VALUES
(1, 'Active'),
(2, 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `s_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_value`) VALUES
(1, 'Active'),
(2, 'Deactive'),
(3, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admincategory`
--
ALTER TABLE `admincategory`
  ADD PRIMARY KEY (`a_c_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`i_c_id`);

--
-- Indexes for table `item_status`
--
ALTER TABLE `item_status`
  ADD PRIMARY KEY (`i_s_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admincategory`
--
ALTER TABLE `admincategory`
  MODIFY `a_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `i_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_status`
--
ALTER TABLE `item_status`
  MODIFY `i_s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
