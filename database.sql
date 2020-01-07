-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 12:17 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koicha`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(3, 'Java'),
(26, 'JavaScript'),
(17, 'JSON'),
(28, 'OOP'),
(4, 'PHP');

--
-- Triggers `categories`
--
DELIMITER $$
CREATE TRIGGER `duplicate_category_name_trg` BEFORE UPDATE ON `categories` FOR EACH ROW BEGIN
	DECLARE MESSAGE_TEXT VARCHAR(255) DEFAULT '';

	IF OLD.cat_id = NEW.cat_title && OLD.cat_title = NEW.cat_title  THEN 
		SIGNAL SQLSTATE '80000'
		SET MESSAGE_TEXT = 'Category name already exist!';
	ELSE 
		SET MESSAGE_TEXT = 'Category added';
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(143, 146, '0+isrdt 09fj0k', 'asjdioasjd@aios9jd.com', 'aiuhdaiosuhdausdioashdioajsdiohjasod', 'approved', '2020-01-05'),
(144, 146, '0+isrdt 09fj0k', 'asjdioasjd@aios9jd.com', 'aiuhdaiosuhdausdioashdioajsdiohjasod', 'Unapproved', '2020-01-05'),
(145, 146, '0+isrdt 09fj0k', 'asjdioasjd@aios9jd.com', 'aiuhdaiosuhdausdioashdioajsdiohjasod', 'Unapproved', '2020-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_time`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(172, 26, 'Web Development Courses', 'Khoi Hoang', '2020-01-07', '2020-01-07 22:18:19', 'kisspng-cascading-style-sheets-javascript-html-css3-jquery-logo-5ac78cfa148694.1772279515230271940841.jpg', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut purus metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum vestibulum lectus, at cursus diam mollis eu. Cras eget erat nulla. Vivamus venenatis mollis lobortis. Pellentesque scelerisque, est id pulvinar aliquam, quam mi egestas turpis, eget mollis nibh risus a orci. Donec dui sapien, vulputate eget est in, ullamcorper pharetra justo. Aliquam erat volutpat. Cras mollis dictum consequat. Morbi in nulla viverra, iaculis lectus in, pellentesque urna. Proin faucibus ut leo consectetur porta. Aenean id egestas ex. Maecenas eu tellus nec quam hendrerit tristique sed sit amet orci. Duis sed sapien justo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Suspendisse condimentum in diam non scelerisque. Cras molestie quis dui eu hendrerit. Cras massa nibh, venenatis sit amet posuere vitae, tempor et velit. Praesent pulvinar euismod tincidunt. Donec a blandit nibh, eget tristique velit. Maecenas ac orci tempus mi vulputate eleifend facilisis eu dui. Morbi vitae dolor ac felis dignissim pretium eget eu mi. Quisque mattis consectetur felis, at pulvinar leo malesuada vel. Proin velit metus, lacinia sit amet risus et, dignissim ultrices neque. Praesent placerat purus nec posuere venenatis. Morbi pulvinar tortor convallis, blandit augue nec, fermentum erat. In eu interdum leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ex quam, scelerisque vitae euismod a, iaculis a purus. Vivamus nulla arcu, scelerisque ac ullamcorper at, consequat sit amet urna. Nulla quis aliquet nisi.</p>', '0', 0, 'published', 5),
(173, 1, 'SQL Courses', 'Khoi', '2020-01-07', '2020-01-07 22:18:31', 'SQL-1024x341.png', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis rhoncus molestie. Nunc sit amet massa quis ipsum aliquam fermentum. Sed in turpis varius, ultrices elit non, dapibus lorem. Aliquam consectetur tellus orci, eget lobortis est sagittis eget. Sed eget vulputate purus. Sed varius velit ut aliquam ullamcorper. Curabitur ullamcorper ligula sem, id euismod risus lobortis a. Integer quis venenatis arcu, sed condimentum sapien.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Sed a feugiat velit. Pellentesque iaculis pellentesque sagittis. Fusce sit amet massa ante. Morbi eget enim quam. Fusce sodales urna urna, eu viverra magna condimentum a. Nam quis lorem id dui bibendum tempor. Nullam eros metus, semper ac nunc ac, tempor feugiat purus.</p>', '0', 0, 'published', 9),
(174, 4, 'PHP Course', 'Khoi Hoang', '2020-01-07', '2020-01-07 22:18:31', 'php-logo.png', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut purus metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum vestibulum lectus, at cursus diam mollis eu. Cras eget erat nulla. Vivamus venenatis mollis lobortis. Pellentesque scelerisque, est id pulvinar aliquam, quam mi egestas turpis, eget mollis nibh risus a orci. Donec dui sapien, vulputate eget est in, ullamcorper pharetra justo. Aliquam erat volutpat. Cras mollis dictum consequat. Morbi in nulla viverra, iaculis lectus in, pellentesque urna. Proin faucibus ut leo consectetur porta. Aenean id egestas ex. Maecenas eu tellus nec quam hendrerit tristique sed sit amet orci. Duis sed sapien justo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Suspendisse condimentum in diam non scelerisque. Cras molestie quis dui eu hendrerit. Cras massa nibh, venenatis sit amet posuere vitae, tempor et velit. Praesent pulvinar euismod tincidunt. Donec a blandit nibh, eget tristique velit. Maecenas ac orci tempus mi vulputate eleifend facilisis eu dui. Morbi vitae dolor ac felis dignissim pretium eget eu mi. Quisque mattis consectetur felis, at pulvinar leo malesuada vel. Proin velit metus, lacinia sit amet risus et, dignissim ultrices neque. Praesent placerat purus nec posuere venenatis. Morbi pulvinar tortor convallis, blandit augue nec, fermentum erat. In eu interdum leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ex quam, scelerisque vitae euismod a, iaculis a purus. Vivamus nulla arcu, scelerisque ac ullamcorper at, consequat sit amet urna. Nulla quis aliquet nisi.</p>', '0', 0, 'published', 1),
(175, 26, 'Web Development Courses', 'Khoi Hoang', '2020-01-07', '2020-01-07 22:18:31', 'kisspng-cascading-style-sheets-javascript-html-css3-jquery-logo-5ac78cfa148694.1772279515230271940841.jpg', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut purus metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum vestibulum lectus, at cursus diam mollis eu. Cras eget erat nulla. Vivamus venenatis mollis lobortis. Pellentesque scelerisque, est id pulvinar aliquam, quam mi egestas turpis, eget mollis nibh risus a orci. Donec dui sapien, vulputate eget est in, ullamcorper pharetra justo. Aliquam erat volutpat. Cras mollis dictum consequat. Morbi in nulla viverra, iaculis lectus in, pellentesque urna. Proin faucibus ut leo consectetur porta. Aenean id egestas ex. Maecenas eu tellus nec quam hendrerit tristique sed sit amet orci. Duis sed sapien justo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Suspendisse condimentum in diam non scelerisque. Cras molestie quis dui eu hendrerit. Cras massa nibh, venenatis sit amet posuere vitae, tempor et velit. Praesent pulvinar euismod tincidunt. Donec a blandit nibh, eget tristique velit. Maecenas ac orci tempus mi vulputate eleifend facilisis eu dui. Morbi vitae dolor ac felis dignissim pretium eget eu mi. Quisque mattis consectetur felis, at pulvinar leo malesuada vel. Proin velit metus, lacinia sit amet risus et, dignissim ultrices neque. Praesent placerat purus nec posuere venenatis. Morbi pulvinar tortor convallis, blandit augue nec, fermentum erat. In eu interdum leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ex quam, scelerisque vitae euismod a, iaculis a purus. Vivamus nulla arcu, scelerisque ac ullamcorper at, consequat sit amet urna. Nulla quis aliquet nisi.</p>', '0', 0, 'published', 5),
(176, 1, 'SQL Courses', 'Khoi', '2020-01-07', '2020-01-07 22:18:31', 'SQL-1024x341.png', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris mollis rhoncus molestie. Nunc sit amet massa quis ipsum aliquam fermentum. Sed in turpis varius, ultrices elit non, dapibus lorem. Aliquam consectetur tellus orci, eget lobortis est sagittis eget. Sed eget vulputate purus. Sed varius velit ut aliquam ullamcorper. Curabitur ullamcorper ligula sem, id euismod risus lobortis a. Integer quis venenatis arcu, sed condimentum sapien.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Sed a feugiat velit. Pellentesque iaculis pellentesque sagittis. Fusce sit amet massa ante. Morbi eget enim quam. Fusce sodales urna urna, eu viverra magna condimentum a. Nam quis lorem id dui bibendum tempor. Nullam eros metus, semper ac nunc ac, tempor feugiat purus.</p>', '0', 0, 'published', 9),
(177, 4, 'PHP Course', 'Khoi Hoang', '2020-01-07', '2020-01-07 22:18:31', 'php-logo.png', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut purus metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum vestibulum lectus, at cursus diam mollis eu. Cras eget erat nulla. Vivamus venenatis mollis lobortis. Pellentesque scelerisque, est id pulvinar aliquam, quam mi egestas turpis, eget mollis nibh risus a orci. Donec dui sapien, vulputate eget est in, ullamcorper pharetra justo. Aliquam erat volutpat. Cras mollis dictum consequat. Morbi in nulla viverra, iaculis lectus in, pellentesque urna. Proin faucibus ut leo consectetur porta. Aenean id egestas ex. Maecenas eu tellus nec quam hendrerit tristique sed sit amet orci. Duis sed sapien justo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Suspendisse condimentum in diam non scelerisque. Cras molestie quis dui eu hendrerit. Cras massa nibh, venenatis sit amet posuere vitae, tempor et velit. Praesent pulvinar euismod tincidunt. Donec a blandit nibh, eget tristique velit. Maecenas ac orci tempus mi vulputate eleifend facilisis eu dui. Morbi vitae dolor ac felis dignissim pretium eget eu mi. Quisque mattis consectetur felis, at pulvinar leo malesuada vel. Proin velit metus, lacinia sit amet risus et, dignissim ultrices neque. Praesent placerat purus nec posuere venenatis. Morbi pulvinar tortor convallis, blandit augue nec, fermentum erat. In eu interdum leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque ex quam, scelerisque vitae euismod a, iaculis a purus. Vivamus nulla arcu, scelerisque ac ullamcorper at, consequat sit amet urna. Nulla quis aliquet nisi.</p>', '0', 0, 'published', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `config_id` int(11) NOT NULL,
  `config_name` varchar(255) NOT NULL,
  `config_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'site_title', 'Koicha'),
(2, 'site_description', 'Front End Developer'),
(3, 'post_per_pagination', '6');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_name` longtext NOT NULL,
  `theme_image` text NOT NULL,
  `theme_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`, `theme_image`, `theme_value`) VALUES
(1, 'Sbootstrap', '', 1),
(2, 'Koicha', '', 0),
(3, 'BoomStrap', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_img` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_img`, `user_role`, `user_date_created`) VALUES
(138, 'hello', '$argon2id$v=19$m=65536,t=4,p=1$UkVLWjd6UVp1akdaYUpmRQ$bQECNCeHpfPjGJHh4bhydDbpOVrVrQ5q4D5Xv4MgA5c', 'Khoi', 'Hoang', 'hello@gmail.com', '', 'admin', '2020-01-04'),
(143, 'hello1', '$argon2id$v=19$m=65536,t=4,p=1$Z3J1bXhEZzRIUTRMNWhpNQ$9B+K7oCDxjbZW20rxT2UKE9YiMcb3egNvJlxTiUqULQ', 'aud98oasjod', 'aasjd09ajd', 'helaoskd@iasjd.com', '', 'subscriber', '2020-01-04'),
(152, 'aksj09d+j', '$argon2id$v=19$m=65536,t=4,p=1$VmJLZFEyVTBBYzFsM091OQ$wOGkB36xS1FJKO2xtJoy6jMOwTfoEF9bxZJAyV7APX8', 'asdpijas0j', '+0kasd0+k', '9jas0dj@a098sjd0asd.coma', '', 'subscriber', '2020-01-04'),
(163, 'aisojdaiosjd', '$argon2id$v=19$m=65536,t=4,p=1$T1JWVnF1bWF1L2publBOSA$PU/j295hI2apsIh3zHNpTwmRCLysBhC1cUSyEMdKOw4', 'asdaspdj', 'oiasjd', 'ijasodjo', '', 'subscriber', '2020-01-04'),
(171, 'asdasopidj', '$argon2id$v=19$m=65536,t=4,p=1$MjhWdEc2aHVsZnlpRWs1Yw$eF6p/8o1NUxSzOlVYWbxocLZd5wP9/8lulXJPkcUtk8', '', '', 'jasodj@iasjd.com', '', 'subscriber', '2020-01-05'),
(172, 'khoi', '$argon2id$v=19$m=65536,t=4,p=1$bHZGTXdiYS9DL0ZFZU9DNw$wg/CemLbWjAdxEqhJHVTRrZRgnauoTOlayWuzRUM7EA', 'Khoi', 'Hoang', 'hello@koicha.dev', '', 'admin', '2020-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `widget`
--

CREATE TABLE `widget` (
  `widget_id` int(11) NOT NULL,
  `widget_name` longtext NOT NULL,
  `widget_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `widget`
--

INSERT INTO `widget` (`widget_id`, `widget_name`, `widget_value`) VALUES
(1, 'widget_login', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_title` (`cat_title`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`config_id`),
  ADD UNIQUE KEY `config_name` (`config_name`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `widget`
--
ALTER TABLE `widget`
  ADD PRIMARY KEY (`widget_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `widget`
--
ALTER TABLE `widget`
  MODIFY `widget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
