-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2016 at 06:45 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbgroup`
--

CREATE TABLE `tbgroup` (
  `g_id` int(100) NOT NULL,
  `g_name` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbgroup`
--

INSERT INTO `tbgroup` (`g_id`, `g_name`) VALUES
(1, 'Verify all daemons/processes are running'),
(2, 'Verify all applications are working'),
(3, 'Verify any push/pull actions'),
(4, 'Examine audit logs'),
(5, 'Backup'),
(6, 'Verify all communication');

-- --------------------------------------------------------

--
-- Table structure for table `tbitem`
--

CREATE TABLE `tbitem` (
  `i_id` int(100) NOT NULL,
  `i_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `g_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbitem`
--

INSERT INTO `tbitem` (`i_id`, `i_name`, `g_id`) VALUES
(1, 'HRMS', 1),
(2, 'MRP', 1),
(3, 'SysLog', 1),
(4, 'E-mail', 2),
(5, 'Symantec Backup', 2),
(6, 'intrusion detection', 2),
(7, 'UPS monitoring', 2),
(8, 'Virus definition files', 3),
(9, 'Data Servers', 4),
(10, 'E-mail Server', 4),
(11, 'Firewalls', 4),
(12, 'Squid Proxy Server', 4),
(13, 'Solomon Database', 5),
(14, 'HRMS Database', 5),
(15, 'Exchang Mail Data', 5),
(16, 'Solomon Application', 5),
(17, 'Device config files', 5),
(18, 'WMS Database', 5),
(19, 'Internet Connection', 6),
(20, 'Telephone Leased Line', 6),
(21, 'Data Leased Line', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaction`
--

CREATE TABLE `tbtransaction` (
  `t_id` int(100) NOT NULL,
  `g_id` int(10) NOT NULL,
  `i_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `t_by` varchar(200) CHARACTER SET utf8 NOT NULL,
  `t_detail` varchar(200) CHARACTER SET utf8 NOT NULL,
  `t_status` int(100) NOT NULL,
  `u_id` int(100) NOT NULL,
  `t_createday` date NOT NULL,
  `t_createby` varchar(200) CHARACTER SET utf8 NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbtransaction`
--

INSERT INTO `tbtransaction` (`t_id`, `g_id`, `i_id`, `t_by`, `t_detail`, `t_status`, `u_id`, `t_createday`) VALUES
(111, 0, 'HRMS', 'n', 'ssss', 1, 0, '2016-09-03'),
(112, 0, 'MRP', 'n', 'ssss', 1, 0, '2016-09-03'),
(113, 0, 'SysLog', 'n', 'ssss', 1, 0, '2016-09-03'),
(114, 0, 'E-mail', 'y', '', 1, 0, '2016-09-03'),
(115, 0, 'Symantec Backup', 'y', '', 1, 0, '2016-09-03'),
(116, 0, 'intrusion detection', 'y', '', 1, 0, '2016-09-03'),
(117, 0, 'UPS monitoring', 'y', '', 1, 0, '2016-09-03'),
(118, 0, 'Virus definition files', 'y', '', 1, 0, '2016-09-03'),
(119, 0, 'Data Servers', 'y', '', 1, 0, '2016-09-03'),
(120, 0, 'E-mail Server', 'y', '', 1, 0, '2016-09-03'),
(121, 0, 'Firewalls', 'y', '', 1, 0, '2016-09-03'),
(122, 0, 'Squid Proxy Server', 'y', '', 1, 0, '2016-09-03'),
(123, 0, 'Solomon Database', 'y', '', 1, 0, '2016-09-03'),
(124, 0, 'HRMS Database', 'y', '', 1, 0, '2016-09-03'),
(125, 0, 'Exchang Mail Data', 'y', '', 1, 0, '2016-09-03'),
(126, 0, 'Solomon Application', 'y', '', 1, 0, '2016-09-03'),
(127, 0, 'Device config files', 'y', '', 1, 0, '2016-09-03'),
(128, 0, 'WMS Database', 'y', '', 1, 0, '2016-09-03'),
(129, 0, 'Internet Connection', 'y', '', 1, 0, '2016-09-03'),
(130, 0, 'Telephone Leased Line', 'y', '', 1, 0, '2016-09-03'),
(131, 0, 'Data Leased Line', 'y', '', 1, 0, '2016-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `u_pass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`u_id`, `u_name`, `u_pass`, `status`) VALUES
(1, 'pipat', '1', 'ADMIN'),
(2, 'ongart', '1', 'ADMIN'),
(3, 'vampire', 'vampire', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbgroup`
--
ALTER TABLE `tbgroup`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbitem`
--
ALTER TABLE `tbitem`
  ADD PRIMARY KEY (`i_id`,`g_id`);

--
-- Indexes for table `tbtransaction`
--
ALTER TABLE `tbtransaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbgroup`
--
ALTER TABLE `tbgroup`
  MODIFY `g_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbitem`
--
ALTER TABLE `tbitem`
  MODIFY `i_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbtransaction`
--
ALTER TABLE `tbtransaction`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
