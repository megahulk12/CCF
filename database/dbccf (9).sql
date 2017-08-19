-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 03:40 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbccf`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivedfeedbacks_tbl`
--

CREATE TABLE `archivedfeedbacks_tbl` (
  `archFeedbackID` int(11) NOT NULL,
  `feedbackDesc` varchar(200) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `budgetdetails_tbl`
--

CREATE TABLE `budgetdetails_tbl` (
  `budgetID` int(11) NOT NULL,
  `budget` float DEFAULT NULL,
  `budgetType` int(11) DEFAULT NULL,
  `dateEntry` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `companydetails_tbl`
--

CREATE TABLE `companydetails_tbl` (
  `companyID` int(11) NOT NULL,
  `companyName` varchar(30) DEFAULT NULL,
  `companyContactNum` varchar(18) DEFAULT NULL,
  `companyAddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companydetails_tbl`
--

INSERT INTO `companydetails_tbl` (`companyID`, `companyName`, `companyContactNum`, `companyAddress`) VALUES
(1, 'b', '', ''),
(2, 'a', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(13, 'test2', '', ''),
(14, 'test2', '', ''),
(15, 'test2', '', ''),
(16, 'test2', '', ''),
(17, 'test2', '', ''),
(18, 'test2', '', ''),
(19, 'test2', '', ''),
(20, 'test2', '', ''),
(21, 'test3', '', ''),
(22, 'a', '', ''),
(23, 'Ingenuity Inc.', '', ''),
(24, 'a', '', ''),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, 'a', '', ''),
(31, 'a', '', ''),
(32, 'a', '', ''),
(33, 'test_leader', '', ''),
(34, 'a', '', ''),
(35, '', '', ''),
(36, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `discipleshipgroupmembers_tbl`
--

CREATE TABLE `discipleshipgroupmembers_tbl` (
  `dgroupmemberID` int(11) NOT NULL,
  `memberID` int(11) DEFAULT NULL,
  `dgroupID` int(11) DEFAULT NULL,
  `dgroupmemberStatus` int(11) DEFAULT NULL,
  `receivedChrist` varchar(300) DEFAULT NULL,
  `attendCCF` varchar(300) DEFAULT NULL,
  `regularlyAttendsAt` varchar(300) DEFAULT NULL,
  `remarks` varchar(300) DEFAULT NULL,
  `dateJoinedAsDgroupMember` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discipleshipgroupmembers_tbl`
--

INSERT INTO `discipleshipgroupmembers_tbl` (`dgroupmemberID`, `memberID`, `dgroupID`, `dgroupmemberStatus`, `receivedChrist`, `attendCCF`, `regularlyAttendsAt`, `remarks`, `dateJoinedAsDgroupMember`) VALUES
(3, 5, 4, 1, 'a', 'a', 'a', NULL, '2017-06-30'),
(4, 6, 5, 1, 'a', 'a', 'a', NULL, '2017-07-01'),
(5, 1, 4, 1, 'aa', 'aa', 'aa', NULL, '2017-07-01'),
(6, 10, 5, 1, 'a', 'a', 'a', NULL, '2017-07-02'),
(11, 15, 5, 1, 'b', 'b', 'b', NULL, '2017-07-02'),
(12, 20, 5, 1, 'When I was born into this world', 'Once', 'Church', NULL, '2017-07-04'),
(13, 22, 5, 1, 'test', 'test', 'test', NULL, '2017-07-08'),
(14, 23, 4, 1, 'try', 'try', 'try', NULL, '2017-07-10'),
(15, 24, 4, 1, 'try', 'try', 'try', NULL, '2017-07-10'),
(17, 40, 4, 1, 'test2', 'test2', 'test2', NULL, '2017-07-11'),
(18, 41, 4, 1, 'test3', 'test3', 'test3', NULL, '2017-07-12'),
(19, 42, 4, 1, 'test', 'test', 'test', NULL, '2017-08-06'),
(20, 43, 7, 1, 'test', 'test', 'test', NULL, '2017-08-06'),
(32, 47, 6, 1, 'a', 'a', 'a', NULL, '2017-08-14'),
(33, 48, 9, 1, 'a', 'a', 'a', NULL, '2017-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `discipleshipgroup_tbl`
--

CREATE TABLE `discipleshipgroup_tbl` (
  `dgroupID` int(11) NOT NULL,
  `ageBracket` varchar(20) DEFAULT NULL,
  `schedID` int(11) DEFAULT NULL,
  `dgendorsementID` int(11) DEFAULT NULL,
  `dgleader` int(11) DEFAULT NULL,
  `dgroupType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discipleshipgroup_tbl`
--

INSERT INTO `discipleshipgroup_tbl` (`dgroupID`, `ageBracket`, `schedID`, `dgendorsementID`, `dgleader`, `dgroupType`) VALUES
(4, NULL, 1, NULL, 5, 0),
(5, NULL, 2, NULL, 6, 0),
(6, NULL, 3, NULL, 42, 0),
(7, NULL, 4, NULL, 23, 3),
(9, '13-25', 6, NULL, 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `endorsement_tbl`
--

CREATE TABLE `endorsement_tbl` (
  `endorsementID` int(11) NOT NULL,
  `dgmemberID` int(11) DEFAULT NULL,
  `pastoralArea` varchar(20) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `baptismalDate` date DEFAULT NULL,
  `baptismalPlace` varchar(50) DEFAULT NULL,
  `recommendMinistry` varchar(45) DEFAULT NULL,
  `ageBracket` varchar(20) DEFAULT NULL,
  `eageBracket` varchar(20) DEFAULT NULL,
  `eschedDay` varchar(10) DEFAULT NULL,
  `eschedStartTime` time DEFAULT NULL,
  `eschedEndTime` time DEFAULT NULL,
  `eschedPlace` varchar(50) DEFAULT NULL,
  `edgleader` int(11) DEFAULT NULL,
  `edgroupType` int(11) DEFAULT NULL,
  `dateEndorsed` date DEFAULT NULL,
  `endorsementStatus` int(11) DEFAULT '0',
  `request` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endorsement_tbl`
--

INSERT INTO `endorsement_tbl` (`endorsementID`, `dgmemberID`, `pastoralArea`, `remarks`, `baptismalDate`, `baptismalPlace`, `recommendMinistry`, `ageBracket`, `eageBracket`, `eschedDay`, `eschedStartTime`, `eschedEndTime`, `eschedPlace`, `edgleader`, `edgroupType`, `dateEndorsed`, `endorsementStatus`, `request`) VALUES
(1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(58, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(72, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(76, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(78, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventassignment_tbl`
--

CREATE TABLE `eventassignment_tbl` (
  `eventAssignmentID` int(11) NOT NULL,
  `eventID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails_tbl`
--

CREATE TABLE `eventdetails_tbl` (
  `eventID` int(11) NOT NULL,
  `eventPicturePath` varchar(9999) DEFAULT NULL,
  `eventHeadID` int(11) DEFAULT NULL,
  `eventName` varchar(20) DEFAULT NULL,
  `eventDescription` varchar(50) DEFAULT NULL,
  `eventStartDay` varchar(10) DEFAULT NULL,
  `eventEndDay` varchar(10) DEFAULT NULL,
  `eventStartTime` time DEFAULT NULL,
  `eventEndTime` time DEFAULT NULL,
  `eventVenue` varchar(50) DEFAULT NULL,
  `remarks` mediumtext,
  `eventStatus` int(11) DEFAULT '0',
  `eventSchedStatus` int(11) DEFAULT '0',
  `budgetID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventparticipation_tbl`
--

CREATE TABLE `eventparticipation_tbl` (
  `eventParticipationID` int(11) NOT NULL,
  `eventID` int(11) DEFAULT NULL,
  `eventPartDesc` varchar(200) DEFAULT NULL,
  `timeParticipation` time DEFAULT NULL,
  `dateParticipation` date DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackdetails_tbl`
--

CREATE TABLE `feedbackdetails_tbl` (
  `feedbackID` int(11) NOT NULL,
  `feedbackDesc` varchar(400) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_tbl`
--

CREATE TABLE `member_tbl` (
  `memberID` int(11) NOT NULL,
  `firstName` varchar(40) DEFAULT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `nickName` varchar(10) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `civilStatus` varchar(15) DEFAULT NULL,
  `citizenship` varchar(20) DEFAULT NULL,
  `homeAddress` varchar(50) DEFAULT NULL,
  `homePhoneNumber` varchar(18) DEFAULT NULL,
  `contactNum` varchar(18) DEFAULT NULL,
  `emailAd` varchar(30) DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `dateJoined` date DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `schoolID` int(11) DEFAULT NULL,
  `spouseID` int(11) DEFAULT NULL,
  `prefID` int(11) DEFAULT NULL,
  `memberType` int(11) DEFAULT NULL,
  `welcome` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_tbl`
--

INSERT INTO `member_tbl` (`memberID`, `firstName`, `middleName`, `lastName`, `nickName`, `birthdate`, `gender`, `civilStatus`, `citizenship`, `homeAddress`, `homePhoneNumber`, `contactNum`, `emailAd`, `occupation`, `dateJoined`, `username`, `password`, `companyID`, `schoolID`, `spouseID`, `prefID`, `memberType`, `welcome`) VALUES
(1, 'Burnik', 'Dolan', 'Intergalactic', 'nigga', '2017-07-02', '0', 'Single', 'Filipino', 'admin address', '', '09122753642', 'admin@yahoo.com', 'Student', NULL, 'admin', 'admin', NULL, 1, NULL, 1, 5, '1'),
(5, 'Dodong', 'leader1', 'Laboriki', 'leader1', '2017-06-30', '0', 'Single', 'Filipino', 'Davao', '', '09124653245', 'leader1@yahoo.com', 'Student', '2017-06-30', 'leader1', 'leader1', NULL, 1, NULL, 2, 2, '1'),
(6, 'Maria', 'leader2', 'Makiling', 'leader2', '2017-06-30', '1', 'Single', 'Fili', NULL, NULL, NULL, NULL, NULL, NULL, 'leader2', 'leader2', NULL, NULL, NULL, NULL, 2, '1'),
(10, 'butchersix', 'butchersix', 'butchersix', 'butchersix', '1999-02-05', '0', 'Single', 'Filipino', 'Davao', '', '09236472741', 'aaa@yahoo.com', 'Student', '2017-07-02', 'butchersix', 'butchersix', NULL, 3, NULL, 9, 1, '1'),
(15, 'b', 'b', 'b', 'b', '2017-07-02', '1', 'Single', 'b', 'b', '', '1', 'b@yahoo.com', 'b', '2017-07-02', 'bb', 'bb', 1, 8, 1, 14, 1, '1'),
(16, 'newcomer', 'newcomer', 'newcomer', 'newcomer', '2017-07-03', '0', 'Single', '', '', '', '09127463521', '', 'Student', '2017-07-03', 'newcomer', 'newcomer', NULL, 9, NULL, NULL, 0, '1'),
(17, 'newcomer2', 'newcomer2', 'newcomer2', 'newcomer2', '2017-07-03', '1', 'Single', NULL, NULL, NULL, '09122753642', NULL, 'Student', '2017-07-03', 'newcomer2', 'newcomer2', NULL, 10, NULL, NULL, 0, '1'),
(18, 'newcomer3', 'newcomer3', 'newcomer3', 'newcomer3', '2017-07-03', '1', 'Single', '', '', '', '09122753642', '', 'Student', '2017-07-03', 'newcomer3', 'newcomer3', NULL, 11, NULL, NULL, 0, '1'),
(19, 'leryc', 'leryc', 'leryc', 'leryc', '2017-07-04', '0', 'Single', 'Filipino', 'Davao', '', '12312312312', 'asdasd@yahoo.com', 'Student', '2017-07-04', 'imaginate', 'imaginate', NULL, 12, NULL, NULL, 0, '1'),
(20, 'Samantha', 'Bagares', 'Aclan', 'Sam', '1998-03-10', '1', 'Single', 'Filipino', 'Matina Aplaya, Davao City', '2991846', '09325124522', 'aclan16@gmail.com', 'Freelancer', '2017-07-04', 'wolphy10', 'wolphy10', NULL, 12, NULL, NULL, 1, '1'),
(22, 'test', 'test', 'test', 'test', '2017-07-08', '1', 'Single', 'Filipino', 'test', '', '09236472741', 'test@yahoo.com', 'Student', '2017-07-08', 'test', 'test', 2, 13, 2, 15, 1, '1'),
(23, 'Benjamin', 'test', 'Franklin', 'Benj', '2017-07-10', '0', 'Married', 'Filipino', 'mintal', '', '09236642312', 'benjamin@yahoo.com', 'Employee', '2017-07-10', 'benj', 'benj', 3, 14, 3, 16, 2, '1'),
(24, 'Abraham', 'A.', 'Lincoln', 'Abram', '2017-07-10', '0', 'Single', 'Filipino', 'maa', '', '09274653712', 'abram@yahoo.com', 'Student', '2017-07-10', 'abram', 'abram', 4, 15, 4, 17, 1, '1'),
(40, 'test2', 'test2', 'test2', 'test2', '2017-07-11', '0', '', 'test2', 'test2', '', '', '', '', '2017-07-11', 'test2', 'test2', 20, 31, 22, 31, 1, '1'),
(41, 'test3', 'test3', 'test3', 'test3', '2017-07-12', '0', 'Single', 'test3', 'test3', '', '', '', '', '2017-07-12', 'test3', 'test3', 21, 32, 23, 32, 1, '1'),
(42, 'ehead', 'ehead', 'ehead', 'ehead', '2017-08-06', '0', 'Single', 'Single', 'Davao', '', '09123721231', 'ehead@yahoo.com', 'Employee', '2017-08-06', 'ehead', 'ehead', 22, 33, 24, 33, 3, '1'),
(43, 'mhead', 'mhead', 'mhead', 'mhead', '2017-08-06', '0', 'Married', 'Filipino', 'Davao', '', '09236472423', 'mhead@yahoo.com', 'Employee', '2017-08-06', 'mhead', 'mhead', 23, 34, 25, 34, 4, '1'),
(47, 'testl', 'testl', 'testl', 'testl', '2017-08-15', '0', 'Single', 'Filipino', 'Davao', '', '13212313111', 'testl@yahoo.com', 'Student', '2017-08-14', 'testl', 'testl', 35, 46, 37, 45, 2, '1'),
(48, 'membl', 'membl', 'membl', 'membl', '2017-08-15', '0', 'Single', 'Filipino', 'Davao', '', '09123121231', 'membl@yahoo.com', 'Student', '2017-08-14', 'membl', 'membl', 36, 47, 38, 46, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ministryassignment_tbl`
--

CREATE TABLE `ministryassignment_tbl` (
  `ministryAssignmentID` int(11) NOT NULL,
  `ministryID` int(11) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ministrydetails_tbl`
--

CREATE TABLE `ministrydetails_tbl` (
  `ministryID` int(11) NOT NULL,
  `ministryName` varchar(100) DEFAULT NULL,
  `ministryDescription` varchar(300) DEFAULT NULL,
  `ministryStatus` int(11) DEFAULT NULL,
  `ministryHeadID` int(11) DEFAULT NULL,
  `schedID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ministryparticipation_tbl`
--

CREATE TABLE `ministryparticipation_tbl` (
  `ministryParticipationID` int(11) NOT NULL,
  `ministryID` int(11) DEFAULT NULL,
  `ministryPartDesc` varchar(200) DEFAULT NULL,
  `memberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tbl`
--

CREATE TABLE `notifications_tbl` (
  `notificationID` int(11) NOT NULL,
  `memberID` int(11) DEFAULT NULL,
  `receivermemberID` int(11) DEFAULT NULL,
  `requestdgmemberID` int(11) DEFAULT NULL,
  `endorsementID` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  `ministryID` int(11) DEFAULT NULL,
  `notificationDesc` varchar(100) DEFAULT NULL,
  `notificationStatus` tinyint(1) DEFAULT '0',
  `notificationType` tinyint(1) DEFAULT NULL,
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `request` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications_tbl`
--

INSERT INTO `notifications_tbl` (`notificationID`, `memberID`, `receivermemberID`, `requestdgmemberID`, `endorsementID`, `eventID`, `ministryID`, `notificationDesc`, `notificationStatus`, `notificationType`, `success`, `request`) VALUES
(29, 10, 6, 6, 78, NULL, NULL, 'butchersix butchersix is requesting for your approval to be a Dgroup Leader', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `preferencedetails_tbl`
--

CREATE TABLE `preferencedetails_tbl` (
  `prefID` int(11) NOT NULL,
  `prefLanguage` varchar(50) DEFAULT NULL,
  `prefVenue1` varchar(50) DEFAULT NULL,
  `prefVenue2` varchar(50) DEFAULT NULL,
  `prefStartTime1` time DEFAULT NULL,
  `prefEndTime1` time DEFAULT NULL,
  `prefStartTime2` time DEFAULT NULL,
  `prefEndTime2` time DEFAULT NULL,
  `prefDay1` varchar(10) DEFAULT NULL,
  `prefDay2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preferencedetails_tbl`
--

INSERT INTO `preferencedetails_tbl` (`prefID`, `prefLanguage`, `prefVenue1`, `prefVenue2`, `prefStartTime1`, `prefEndTime1`, `prefStartTime2`, `prefEndTime2`, `prefDay1`, `prefDay2`) VALUES
(1, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '11:00:00', '12:00:00', '15:00:00', '16:00:00', 'Sunday', 'Sunday'),
(2, 'Bisaya, Tagalog, English, Cebuano', 'CCF', 'CCF', '15:00:00', '17:00:00', '16:00:00', '18:00:00', 'Sunday', 'Sunday'),
(9, 'C#', 'CCF', 'CCF', '04:26:00', '05:24:00', '16:24:00', '16:25:00', 'Sunday', 'Sunday'),
(14, 'b', 'b', 'b', '14:50:00', '14:50:00', '14:50:00', '14:50:00', 'Saturday', 'Saturday'),
(15, 'Tagalog Bisaya English', 'CCF', 'CCF', '16:00:00', '18:00:00', '18:00:00', '00:00:00', 'Sunday', 'Sunday'),
(16, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '17:37:00', '17:37:00', '17:37:00', '17:37:00', 'Saturday', 'Saturday'),
(17, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '17:52:00', '17:52:00', '17:52:00', '17:52:00', 'Saturday', 'Saturday'),
(24, 'test2', 'test2', 'test2', '19:10:00', '19:10:00', '19:10:00', '19:10:00', 'Saturday', 'Saturday'),
(25, 'test2', 'test2', 'test2', '19:14:00', '19:14:00', '19:14:00', '19:14:00', 'Saturday', 'Saturday'),
(26, 'test2', 'test2', 'test2', '19:16:00', '19:16:00', '19:16:00', '19:16:00', 'Saturday', 'Saturday'),
(27, 'test2', 'test2', 'test2', '19:19:00', '19:19:00', '19:19:00', '19:19:00', 'Saturday', 'Saturday'),
(28, 'test2', 'test2', 'test2', '19:21:00', '19:21:00', '19:21:00', '19:21:00', 'Saturday', 'Saturday'),
(29, 'test2', 'test2', 'test2', '19:29:00', '19:29:00', '19:29:00', '19:29:00', 'Saturday', 'Saturday'),
(30, 'test2', 'test2', 'test2', '19:36:00', '19:36:00', '19:36:00', '19:36:00', 'Friday', 'Saturday'),
(31, 'test2', 'test2', 'test2', '09:37:00', '09:37:00', '09:37:00', '09:37:00', 'Saturday', 'Saturday'),
(32, 'English', 'CCF', 'CCF', '17:15:00', '17:15:00', '17:15:00', '17:15:00', 'Thursday', 'Saturday'),
(33, 'English, Bisaya, Tagalog', 'CCF', 'CCF', '14:30:00', '15:30:00', '16:30:00', '17:30:00', 'Sunday', 'Sunday'),
(34, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '13:30:00', '13:30:00', '15:30:00', '15:30:00', 'Saturday', 'Saturday'),
(35, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:11:00', '06:12:00', '06:11:00', '06:12:00', 'Saturday', 'Saturday'),
(36, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:15:00', '06:15:00', '06:15:00', '06:15:00', 'Saturday', 'Saturday'),
(37, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:26:00', '06:26:00', '06:26:00', '06:26:00', 'Saturday', 'Saturday'),
(38, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:29:00', '06:29:00', '06:29:00', '06:29:00', 'Saturday', 'Saturday'),
(39, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:34:00', '06:34:00', '06:34:00', '06:35:00', 'Saturday', 'Saturday'),
(40, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:39:00', '06:39:00', '06:39:00', '06:39:00', 'Saturday', 'Saturday'),
(41, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '06:42:00', '06:43:00', '06:42:00', '06:43:00', 'Saturday', 'Saturday'),
(42, 'a', 'CCF', 'CCF', '06:56:00', '06:56:00', '06:56:00', '06:56:00', 'Saturday', 'Saturday'),
(43, 'test_leader', 'test_leader', 'test_leader', '06:58:00', '06:58:00', '06:58:00', '06:58:00', 'Saturday', 'Saturday'),
(44, 'a', 'CCF', 'a', '06:59:00', '06:59:00', '06:59:00', '06:59:00', 'Saturday', 'Saturday'),
(45, 'English', 'CCF', 'CCF', '07:02:00', '07:02:00', '07:02:00', '07:02:00', 'Saturday', 'Saturday'),
(46, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '07:07:00', '07:07:00', '07:07:00', '07:07:00', 'Saturday', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `scheduledmeeting_tbl`
--

CREATE TABLE `scheduledmeeting_tbl` (
  `schedID` int(11) NOT NULL,
  `schedDate` date DEFAULT NULL,
  `schedDay` varchar(10) DEFAULT NULL,
  `schedPlace` varchar(50) DEFAULT NULL,
  `schedStartTime` time DEFAULT NULL,
  `schedEndTime` time DEFAULT NULL,
  `schedAgenda` varchar(45) DEFAULT NULL,
  `schedType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scheduledmeeting_tbl`
--

INSERT INTO `scheduledmeeting_tbl` (`schedID`, `schedDate`, `schedDay`, `schedPlace`, `schedStartTime`, `schedEndTime`, `schedAgenda`, `schedType`) VALUES
(1, NULL, 'Saturday', 'CCF', '14:00:00', '16:00:00', NULL, 0),
(2, NULL, 'Saturday', 'CCF', '16:00:00', '18:00:00', NULL, 0),
(3, NULL, 'Saturday', 'CCF', '14:00:00', '16:00:00', NULL, 0),
(4, NULL, 'Saturday', 'CCF', '13:30:00', '15:30:00', NULL, 0),
(6, NULL, 'Saturday', 'CCF', '13:00:00', '15:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schooldetails_tbl`
--

CREATE TABLE `schooldetails_tbl` (
  `schoolID` int(11) NOT NULL,
  `schoolName` varchar(30) DEFAULT NULL,
  `schoolContactNum` varchar(18) DEFAULT NULL,
  `schoolAddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schooldetails_tbl`
--

INSERT INTO `schooldetails_tbl` (`schoolID`, `schoolName`, `schoolContactNum`, `schoolAddress`) VALUES
(1, 'AdDU College', '091231123', 'Roxas'),
(2, 'UP Mintal', NULL, NULL),
(3, 'AdDU College', '', ''),
(8, 'b', '', ''),
(9, 'San Pedro College', '', ''),
(10, 'San pidro college', '', ''),
(11, 'newcomer school 3', '', ''),
(12, 'AdDU', '', ''),
(13, 'AdDU College', '', ''),
(14, 'AdDU College', '', ''),
(15, 'SPC', '', ''),
(24, 'test2', '', ''),
(25, 'test2', '', ''),
(26, 'test2', '', ''),
(27, 'test2', '', ''),
(28, 'test2', '', ''),
(29, 'test2', '', ''),
(30, 'test2', '', ''),
(31, 'test2', '', ''),
(32, 'test3', '', ''),
(33, 'Ateneo de Davao University', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, 'Ateneo de Davao University', '', ''),
(37, 'Ateneo de Davao University', '', ''),
(38, 'AdDU College', '', ''),
(39, 'AdDU College', '', ''),
(40, 'AdDU College', '', ''),
(41, 'AdDU College', '', ''),
(42, 'AdDU College', '', ''),
(43, 'a', '', ''),
(44, 'test_leader', '', ''),
(45, 'a', '', ''),
(46, 'AdDU College', '', ''),
(47, 'membl', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `spousedetails_tbl`
--

CREATE TABLE `spousedetails_tbl` (
  `spouseID` int(11) NOT NULL,
  `spouseName` varchar(30) DEFAULT NULL,
  `spouseContactNum` varchar(18) DEFAULT NULL,
  `spouseBirthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spousedetails_tbl`
--

INSERT INTO `spousedetails_tbl` (`spouseID`, `spouseName`, `spouseContactNum`, `spouseBirthdate`) VALUES
(1, 'b', '', '1970-01-02'),
(2, 'a', '', '1970-01-01'),
(3, '', '', '1970-01-01'),
(4, '', '', NULL),
(15, 'test2', '', '1970-01-01'),
(16, 'test2', '', '1970-01-01'),
(17, 'test2', '', '1970-01-01'),
(18, 'test2', '', '1970-01-01'),
(19, 'test2', '', '1970-01-01'),
(20, 'test2', '', '1970-01-01'),
(21, 'test2', '', '1970-01-01'),
(22, 'test2', '', '1970-01-01'),
(23, 'test3', '', '1970-01-01'),
(24, 'a', '', '1970-01-01'),
(25, 'God knows :)', '', '1970-01-01'),
(26, 'a', '', '1970-01-01'),
(27, '', '', '1970-01-01'),
(28, '', '', '1970-01-01'),
(29, '', '', '1970-01-01'),
(30, '', '', '1970-01-01'),
(31, '', '', '1970-01-01'),
(32, 'a', '', '1970-01-01'),
(33, 'a', '', '1970-01-01'),
(34, 'a', '', '1970-01-01'),
(35, 'test_leader', '', '1970-01-01'),
(36, 'a', '', '1970-01-01'),
(37, '', '', '1970-01-01'),
(38, '', '', '1970-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivedfeedbacks_tbl`
--
ALTER TABLE `archivedfeedbacks_tbl`
  ADD KEY `feedbackID_idx` (`archFeedbackID`);

--
-- Indexes for table `budgetdetails_tbl`
--
ALTER TABLE `budgetdetails_tbl`
  ADD PRIMARY KEY (`budgetID`);

--
-- Indexes for table `companydetails_tbl`
--
ALTER TABLE `companydetails_tbl`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `discipleshipgroupmembers_tbl`
--
ALTER TABLE `discipleshipgroupmembers_tbl`
  ADD PRIMARY KEY (`dgroupmemberID`),
  ADD KEY `memberID_idx` (`memberID`),
  ADD KEY `dgroupID_idx` (`dgroupID`);

--
-- Indexes for table `discipleshipgroup_tbl`
--
ALTER TABLE `discipleshipgroup_tbl`
  ADD PRIMARY KEY (`dgroupID`),
  ADD KEY `schedID_idx` (`schedID`),
  ADD KEY `dgendorsementID` (`dgendorsementID`),
  ADD KEY `dgleader` (`dgleader`);

--
-- Indexes for table `endorsement_tbl`
--
ALTER TABLE `endorsement_tbl`
  ADD PRIMARY KEY (`endorsementID`),
  ADD UNIQUE KEY `dgmemberID` (`dgmemberID`),
  ADD KEY `endorsedMemberID_idx` (`dgmemberID`);

--
-- Indexes for table `eventassignment_tbl`
--
ALTER TABLE `eventassignment_tbl`
  ADD PRIMARY KEY (`eventAssignmentID`),
  ADD KEY `eaeventID_idx` (`eventID`),
  ADD KEY `eamemberID_idx` (`memberID`);

--
-- Indexes for table `eventdetails_tbl`
--
ALTER TABLE `eventdetails_tbl`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `edbudgetID_idx` (`budgetID`),
  ADD KEY `eventHeadID_idx` (`eventHeadID`);

--
-- Indexes for table `eventparticipation_tbl`
--
ALTER TABLE `eventparticipation_tbl`
  ADD PRIMARY KEY (`eventParticipationID`),
  ADD KEY `eventID_idx` (`eventID`),
  ADD KEY `epmemberID_idx` (`memberID`);

--
-- Indexes for table `feedbackdetails_tbl`
--
ALTER TABLE `feedbackdetails_tbl`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `fmemberID_idx` (`memberID`);

--
-- Indexes for table `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `companyID_idx` (`companyID`),
  ADD KEY `schoolID_idx` (`schoolID`),
  ADD KEY `spouseID_idx` (`spouseID`),
  ADD KEY `preferenceID_idx` (`prefID`);

--
-- Indexes for table `ministryassignment_tbl`
--
ALTER TABLE `ministryassignment_tbl`
  ADD PRIMARY KEY (`ministryAssignmentID`),
  ADD KEY `maministryID_idx` (`ministryID`),
  ADD KEY `mamemberID_idx` (`memberID`);

--
-- Indexes for table `ministrydetails_tbl`
--
ALTER TABLE `ministrydetails_tbl`
  ADD PRIMARY KEY (`ministryID`);

--
-- Indexes for table `ministryparticipation_tbl`
--
ALTER TABLE `ministryparticipation_tbl`
  ADD PRIMARY KEY (`ministryParticipationID`),
  ADD KEY `ministryID_idx` (`ministryID`),
  ADD KEY `mpmemberID_idx` (`memberID`);

--
-- Indexes for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  ADD PRIMARY KEY (`notificationID`),
  ADD UNIQUE KEY `endorsementID` (`endorsementID`,`eventID`,`ministryID`),
  ADD KEY `nendorsementID` (`endorsementID`),
  ADD KEY `neventID` (`eventID`),
  ADD KEY `nministryID` (`ministryID`);

--
-- Indexes for table `preferencedetails_tbl`
--
ALTER TABLE `preferencedetails_tbl`
  ADD PRIMARY KEY (`prefID`);

--
-- Indexes for table `scheduledmeeting_tbl`
--
ALTER TABLE `scheduledmeeting_tbl`
  ADD PRIMARY KEY (`schedID`);

--
-- Indexes for table `schooldetails_tbl`
--
ALTER TABLE `schooldetails_tbl`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `spousedetails_tbl`
--
ALTER TABLE `spousedetails_tbl`
  ADD PRIMARY KEY (`spouseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgetdetails_tbl`
--
ALTER TABLE `budgetdetails_tbl`
  MODIFY `budgetID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `companydetails_tbl`
--
ALTER TABLE `companydetails_tbl`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `discipleshipgroupmembers_tbl`
--
ALTER TABLE `discipleshipgroupmembers_tbl`
  MODIFY `dgroupmemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `discipleshipgroup_tbl`
--
ALTER TABLE `discipleshipgroup_tbl`
  MODIFY `dgroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `endorsement_tbl`
--
ALTER TABLE `endorsement_tbl`
  MODIFY `endorsementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `eventassignment_tbl`
--
ALTER TABLE `eventassignment_tbl`
  MODIFY `eventAssignmentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventdetails_tbl`
--
ALTER TABLE `eventdetails_tbl`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventparticipation_tbl`
--
ALTER TABLE `eventparticipation_tbl`
  MODIFY `eventParticipationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbackdetails_tbl`
--
ALTER TABLE `feedbackdetails_tbl`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_tbl`
--
ALTER TABLE `member_tbl`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `ministryassignment_tbl`
--
ALTER TABLE `ministryassignment_tbl`
  MODIFY `ministryAssignmentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ministrydetails_tbl`
--
ALTER TABLE `ministrydetails_tbl`
  MODIFY `ministryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ministryparticipation_tbl`
--
ALTER TABLE `ministryparticipation_tbl`
  MODIFY `ministryParticipationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `preferencedetails_tbl`
--
ALTER TABLE `preferencedetails_tbl`
  MODIFY `prefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `scheduledmeeting_tbl`
--
ALTER TABLE `scheduledmeeting_tbl`
  MODIFY `schedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schooldetails_tbl`
--
ALTER TABLE `schooldetails_tbl`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `spousedetails_tbl`
--
ALTER TABLE `spousedetails_tbl`
  MODIFY `spouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `archivedfeedbacks_tbl`
--
ALTER TABLE `archivedfeedbacks_tbl`
  ADD CONSTRAINT `feedbackID` FOREIGN KEY (`archFeedbackID`) REFERENCES `feedbackdetails_tbl` (`feedbackID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discipleshipgroupmembers_tbl`
--
ALTER TABLE `discipleshipgroupmembers_tbl`
  ADD CONSTRAINT `dgroupID` FOREIGN KEY (`dgroupID`) REFERENCES `discipleshipgroup_tbl` (`dgroupID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `memberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discipleshipgroup_tbl`
--
ALTER TABLE `discipleshipgroup_tbl`
  ADD CONSTRAINT `dgendorsementID` FOREIGN KEY (`dgendorsementID`) REFERENCES `endorsement_tbl` (`endorsementID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dgleader` FOREIGN KEY (`dgleader`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `schedID` FOREIGN KEY (`schedID`) REFERENCES `scheduledmeeting_tbl` (`schedID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `endorsement_tbl`
--
ALTER TABLE `endorsement_tbl`
  ADD CONSTRAINT `endorsedMemberID` FOREIGN KEY (`dgmemberID`) REFERENCES `discipleshipgroupmembers_tbl` (`dgroupmemberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventassignment_tbl`
--
ALTER TABLE `eventassignment_tbl`
  ADD CONSTRAINT `eaeventID` FOREIGN KEY (`eventID`) REFERENCES `eventdetails_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `eamemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventdetails_tbl`
--
ALTER TABLE `eventdetails_tbl`
  ADD CONSTRAINT `edbudgetID` FOREIGN KEY (`budgetID`) REFERENCES `budgetdetails_tbl` (`budgetID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `eventHeadID` FOREIGN KEY (`eventHeadID`) REFERENCES `eventparticipation_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventparticipation_tbl`
--
ALTER TABLE `eventparticipation_tbl`
  ADD CONSTRAINT `epmemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `eventID` FOREIGN KEY (`eventID`) REFERENCES `eventdetails_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedbackdetails_tbl`
--
ALTER TABLE `feedbackdetails_tbl`
  ADD CONSTRAINT `fmemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD CONSTRAINT `companyID` FOREIGN KEY (`companyID`) REFERENCES `companydetails_tbl` (`companyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `preferenceID` FOREIGN KEY (`prefID`) REFERENCES `preferencedetails_tbl` (`prefID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `schoolID` FOREIGN KEY (`schoolID`) REFERENCES `schooldetails_tbl` (`schoolID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `spouseID` FOREIGN KEY (`spouseID`) REFERENCES `spousedetails_tbl` (`spouseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ministryassignment_tbl`
--
ALTER TABLE `ministryassignment_tbl`
  ADD CONSTRAINT `mamemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `maministryID` FOREIGN KEY (`ministryID`) REFERENCES `ministrydetails_tbl` (`ministryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ministryparticipation_tbl`
--
ALTER TABLE `ministryparticipation_tbl`
  ADD CONSTRAINT `mpmemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mpministryID` FOREIGN KEY (`ministryID`) REFERENCES `ministrydetails_tbl` (`ministryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  ADD CONSTRAINT `nendorsementID` FOREIGN KEY (`endorsementID`) REFERENCES `endorsement_tbl` (`endorsementID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `neventID` FOREIGN KEY (`eventID`) REFERENCES `eventdetails_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nministryID` FOREIGN KEY (`ministryID`) REFERENCES `ministrydetails_tbl` (`ministryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
