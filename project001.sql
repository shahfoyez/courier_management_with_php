-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 01:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project001`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `name`, `company`, `address`, `email`, `phone`, `createdAt`, `createdBy`) VALUES
(2, 'Parvez Ahmed', 'FASTEX', 'house2, sylhet', 'foyez@gmail.com', '01700000011', '2021-06-13 15:04:02', 'admin ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `createdBy` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `lastUpdate` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `pin` int(5) NOT NULL,
  `disable` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `name`, `username`, `email`, `agent`, `password`, `phone`, `img`, `createdBy`, `createdAt`, `lastUpdate`, `role`, `pin`, `disable`) VALUES
(1001, 'Admin Ali', 'admin ', 'admin1@example.com', 'ZIA VAI,Parcelforce', '202cb962ac59075b964b07152d234b70', '0170000001', 'img/admin/62494473cd.jpg', 'Admin', '2021-06-12 11:08:15', '2021-06-15 06:34:30', 'Super Admin ', 1010, 0),
(1014, 'Sukanta Bhattacharjee', 'sylhex', 'sbsylhet@gmail.com', 'ZIA VAI,', '202cb962ac59075b964b07152d234b70', '01700000000', 'img/admin/96bfdb6d36.jpg', 'admin ', '2021-06-13 12:32:16', NULL, 'Super Admin', 123, 0),
(1016, 'Jamal Miah', 'jamal01 ', 'example@gmail.com', 'Parvez Ahmed,DHL ', '202cb962ac59075b964b07152d234b70', '017xxxxx11', 'img/admin/e8f2b7a99b.jpg', 'admin ', '2021-06-13 12:40:26', '2021-06-14 16:08:32', 'Admin ', 111, 0),
(1018, 'Ashraf Ahmed', 'ashraf', 'foyez@gmail.com', 'Parvez Ahmed,DHL', '202cb962ac59075b964b07152d234b70', '01700000000', 'img/admin/416734576e.jpg', 'admin ', '2021-06-15 12:32:59', NULL, 'Agent', 1212, 0),
(1019, 'Sabbir Ahmed', 'sabbir01', 'sab@gmail.com', 'Hussen,DHL ', '81dc9bdb52d04dc20036dbd8313ed055', '01700000000', 'img/admin/1ed2973375.jpg', 'admin ', '2021-06-24 14:31:08', '2021-06-24 08:31:43', 'Admin', 1000, 0),
(1021, 'Colby Alexander', 'vecigofene', 'qisyl@mailinator.com', 'Parvez Ahmed,Parcelforce', '202cb962ac59075b964b07152d234b70', 'Shelley Mullen', 'img/admin/b0de1c058d.jpeg', 'admin ', '2021-09-20 17:24:43', NULL, 'Agent', 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `sl` int(55) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `editedAt` datetime DEFAULT NULL,
  `createdBy` varchar(255) NOT NULL,
  `editedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`sl`, `name`, `company`, `phone`, `email`, `address`, `createdAt`, `editedAt`, `createdBy`, `editedBy`) VALUES
