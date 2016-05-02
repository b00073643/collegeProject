-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 02, 2016 at 03:03 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `sessionId` int(1) NOT NULL,
  `studentId` int(11) NOT NULL,
  `date` text NOT NULL,
  `present` int(1) NOT NULL,
  `abscent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `sessionId`, `studentId`, `date`, `present`, `abscent`) VALUES
(249, 0, 75, '1-1-2016', 1, 0),
(250, 0, 75, '1-1-2016', 1, 0),
(251, 0, 75, '1-1-2016', 1, 0),
(252, 0, 75, '1-1-2016', 1, 0),
(253, 0, 75, '1-1-2016', 1, 0),
(254, 0, 75, '1-1-2016', 1, 0),
(255, 0, 75, '1-1-2016', 1, 0),
(256, 0, 75, '1-1-2016', 1, 0),
(257, 0, 75, '1-1-2016', 1, 0),
(258, 0, 75, '1-1-2016', 1, 0),
(259, 0, 75, '1-1-2016', 1, 0),
(260, 0, 87, '1-1-2016', 1, 0),
(261, 0, 77, '1-1-2016', 1, 0),
(262, 0, 77, '1-1-2016', 1, 0),
(263, 0, 77, '1-1-2016', 1, 0),
(264, 0, 77, '1-1-2016', 1, 0),
(265, 0, 81, '1-1-2016', 1, 0),
(266, 0, 101, '1-1-2016', 1, 0),
(267, 0, 101, '1-1-2016', 1, 0),
(268, 0, 101, '1-1-2016', 0, 1),
(269, 0, 101, '1-1-2016', 1, 0),
(270, 0, 101, '1-1-2016', 1, 0),
(271, 0, 101, '1-1-2016', 1, 0),
(272, 0, 101, '1-1-2016', 1, 0),
(273, 0, 101, '1-1-2016', 1, 0),
(274, 0, 101, '1-1-2016', 1, 0),
(275, 0, 84, '1-1-2016', 1, 0),
(276, 0, 84, '1-1-2016', 1, 0),
(277, 0, 82, '1-1-2016', 1, 0),
(278, 0, 100, '1-1-2016', 0, 1),
(279, 0, 102, '1-1-2016', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `belts`
--

CREATE TABLE `belts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belts`
--

INSERT INTO `belts` (`id`, `name`) VALUES
(9, 'white'),
(8, 'green'),
(7, 'blue'),
(6, 'red'),
(5, 'black white tip'),
(4, 'brown'),
(3, '3rd degree black '),
(2, '2nd degree black'),
(0, '1st degree black belt');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `techniqueId` float NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `studentId`, `techniqueId`, `score`) VALUES
(679, 77, 10, 0),
(680, 77, 11, 1),
(681, 77, 12, 3),
(682, 78, 26, 5),
(683, 78, 27, 3),
(684, 78, 28, 5),
(685, 81, 10, 0),
(686, 81, 11, 0),
(687, 81, 12, 0),
(688, 82, 10, 0),
(689, 82, 11, 0),
(690, 82, 12, 0),
(691, 83, 29, 4),
(692, 83, 30, 0),
(693, 83, 31, 0),
(694, 84, 10, 0),
(695, 84, 11, 0),
(696, 84, 12, 0),
(697, 85, 20, 0),
(698, 85, 21, 0),
(699, 85, 22, 2),
(700, 86, 10, 3),
(701, 86, 11, 0),
(702, 86, 12, 1),
(703, 87, 29, 0),
(704, 87, 30, 0),
(705, 87, 31, 1),
(706, 100, 10, 0),
(707, 100, 11, 0),
(708, 100, 12, 5),
(709, 101, 10, 0),
(710, 101, 11, 0),
(711, 101, 12, 0),
(712, 104, 10, 0),
(713, 104, 10, 0),
(714, 104, 10, 0),
(715, 105, 10, 0),
(716, 105, 10, 0),
(717, 105, 10, 0),
(718, 106, 10, 0),
(719, 106, 10, 0),
(720, 106, 10, 0),
(721, 107, 10, 0),
(722, 107, 10, 0),
(723, 107, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` text NOT NULL,
  `name` text NOT NULL,
  `Instructor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `Instructor`) VALUES
('a', 'beginner', 'ward'),
('b', 'intermediate', 'mick'),
('c', 'expert', 'matt');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `firstName` text NOT NULL,
  `password` text NOT NULL,
  `joinDate` text NOT NULL,
  `lastGrading` text NOT NULL,
  `currentGrade` int(11) NOT NULL,
  `avgGrade` varchar(1) NOT NULL,
  `attendsClass` varchar(1) NOT NULL,
  `totalAttendedPercentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `surname`, `firstName`, `password`, `joinDate`, `lastGrading`, `currentGrade`, `avgGrade`, `attendsClass`, `totalAttendedPercentage`) VALUES
