-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 04:21 PM
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
(4, 'php'),
(17, 'JSON'),
(26, 'JavaScript'),
(27, 'Procedural PHP'),
(28, 'OOP');

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
(2, 3, 'Khio Boy', 'khoi@gmail.com', 'Hellooo', 'approved', '2019-12-27'),
(17, 3, 'asdasd', 'asdasd@ausidhiusad.com', 'asdsad', 'approved', '2019-12-27'),
(40, 13, 'Lil bro', 'bro@gmail.com', 'Another comment', 'Unapproved', '2019-12-27'),
(41, 12, 'yoyoyo', 'asjdoasijd@gmail.com', 'iuahdiuhasiuhdoasd', 'Unapproved', '2019-12-27'),
(42, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(43, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(44, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(45, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(46, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(47, 24, 'saodjsaoijd', 'asdopjaios@aiosjdosajd.com', '9oashd9ashd9uashdhsa\r\n', 'Unapproved', '2019-12-27'),
(48, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(49, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(50, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(51, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(52, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(53, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(54, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27'),
(55, 2, 'asdasd', 'asidjasd@gmail.com', 'oahdiouasndasd', 'Unapproved', '2019-12-27');

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
  `post_time` datetime NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_time`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(2, 1, 'JavaScript Course ', 'John Doe', '2019-12-27', '0000-00-00 00:00:00', 'image_2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lacus viverra vitae congue eu consequat ac felis donec. Morbi tempus iaculis urna id volutpat lacus laoreet non curabitur. Tristique risus nec feugiat in fermentum posuere urna nec tincidunt. Pellentesque habitant morbi tristique senectus et netus. Massa tincidunt dui ut ornare lectus sit amet est placerat. Turpis tincidunt id aliquet risus feugiat in ante metus. Quis ipsum suspendisse ultrices gravida. Malesuada fames ac turpis egestas maecenas pharetra. Purus sit amet luctus venenatis lectus magna. At auctor urna nunc id. Volutpat blandit aliquam etiam erat velit scelerisque in. Non nisi est sit amet. Viverra mauris in aliquam sem. Integer eget aliquet nibh praesent tristique magna sit amet purus. Eget lorem dolor sed viverra ipsum nunc. Diam sollicitudin tempor id eu nisl nunc. Libero volutpat sed cras ornare arcu dui vivamus arcu felis. Urna nunc id cursus metus aliquam eleifend mi. Id volutpat lacus laoreet non curabitur gravida arcu.</p>\r\n<p>&nbsp;</p>\r\n<p>Urna condimentum mattis pellentesque id nibh tortor id. Magna etiam tempor orci eu lobortis elementum. Fermentum posuere urna nec tincidunt praesent. Faucibus in ornare quam viverra orci sagittis eu volutpat. Neque vitae tempus quam pellentesque nec nam. Nibh praesent tristique magna sit amet purus. Vel fringilla est ullamcorper eget nulla. In tellus integer feugiat scelerisque varius. Mi tempus imperdiet nulla malesuada pellentesque elit. Eu mi bibendum neque egestas congue quisque egestas diam. Non odio euismod lacinia at quis risus sed. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Accumsan tortor posuere ac ut. Dignissim suspendisse in est ante in nibh. Velit aliquet sagittis id consectetur purus ut faucibus.</p>\r\n<p>&nbsp;</p>\r\n<p>Purus viverra accumsan in nisl nisi scelerisque. A arcu cursus vitae congue mauris. Vitae aliquet nec ullamcorper sit. Ut sem viverra aliquet eget sit amet tellus cras adipiscing. At imperdiet dui accumsan sit. Porta nibh venenatis cras sed felis. Diam vel quam elementum pulvinar etiam. Ut tristique et egestas quis ipsum. Vitae proin sagittis nisl rhoncus mattis rhoncus. Pulvinar sapien et ligula ullamcorper malesuada proin libero nunc consequat. Nisl vel pretium lectus quam id leo in. Adipiscing elit pellentesque habitant morbi tristique senectus. Eu augue ut lectus arcu bibendum. Ut lectus arcu bibendum at varius vel. Scelerisque purus semper eget duis at. Odio aenean sed adipiscing diam donec adipiscing tristique risus nec. Vel orci porta non pulvinar. Etiam sit amet nisl purus in mollis nunc sed. Nisi vitae suscipit tellus mauris a diam maecenas. Malesuada nunc vel risus commodo viverra maecenas accumsan.</p>\r\n<p>&nbsp;</p>\r\n<p>Ornare quam viverra orci sagittis eu volutpat odio. Diam quis enim lobortis scelerisque fermentum. Ornare aenean euismod elementum nisi quis eleifend. Quis auctor elit sed vulputate mi sit amet. Turpis nunc eget lorem dolor sed viverra. Justo laoreet sit amet cursus sit amet. Volutpat lacus laoreet non curabitur gravida arcu ac. Sed id semper risus in hendrerit gravida rutrum quisque non. Velit aliquet sagittis id consectetur purus ut faucibus. Suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Interdum varius sit amet mattis vulputate. Donec massa sapien faucibus et molestie ac feugiat. Mattis nunc sed blandit libero. Sit amet porttitor eget dolor morbi non arcu risus. Sit amet volutpat consequat mauris nunc congue. Dignissim sodales ut eu sem. Tempor orci eu lobortis elementum nibh tellus molestie nunc non. Pellentesque elit eget gravida cum sociis natoque penatibus. Turpis in eu mi bibendum neque egestas congue.</p>\r\n<p>&nbsp;</p>\r\n<p>Aenean pharetra magna ac placerat vestibulum lectus. Aenean sed adipiscing diam donec adipiscing. Semper quis lectus nulla at volutpat diam ut. Urna duis convallis convallis tellus id interdum velit laoreet id. Sit amet risus nullam eget felis eget nunc lobortis. Netus et malesuada fames ac. Malesuada fames ac turpis egestas sed tempus urna et pharetra. Massa sed elementum tempus egestas. Consectetur lorem donec massa sapien faucibus et molestie ac feugiat. Sed sed risus pretium quam vulputate dignissim. Eget duis at tellus at urna condimentum mattis pellentesque. Sit amet dictum sit amet justo donec enim. Turpis egestas sed tempus urna et pharetra pharetra. Proin sed libero enim sed faucibus turpis in.</p>\r\n<p>&nbsp;</p>\r\n<p>Tellus molestie nunc non blandit massa enim. Faucibus turpis in eu mi bibendum neque egestas congue quisque. Aenean et tortor at risus. Interdum posuere lorem ipsum dolor sit. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Tempus urna et pharetra pharetra massa massa. Sapien eget mi proin sed libero enim sed. Pellentesque id nibh tortor id aliquet lectus proin nibh. Dolor magna eget est lorem. Ornare arcu odio ut sem nulla pharetra. Erat nam at lectus urna. Vel risus commodo viverra maecenas accumsan lacus. Diam quam nulla porttitor massa id. Semper feugiat nibh sed pulvinar proin gravida. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Urna nunc id cursus metus aliquam eleifend mi. Quis vel eros donec ac odio tempor orci dapibus ultrices. Sapien pellentesque habitant morbi tristique senectus et netus et malesuada.</p>\r\n<p>&nbsp;</p>\r\n<p>Ridiculus mus mauris vitae ultricies leo integer. Odio pellentesque diam volutpat commodo sed. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius. Molestie ac feugiat sed lectus. Arcu ac tortor dignissim convallis aenean et tortor. Risus viverra adipiscing at in tellus integer feugiat scelerisque varius. Pharetra et ultrices neque ornare aenean euismod elementum nisi quis. Nisl tincidunt eget nullam non nisi est. Ac turpis egestas maecenas pharetra convallis posuere. Dolor magna eget est lorem ipsum dolor sit amet. Non quam lacus suspendisse faucibus interdum. Diam maecenas ultricies mi eget mauris pharetra et. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Eu turpis egestas pretium aenean. Ac turpis egestas maecenas pharetra convallis.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris a diam maecenas sed enim ut sem. Eget mauris pharetra et ultrices neque. Quam id leo in vitae turpis. Tristique sollicitudin nibh sit amet. Rhoncus mattis rhoncus urna neque viverra justo nec. Risus viverra adipiscing at in tellus integer. Nunc id cursus metus aliquam. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor. Sit amet consectetur adipiscing elit. Malesuada pellentesque elit eget gravida cum sociis natoque. Suscipit tellus mauris a diam maecenas. Odio facilisis mauris sit amet massa vitae tortor condimentum. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Erat pellentesque adipiscing commodo elit at imperdiet. Laoreet non curabitur gravida arcu ac tortor dignissim. Blandit aliquam etiam erat velit scelerisque in dictum. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit. Orci ac auctor augue mauris augue neque gravida in.</p>\r\n<p>&nbsp;</p>', 'Bootstrap, JavaScript, PHP', 0, 'Published'),
(3, 1, 'Broscience', 'Broscience', '2019-12-27', '0000-00-00 00:00:00', 'image_2.jpg', '<p>This is a broscience test</p>', 'broscience', 0, 'Published'),
(12, 1, 'This is a test', 'Khoi Hoang', '2019-12-27', '0000-00-00 00:00:00', '', '<p><span style=\"color: #7b8898; font-family: \'Mercury SSm A\', \'Mercury SSm B\', Georgia, Times, \'Times New Roman\', \'Microsoft YaHei New\', \'Microsoft Yahei\', 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; font-size: 22.5625px; background-color: #556271;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non arcu risus quis varius quam quisque. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Tempus egestas sed sed risus pretium quam vulputate dignissim. Eleifend donec pretium vulputate sapien nec. Augue lacus viverra vitae congue eu consequat. In dictum non consectetur a. Sed odio morbi quis commodo. Fringilla est ullamcorper eget nulla. Risus quis varius quam quisque id diam vel quam. In fermentum et sollicitudin ac orci. Venenatis lectus magna fringilla urna porttitor rhoncus. Blandit turpis cursus in hac habitasse platea dictumst quisque. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Cras fermentum odio eu feugiat pretium.</span></p>', 'whey', 0, 'published'),
(13, 1, 'DIZ IZ A Testy', 'InWin', '2019-12-27', '0000-00-00 00:00:00', 'image_3.jpg', '<p><span style=\"color: #7b8898; font-family: \'Mercury SSm A\', \'Mercury SSm B\', Georgia, Times, \'Times New Roman\', \'Microsoft YaHei New\', \'Microsoft Yahei\', 微软雅黑, 宋体, SimSun, STXihei, 华文细黑, serif; font-size: 22.5625px; background-color: #556271;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non arcu risus quis varius quam quisque. Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Tempus egestas sed sed risus pretium quam vulputate dignissim. Eleifend donec pretium vulputate sapien nec. Augue lacus viverra vitae congue eu consequat. In dictum non consectetur a. Sed odio morbi quis commodo. Fringilla est ullamcorper eget nulla. Risus quis varius quam quisque id diam vel quam. In fermentum et sollicitudin ac orci. Venenatis lectus magna fringilla urna porttitor rhoncus. Blandit turpis cursus in hac habitasse platea dictumst quisque. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Cras fermentum odio eu feugiat pretium.</span></p>', 'Bootstrap', 1, 'Draft'),
(24, 1, 'Brah brah breh', 'Dr Fong', '2019-12-27', '0000-00-00 00:00:00', 'image_1.jpg', '<p>adasdasdasdasdasdasdasdasd asdasd</p>', '0', 0, 'draft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
