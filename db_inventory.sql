-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2026 at 02:40 PM
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
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(2, 'Peralatan kantor', 'Alat tulis kantor', '2026-10-12 07:16:17'),
(3, 'Furniture', 'Peralatan meja dan ruangan', '2026-10-12 07:16:17'),
(4, 'Aksesoris Komputer', 'Perangkat tambahan komputer', '2026-10-12 07:16:17'),
(9, 'ATK', 'Alat tulis kantor', '2026-10-14 13:55:21'),
(10, 'Perlengkapan kerja', 'alat', '2026-10-14 13:55:35'),
(11, 'elektronik service', 'memperbaiki alat', '2026-10-14 13:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit` varchar(20) NOT NULL DEFAULT 'unit',
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `entry_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `name`, `category_id`, `quantity`, `unit`, `price`, `entry_date`, `description`, `created_at`) VALUES
(4, 'BRG004', 'Keyboard Mechanical', 2, 115, 'unit', 450000.00, '2026-10-02', 'Keyboard mechanical RGB', '2026-10-12 07:19:21'),
(5, 'BRG005', 'Monitor LED 24 Inch', 3, 25, 'unit', 1800000.00, '2026-10-03', 'Monitor LED Full HD', '2026-10-12 07:19:21'),
(6, 'BRG006', 'Printer Epson L3210', 3, 5, 'unit', 2300000.00, '2026-10-03', 'Printer multifungsi', '2026-10-12 07:19:21'),
(7, 'BRG007', 'Kertas A4 80 GSM', 4, 50, 'rim', 60000.00, '2026-10-04', 'Kertas printer ukuran A4', '2026-10-12 07:19:21'),
(8, 'BRG008', 'Tinta Printer Hitam', 4, 15, 'botol', 85000.00, '2026-10-04', 'Tinta printer warna hitam', '2026-10-12 07:19:21'),
(9, 'BRG009', 'Flashdisk 64GB', 2, 20, 'unit', 120000.00, '2026-10-05', 'Media penyimpanan portable', '2026-10-12 07:19:21'),
(10, 'BRG010', 'Harddisk External 1TB', 2, 10, 'unit', 850000.00, '2026-10-05', 'Penyimpanan data eksternal', '2026-10-12 07:19:21'),
(11, 'BRG011', 'Kursi Kantor', 3, 27, 'unit', 900000.00, '2026-10-06', 'Kursi kerja kantor', '2026-10-12 07:19:21'),
(12, 'BRG012', 'Meja Kerja', 3, 10, 'unit', 1500000.00, '2026-10-06', 'Meja kerja kantor', '2026-10-12 07:19:21'),
(14, 'ITM0001', 'charger', 2, 6, 'unit', 399998.00, '2026-10-14', 'cas laptop', '2026-10-14 14:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('IN','OUT') NOT NULL,
  `quantity` int(11) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `item_id`, `user_id`, `type`, `quantity`, `notes`, `created_at`) VALUES
(30, 5, 1, 'IN', 13, 'b', '2026-10-15 08:04:39'),
(31, 4, 1, 'IN', 13, 'b', '2026-10-15 08:05:01'),
(32, 4, 1, 'OUT', 15, 'b', '2026-10-15 08:05:16'),
(33, 6, 1, 'OUT', 2, 'b', '2026-10-15 08:05:45'),
(34, 8, 1, 'OUT', 15, 'b', '2026-10-15 08:06:06'),
(35, 11, 1, 'IN', 12, 'b', '2026-10-15 08:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `role` enum('admin','staff','manager') DEFAULT 'staff',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `role`, `created_at`) VALUES
(1, 'Rafi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llgN3qkLqZK1hZx7s9WqG', 'Muhammad Rafi', 'admin', '2026-10-12 07:13:45'),
(3, 'staff1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llgN3qkLqZK1hZx7s9WqG', 'Staff Gudang 1', 'staff', '2026-10-12 07:15:21'),
(4, 'manager', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llgN3qkLqZK1hZx7s9WqG', 'Manager Inventory', 'admin', '2026-10-12 07:15:21'),
(6, 'admin', '$2y$12$kwnN4SA6t1wMjtjl7wx.3OLl1l8zNj7CbTVcQiq7CZKauAQoeou/K', 'administrator', 'admin', '2026-10-15 09:57:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_items_category` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transactions_item` (`item_id`),
  ADD KEY `fk_transactions_user` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transactions_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_transactions_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
