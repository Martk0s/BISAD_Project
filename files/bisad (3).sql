-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 23, 2020 at 10:03 AM
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
  `brand_name` varchar(200) DEFAULT NULL
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

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`order_id`, `order_date`, `shipping_address`, `order_status`, `total_amount`, `account_id`) VALUES
(1, NULL, NULL, 'pending', NULL, 1),
(2, '2020-04-23 00:08:18', '99/99 Bangkok', 'confirmed', '347.41', 2),
(3, NULL, NULL, 'pending', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cus_order_product`
--
DROP TABLE IF EXISTS `cus_order_product`;
REPAIR TABLE `cus_order_product`;
CREATE TABLE `cus_order_product` (
  `product_id` int(8) DEFAULT NULL,
  `order_id` int(8) DEFAULT NULL,
  `order_number` timestamp NOT NULL DEFAULT current_timestamp(),
  `price_each` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_order_product`
--

INSERT INTO `cus_order_product` (`product_id`, `order_id`, `order_number`, `price_each`) VALUES
(1, 2, '2020-04-23 05:07:57', '126.33'),
(2, 2, '2020-04-23 05:08:01', '94.75'),
(31, 2, '2020-04-23 05:08:07', '126.33'),
(4, 3, '2020-04-23 05:08:34', '126.33');

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

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `gender`, `price`, `color`, `size_uk`, `product_image`, `brand_id`) VALUES
(1, '997', 'Trainers', 'Female', '126.33', 'Black', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/new-balance-997-trainers-in-black/12883809-2?$XXL$&wid=513&fit=constrain', 12),
(2, '2736 Platform Canvas', 'Plimsoll', 'Male', '94.75', 'Beige', '6,7,8,9,10,11', 'https://images.asos-media.com/products/20-2736-platform-canvas-plimsolls-in-beige/12689305-3?$XXL$&wid=513&fit=constrain', 20),
(3, '3989 SMOOTH', 'Brogue', 'Male', '203.70', 'Black', '5,6', 'https://images.asos-media.com/products/dr-martens-3989-brogues-in-black/5561132-3?$XXL$&wid=513&fit=constrain', 5),
(4, '574 Borg', 'Trainers', 'Female', '126.33', 'White', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/new-balance-574-borg-trainers-in-white/12883835-1-white?$XXL$&wid=513&fit=constrain', 12),
(5, 'Air Force 1 high \'07', 'Trainers', 'Male', '173.70', 'Tan', '6,7,8,9,10,11,12,13', 'https://images.asos-media.com/products/14-air-force-1-high-07-trainers-in-flax/12489031-4?$XXL$&wid=513&fit=constrain', 14),
(6, 'Air Max 200', 'Trainers', 'Male', '173.70', 'White', '6,7,8,9,10,11,12,13', 'https://images.asos-media.com/products/14-air-max-200-trainers-in-white-black-aq2568-104/12490105-2?$XXL$&wid=513&fit=constrain', 14),
(7, 'Air Max 270 React Offset Pastel', 'Trainers', 'Female', '236.87', 'White', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/14-air-max-270-react-offset-pastel-trainers/12769496-1-pastel?$XXL$&wid=513&fit=constrain', 14),
(8, 'Air Max bella', 'Trainers', 'Female', '110.54', 'Pink', '3,4,6,7,8', 'https://images.asos-media.com/products/14-training-air-max-bella-trainers-in-pink/11709072-1-pink?$XXL$&wid=513&fit=constrain', 14),
(9, 'ALORA NUDE PATENT CLEAR BLOCK HEEL MULES', 'Heeled', 'Female', '47.37', 'Beige', '3,4,5,6,7,8', 'https://images.asos-media.com/products/17-london-asymmetric-clear-detail-mules/13499827-2?$XXL$&wid=513&fit=constrain', 17),
(10, 'Anaheim Classic Slip-On', 'Plimsoll', 'Male', '102.64', 'Black', '6,7', 'https://images.asos-media.com/products/24-anaheim-classic-slip-on-plimsolls-in-black/12767540-4?$XXL$&wid=513&fit=constrain', 24),
(11, 'Arizona EVA', 'Sandals', 'Male', '55.27', 'Black', '7,8,9,11', 'https://images.asos-media.com/products/3-arizona-eva-sandals-in-black/10185101-1-black?$XXL$&wid=513&fit=constrain', 3),
(12, 'Authentic', 'Plimsoll', 'Male', '49.74', 'Black', '10.5', 'https://images.asos-media.com/products/24-authentic-plimsolls-in-black/11640013-4?$XXL$&wid=513&fit=constrain', 24),
(13, 'Baryson Suede Chelsea Boots', 'Chelsea Boots', 'Male', '260.55', 'Brown', '8,9,10', 'https://images.asos-media.com/products/polo-ralph-lauren-baryson-suede-chelsea-boot-in-brown/13076021-3?$XXL$&wid=513&fit=constrain', 15),
(14, 'Black Oxford', 'Oxford', 'Female', '50.53', 'Black', '3,4,5,6,7,8', 'https://images.asos-media.com/products/10-black-oxford-shoes/12818901-3?$XXL$&wid=513&fit=constrain', 10),
(15, 'Black Patent Barely There Block Heels', 'Heeled', 'Female', '30.96', 'Black', '3,6,7', 'https://cdn.shopify.com/s/files/1/0265/1760/2401/products/fw1898_blackpatent_03_768x.jpg?v=1571383972', 7),
(16, 'Black Patent Stud Trim Chunky Loafers', 'Loafers', 'Female', '36.48', 'Black', '4,5,6,7,8,9', 'https://media2.newlookassets.com/i/newlook/638828601D2/womens/footwear/shoes/black-patent-stud-trim-chunky-loafers.jpg?strip=true&qlt=80&w=720', 13),
(17, 'Blush Shimmer Barely There Block Heels', 'Heeled', 'Female', '30.96', 'Pink', '3,4,5,6,7', 'https://cdn.shopify.com/s/files/1/0265/1760/2401/products/fw1898-2_copy_600x.jpg?v=1571385636', 7),
(18, 'Canvas', 'Plimsoll', 'Male', '55.27', 'Black', '6,7,8,9,10', 'https://images.asos-media.com/products/jack-jones-canvas-plimsolls-in-black/13820973-4?$XXL$&wid=513&fit=constrain', 8),
(19, 'Chuck 70 High Top', 'Trainers', 'Male', '93.96', 'Pink', '7,8.5,9,10,10.5,11,12', 'https://images.asos-media.com/products/4-chuck-70-trainers-in-pink/12368233-2?$XXL$&wid=513&fit=constrain', 4),
(20, 'Chuck Taylor All Star leather', 'Plimsoll', 'Male', '102.64', 'White', '4,5.5,6.5,7.5,8.5,9,10,10.5,11,12,13', 'https://images.asos-media.com/products/4-chuck-taylor-all-star-leather-plimsolls-in-white/12368235-3?$XXL$&wid=513&fit=constrain', 4),
(21, 'Classic Ankle Boots', 'Ankle Boots', 'Female', '71.06', 'Yellow', '3.5,6,6.5', 'https://images.asos-media.com/products/11-croc-print-ankle-boots-in-mustard/13591893-2?$XXL$&wid=513&fit=constrain', 11),
(22, 'Clear Black Jelly Two Strap Flat Sandal', 'Sandals', 'Female', '15.00', 'Black', '3,4,5,6', 'https://images.asos-media.com/products/7-clear-black-jelly-two-strap-flat-sandal/11786972-2?$XXL$&wid=513&fit=constrain', 7),
(23, '5 x Lazy Oaf Buckle Creeper', 'Brogue', 'Female', '213.18', 'Black', '5,6,7,8,9', 'https://images.asos-media.com/products/dr-martens-x-lazy-oaf-creeper-chunky-shoe-in-black/11367573-4?$XXL$&wid=513&fit=constrain', 5),
(24, 'Energy Wavey', 'Trainers', 'Female', '101.06', 'White', '3,4,5,6,7,8', 'https://images.asos-media.com/products/18-energy-wavey-trainers-in-white/12132851-1-wnt?$XXL$&wid=513&fit=constrain', 18),
(25, 'Era TC', 'Plimsoll', 'Male', '75.80', 'Red', '4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', 'https://images.asos-media.com/products/24-era-tc-plimsolls-in-red/12825776-3?$XXL$&wid=513&fit=constrain', 24),
(26, 'Fairgame Leather Embellished Flat Sandals', 'Sandals', 'Female', '27.63', 'Sliver', '2,9,10', 'https://images.asos-media.com/products/asos-design-fairgame-leather-embellished-flat-sandals/10945508-3?$XXL$&wid=513&fit=constrain', 2),
(27, 'Fast Charge', 'Trainers', 'Female', '94.75', 'White', '3,4,5,6,7,8', 'https://images.asos-media.com/products/6-fast-charge-trainer-with-logo-straps-in-white/13543197-2?$XXL$&wid=513&fit=constrain', 6),
(28, 'Faux Leather', 'Boat Shoes', 'Male', '44.20', 'Tan', '7,8,9', 'https://images.asos-media.com/products/new-look-faux-leather-boat-shoes-in-tan/11292611-1-tan?$XXL$&wid=513&fit=constrain', 13),
(29, 'Faux Leather Chelsea Boots', 'Chelsea Boots', 'Male', '47.36', 'Black', '7,8,9,10,11', 'https://images.asos-media.com/products/new-look-faux-leather-chelsea-boot-in-black/12314286-1-black?$XXL$&wid=513&fit=constrain', 13),
(30, 'Faux Leather Desert Boots', 'Desert Boots', 'Male', '94.75', 'Black', '6,7,8,9,10,11,12', 'https://images.asos-media.com/products/jack-jones-faux-leather-desert-boots-in-black/12700746-4?$XXL$&wid=513&fit=constrain', 8),
(31, '6 Disruptor', 'Trainers', 'Female', '126.33', 'Black', '3,4,5,6,7,8', 'https://images.asos-media.com/products/6-disruptor-trainers-in-black/13970193-1-black?$XXL$&wid=513&fit=constrain', 6),
(32, 'Formal Brogues', 'Brogue', 'Male', '36.30', 'Tan', '8', 'https://images.asos-media.com/products/new-look-formal-brogues-in-tan/11749060-2?$XXL$&wid=513&fit=constrain', 13),
(33, 'Fruity Jelly Flat Sandals In Clear', 'Sandals', 'Female', '15.00', 'Clear', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/asos-design-fruity-jelly-flat-sandals-in-clear/12379566-2?$XXL$&wid=513&fit=constrain', 2),
(34, 'GERALDO BRANDO', 'Sandals', 'Male', '219.49', 'Black', '7,8,10,11,12,13', 'https://images.asos-media.com/products/dr-martens-geraldo-ankle-strap-sandals-in-black/9125735-2?$XXL$&wid=513&fit=constrain', 5),
(35, 'Heeled Croc Pointed Boots', 'Ankle Boots', 'Female', '93.17', 'Red', '3,4,5,6', 'https://images.asos-media.com/products/23-heeled-croc-pointed-boots-in-burgundy/13505548-2?$XXL$&wid=513&fit=constrain', 23),
(36, 'KELVIN II SMOOTH', 'Brogue', 'Male', '187.91', 'Black', '5,6,7,8,9,10,11,12,13', 'https://images.asos-media.com/products/dr-martens-kelvin-brogues-in-black-polished-smooth/12684961-3?$XXL$&wid=513&fit=constrain', 5),
(37, 'Kick Hi Creepy', 'Ankle Boots', 'Female', '120.01', 'Pink', '3,4,5,6,8', 'https://images.asos-media.com/products/9-kick-hi-creepy-light-pink-suede-and-leather-hi-top-flat-boots/12031575-4?$XXL$&wid=513&fit=constrain', 9),
(38, 'Kola White Ankle Boots', 'Ankle Boots', 'Female', '47.36', 'White', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/16-kola-white-ankle-boots/12035608-2?$XXL$&wid=513&fit=constrain', 16),
(39, 'Korey Heeled Thigh High Boots', 'Heeled', 'Female', '56.85', 'Black', '2,3,4,5,6,7,8,9,10', 'https://images.asos-media.com/products/asos-design-korey-heeled-thigh-high-boots-in-black/12262871-3?$XXL$&wid=513&fit=constrain', 2),
(40, 'LEATHER BOOTS', 'Military Boots', 'Male', '110.54', 'Black', '6', 'https://images.asos-media.com/products/jack-jones-lace-up-leather-boot-in-black/12512289-1-anthracite?$XXL$&wid=513&fit=constrain', 8),
(41, 'Leather Chelsea Boots', 'Chelsea Boots', 'Male', '221.07', 'Brown', '6.5,7,10,10.5', 'https://images.asos-media.com/products/tommy-hilfiger-leather-chelsea-boot-in-brown/13107382-4?$XXL$&wid=513&fit=constrain', 21),
(42, 'Majority Chunky Brogue', 'Brogue', 'Female', '47.37', 'Green', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/asos-design-majority-chunky-brogue-in-green/12468567-1-forestgreen?$XXL$&wid=513&fit=constrain', 2),
(43, 'Meteora Chelsea Boots', 'Chelsea Boots', 'Male', '110.52', 'Brown', '7,8,9,10,11,12', 'https://images.asos-media.com/products/19-meteora-chelsea-boots-in-brown/14162940-2?$XXL$&wid=513&fit=constrain', 19),
(44, 'Milano Birko-flor', 'Sandals', 'Male', '102.64', 'Brown', '7,8,9,10,11', 'https://images.asos-media.com/products/3-milano-birko-flor-sandals-in-dark-brown/11255229-1-brown?$XXL$&wid=513&fit=constrain', 3),
(45, 'Millard Suede Slip-On', 'Boat Shoes', 'Male', '187.91', 'Tan', '12', 'https://images.asos-media.com/products/polo-ralph-lauren-millard-suede-slip-on-boat-shoes-in-tan/11433773-1-snuff?$XXL$&wid=513&fit=constrain', 15),
(46, 'More Flat Lace Up', 'Brogue', 'Female', '39.48', 'Black', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/asos-design-more-flat-lace-up-shoes-in-black/11201532-2?$XXL$&wid=513&fit=constrain', 2),
(47, 'Mustard Rectangle Heel Faux Suede Heels', 'Heeled', 'Female', '35.39', 'Yellow', '3,5,6', 'https://cdn.shopify.com/s/files/1/0265/1760/2401/products/fw5899-mustard-03_768x.jpg?v=1571385137', 7),
(48, 'Nova Barely There Heeled Sandals', 'Heeled', 'Female', '25.27', 'Beige', '2,3,4,5,6,7,8,9,10', 'https://images.asos-media.com/products/asos-design-nova-barely-there-heeled-sandals-in-beige/13025004-4?$XXL$&wid=513&fit=constrain', 2),
(49, 'Nubuck Leather', 'Ankle Boots', 'Male', '110.54', 'Brown', '7,8,9,10,11,12', 'https://images.asos-media.com/products/jack-jones-nubuck-leather-boots-in-brown/12700609-4?$XXL$&wid=513&fit=constrain', 8),
(50, 'Nutshell Platform Barely There Heeled Sandals', 'Heeled', 'Female', '44.21', 'Black', '2,3,4,5,6,7,8,9', 'https://images.asos-media.com/products/asos-design-nutshell-platform-barely-there-heeled-sandals-in-black/12349616-2?$XXL$&wid=513&fit=constrain', 2),
(51, 'Old Skool', 'Trainers', 'Female', '102.64', 'Black', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/24-old-skool-trainers-in-green-white/13947173-4?$XXL$&wid=513&fit=constrain', 24),
(52, 'Originals Continental Vulc', 'Trainers', 'Male', '86.85', 'Black', '4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13', 'https://images.asos-media.com/products/1-originals-continental-vulc-trainers-in-black/12399668-2?$XXL$&wid=513&fit=constrain', 1),
(53, 'Originals EQT Gazelle', 'Chunky', 'Male', '110.00', 'White', '5.5', 'https://images.asos-media.com/products/1-originals-eqt-gazelle-trainers-in-triple-white/12269532-2?$XXL$&wid=513&fit=constrain', 1),
(54, 'Originals Falcon Cord', 'Trainers', 'Female', '134.22', 'Pink', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/1-originals-falcon-cord-trainers-in-pink/12884594-1-pink?$XXL$&wid=513&fit=constrain', 1),
(55, 'Pointed Block Heeled Boots', 'Ankle Boots', 'Female', '34.74', 'Grey', '4,5,6,7,8,9', 'https://images.asos-media.com/products/new-look-pointed-block-heeled-boots-in-mid-grey-croc/12647636-3?$XXL$&wid=513&fit=constrain', 13),
(56, 'PU Chelsea Boots', 'Chelsea Boots', 'Male', '78.96', 'Brown', '7,8,9,12', 'https://images.asos-media.com/products/jack-jones-pu-chelsea-boot-in-brown/13303680-1-java?$XXL$&wid=513&fit=constrain', 8),
(57, 'Ripley Lace Up', 'Ankle Boots', 'Male', '157.89', 'Brown', '7,8,9,10,11,12', 'https://images.asos-media.com/products/19-ripley-lace-up-boots-in-brown/13152147-3?$XXL$&wid=513&fit=constrain', 19),
(58, 'Shindigs 7 eye Hiker Boot', 'Ankle Boots', 'Female', '124.75', 'Black', '3,4,5,6,7,8', 'https://images.asos-media.com/products/18-shindigs-7-eye-hiker-boot/12132865-4?$XXL$&wid=513&fit=constrain', 18),
(59, 'SINCLAIR PLATFORM BOOTS', 'Ankle Boots', 'Female', '282.66', 'Black', '7,8,9', 'https://images.asos-media.com/products/dr-martens-sinclair-black-leather-zip-chunky-flatform-boots/9644714-3?$XXL$&wid=513&fit=constrain', 5),
(60, 'Slip-On', 'Boat Shoes', 'Male', '86.85', 'Grey', '6', 'https://images.asos-media.com/products/22-boat-shoes-in-grey/11301985-2?$XXL$&wid=513&fit=constrain', 22),
(61, 'Talan Leather Chelsea Boots', 'Chelsea Boots', 'Male', '187.91', 'Black', '7,8,9', 'https://images.asos-media.com/products/polo-ralph-lauren-talan-leather-chelsea-boot-in-black/13076019-4?$XXL$&wid=513&fit=constrain', 15),
(62, 'Trainer Sandals', 'Sandals', 'Male', '39.48', 'Black', '6,7,8,9,10,11,12', 'https://images.asos-media.com/products/asos-design-trainer-sandals-in-mixed-materials/12406235-1-black?$XXL$&wid=513&fit=constrain', 2),
(63, '24 X Harry Potter Hufflepuff Slip-On', 'Trainers', 'Female', '90.01', 'Black', '3,4', 'https://images.asos-media.com/products/24-x-harry-potter-hufflepuff-slip-on-brown-trainers/11903743-1-black?$XXL$&wid=513&fit=constrain', 24),
(64, 'Vegan 1461', 'Derby', 'Male', '187.91', 'Red', '6', 'https://images.asos-media.com/products/dr-martens-vegan-1461-3-eye-shoes-in-red/9671279-2?$XXL$&wid=513&fit=constrain', 5),
(65, 'Vegan 1462', 'Derby', 'Male', '187.91', 'Black', '6,7,8,9,10,11,12,13', 'https://images.asos-media.com/products/dr-martens-vegan-1461-3-eye-shoes-in-black/9039115-3?$XXL$&wid=513&fit=constrain', 5),
(66, 'Voss black Leather Flat Chunky Sandals', 'Sandals', 'Female', '140.54', 'Black', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/dr-martens-voss-black-leather-flat-chunky-sandals/9148743-2?$XXL$&wid=513&fit=constrain', 5),
(67, 'Wide Fit Membership Loafer Flat Shoes', 'Loafers', 'Female', '34.74', 'Tan', '2,3,4,5,6,7,8,9', 'https://images.asos-media.com/products/asos-design-wide-fit-membership-loafer-flat-shoes-in-tan-croc/12819881-3?$XXL$&wid=513&fit=constrain', 2),
(68, 'Wide Fit Venus Chunky Flat Shoes', 'Loafers', 'Female', '47.36', 'Black', '3,4,5,6,7,8,9', 'https://images.asos-media.com/products/16-wide-fit-venus-chunky-flat-shoes-in-black/13437948-1-blackpu?$XXL$&wid=513&fit=constrain', 16),
(69, 'Winter GORE-TEX Lugged Chuck Taylor All Star Boot', 'Ankle Boots', 'Female', '142.12', 'Black', '3,3.5,4,4.5,5.5,6,6.5,7,7.5,8,8.5', 'https://images.asos-media.com/products/4-goretex-leather-chuck-taylor-hi-chunky-sole-hiker-boots-in-black/13569404-3?$XXL$&wid=513&fit=constrain', 4);

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
  `telephone` char(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `account_type` enum('customer','staff') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_account_id`, `username`, `password`, `first_name`, `last_name`, `email`, `telephone`, `address`, `account_type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 'admin@shoesshoes.com', '0696969969', '69/6969 Bangkok', 'customer'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Demo', 'Demo', 'demo@demo.com', '0996669999', '99/99 Bangkok', 'customer');

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
  ADD UNIQUE KEY `order_number` (`order_number`),
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
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_account_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
