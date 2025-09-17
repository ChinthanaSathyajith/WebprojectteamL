-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql102.infinityfree.com
-- Generation Time: Sep 17, 2025 at 10:46 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39955723_webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `full_name`, `email`, `phone`, `room_type`, `check_in`, `check_out`, `created_at`) VALUES
(1, 3, 'admin', 'admin@gmail.com', '123', 'Double', '2025-09-19', '2025-09-20', '2025-09-17 14:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `title`, `first_name`, `last_name`, `email`, `message`, `created_at`) VALUES
(1, 'Mr.', 'amara', 'kamal', 'amra@gmail.com', 'good ', '2025-09-17 02:43:14'),
(2, 'Mr.', 'kamal', 'kamal', 'kamal@gmail.com', 'Iâ€™d like to check availability for a double room from Oct 10 to Oct 12, 2025. Could you confirm the rate and whether breakfast is included?', '2025-09-17 04:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedback_text`, `created_at`) VALUES
(1, 3, 'good service!!!', '2025-09-17 14:10:45'),
(4, 5, 'I had a wonderful stay at this hotel! The staff were incredibly welcoming and always ready to help with a smile. The rooms were clean, comfortable, and well-maintained, making it easy to relax. The food was delicious with plenty of variety, and the atmosphere throughout the hotel felt warm and inviting. The location was also perfect, close to everything I needed. Overall, it was an excellent experience, and I would definitely recommend this hotel to anyone looking for a comfortable and enjoyable stay.', '2025-09-17 14:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'chinthana', '123', 'chinthana@gmail.com', '$2y$10$68ne1nBo4kd6TeXiHPa8IO/xVObX4QVk34KdnlNVMy3c4YuAuTrgS', '2025-09-17 10:24:51', 'admin'),
(2, 'Your Name', '0771234567', 'your@email.com', 'yourpassword', '2025-09-17 10:32:21', 'user'),
(3, 'admin', '123', 'admin@gmail.com', '$2y$10$z6IWBUTUk5aKrYdSkiQJauQpDCDkjL0h0luoLrRvaUtM0GHo2YQi.', '2025-09-17 10:45:56', 'admin'),
(4, 'test', '123123', 'test@gmail.com', '$2y$10$K7YjejBxSKmCiirjrygL5uf.wpaNlZdDKLPbg9R8dM7a6m5dGJGp.', '2025-09-17 10:54:07', 'user'),
(5, 'parami', '123', 'parami@gmail.com', '$2y$10$Tfkmce8sVXMWcjSqFFw.IOBVEvrAQHCTip7/f4NpclN87GchZyfMW', '2025-09-17 10:56:23', 'admin'),
(6, 'new', '321', 'new@gmail.com', '$2y$10$cL5EMyRo6rGSPkVdvYRoe.Lickpzu0fdZ6JsVdBNrKx5HqIEZoYRO', '2025-09-17 13:42:39', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
