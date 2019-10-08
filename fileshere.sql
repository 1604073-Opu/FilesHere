-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 08:49 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fileshere`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `file` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `com` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `file` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `down` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`file`, `user`, `rate`, `down`, `view`, `date`, `time`) VALUES
(6, 'opu.nahidul@gmail.com', 5, 10, 1, '2019-08-11', '06:28:50'),
(7, 'opu.nahidul@gmail.com', 5, 25, 2, '2019-08-11', '06:32:06'),
(8, 'opu.nahidul@gmail.com', 5, 29, 28, '2019-08-11', '06:36:20'),
(12, 'opu.nahidul@gmail.com', 0, 22, 0, '2019-08-11', '06:32:01'),
(13, 'opu.nahidul@gmail.com', 0, 4, 0, '2019-08-11', '06:34:42'),
(14, 'opu.nahidul@gmail.com', 0, 0, 2, '', ''),
(19, 'u1604073@student.cuet.ac.bd', 0, 0, 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `rater` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `depertment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `user`, `type`, `location`, `name`, `description`, `date`, `time`, `status`, `rating`, `rater`, `level`, `term`, `depertment`) VALUES
(6, 'opu.nahidul@gmail.com', 'ebook', 'uploads/6Aguner Poroshmoni By Humayun Ahmed   dobd99   .pdfAguner Poroshmoni By Huma.pdf', 'Aguner Poroshmoni', 'Humayun Ahmed\'s novel capturing the liberation war of 1971', '2019-07-10', '10:10:59', '0', 5, 1, 0, 0, ''),
(7, 'opu.nahidul@gmail.com', 'ebook', 'uploads/7ekattorer_cithi.pdf', 'Ekattorer Chithi', 'Collection of letters. \r\nTime period: Liberation War of 1971.\r\nMost of these letters were sent from the battlefield from the freedom fighters to their loved ones. These letters show their will-power to free Bangladesh from tyrants and love for their friends and family.', '2019-07-30', '07:09:07', '0', 5, 1, 0, 0, ''),
(8, 'opu.nahidul@gmail.com', 'audio', 'uploads/803. Coffee Houser Sei Addata.mp3', 'Coffe Houser Sei Addata', 'Singer: Manna Dey ', '2019-07-31', '06:10:35', '0', 5, 1, 0, 0, ''),
(12, 'opu.nahidul@gmail.com', 'ebook', 'uploads/12.pdf', 'C++', '', '2019-08-11', '06:12:38', '01', 0, 0, 1, 2, 'cse'),
(13, 'opu.nahidul@gmail.com', 'ebook', 'uploads/13.pdf', 'Goynar Baksho', '', '2019-08-11', '06:32:33', '0', 0, 0, 0, 0, ''),
(14, 'opu.nahidul@gmail.com', 'ebook', 'uploads/14.pdf', 'CSE-100', '', '2019-08-11', '06:38:39', '1', 0, 0, 1, 1, 'cse'),
(15, 'opu.nahidul@gmail.com', 'ebook', 'uploads/15.pdf', 'CPU Scheduling', 'CPU Scheduling Chapter 6\r\nCSE-335', '2019-08-17', '04:58:01', '1', 0, 0, 3, 1, 'cse'),
(16, 'opu.nahidul@gmail.com', 'ebook', 'uploads/16.pdf', 'ERM to RM', 'Database management.\r\nEntity Relationship Diagram to Relational Mapping\r\nCSE-251', '2019-08-17', '05:02:20', '1', 0, 0, 2, 2, 'cse'),
(17, 'opu.nahidul@gmail.com', 'ebook', 'uploads/17.pdf', 'Lesson Plan CSE-245', '', '2019-08-17', '05:09:56', '1', 0, 0, 2, 1, 'cse'),
(19, 'u1604073@student.cuet.ac.bd', 'ebook', 'uploads/19.docx', 'paper outline', '', '2019-08-23', '08:48:44', '10', 0, 0, 0, 0, ''),
(20, 'u1604073@student.cuet.ac.bd', 'ebook', 'uploads/20.pdf', 'paper on RR', '', '2019-08-23', '08:51:12', '10', 0, 0, 0, 0, ''),
(21, 'u1604073@student.cuet.ac.bd', 'ebook', 'uploads/21.pdf', 's', '', '2019-08-23', '08:52:12', '2', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `creator`, `date`) VALUES
(2, 'group1', 'u1604073@student.cuet.ac.bd', '2019-08-22'),
(10, 'CSE\'16', 'u1604073@student.cuet.ac.bd', '2019-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user`, `date`, `status`) VALUES
(2, 'opu.nahidul@gmail.com', '2019-08-23', 1),
(2, 'u1604073@student.cuet.ac.bd', '2019-08-23', 1),
(10, 'u1604073@student.cuet.ac.bd', '2019-08-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `dob`) VALUES
('opu.nahidul@gmail.com', '123456', 'Md. Nahidul Islam Opu', '1996-01-16'),
('u1604073@student.cuet.ac.bd', '123456', 'Opu', '2019-08-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file` (`file`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`file`,`user`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `id` (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`file`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `download`
--
ALTER TABLE `download`
  ADD CONSTRAINT `download_ibfk_1` FOREIGN KEY (`file`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `download_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
