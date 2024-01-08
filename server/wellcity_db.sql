-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 12:00 PM
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
-- Database: `wellcity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calendar_event`
--

CREATE TABLE `tbl_calendar_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_calendar_event`
--

INSERT INTO `tbl_calendar_event` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(1, 'Appointment', '2024-01-12', '2024-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id`, `firstName`, `lastName`, `age`, `birthday`, `phoneNumber`, `email`) VALUES
(1, 'Paulene', 'Bautista', 21, '2002-09-27', '09566592360', 'bautistapaulene02@gmail.com'),
(2, 'Charlene', 'Burguite', 22, '2001-10-26', '1234567890', 'charlene@gmail.com'),
(3, 'Harry', 'Potter', 22, '2000-01-26', '1234567890', 'potterharry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_records_patient_information`
--

CREATE TABLE `tbl_records_patient_information` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pnum` varchar(20) DEFAULT NULL,
  `ecn` varchar(20) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `ecpnum` varchar(20) DEFAULT NULL,
  `toa` varchar(255) DEFAULT NULL,
  `sev` varchar(100) DEFAULT NULL,
  `conName` varchar(200) DEFAULT NULL,
  `dDiag` date DEFAULT NULL,
  `surgName` varchar(100) DEFAULT NULL,
  `dSurg` date DEFAULT NULL,
  `famMem` varchar(255) DEFAULT NULL,
  `medCon` varchar(255) DEFAULT NULL,
  `systolicBP` varchar(4) DEFAULT NULL,
  `diastolicBP` varchar(4) DEFAULT NULL,
  `hRate` varchar(4) DEFAULT NULL,
  `resRate` varchar(4) DEFAULT NULL,
  `bodTemp` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_records_patient_information`
--

INSERT INTO `tbl_records_patient_information` (`id`, `fname`, `dob`, `gender`, `address`, `pnum`, `ecn`, `relationship`, `ecpnum`, `toa`, `sev`, `conName`, `dDiag`, `surgName`, `dSurg`, `famMem`, `medCon`, `systolicBP`, `diastolicBP`, `hRate`, `resRate`, `bodTemp`) VALUES
(2, 'qwerty', '2003-06-09', 'male', '2268 beata', '09192795717', 'qwert', 'qwert', '09192795717', 'qwe', 'qwe', 'qweee', '2002-06-09', 'qwer', '2001-06-09', 'qwer', 'qweer', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`) VALUES
(1, 'paulenebautista', 'bautistapaulene02@gmail.com', '$2y$10$d8nr5hilDAc8AQEGt0zV7OqlTjGUYo5zLo1WVwEdqUBBmWiTLqkx2'),
(2, 'joseph', 'josephcarloy@gmail.com', '$2y$10$/TAQD.cV0n2C1gCasWN5m.kJ9oXgiLRisuCBpuAKGVIIAGgOPW2sW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_calendar_event`
--
ALTER TABLE `tbl_calendar_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_records_patient_information`
--
ALTER TABLE `tbl_records_patient_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_calendar_event`
--
ALTER TABLE `tbl_calendar_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_records_patient_information`
--
ALTER TABLE `tbl_records_patient_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
