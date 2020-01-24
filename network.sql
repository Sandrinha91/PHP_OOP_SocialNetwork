-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2020 at 04:57 PM
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
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `user_id`, `friend_id`) VALUES
(1, 11, 32),
(3, 12, 32),
(38, 32, 12),
(39, 13, 32),
(42, 13, 12),
(43, 13, 11),
(44, 35, 13),
(45, 35, 13);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `friend_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(200) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `friend_id`, `message`, `created_at`) VALUES
(1, 32, 12, 'Ovo je prva poruka!!!', '2020-01-13 15:56:00'),
(2, 12, 32, 'Ovo je druga poruka!!! Od nenada, peri!', '2020-01-13 16:47:28'),
(3, 32, 12, 'Ovo je treca poruka, nenadu od pere.', '2020-01-13 16:49:42'),
(4, 32, 13, 'Cao aleksandra!!!', '2020-01-13 16:58:17'),
(5, 13, 12, 'Ovo je poruka od Aleksandre Nenadu!!!', '2020-01-13 20:18:57'),
(6, 13, 32, 'Cao Pero!!!', '2020-01-14 12:15:16'),
(7, 11, 32, 'Cao Pero, ovde Dusan Velev!!! :)', '2020-01-14 12:24:41'),
(8, 32, 12, 'Ovo je cetvrta poruka Nanadu od Pere!', '2020-01-14 14:59:59'),
(9, 32, 12, 'Ovo je 4 poruka, nenadu od pere', '2020-01-14 15:00:05'),
(10, 32, 12, 'Ovo je 5 poruka, nenadu od pere!! :D', '2020-01-14 15:00:47'),
(11, 32, 13, 'Sta radis Aleksandra?\r\nPozdrav, Pera.', '2020-01-14 15:01:27'),
(12, 32, 13, ':D', '2020-01-14 15:01:54'),
(13, 32, 13, ':D', '2020-01-14 15:02:14'),
(14, 32, 11, 'Pozdrav Dusane!!!', '2020-01-14 15:09:19'),
(15, 32, 11, 'Sta radis?', '2020-01-14 15:10:44'),
(16, 32, 11, 'Sta ima novo?', '2020-01-14 15:12:26'),
(17, 32, 11, 'Pozdrav, Pera', '2020-01-14 15:13:28'),
(18, 32, 11, 'Pozzz', '2020-01-14 17:49:58'),
(19, 32, 32, 'Pozzz samom sebi', '2020-01-14 17:50:28'),
(20, 32, 32, 'Pozz samom sebi ponovo!!!', '2020-01-15 13:02:47'),
(21, 35, 13, 'Cao Aleksandra, Pozdrav. Jasmina!!!', '2020-01-15 13:39:53'),
(22, 35, 13, 'Zdravo aleksandraaa', '2020-01-15 13:46:44'),
(26, 35, 13, 'Zdravo aleksandraaa', '2020-01-15 13:51:01'),
(27, 35, 13, ':*', '2020-01-15 13:52:11'),
(30, 32, 35, 'Cao Jasmina!!! :*', '2020-01-15 14:03:34'),
(31, 32, 32, 'Bla bla ', '2020-01-15 14:06:53'),
(32, 35, 35, 'Poz samoj sebi!!!', '2020-01-15 15:07:53'),
(33, 32, 35, 'Sta ima novo Jasmina?', '2020-01-15 15:32:01'),
(34, 32, 35, 'cao jaco', '2020-01-15 16:44:12'),
(35, 32, 32, 'bgggg', '2020-01-15 16:45:57'),
(36, 32, 32, 'hjhjhjhjh', '2020-01-15 16:46:19'),
(37, 35, 13, ':*', '2020-01-15 16:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post` varchar(250) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `video` varchar(250) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `post` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post`, `video`, `created_at`) VALUES
(1, 12, 'Ja sam nenaaaaadooov POSSSST!!!!', NULL, '2020-01-06 19:04:22'),
(2, 11, 'Ja sam dusanooov POSSSTT!!!!', NULL, '2020-01-06 19:04:22'),
(3, 32, 'This is my test post!!! :)', '', '2020-01-06 19:04:22'),
(4, 32, 'This is my second test post!!! :)', '', '2020-01-06 19:04:22'),
(5, 32, 'This is my second test post!!! :)', '', '2020-01-06 19:04:22'),
(6, 32, 'This is my second test post!!! :)', '', '2020-01-06 19:04:46'),
(7, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:27:31'),
(8, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:28:55'),
(9, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:29:42'),
(10, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:30:10'),
(11, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:31:49'),
(12, 32, 'This is my new test post!!! :)', '', '2020-01-06 19:31:54'),
(13, 13, 'This is my first test pos as Aleksandra!!! :)', '', '2020-01-08 17:14:04'),
(14, 35, 'Hello, my name is Jasmina!!! :)', '', '2020-01-15 12:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `last_name` varchar(90) COLLATE utf16_slovenian_ci NOT NULL,
  `picture` varbinary(60150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(50) COLLATE utf16_slovenian_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf16_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `first_name`, `last_name`, `picture`, `dob`, `city`, `country`) VALUES
(7, 11, 'Dusan', 'Velev', '', '1990-07-10', '', ''),
(8, 12, 'Nenad', 'Grujic', '', '1986-12-07', '', ''),
(9, 13, 'Aleksandra', 'Velev', 0x696d616765732f35653138613866323430633934382e32343636303738322e6a7067, '1991-12-07', '', ''),
(10, 32, 'Pera', 'Stojkovic', 0x696d616765732f35653138613130333831636432372e38313839333437392e706e67, '1991-11-05', '   Nis ', '  Srbija'),
(11, 35, 'Jasmina', 'Plavsic', 0x696d616765732f35653166303532313336333861362e30303937323636362e706e67, '1988-01-31', '  Nis', '  Srbija');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf16_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf16 COLLATE=utf16_slovenian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(11, 'dvelev', 'dusanvelev@gmail.com', 'dvelev123'),
(12, 'Nenadovic', 'aleksandravelev91@gmail.com', 'nenadovic123'),
(13, 'Aleksandra', 'aleksandragrujic91@gmail.com', 'aleksandra123'),
(32, 'Pera1234567', 'pera@pera.com', 'pera123'),
(35, 'Jasmina', 'jasmina@jasmina.com', 'jasmina123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
