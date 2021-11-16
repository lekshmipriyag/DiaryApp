-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 01:25 PM
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
-- Database: `db_diary4u`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customization`
--

CREATE TABLE `tbl_customization` (
  `ProductId` int(6) NOT NULL,
  `PaperColor` varchar(10) DEFAULT NULL,
  `Theme` varchar(20) DEFAULT NULL,
  `PaperType` varchar(11) DEFAULT NULL,
  `TextCover` varchar(50) DEFAULT NULL,
  `Size` varchar(15) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Totalprice` float NOT NULL,
  `LoginID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customization`
--

INSERT INTO `tbl_customization` (`ProductId`, `PaperColor`, `Theme`, `PaperType`, `TextCover`, `Size`, `Price`, `Quantity`, `Totalprice`, `LoginID`) VALUES
(45, 'Seablue', 'Silence', 'Plain', 'Testing', 'Mini', 24.99, 3, 74.97, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliverydetails`
--

CREATE TABLE `tbl_deliverydetails` (
  `DeliveryId` int(6) NOT NULL,
  `DeliveryType` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `MobileNo` int(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `State` varchar(15) NOT NULL,
  `PostCode` varchar(8) DEFAULT NULL,
  `CustomerID` int(6) NOT NULL,
  `OrderNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `FeedbackID` int(6) NOT NULL,
  `Feedback` varchar(100) DEFAULT NULL,
  `ViewFeedback` varchar(20) DEFAULT NULL,
  `Feedback_date` datetime NOT NULL,
  `CustmerID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `Id` int(11) NOT NULL,
  `LoginID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Id`, `LoginID`, `Username`, `Password`, `Usertype`) VALUES
(3, 37, 'lekshmi', 'Lekshmi', 'customer'),
(4, 38, 'arun', 'Arun123', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetails`
--

CREATE TABLE `tbl_orderdetails` (
  `orderId` int(11) NOT NULL,
  `OrderNumber` varchar(30) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `GrandTotal` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentdetails`
--

CREATE TABLE `tbl_paymentdetails` (
  `PaymentId` int(6) NOT NULL,
  `TransactionNumber` varchar(30) NOT NULL,
  `PaymentType` varchar(20) DEFAULT NULL,
  `CardNo` varchar(16) DEFAULT NULL,
  `ExpDate` varchar(10) DEFAULT NULL,
  `Name` varchar(20) NOT NULL,
  `CCV` int(3) DEFAULT NULL,
  `CustomerID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `Userid` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `MobileNo` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `PostCode` varchar(8) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`Userid`, `Name`, `MobileNo`, `Address`, `State`, `PostCode`, `Email`, `username`, `password`) VALUES
(37, 'Lekshmi', 431440140, '11  Crathes Avenue', 'Tasmania', '3750', 'lekshmicgnr@gmail.com', 'lekshmi', 'Lekshmi'),
(38, 'Arun Rajendran', 431440140, '11 Crathes Avenue', 'Victoria', '3750', 'arun@gmail.com', 'arun', 'Arun123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `uidrule7` (`LoginID`);

--
-- Indexes for table `tbl_deliverydetails`
--
ALTER TABLE `tbl_deliverydetails`
  ADD PRIMARY KEY (`DeliveryId`),
  ADD KEY `uidrule3` (`CustomerID`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `uidrule2` (`CustmerID`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `LoginID` (`LoginID`);

--
-- Indexes for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `CustomerID` (`CustomerID`,`PaymentID`),
  ADD KEY `uidrule10` (`PaymentID`);

--
-- Indexes for table `tbl_paymentdetails`
--
ALTER TABLE `tbl_paymentdetails`
  ADD PRIMARY KEY (`PaymentId`),
  ADD KEY `uidrule` (`CustomerID`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  MODIFY `ProductId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_deliverydetails`
--
ALTER TABLE `tbl_deliverydetails`
  MODIFY `DeliveryId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `FeedbackID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234557;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_paymentdetails`
--
ALTER TABLE `tbl_paymentdetails`
  MODIFY `PaymentId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `Userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_customization`
--
ALTER TABLE `tbl_customization`
  ADD CONSTRAINT `uidrule7` FOREIGN KEY (`LoginID`) REFERENCES `tbl_login` (`LoginID`);

--
-- Constraints for table `tbl_deliverydetails`
--
ALTER TABLE `tbl_deliverydetails`
  ADD CONSTRAINT `uidrule3` FOREIGN KEY (`CustomerID`) REFERENCES `tbl_register` (`Userid`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `uidrule2` FOREIGN KEY (`CustmerID`) REFERENCES `tbl_register` (`Userid`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `uidrule5` FOREIGN KEY (`LoginID`) REFERENCES `tbl_register` (`Userid`);

--
-- Constraints for table `tbl_orderdetails`
--
ALTER TABLE `tbl_orderdetails`
  ADD CONSTRAINT `tbl_orderdetails_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `tbl_login` (`LoginID`),
  ADD CONSTRAINT `uidrule10` FOREIGN KEY (`PaymentID`) REFERENCES `tbl_paymentdetails` (`PaymentId`);

--
-- Constraints for table `tbl_paymentdetails`
--
ALTER TABLE `tbl_paymentdetails`
  ADD CONSTRAINT `uidrule` FOREIGN KEY (`CustomerID`) REFERENCES `tbl_register` (`Userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
