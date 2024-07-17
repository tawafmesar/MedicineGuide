-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 09:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicineguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `docid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `title`, `appdate`, `apptime`, `docid`, `userid`) VALUES
(1, 'zxxzxz', '2023-05-09', '22:50:10', 10, 24),
(2, 'addas', '2023-05-16', '21:00:40', 12, 25),
(3, 'DADSDA', '2023-05-17', '13:32:00', 12, 25),
(4, 'GGF', '2023-05-04', '17:33:00', 12, 25),
(5, 'ASADAD', '2023-05-04', '15:33:00', 13, 25),
(10, 'test', '2023-05-23', '09:10:32', 15, 26),
(11, 'pain', '2023-05-24', '22:14:00', 14, 26),
(12, 'sdsdds', '2023-05-31', '23:25:00', 12, 25),
(13, 'wertyui', '2023-05-16', '23:27:00', 13, 25),
(14, 'xcvb', '2023-05-12', '23:29:00', 12, 25),
(15, 'pain in', '2023-05-29', '09:45:00', 21, 30),
(16, 'test test', '2023-05-30', '10:45:00', 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `docid` int(11) NOT NULL,
  `docname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `speciality` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`docid`, `docname`, `speciality`, `phone`, `userid`) VALUES
(1, 'assa', 'gfg', '345', 22),
(10, 'jamal ahmed', 'test test', '055564455', 24),
(11, 'ahmed jamal', 'test tetts', '050555430', 24),
(12, 'addad', 'sasas', '12122112', 25),
(13, 'TEST ', 'TESTTT', '12121212', 25),
(14, 'asmaa', 'test', '525353553', 26),
(15, 'manal', 'head', '21232324', 26),
(16, 'hanan', 'kedny', '435166127', 26),
(17, 'gagga', 'saasas', '222323', 27),
(18, 'xcvbnm', 'zxcvb', '34567', 27),
(19, 'sasa', 'assasa', '322323', 25),
(20, 'test doc', 'Head', '12221342', 30),
(21, 'asma doc', 'stomck', '143524724', 30);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medid` int(11) NOT NULL,
  `medname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `medtype` varchar(255) CHARACTER SET utf8 NOT NULL,
  `HealthCondition` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userid` int(11) NOT NULL,
  `1time` time DEFAULT NULL,
  `2time` time DEFAULT NULL,
  `3time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medid`, `medname`, `medtype`, `HealthCondition`, `userid`, `1time`, `2time`, `3time`) VALUES
(2, 'was', 'ass', 'saas', 25, '04:56:38', '03:56:51', '03:58:51'),
(3, 'asassasas', 'sasasas', 'assaassassa', 25, '04:45:00', '04:46:00', '04:47:00'),
(5, 'test', 'test', 'test', 26, '09:00:00', '12:00:00', '17:00:00'),
(6, 'profinal', 'tab', 'head ach', 26, '10:15:00', '02:15:00', '13:15:00'),
(7, 'sdsddssd', 'sdsdds', 'dsdssd', 25, '23:56:00', '23:58:00', '12:00:00'),
(8, 'profinal', 'tab', 'head pain', 30, '09:46:00', '12:46:00', '18:46:00'),
(9, 'test', 'test', 'test', 30, '09:00:00', '14:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `phone`, `status`) VALUES
(22, 'axax', '12345', 'tat@tat.com', '1221', 1),
(23, 'jamela', '12345', 'akak@ga.com', '121222', 1),
(24, 'asma', '123456', 'asma@gmail.com', '0555055505', 1),
(25, 'asas', 'asas', 'asas@gmail.com', 'asas', 1),
(26, 'jamelaz', '123456', 'jj@gmail.com', '53535333', 1),
(27, 'lolo', 'lolo', 'lolo@lolo.lolo', '1291292', 1),
(28, 'awaw', 'awaw', 'awaw@gm.v', 'awaw', 1),
(29, 'صشصش', 'شصشص', 'awawawa@gmail.com', 'شصشص', 1),
(30, 'hanan', '123456', 'hanan@gmail.com', '123311413', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `vvvv` (`userid`),
  ADD KEY `docctor` (`docid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`docid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medid`),
  ADD KEY `ususus` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `docid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `docctor` FOREIGN KEY (`docid`) REFERENCES `doctors` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vvvv` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `fk_doc_id` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `ususus` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
