-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 05:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicalcollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `feeds_Id` int(11) NOT NULL,
  `feeds_Title` varchar(255) NOT NULL,
  `feeds_Description` text NOT NULL,
  `feeds_File_one` varchar(255) NOT NULL,
  `feeds_File_two` varchar(255) NOT NULL,
  `feeds_Status` tinyint(1) NOT NULL,
  `feeds_Createddate` date NOT NULL,
  `feeds_Createdby` int(5) NOT NULL,
  `feeds_Updateddate` datetime NOT NULL,
  `feeds_Updatedby` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`feeds_Id`, `feeds_Title`, `feeds_Description`, `feeds_File_one`, `feeds_File_two`, `feeds_Status`, `feeds_Createddate`, `feeds_Createdby`, `feeds_Updateddate`, `feeds_Updatedby`) VALUES
(36, 'test 1', 'test 1 description', '20220910732597.png', '', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0),
(37, 'abcde', 'askfk', '20220910958914.jpg', '', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0),
(38, 'sdsdaf', 'adfasf', '20220910219879.jpg', '', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0),
(39, 'abc 1', 'abcde 2', '20220910134267.jpg', '', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0),
(40, 'asfuas', 'djv', '20220910348972.jpg', '', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0),
(41, 'adsfmv', 'dmsv,s', '2022091097094.jpg', '20220910227404two.png', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`feeds_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `feeds_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
