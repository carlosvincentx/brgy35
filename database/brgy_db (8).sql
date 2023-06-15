-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 06:08 PM
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
-- Database: `brgy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `b_id` int(11) NOT NULL,
  `rbi_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `beneficiaries`
--

INSERT INTO `beneficiaries` (`b_id`, `rbi_id`, `head_id`) VALUES
(1, 48, 34),
(2, 58, 36),
(3, 60, 37),
(4, 62, 38),
(5, 64, 39),
(6, 66, 40),
(7, 69, 41),
(8, 69, 41),
(9, 72, 42),
(10, 72, 42),
(11, 74, 43),
(12, 75, 43),
(13, 77, 44),
(14, 79, 45),
(15, 81, 46),
(16, 83, 47),
(17, 85, 48),
(18, 87, 49),
(19, 89, 50),
(20, 91, 51),
(21, 93, 52),
(22, 95, 53),
(23, 98, 54),
(24, 99, 54),
(25, 103, 55),
(26, 104, 55),
(27, 108, 56),
(28, 111, 57),
(29, 117, 61),
(30, 120, 62),
(31, 123, 63),
(32, 126, 0),
(33, 128, 0),
(34, 130, 0),
(35, 132, 0),
(36, 134, 0),
(37, 136, 69),
(38, 139, 70),
(39, 142, 71),
(40, 145, 72),
(41, 147, 73),
(42, 149, 74),
(43, 157, 81),
(44, 160, 82),
(45, 163, 83),
(46, 164, 83),
(47, 165, 83),
(48, 168, 84),
(49, 171, 85),
(50, 174, 86),
(51, 177, 87),
(52, 179, 88),
(53, 182, 89);

-- --------------------------------------------------------

--
-- Table structure for table `brgyofficials`
--

