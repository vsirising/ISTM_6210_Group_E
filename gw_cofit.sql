-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 06:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gw_cofit`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `GW_UserName` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Phone_Number` varchar(10) NOT NULL,
  `Street_Address` varchar(500) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `ZipCode` varchar(5) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `InstructorID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `GW_UserName`, `Password`, `Email`, `First_Name`, `Last_Name`, `Phone_Number`, `Street_Address`, `City`, `State`, `ZipCode`, `Role`, `StudentID`, `InstructorID`, `AdminID`) VALUES
(2, 'studenttest1', 'studentpassword1', 'daniel@gmail.com', 'Damn', 'Daniel', '8123498326', '1000 N Fee Lane', 'Bloomington', 'IN', '47406', 'Student', 2, NULL, NULL),
(3, 'studenttest2', 'studentpassword2', 'cindy@gmail.com', 'Cindy', 'Richard', '4147778999', '445 N Union St', 'Alexandria', 'VA', '22210', 'Student', 3, NULL, NULL),
(4, 'instructortest1', 'instructorpassword1', 'tala@gwu.edu', 'TALA', 'Lastname', '5458889774', '1000 N Echo St', 'Birmingham', 'DE', '32210', 'Instructor', NULL, 1, NULL),
(11, 'instructortest2', 'instructorpassword2', 'cindy@gmail.com', 'Cindy', 'Richard', '4147778999', '445 N Union St', 'Alexandria', 'VA', '22210', 'Instructor', NULL, 3, NULL),
(15, 'Admintest2', 'adminpassword2', 'admin@gmail.com', 'Admintest', 'TestADmin', '8123498326', '1000 N Fee Lane', 'Bloomington', 'IN', '47406', 'Admin', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `date`) VALUES
(1, '2021-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `ContentID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `InstructorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `InstructorName` varchar(255) NOT NULL,
  `Specialty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `InstructorName`, `Specialty`) VALUES
(1, 'Man of Steel', 'Cardio'),
(2, 'Amie', 'Cardio'),
(3, 'Cindy Richard', 'YOGA'),
(4, 'Nicole', 'strength');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `School_Year` varchar(255) NOT NULL,
  `Student_Status` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Weight` int(3) NOT NULL,
  `Height` varchar(10) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Membership_StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `School_Year`, `Student_Status`, `DOB`, `Weight`, `Height`, `Gender`, `Membership_StartDate`) VALUES
(1, 'Senior', 'Full-Time', '1996-09-08', 140, '173cm', 'Male', '2021-04-07'),
(2, 'Junior', 'Part Time', '1999-05-07', 123, '180CM', 'Male', '2021-04-07'),
(3, 'Freshmen', 'Fulltime', '2002-05-07', 100, '150cm', 'Female', '2021-04-07'),
(4, 'Senior', 'i hate my life', '1999-05-07', 135, '173cm', 'afds', '2021-03-19'),
(5, 'Senior', 'Fulltime', '1996-09-08', 130, '173cm', 'Male', '2021-04-03'),
(6, 'gdsa', 'i hate my life', '1996-09-08', 130, 'asdf', 'afds', '2021-04-25'),
(7, 'test', 'test', '1996-09-08', 0, 'test', 'test', '2021-04-25'),
(8, 'Senior', 'Fulltime', '2000-06-14', 135, '173cm', 'Male', '2021-04-27'),
(9, 'Senior', 'Fulltime', '1997-06-11', 130, '173cm', 'Male', '2021-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `InstructorID` (`InstructorID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`ContentID`),
  ADD KEY `InstructorID` (`InstructorID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`InstructorID`),
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`InstructorID`) REFERENCES `instructor` (`InstructorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
