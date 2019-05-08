-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 04:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `industrial`
--

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `type` enum('Attachment','Internship','','') NOT NULL DEFAULT 'Attachment',
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `industrysupervisor` int(11) DEFAULT NULL,
  `schoolsupervisor` int(11) NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `student`, `type`, `company`, `location`, `email`, `phone_number`, `startdate`, `enddate`, `industrysupervisor`, `schoolsupervisor`, `posted`) VALUES
(1, 2, '', 'Kenya Power and Lighting Company(KPLC)', 'Kisumu', 'kenyapower@ac.ke', 702203301, '2018-12-20', '2019-02-26', 3, 2, '2019-05-02 10:01:02'),
(2, 1, '', 'Kenya Power and Lighting Company(KPLC)', 'Nairobi', 'kenyapower@ac.ke', 732145698, '2019-03-01', '2019-06-01', 4, 2, '2019-05-02 12:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `industrysupervisor` int(11) NOT NULL,
  `summary` text NOT NULL,
  `feedback` text NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `student`, `industrysupervisor`, `summary`, `feedback`, `posted`) VALUES
(1, 2, 3, 'He is a good student and well groomed\r\n', '', '2019-05-07 14:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` enum('Male','Female','','') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `role` enum('Admin','School_Supervisor','Industrial_Supervisor','') NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `birthdate`, `sex`, `email`, `password`, `phonenumber`, `role`, `posted`) VALUES
(1, 'Munawar Ali', '1990-06-21', 'Male', 'munawar@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 726458935, 'Admin', '2019-04-28 11:13:17'),
(2, 'Salma Said', '1986-06-13', 'Female', 'salmasaida@gmail.com', 'f6852b2a3ac0cd7e69c801f69eddb57a', 723895476, 'School_Supervisor', '2019-04-28 12:44:44'),
(3, 'Salma Said', '1983-03-29', 'Female', 'salma@gmail.com', 'f6852b2a3ac0cd7e69c801f69eddb57a', 2147483647, 'Industrial_Supervisor', '2019-04-28 18:46:20'),
(4, 'James Jackson', '1988-02-08', 'Male', 'james@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 753624178, 'Industrial_Supervisor', '2019-04-28 18:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` enum('Male','Female','','') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `birthdate`, `sex`, `email`, `password`, `phonenumber`, `programme`, `course`, `posted`) VALUES
(1, 'Jay Juma ', '1996-09-30', 'Male', 'jayjuma@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 713568472, 'Degree', 'Computer Science', '2019-04-28 13:26:49'),
(2, 'Kijana Fupi Round', '1998-05-28', 'Male', 'kijana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 736589470, 'Degree', 'Computer Science', '2019-04-28 18:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `media` text,
  `extension` varchar(5) NOT NULL,
  `description` text NOT NULL,
  `skills` text NOT NULL,
  `schoolremarks` text,
  `industryremarks` text,
  `assessment` enum('Pending','Assessed','','') NOT NULL DEFAULT 'Pending',
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `student`, `media`, `extension`, `description`, `skills`, `schoolremarks`, `industryremarks`, `assessment`, `posted`) VALUES
(1, 2, 'adult-blur-close-up-1260313.jpg', '', 'I helped one of the staff members who could not access the internet.', 'I learnt how to troubleshoot and configure network connectivity issue', NULL, NULL, 'Pending', '2019-05-02 13:49:52'),
(2, 2, 'blur-connection-data-center-442150.jpg', '', 'I configured a Cisco switch under the supervision and the guidance of my Supervisor', 'i learnt the configuration of Cisco Switch.', NULL, NULL, 'Pending', '2019-05-02 14:23:08'),
(3, 2, 'Pexels Videos 1933857.mp4', 'mp4', 'My supervisor introduced me to the Arduino board that is used for hardware programming', 'I learn to connect the Arduino board to the computer and creating simple program', 'Nice work! Kindly ensure you research more on the Arduino board ', 'The student shows good enthusiasm in  learning about Arduino', 'Assessed', '2019-05-07 08:38:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