CREATE TABLE `brgyofficials` (
  `id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `date_employment` varchar(200) DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brgyofficials`
--

INSERT INTO `brgyofficials` (`id`, `position`, `name`, `contact`, `address`, `date_employment`, `date_registered`) VALUES
(8, 'Secretary', 'Mae mae', '212', '259 M.L.Q ST P-4 LOWER BICUTAN', 'dzxcxcxcvcvcv', '2023-05-24 23:28:41'),
(12, 'Secretary', 'medical_dbcvvx', '21276', '259 M.L.Q ST P-4 LOWER BICUTAN', 'dzzc', '2023-05-24 23:40:33'),
(15, 'ukjkjkj', 'jjkjk', 'kjkjjk', 'kikkl', 'loklkl', '2023-05-27 18:47:18'),
(16, 'mll', '\';lk', 'jkm', 'oplkm,', 'okl', '2023-05-27 18:47:33'),
(17, 'jk,jkjk', 'olkkl', 'm,m,', 'km,k', 'klkk', '2023-05-27 18:47:48'),
(18, 'okkl', 'jkjkj', 'ijkk', 'kjkk', 'iokkj', '2023-05-27 18:48:03'),
(19, 'njkm,m', 'jkjkjk', 'njmnmnm', 'nnmmn', 'jjjkjkkj', '2023-05-27 18:48:25'),
(20, 'nmnmnm', 'njnmnmmn', 'nmnmnm', 'jknnnm', 'nnmmn', '2023-05-27 18:48:38'),
(21, 'nnmnm', 'nmnmnm', 'mm,m,', 'nmmnn', 'nm mn', '2023-05-27 18:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_account`
--

CREATE TABLE `brgy_account` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `about` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `about`, `post`, `location`, `date_from`, `date_to`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(61, 'fddfs', 'sdsasasasa ', 'dfddf', '2023-05-10', '2023-05-18', '18:06:00', '18:07:00', NULL, NULL),
(62, 'bjkb njgnjkfgbkj', 'CVXXC cxcc', 'CVXCXC', '2023-05-20', '2023-06-09', '14:49:00', '14:52:00', NULL, NULL),
(64, 'bjkb njgnjkfgbkj', 'cxc ', 'xxcc', '2023-05-11', '2023-05-19', '17:02:00', '21:58:00', NULL, NULL),
(65, 'bjkb njgnjkfgbkj', 'cxc ', 'xxcc', '2023-05-11', '2023-05-19', '17:02:00', '21:58:00', NULL, NULL),
(66, 'Pakain sa mga Bata', 'xcxzxxz', ' Baranggay Hall, l; l;ll', '2023-05-04', '2023-05-19', '06:02:00', '06:00:00', NULL, NULL),
(67, 'bjkb njgnjkfgbkj', 'c cxcxcc', 'cxcxxc', '2023-05-13', '2023-05-06', '05:20:00', '05:21:00', NULL, NULL),
(68, 'bjkb njgnjkfgbkj', 'c cxcxcc', 'cxcxxc', '2023-05-13', '2023-05-06', '05:20:00', '05:21:00', NULL, NULL),
(69, 'bjkb njgnjkfgbkj', 'fddfd', 'jjjjjj', '2023-05-10', '2023-05-27', '05:20:00', '05:21:00', NULL, NULL),
(70, 'bjkb njgnjkfgbkj', 'fddfd', 'jjjjjj', '2023-05-10', '2023-05-27', '05:20:00', '05:21:00', NULL, NULL),
(71, 'Pakain sa mga Bata', 'cvcvcvcv', 'cvcvcvcvcv', '2023-06-20', '2023-06-21', '05:30:00', '05:27:00', NULL, NULL),
(72, 'Hello Po', 'xcxcxc', 'cccc', '2023-06-17', '2023-06-16', '22:29:00', '22:31:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_announcement`
--

CREATE TABLE `event_announcement` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_announcement`
--

INSERT INTO `event_announcement` (`id`, `event_id`) VALUES
(15, 25),
(16, 40),
(17, 41),
(18, 42),
(19, 43),
(20, 44),
(21, 45),
(22, 46),
(23, 47),
(24, 48),
(25, 49),
(26, 50),
(27, 51),
(28, 52),
(29, 53),
(30, 54),
(31, 55),
(32, 56),
(33, 57),
(34, 58),
(35, 62),
(37, 69),
(38, 70),
(39, 71);

-- --------------------------------------------------------

--
-- Table structure for table `head_family`
--

CREATE TABLE `head_family` (
  `head_id` int(11) NOT NULL,
  `rbi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `head_family`
--

INSERT INTO `head_family` (`head_id`, `rbi_id`) VALUES
(22, 36),
(23, 37),
(24, 38),
(25, 39),
(26, 40),
(27, 41),
(42, 70),
(43, 0),
(44, 0),
(45, 0),
(47, 82),
(48, 84),
(49, 86),
(50, 0),
(51, 90),
(52, 92),
(53, 94),
(54, 97),
(55, 102),
(56, 107),
(57, 110),
(58, 113),
(59, 114),
(60, 115),
(61, 116),
(62, 119),
(63, 122),
(64, 125),
(65, 127),
(66, 129),
(67, 131),
(68, 133),
(69, 135),
(70, 138),
(71, 141),
(72, 144),
(73, 146),
(74, 148),
(75, 150),
(76, 151),
(77, 152),
(78, 153),
(79, 154),
(80, 155),
(81, 156),
(82, 159),
(83, 162),
(84, 167),
(85, 170),
(86, 173),
(87, 176),
(88, 178),
(89, 181);

-- --------------------------------------------------------

--
-- Table structure for table `head_family_restore`
--

CREATE TABLE `head_family_restore` (
  `head_id` int(11) NOT NULL,
  `rbi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `head_family_restore`
--

INSERT INTO `head_family_restore` (`head_id`, `rbi_id`) VALUES
(46, 80),
(43, 73),
(44, 76),
(45, 78),
(50, 88);

-- --------------------------------------------------------

--
-- Table structure for table `immediatemember`
--

CREATE TABLE `immediatemember` (
  `im_id` int(11) NOT NULL,
  `rbi_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `immediatemember`
--

INSERT INTO `immediatemember` (`im_id`, `rbi_id`, `head_id`) VALUES
(1, 21, 52),
(2, 96, 53),
(3, 100, 54),
(4, 101, 54),
(5, 105, 55),
(6, 106, 55),
(7, 109, 56),
(8, 112, 57),
(9, 118, 61),
(10, 121, 62),
(11, 124, 63),
(12, 137, 69),
(13, 140, 70),
(14, 143, 71),
(15, 158, 81),
(16, 161, 82),
(17, 166, 83),
(18, 169, 84),
(19, 172, 85),
(20, 175, 86),
(21, 180, 88),
(22, 183, 89);

-- --------------------------------------------------------

--
-- Table structure for table `messageresident`
--

CREATE TABLE `messageresident` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messageresident`
--

INSERT INTO `messageresident` (`id`, `resident_id`, `content`, `created_at`) VALUES
(2, 1, 'Hi sir', '2023-05-08 05:05:38'),
(3, 1, 'Good afternoon', '2023-05-08 05:05:38'),
(4, 2, 'Good day sir', '2023-05-08 05:05:38'),
(5, 3, 'Hi', '2023-05-08 05:05:38'),
(6, 4, 'Sir?', '2023-05-08 05:05:38'),
(7, 1, 'Good day', '2023-05-08 05:05:38'),
(8, 7, 'dfcsds', '2023-05-25 15:09:54'),
(9, 7, 'vxxcxx', '2023-05-25 15:10:02'),
(10, 7, 'dfccxxcxc', '2023-05-25 15:10:13'),
(11, 7, 'dfccxxcxc', '2023-05-25 15:12:34'),
(12, 0, 'cvcxc', '2023-05-25 15:12:39'),
(13, 0, 'cdjxjoxcjijo', '2023-05-25 15:12:47'),
(14, 0, 'cxcc', '2023-05-25 16:02:36'),
(15, 0, 'hgghgh', '2023-05-25 16:39:35'),
(16, 1, 'hgghgh', '2023-05-25 16:40:02'),
(17, 1, 'nhbn', '2023-05-25 16:40:05'),
(18, 1, 'nhbn', '2023-05-25 16:40:10'),
(19, 1, 'ccxxcxc', '2023-05-30 11:09:37'),
(20, 1, 'ccxxcxc', '2023-05-30 11:11:15'),
(21, 6, 'xcxcx', '2023-05-30 11:12:34'),
(22, 6, 'fcdcxxc', '2023-05-30 11:12:37'),
(23, 6, 'cxccxxc', '2023-05-30 11:12:41'),
(24, 6, 'cxxcxc', '2023-05-30 11:12:44'),
(25, 6, 'cxxcxc', '2023-05-30 11:14:25'),
(26, 6, 'xcxcxc', '2023-05-30 11:14:31'),
(27, 6, 'h', '2023-05-30 11:14:36'),
(28, 6, 'h', '2023-05-30 11:15:23'),
(29, 6, 'h', '2023-05-30 11:15:54'),
(30, 6, 'h', '2023-05-30 11:17:17'),
(31, 6, 'h', '2023-05-30 11:17:31'),
(32, 6, 'cxcxcxcx', '2023-05-30 11:28:20'),
(33, 6, 'ccxxcx', '2023-05-30 11:28:22'),
(34, 6, 'cxcxcxxc', '2023-05-30 11:28:26'),
(35, 6, 'Hi hello po', '2023-05-30 11:28:32'),
(36, 6, 'Hi hello po', '2023-05-30 11:29:04'),
(37, 6, 'hiii', '2023-05-30 11:29:14'),
(38, 6, 'hiii', '2023-05-30 11:29:19'),
(39, 6, 'hiii', '2023-05-30 11:29:34'),
(40, 6, 'hiii', '2023-05-30 11:37:05'),
(41, 6, 'hiii', '2023-05-30 11:37:50'),
(42, 6, 'hiii', '2023-05-30 11:38:10'),
(43, 6, 'hiii', '2023-05-30 11:38:17'),
(44, 6, 'cxcxc', '2023-05-30 11:38:23'),
(45, 6, 'cxcxc', '2023-05-30 11:38:27'),
(46, 6, 'dfdcx', '2023-06-04 08:31:03'),
(47, 6, 'dvcvccccvcc', '2023-06-04 08:31:07'),
(48, 19, 'cxcccv', '2023-06-05 12:52:02'),
(49, 19, 'vccvcvcvcv', '2023-06-05 14:08:00'),
(50, 19, 'vcvvccv', '2023-06-05 14:08:03'),
(51, 19, 'vvcvvc', '2023-06-05 14:08:09'),
(52, 19, 'Hi', '2023-06-05 14:08:14'),
(53, 19, 'Hello', '2023-06-05 14:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `rbi`
--

CREATE TABLE `rbi` (
  `rbi_id` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_household` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `yearStay` int(11) NOT NULL,
  `address_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `street_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `placeBirth` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateBirth` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `civilStatus` varchar(100) NOT NULL,
  `voter` varchar(255) NOT NULL,
  `citezenship` varchar(255) NOT NULL,
  `occupation` varchar(225) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rbi`
--

INSERT INTO `rbi` (`rbi_id`, `fullname`, `type_household`, `date_registered`, `yearStay`, `address_no`, `street_name`, `placeBirth`, `dateBirth`, `age`, `sex`, `civilStatus`, `voter`, `citezenship`, `occupation`, `categories`) VALUES
(42, ' athea chess', ' athea chess', '2023-04-12', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xcvcvcvx', ' vbcvbcv', '2023-04-04', 5, 'Female', 'Married', ' vxxcv', ' fdfd ', 'dfdf', 'PWD'),
(43, 'dvfchv zhcgchg ', 'dvfchv zhcgchg ', '2023-05-04', 10, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xcvcvcvx', ' vxvxvc', '2023-04-04', 10, 'Male', 'Single', ' rtggfd', ' fdfd ', 'Student', 'Senior Citezen'),
(44, ' Mae mae', ' Mae mae', '2023-04-14', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xcvcvcvx', ' vxvxvc', '2023-03-28', 3, 'Female', 'Married', ' rtggfd', ' Filipino ', 'dfdf', 'Senior Citezen'),
(45, ' icicz', '  dcijziczo', '2023-05-02', 3, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' vbcvbcv', '2023-04-28', 122, 'Male', 'Single', ' vxxcv', ' fdfd ', 'xcxvcv', 'PWD'),
(46, ' xzcxzc', '   xv xcvxcvcddvxcdfvdf', '2023-04-21', 6, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' bdddgh', '2023-04-28', 6, 'Male', 'Single', ' vxxcv', ' xcvxc ', 'dfgghgth', 'Senior Citezen'),
(47, 'Athea', 'Owner', '2023-05-06', 6, '259 M.L.Q ST P-4 LOWER BICUTANvbvbvb', ' xccxxcvcvcvx', ' bdddgh', '2023-04-26', 7, 'Male', 'Single', ' c  xxcv', ' fdfd ', 'xcvxcv', '<?php echo $Senior Citezen ; ?>'),
(48, 'Athea marie Deocampo Hisu-an', '   xv xcvxcvcddvxcdfvdf', '2023-05-18', 5, '259 M.L.Q ST P-4 LOWER BICUTAN', 'vccvcvcv', 'vcvcvv', '2023-05-03', 4, 'Male', 'Married', 'vxxcv', '', 'xcxvcv', 'Senior Citezen'),
(49, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(50, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(51, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(52, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(53, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(54, 'xv xcvxcvc', '', '0000-00-00', 0, '3434', '259 M.L.Q ST P-4 LOW', '334', '2023-05-16', 34, '434', '44', '34', '43', '34', ''),
(55, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(56, 'xv xcvxcvc', '', '0000-00-00', 0, '3434', '259 M.L.Q ST P-4 LOW', '334', '2023-05-16', 34, '434', '44', '34', '43', '34', ''),
(57, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(58, 'xv xcvxcvc', '', '0000-00-00', 0, '3434', '259 M.L.Q ST P-4 LOW', '334', '2023-05-16', 34, '434', '44', '34', '43', '34', ''),
(59, ' Athea marie Deocampo Hisu-an', '  cxcx', '2023-05-11', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-19', 12, 'Female', 'Married', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(60, 'xv xcvxcvc', '', '0000-00-00', 0, '3434', '259 M.L.Q ST P-4 LOW', '334', '2023-05-16', 34, '434', '44', '34', '43', '34', ''),
(61, ' Athea marie Deocampo Hisu-an', '  fdcxxc', '2023-05-16', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-17', 7, 'Male', 'Single', ' rtggfd', ' fdfd ', 'Student', 'Senior Citezen'),
(62, 'vccv', '', '0000-00-00', 0, 'ddssd', '259 M.L.Q ST P-4 LOW', 'cvcvv', '2023-05-09', 23, '434', 'cc', '23', '4434', '34', ''),
(63, ' Athea marie Deocampo Hisu-an', '   xv xcvxcvcddvxcdfvdf', '2023-05-24', 15, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-16', 7, 'Female', 'Married', ' c  xxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(64, 'xv xcvxcvc', '', '0000-00-00', 0, 'fdcdffdfd', '259 M.L.Q ST P-4 LOW', 'cvvccvcvv', '2023-05-30', 34, '434', '3434', '34', '43', '343434', ''),
(65, 'cxxcxc', 'Athea', '2023-06-02', 16, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-18', 23, 'Female', 'Single', ' vxxcv', ' xcvxc ', 'dfgghgth', 'Senior Citezen'),
(66, 'cxxccxxcxcddcxc', '', '0000-00-00', 0, 'xcxcxc', '259 M.L.Q ST P-4 LOW', 'cvvccvcvv', '2023-05-29', 1221, '', '44', '34', '', '34', ''),
(67, ' Athea marie Deocampo Hisu-an', ' Athea marie Deocampo Hisu-an', '2023-05-25', 17, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vxvxvc', '2023-05-16', 17, 'Male', 'Single', ' c  xxcv', ' xcvxc ', 'xcxvcv', 'Senior Citezen'),
(68, 'vccvcv', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(69, 'xv xcvxcvc', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', 'x', '', ''),
(70, ' Athea marie Deocampo Hisu-an', 'Owner', '2023-05-18', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-16', 16, 'Male', 'Single', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(71, 'medical_db', '', '0000-00-00', 0, '', 'vccvcv', '', '0000-00-00', 0, '', '', '', '', '', ''),
(72, 'Acxcxc', '', '0000-00-00', 0, 'cxxcxccxcxccxx', 'xccxc', 'cxxcxcccxccxcxcx', '0000-00-00', 0, '', '', 'cvcvcvcvcv', 'F', '', '?'),
(73, ' Athea marie Deocampoxcxcxc Hisu-an', 'Owner', '2023-05-26', 20, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-17', 25, 'Male', 'Single', ' vxxcv', ' Filipino ', 'Student', 'Senior Citezen'),
(74, 'fgfggfcxxc', '', '0000-00-00', 0, '', 'dffdf', '', '0000-00-00', 0, '', '', '', 'F', '', ''),
(75, 'fgfggfcxxc', '', '0000-00-00', 0, '', 'dffdf', '', '0000-00-00', 0, '', '', '', 'F', '', ''),
(76, ' Athea marie Deocampo Hisu-an', '  Athea marie Deocampo Hisu-an', '2023-05-17', 13, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-16', 11, 'Male', 'Single', ' vxxcv', ' fdfd ', 'xcvxcv', 'PWD'),
(77, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(78, ' Athea marie Deocampo Hisu-an', 'Sharer', '2023-05-17', 13, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcvccx', '2023-05-16', 11, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcvxcv', '<?php echo $PWD ; ?>'),
(79, 'vccv', '', '0000-00-00', 0, 'cxcxcxc', '259 M.L.Q ST P-4 LOW', 'cxxxcxc', '0000-00-00', 0, '', '', '', '', '', ''),
(80, ' Athea marie Deocampo Hisu-an', 'Owner', '2023-05-17', 13, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-16', 11, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcvxcv', '<?php echo $PWD ; ?>'),
(81, 'vccv', '', '0000-00-00', 0, 'fdcdffdfd', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(82, ' Athea marie Deocampo Hisu-an', 'Owner', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Male', 'Single', ' vxxcv', ' fdfd ', 'xcxvcv', '<?php echo $Senior Citezen ; ?>'),
(83, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(84, ' Athea marie Deocampo Hisu-an', '  3434', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(85, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(86, ' Athea marie Deocampo Hisu-an', 'Sharer', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'PWD'),
(87, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(88, ' Athea marie Deocampo Hisu-an', '  3434', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(89, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(90, ' Athea marie Deocampo Hisu-an', '  3434', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(91, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(92, ' Athea marie Deocampo Hisu-an', ' Athea marie Deocampo Hisu-an', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(93, 'vccv', '', '0000-00-00', 0, 'cxcxc', '259 M.Lxcxc.Q ST P-4', '', '0000-00-00', 0, '', '', '', '', '', ''),
(94, ' Athea marie Deocampo Hisu-an', '  3434', '2023-05-31', 14, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-10', 13, 'Female', 'Married', ' vxxcv', ' fdfd ', 'xcxvcv', 'Senior Citezen'),
(95, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(96, 'fgfggfcxxc', '', '0000-00-00', 0, '', 'dffdf', '', '0000-00-00', 0, '', '', '', '', '', ''),
(97, ' Athea marie Deocampo Hisu-an', ' Athea marie Deocampo Hisu-an', '2023-05-24', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-18', 23, '<?php echo Female; ?>', 'Single', ' vxxcv', ' Filipino ', 'Student', 'PWD'),
(98, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', 'F', '', ''),
(99, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', 'F', '', ''),
(100, 'fgfggfcxxc', '', '0000-00-00', 0, '', 'dffdf', '', '0000-00-00', 0, '', '', '', '', '', ''),
(101, 'fgfggfcxxc', '', '0000-00-00', 0, '', 'dffdf', '', '0000-00-00', 0, '', '', '', '', '', ''),
(102, ' Athea marie Deocampo Hisu-an', ' Athea marie Deocampo Hisu-an', '2023-05-18', 2, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vbcvbcv', '2023-05-18', 1, 'Female', 'Married', 'ssa', ' xcvxc ', 'Student', 'PWD'),
(103, 'medical_db', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', 'x', '', ''),
(104, 'medical_db', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', 'x', '', ''),
(105, 'vccv', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(106, 'xv xcvxcvc', '', '0000-00-00', 0, '', '259 M.L.Q ST P-4 LOW', '', '0000-00-00', 0, '', '', '', '', '', ''),
(107, ' vccv', '  Owner', '2023-05-16', 222, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' fcvvc', '2023-05-16', 22, 'Male', 'Single', ' ssa', ' Filipino ', 'sddd', 'N/A'),
(108, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(109, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(110, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-06-08', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-05-31', 22, 'Female', 'Married', ' ccvv', ' xccxcx ', 'cxcx', 'PWD'),
(111, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(112, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(113, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-14', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-05-17', 11, 'Female', 'Single', ' ssa', ' gbggbd ', 'cxcx', 'PWD'),
(114, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-14', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-05-17', 11, 'Female', 'Single', ' ssa', ' gbggbd ', 'cxcx', 'PWD'),
(115, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-14', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-05-17', 11, 'Female', 'Single', ' ssa', ' gbggbd ', 'cxcx', 'PWD'),
(116, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-14', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-05-17', 11, 'Female', 'Single', ' ssa', ' gbggbd ', 'cxcx', 'PWD'),
(117, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(118, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(119, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-12', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vcvcvv', '2023-05-10', 22, 'Female', 'Single', ' ccvv', ' Filipino ', 'sddd', 'Senior Citezen'),
(120, 'xv xcvxcvc', '', '0000-00-00', 0, 'xcxcxc', '259 M.L.Q ST P-4 LOW', '334', '2023-06-07', 34, 'Male', 'Married', '22332', 'sxzxz', 'cxcxxc', ''),
(121, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(122, ' vbvbvb', '  Renter', '2023-05-31', 3, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-05-23', 4, 'Female', 'Single', ' ccvv', ' ccc ', 'sddd', 'PWD'),
(123, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(124, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(125, ' Athea marie Deocampo Hisu-an', '  Sharer', '2023-06-07', 32, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vcvcvv', '2023-06-14', 233, 'Female', 'Married', ' ccvv', ' Filipino ', 'Student', 'PWD'),
(126, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(127, ' Athea marie Deocampo Hisu-an', '  Renter', '2023-06-22', 12, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-22', 12, 'Female', 'Married', ' ssa', ' Filipino ', 'cxcx', 'Senior Citezen'),
(128, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(129, ' Athea marie Deocampo Hisu-an', '  Renter', '2023-06-22', 12, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-22', 12, 'Female', 'Married', ' ssa', ' Filipino ', 'cxcx', 'Senior Citezen'),
(130, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(131, ' Athea marie Deocampo Hisu-an', '  Renter', '2023-06-22', 12, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-22', 12, 'Female', 'Married', ' ssa', ' Filipino ', 'cxcx', 'Senior Citezen'),
(132, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(133, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(134, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(135, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(136, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(137, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(138, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(139, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(140, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(141, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(142, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(143, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(144, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(145, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(146, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(147, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(148, ' xv xcvxcvc', '  Owner', '2023-06-07', 23, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' sdssd', '2023-06-20', 12, 'Female', 'Single', ' ccvv', ' gbggbd ', 'cxcx', 'N/A'),
(149, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(150, ' xv xcvxcvc', '  Owner', '2023-06-12', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' vcvcvv', '2023-06-14', 22, 'Female', 'Single', ' vxxcv', ' Filipino ', 'sddd', 'PWD'),
(151, ' xv xcvxcvc', '  Owner', '2023-06-12', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' vcvcvv', '2023-06-14', 22, 'Female', 'Single', ' vxxcv', ' Filipino ', 'sddd', 'PWD'),
(152, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-30', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-05', 5, 'Female', 'Married', ' ssa', ' <br /><b>Warning</b>:  Undefined variable $citezenship in <b>C:xampphtdocsrgyBrgy_Modulecreate.php</b> on line <b>258</b><br /> ', 'Student', 'PWD'),
(153, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-30', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-05', 5, 'Female', 'Married', ' ssa', ' <br /><b>Warning</b>:  Undefined variable $citezenship in <b>C:xampphtdocsrgyBrgy_Modulecreate.php</b> on line <b>258</b><br /> ', 'Student', 'PWD'),
(154, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-30', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-05', 5, 'Female', 'Married', ' ssa', ' <br /><b>Warning</b>:  Undefined variable $citezenship in <b>C:xampphtdocsrgyBrgy_Modulecreate.php</b> on line <b>258</b><br /> ', 'Student', 'PWD'),
(155, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-30', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-05', 5, 'Female', 'Married', ' ssa', ' <br /><b>Warning</b>:  Undefined variable $citezenship in <b>C:xampphtdocsrgyBrgy_Modulecreate.php</b> on line <b>258</b><br /> ', 'Student', 'PWD'),
(156, ' Athea marie Deocampo Hisu-an', '  Owner', '2023-05-30', 4, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-05', 5, 'Female', 'Married', ' ssa', ' <br /><b>Warning</b>:  Undefined variable $citezenship in <b>C:xampphtdocsrgyBrgy_Modulecreate.php</b> on line <b>258</b><br /> ', 'Student', 'PWD'),
(157, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(158, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(159, ' Athea marie Deocampo Hisu-an', '  Renter', '2023-06-21', 34, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' vcvcvv', '2023-06-05', 32, 'Male', 'Single', ' ssa', ' gbggbd ', 'sddd', 'PWD'),
(160, 'medical_db', '', '0000-00-00', 22, 'fdcdffdfd', '259 M.L.Q ST P-4 LOW', 'cvcvv', '2023-06-19', 23, 'Male', 'Married', '22332', 'sxzxz', '343434', 'PWD'),
(161, 'AYA NOREEN DEOCAMPO hiSU-AN', '', '0000-00-00', 0, 'dssd', '259 M.L.Q ST P-4 LOW', 'dssdsd', '2023-06-29', 22, 'Female', 'Married', 'sddssd', 'cvcvcv', 'cvccvcv', 'PWD'),
(162, ' xv xcvxcvc', '  Owner', '2023-06-06', 18, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' cvcv', '2023-06-18', 22, 'Male', 'Single', '  vxxcxxc', ' gbggbd ', 'sddd', 'PWD'),
(163, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(164, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(165, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(166, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(167, ' Athea marie Deocampo Hisu-an', 'Sharer', '2023-06-21', 22, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-04', 22, 'Female', 'Married', ' ccvv', ' gbggbd ', 'sddd', 'PWD'),
(168, '', '', '0000-00-00', 22, '', '', 'xcxcxcxc', '0000-00-00', 0, '', '', '', '', '', 'Senior Citezen'),
(169, '', '', '0000-00-00', 22, '', '', '', '0000-00-00', 0, '', '', '', '', '', 'Senior Citezen'),
(170, ' Athea marie Deocampo Hisu-an', 'Renter', '2023-06-15', 5, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-22', 22, 'Male', 'Married', ' ccvv', ' ccc dscdac', 'cxcx', 'PWD'),
(171, 'medical_db', '', '0000-00-00', 0, 'dssd', '259 M.L.Q ST P-4 LOW', 'dssdsd', '2023-05-30', 22, 'Male', 'Single', 'sddssd', 'cvcvcv', 'cvccvcv', ''),
(172, 'medical_db', '', '0000-00-00', 0, 'dssd', '259 M.L.Q ST P-4 LOW', 'dssdsd', '2023-05-30', 22, 'Male', 'Single', 'sddssd', 'cvcvcv', 'cvccvcv', ''),
(173, ' Athea marie Deocampo Hisu-an', 'Renter', '2023-06-15', 5, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' bdddgh', '2023-06-22', 22, 'Male', 'Married', ' ccvv', ' ccc dcxcxc', 'cxcx', 'PWD'),
(174, 'medical_db', '', '0000-00-00', 22, 'dssd', '259 M.L.Q ST P-4 LOW', 'dssdsd', '2023-05-30', 22, 'Male', 'Single', 'sddssd', 'cvcvcv', 'cvccvcv', 'PWD'),
(175, 'medical_db', '', '0000-00-00', 22, 'dssd', '259 M.L.Q ST P-4 LOW', 'dssdsd', '2023-05-30', 22, 'Male', 'Single', 'sddssd', 'cvcvcv', 'cvccvcv', 'PWD'),
(176, ' xv xcvxcvc', '  Owner', '2023-07-02', 223, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' cvcv', '2023-06-15', 222, 'Male', 'Married', ' vxxcv', ' Filipino ', 'sddd', 'Senior Citezen'),
(177, '', '', '0000-00-00', 0, '', 'vvccv', '', '0000-00-00', 0, '', '', '', '', '', ''),
(178, ' xv xcvxcvc', '  Owner', '2023-07-02', 223, '259 M.L.Q ST P-4 LOWER BICUTAN', ' xc cxvvxv', ' cvcv', '2023-06-15', 222, 'Male', 'Married', ' vxxcv', ' Filipino ', 'sddd', 'Senior Citezen'),
(179, '', '', '0000-00-00', 0, '', 'vvccv', '', '0000-00-00', 0, '', '', '', '', '', ''),
(180, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(181, ' Athea marie Deocampo Hisu-an', '  Renter', '2023-06-10', 3, '259 M.L.Q ST P-4 LOWER BICUTAN', ' vccvcvcv', ' cvcv', '2023-06-27', 3, 'Male', 'Single', ' ccvv', ' ccc ', 'cxcx', 'PWD'),
(182, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', ''),
(183, '', '', '0000-00-00', 0, '', '', '', '0000-00-00', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rbi_restore`
--

CREATE TABLE `rbi_restore` (
  `rbi_id` int(11) NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_household` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `yearStay` int(11) NOT NULL,
  `address_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `street_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `placeBirth` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateBirth` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `civilStatus` varchar(100) NOT NULL,
  `voter` varchar(255) NOT NULL,
  `citezenship` varchar(255) NOT NULL,
  `occupation` varchar(225) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resident_account`
--

CREATE TABLE `resident_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Name` text NOT NULL,
  `password` text NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `rbi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `resident_account`
--

INSERT INTO `resident_account` (`id`, `username`, `email`, `Name`, `password`, `otp`, `otp_expiration`, `date_created`, `rbi_id`) VALUES
(3, 'Asdsd', 'atheahisuan36@gmail.com', '', '$2y$10$MJtrytEVxoWvpFjc9SDnZewgLRS8Ui7yJsDeDXp7yaiLV5.ASywdO', NULL, NULL, '2023-05-26 00:09:50', 1),
(4, 'cvcvcvcv', '', '', '', NULL, NULL, '2023-05-29 02:33:08', 0),
(5, 'vccvcvcv', '', '', '', NULL, NULL, '2023-05-29 02:33:08', 0),
(6, 'Athea marie d. Hisu-an', 'atheahisuan366@gmail.com', '', '$2y$10$XaQEt7Q.Xx8idKYBzYhtW.E7s5c/FHR47iovy8MVqmToKkO1MIwD2', '383880', '2023-06-04 04:48:00', '2023-05-30 19:04:18', 182),
(7, 'Administrator', 'danielogana151@com', '', '$2y$10$TRmx4moIdwS4zHs08vbgAO6lQPlOQ4lvcJENrubbZTsIbR5Jc6jpe', '543743', '2023-06-03 16:32:00', '2023-06-03 22:31:29', 0),
(8, 'Administrator', 'atheahisuan366@gmail.com', '', '$2y$10$G/BkZE6XR/1eUkZySKZi.eWPuUupFOBMnx6AG9TxfEw4ZqOc1esk.', NULL, NULL, '2023-06-04 10:42:42', 0),
(9, 'Administrator', 'atheahisuan366@gmail.com', '', '$2y$10$Mn9WqA62O8bnrD58kd9gLualeouYNCbKlpkbgdFngksvU49xwGSFe', NULL, NULL, '2023-06-04 10:46:12', 0),
(19, 'xcnxcjncxjn', 'ayanoreen14@gmail.com', '', '$2y$10$psMAEPd8fdm4CGLuNeTPvOuDSDwBBjMRXXcpu/Wn9TRxQAHXDKKwq', NULL, NULL, '2023-06-05 20:37:06', 0),
(20, 'cdcxxccx', 'ayanoreen14@gmail.com', '', '$2y$10$1F9uht4.cjOjAhvTeIVzK.IGNmXBBJKBQaOu5SRX2EBXTfHGlSAiq', NULL, NULL, '2023-06-05 20:53:30', 0),
(21, 'Athea marie d. Hisu-an', 'ayanoreen14@gmail.com', '', '$2y$10$PEHwrXysqaw4gAt59N/LnOW1klJctHsuqh5ifc.wwDwfDe6RMsiv6', NULL, NULL, '2023-06-05 20:57:48', 0),
(22, 'Athea marie d. Hisu-an', 'ayanoreen14@gmail.com', '', '$2y$10$61oVRm1CmOfrvR6kwVr.UO73riKE4zmbZk1ncM0prFXm4kHjNxqdi', NULL, NULL, '2023-06-05 20:59:18', 0),
(23, 'Athea marie d. Hisu-an', 'ayanoreen14@gmail.com', '', '$2y$10$86bvO.Yb1es90dLXzeHGn.D6I0A./eCtJlJAh/ofaCuqf.Bp0N5JK', NULL, NULL, '2023-06-05 20:59:40', 0),
(24, 'Athea marie d. Hisu-an', 'ayanoreen14@gmail.com', '', '$2y$10$lbvglfDqVFXbyh8uWF0bUuVXpTMKlFaHsPHPtR3G5cVfRZ5uW1fjC', NULL, NULL, '2023-06-05 21:01:26', 0),
(25, 'sdsddsd', 'ayanoreen14@gmail.com', '', '$2y$10$BNYol9fqF2Pxn14Rr4XA0uPfoajLGcoQIf5/hLaXbxdnXYZOv0KFe', NULL, NULL, '2023-06-05 21:03:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resident_announcement`
--

CREATE TABLE `resident_announcement` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `resident_account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `resident_announcement`
--

INSERT INTO `resident_announcement` (`id`, `event_id`, `resident_account_ID`) VALUES
(16, 61, 1),
(17, 64, 6),
(18, 65, 3),
(19, 66, 6),
(20, 67, 5),
(21, 68, 3),
(22, 72, 3);

-- --------------------------------------------------------

--
-- Table structure for table `responsebrgy`
--

CREATE TABLE `responsebrgy` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `messageResident_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `responsebrgy`
--

INSERT INTO `responsebrgy` (`id`, `content`, `messageResident_id`, `created_at`) VALUES
(1, 'dfddff', 2, '2023-05-08 22:07:18'),
(2, 'fddfdfd', 3, '2023-05-08 22:07:18'),
(3, 'fddfdffd', 7, '2023-05-07 22:07:04'),
(4, 'xcxcxccx', 3, '2023-05-08 22:28:05'),
(5, 'cxcxxccxcxc', 7, '2023-05-08 23:45:05'),
(6, 'ccxxcxc', 7, '2023-05-08 23:45:31'),
(7, 'cvxcxccx', 7, '2023-05-08 23:45:38'),
(8, 'Athea', 7, '2023-05-08 23:45:44'),
(9, 'hu', 7, '2023-05-08 23:48:56'),
(10, 'good daya', 7, '2023-05-08 23:49:22'),
(11, 'good day', 4, '2023-05-08 23:50:29'),
(12, 'Mabuhay', 24, '2023-05-08 23:50:39'),
(13, 'cx', 24, '2023-05-25 13:31:43'),
(14, 'cxc', 25, '2023-05-27 10:32:20'),
(15, 'h', 0, '2023-05-30 11:20:04'),
(16, 'h', 0, '2023-05-30 11:20:46'),
(17, 'h', 0, '2023-05-30 11:21:14'),
(18, 'h', 0, '2023-05-30 11:21:47'),
(19, 'h', 0, '2023-05-30 11:22:14'),
(20, 'h', 0, '2023-05-30 11:25:04'),
(21, 'h', 0, '2023-05-30 11:26:12'),
(22, 'cvxcxccx', 31, '2023-05-30 11:26:21'),
(23, 'cxcxcxcx', 31, '2023-05-30 11:26:27'),
(24, 'fddfffd', 47, '2023-06-05 14:01:10'),
(25, 'dffdff', 48, '2023-06-05 14:01:16'),
(26, 'fdffdfd', 48, '2023-06-05 14:01:20'),
(27, 'fdfdfd', 48, '2023-06-05 14:01:23'),
(28, 'fdffff', 47, '2023-06-05 14:01:27'),
(29, 'ffff', 48, '2023-06-05 14:01:29'),
(30, 'ffff', 48, '2023-06-05 14:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiration` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `otp`, `otp_expiration`, `date_created`) VALUES
(148, 'cxxcxcxc ndjdssdbdjb', 'atheahisuan36@gmail.com', '$2y$10$ktKS/YvV/DfE29IFpd7AeOxxFJjUPRA4U64VHIGX0uQvQMNfJXuya', NULL, NULL, '2023-05-27 13:52:55'),
(149, 'cxcxc', 'Atheahisuan@gmail.comuiuib', '$2y$10$ijpfrWt/J5UuBfRt8uz1aeVir/RKpwui7NNOpQfcuumOYGdG10nPu', '707857', '2023-05-28 12:54:00', '2023-05-28 18:53:28'),
(150, 'Administratorf', 'atheahisuanv36@gmail.com', '$2y$10$TiCl.kNF6.6WIAKZUdZ85eBUdjda3XaFGcDU3ylfYfC.yKCemljOq', NULL, NULL, '2023-05-30 04:49:15'),
(151, 'Marie', 'atheahisuan316@gmail.com', '$2y$10$kcc9f5hON0aQwrk0WYUb7.8QOdg.4BdXCO8ywRDVYoHh.qiJpKkvS', '068781', '2023-05-31 23:07:00', '2023-06-01 05:06:21'),
(152, 'Administrator', 'atheahisuan367@gmail.com', '$2y$10$LAxhA.0bq9fdORX0UI9rf.f5YT2/GR8.xWCtVZoAqPh3kubG4aFkG', '472761', '2023-06-04 10:22:00', '2023-06-04 16:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `brgy_account`
--
ALTER TABLE `brgy_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_announcement`
--
ALTER TABLE `event_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_family`
--
ALTER TABLE `head_family`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `immediatemember`
--
ALTER TABLE `immediatemember`
  ADD PRIMARY KEY (`im_id`);

--
-- Indexes for table `messageresident`
--
ALTER TABLE `messageresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rbi`
--
ALTER TABLE `rbi`
  ADD PRIMARY KEY (`rbi_id`);

--
-- Indexes for table `resident_account`
--
ALTER TABLE `resident_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_announcement`
--
ALTER TABLE `resident_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsebrgy`
--
ALTER TABLE `responsebrgy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brgy_account`
--
ALTER TABLE `brgy_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `event_announcement`
--
ALTER TABLE `event_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `head_family`
--
ALTER TABLE `head_family`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `immediatemember`
--
ALTER TABLE `immediatemember`
  MODIFY `im_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messageresident`
--
ALTER TABLE `messageresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rbi`
--
ALTER TABLE `rbi`
  MODIFY `rbi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `resident_account`
--
ALTER TABLE `resident_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `resident_announcement`
--
ALTER TABLE `resident_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `responsebrgy`
--
ALTER TABLE `responsebrgy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
