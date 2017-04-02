-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 05:57 AM
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
(1, 'Foo1', 'Bar', 'Qux', 'Zoo.png', 'Flux.png', 'Hiphop', '2017-03-30 17:42:26', '2017-03-30 17:42:26', 0, 0),
(2, 'Foo2', 'Bar', 'Qux', 'Zoo.png', 'Flux.png', 'Hiphop', '2017-03-30 17:42:31', '2017-03-30 17:42:31', 0, 0),
(3, 'Foo3', 'Bar', 'Qux', 'Zoo.png', 'Flux.png', 'Hiphop', '2017-03-30 17:42:34', '2017-03-30 17:42:34', 0, 0),
(11, 'Bad day', '', 'Daniel Powter', 'edc44a939fd17469bd5e55242804aba8', 'blank', 'Reggie/Zim Dancehall', '2017-03-31 04:06:12', '2017-03-31 04:06:12', 0, 0),
(12, 'Bagsakan', '', 'Chito Miranda, Kiko Pangilinan, Gloc 9', 'edc44a939fd17469bd5e55242804aba8', 'blank', 'Reggie/Zim Dancehall', '2017-03-31 04:06:17', '2017-03-31 04:06:17', 0, 0),
(13, 'Ama Namin', '', 'Simbahang Katolika', 'edc44a939fd17469bd5e55242804aba8', 'blank', 'Reggie/Zim Dancehall', '2017-03-31 04:06:19', '2017-03-31 04:06:19', 0, 0),
(14, 'Wrong side of heaven', '', 'Five Finger''s Death', 'edc44a939fd17469bd5e55242804aba8', 'blank', 'House Music', '2017-03-30 17:46:03', '2017-03-30 17:46:03', 0, 0),
(15, 'Castle of Glass', '', 'Linkin'' Park', 'edc44a939fd17469bd5e55242804aba8', 'blank', 'Urban Groove', '2017-03-30 17:46:16', '2017-03-30 17:46:16', 0, 0),
(16, 'Foo4', 'Bar', 'Qux', 'Zoo.png', 'Flux.png', 'Hiphop', '2017-03-30 17:42:34', '2017-03-30 17:42:34', 0, 0);

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
(3, '1', '1', 'f25400f57252ff24521997cee64f5c77810e775c', '1', 1, '2017-03-27 20:50:38', '2017-03-27 20:50:38', 'Fan', 0, 'default.png');

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
