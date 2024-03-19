-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2020 at 11:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `email`, `created`) VALUES
(1, '6357104c2d860d1a88be5cf0d78bd66c', 'jdenosta03@gmail.com', '2020-08-23 01:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(99) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'AEGIS'),
(3, 'iJoy'),
(4, 'VGOD'),
(5, 'SMOK'),
(6, 'Revenger'),
(7, 'NOVO');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(99) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'MODS ONLY'),
(2, 'COIL PODS'),
(3, 'CHARGER'),
(4, 'PODS KIT'),
(5, 'ATOMIZER'),
(6, 'ACCESSORIES'),
(7, 'BATTERY'),
(8, 'COIL');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` varchar(99) NOT NULL,
  `product_brand` varchar(99) NOT NULL,
  `product_name` varchar(99) NOT NULL,
  `product_price` int(99) NOT NULL,
  `product_desc` varchar(999) NOT NULL,
  `product_image` varchar(99) NOT NULL,
  `product_keywords` varchar(99) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`product_id`, `product_cat`, `product_brand`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_qty`, `added_on`) VALUES
(1, '1', '2', 'AEGIS X', 1750, 'AEGIS X', 'AEGIS X.jpg', 'AEGIS X, AEGIS, AEGIS X MOD', 999, '2020-08-23 01:54:05'),
(2, '1', '2', 'AEGIS SOLO KIT', 1700, '<p>AEGIS SOLO KIT</p>', 'aegis solo kit.jpg', 'AEGIS SOLO KIT', 999, '2020-08-29 00:23:33'),
(3, '4', 'Select a Brand....', 'FRENZY KIT', 700, 'FRENZY KIT', 'FRENZY KIT.jpg', 'PODS, FRENZY, KIT,', 999, '2020-09-04 00:24:26'),
(4, '4', '2', 'AEGIS BOOST', 1400, 'AEGIS BOOST PODS KIT', 'AEGIS BOOST.jpg', 'AEGIS BOOST PODS KIT', 999, '2020-09-04 00:28:30'),
(5, '1', '3', 'IJOY AVENGER', 700, 'IJOY AVENGER MOD', 'IJOY AVENGER.jpg', 'IJOY AVENGER MOD ONLY', 999, '2020-09-04 00:31:10'),
(6, '1', '3', 'IJOY SHOGUN', 950, 'IJOY SHOGUN MODS ONLY', 'IJOY SHOGUN.jfif', 'IJOY SHOGUN MODS ONLY', 999, '2020-09-04 00:32:41'),
(7, '1', '4', 'VGOD PRO MECH 2', 300, 'VGOD PRO MECH 2', 'Vgod pro mech 2.jpg', 'VGOD PRO MECH 2 MODS ONLY', 999, '2020-09-04 01:05:03'),
(8, '4', '5', 'SMOK FETCH', 999, 'THIS IS SMOK FETCH MINI', 'SmokTech Fetch Mini.jpg', 'SMOK FETCH MINI PODS KIT', 999, '2020-09-04 01:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(10,2) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` text NOT NULL,
  `customer_email` varchar(99) NOT NULL,
  `customer_pass` varchar(99) NOT NULL,
  `customer_contact` varchar(99) NOT NULL,
  `customer_city` varchar(99) NOT NULL,
  `customer_address` varchar(99) NOT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_email` (`customer_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_city`, `customer_address`, `created_on`) VALUES
(1, 'Jay Denosta', 'jdenosta03@gmail.com', '6357104c2d860d1a88be5cf0d78bd66c', '09195186753', 'Manila', '1085 norma st, brgy 565 sampaloc mnla.', '2020-08-23 00:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

DROP TABLE IF EXISTS `users_items`;
CREATE TABLE IF NOT EXISTS `users_items` (
  `customer_id` varchar(99) NOT NULL,
  `item_id` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `item_qty` varchar(99) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`customer_id`, `item_id`, `status`, `item_qty`, `id`) VALUES
('1', '2', 'Added to cart', '1', 7),
('1', '1', 'Added to cart', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

DROP TABLE IF EXISTS `user_orders`;
CREATE TABLE IF NOT EXISTS `user_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `order_status` enum('PENDING','COMPLETED') NOT NULL,
  `order_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `customer_id`, `amount`, `name`, `email`, `contact`, `address`, `city`, `payment_type`, `order_status`, `order_at`) VALUES
(50, 1, 1750, 'Jay Denosta', 'jdenosta03@gmail.com', '09195186753', '1085 norma st, brgy 565 sampaloc mnla.', 'Manila', 'PAYPAL', 'PENDING', '2020-08-29 01:22:17'),
(51, 1, 3450, 'Jay Denosta', 'jdenosta03@gmail.com', '09195186753', '1085 norma st, brgy 565 sampaloc mnla.', 'Manila', 'PAYPAL', 'PENDING', '2020-09-04 01:42:42'),
(52, 1, 3450, 'Jay Denosta', 'jdenosta03@gmail.com', '09195186753', '1085 norma st, brgy 565 sampaloc mnla.', 'Manila', 'PAYPAL', 'PENDING', '2020-09-04 08:56:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
