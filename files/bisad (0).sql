-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 20, 2020 at 08:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisad`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--
  DROP TABLE IF EXISTS `brand`;
  REPAIR TABLE `brand`;
  CREATE TABLE `brand` (
    `brand_id` int(8) NOT NULL,
    `brand_name` varchar(200) NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Adidas'),
(2, 'ASOS DESIGN'),
(3, 'Birkenstock'),
(4, 'Converse'),
(5, 'Dr. Martens'),
(6, 'Fila'),
(7, 'Glamorous'),
(8, 'Jack & Jones'),
(9, 'Kickers'),
(10, 'Lamoda'),
(11, 'Monki'),
(12, 'New Balance'),
(13, 'New Look'),
(14, 'Nike'),
(15, 'Polo Ralph Lauren'),
(16, 'RAID'),
(17, 'Simmi'),
(18, 'Skechers'),
(19, 'Superdry'),
(20, 'Superga'),
(21, 'Tommy Hilfiger'),
(22, 'TOMS'),
(23, 'Topshop'),
(24, 'Vans');

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--
DROP TABLE IF EXISTS `cus_order`;
REPAIR TABLE `cus_order`;
CREATE TABLE `cus_order` (
  `order_id` int(8) NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `order_status` enum('pending','confirmed') NOT NULL DEFAULT 'pending',
  `total_amount` decimal(8,2) DEFAULT NULL,
  `account_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cus_order_product`
--
DROP TABLE IF EXISTS `cus_order_product`;
REPAIR TABLE `cus_order_product`;
CREATE TABLE `cus_order_product` (
  `product_id` int(8) DEFAULT NULL,
  `order_id` int(8) DEFAULT NULL,
  `quantity` int(8) DEFAULT NULL,
  `price_each` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
DROP TABLE IF EXISTS `product`;
REPAIR TABLE `product`;
CREATE TABLE `product` (
  `product_id` int(8) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_type` varchar(200) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `size_uk` varchar(200) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `brand_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--
DROP TABLE IF EXISTS `user_account`;
REPAIR TABLE `user_account`;
CREATE TABLE `user_account` (
  `user_account_id` int(8) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `account_type` enum('customer','staff') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`account_id`);

--
-- Indexes for table `cus_order_product`
--
ALTER TABLE `cus_order_product`
  ADD KEY `product_id` (`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_account_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD CONSTRAINT `cus_order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`user_account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cus_order_product`
--
ALTER TABLE `cus_order_product`
  ADD CONSTRAINT `cus_order_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cus_order_product_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `cus_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
