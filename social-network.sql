-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 11:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social-network`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `Sr_No` int(11) NOT NULL,
  `Person_name` varchar(255) NOT NULL,
  `Friend_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`Sr_No`, `Person_name`, `Friend_name`, `status`) VALUES
(1, 'apurv1506', 'varadkulk', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sr_no` int(11) NOT NULL,
  `uploaded_by` varchar(255) NOT NULL,
  `Caption` varchar(50000) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `Likes` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sr_no`, `uploaded_by`, `Caption`, `photo`, `Likes`, `time`) VALUES
(1, 'apurv1506', 'mkbhd', 'Screenshot (68).png', 0, '2020-04-22 19:25:24'),
(2, 'varadkulk', 'graph', 'Screenshot (20).png', 0, '2020-04-22 19:25:24'),
(64, 'varadkulk', 'Test', 'TC2_UBIcover-09-1920x707px.jpg', 0, '2020-04-26 06:25:49'),
(69, 'varadkulk', '', 'TC2_UBIcover-01-3840x1414px.jpg', 0, '2020-04-26 07:49:42'),
(70, 'varadkulk', '', 'TC2_UBIcover-04-3840x1414px.jpg', 0, '2020-04-26 07:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'Apurv', 'Sawant', 'apurv1506', 'apurv.sawant17@vit.edu', '9732dd2616413e6803bcd460a7b2ecb3'),
(7, 'Varad', 'Kulkarni', 'varadkulk', 'kulkarnivarad12000@gmail.com', '980df02f6c41b417f2e47d702afe1270');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`Sr_No`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `Sr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
