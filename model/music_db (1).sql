-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 10:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `m_id` int(11) NOT NULL,
  `m_title` varchar(250) NOT NULL,
  `m_description` text NOT NULL,
  `m_singers` text NOT NULL,
  `m_cover` varchar(100) NOT NULL,
  `m_music_file` varchar(100) NOT NULL,
  `m_genre` varchar(45) NOT NULL,
  `m_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_approved` int(1) NOT NULL DEFAULT '0',
  `m_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`m_id`, `m_title`, `m_description`, `m_singers`, `m_cover`, `m_music_file`, `m_genre`, `m_uploaded`, `m_updated`, `m_approved`, `m_deleted`) VALUES
(1, 'Foo1', 'Bar', 'Qux', 'Zoo.png', 'Flux.png', 'Hiphop', '2017-04-06 12:17:50', '2017-04-06 12:17:50', 1, 0),
(2, 'Foo2', 'Bar', 'Qux', 'Tulips.jpg', 'Flux.png', 'Hiphop', '2017-04-06 14:00:11', '2017-04-06 14:00:11', 1, 0),
(3, 'Foo3', 'Bar', 'Qux', 'Lighthouse.jpg', 'Flux.png', 'Hiphop', '2017-04-06 13:59:59', '2017-04-06 13:59:59', 1, 0),
(11, 'Bad day', '', 'Daniel Powter', 'Chrysanthemum.jpg', 'blank', 'Reggie/Zim Dancehall', '2017-04-06 14:00:06', '2017-04-06 14:00:06', 1, 0),
(12, 'Bagsakan', '', 'Chito Miranda, Kiko Pangilinan, Gloc 9', 'Koala.jpg', 'blank', 'Reggie/Zim Dancehall', '2017-04-06 14:00:17', '2017-04-06 14:00:17', 1, 0),
(13, 'Ama Namin', '', 'Simbahang Katolika', 'Hydrangeas.jpg', 'blank', 'Reggie/Zim Dancehall', '2017-04-06 14:00:23', '2017-04-06 14:00:23', 1, 0),
(14, 'Wrong side of heaven', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Five Finger''s Death', 'Jellyfish.jpg', 'Maid with the Flaxen Hair.mp3', 'House Music', '2017-04-06 14:00:27', '2017-04-06 14:00:27', 1, 0),
(15, 'Castle of Glass', '', 'Linkin'' Park', 'Desert.jpg', 'blank', 'Urban Groove', '2017-04-06 14:00:33', '2017-04-06 14:00:33', 1, 0),
(16, 'Foo4', 'Bar', 'Qux', 'Penguins.jpg', 'Flux.png', 'Hiphop', '2017-04-06 14:00:38', '2017-04-06 14:00:38', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `s_id` int(8) NOT NULL,
  `s_music` int(8) NOT NULL,
  `s_action` varchar(45) NOT NULL,
  `s_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `s_id` int(8) NOT NULL,
  `s_music` varchar(10) NOT NULL,
  `s_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`s_id`, `s_music`, `s_created`) VALUES
(1, '1', '2017-04-06 03:34:25'),
(2, '14', '2017-04-06 03:34:57'),
(3, '1', '2017-04-06 03:36:03'),
(4, '1', '2017-04-06 03:36:04'),
(5, '3', '2017-04-06 03:40:43'),
(6, '3', '2017-04-06 03:40:52'),
(7, '14', '2017-04-06 03:57:56'),
(8, '15', '2017-04-06 03:58:04'),
(9, '15', '2017-04-06 03:59:05'),
(10, '1', '2017-04-06 03:59:09'),
(11, '1', '2017-04-06 05:18:42'),
(12, '13', '2017-04-07 02:47:15'),
(13, '12', '2017-04-07 02:47:16'),
(14, '11', '2017-04-07 02:47:17'),
(15, '14', '2017-04-07 02:52:06'),
(16, '1', '2017-04-07 02:52:09'),
(17, '12', '2017-04-07 02:52:12'),
(18, '11', '2017-04-07 02:52:14'),
(19, '14', '2017-04-07 02:57:21'),
(20, '14', '2017-04-07 03:02:02'),
(21, '14', '2017-04-07 03:03:27'),
(22, '14', '2017-04-07 03:03:45'),
(23, '14', '2017-04-07 03:04:07'),
(24, '14', '2017-04-07 03:04:38'),
(25, '14', '2017-04-07 03:04:40'),
(26, '16', '2017-04-07 03:04:45'),
(27, '16', '2017-04-07 03:04:48'),
(28, '16', '2017-04-07 03:04:49'),
(29, '16', '2017-04-07 03:04:50'),
(30, '16', '2017-04-07 03:04:51'),
(31, '16', '2017-04-07 03:04:51'),
(32, '16', '2017-04-07 03:06:27'),
(33, '16', '2017-04-07 03:06:34'),
(34, '16', '2017-04-07 03:06:56'),
(35, '16', '2017-04-07 03:06:57'),
(36, '16', '2017-04-07 03:06:58'),
(37, '16', '2017-04-07 03:06:58'),
(38, '16', '2017-04-07 03:06:59'),
(39, '14', '2017-04-07 03:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(8) NOT NULL,
  `u_name` varchar(120) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_password` varchar(45) NOT NULL,
  `u_email` varchar(90) NOT NULL,
  `u_activated` int(1) NOT NULL DEFAULT '1',
  `u_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `u_type` varchar(10) NOT NULL,
  `u_deleted` int(1) NOT NULL DEFAULT '0',
  `u_profile_img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_username`, `u_password`, `u_email`, `u_activated`, `u_created`, `u_updated`, `u_type`, `u_deleted`, `u_profile_img`) VALUES
(1, 'Jeremy', 'ymerej94', '37b29e8ba99b4dba78514561e436ffed73249f18', 'jeremy.b.layson@gmail.com', 1, '2017-03-26 22:45:16', '2017-03-26 22:45:16', 'Fan', 0, 'default.png'),
(3, '1', '1', 'f25400f57252ff24521997cee64f5c77810e775c', '1', 1, '2017-03-27 20:50:38', '2017-03-27 20:50:38', 'Fan', 0, 'default.png'),
(4, 'jeremy', 'jeremy', '2cda695113873aecafda365573e497aa0c2e68f7', 'asada@gmail.com', 1, '2017-04-05 17:19:30', '2017-04-07 14:47:43', 'Artist', 0, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `s_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `s_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
