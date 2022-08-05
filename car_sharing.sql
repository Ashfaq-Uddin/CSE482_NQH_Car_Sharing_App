-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_sharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'shamimmullick98@gmail.com', 'a123');

-- --------------------------------------------------------

--
-- Table structure for table `driver_list`
--

CREATE TABLE `driver_list` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `number` text DEFAULT NULL,
  `seats` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `car_name` varchar(20) DEFAULT NULL,
  `pick_up` varchar(50) DEFAULT NULL,
  `drop_out` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_list`
--

INSERT INTO `driver_list` (`id`, `name`, `gender`, `number`, `seats`, `address`, `car_name`, `pick_up`, `drop_out`) VALUES
('61c1e58281359', 'Ashfaq', 'Male', '1733889378', '3', 'Mirpur', 'Premio', 'Dhanmondi', 'Uttara'),
('61c1e5ed33c53', 'Kazi', 'Male', '01534394439', '4', 'Mirpur', 'Corolla', 'Bashundhara', 'Motijheel'),
('61c200438216f', 'Sadin Niloy', 'Male', '01777889378', '1', 'Bashundhara', 'Premio', 'Dhanmondi', 'Bashundhara'),
('61c208f230062', 'Ashef Hossain', 'Male', '01933665845', '4', 'Gandaria', 'Axio', 'Dhanmondi', 'Gandaria');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`) VALUES
('61c1e58281359', 23.74622576768618, 90.37422180175781),
('61c1e5ed33c53', 23.820427078512136, 90.45295576809495),
('61c200438216f', 23.74622576768618, 90.37422180175781),
('61c208f230062', 23.74622576768618, 90.37422180175781);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` char(30) NOT NULL,
  `lastname` char(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `phonenumber` char(15) DEFAULT NULL,
  `moreinformation` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `email`, `password`, `phonenumber`, `moreinformation`) VALUES
(1, 'shamim', 'ali', 'shamimali', 'shamimmullick98@gmail.com', 'a123', '01534394439', 'hlw'),
(4, 'Kazi', 'Mosaddequr', 'kazimosaddequr', 'kazi89@gmail.com', 'a321', '01824220406', 'hlw'),
(5, 'Ashfaq', 'Uddin', 'ashfaquddin', 'ashfaquddin@gmail.com', '123', '01733889378', 'hlw'),
(6, 'Ismail', 'Hossain', 'ismailhossain', 'issmailhossain@gmail.com', '321', '01877889378', 'hlw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_list`
--
ALTER TABLE `driver_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