(77, 'bobby', 'bob', 'bobby', '$2y$10$UTbWW5cAcF.Sdhf/HLGAKeypGR0WzanpEf4blgK/GFDfMHUWzTc5.', '29-04-2016', '29-04-2016', 9, '', 'a', 100),
(78, 'boby', '', 'bobby', '$2y$10$tCkCHhCS.1/26Ef6CdKG9ut1cJNwWFbRMIUsk3tI0Cxih6XQMvA7W', '29-04-2016', '29-01-2016', 5, '', 'c', 0),
(81, 'bill', 'gates', 'bobby', '$2y$10$IEuoCJQK7UbLxpKMegk04.ZHh5AlBBcTj34/3ZOhh3RB0hzv3Soeu', '29-04-2016', '29-04-2016', 9, '', 'a', 100),
(82, 'john', 'k', 'john', '$2y$10$N9daarOiIMUuYGmHwjYg8uRIrTr3WkpkTE.k2dzMqYKPYGlAtCYBa', '29-04-2016', '29-04-2016', 9, '', 'a', 100),
(83, 'jane', 'do', 'jane', '$2y$10$t3/mA5Qur06tLIi2XCJws.HgNFUxb8rsq2lMv7EpyEK6OiO3xGrke', '29-01-2016', '29-04-2016', 3, '', 'b', 0),
(84, 'sammy', 'smith', 'bobby', '$2y$10$Lukaw639x4iZnC9Wh4spzu3udHb.ynlWhQhse65pTOb75y10p0uGy', '29-04-2016', '29-04-2016', 9, '', 'a', 100),
(85, 'mark', 'dunne', 'bill', '$2y$10$2NUbPmYk4vFjDqZaWcGPbemTFFMBiBsxQYUFGPRGEy2o9/cT8KH8K', '29-04-2016', '29-01-2016', 6, '', 'a', 0),
(87, 'aaa', 'aaa', 'bobby', '$2y$10$6.4S1KUOzkqcaegkid.FcO7YcDSlCdKYtbYPTOP.qU3KEC6oCseRe', '29-04-2016', '29-04-2015', 3, '', 'a', 100),
(100, 'student', 'stu', 'stu', '$2y$10$oRMz92jE0KY7n5gwxQkonewPp15fN.A/iUiM4xKAnh619TBeTNWAK', '29-04-2016', '29-04-2016', 9, 'E', 'b', 0),
(101, 'alan', 'alan', 'alan', '$2y$10$uRBbnOVAJp5rbIbEYy1CRekxHl7ra/8S0kYxAm0k64HgMbP0YiAGm', '29-04-2016', '29-04-2016', 9, 'E', 'b', 88),
(102, 'josh', 'josh', 'josh', '$2y$10$THmyokuwyO.vi33gIvc91OGvz61DWhJA5DhGFmRp2CX3ClCX9UtHe', '02-05-2016', '02-05-2016', 9, 'E', 'b', 100),
(103, 'steph', 'steph', 'steph', '$2y$10$rWd5NJ7qJmJCw5rYVxSQq.MktIToAx0B/G.S7VsEw5aoCmBtT.dQG', '02-05-2016', '02-05-2016', 9, 'E', 'c', 0),
(104, 'henry', 'henry', 'henry', '$2y$10$aJ1CHAo8K6111hZ8vefPjef3RG1XtN9dE1D57P6dmG6kj7ehAzxgK', '02-05-2016', '02-05-2016', 9, 'E', 'b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `techniques`
--

CREATE TABLE `techniques` (
  `id` float NOT NULL,
  `belt` decimal(11,0) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `techniques`
--

INSERT INTO `techniques` (`id`, `belt`, `name`) VALUES
(10, '9', '1st white'),
(11, '9', '2nd white'),
(12, '9', '3rd white'),
(14, '8', '1st green'),
(15, '8', '2nd green'),
(16, '8', '3rd green'),
(17, '7', '1st blue'),
(18, '7', '2nd blue'),
(19, '7', '3rd blue'),
(20, '6', '1st red'),
(21, '6', '2nd red'),
(22, '6', '3rd red'),
(23, '4', '1st brown'),
(24, '4', '2nd brown'),
(25, '4', '3rd brown'),
(26, '5', '1st black white tip'),
(27, '5', '2nd black white tip'),
(28, '5', '3rd black white tip'),
(29, '3', '3rd degree black 1st'),
(30, '3', '3rd degree black 2nd'),
(31, '3', '3rd degree black 3rd'),
(32, '2', '2nd degree black 1st'),
(33, '2', '2nd degree black 2nd'),
(34, '2', '2nd degree black 3rd'),
(38, '0', '1st degree black belt 1st'),
(39, '0', '1st degree black belt 2nd'),
(40, '0', '1st degree black belt 3rd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(6, 'bobby', '$2y$10$6BI1aVpjb3FPgkjAb8jKj.FPZG8i1Stgwukl.48UmTPAcs.hpMpne', 'admin'),
(7, 'sammy', '$2y$10$7C.hphTu0EPX7JFZD1NLTO/A1/3MwRyW68J3jDiMir2q9vOF8qkca', 'admin'),
(8, 'admin', '$2y$10$FWy29Xtqbvd/xzAPOZ/g2OnCVllUria0jC2RpzFk2/aFsyTR6NHly', 'admin'),
(9, 'bobby', '$2y$10$SD3V66IsVBCGK4PxL22sROUYhzLCaZMgV6atR.yQ40wbcuS9pW6HO', 'admin'),
(10, 'bobby', '$2y$10$0CYvTFKsP0EdFqeKHxrBAub9be9JuMDt3T5bX6/BB9KWDjvxWqDxW', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=766;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
