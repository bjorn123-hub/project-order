-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 05:36 AM
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
-- Database: `ordering system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `delivery_date` datetime(6) NOT NULL,
  `delivery_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order items`
--

CREATE TABLE `order items` (
  `order_item_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `stock_quantity` int(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `sizes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `stock_quantity`, `category`, `sizes`) VALUES
(1, 'Classic Nutella Croffle', 99, 50, 'Croffle', 'Regular'),
(2, 'Classic Chocolate Croffle', 99, 50, 'Croffle', 'Regular'),
(3, 'Classic Biscoff', 99, 50, 'Croffle', 'Regular'),
(4, 'Cookies and Cream Croffle', 129, 30, 'Croffle', 'Regular'),
(5, 'Whipped Matcha Almond', 139, 30, 'Croffle', 'Regular'),
(6, 'Ham & Cheese', 129, 40, 'Croffle', ''),
(7, 'Nutella Alcupone Croffle', 129, 40, 'Croffle', ''),
(8, 'Biscoff Supreme Croffle ', 149, 50, 'Croffle', ''),
(9, 'S\'mores', 139, 40, 'Croffle', ''),
(10, 'Strawberry', 99, 50, 'Iced Non-Coffee', '16oz'),
(11, 'Cookies & Cream', 99, 50, 'Iced Non-Coffee', '16oz'),
(12, 'Chocolate', 99, 30, 'Iced Non-Coffee', '16oz'),
(13, 'Mango', 99, 40, 'Iced Non-Coffee', '160z'),
(14, 'Vanilla', 99, 50, 'Iced Non-Coffee', '16oz'),
(15, 'Bacon Carbonara', 139, 40, 'Pasta', ''),
(16, 'Shrimp Pasta', 149, 30, 'Pasta', ''),
(17, 'Spaghetti', 139, 20, 'Pasta', ''),
(18, 'Egg Burger', 49, 30, 'Buy 1 Take 1', ''),
(19, 'Regular Burger', 49, 30, 'Buy 1 Take 1', ''),
(20, 'Regular Burger with Egg', 69, 20, 'Buy 1 Take 1', ''),
(21, 'Cheesy Burger', 59, 20, 'Buy 1 Take 1', ''),
(22, 'Cheesy Burger with Egg', 79, 20, 'Buy 1 Take 1', ''),
(23, 'Double Patty Burger', 89, 30, 'Buy 1 Take 1', ''),
(24, 'Overload V1', 109, 30, 'Buy 1 Take 1', ''),
(25, 'Overload V2', 119, 30, 'Buy 1 Take 1', ''),
(26, 'Apple Green Soda', 69, 20, 'Refreshers', ''),
(27, 'Strawberry Soda', 69, 20, 'Refreshers', ''),
(28, 'Blue Lemonade Soda', 69, 30, 'Refreshers', ''),
(29, 'Lychee Soda', 69, 30, 'Refreshers', ''),
(30, 'Corned Beef', 99, 30, 'Rice Meals', ''),
(31, 'Shanghai', 99, 30, 'Rice Meals', ''),
(32, 'Spam', 99, 40, 'Rice Meals', ''),
(33, 'Bacon', 99, 25, 'Rice Meals', ''),
(34, 'Bangus', 69, 40, 'Rice Meals', ''),
(35, 'Longganisa', 99, 30, 'Rice Meals', ''),
(36, 'Chicken Tenders', 129, 20, 'Rice Meals', ''),
(37, 'Burger Steak', 79, 30, 'Rice Meals', ''),
(38, 'Chicken Sisig', 99, 20, 'Rice Meals', ''),
(39, 'Buttered Shrimp', 149, 30, 'Rice Meals', ''),
(40, 'Buffalo Chicken', 129, 10, 'Rice Meals', ''),
(41, 'Plain Chicken', 99, 10, 'Rice Meals', ''),
(42, 'Fries', 35, 30, 'Snacks', 'Small'),
(43, 'Fries', 70, 30, 'Snacks', 'Large'),
(44, 'Pancit Canton', 35, 20, 'Snacks', 'Small'),
(45, 'Pancit Canton', 50, 30, 'Snacks', 'Large'),
(46, 'Toasted Bread', 49, 65, 'Snacks', 'Small'),
(47, 'Toasted Bread', 75, 30, 'Snacks', 'Large'),
(48, 'Fried Siomai', 20, 30, 'Snacks', 'Small'),
(49, 'Fried Siomai', 25, 30, 'Snacks', 'Large'),
(50, 'Hotdog Buns', 49, 20, 'Snacks', 'Small'),
(51, 'Hotdog Buns', 99, 30, 'Snacks', 'Large'),
(52, 'Burger + Fries Combo', 99, 20, 'Snacks', ''),
(53, 'Mango Float', 99, 30, 'Snacks', '2pcs'),
(54, 'Nachos', 110, 30, 'Platter-Bilao', 'Solo'),
(55, 'Nachos', 160, 20, 'Platter-Bilao', 'Group'),
(56, 'Bilao A.', 299, 20, 'Platter-Bilao', 'Solo'),
(57, 'Bilao A.', 399, 20, 'Platter-Bilao', 'Group'),
(58, 'Bilao B.', 299, 20, 'Platter-Bilao', 'Solo'),
(59, 'Bilao B.', 399, 20, 'Platter-Bilao', 'Group'),
(60, 'Spanish Latte', 59, 30, 'Coffee Cold Brew', '12oz'),
(61, 'Spanish Latte', 79, 20, 'Coffee Cold Brew ', '16oz'),
(62, 'Caramel Macchiato', 69, 20, 'Coffee Cold Brew', '12oz'),
(63, 'Caramel Macchiato', 89, 30, 'Coffee Cold Brew', '16oz'),
(64, 'Salted Caramel', 69, 30, 'Coffee Cold Brew', '12oz'),
(65, 'Salted Caramel', 89, 20, 'Coffee Cold Brew', '16oz'),
(66, 'Americano', 49, 30, 'Coffee Cold Brew', '12oz'),
(67, 'Americano', 69, 20, 'Coffee Cold Brew', '16oz'),
(68, 'Tempura', 20, 30, 'Streetfood', 'Small'),
(69, 'Tempura', 50, 30, 'Streetfood', 'Large'),
(70, 'Fishball', 20, 30, 'Streetfood', 'Small'),
(71, 'Fishball', 50, 30, 'Streetfood', 'Large');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `order items`
--
ALTER TABLE `order items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order items`
--
ALTER TABLE `order items`
  MODIFY `order_item_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
