-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 11:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `pfrom` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `assignedto` varchar(60) NOT NULL,
  `createdby` varchar(60) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `description`, `brand`, `model`, `serial`, `pdate`, `cost`, `pfrom`, `status`, `assignedto`, `createdby`, `Date_Created`) VALUES
(2, 'Laptop', 'Dell', 'Latitude 5400', 'GQRTY3N4', '04/13/2020', '96000', 'Agile Technologies', 'Under Repair', '', '', '2020-04-16 02:12:40'),
(3, 'Mobile Phone', 'iPhone', '6S', '6SRTY23', '01/15/2020', '90000', 'iPhone USA', 'Re-Assigned', 'james.wesly@assetmopau.com', '', '2020-04-16 14:57:31'),
(6, 'Desktop', 'Dell', 'Vostro 6040', 'QWDRTY2', '04/17/2020', '80000', 'Dell Corporation', 'In-Stock', '', 'chris.mutuma@assetmopau.com', '2020-04-19 23:49:17'),
(7, 'Laptop', 'MAC', 'Mac Book Air', 'MAC456710', '01/06/2020', '120000', 'Technology Today', 'In-Stock', '', 'demo1.demo@assetmopau.com', '2020-04-20 23:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `Date Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `empid`, `title`, `phone`, `email`, `department`, `Date Created`) VALUES
(3, 'Martin', 'George', 'M202056', 'IT', '+254724941147', 'martin.george@assetmopau.com', 'Technology', '2020-04-16 00:26:12'),
(4, 'Edith', 'James', 'M202013', 'CEO', '+254734567897', 'edith.james@assetmopau.com', 'Management', '2020-04-17 22:35:05'),
(5, 'Timothy', 'Kinyua', 'M2020056', 'IT Support', '+254734568967', 'timothy.kinyua@assetmopau.com', 'IT', '2020-04-21 00:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regaccess`
--

CREATE TABLE `regaccess` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `title` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regaccess`
--

INSERT INTO `regaccess` (`id`, `fname`, `lname`, `email`, `password`, `title`, `phone`, `Date_Created`) VALUES
(14, 'Timothy', 'Munyao', 'timo.munyao@assetmopau.com', '$2y$10$R5FuSN.IRID0oW/j077v0uLhTFkf14fjaQkYfeASadmSSghPwg8/2', 'Founder/Owner', '+254734567898', '2020-04-21 01:34:45'),
(15, 'admin', 'admin', 'admin@assetmopau.com', '$2y$10$mpVmGTGZ9Dggw.eyhg93suWrf07widCj8D3BvdT3Mutd/X7wTGFTe', '', '', '2020-05-11 18:34:07'),
(16, 'chris', 'test', 'christophermutuma@gmail.com', '$2y$10$IISeq.zyAbZmyEEcmH4kcOhGWecM4fbw9qV/KC9kX5AKrhUvwTwR.', '', '', '2020-05-27 22:46:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `regaccess`
--
ALTER TABLE `regaccess`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `regaccess`
--
ALTER TABLE `regaccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
