-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(250) UNSIGNED NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(3, 'Rahul', 'rahul@gmail.com', '123456789'),
(5, 'Sayali', 'sayali@gmail.com', '1234'),
(7, 'Gauri', 'gauri@gmail.com', '525242'),
(11, 'Pankaj', 'pankaj', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(16, 'Pizza', 'Food_Category_336.jpg', 'Yes', 'Yes'),
(17, 'Burger', 'Food_Category_664.jpg', 'Yes', 'Yes'),
(18, 'Momos', 'Food_Category_176.jpg', 'Yes', 'Yes'),
(20, 'French Fries', 'Food_Category_276.jpg', 'Yes', 'Yes'),
(22, 'Panner Tikka', 'Food_Category_747.jpg', 'Yes', 'Yes'),
(23, 'Cold Drink', 'Food_Category_369.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(27, 'Momos', 'Veg Momos', 249.00, 'Food-Name-996.jpg', 18, 'Yes', 'Yes'),
(29, 'Pizza', 'Veg-Loaded', 149.00, 'Food-Name-113.jpg', 16, 'Yes', 'Yes'),
(30, 'Pizza', 'Chicken Loades Pizza WIth Chesse Added', 249.00, 'Food-Name-49.jpg', 16, 'Yes', 'Yes'),
(31, 'COCA--COLA', '1LT Bottel', 99.00, 'Food-Name-558.jpg', 23, 'Yes', 'Yes'),
(32, 'Fries', 'Pere Pere Fries', 159.00, 'Food-Name-563.jpg', 20, 'Yes', 'Yes'),
(33, 'Panner Tikka ', 'Panner Tika Free 50ml coco cola', 349.00, 'Food-Name-579.jpg', 22, 'Yes', 'Yes'),
(34, 'Veg-Burger', 'Cheese Loaded ', 149.00, 'Food-Name-289.jpg', 17, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Pizza', 249.00, 1, 249.00, '2024-02-06 09:30:45', 'Ordered', 'Jayesh Sharma', '8007071062', 'r@gmail.com', 'Nelco Society Nagpur'),
(2, 'Pizza', 249.00, 1, 249.00, '2024-02-06 09:39:02', 'Ordered', 'Sayali Patil', '8007071062', 'sayalipatil@gmail.com', 'Anand Nagar Nagpur'),
(3, 'COCA--COLA', 99.00, 12, 1188.00, '2024-02-06 09:40:20', 'On Delivery', 'Apeksha Sharma', '3423726099', 'sharmaapeksha6149@gmail.com', 'House No,184 Nelco Society Nagpur'),
(4, 'Panner Tikka ', 349.00, 6, 2094.00, '2024-02-06 09:42:18', 'Delivered', 'Pankaj Vishwakarma', '7972666716', 'pankaj@gmail.com', 'Ravi Nagar Nagpur'),
(5, 'Fries', 159.00, 5, 795.00, '2024-02-06 09:44:02', 'Ordered', 'Kundan Gosavi', '9527894191', 'kundan@gmail.com', 'Raju Nagar Nagpur'),
(6, 'Veg-Burger', 149.00, 5, 745.00, '2024-02-06 09:49:01', 'Cancelled', 'Harsh Patil', '985236445', 'harsh@gmail.com', 'Harsh Nagar Nagpur'),
(7, 'Pizza', 149.00, 5, 745.00, '2024-02-06 09:50:40', 'Ordered', 'Usha Sharma', '904523647', 'usha@gmail.com', 'Gandhi Chowk Nagpur'),
(8, 'Pizza', 149.00, 10, 1490.00, '2024-02-06 10:09:12', 'Ordered', 'Apeksha Sharma', '3423726099', 'sharmaapeksha6149@gmail.com', '184 nelco socity subhash nagar nagpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(250) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
