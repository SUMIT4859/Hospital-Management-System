-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 07:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `contactno` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `updationDate`, `adminName`, `contactno`, `profile_pic`, `creationDate`) VALUES
(1, 'admin@gmail.com', '123456@', '07-10-2024 09:19:48 PM', 'Dharmik', 1234567890, 'uploads/profile_pics/672858cee5d11.jpg', '2024-10-07 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(22, 'Dentists', 9, 14, 500, '2024-10-10', '12:00 PM', '2024-10-08 03:20:50', 1, 1, NULL),
(23, 'Gynecologists', 10, 14, 500, '2024-10-15', '9:00 AM', '2024-10-08 03:21:25', 1, 1, NULL),
(24, 'Cardiologists', 11, 14, 550, '2024-10-13', '9:00 AM', '2024-10-08 03:21:48', 1, 1, NULL),
(25, 'ENT', 8, 14, 450, '2024-10-27', '9:00 AM', '2024-10-08 03:22:13', 1, 1, NULL),
(27, 'ENT', 8, 15, 450, '2024-10-30', '1:00 PM', '2024-10-08 03:28:48', 1, 1, NULL),
(28, 'ENT', 8, 15, 450, '2024-10-15', '9:15 AM', '2024-10-08 03:45:53', 1, 0, '2024-10-09 08:23:32'),
(29, 'ENT', 8, 14, 450, '2024-10-20', '1:00 PM', '2024-10-08 05:19:55', 1, 0, '2024-10-09 08:24:15'),
(30, 'ENT', 8, 14, 450, '2024-10-20', '1:00 PM', '2024-10-08 05:21:00', 1, 1, NULL),
(31, 'Gynecologists', 10, 14, 500, '2024-10-15', '10:00 PM', '2024-10-16 16:17:52', 1, 1, NULL),
(32, 'ENT', 8, 14, 450, '2024-10-20', '6:00 PM', '2024-10-19 12:28:48', 1, 0, '2024-10-19 12:30:50'),
(33, 'ENT', 8, 14, 450, '2024-10-21', '6:15 PM', '2024-10-19 12:33:03', 1, 0, '2024-10-19 12:33:31'),
(34, 'ENT', 8, 14, 450, '2024-10-22', '6:15 PM', '2024-10-19 12:37:02', 1, 0, '2024-10-19 12:37:48'),
(35, 'ENT', 8, 14, 450, '2024-10-23', '6:15 PM', '2024-10-19 12:37:16', 1, 0, '2024-10-19 12:46:19'),
(36, 'ENT', 8, 14, 450, '2024-10-23', '7:00 PM', '2024-10-19 12:42:04', 1, 0, '2024-10-19 12:42:32'),
(37, 'ENT', 8, 14, 450, '2024-10-25', '6:30 PM', '2024-10-19 12:49:07', 1, 0, '2024-10-19 12:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`, `profile_pic`) VALUES
(8, 'ENT', 'jainam', 'ahmedabad', '450', 8596475869, 'sumitkumar9059514@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:11:17', '2024-10-19 12:41:44', 'uploads/profile_pics/670fe3938e8c0.jpg'),
(9, 'Dentists', 'dharmik', 'rajkot', '500', 4569584869, 'dharmik@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:13:27', NULL, ''),
(10, 'Gynecologists', 'sumit', 'ahmedabad', '500', 5869253645, 'sumit@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:14:25', NULL, ''),
(11, 'Cardiologists', 'raj', 'nikol', '550', 4859674869, 'raj@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:15:13', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `docEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(38, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:11:47', NULL, 1),
(39, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:23:04', NULL, 1),
(40, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:25:04', NULL, 1),
(41, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:31:08', NULL, 1),
(42, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 04:27:51', NULL, 1),
(43, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 04:30:48', NULL, 1),
(44, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 05:21:29', NULL, 1),
(45, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:12:00', NULL, 1),
(46, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:23:21', NULL, 1),
(47, NULL, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:24:35', NULL, 0),
(48, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:24:44', NULL, 1),
(49, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 14:12:11', NULL, 1),
(50, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 14:13:44', NULL, 1),
(51, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 14:26:07', NULL, 1),
(52, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 15:31:31', NULL, 1),
(53, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 15:32:23', NULL, 1),
(54, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 16:45:35', NULL, 1),
(55, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-12 13:11:21', '12-10-2024 07:31:15 PM', 1),
(56, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-12 14:10:09', NULL, 1),
(57, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-13 11:19:17', NULL, 1),
(58, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-13 11:58:17', NULL, 1),
(59, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-13 15:09:36', NULL, 1),
(60, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 05:53:09', NULL, 1),
(61, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 14:01:16', NULL, 1),
(62, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 14:12:49', NULL, 1),
(63, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 16:45:55', NULL, 1),
(64, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 16:49:44', NULL, 1),
(65, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 15:50:08', NULL, 1),
(66, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 15:51:37', NULL, 1),
(67, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 15:54:05', NULL, 1),
(68, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:07:33', NULL, 1),
(69, 8, 'jainam@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 17:23:09', NULL, 1),
(70, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:25:32', NULL, 1),
(71, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:27:04', NULL, 1),
(72, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:29:34', NULL, 1),
(73, 8, 'jainamdoshi2004@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:33:24', NULL, 1),
(74, 8, 'jainamdoshi2004@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:37:37', NULL, 1),
(75, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:42:15', NULL, 1),
(76, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:46:11', NULL, 1),
(77, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:49:32', NULL, 1),
(78, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:51:11', NULL, 1),
(79, NULL, 'jainamdoshi2004@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:45:22', NULL, 0),
(80, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:46:52', '04-11-2024 11:18:31 AM', 1),
(81, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:49:44', NULL, 1),
(82, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:51:37', NULL, 1),
(83, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:54:21', NULL, 1),
(84, 8, 'sumitkumar9059514@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 06:01:12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(18, 'Dentists', '2024-10-07 14:44:13', NULL),
(19, 'Gynecologists', '2024-10-07 14:44:22', NULL),
(20, 'ENT', '2024-10-07 14:44:26', NULL),
(21, 'Cardiologists', '2024-10-07 14:44:45', NULL),
(22, 'Orthopedic', '2024-10-07 14:44:50', NULL),
(23, 'Neurologists', '2024-10-07 14:45:24', NULL),
(24, 'Oncologists', '2024-10-07 14:45:33', NULL),
(27, 'Surgeon', '2024-10-16 14:57:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Anuj kumar', 'anujk30@test.com', 1425362514, 'This is for testing purposes.   This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.', '2024-04-20 16:52:03', 'hfsyryt', '2024-10-07 05:39:07', 1),
(2, 'Anuj kumar', 'ak@gmail.com', 1111122233, 'This is for testing', '2024-04-23 13:13:41', 'Contact the patient', '2024-04-27 13:13:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 2, '80/120', '110', '85', '97', 'Dolo,\r\nLevocit 5mg', '2024-05-16 09:07:16'),
(2, 1, '12', '22', '222', '333', 'sadc', '2024-10-05 11:35:17'),
(3, 3, '130', '555', '78', '650', 'dolo', '2024-10-07 05:59:30'),
(4, 4, '110', '85', '60', '101', 'Dolo 500\r\ncough syrup', '2024-10-08 03:42:49'),
(5, 5, '120', '85', '50', '102', 'dolo 500', '2024-10-08 05:24:50'),
(6, 7, '55', '85', '60', '101', 'fever\r\n', '2024-10-15 14:13:30'),
(7, 8, '55', '85', '55', 'vvveee', 'adda', '2024-10-15 16:51:02'),
(8, 9, '130', '555', '78', '650', 'fh', '2024-10-16 15:53:29'),
(9, 9, '130', '555', '78', '650', 'fch', '2024-10-16 15:53:44'),
(10, 10, '120', '85', '50', '102', 'dolo 500', '2024-11-04 05:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', '.', 'hello i am dharmik i am admin on the hospital management system&nbsp;<div><br></div>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Contact Details', 'D-204, Hole Town South West, Delhi-110096,India', 'info@gmail.com', 1122334455, '2020-05-20 07:24:07', '9 am To 8 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `docname` varchar(255) NOT NULL,
  `docemail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`, `docname`, `docemail`) VALUES
(4, 15, 'sumit1', 9624472654, 'sumit1@gmail.com', 'Male', 'shilaj, ahemdabad', 23, 'cold, fever', '2024-10-08 03:35:53', '2024-10-08 03:36:24', '', ''),
(5, 8, 'jainam', 8596475869, 'jainam1@gmail.com', 'Male', 'ahmedabad', 21, 'fever', '2024-10-08 05:23:13', '2024-10-09 15:38:52', '', ''),
(7, 8, 'dharmik', 9624472654, 'dk@gmail.com', 'male', 'asdf', 23, 'fever', '2024-10-09 16:46:18', NULL, '', ''),
(8, 8, 'dharmik', 9624472654, 'dharmikchavda1056@gmail.com', 'male', 'asd', 21, 'adffa', '2024-10-15 16:50:47', NULL, '', ''),
(9, 8, 'dharmik1', 1234566755, 'dk1@gmail.com', 'male', 'aff', 33, 'fff', '2024-10-16 15:52:02', NULL, '', ''),
(10, 8, 'jainam1', 8539815985, 'sumitkumar485970@gmail.com', 'male', 'shilaj', 20, 'fever', '2024-11-04 05:55:30', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `email`, `userip`, `loginTime`, `logout`, `status`) VALUES
(45, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:20:04', NULL, 1),
(46, 15, 'sumit1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:28:26', NULL, 1),
(47, 15, 'sumit1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 03:33:09', NULL, 1),
(48, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 04:28:37', NULL, 1),
(49, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 04:45:38', NULL, 1),
(50, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 05:18:42', NULL, 1),
(51, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 05:20:46', '08-10-2024 10:51:15 AM', 1),
(52, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 05:25:38', NULL, 1),
(53, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-08 16:41:55', NULL, 1),
(54, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 07:49:28', NULL, 1),
(55, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:23:58', NULL, 1),
(56, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 08:25:07', NULL, 1),
(57, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 14:12:27', NULL, 1),
(58, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 14:14:47', NULL, 1),
(59, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 15:31:40', NULL, 1),
(60, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-09 16:45:09', NULL, 1),
(61, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-12 12:16:49', NULL, 1),
(62, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-12 13:00:36', NULL, 1),
(63, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 05:54:00', NULL, 1),
(64, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 06:04:29', NULL, 1),
(65, 15, 'sumit1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 06:32:21', NULL, 1),
(66, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 07:00:20', NULL, 1),
(67, 15, 'sumit1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 07:37:29', NULL, 1),
(68, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 07:39:31', NULL, 1),
(69, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 14:01:29', NULL, 1),
(70, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-15 16:48:41', NULL, 1),
(71, NULL, 'jainamdoshi2004@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:08:04', NULL, 0),
(72, NULL, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:08:28', NULL, 0),
(73, NULL, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:09:47', NULL, 0),
(74, NULL, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:09:55', NULL, 0),
(75, NULL, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:13:27', NULL, 0),
(76, NULL, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:13:44', NULL, 0),
(77, 14, 'dharmikchavda1056@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:16:36', NULL, 1),
(78, 14, 'dharmikchavda1056@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:17:11', '16-10-2024 09:48:17 PM', 1),
(79, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 16:18:27', NULL, 1),
(80, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 17:06:42', NULL, 1),
(81, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 17:23:17', NULL, 1),
(82, 14, 'jainam1@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-16 17:37:57', NULL, 1),
(83, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:26:20', NULL, 1),
(84, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:27:55', NULL, 1),
(85, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:31:22', NULL, 1),
(86, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:36:48', NULL, 1),
(87, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:41:25', NULL, 1),
(88, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-10-19 12:48:50', NULL, 1),
(89, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:49:00', NULL, 1),
(90, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:51:03', NULL, 1),
(91, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:53:16', NULL, 1),
(92, 14, 'sumitkumar485970@gmail.com', 0x3a3a3100000000000000000000000000, '2024-11-04 05:58:56', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`, `profile_pic`) VALUES
(14, 'jainam1', 'shilaj', 'ahmedabad', 'male', 'sumitkumar485970@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:17:23', '2024-10-19 12:21:13', 'uploads/passport.jpg'),
(15, 'sumit1', 'shilaj', 'ahmedabad', 'male', 'sumit1@gmail.com', '0c8abdb962f042d1857c66dd26b0c87b', '2024-10-08 03:18:11', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
