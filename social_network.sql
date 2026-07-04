-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 08:37 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'maarijshah36@gmail.com', 'maarij123');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 15, 1, ' ', 'maarij', '2018-12-10 17:24:57'),
(2, 15, 1, ' ', 'maarij', '2018-12-10 17:29:02'),
(3, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:29:21'),
(4, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:30:40'),
(5, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:31:51'),
(6, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:32:17'),
(7, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:36:54'),
(8, 15, 1, ' hi how are you', 'maarij', '2018-12-10 17:37:48'),
(9, 15, 1, ' omg', 'maarij', '2018-12-19 05:14:59'),
(10, 18, 9, ' jhj', 'Maarij Shah', '2018-12-27 07:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `msg_topic` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_date`) VALUES
(1, '9', '1', 'hey', '  how are you', 'no reply', 'read', '2018-12-25 11:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`) VALUES
(1, 1, 1, 'hey guys', ' do you ppl like black color', '2018-12-10 10:39:59'),
(2, 1, 0, 'incredible', ' i found my old pic', '2018-12-10 11:10:18'),
(3, 1, 1, 'wow!', ' my mum bought a new dress', '2018-12-10 11:13:14'),
(4, 1, 6, 'workshop', ' on 24 dec 2018 we are going to hold a workshop', '2018-12-10 11:14:28'),
(5, 1, 1, 'sad news', ' i lost my fav pen', '2018-12-10 11:15:15'),
(6, 1, 0, 'see...', ' i have no news', '2018-12-10 11:16:06'),
(7, 1, 5, 'yummmm', ' i made pasta', '2018-12-10 11:16:23'),
(8, 1, 0, 'omg', ' imran khan won', '2018-12-10 11:17:19'),
(9, 1, 1, 'sad news', ' my grandmther died', '2018-12-10 11:17:40'),
(10, 1, 1, 'hellw', ' how are you', '2018-12-10 11:18:00'),
(11, 1, 1, 'attention please', 'we are arranging one day workshop', '2018-12-10 11:18:48'),
(15, 1, 1, 'story', ' There are people who say love can move mountains. This might not be physically possible, but Dashrath Manjhi, also known as the â€˜Mountain Manâ€™, came quite close. In one day of his life, his wife fell while crossing a nearby hill and hurt herself seriously. She needed quick medical assistance, but that wasnâ€™t possible due to the hill that isolated their small village from the next town. Tragically enough, his wife died from the serious injuries before Dashrath could do anything about it. It was the night when Dashrath Manjhi decided to carve a small path through the mountain in order to give his village easier access to medical assistance.\r\n\r\nIt was an ambitious plan and he was heavily ridiculed for it. But after working for 22 years with the greatest determination and willpower, a path was carved into the hill. Even though he was initially mocked and ridiculed for his mission to give his hometown easier access to the nearby town, he finally succeeded. His lifeâ€™s work helped to reduce the distance between the two towns from 55 km to only 15 km, so that never again such a thing would happen.', '2018-12-10 14:54:39'),
(16, 1, 0, 'dont look', ' hate it ', '2018-12-23 16:38:28'),
(17, 9, 0, 'hi', ' how u all are', '2018-12-25 11:57:45'),
(18, 9, 0, 'hi', ' how u all are', '2018-12-25 11:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`) VALUES
(1, 'Information'),
(2, 'Riddle'),
(3, 'Joke'),
(4, 'Quote/Poetry'),
(5, 'Recipe'),
(6, 'Activity');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_reg_date` text NOT NULL,
  `user_last_login` text NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_image`, `user_reg_date`, `user_last_login`, `status`, `ver_code`, `posts`) VALUES
(1, 'Maarij Shah', 'maarijshah36@gmail.com', 'maarij123', 'Selena-Gomez-.jpg', '4354', '43545', 'verified', 0, 'yes'),
(5, 'ali', 'alishah@gmail.com', 'ali12345', 'default.png', 'NOW()', '', 'unverified', 77346009, 'no'),
(7, 'sameera', 'sameeera@gmail.com', 'sameera12345', 'default.png', '2018-11-28 19:12:17', '', 'unverified', 1114390042, 'no'),
(9, 'alia', 'alia@yahoo.com', '123alia12345', 'neha-kakkar.jpg', '2018-12-25 16:48:17', '', 'verified', 873424632, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
