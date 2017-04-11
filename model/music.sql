-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 08:31 AM
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
  `m_video_embed` varchar(255) NOT NULL,
  `m_genre` varchar(45) NOT NULL,
  `m_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_approved` int(1) NOT NULL DEFAULT '0',
  `m_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`m_id`, `m_title`, `m_description`, `m_singers`, `m_cover`, `m_music_file`, `m_video_embed`, `m_genre`, `m_uploaded`, `m_updated`, `m_approved`, `m_deleted`) VALUES
(1, 'Foo1', 'Bar', 'Qux', 'Zoo.png', 'its-my-life.mp3', '', 'Hiphop', '2017-04-11 04:04:15', '2017-04-11 04:04:15', 1, 0),
(2, 'Foo2', 'Bar', 'Qux', 'Tulips.jpg', 'its-my-life.mp3', '', 'Hiphop', '2017-04-11 04:04:13', '2017-04-11 04:04:13', 1, 0),
(3, 'Foo3', 'Bar', 'Qux', 'Lighthouse.jpg', 'its-my-life.mp3', '', 'Hiphop', '2017-04-11 04:04:11', '2017-04-11 04:04:11', 1, 0),
(11, 'Bad day', '', 'Daniel Powter', 'Chrysanthemum.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-11 04:04:07', '2017-04-11 04:04:07', 1, 0),
(12, 'Bagsakan', '', 'Chito Miranda, Kiko Pangilinan, Gloc 9', 'Koala.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-11 04:04:05', '2017-04-11 04:04:05', 1, 0),
(13, 'Ama Namin', '', 'Simbahang Katolika', 'Hydrangeas.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-11 04:04:03', '2017-04-11 04:04:03', 1, 0),
(14, 'Wrong side of heaven', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Five Finger''s Death', 'Jellyfish.jpg', 'Maid with the Flaxen Hair.mp3', '', 'House Music', '2017-04-11 06:28:23', '2017-04-11 06:28:23', 1, 0),
(15, 'Castle of Glass', '', 'Linkin'' Park', 'Desert.jpg', 'Maid with the Flaxen Hair.mp3', '', 'Urban Groove', '2017-04-11 06:30:56', '2017-04-11 06:30:56', 1, 0),
(16, 'Foo4', 'Bar', 'Qux', 'Penguins.jpg', 'Maid with the Flaxen Hair.mp3', '', 'Hiphop', '2017-04-11 06:31:12', '2017-04-11 06:31:12', 1, 0),
(17, 'asdsad', 'sadada', 'asd', 'bdf3bf1da3405725be763540d6601144.jpg', 'de969b251e0ca11bbe651b7b80c99049.mp3', 'asdada', 'Hiphop', '2017-04-11 06:29:11', '2017-04-11 06:29:11', 1, 0),
(18, 'Purihin ang Panginoon', 'Lorem Ipsum', 'Me', 'fafa5efeaf3cbe3b23b2748d13e629a1.jpg', 'de969b251e0ca11bbe651b7b80c99049.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Gospel', '2017-04-11 06:04:39', '2017-04-11 06:04:39', 1, 0),
(19, 'Sleep Away', 'Hello', 'Red Hot Sauce', '67479b14b76ecc81c5f995d2688c1f47.png', 'b8b5bd53e23dd40b5c4a650e272f2e19.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Urban Groove', '2017-04-11 00:06:17', '2017-04-11 00:06:17', 1, 0),
(20, 'Sleep Away 2', 'Hello', 'Red Hot Sauce', '67479b14b76ecc81c5f995d2688c1f47.png', 'b8b5bd53e23dd40b5c4a650e272f2e19.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Urban Groove', '2017-04-11 00:06:17', '2017-04-11 00:06:17', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
