-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 07:10 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`, `mobile`) VALUES
(2, 'Admin', 'sayakmukherjee2010@gmail.com', 'password1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `bill_date`, `amount`) VALUES
(1, 1, '2017-05-05', 30),
(2, 2, '2017-05-05', 30),
(3, 2, '2017-05-05', 30),
(4, 3, '2017-05-05', 60),
(5, 4, '2017-05-05', 30),
(6, 5, '2017-05-07', 40);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `isInCart` tinyint(1) NOT NULL,
  `bill_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `isInCart`, `bill_id`) VALUES
(2, 1, 1, 0, 1),
(4, 1, 2, 0, 2),
(5, 2, 2, 0, 3),
(6, 1, 3, 0, 4),
(8, 2, 3, 0, 4),
(9, 1, 4, 0, 5),
(11, 10, 3, 1, NULL),
(12, 10, 5, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Street'),
(2, 'Nature'),
(3, 'Monochrome');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `photo_credit` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_description`, `product_keyword`, `photo_credit`) VALUES
(1, 1, 'Street Painter', 30, 'Street painter painting souvenir on the street of manali', 'manali street painting ', 'Sayak Mukherjee'),
(2, 2, 'Sunset on the river', 30, 'The beloved boat sails amidst the twilight. Shot taken at Kuthi ghat, Baranagar.', 'boat baranagar twilight nature', 'Akash Bhattacharya'),
(5, 3, 'Save Water Save Life', 50, 'Monochrome Picture says a thousand words about importance of saving water.', 'Save Water Save Life', 'Akash Bhattacharya'),
(6, 3, 'The Voyage', 40, 'In frame: Bally bridge, one of the oldest bridges of Calcutta.', 'Bally bridge calcutta kolkata monochrome heritage bally', 'Akash Bhattacharya'),
(7, 3, 'Cloudscape', 30, 'Beauty of the clouds in back and white.', 'Cloud monochrome', 'Akash Bhattacharya'),
(8, 1, 'Calcutta', 50, 'Calcutta\'s vintage hand pulled rickshaws. ', 'Calcutta Street Rickshaw', 'Akash Bhattacharya'),
(9, 2, 'Natural Beauty', 60, 'Actions happening in a single frame with the vibrant flavor of silhouette.', 'Nature Beauty ', 'Akash Bhattacharya'),
(10, 1, 'Yellow in my frame', 40, 'Calcutta\'s very own yellow taxis captured in a very uncanny way.', 'Calcutta Street Yellow Taxi Kolkata', 'Akash Bhattacharya'),
(12, 2, 'The divine beauty of Araku, Andhra Pradesh', 50, 'Cloudscape and landscape combining to make the frame delightful.', 'Araku Nature landscape clouds', 'Akash Bhattacharya');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secretAnswer` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `secretAnswer`) VALUES
(1, 'Sayak', 'Mukherjee', 'sayakmukherjee2010@gmail.com', 'bdc87b9c894da5168059e00ebffb9077', '9836866101', 'Kolkata'),
(2, 'Rohit', 'Sadhukhan', 'saro2811@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9007521273', 'Kolkata'),
(3, 'Rohit', 'Sadhukhan', 'test@gmail.com', 'bdc87b9c894da5168059e00ebffb9077', '1234567890', 'KOLKATA'),
(4, 'Anirban', 'Nag Chowdhury', 'anirban.nc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7407652997', 'Kharagpur'),
(5, 'Resham ', 'Das', 'mr.reshamdas@gmail.com', 'b34bb64510e9f2cb82198cba7373b2b6', '9433307550', 'Kolkata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat` (`product_cat`);

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
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
