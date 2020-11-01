-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 07:46 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `email`, `subject`, `date`) VALUES
(58, 'apich.ch12@gmail.com', 'd', '2019-12-24 10:56:15'),
(59, 'apich.ch12@gmail.com', 'd', '2019-12-24 10:56:57'),
(60, 'apich.ch12@gmail.com', 'ddd', '2019-12-24 11:00:56'),
(61, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:01:37'),
(62, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:03:48'),
(63, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:04:11'),
(64, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:05:19'),
(65, 'apich.ch12@gmail.com', 'tset', '2019-12-24 11:18:37'),
(66, 'apich.ch12@gmail.com', 'asdasd', '2019-12-24 11:22:35'),
(67, 'apich.ch12@gmail.com', 'd', '2019-12-24 11:23:11'),
(68, 'apich.ch12@gmail.com', 'test', '2019-12-24 11:24:51'),
(69, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:28:10'),
(70, 'apich.ch12@gmail.com', 'sad', '2019-12-24 11:28:39'),
(71, 'apich.ch12@gmail.com', 'ss', '2019-12-24 11:29:39'),
(72, 'apich.ch12@gmail.com', 'asdas', '2019-12-24 11:31:12'),
(73, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:33:28'),
(74, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:37:17'),
(75, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:38:27'),
(76, 'apich.ch12@gmail.com', 'asd', '2019-12-24 11:38:59'),
(77, 'apich.ch12@gmail.com', 'sad', '2019-12-24 11:39:40'),
(78, 'apich.ch12@gmail.com', 'a', '2019-12-24 11:42:45'),
(79, 'apich.ch12@gmail.com', 'asd', '2019-12-24 12:20:03'),
(80, 'apich.ch12@gmail.com', 'sad', '2019-12-24 12:22:38'),
(81, 'apich.ch12@gmail.com', 'sad', '2019-12-24 12:23:20'),
(82, 'apich.ch12@gmail.com', 'asd', '2019-12-24 12:24:13'),
(83, 'apich.ch12@gmail.com', 'asd', '2019-12-24 12:24:46'),
(84, 'apich.ch12@gmail.com', 's', '2019-12-24 12:25:31'),
(85, 'apich.ch12@gmail.com', 'ddd', '2019-12-24 12:26:28'),
(86, 'apich.ch12@gmail.com', 'asd', '2019-12-24 12:31:16'),
(87, 'apich.ch12@gmail.com', 'r', '2019-12-24 12:32:22'),
(88, 'apich.ch12@gmail.com', 'sdas', '2019-12-24 12:33:31'),
(89, 'apich.ch12@gmail.com', 'sad', '2019-12-24 12:35:26'),
(90, 'apich.ch12@gmail.com', 's', '2019-12-24 12:36:12'),
(91, 'apich.ch12@gmail.com', 's', '2019-12-24 12:36:33'),
(92, 'apich.ch12@gmail.com', 'asd', '2019-12-24 12:38:30'),
(93, 'apich.ch12@gmail.com', 'asddddasd', '2019-12-24 12:39:59'),
(94, 'apich.ch12@gmail.com', 'asddddasd', '2019-12-24 12:40:48'),
(95, 'apich.ch12@gmail.com', 's', '2019-12-24 12:41:14'),
(96, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:42:40'),
(97, 'apich.ch12@gmail.com', 'sdsss', '2019-12-24 12:43:56'),
(98, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:45:26'),
(99, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:48:33'),
(100, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:48:52'),
(101, 'apich.ch12@gmail.com', 'dd', '2019-12-24 12:53:52'),
(102, 'apich.ch12@gmail.com', 'dd', '2019-12-24 12:54:53'),
(103, 'apich.ch12@gmail.com', 'code test', '2019-12-24 12:55:25'),
(104, 'apich.ch12@gmail.com', 'code test', '2019-12-24 12:55:53'),
(105, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:56:06'),
(106, 'apich.ch12@gmail.com', 'test', '2019-12-24 12:57:01'),
(107, 'apich.ch12@gmail.com', 'd', '2019-12-24 12:57:42'),
(108, 'apich.ch12@gmail.com', '???', '2019-12-24 13:10:25'),
(109, 'apich.ch12@gmail.com', 'sad', '2019-12-24 13:14:40'),
(110, 'apich.ch12@gmail.com', 't', '2019-12-24 13:15:37'),
(111, 'apich.ch12@gmail.com', 't', '2019-12-24 13:16:50'),
(112, 'apich.ch12@gmail.com', 't', '2019-12-24 13:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
