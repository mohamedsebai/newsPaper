-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 09:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `ads_name` varchar(255) NOT NULL,
  `ads_url` varchar(255) NOT NULL,
  `ads_postion` varchar(255) NOT NULL,
  `ads_img` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ads_name`, `ads_url`, `ads_postion`, `ads_img`, `created_at`, `updated_at`) VALUES
(16, 'top', 'https://www.facebook.com', 'top', 'assets/images/ads_images/481050008529_main-ads.jpg', 'October 8, 2021, 3:54 pm', 'October 8, 2021, 3:58 pm'),
(17, 'bottom ads', 'https://www.facebook.com', 'bottom', 'assets/images/ads_images/285435093947_ads-2.jpg', 'October 8, 2021, 9:47 pm', 'October 31, 2021, 11:20 pm'),
(18, 'left ads', 'https://www.facebook.com', 'left', 'assets/images/ads_images/745757524961_main-ads.jpg', 'October 8, 2021, 9:47 pm', 'October 8, 2021, 9:47 pm'),
(19, 'right', 'https://www.facebook.com', 'right', 'assets/images/ads_images/43945778986_main-ads.jpg', 'October 8, 2021, 9:47 pm', 'October 8, 2021, 9:47 pm');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(9, 'HTML', 'this is for html', 'September 26, 2021, 11:43 am', 'October 3, 2021, 11:31 am'),
(10, 'css', 'this is for css', 'September 26, 2021, 11:43 am', 'October 3, 2021, 11:31 am'),
(11, 'computers', 'this for computers', 'September 26, 2021, 11:43 am', 'September 28, 2021, 3:02 pm'),
(12, 'phones', 'this is for gamers on phones', 'September 26, 2021, 11:52 am', 'September 28, 2021, 3:03 pm'),
(14, 'computers-lober', 'asdfasdf', 'September 26, 2021, 12:05 pm', 'September 28, 2021, 3:03 pm'),
(16, 'facebook-account', 'this for facebook', 'October 1, 2021, 7:28 pm', 'October 1, 2021, 7:28 pm'),
(17, 'phones-nokie', 'this phones nokie', 'October 1, 2021, 7:29 pm', 'October 3, 2021, 10:08 am'),
(18, 'ssssssss', 'sdfsdf', 'October 31, 2021, 11:15 pm', 'October 31, 2021, 11:20 pm');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author_id`, `content`, `parent`, `created_at`, `updated_at`) VALUES
(49, 69, 56, 'there is comment\r\n', 0, 'October 14, 2021, 1:44 pm', 'October 14, 2021, 1:44 pm'),
(50, 69, 56, 'replay for comment', 49, 'October 15, 2021, 10:47 pm', 'October 15, 2021, 10:47 pm'),
(51, 69, 56, 'new comment', 0, 'October 15, 2021, 10:47 pm', 'October 15, 2021, 10:47 pm'),
(52, 68, 56, 'one new comments', 0, 'October 15, 2021, 10:47 pm', 'October 15, 2021, 10:47 pm'),
(53, 68, 56, 'reply comment one', 52, 'October 15, 2021, 10:48 pm', 'October 15, 2021, 10:48 pm');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(9, 'main logo', 'assets/images/logos_images/856229928361_ecom-store-logo.png', 'October 3, 2021, 11:20 am', 'October 31, 2021, 11:21 pm');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(8, 'facebook', 'https://www.facebook.com', 'October 8, 2021, 10:12 pm', 'October 8, 2021, 10:12 pm'),
(9, 'twitter', 'https://www.twitter.com', 'October 8, 2021, 10:12 pm', 'October 8, 2021, 10:12 pm'),
(10, 'linkedin', 'https://www.linkedin.com', 'October 8, 2021, 10:13 pm', 'October 8, 2021, 10:21 pm'),
(12, 'instagram', 'httpswww.facebook.com', 'October 8, 2021, 10:13 pm', 'October 31, 2021, 11:21 pm');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `excerpt` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `categories` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `DATE_STAMP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `excerpt`, `img`, `tags`, `categories`, `author_id`, `created_at`, `updated_at`, `DATE_STAMP`) VALUES
(68, 'What Is Lorem Ipsum?', 'Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum', 'Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Lorem Ipsum Is Simply Dummy', 'assets/images/posts_images/79510333736_person6.jpg', 'edit, add', 'HTML,css,computers,phones', 33, 'October 9, 2021, 12:57 pm', 'October 31, 2021, 11:24 pm', '2021-10-31'),
(69, 'Computers-lober News', 'Computers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober NewsComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\nComputers-lober News\r\n\r\nComputers-lober NewsComputers-lober NewsComputers-lober News', 'Computers-lober News\r\nComputers-lober News\r\nComputers-lober News', 'assets/images/posts_images/690133286824_person6.jpg', 'sebai, post', 'computers-lober,facebook-account,phones-nokie', 33, 'October 9, 2021, 1:22 pm', 'October 9, 2021, 1:22 pm', '2021-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `content`, `img`, `created_at`, `updated_at`) VALUES
(17, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has', 'assets/images/sliders_images/69408772167_6646_cover-1.jpg', 'October 8, 2021, 2:40 pm', 'October 8, 2021, 2:52 pm'),
(18, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking\r\nslider 2 slider 2 slider 2', 'assets/images/sliders_images/639206443417_437601_cover.jpg', 'October 8, 2021, 2:41 pm', 'October 8, 2021, 2:52 pm'),
(19, 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,', 'assets/images/sliders_images/560475392403_img_3.jpg', 'October 8, 2021, 2:42 pm', 'October 8, 2021, 2:53 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` text NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `group_id` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for normal users,\r\n1 for admins',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `gender`, `country`, `profile_img`, `status`, `group_id`, `created_at`, `updated_at`) VALUES
(33, 'mohamed sebai', 'a@a.com', '4297f44b13955235245b2497399d7a93', 'female', 'spain', 'assets/images/users_images/person_3.jpg', 1, 1, 'September 25, 2021, 11:21 pm', 'October 31, 2021, 11:22 pm'),
(56, 'mohamed sebai', 'm@m.com', '4297f44b13955235245b2497399d7a93', 'male', 'england', 'admin/assets/images/users_images/881266485446_person6.jpg', 1, 0, '2021', 'October 14, 2021, 1:37 pm'),
(66, 'mohamed seabeai', 'f@f.com', '4297f44b13955235245b2497399d7a93', 'male', 'egypt', 'assets/images/users_images/person_3.jpg', 1, 1, 'October 31, 2021, 11:12 pm', 'October 31, 2021, 11:12 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
