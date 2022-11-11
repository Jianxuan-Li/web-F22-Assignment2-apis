-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Nov 11, 2022 at 11:06 PM
-- Server version: 10.6.10-MariaDB-1:10.6.10+maria~ubu2004
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(3) NOT NULL DEFAULT 0,
  `bill_no` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `status`, `bill_no`, `price`) VALUES
(1, 2, 2, 4, '2022-10-27 00:02:33', 0, 1234, 66),
(2, 2, 1, 4, '2022-10-27 00:03:46', 0, 1234, 44),
(3, 1, 1, 1, '2022-10-27 00:24:06', 0, 203269, 1),
(4, 2, 1, 1, '2022-10-27 00:24:44', 0, 130206, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `pricing` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `pricing`, `shipping_cost`, `created_at`) VALUES
(1, 'TRYING TO UPDATE 1', '', '', '0.00', '0.00', '2022-10-18 15:38:03'),
(2, 'Product 1', '', '', '0.00', '0.00', '2022-10-20 14:25:23'),
(6, 'Product 2', 'This is a product looks very good.', '', '10.20', '15.00', '2022-10-26 20:54:36'),
(7, 'Teddy bear', 'A very good design teddy bear for you. Cheap and better than ever.', '', '99.99', '14.99', '2022-10-26 20:58:55'),
(8, 'Teddy bear', 'A very good design teddy bear for you. Cheap and better than ever.', 'data:image/jpeg;base64,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', '99.99', '14.99', '2022-11-11 23:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `shipping_address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_prod_id` (`product_id`),
  ADD KEY `fk_order_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