(1, 'ZIA VAI', 'Parcelforce', '01xxxxxxxx1 ', 'zia@example.com', 'param, comship ', '2021-06-11 15:15:01', '2021-06-13 14:32:49', 'admin', 'admin '),
(8, 'Parvez Miah', 'DHL', '0170000001 ', 'parum@gmail.com', 'house2 Sylhet Sylhet ', '2021-06-11 14:11:16', '2021-06-12 22:10:53', 'admin', 'admin '),
(9, 'Hussen', 'DHL', '01700000000', 'par@gmail.com', 'house2\r\nSylhet\r\nSylhet', '2021-06-11 15:15:05', NULL, 'admin', 'admin'),
(10, 'Parvez Ahmed', 'DHL', '01700000000', 'alex@gmail.com', 'house2\r\nSylhet\r\nSylhet', '2021-06-11 14:13:17', NULL, 'admin', ''),
(11, 'sumon', 'Parcelforce', '01700000000 ', 'fizz@gmail.com', 'house2 Sylhet Sylhet ', '2021-06-11 15:11:02', '2021-06-12 22:21:25', 'admin', 'admin '),
(13, 'Abdur Rahman', 'SELF', '01700000000', 'foyez@gmail.com', 'house2\r\nSylhet\r\nSylhet', '2021-06-12 12:19:26', NULL, 'admin', ''),
(17, 'Parvez Ahmed', 'Parcelforce', '01700000000', 'shah@gmail.com', 'house2SylhetSylhet', '2021-06-13 14:23:13', '2021-06-14 13:22:34', 'admin ', 'admin ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billinginfo`
--

CREATE TABLE `tbl_billinginfo` (
  `awb` int(255) NOT NULL,
  `reference` varchar(55) NOT NULL,
  `pieces` varchar(55) NOT NULL,
  `service` varchar(55) NOT NULL,
  `agent` varchar(55) NOT NULL,
  `company` varchar(255) NOT NULL,
  `receiver` varchar(55) NOT NULL,
  `weight` float(10,4) NOT NULL,
  `goods` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `tamount` float(10,4) NOT NULL,
  `damount` float(10,4) NOT NULL,
  `userAdmin` varchar(55) NOT NULL,
  `editedBy` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL,
  `datee` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_billinginfo`
--

INSERT INTO `tbl_billinginfo` (`awb`, `reference`, `pieces`, `service`, `agent`, `company`, `receiver`, `weight`, `goods`, `comment`, `tamount`, `damount`, `userAdmin`, `editedBy`, `status`, `datee`, `time`, `location`, `activity`) VALUES
(1446072118, '001', '3', 'SKYNET,Skynet ', 'Parvez Miah,DHL', 'SKYNET,Skynet', 'Parvez Ahmed', 2.0000, 'rfedsa', 'ffdfsas', 23454.0000, 1200.0000, 'Sabbir Ahmed', '', 'Due', '0000-00-00', '10:21:34', 'zindabazar', 'Shipped'),
(1446072120, '002', '3', 'FEDEX,Skynet ', 'ZIA VAI,Parcelforce', 'BLUEDART,BlueDart', 'Rukon Ahmed', 2.0000, 'No good', 'Thank You', 543.0000, 123.0000, 'Admin Ali', '', 'Due', '0000-00-00', '10:43:30', 'Zindabazar', 'Booked'),
(1446072122, '006', '4', 'ARAMEX,BlueDart ', 'Hussen,DHL', 'SKYNET,Skynet', 'Sandip Roy', 3.0000, 'Fabrics', 'Good', 5000.0000, 300.0000, 'Admin Ali', '', 'Due', '0000-00-00', '11:15:55', 'Zindabazar', 'Booked'),
(1446072123, '007', '3', 'SKYNET,Skynet', 'Parvez Miah,DHL', 'PARCELFORCE,Parcelforce', 'Rukon Ahmed', 4.0000, 'rfedsa', 'ffdfsas', 23454.0000, 1000000.0000, 'Admin Ali', '', 'Due', '2021-06-15', '11:18:40', 'Zindabazar', 'Shipment Booked');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `sl` int(255) NOT NULL,
  `keyy` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`sl`, `keyy`, `name`, `link`) VALUES
(2, 'ELITAIRBORNE', 'DHL ', 'https://www.eliteairborne.com/index.php'),
(3, 'FASTEX', 'FASTEX', 'http://fastexpressbd.com/'),
(4, 'PARCELFORCE', 'Parcelforce', 'https://www.parcelforce.com/'),
(5, 'SKYNET', 'Skynet', 'https://www.skynetwwe.info/'),
(6, 'BLUEDART', 'BlueDart', 'https://www.bluedart.com/'),
(7, 'DPEXBD', 'Dpex BD', 'https://www.dpex.com.bd/'),
(8, 'USPS', 'USPS', 'https://www.usps.com/'),
(10, 'ELITAIRBO', 'USPS', 'https://www.eliteairborne.com/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consigneeinfo`
--

CREATE TABLE `tbl_consigneeinfo` (
  `awb` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `cname` varchar(55) NOT NULL,
  `cAddr1` varchar(55) NOT NULL,
  `cAddr2` varchar(55) NOT NULL,
  `cAddr3` varchar(55) NOT NULL,
  `cAddr4` varchar(55) NOT NULL,
  `cphone` varchar(55) NOT NULL,
  `ccity` varchar(55) NOT NULL,
  `ccountry` varchar(55) NOT NULL,
  `czip` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_consigneeinfo`
--

INSERT INTO `tbl_consigneeinfo` (`awb`, `reference`, `cname`, `cAddr1`, `cAddr2`, `cAddr3`, `cAddr4`, `cphone`, `ccity`, `ccountry`, `czip`) VALUES
(1446072118, '001', 'Karim', 'house2 ', 'Sylhet', 'Sylhet', 'gdfsa', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072120, '002', 'Kamal Ahmed', 'house2 ', 'Sylhet', 'Sylhet', 'Rajnagar', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072122, '006', 'Jamal Uddin', 'house2 ', 'Sylhet', 'Sylhet', 'Upashahar', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072123, '007', 'Karim', 'house2', 'Sylhet', 'Sylhet', 'gdfsa', '01700000000', 'Sylhet', 'Bangladesh', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginhistory`
--

CREATE TABLE `tbl_loginhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `datee` datetime NOT NULL,
  `browser` varchar(255) NOT NULL,
  `status` int(55) NOT NULL,
  `active` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_loginhistory`
--

INSERT INTO `tbl_loginhistory` (`id`, `username`, `ip`, `datee`, `browser`, `status`, `active`) VALUES
(3, 'kasim', '::1', '2021-06-12 14:51:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(8, 'kashim01 ', '::1', '2021-06-12 20:34:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(19, 'kashim01 ', '::1', '2021-06-13 00:52:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(20, 'kaw12', '::1', '2021-06-13 00:54:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(21, 'kaw12', '::1', '2021-06-13 00:54:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(26, 'kashim01 ', '::1', '2021-06-13 12:19:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(28, 'kashim01 ', '::1', '2021-06-13 12:22:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(29, 'foyez', '::1', '2021-06-13 12:25:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(48, 'jamal01', '::1', '2021-06-13 17:54:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(49, 'admin ', '::1', '2021-06-13 17:55:06', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(50, 'admin ', '::1', '2021-06-14 11:30:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(51, 'sylhex', '::1', '2021-06-14 12:46:54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(52, 'sylhex', '::1', '2021-06-14 12:47:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(53, 'sylhex', '::1', '2021-06-14 12:48:17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(54, 'jamal01 ', '::1', '2021-06-14 13:03:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(55, 'karim ', '::1', '2021-06-14 13:04:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(56, 'karim ', '::1', '2021-06-14 13:04:43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(57, 'admin ', '::1', '2021-06-14 13:05:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(58, 'admin ', '::1', '2021-06-14 19:43:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(59, 'admin ', '::1', '2021-06-15 08:40:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(60, 'sylhex', '::1', '2021-06-15 11:52:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(61, 'admin ', '::1', '2021-06-15 11:53:52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 0, 0),
(62, 'admin ', '::1', '2021-06-15 12:23:07', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 0, 0),
(63, 'admin ', '::1', '2021-06-15 12:30:48', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 0, 0),
(64, 'admin ', '::1', '2021-06-15 14:03:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 0, 0),
(65, 'admin ', '::1', '2021-06-24 14:28:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 0, 0),
(66, 'admin ', '::1', '2021-06-24 14:29:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 0, 0),
(67, 'sabbir01', '::1', '2021-06-24 14:31:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 0, 0),
(68, 'admin ', '::1', '2021-06-26 11:18:09', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 0, 0),
(69, 'admin ', '::1', '2021-06-26 11:33:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 0, 0),
(70, 'admin ', '::1', '2021-09-20 17:14:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receiver`
--

CREATE TABLE `tbl_receiver` (
  `receiverid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_receiver`
--

INSERT INTO `tbl_receiver` (`receiverid`, `name`, `email`, `phone`) VALUES
('001', 'Sandip Roy', 'example@gmail.com ', '0170000111'),
('002', 'Rukon Ahmed', 'example@gmail.com ', '017xxxxxxx1'),
('003', 'Parvez Ahmed', 'alex@gmail.com', '01700000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `sl` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`sl`, `name`, `label`, `company`) VALUES
(5, 'ARAMEX', 'Aramex ', 'USPS'),
(7, 'SKYNET', 'DHL ', 'Skynet'),
(8, 'FEDEX', 'Fedex ', 'Skynet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipingedithistory`
--

CREATE TABLE `tbl_shipingedithistory` (
  `awb` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `editedAt` datetime DEFAULT NULL,
  `createdBy` varchar(255) NOT NULL,
  `editedBy` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipingedithistory`
--

INSERT INTO `tbl_shipingedithistory` (`awb`, `reference`, `createdAt`, `editedAt`, `createdBy`, `editedBy`, `location`, `activity`) VALUES
(0, '001', NULL, '2021-06-15 10:26:26', '', 'Admin Ali', '', ''),
(1446072118, '001', NULL, '2021-06-15 10:40:29', '', 'Admin Ali', '', ''),
(1446072118, '001', NULL, '2021-06-15 10:40:43', '', 'Admin Ali', '', ''),
(1446072120, '002', NULL, '2021-06-15 10:43:52', '', 'Admin Ali', '', ''),
(1446072118, '001', NULL, '2021-06-15 11:02:11', '', 'Admin Ali', '', ''),
(1446072122, '006', NULL, '2021-06-15 11:16:13', '', 'Admin Ali', '', ''),
(1446072125, '0009', NULL, '2021-06-15 12:00:29', '', 'Admin Ali', '', ''),
(1446072126, '00014', NULL, '2021-06-15 12:24:38', '', 'Admin Ali', '', ''),
(1446072126, '00014', NULL, '2021-06-15 12:26:04', '', 'Admin Ali', '', ''),
(1446072118, '001', NULL, '2021-06-24 14:37:20', '', 'Sabbir Ahmed', '', ''),
(1446072118, '001', NULL, '2021-06-24 14:37:26', '', 'Sabbir Ahmed', '', ''),
(1446072118, '001', NULL, '2021-06-24 14:38:09', '', 'Sabbir Ahmed', '', ''),
(1446072118, '001', NULL, '2021-06-24 14:38:41', '', 'Sabbir Ahmed', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipperinfo`
--

CREATE TABLE `tbl_shipperinfo` (
  `awb` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `sname` varchar(55) NOT NULL,
  `sAddr1` varchar(55) NOT NULL,
  `sAddr2` varchar(55) NOT NULL,
  `sAddr3` varchar(55) NOT NULL,
  `sAddr4` varchar(55) NOT NULL,
  `sphone` varchar(55) NOT NULL,
  `scity` varchar(55) NOT NULL,
  `scountry` varchar(55) NOT NULL,
  `szip` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shipperinfo`
--

INSERT INTO `tbl_shipperinfo` (`awb`, `reference`, `sname`, `sAddr1`, `sAddr2`, `sAddr3`, `sAddr4`, `sphone`, `scity`, `scountry`, `szip`) VALUES
(1446072118, '001', 'Jamal Miah', 'Moulvibazar ', 'Sylhet', 'Sylhet', 'Home', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072120, '002', 'Jamal Miah', 'Rongmahal ', 'Sylhet', 'Sylhet', 'Upashahar', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072122, '006', 'Kamal Hussain', 'Moulvibazar ', 'Sylhet', 'Sylhet', 'Shibgonj', '01700000000', 'Sylhet', 'Bangladesh', '123'),
(1446072123, '007', 'Jamal Miah', 'Moulvibazar', 'Sylhet', 'Sylhet', 'Home', '01700000000', 'Sylhet', 'Bangladesh', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shippingupdatehistory`
--

CREATE TABLE `tbl_shippingupdatehistory` (
  `id` int(11) NOT NULL,
  `awb` int(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `datee` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shippingupdatehistory`
--

INSERT INTO `tbl_shippingupdatehistory` (`id`, `awb`, `reference`, `company`, `location`, `activity`, `datee`) VALUES
(2, 1446072120, '002', 'BLUEDART,BlueDart', '', '', '2021-06-15 11:28:13'),
(3, 1446072120, '002', 'BLUEDART,BlueDart', 'Zindabazar', 'Booked', '2021-06-15 11:28:23'),
(4, 1446072118, '001', 'SKYNET,Skynet', 'zindabazar', 'Shipped', '2021-06-15 11:39:16'),
(5, 1446072118, '001', 'SKYNET,Skynet', 'zindabazar', 'Shipped', '2021-06-15 11:41:35'),
(9, 1446072118, '001', 'SKYNET,Skynet', 'zindabazar', 'Shipped', '2021-06-15 11:45:50'),
(10, 1446072123, '007', 'PARCELFORCE,Parcelforce', 'Zindabazar', 'Shipment Booked', '2021-06-15 12:02:29'),
(12, 1446072126, '00014', 'PARCELFORCE,Parcelforce', 'Zindabazar', 'Shipment Booked', '2021-06-15 12:26:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tbl_billinginfo`
--
ALTER TABLE `tbl_billinginfo`
  ADD PRIMARY KEY (`awb`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tbl_consigneeinfo`
--
ALTER TABLE `tbl_consigneeinfo`
  ADD PRIMARY KEY (`awb`);

--
-- Indexes for table `tbl_loginhistory`
--
ALTER TABLE `tbl_loginhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tbl_shipperinfo`
--
ALTER TABLE `tbl_shipperinfo`
  ADD PRIMARY KEY (`awb`);

--
-- Indexes for table `tbl_shippingupdatehistory`
--
ALTER TABLE `tbl_shippingupdatehistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `sl` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_billinginfo`
--
ALTER TABLE `tbl_billinginfo`
  MODIFY `awb` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1446072127;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `sl` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_consigneeinfo`
--
ALTER TABLE `tbl_consigneeinfo`
  MODIFY `awb` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1446072127;

--
-- AUTO_INCREMENT for table `tbl_loginhistory`
--
ALTER TABLE `tbl_loginhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shipperinfo`
--
ALTER TABLE `tbl_shipperinfo`
  MODIFY `awb` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1446072127;

--
-- AUTO_INCREMENT for table `tbl_shippingupdatehistory`
--
ALTER TABLE `tbl_shippingupdatehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
