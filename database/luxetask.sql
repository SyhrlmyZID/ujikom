-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 06:28 AM
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
-- Database: `luxetask`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `status` enum('tertunda','selesai') NOT NULL DEFAULT 'tertunda',
  `priority` enum('penting','biasa') NOT NULL DEFAULT 'biasa',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `user_id`, `task_name`, `deadline`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(115, 33, 'Merapihkan code project website todolist', '2025-02-13', 'selesai', 'penting', '2025-02-12 05:15:33', '2025-02-12 05:17:20'),
(116, 33, 'tes1', 'Tidak ada tanggal pasti', 'selesai', 'biasa', '2025-02-12 05:15:52', '2025-02-12 05:17:22'),
(117, 33, 'tes1', 'Tidak ada tanggal pasti', 'selesai', 'biasa', '2025-02-12 05:15:54', '2025-02-12 05:17:27'),
(118, 33, 'tes1', 'Tidak ada tanggal pasti', 'selesai', 'biasa', '2025-02-12 05:15:56', '2025-02-12 05:17:29'),
(119, 33, 'tes1', 'Tidak ada tanggal pasti', 'selesai', 'biasa', '2025-02-12 05:15:58', '2025-02-12 05:17:44'),
(120, 33, 'tes1', 'Tidak ada tanggal pasti', 'tertunda', 'biasa', '2025-02-12 05:16:05', '2025-02-12 05:16:05'),
(121, 33, 'tes1', 'Tidak ada tanggal pasti', 'tertunda', 'biasa', '2025-02-12 05:16:26', '2025-02-12 05:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pengguna') NOT NULL DEFAULT 'pengguna',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$x0erqCjk.TtVKAPIHrTFNe.AXQLoQY8wjSF16sQ.iQTugcjOa6uHu', 'admin', '2025-02-01 02:22:48'),
(33, 'SyhrlmyZID', 'syhrlmyz.id@gmail.com', '$2y$10$AHXZ22EgBm4Oirgm6pAehep8s48HvAovzgatH7vNTtftLR7H7.gqO', 'pengguna', '2025-02-12 05:12:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `tasks_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
