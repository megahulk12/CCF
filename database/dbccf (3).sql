-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 02:27 AM
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
(1, 'b', '', '');

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
(3, 5, NULL, 1, NULL, NULL, NULL, NULL, '2017-06-30'),
(4, 6, NULL, 1, NULL, NULL, NULL, NULL, '2017-07-01'),
(5, 1, 4, 1, 'aa', 'aa', 'aa', NULL, '2017-07-01'),
(6, 10, 5, 1, 'a', 'a', 'a', NULL, '2017-07-02'),
(11, 15, 5, 1, 'b', 'b', 'b', NULL, '2017-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `discipleshipgroup_tbl`
--

CREATE TABLE `discipleshipgroup_tbl` (
  `dgroupID` int(11) NOT NULL,
  `schedID` int(11) DEFAULT NULL,
  `dgendorsementID` int(11) DEFAULT NULL,
  `dgleader` int(11) DEFAULT NULL,
  `dgroupType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discipleshipgroup_tbl`
--

INSERT INTO `discipleshipgroup_tbl` (`dgroupID`, `schedID`, `dgendorsementID`, `dgleader`, `dgroupType`) VALUES
(4, 1, NULL, 5, 0),
(5, 2, NULL, 6, 0);

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
  `dateEndorsed` date DEFAULT NULL,
  `endorsementStatus` int(11) DEFAULT '0',
  `request` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `endorsement_tbl`
--

INSERT INTO `endorsement_tbl` (`endorsementID`, `dgmemberID`, `pastoralArea`, `remarks`, `baptismalDate`, `baptismalPlace`, `recommendMinistry`, `ageBracket`, `dateEndorsed`, `endorsementStatus`, `request`) VALUES
(1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0'),
(47, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1');

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
  `eventHeadID` int(11) DEFAULT NULL,
  `eventName` varchar(20) DEFAULT NULL,
  `eventDescription` varchar(50) DEFAULT NULL,
  `eventDay` varchar(10) DEFAULT NULL,
  `eventTime` time DEFAULT NULL,
  `eventVenue` varchar(50) DEFAULT NULL,
  `eventStatus` int(11) DEFAULT NULL,
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
  `memberID` int(11) DEFAULT NULL,
  `endorsementID` int(11) DEFAULT NULL
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
  `firstName` varchar(20) DEFAULT NULL,
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
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
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
(1, 'admin', 'admin', 'admin', 'admin', '2017-07-02', '0', 'Single', 'Filipino', 'admin address', '', '09122753642', 'admin@yahoo.com', 'Student', NULL, 'admin', 'admin', NULL, 1, NULL, 1, 1, '1'),
(5, 'leader1', 'leader1', 'leader1', 'leader1', '2017-06-30', '0', 'Single', 'Filipino', 'Davao', NULL, '09124653245', 'leader1@yahoo.com', 'Student', '2017-06-30', 'leader1', 'leader1', NULL, 1, NULL, 2, 2, '1'),
(6, 'leader2', 'leader2', 'leader2', 'leader2', '2017-06-30', '1', 'Single', 'Fili', NULL, NULL, NULL, NULL, NULL, NULL, 'leader2', 'butchersix', NULL, NULL, NULL, NULL, 2, '0'),
(10, 'butchersix', 'butchersix', 'butchersix', 'butchersix', '2017-07-02', '0', 'Single', 'a', 'a', '', '1', 'a@yahoo.com', 'a', '2017-07-02', 'butchersix', 'butchersix', NULL, 3, NULL, 9, 1, '1'),
(15, 'b', 'b', 'b', 'b', '2017-07-02', '1', 'Single', 'b', 'b', '', '1', 'b@yahoo.com', 'b', '2017-07-02', 'bb', 'butchersix', 1, 8, 1, 14, 1, '1'),
(16, 'newcomer', 'newcomer', 'newcomer', 'newcomer', '2017-07-03', '0', 'Single', '', '', '', '09127463521', '', 'Student', '2017-07-03', 'newcomer', 'newcomer', NULL, 9, NULL, NULL, 0, '1'),
(17, 'newcomer2', 'newcomer2', 'newcomer2', 'newcomer2', '2017-07-03', '1', 'Single', NULL, NULL, NULL, '09122753642', NULL, 'Student', '2017-07-03', 'newcomer2', 'newcomer2', NULL, 10, NULL, NULL, 0, '1'),
(18, 'newcomer3', 'newcomer3', 'newcomer3', 'newcomer3', '2017-07-03', '1', 'Single', '', '', '', '09122753642', '', 'Student', '2017-07-03', 'newcomer3', 'newcomer3', NULL, 11, NULL, NULL, 0, '1');

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
  `memberID` int(11) DEFAULT NULL,
  `endorsementID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Tagalog, Bisaya, English', 'CCF', 'CCF', '13:00:00', '12:00:00', '15:00:00', '16:00:00', 'Sunday', 'Sunday'),
(2, 'Bisaya, Tagalog, English, Cebuano', 'CCF', 'CCF', '15:00:00', '17:00:00', '16:00:00', '18:00:00', 'Saturday', 'Saturday'),
(9, 'a', 'a', 'a', '12:24:00', '12:24:00', '12:24:00', '12:24:00', 'Saturday', 'Saturday'),
(14, 'b', 'b', 'b', '14:50:00', '14:50:00', '14:50:00', '14:50:00', 'Saturday', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `scheduledmeeting_tbl`
--

CREATE TABLE `scheduledmeeting_tbl` (
  `schedID` int(11) NOT NULL,
  `schedDate` date DEFAULT NULL,
  `schedDay` varchar(10) DEFAULT NULL,
  `schedStartTime` time DEFAULT NULL,
  `schedEndTime` time DEFAULT NULL,
  `schedAgenda` varchar(45) DEFAULT NULL,
  `schedType` int(11) DEFAULT NULL,
  `schedPlace` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scheduledmeeting_tbl`
--

INSERT INTO `scheduledmeeting_tbl` (`schedID`, `schedDate`, `schedDay`, `schedStartTime`, `schedEndTime`, `schedAgenda`, `schedType`, `schedPlace`) VALUES
(1, NULL, 'Saturday', '14:00:00', '16:00:00', NULL, 0, 'CCF'),
(2, NULL, 'Saturday', '16:00:00', '18:00:00', NULL, 0, 'CCF');

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
(1, 'AdDU College', 'asdasdasd', 'Roxas'),
(2, 'UP Mintal', NULL, NULL),
(3, 'a', '', ''),
(8, 'b', '', ''),
(9, 'San Pedro College', '', ''),
(10, 'San pidro college', '', ''),
(11, 'newcomer school 3', '', '');

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
(1, 'b', '', '1970-01-02');

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
  ADD KEY `dgendorsementID` (`dgendorsementID`);

--
-- Indexes for table `endorsement_tbl`
--
ALTER TABLE `endorsement_tbl`
  ADD PRIMARY KEY (`endorsementID`),
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
  ADD KEY `epmemberID_idx` (`memberID`),
  ADD KEY `ependorsementID_idx` (`endorsementID`);

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
  ADD KEY `mpmemberID_idx` (`memberID`),
  ADD KEY `mpendorsementID_idx` (`endorsementID`);

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
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `discipleshipgroupmembers_tbl`
--
ALTER TABLE `discipleshipgroupmembers_tbl`
  MODIFY `dgroupmemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `discipleshipgroup_tbl`
--
ALTER TABLE `discipleshipgroup_tbl`
  MODIFY `dgroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `endorsement_tbl`
--
ALTER TABLE `endorsement_tbl`
  MODIFY `endorsementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
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
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
-- AUTO_INCREMENT for table `preferencedetails_tbl`
--
ALTER TABLE `preferencedetails_tbl`
  MODIFY `prefID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `scheduledmeeting_tbl`
--
ALTER TABLE `scheduledmeeting_tbl`
  MODIFY `schedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schooldetails_tbl`
--
ALTER TABLE `schooldetails_tbl`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `spousedetails_tbl`
--
ALTER TABLE `spousedetails_tbl`
  MODIFY `spouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `ependorsementID` FOREIGN KEY (`endorsementID`) REFERENCES `endorsement_tbl` (`endorsementID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `mpendorsementID` FOREIGN KEY (`endorsementID`) REFERENCES `endorsement_tbl` (`endorsementID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mpmemberID` FOREIGN KEY (`memberID`) REFERENCES `member_tbl` (`memberID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mpministryID` FOREIGN KEY (`ministryID`) REFERENCES `ministrydetails_tbl` (`ministryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
