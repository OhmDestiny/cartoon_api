-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2022 at 10:21 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toontoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `title` text NOT NULL,
  `catid` text NOT NULL,
  `theme` int(11) NOT NULL,
  `synposis` text NOT NULL,
  `folder` text NOT NULL,
  `coverfile` text NOT NULL,
  `view` bigint(20) NOT NULL DEFAULT '0',
  `lastchapter` text NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `title`, `catid`, `theme`, `synposis`, `folder`, `coverfile`, `view`, `lastchapter`, `online`, `timestamp`) VALUES
(8, 'onepiece', '[1],[6]', 0, 'การผจญภัย', 'onepiece', '8111.jpg', 0, '', 0, '2022-03-31 21:57:12'),
(9, 'โดเรมอน', '[1],[6]', 0, 'หุ่นยนต์น่ารัก', 'doraemon', '170652.jpg', 0, '', 0, '2022-03-31 22:08:48'),
(10, 'testx', '[1],[2]', 4, 'xxxxx', 'dddd', '8116.jpg', 0, '', 0, '2022-04-01 16:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `name` text NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `name`, `online`) VALUES
(1, 'โรแมนติก', 1),
(2, 'แฟนตาซี', 1),
(6, 'ผจญภัย', 1),
(7, 'ต่างมิติ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text NOT NULL,
  `book` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `ads` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `profilepic` int(11) NOT NULL DEFAULT '1',
  `hashkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `book`, `category`, `rank`, `ads`, `admin`, `profilepic`, `hashkey`) VALUES
(1, 'test', '1234', 1, 1, 1, 1, 1, 1, 'PNZK)*UrsTfmIu2S'),
(2, 'test2', 'dasd', 1, 0, 1, 1, 1, 1, 'asdasdasd'),
(3, 'test3', '111222', 1, 1, 1, 0, 0, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
