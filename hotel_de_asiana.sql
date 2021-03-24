-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 07:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_de_asiana`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `a`
-- (See below for the actual view)
--
CREATE TABLE `a` (
`Guest_Id` int(11)
,`Check_In_Date` timestamp
,`Check_Out_Date` date
,`Guest_Type` varchar(11)
,`NAME` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `Room_Id` int(11) NOT NULL,
  `Guest_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `allocate`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--   `Room_Id`
--       `room` -> `Room_No`
--

--
-- Dumping data for table `allocate`
--

INSERT INTO `allocate` (`Room_Id`, `Guest_Id`) VALUES
(1, 1),
(1, 2),
(3, 54),
(4, 53),
(5, 59),
(6, 50),
(7, 51),
(8, 51),
(9, 51),
(10, 53);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_Id` int(11) NOT NULL,
  `Guest_Id` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `bill`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Bill_Id`, `Guest_Id`, `Date`, `Time`) VALUES
(1, 8, '2020-10-04', '12:22:30'),
(2, 28, '2020-10-04', '24:00:00'),
(3, 8, '2020-10-05', '11:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `cheff`
--

CREATE TABLE `cheff` (
  `Emp_Id` int(11) NOT NULL,
  `Speciality_Area_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cheff`:
--   `Emp_Id`
--       `kitchen` -> `Emp_Id`
--   `Speciality_Area_Id`
--       `specility_area` -> `Specility_Area_Id`
--

--
-- Dumping data for table `cheff`
--

INSERT INTO `cheff` (`Emp_Id`, `Speciality_Area_Id`) VALUES
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clean`
--

CREATE TABLE `clean` (
  `Emp_Id` int(11) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `clean`:
--   `Emp_Id`
--       `cleaner` -> `Emp_Id`
--   `Room_No`
--       `room` -> `Room_No`
--

-- --------------------------------------------------------

--
-- Table structure for table `cleaner`
--

CREATE TABLE `cleaner` (
  `Emp_Id` int(11) NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cleaner`:
--   `Emp_Id`
--       `employee` -> `Emp_Id`
--

--
-- Dumping data for table `cleaner`
--

INSERT INTO `cleaner` (`Emp_Id`, `Location`) VALUES
(18, 'Homagama');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Guest_Id` int(11) NOT NULL,
  `C_Name` varchar(50) NOT NULL,
  `Billing_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `company`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Guest_Id`, `C_Name`, `Billing_Address`) VALUES
(9, 'Google', 'America'),
(30, 'FB', 'USA'),
(31, 'Youtube', 'USA'),
(52, 'Sunimal', 'No.89/2/A,Hathlahagoda temple road,'),
(53, 'Sunimal', 'No.89/2/A,Hathlahagoda temple road,');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Guest_Id` int(11) NOT NULL,
  `Contact_No` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `contact`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Guest_Id`, `Contact_No`) VALUES
(4, '0777218427'),
(5, ' 076854637'),
(6, ' 056854637'),
(6, ' 076854637'),
(6, ' 086854637'),
(7, ' 016854637'),
(7, ' 026854637'),
(7, ' 768546372'),
(8, ' 056854637'),
(8, ' 076854637'),
(8, ' 086854637'),
(9, ' 076854637'),
(9, ' 768546372'),
(10, ' 056854637'),
(10, ' 076854637'),
(10, ' 086854637'),
(11, ' 768546315'),
(11, ' 768546345'),
(11, ' 768546372'),
(12, ' 768544837'),
(12, ' 768546537'),
(12, ' 768554637'),
(13, ' 076854637'),
(13, ' 123456789'),
(13, ' 132456799'),
(14, ' 019234657'),
(15, ' 111111111'),
(16, '0768546372'),
(16, '1111111111'),
(17, '1111111111'),
(17, '2222222222'),
(17, '3333333333'),
(18, '1111111111'),
(18, '2222222222'),
(18, '3333333333'),
(19, '0768546372'),
(20, '0768546372'),
(21, '0458546372'),
(21, '0768546372'),
(22, '0458546372'),
(22, '0768546372'),
(23, '0768546372'),
(24, '1111111111'),
(25, '0868546372'),
(26, '0768546372'),
(27, '0768546372'),
(28, '0768546372'),
(29, '0768546372'),
(30, '0768546372'),
(31, '0768546372'),
(32, '0711084471'),
(37, '076854637'),
(38, '0728000785'),
(39, '0711084471'),
(45, '768546372'),
(46, '768546372'),
(47, '0164546372'),
(48, '768546372'),
(49, '768546372'),
(50, '768546372'),
(51, '768546372'),
(52, '0768546372'),
(53, '0768546372'),
(54, '0711218427'),
(59, '0168546372');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `Bill_Id` int(11) NOT NULL,
  `Cost_Name` varchar(100) NOT NULL,
  `Cost_Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `cost`:
--   `Bill_Id`
--       `bill` -> `Bill_Id`
--

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`Bill_Id`, `Cost_Name`, `Cost_Amount`) VALUES
(1, 'Chocolate', 100),
(1, 'Milkshake', 500),
(1, 'Rice & Curry', 1500.5),
(2, 'Rice & curry', 750),
(3, 'Milk', 150.75);

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_handling`
-- (See below for the actual view)
--
CREATE TABLE `daily_handling` (
`Emp_Id` int(11)
,`Handle_Amount` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_Id` int(11) NOT NULL,
  `Emp_Name` varchar(40) NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Tp_Num` varchar(10) NOT NULL,
  `Salary_Grade` enum('A','B','C','D','E') NOT NULL,
  `Work_Started` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `employee`:
--

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_Id`, `Emp_Name`, `Gender`, `Tp_Num`, `Salary_Grade`, `Work_Started`) VALUES
(1, 'Mahesh', 'Male', '0768546372', 'A', '2020-10-02 14:19:10'),
(2, 'Lakshan', 'Male', '0711084471', 'A', '2020-10-09 07:21:17'),
(3, 'Vindya', 'Female', '0788546372', 'A', '2020-10-07 07:21:28'),
(7, 'Rathnayake', 'Male', '0768546372', 'A', '2020-10-09 08:06:56'),
(8, 'Nandasiri', 'Male', '0768546372', 'C', '2020-10-09 08:07:33'),
(9, 'Windy', 'Male', '1111111111', 'B', '2020-10-09 08:10:00'),
(10, 'Nadun', 'Male', '0768546372', 'A', '2020-10-09 08:14:05'),
(11, 'John', 'Male', '0468546372', 'C', '2020-10-09 08:15:36'),
(12, 'Supuni', 'Female', '0568546372', 'A', '2020-10-09 12:20:50'),
(13, 'Pushpa', 'Male', '0768546372', 'B', '2020-10-09 12:24:06'),
(14, 'Gimhani', 'Female', '0768546372', 'C', '2020-10-09 12:26:58'),
(15, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:18:03'),
(16, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:18:45'),
(17, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:23:39'),
(18, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:24:54'),
(19, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:25:18'),
(20, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:26:17'),
(21, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:28:55'),
(22, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:29:45'),
(23, 'Pushpa', 'Male', '768546372', 'A', '2020-10-12 16:30:24');

-- --------------------------------------------------------

--
-- Stand-in structure for view `emp_info`
-- (See below for the actual view)
--
CREATE TABLE `emp_info` (
`Emp_Id` int(11)
,`Emp_Name` varchar(40)
,`Tp_Num` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `Fact_Id` int(11) NOT NULL,
  `Fact_Name` varchar(100) NOT NULL,
  `Fact_Type` enum('Indoor','Outdoor') NOT NULL,
  `Fact_Rate` enum('1','2','3','4','5') NOT NULL,
  `Location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `facility`:
--

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`Fact_Id`, `Fact_Name`, `Fact_Type`, `Fact_Rate`, `Location`) VALUES
(1, 'Diyawannawa Pool', 'Outdoor', '1', 'Diyawannawa'),
(2, 'Diyawannawa Tennis', 'Indoor', '2', 'Diyawannawa'),
(3, 'VolleyBall Stadium', 'Indoor', '1', 'Horana'),
(4, 'VolleyBall Stadium', 'Indoor', '3', 'Kaluthara'),
(5, 'VolleyBall Stadium', 'Indoor', '3', 'Gampaha'),
(6, 'VolleyBall Stadium', 'Indoor', '3', 'Maharagama');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `Guest_Id` int(11) NOT NULL,
  `Fam_H_NIC` char(12) NOT NULL,
  `Fam_H_Name` varchar(50) NOT NULL,
  `Fam_H_Gen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `family`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`Guest_Id`, `Fam_H_NIC`, `Fam_H_Name`, `Fam_H_Gen`) VALUES
(1, '199930610154', 'Mahesh', 'male'),
(35, '199930610254', 'Pushpa', 'female'),
(37, '199930610154', 'Nandasiri', 'male'),
(39, '111111111111', 'Mahesh', 'male'),
(51, '199930610155', 'NImesha', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Item_No` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` enum('Indian','Chinees') NOT NULL,
  `Portion_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `food`:
--

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Guest_Id` int(11) NOT NULL,
  `Check_In_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Check_Out_Date` date NOT NULL,
  `Guest_Type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `guest`:
--

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`Guest_Id`, `Check_In_Date`, `Check_Out_Date`, `Guest_Type`) VALUES
(1, '2020-10-03 16:38:34', '2020-10-29', 'family'),
(2, '2020-10-03 16:40:53', '2020-10-20', 'individual'),
(3, '2020-10-03 16:41:20', '2020-10-21', 'individual'),
(4, '2020-10-03 16:41:55', '2020-10-28', 'individual'),
(5, '2020-10-03 16:42:47', '2020-10-20', 'individual'),
(6, '2020-10-03 16:43:15', '2020-10-13', 'individual'),
(7, '2020-10-03 16:47:22', '2020-10-14', 'family'),
(8, '2020-10-03 16:48:04', '2020-10-13', 'individual'),
(9, '2020-10-03 16:49:08', '2020-10-14', 'company'),
(10, '2020-10-03 16:49:55', '2020-10-20', 'individual'),
(11, '2020-10-03 17:45:52', '2020-10-24', 'family'),
(12, '2020-10-03 17:59:53', '2020-11-25', 'individual'),
(13, '2020-10-04 04:54:26', '2020-10-07', 'individual'),
(14, '2020-10-04 05:00:39', '2020-10-27', 'individual'),
(15, '2020-10-04 05:02:26', '2020-10-22', 'family'),
(16, '2020-10-04 05:09:35', '2020-10-08', 'individual'),
(17, '2020-10-04 05:11:49', '2020-11-04', 'individual'),
(18, '2020-10-04 05:14:04', '2020-11-04', 'individual'),
(19, '2020-10-04 05:19:21', '2020-10-30', 'individual'),
(20, '2020-10-04 05:23:24', '2020-10-02', 'individual'),
(21, '2020-10-04 05:23:57', '2020-10-08', 'individual'),
(22, '2020-10-04 05:25:58', '2020-10-08', 'individual'),
(23, '2020-10-04 05:29:59', '2020-10-28', 'individual'),
(24, '2020-10-04 05:35:33', '2020-10-08', 'individual'),
(25, '2020-10-04 05:37:45', '2020-10-08', 'individual'),
(26, '2020-10-04 05:38:33', '2020-10-08', 'individual'),
(27, '2020-10-04 05:39:38', '2020-10-21', 'individual'),
(28, '2020-10-04 05:44:46', '2020-10-15', 'individual'),
(29, '2020-10-04 05:45:36', '2020-10-04', 'individual'),
(30, '2020-10-04 05:51:33', '2020-10-15', 'company'),
(31, '2020-10-04 05:58:28', '2020-11-27', 'company'),
(32, '2020-10-05 12:58:21', '2020-10-22', 'family'),
(33, '2020-10-05 15:01:32', '2020-10-22', 'individual'),
(34, '2020-10-05 15:01:43', '2020-10-06', 'individual'),
(35, '2020-10-05 15:15:53', '2020-10-20', 'family'),
(36, '2020-10-05 17:09:26', '2020-10-22', 'company'),
(37, '2020-10-06 12:21:43', '2020-10-15', 'family'),
(38, '2020-10-08 08:20:37', '2020-10-31', 'individual'),
(39, '2020-10-08 08:22:17', '2020-10-08', 'family'),
(45, '2020-10-11 10:41:10', '2020-11-07', 'individual'),
(46, '2020-10-11 10:41:46', '2020-11-07', 'individual'),
(47, '2020-10-11 14:07:37', '2020-10-24', 'individual'),
(48, '2020-10-12 08:41:02', '2020-10-29', 'individual'),
(49, '2020-10-12 08:45:59', '2020-10-31', 'individual'),
(50, '2020-10-12 09:11:32', '2020-10-15', 'individual'),
(51, '2020-10-12 09:14:37', '2020-10-16', 'family'),
(52, '2020-10-12 09:20:49', '2020-10-29', 'company'),
(53, '2020-10-12 09:21:17', '2020-10-29', 'company'),
(54, '2020-10-12 09:57:26', '2020-10-16', 'individual'),
(55, '2020-10-12 10:03:02', '2020-10-16', 'individual'),
(56, '2020-10-12 10:04:54', '2020-10-16', 'individual'),
(57, '2020-10-12 10:05:02', '2020-10-16', 'individual'),
(58, '2020-10-12 10:05:30', '2020-10-23', 'individual'),
(59, '2020-10-12 10:06:50', '2020-10-31', 'individual');

-- --------------------------------------------------------

--
-- Stand-in structure for view `guest_info`
-- (See below for the actual view)
--
CREATE TABLE `guest_info` (
`Guest_Id` int(11)
,`NAME` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `handle`
--

CREATE TABLE `handle` (
  `Emp_Id` int(11) NOT NULL,
  `Guest_Id` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `handle`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--   `Emp_Id`
--       `receptionist` -> `Emp_Id`
--

--
-- Dumping data for table `handle`
--

INSERT INTO `handle` (`Emp_Id`, `Guest_Id`, `Date`, `Time`) VALUES
(1, 3, '2020-10-03', '22:11:21'),
(1, 4, '2020-10-03', '22:11:56'),
(1, 5, '2020-10-03', '22:12:47'),
(1, 6, '2020-10-03', '22:13:16'),
(1, 7, '2020-10-03', '22:17:22'),
(1, 8, '2020-10-03', '22:18:04'),
(1, 9, '2020-10-03', '22:19:08'),
(1, 10, '2020-10-03', '22:19:56'),
(1, 11, '2020-10-03', '23:15:52'),
(1, 12, '2020-10-03', '23:29:53'),
(1, 13, '2020-10-04', '10:24:26'),
(1, 14, '2020-10-04', '10:30:39'),
(1, 15, '2020-10-04', '10:32:26'),
(1, 16, '2020-10-04', '10:39:35'),
(1, 17, '2020-10-04', '10:41:49'),
(1, 18, '2020-10-04', '10:44:04'),
(1, 19, '2020-10-04', '10:49:21'),
(1, 20, '2020-10-04', '10:53:24'),
(1, 21, '2020-10-04', '10:53:57'),
(1, 22, '2020-10-04', '10:55:58'),
(1, 23, '2020-10-04', '10:59:59'),
(1, 24, '2020-10-04', '11:05:33'),
(1, 25, '2020-10-04', '11:07:45'),
(1, 26, '2020-10-04', '11:08:34'),
(1, 27, '2020-10-04', '11:09:38'),
(1, 28, '2020-10-04', '11:14:46'),
(1, 29, '2020-10-04', '11:15:36'),
(1, 30, '2020-10-04', '11:21:33'),
(1, 31, '2020-10-04', '11:28:28'),
(1, 32, '2020-10-05', '18:28:22'),
(1, 35, '2020-10-05', '20:45:53'),
(1, 36, '2020-10-05', '22:39:26'),
(1, 37, '2020-10-06', '17:51:43'),
(1, 38, '2020-10-08', '13:50:37'),
(1, 39, '2020-10-08', '13:52:18'),
(1, 45, '2020-10-11', '16:11:11'),
(1, 46, '2020-10-11', '16:11:46'),
(1, 47, '2020-10-11', '19:37:37'),
(1, 48, '2020-10-12', '14:11:02'),
(1, 49, '2020-10-12', '14:15:59'),
(1, 50, '2020-10-12', '14:41:32'),
(1, 51, '2020-10-12', '14:44:37'),
(1, 52, '2020-10-12', '14:50:49'),
(1, 53, '2020-10-12', '14:51:17'),
(1, 54, '2020-10-12', '15:27:27'),
(1, 59, '2020-10-12', '15:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE `individual` (
  `Guest_Id` int(11) NOT NULL,
  `I_NIC` char(12) NOT NULL,
  `I_Name` varchar(50) NOT NULL,
  `I_Gen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `individual`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--

--
-- Dumping data for table `individual`
--

INSERT INTO `individual` (`Guest_Id`, `I_NIC`, `I_Name`, `I_Gen`) VALUES
(2, '199930610154', 'Kumari', 'female'),
(3, '199930610154', 'Nandasiri', 'male'),
(8, '199930610155', 'NImal', 'male'),
(29, '199930610155', 'Kumari', 'female'),
(38, '199930610154', 'Kumara', 'male'),
(45, '199930610154', 'Sirimanna', 'male'),
(46, '199930610154', 'Lucky', 'male'),
(47, '199930610156', 'Munna', 'male'),
(48, '199930610154', 'Vindy', 'female'),
(49, '199930610155', 'SD', 'female'),
(50, '199930610154', 'Mahesh', 'male'),
(54, '628600767v', 'Natasha', 'female'),
(59, '628600767v', 'Nathasha', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `indoor`
--

CREATE TABLE `indoor` (
  `Fact_Id` int(11) NOT NULL,
  `Req_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `indoor`:
--   `Fact_Id`
--       `facility` -> `Fact_Id`
--   `Req_Id`
--       `reseveration_req` -> `Req_Id`
--

--
-- Dumping data for table `indoor`
--

INSERT INTO `indoor` (`Fact_Id`, `Req_Id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `Emp_Id` int(11) NOT NULL,
  `Grade` enum('A','B','C','D') NOT NULL,
  `Experience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `kitchen`:
--   `Emp_Id`
--       `employee` -> `Emp_Id`
--

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`Emp_Id`, `Grade`, `Experience`) VALUES
(17, 'A', '1 year'),
(19, 'A', '1 year'),
(20, 'A', '1 year'),
(21, 'A', '1 year'),
(22, 'A', '1 year'),
(23, 'A', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `Fact_Id` int(11) NOT NULL,
  `Emp_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `manage`:
--   `Emp_Id`
--       `employee` -> `Emp_Id`
--   `Fact_Id`
--       `facility` -> `Fact_Id`
--

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`Fact_Id`, `Emp_Id`) VALUES
(1, 1),
(2, 14),
(3, 3),
(4, 9),
(5, 7),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Emp_Id` int(11) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Grade` enum('A','B','C','D','E') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `manager`:
--   `Emp_Id`
--       `employee` -> `Emp_Id`
--

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Emp_Id`, `Designation`, `Grade`) VALUES
(2, 'Operation ', 'B'),
(3, 'Marketing', 'A'),
(7, 'Legal', 'A'),
(8, 'Nandasiri', 'A'),
(9, 'Nandasiri', 'A'),
(10, 'HR', 'A'),
(11, 'HR', 'B'),
(12, 'Legal', 'C'),
(13, 'Operational', 'A'),
(14, 'Legal', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Item_No` int(11) NOT NULL,
  `Guest_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--   `Item_No`
--       `food` -> `Item_No`
--

-- --------------------------------------------------------

--
-- Table structure for table `outdoor`
--

CREATE TABLE `outdoor` (
  `Fact_Id` int(11) NOT NULL,
  `Guiding_Reg` varchar(200) DEFAULT NULL,
  `Specialty_Req` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `outdoor`:
--   `Fact_Id`
--       `facility` -> `Fact_Id`
--

--
-- Dumping data for table `outdoor`
--

INSERT INTO `outdoor` (`Fact_Id`, `Guiding_Reg`, `Specialty_Req`) VALUES
(1, '0', 'Swimming Lessson For Politicians');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `Emp_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `receptionist`:
--   `Emp_Id`
--       `employee` -> `Emp_Id`
--

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`Emp_Id`) VALUES
(1),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `reseveration_req`
--

CREATE TABLE `reseveration_req` (
  `Req_Id` int(11) NOT NULL,
  `Req` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `reseveration_req`:
--

--
-- Dumping data for table `reseveration_req`
--

INSERT INTO `reseveration_req` (`Req_Id`, `Req`) VALUES
(1, 'Play Tennis Tournament among Company FB');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_No` int(11) NOT NULL,
  `Type` enum('Single','Double') NOT NULL,
  `Rate` enum('one','two','three','four') NOT NULL,
  `Status` enum('Available','Not available','booked') NOT NULL DEFAULT 'Available',
  `Location` enum('First_Floor','Second_Floor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `room`:
--

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_No`, `Type`, `Rate`, `Status`, `Location`) VALUES
(1, 'Single', 'two', 'booked', 'First_Floor'),
(2, 'Double', 'three', 'booked', ''),
(3, 'Single', 'two', 'booked', 'First_Floor'),
(4, 'Double', 'one', 'booked', 'Second_Floor'),
(5, 'Double', 'one', 'booked', 'First_Floor'),
(6, 'Single', 'one', 'booked', 'First_Floor'),
(7, 'Single', 'one', 'booked', 'First_Floor'),
(8, 'Single', 'one', 'booked', 'First_Floor'),
(9, 'Single', 'one', 'booked', 'First_Floor'),
(10, 'Double', 'one', 'booked', 'Second_Floor'),
(11, 'Double', 'one', 'Available', 'Second_Floor');

-- --------------------------------------------------------

--
-- Stand-in structure for view `room_info`
-- (See below for the actual view)
--
CREATE TABLE `room_info` (
`Room_No` int(11)
,`Type` enum('Single','Double')
,`Rate` enum('one','two','three','four')
,`Status` enum('Available','Not available','booked')
,`Location` enum('First_Floor','Second_Floor')
);

-- --------------------------------------------------------

--
-- Table structure for table `specialty_style`
--

CREATE TABLE `specialty_style` (
  `Specialty_Style_Id` int(11) NOT NULL,
  `Specialty_Style` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `specialty_style`:
--

--
-- Dumping data for table `specialty_style`
--

INSERT INTO `specialty_style` (`Specialty_Style_Id`, `Specialty_Style`) VALUES
(1, 'Eastern'),
(2, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `specility_area`
--

CREATE TABLE `specility_area` (
  `Specility_Area_Id` int(11) NOT NULL,
  `Specialty_Area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `specility_area`:
--

--
-- Dumping data for table `specility_area`
--

INSERT INTO `specility_area` (`Specility_Area_Id`, `Specialty_Area`) VALUES
(1, ' Western'),
(2, ' Western');

-- --------------------------------------------------------

--
-- Table structure for table `support_chef`
--

CREATE TABLE `support_chef` (
  `Emp_Id` int(11) NOT NULL,
  `Contract_Period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `support_chef`:
--   `Emp_Id`
--       `kitchen` -> `Emp_Id`
--

--
-- Dumping data for table `support_chef`
--

INSERT INTO `support_chef` (`Emp_Id`, `Contract_Period`) VALUES
(20, '2020-10-12'),
(21, '2021-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `usages`
--

CREATE TABLE `usages` (
  `Fact_Id` int(11) NOT NULL,
  `Guest_Id` int(11) NOT NULL,
  `Duaration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `usages`:
--   `Guest_Id`
--       `guest` -> `Guest_Id`
--   `Fact_Id`
--       `facility` -> `Fact_Id`
--

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `Emp_Id` int(11) NOT NULL,
  `Specialty_Style_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `waiter`:
--   `Emp_Id`
--       `kitchen` -> `Emp_Id`
--   `Specialty_Style_Id`
--       `specialty_style` -> `Specialty_Style_Id`
--

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`Emp_Id`, `Specialty_Style_Id`) VALUES
(22, 1),
(23, 2);

-- --------------------------------------------------------

--
-- Structure for view `a`
--
DROP TABLE IF EXISTS `a`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `a`  AS  select `guest`.`Guest_Id` AS `Guest_Id`,`guest`.`Check_In_Date` AS `Check_In_Date`,`guest`.`Check_Out_Date` AS `Check_Out_Date`,`guest`.`Guest_Type` AS `Guest_Type`,`company`.`C_Name` AS `NAME` from (`guest` left join `company` on(`guest`.`Guest_Id` = `company`.`Guest_Id`)) union select `guest`.`Guest_Id` AS `Guest_Id`,`guest`.`Check_In_Date` AS `Check_In_Date`,`guest`.`Check_Out_Date` AS `Check_Out_Date`,`guest`.`Guest_Type` AS `Guest_Type`,`individual`.`I_Name` AS `NAME` from (`guest` left join `individual` on(`guest`.`Guest_Id` = `individual`.`Guest_Id`)) union select `guest`.`Guest_Id` AS `Guest_Id`,`guest`.`Check_In_Date` AS `Check_In_Date`,`guest`.`Check_Out_Date` AS `Check_Out_Date`,`guest`.`Guest_Type` AS `Guest_Type`,`family`.`Fam_H_Name` AS `NAME` from (`guest` left join `family` on(`guest`.`Guest_Id` = `family`.`Guest_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `daily_handling`
--
DROP TABLE IF EXISTS `daily_handling`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daily_handling`  AS  select `handle`.`Emp_Id` AS `Emp_Id`,count(`handle`.`Guest_Id`) AS `Handle_Amount` from `handle` where `handle`.`Date` = curdate() group by `handle`.`Emp_Id` ;

-- --------------------------------------------------------

--
-- Structure for view `emp_info`
--
DROP TABLE IF EXISTS `emp_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `emp_info`  AS  select `employee`.`Emp_Id` AS `Emp_Id`,`employee`.`Emp_Name` AS `Emp_Name`,`employee`.`Tp_Num` AS `Tp_Num` from `employee` ;

-- --------------------------------------------------------

--
-- Structure for view `guest_info`
--
DROP TABLE IF EXISTS `guest_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `guest_info`  AS  select `guest`.`Guest_Id` AS `Guest_Id`,`company`.`C_Name` AS `NAME` from (`guest` join `company` on(`guest`.`Guest_Id` = `company`.`Guest_Id`)) union select `guest`.`Guest_Id` AS `Guest_Id`,`individual`.`I_Name` AS `NAME` from (`guest` join `individual` on(`guest`.`Guest_Id` = `individual`.`Guest_Id`)) union select `guest`.`Guest_Id` AS `Guest_Id`,`family`.`Fam_H_Name` AS `NAME` from (`guest` join `family` on(`guest`.`Guest_Id` = `family`.`Guest_Id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `room_info`
--
DROP TABLE IF EXISTS `room_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `room_info`  AS  select `room`.`Room_No` AS `Room_No`,`room`.`Type` AS `Type`,`room`.`Rate` AS `Rate`,`room`.`Status` AS `Status`,`room`.`Location` AS `Location` from `room` where `room`.`Status` = 'Available' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`Room_Id`,`Guest_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`);

--
-- Indexes for table `cheff`
--
ALTER TABLE `cheff`
  ADD PRIMARY KEY (`Emp_Id`),
  ADD KEY `Speciality_Area_Id` (`Speciality_Area_Id`);

--
-- Indexes for table `clean`
--
ALTER TABLE `clean`
  ADD PRIMARY KEY (`Emp_Id`,`Room_No`),
  ADD KEY `Room_No` (`Room_No`);

--
-- Indexes for table `cleaner`
--
ALTER TABLE `cleaner`
  ADD PRIMARY KEY (`Emp_Id`),
  ADD KEY `Emp_Id` (`Emp_Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Guest_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Guest_Id`,`Contact_No`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`Bill_Id`,`Cost_Name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`Fact_Id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`Guest_Id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Item_No`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Guest_Id`);

--
-- Indexes for table `handle`
--
ALTER TABLE `handle`
  ADD PRIMARY KEY (`Emp_Id`,`Guest_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`);

--
-- Indexes for table `individual`
--
ALTER TABLE `individual`
  ADD PRIMARY KEY (`Guest_Id`);

--
-- Indexes for table `indoor`
--
ALTER TABLE `indoor`
  ADD PRIMARY KEY (`Fact_Id`,`Req_Id`),
  ADD KEY `Req_Id` (`Req_Id`);

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`Fact_Id`,`Emp_Id`),
  ADD KEY `Emp_Id` (`Emp_Id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Item_No`,`Guest_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`);

--
-- Indexes for table `outdoor`
--
ALTER TABLE `outdoor`
  ADD PRIMARY KEY (`Fact_Id`) USING BTREE;

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `reseveration_req`
--
ALTER TABLE `reseveration_req`
  ADD PRIMARY KEY (`Req_Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_No`);

--
-- Indexes for table `specialty_style`
--
ALTER TABLE `specialty_style`
  ADD PRIMARY KEY (`Specialty_Style_Id`);

--
-- Indexes for table `specility_area`
--
ALTER TABLE `specility_area`
  ADD PRIMARY KEY (`Specility_Area_Id`);

--
-- Indexes for table `support_chef`
--
ALTER TABLE `support_chef`
  ADD PRIMARY KEY (`Emp_Id`);

--
-- Indexes for table `usages`
--
ALTER TABLE `usages`
  ADD PRIMARY KEY (`Fact_Id`,`Guest_Id`),
  ADD KEY `Guest_Id` (`Guest_Id`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`Emp_Id`),
  ADD KEY `Specialty_Style_Id` (`Specialty_Style_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Bill_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Emp_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `Fact_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `Guest_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `reseveration_req`
--
ALTER TABLE `reseveration_req`
  MODIFY `Req_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Room_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `specialty_style`
--
ALTER TABLE `specialty_style`
  MODIFY `Specialty_Style_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specility_area`
--
ALTER TABLE `specility_area`
  MODIFY `Specility_Area_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocate`
--
ALTER TABLE `allocate`
  ADD CONSTRAINT `allocate_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`),
  ADD CONSTRAINT `allocate_ibfk_2` FOREIGN KEY (`Room_Id`) REFERENCES `room` (`Room_No`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`);

--
-- Constraints for table `cheff`
--
ALTER TABLE `cheff`
  ADD CONSTRAINT `cheff_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `kitchen` (`Emp_Id`),
  ADD CONSTRAINT `cheff_ibfk_2` FOREIGN KEY (`Speciality_Area_Id`) REFERENCES `specility_area` (`Specility_Area_Id`);

--
-- Constraints for table `clean`
--
ALTER TABLE `clean`
  ADD CONSTRAINT `clean_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `cleaner` (`Emp_Id`),
  ADD CONSTRAINT `clean_ibfk_2` FOREIGN KEY (`Room_No`) REFERENCES `room` (`Room_No`);

--
-- Constraints for table `cleaner`
--
ALTER TABLE `cleaner`
  ADD CONSTRAINT `cleaner_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_Id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`);

--
-- Constraints for table `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `cost_ibfk_1` FOREIGN KEY (`Bill_Id`) REFERENCES `bill` (`Bill_Id`);

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`);

--
-- Constraints for table `handle`
--
ALTER TABLE `handle`
  ADD CONSTRAINT `handle_ibfk_2` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`),
  ADD CONSTRAINT `handle_ibfk_3` FOREIGN KEY (`Emp_Id`) REFERENCES `receptionist` (`Emp_Id`);

--
-- Constraints for table `individual`
--
ALTER TABLE `individual`
  ADD CONSTRAINT `individual_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`);

--
-- Constraints for table `indoor`
--
ALTER TABLE `indoor`
  ADD CONSTRAINT `indoor_ibfk_1` FOREIGN KEY (`Fact_Id`) REFERENCES `facility` (`Fact_Id`),
  ADD CONSTRAINT `indoor_ibfk_2` FOREIGN KEY (`Req_Id`) REFERENCES `reseveration_req` (`Req_Id`);

--
-- Constraints for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD CONSTRAINT `kitchen_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_Id`);

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_Id`),
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`Fact_Id`) REFERENCES `facility` (`Fact_Id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_Id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Item_No`) REFERENCES `food` (`Item_No`);

--
-- Constraints for table `outdoor`
--
ALTER TABLE `outdoor`
  ADD CONSTRAINT `outdoor_ibfk_1` FOREIGN KEY (`Fact_Id`) REFERENCES `facility` (`Fact_Id`);

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `employee` (`Emp_Id`);

--
-- Constraints for table `support_chef`
--
ALTER TABLE `support_chef`
  ADD CONSTRAINT `support_chef_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `kitchen` (`Emp_Id`);

--
-- Constraints for table `usages`
--
ALTER TABLE `usages`
  ADD CONSTRAINT `usages_ibfk_1` FOREIGN KEY (`Guest_Id`) REFERENCES `guest` (`Guest_Id`),
  ADD CONSTRAINT `usages_ibfk_2` FOREIGN KEY (`Fact_Id`) REFERENCES `facility` (`Fact_Id`);

--
-- Constraints for table `waiter`
--
ALTER TABLE `waiter`
  ADD CONSTRAINT `waiter_ibfk_1` FOREIGN KEY (`Emp_Id`) REFERENCES `kitchen` (`Emp_Id`),
  ADD CONSTRAINT `waiter_ibfk_2` FOREIGN KEY (`Specialty_Style_Id`) REFERENCES `specialty_style` (`Specialty_Style_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
