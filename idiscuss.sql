-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 08:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected.', '2022-12-30 23:57:07'),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. ', '2022-12-30 23:59:53'),
(3, 'Django', 'Django is a free and open-source, Python-based web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit.', '2022-12-31 02:08:43'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2022-12-31 02:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_thread_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_thread_id`, `comment_user_id`, `comment_time`) VALUES
(1, 'Use the mediaDevices object in navigator.mediaDevices.\r\nCollect the stream from mediaDevices by using method navigator.mediaDevices.getUserMedia({video:true, audio:true})\r\nthen record the stream using record object and then convert the recororded object to blob object and then make a downloadable link from blob object using URL.createObjectURL(blobObject) method. and your recorded video will be downloaded to the system.', 3, 2, '2022-12-31 12:16:03'),
(2, 'First you need to learn about how to capture media stream from the mediaDevices in js. Then you can use recording api object to record the media stream and then convert it into a blob object using some techniques. For details visit https://usefulangle.com/post/354/javascript-record-video-from-camera. ', 3, 1, '2022-12-31 12:40:05'),
(3, 'You can have the complete guide here at https://camsunit.com/', 5, 3, '2022-12-31 12:41:40'),
(4, 'Its quite difficult but not impossible. You can use an api to do your job. Read the complete documentation here. https://camsunit.com/', 5, 2, '2022-12-31 12:47:32'),
(5, 'this is how you read video in javascript go and google it.', 3, 2, '2023-01-01 22:53:54'),
(6, 'First learn about media devices in js.', 3, 1, '2023-01-01 22:54:32'),
(7, 'Sorry the late comment was not complete. Sorry for inconvenience. You can contact me later on in messenger.', 3, 1, '2023-01-01 22:57:02'),
(8, 'new comment', 3, 1, '2023-01-01 22:58:43'),
(9, 'this test comment is for checking wherther session variable works or not', 3, 1, '2023-01-01 23:02:07'),
(10, 'Django is a free and open source python based web framework.', 7, 1, '2023-01-01 23:57:29'),
(11, 'this is test comment &lt;script&gt;alert(\"hello\")&lt;/script&gt;', 7, 4, '2023-01-02 00:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pyaudio', 'I am not able to install pyaudio on windows', 1, 1, '2022-12-31 08:58:44'),
(2, 'Unable to use python in my website', 'Please help me I am not able to use python in my website. I want to create a web application in python.', 1, 2, '2022-12-31 09:14:18'),
(3, 'How to record video in javascript?', 'I am trying to record video from laptop camera and save the video in the storage using javascript. Any help please.', 2, 3, '2022-12-31 11:16:56'),
(4, 'I have problem in my python text to speech.', 'I am trying to convert text to speech in python please help me.', 1, 2, '2022-12-31 11:30:01'),
(5, 'How to scan finger print from scanner using javascript.', 'I am trying to make an attendance system in javascript and php. I want to capture finger print from scanner using javascript and then compare with the saved one finger prints to fill attendance.', 2, 1, '2022-12-31 11:33:54'),
(6, 'How to include external javascript in html?', 'I have problem in including javascript in html please help me.', 2, 1, '2023-01-01 23:12:40'),
(7, 'What is Django?', 'What is Django?', 3, 4, '2023-01-01 23:56:10'),
(8, 'this is test thread', '&lt;script&gt;alert(\"hello\")&lt;/script&gt;', 4, 4, '2023-01-02 00:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'salmankhanserai@gmail.com', '$2y$10$WhLbjjg3kwFLF6j2SXOoF.PukY9vpiavrpna7S6Ub3/1oqECvwseW', '2022-12-31 23:26:15'),
(2, 'adnan@gmail.com', '$2y$10$tuWx8vYAdlXkk0iO.ril9.syDsGGq34A6YyN2wy.EyIlut6SGO2c.', '2022-12-31 23:30:21'),
(3, 'izhar@gmail.com', '$2y$10$2SnEuOaosAv12KFdTbDxfOK/fmOJEy/3tvONEEWqJFXuDmTObQPpi', '2022-12-31 23:46:17'),
(4, 'salman', '$2y$10$2tcC4mevDjdWwgsc2Yst4eJ6D1.3epegSX0GgHgZbj.2N2JH1gtXi', '2023-01-01 23:49:59'),
(5, 'admin', '$2y$10$pxQeP.F/tnNVZnxYidLd/e4l36e0hb42GRJF.B6wLcAtnnHDMF4fy', '2023-01-02 16:28:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_2` (`thread_title`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_3` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
