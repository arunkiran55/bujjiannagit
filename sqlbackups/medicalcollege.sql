-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 01:02 PM
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
(37, 'update', 'updated', '20220926563103.jpg', '20220926320671two.jpg', 1, '2022-09-10', 0, '2022-09-26 00:00:00', 0),
(39, 'abc 1', 'abcde 2', '20220927124902.jpg', '20220927706781two.png', 1, '2022-09-10', 0, '2022-09-27 00:00:00', 0),
(40, 'asfuas', 'djv', '20220927696704.jpg', '', 1, '2022-09-10', 0, '2022-09-27 00:00:00', 0),
(41, 'adsfmv', 'dmsv,s', '2022091097094.jpg', '20220910227404two.png', 1, '2022-09-10', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_Id` int(11) NOT NULL,
  `role_Title` varchar(255) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL,
  `Status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_Id`, `role_Title`, `createdOn`, `updatedOn`, `Status`) VALUES
(1, 'admin', '2022-09-27 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `createdon` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `updatedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `name`, `email`, `password`, `contact`, `image`, `role`, `createdon`, `status`, `updatedon`) VALUES
(1, 'arun', 'arun@gmail.com', '123456', '98464', '202209298941.png', 1, '2022-09-29 00:00:00', 1, '2022-10-01 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`feeds_Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `feeds_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
