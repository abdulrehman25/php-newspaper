-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 09:32 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent_id`) VALUES
(36, 'politics', 0),
(23, 'breaking news', 0),
(24, 'health', 0),
(25, 'travel', 0),
(26, 'business', 0),
(27, 'technology', 0),
(28, 'sports', 0),
(33, 'education', 0),
(34, 'international', 0),
(37, 'USA NEWS', 34),
(38, 'AUSTRALIAN NEWS', 34);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `web` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `web`, `message`, `image`, `date`, `post_id`, `name`, `status`) VALUES
(38, NULL, 'ADAS', 'ASDJAHSDJKH', NULL, 1567498378, 49, 'asc', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `tags` varchar(255) NOT NULL,
  `author_image` varchar(255) DEFAULT 'None',
  `date` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `category`, `title`, `author`, `post_data`, `tags`, `author_image`, `date`, `status`, `views`) VALUES
(46, '95008612.jpg', 'Education', 'First Post From admin panel', 'abdul rehman', '                                                                                                                move_uploaded_file($temp,\"../img/bg-img/\".$picture);                                                                                                ', 'admin,first post', 't1.jpg', 1546040950, 'publish', 8),
(47, '3671.jpg', 'Travel', 'Third Post From Admin Panel', 'abdul rehman', '                            education                        ', 'admin,third post', 't1.jpg', 1549930984, 'publish', 7),
(48, '42710815.jpg', 'Politics', 'Fourth Post From Admin Panel', 'abdul rehman', '                                                                                                                                                                                                                                                                                        politics                                                                                                                                                                                                                                                ', 'admin,fourthnpost', 't1.jpg', 1546041427, 'publish', 28),
(49, '327Dawlance-launches-new-Glass-Door-Chest-Freezer.jpg', 'Politics', 'Full Stack Web Developer', 'abdul rehman', '                                                 jkjkjkjk                                                       ', 'first', 't1.jpg', 1567498327, 'publish', 6),
(50, '490screencapture-localhost-latestfood-2019-08-20-13_54_12.png', 'Politics', 'jhjkfhasjkdh', 'abdul rehman', 'asdasd                                                    ', 'ajksdjkh', 't1.jpg', 1567498490, 'publish', 1),
(51, '505new 1st screencapture-denken-nu-2019-08-20-14_02_13.png', 'Politics', 'asdashd', 'abdul rehman', '                                                    asdasd', 'asjhdjk', 't1.jpg', 1567498505, 'publish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_list`
--

CREATE TABLE `subscribers_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers_list`
--

INSERT INTO `subscribers_list` (`id`, `name`, `email`) VALUES
(1, 'nabil ahmad', 'abcfg@gmail.com'),
(2, 'rehman ali', 'ashdjh@gamil'),
(3, 'rehman ali', 'ashdjh@gamil'),
(4, 'ismail', 'jashcj@gmail.com'),
(5, 'abdul rehman', 'abdulrehmankhokhar25@gmail.com'),
(6, 'ismail', 'abcfg@gmail.com'),
(7, 'abc', 'abcfg@gmail.com'),
(8, '123', 'jashcj@gmail.com'),
(9, '123', 'abcfg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `image`, `role`, `details`, `date`) VALUES
(1, 'abdul', 'rehman', 'abdulrehman25', 'abdulrehmankhokhar25@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 't1.jpg', 'admin', 'abc', 1234567890),
(2, 'nabil', 'ahmad', 'nabeel', 'nabil123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '647video1.jpg', 'author', 'abc', 1571829041),
(8, 'ismail', 'amjad', 'ismailamjad7907', 'ismailamjad98@yahoo.com', 'e556f3756255503f123789ecb3ca7e3b', '925t4.jpg', 'author', '                                                                                                                                                                                                                                                                        hello world i am here!                                                                                                                                                                                                                ', 1571829011);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subscribers_list`
--
ALTER TABLE `subscribers_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
