-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity_of_product` int(11) NOT NULL,
  `total_item_sold` int(11) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `unit_price`, `quantity_of_product`, `total_item_sold`, `reorder_level`, `supplier_name`, `supplier_contact`, `expiration_date`, `date_added`) VALUES
(1, 'Pancit Canton Lucky Me (Sweet & Spicy)', 'Noodles', 20.00, 140, 60, 150, 'Jolina Cruz', '09078472863', '2026-01-22', '2024-12-20 02:58:49'),
(2, 'Cup Noodles 40g Lucky Me (Spicy Bulalo)', 'Noodles', 20.00, 120, 30, 100, 'Jolina Cruz', '09078472863', '2028-01-20', '2024-12-12 01:50:25'),
(3, 'Cup Noodles 40g Lucky Me (Chicken Sotanghon)', 'Noodles', 25.00, 120, 60, 150, 'Jolina Cruz', '09078472863', '2028-01-23', '2024-12-12 01:50:41'),
(4, 'Cup Noodles 70g Lucky Me (La Paz Batchoy)', 'Noodles', 30.00, 120, 90, 150, 'Jolina Cruz', '09078472863', '2028-01-22', '2024-12-12 01:51:22'),
(5, 'Cup Noodles 70g Lucky Me (Chicken Mami)', 'Noodles', 30.00, 120, 90, 150, 'Jolina Cruz', '09078472863', '2028-04-20', '2024-12-12 01:56:57'),
(6, 'Instant Mami Payless (Chicken)', 'Noodles', 12.00, 140, 80, 100, 'Jolina Cruz', '09078472863', '2028-01-20', '2024-12-12 02:05:48'),
(7, 'Wilkins 4L', 'Drinks', 70.00, 90, 60, 200, 'Jolina Cruz', '09078472863', '2026-01-20', '2024-12-12 04:13:22'),
(8, 'Wilkins 6L', 'Drinks', 90.00, 90, 60, 200, 'Jolina Cruz', '09078472863', '2028-01-20', '2024-12-12 04:14:25'),
(9, 'JR. Juice (Apple)', 'Drinks', 12.00, 11, 141, 200, 'Jolina Cruz', '09078472863', '2025-01-20', '2024-12-12 02:02:58'),
(10, 'JR. Juice (Orange)', 'Drinks', 12.00, 13, 145, 200, 'Jolina Cruz', '09078472863', '2026-01-20', '2024-12-12 02:03:10'),
(11, 'Milo 22g', 'Chocolate Drinks', 12.00, 8, 145, 200, 'Manuel Reyes', '09043567245', '2026-01-22', '2024-12-20 03:02:46'),
(12, 'Ovaltine 20g', 'Chocolate Drinks', 14.00, 12, 142, 200, 'Manuel Reyes', '09043567245', '2025-01-20', '2024-12-13 20:23:57'),
(13, 'Swiss Miss Hot Chocolate 28g', 'Chocolate Drinks', 16.00, 10, 140, 200, 'Manuel Reyes', '09043567245', '2026-01-20', '2024-12-11 22:32:26'),
(14, 'Chocolait Chocobot 180ml', 'Chocolate Drinks', 25.00, 30, 120, 200, 'Manuel Reyes', '09043567245', '2026-01-29', '2024-12-11 22:33:14'),
(15, 'Magnolia Chocolait 200ml', 'Chocolate Drinks', 28.00, 10, 140, 200, 'Manuel Reyes', '09043567245', '2025-02-22', '2024-12-11 22:36:02'),
(16, 'Nestle Chuckie 150ml ', 'Chocolate Drinks', 24.00, 13, 141, 200, 'Manuel Reyes', '09043567245', '2025-01-20', '2024-12-12 01:54:08'),
(17, 'Hersheys Chocolate Milk 200ml', 'Chocolate Drinks', 34.00, 12, 141, 200, 'Manuel Reyes', '09043567245', '2026-01-20', '2024-12-12 01:53:40'),
(18, 'Goya Choco Drink 190ml', 'Chocolate Drinks', 25.00, 140, 40, 100, 'Manuel Reyes', '09043567245', '2026-01-20', '2024-12-12 01:52:02'),
(19, 'Coca Cola 330ml', 'Soft Drinks', 21.00, 10, 148, 200, 'Jaymark Reyes', '09098989786', '2026-01-22', '2024-12-12 01:52:25'),
(20, 'Pepsi 330ml', 'Soft Drinks', 21.00, 5, 145, 200, 'Jaymark Reyes', '09098989786', '2026-01-04', '2024-12-11 23:05:03'),
(21, 'Sprite 330ml ', 'Soft Drinks', 21.00, 10, 144, 200, 'Jaymark Reyes', '09098989786', '2026-01-20', '2024-12-12 01:53:15'),
(22, 'Royal Tru Orange 330ml', 'Soft Drinks', 21.00, 10, 144, 200, 'Jaymark Reyes', '09098989786', '2026-01-20', '2024-12-12 01:52:58'),
(23, 'Mountain Dew 330ml', 'Soft Drinks', 21.00, 10, 140, 200, 'Jaymark Reyes', '09098989786', '2026-04-20', '2024-12-11 23:10:29'),
(24, '7 UP 330ml', 'Soft Drinks', 21.00, 140, 10, 100, 'Jaymark Reyes', '09098989786', '2025-06-20', '2024-12-11 23:11:19'),
(25, 'Mirinda 330ml', 'Soft Drinks', 21.00, 140, 10, 100, 'Jaymark Reyes', '09098989786', '2026-05-20', '2024-12-11 23:11:57'),
(26, 'Bear Brand Powdered Milk Drink 33g', 'Powdered Milk', 12.00, 15, 135, 200, 'Jona Bonifacio', '09762423231', '2026-05-20', '2024-12-11 23:16:17'),
(27, 'Nido Fortified Milk Powder 160g', 'Powdered Milk', 55.00, 135, 15, 100, 'Jona Bonifacio', '09762423231', '2026-01-20', '2024-12-11 23:22:21'),
(28, 'Birch Tree Full Cream Milk Powder 80g', 'Powdered Milk', 30.00, 5, 145, 200, 'Jona Bonifacio', '09762423231', '2026-05-12', '2024-12-11 23:23:37'),
(29, 'Anchor Full Cream Milk Powder 150g', 'Powdered Milk', 45.00, 145, 5, 100, 'Jona Bonifacio', '09762423231', '2025-06-20', '2024-12-11 23:24:33'),
(30, 'Alaska Powdered Milk 150g', 'Powdered Milk', 40.00, 10, 145, 100, 'Jona Bonifacio', '09762423231', '2026-03-20', '2024-12-12 01:10:10'),
(31, 'Alaska Evaporated Milk 370ml', 'Evaporated Milk', 26.00, 10, 145, 200, 'Mark Cruz', '09652341234', '2025-06-20', '2024-12-12 01:09:50'),
(32, 'Carnation Evaporated Milk', 'Evaporated Milk', 32.00, 30, 120, 200, 'Cris Jan', '09098787654', '2026-10-20', '2024-12-11 23:30:44'),
(33, 'Angel Evaporated Milk 410ml', 'Evaporated Milk', 28.00, 30, 120, 200, 'Cris Jan', '09098787654', '2026-03-20', '2024-12-11 23:31:48'),
(34, 'Cow Bell Evaporated Milk 370ml', 'Evaporated Milk', 29.00, 30, 120, 200, 'Cris Jan ', '09098787654', '2026-01-20', '2024-12-11 23:33:48'),
(35, 'Alaska Condensed Milk 168ml', 'Condensed Milk', 40.00, 50, 100, 200, 'Raymart Reyes', '09123142536', '2026-04-20', '2024-12-11 23:37:36'),
(36, 'Carnation Condensed Milk 330ml', 'Condensed Milk', 46.00, 50, 100, 200, 'Raymart Reyes', '09123142536', '2025-04-20', '2024-12-11 23:38:37'),
(37, 'Angel Condensed Milk 300ml', 'Condensed Milk', 40.00, 50, 100, 200, 'Raymart Reyes', '09123142536', '0025-03-20', '2024-12-11 23:40:27'),
(38, 'Milkmaid Condensed Milk 300ml', 'Condensed Milk', 70.00, 50, 100, 200, 'Raymart Reyes', '09123142536', '2025-06-20', '2024-12-11 23:41:26'),
(39, 'Nestle All Purpose Cream 250ml', 'All Purpose Cream', 60.00, 120, 30, 100, 'Joana Dizon', '09121234345', '2026-04-23', '2024-12-11 23:43:33'),
(40, 'Alaska Cream All Purpose Cream 250ml', 'All Purpose Cream', 55.00, 120, 30, 100, 'Joana Dizon', '09121234345', '2026-02-20', '2024-12-11 23:45:35'),
(41, 'Magnolia All Purpose Cream 250ml ', 'All Purpose Cream', 54.00, 120, 30, 100, 'Joana Dizon', '09121234345', '2026-01-20', '2024-12-11 23:46:33'),
(42, 'Angel Kremdensada 410ml', 'All Purpose Cream', 52.00, 120, 30, 100, 'Joana Dizon', '09121234345', '2026-01-20', '2024-12-11 23:47:44'),
(43, 'Nestle Coffee Mate Creamer 170g', 'Creamer', 47.00, 120, 30, 100, 'Joana Dizon', '09121234345', '2026-01-22', '2024-12-11 23:52:11'),
(44, 'Alaska Sweetened Creamer 390g', 'Creamer', 45.00, 140, 10, 100, 'Joana Dizon', '09121234345', '2026-05-20', '2024-12-11 23:54:40'),
(45, 'Krem Top Coffee Creamer', 'Creamer', 45.00, 152, 10, 100, 'Joana Dizon', '09121234345', '2026-03-31', '2024-12-12 02:12:45'),
(46, 'Nescafe Classic Coffee 227g', 'Coffee', 55.00, 20, 130, 200, 'Joana Dizon', '09121234345', '2025-02-02', '2024-12-11 23:58:10'),
(47, 'Great Taste Coffee 227g', 'Coffee', 52.00, 20, 130, 200, 'Joana Dizon', '09121234345', '2023-02-20', '2024-12-11 23:59:16'),
(48, 'Cocoa Powder 250g', 'Powdered Mixes', 35.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2026-03-20', '2024-12-12 00:13:50'),
(49, 'Ube Shake Powder ', 'Powdered Mixes', 195.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2026-09-12', '2024-12-12 00:14:43'),
(50, 'Choco Shake Powder ', 'Powdered Mixes', 195.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2026-01-20', '2024-12-12 00:15:40'),
(51, 'Tang Sachet (Strawberry)', 'Powdered Mixes', 25.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2025-01-20', '2024-12-12 00:16:29'),
(52, 'Tang Sachet (Mango)', 'Powdered Mixes', 25.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2025-01-20', '2024-12-12 00:17:05'),
(53, 'Tang Sachet (Pineapple)', 'Powdered Mixes', 25.00, 50, 100, 150, 'Joana Cruz', '09091236543', '2026-02-20', '2024-12-12 00:17:31'),
(54, 'Piattos 40g', 'Chips', 18.00, 10, 148, 200, 'Angelo Angeles', '09123432342', '2025-01-20', '2024-12-12 01:08:50'),
(55, 'Piattos 85g', 'Chips', 30.00, 10, 145, 200, 'Angelo Angeles', '09123432342', '2026-01-20', '2024-12-12 01:09:23'),
(56, 'V Cut 40g', 'Chips', 16.00, 140, 50, 100, 'Angelo Angeles', '09123432342', '2025-03-20', '2024-12-12 01:08:33'),
(57, 'Nova 40g', 'Chips', 16.00, 140, 150, 100, 'Angelo Angeles', '09123432342', '2027-01-20', '2024-12-12 01:08:16'),
(58, 'Nova 85g', 'Chips', 30.00, 12, 148, 150, 'Angelo Angeles', '09123432342', '2027-01-02', '2024-12-12 02:03:57'),
(59, 'Pic A 85g', 'Chips', 35.00, 10, 145, 150, 'Angelo Angeles', '09123432342', '2025-06-02', '2024-12-12 01:09:06'),
(60, 'Roller Coaster 90g', 'Chips', 23.00, 15, 135, 150, 'Angelo Angeles', '09123432342', '2026-01-20', '2024-12-12 00:37:11'),
(61, 'Safeguard Soap 60g', 'Body Soap', 20.00, 50, 100, 100, 'Jonas Mila', '09654534543', '2025-01-22', '2024-12-18 03:47:37'),
(62, 'Creamsilk Standout Straight 12ml', 'Conditioner', 9.00, 20, 130, 100, 'Jonas Mila', '09654534543', '2025-09-20', '2024-12-18 03:51:32'),
(63, 'Sunsilk Strong and Long 15ml ', 'Shampoo', 9.00, 20, 130, 100, 'Jonas Mila', '09654534543', '2025-02-20', '2024-12-18 03:52:53'),
(64, 'Cereal', 'Snacks', 50.00, 25, 30, 100, 'Juan Cruz', '09294611639', '2025-01-20', '2024-12-20 02:51:08'),
(65, '', '', 0.00, 0, 0, 0, '', '', '0000-00-00', '2024-12-20 03:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Juan Cruz', '$2y$10$/7xA5m6Y7fE9AGvZkRtanemNYI7E5bgv7cqscpLhXXwtyRDQAipuu'),
(19, 'Rolando Buenviaje', '$2y$10$QRhqHv9M1vlWcDdMy.T1qOY6156JHAzJgM0aZKICfwAUi7jNVdBFK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
