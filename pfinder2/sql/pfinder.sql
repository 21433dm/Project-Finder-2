-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 03:45 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cl_users`
--

CREATE TABLE `cl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(32) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `city` varchar(30) NOT NULL,
  `county` varchar(30) NOT NULL,
  `tel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cl_users`
--

INSERT INTO `cl_users` (`id`, `username`, `password`, `email`, `company`, `address1`, `address2`, `postcode`, `city`, `county`, `tel`) VALUES
(1, 'uizdm1', '$2y$10$PmBojZc0SpaB08Bx4vb1L.AfhqYxFEhMCB1B.CZyhe7kFEeQC4TjK', 'uizdm1@work.com', 'Work', 'A Road', 'A Street', 'S44 4BS', 'Sheffield', 'South Yorks', 114),
(2, 'Steve', '$2y$10$U9IYaGG9OMbD5ysY9dyTFOv9QSC7wbJnLigM5YdxHp.GRF2sUdH3K', 'steve@radley.com', 'S.Radley Ltd', '12 Primrose Crescent', 'Aspley', 'NG8 8AP', 'Nottingham', 'Nottinghamshire', 1159);

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(64) NOT NULL,
  `st_userid` int(11) UNSIGNED DEFAULT NULL,
  `cl_userid` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st_users`
--

CREATE TABLE `st_users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_users`
--

INSERT INTO `st_users` (`id`, `username`, `fname`, `lname`, `password`, `email`) VALUES
(1, '363391', 'David', 'Makanjuola', '$2y$10$6OTBtWvSpYjwndUba6gzVezvWAg8QRz1rILzSflzoQZY7nX/yZWki', '363391@students.chesterfield.ac.uk'),
(2, '363636', 'Matt', 'Taylor', '$2y$10$tZyVRtw0848kPEYO7XmFvef0yC3s3cC4zPvlppBbUWzA6acZEtP1y', 'matt@hotmail.com'),
(3, '399999', 'Irene', 'Brady', '$2y$10$kmg0z90IvDgHs/cWfkB7e.bnviyacq7379n2pDuoGCElRi.6poKAu', 'irene@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cl_users`
--
ALTER TABLE `cl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cl_userid` (`cl_userid`),
  ADD KEY `st_userid` (`st_userid`);

--
-- Indexes for table `st_users`
--
ALTER TABLE `st_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cl_users`
--
ALTER TABLE `cl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `st_users`
--
ALTER TABLE `st_users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`st_userid`) REFERENCES `st_users` (`id`),
  ADD CONSTRAINT `login_tokens_ibfk_2` FOREIGN KEY (`cl_userid`) REFERENCES `cl_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
