-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 10:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `foto` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `description`, `location`, `price_per_hour`, `foto`, `created_at`) VALUES
(14, 'Lapangan 1', 'Lapangan Bokar', 'Gedung A', 150000.00, 0x6c6170616e67616e315f342e706e67, '2024-06-15 09:39:44'),
(16, 'Lapangan 2', 'Lapangan Bokar Ke 2', 'Gedung B', 300000.00, 0x4c6170325f322e706e67, '2024-06-17 03:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `login_time`, `logout_time`) VALUES
(1, 12, '2024-06-13 01:54:01', '2024-06-13 01:57:11'),
(2, 12, '2024-06-13 01:54:25', '2024-06-13 01:57:11'),
(3, 12, '2024-06-13 01:57:18', '2024-06-14 22:46:52'),
(4, 12, '2024-06-13 02:15:01', '2024-06-14 22:46:52'),
(5, 12, '2024-06-14 22:23:09', '2024-06-14 22:46:52'),
(7, 12, '2024-06-14 22:47:38', '2024-06-15 07:32:24'),
(8, 12, '2024-06-15 04:45:47', '2024-06-15 07:32:24'),
(9, 12, '2024-06-15 04:57:55', '2024-06-15 07:32:24'),
(10, 12, '2024-06-15 05:07:39', '2024-06-15 07:32:24'),
(11, 12, '2024-06-15 05:18:10', '2024-06-15 07:32:24'),
(12, 12, '2024-06-15 06:23:10', '2024-06-15 07:32:24'),
(13, 14, '2024-06-15 07:33:29', '2024-06-15 07:35:25'),
(14, 12, '2024-06-15 07:33:43', '2024-06-15 07:34:53'),
(15, 14, '2024-06-15 07:35:02', '2024-06-15 07:35:25'),
(16, 12, '2024-06-15 07:35:44', '2024-06-15 07:35:48'),
(17, 14, '2024-06-15 07:35:56', '2024-06-16 19:53:48'),
(18, 12, '2024-06-15 20:09:32', '2024-06-16 06:09:30'),
(19, 12, '2024-06-15 21:10:13', '2024-06-16 06:09:30'),
(20, 12, '2024-06-16 03:37:48', '2024-06-16 06:09:30'),
(21, 12, '2024-06-16 03:55:00', '2024-06-16 06:09:30'),
(22, 12, '2024-06-16 04:30:37', '2024-06-16 06:09:30'),
(23, 14, '2024-06-16 06:09:38', '2024-06-16 19:53:48'),
(24, 14, '2024-06-16 17:35:27', '2024-06-16 19:53:48'),
(25, 14, '2024-06-16 19:54:37', '2024-06-16 19:54:47'),
(26, 12, '2024-06-16 19:54:57', '2024-06-16 19:57:40'),
(27, 14, '2024-06-16 19:57:49', '2024-06-16 20:00:52'),
(28, 14, '2024-06-16 20:01:01', '2024-06-17 02:12:06'),
(29, 14, '2024-06-17 01:59:53', '2024-06-17 02:12:06'),
(30, 12, '2024-06-17 02:12:18', '2024-06-17 02:13:50'),
(31, 14, '2024-06-17 02:13:56', '2024-06-17 02:14:36'),
(32, 14, '2024-06-17 02:14:50', '2024-06-17 02:15:07'),
(33, 14, '2024-06-17 02:15:26', '2024-06-17 02:16:39'),
(34, 14, '2024-06-17 02:16:47', '2024-06-17 02:17:42'),
(35, 12, '2024-06-17 02:18:10', '2024-06-17 02:21:37'),
(36, 14, '2024-06-17 02:21:43', '2024-06-17 02:22:54'),
(37, 12, '2024-06-17 02:23:01', '2024-06-17 02:47:35'),
(38, 14, '2024-06-17 02:30:33', '2024-06-17 02:40:22'),
(39, 14, '2024-06-17 02:40:30', '2024-06-17 02:42:21'),
(40, 14, '2024-06-17 02:42:32', '2024-06-17 02:42:58'),
(41, 14, '2024-06-17 02:43:08', '2024-06-17 02:43:36'),
(42, 12, '2024-06-17 02:43:42', '2024-06-17 02:47:35'),
(43, 14, '2024-06-17 02:47:43', '2024-06-17 02:50:46'),
(44, 12, '2024-06-17 02:50:52', '2024-06-17 02:52:36'),
(45, 14, '2024-06-17 02:52:47', '2024-06-17 03:25:06'),
(46, 16, '2024-06-17 03:25:27', '2024-06-17 03:28:10'),
(47, 12, '2024-06-17 03:28:21', '2024-06-17 03:30:37'),
(48, 14, '2024-06-17 03:30:44', '2024-06-17 10:26:46'),
(49, 14, '2024-06-17 10:25:37', '2024-06-17 10:26:46'),
(50, 12, '2024-06-17 10:26:57', '2024-06-17 10:28:07'),
(51, 14, '2024-06-17 10:28:19', '2024-06-17 10:57:32'),
(52, 16, '2024-06-17 10:28:49', '2024-06-17 10:29:17'),
(53, 12, '2024-06-17 10:29:36', '2024-06-17 10:54:26'),
(54, 12, '2024-06-17 10:54:51', '2024-06-17 10:55:00'),
(55, 16, '2024-06-17 10:55:07', '2024-06-17 10:55:44'),
(56, 14, '2024-06-17 10:55:52', '2024-06-17 10:57:32'),
(57, 12, '2024-06-17 10:57:39', '2024-06-17 10:57:46'),
(58, 16, '2024-06-17 10:57:55', '2024-06-17 10:59:46'),
(59, 12, '2024-06-17 11:00:58', '2024-06-17 11:01:02'),
(60, 14, '2024-06-17 11:01:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `foto` mediumblob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `foto`, `created_at`) VALUES
(7, 14, 'Admim', '1', 'indrarajsyakingleo@gmail.com', '081247754308', 'jl.bhayangkarabaru dok 2 Atas', 0x313731383632323939365f39326339393335313633306164646163636463662e6a7067, '2024-06-15 16:36:50'),
(9, 12, 'User', '1', 'user1@gmail.com', '081247754308', 'Jl.BhayangkaraBaru Dok II Atas', 0x313731383632353039355f66366462373266656134303234666564623432652e6a7067, '2024-06-17 11:51:35'),
(10, 16, 'User', '2', 'indrarajsyakingleo@gmail.com', '081247754308', 'jkahdauwijbsx', 0x313731383632373135305f38313738376662323261343631333835303262332e6a7067, '2024-06-17 12:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `field_id`, `reservation_date`, `start_time`, `end_time`, `status`, `created_at`) VALUES
(3, 16, 14, '2024-06-19', '21:26:00', '12:26:00', 'confirmed', '2024-06-17 12:26:36'),
(4, 12, 16, '2024-06-18', '23:28:00', '12:30:00', 'cancelled', '2024-06-17 12:28:44'),
(5, 16, 14, '2024-06-18', '08:00:00', '10:00:00', 'cancelled', '2024-06-17 19:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrator','pelanggan') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(12, 'Rajsya', '$2y$10$coZIJNlu03Fr/9G9H/fhGeRISBXofFbhvKW8gx1FWz8dc9v0gwaoG', '', '2024-06-13 10:53:55'),
(14, 'indrex', '$2y$10$R5rw8XNNMzFdsyVNpEwjDuVt.U6DEuoy5T7E0mdwvZePLd5ANGnS6', 'administrator', '2024-06-15 16:33:19'),
(16, 'indra', '$2y$10$LpM8fNP.AQcjHIr4ZUi30.DCH5u6IziOU41tEyPB2dN8RaGRqQv0G', '', '2024-06-17 12:25:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
