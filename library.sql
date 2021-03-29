-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 05:57 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `isbn` varchar(35) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publisher` varchar(55) NOT NULL,
  `pubyear` year(4) NOT NULL,
  `author` varchar(55) NOT NULL,
  `category` varchar(55) NOT NULL,
  `condition1` varchar(255) NOT NULL,
  `returndate` date NOT NULL,
  `userid` varchar(12) NOT NULL,
  `borrow` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `description`, `publisher`, `pubyear`, `author`, `category`, `condition1`, `returndate`, `userid`, `borrow`) VALUES
(4, '9780324647563', 'College Accounting, Chapters 1-27', 'As one of the most popular choices in college accounting.', 'Heintz', 2008, 'Ewarton Campbell', 'Fiction', '          GOOD', '2019-12-19', 'stu1222', 'no'),
(7, '9781491904993', 'Modern PHP', 'Learn to code PHP', 'Omelly', 2015, 'Josh Stuppart', 'Non Fiction', '   GOOD', '2019-12-26', 'shelly22', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `count` int(11) NOT NULL,
  `id` varchar(12) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(55) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `conpass` varchar(12) NOT NULL,
  `admin` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`count`, `id`, `fname`, `mname`, `lname`, `email`, `address`, `department`, `pass`, `conpass`, `admin`) VALUES
(1, '20162023', 'Alton', 'A', 'Brooks', 'Altonbrooks1234@gmail.com', 'Gaza City', 'Library', '123456', '', 'yes'),
(3, '20192000', 'Mark', 'X', 'Xander', 'markx@yahoo.com', 'Mobay', 'Library', '123456', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `count` int(11) NOT NULL,
  `id` varchar(12) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `mname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address` varchar(100) NOT NULL,
  `department` varchar(55) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `conpass` varchar(12) NOT NULL,
  `active` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`count`, `id`, `fname`, `mname`, `lname`, `email`, `address`, `department`, `pass`, `conpass`, `active`) VALUES
(1, '20151212', 'Sheniel', 'A', 'Gordon', 'shenyeng@gmail.com', 'Water House', 'Business', 'mmmppp', 'mmmppp', 'yes'),
(2, '20161108', 'Jordon', 'C', 'Hayles', 'jordonhayles1998@gmail.com', '5 Flemmington Drive, kgn 19.', 'Computer', '123456', '123456', 'no'),
(5, '20142012', 'Jody', 'C', 'Ewan', 'Jodyewan94@gmail.com', 'Waltham Park', 'Business', '123456', '', 'yes'),
(7, 'stu1222', 'Joshe', 'C', 'Grey', 'dsgdrgs@gmail.com', 'dsfasef', 'Business', 'mmmppp', 'mmmppp', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
