-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 09:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `subject`) VALUES
(1, 'kika@gmail.com', 'Kika voli Nenu', 'vlim te bubo najvise na svetu, najbolji smo u duetu, lupi me po dupetu, hehge'),
(2, 'asdasd', 'asdasd', 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(50) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_full_name`, `user_email`, `user_username`, `user_password`, `profile_picture`) VALUES
(1, 'Kristina Misic', 'kika@gmail.com', 'kika', '$2y$10$sjdEmOp27GxMwghXJTt7IOWRU2XSQI/Fx3dEqb7IiapDu3QlIYJFy', ''),
(2, 'Nenad Misic', 'nenad@gmail.com', 'nenad', '$2y$10$h.1qrEC05D35W7zYKL4zAuAba9maZrXpi0iOYUFRWCSq9LcQGkFha', ''),
(3, 'Petar Petrovic', 'petar@gmail.com', 'petar', '$2y$10$25I3DCz23DbQH9beJHKJhe09Xc7yKWfmmgyuZyCRWRxC9U6vA8xSG', ''),
(4, 'Mladen Trickovic', 'mladen@gmail.com', 'trle', '$2y$10$M.B6.bFxjVYoP55Kn3jRA.xAH4cDd9DjKFjI0wPpi3QSsYzMkC07m', 'uploads/Photo_1.jpg'),
(5, 'Aleksandra Misic', 'saska@gmail.com', 'saska13', '$2y$10$u9uGPAb9YImaLY4AGMH0weieZMaM2oKRHGIyGToSCz5GjwRlKubNS', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
