-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 07, 2026 at 01:59 PM
-- Server version: 8.0.18
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(95) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `experince` int(11) NOT NULL,
  `about_img1` varchar(155) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_img2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_img3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_img4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chefs` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `experince`, `about_img1`, `about_img2`, `about_img3`, `about_img4`, `chefs`, `updated_at`) VALUES
(1, 'welcome  to Restoran', '<p class=\"continue-read-break\" data-t=\"{\" xss=\"removed\">The concern is not really about the coconut itself. It is about its dry, fibrous outer husk. These fibres can be highly flammable and may catch fire quickly if exposed to a spark or another ignition source. Inside a crowded train, where passengers and luggage are packed closely together, a fire can spread rapidly and create a serious safety risk.<slot name=\"cont-read-break\"></slot></p>\r\n\r\n<p data-t=\"{\" xss=\"removed\">This is why dry coconuts with husks are treated as hazardous items under railway safety rules.&nbsp;</p>', 16, '1c7bbcddbd414e6f5d72ba3144b33ecf.jpg', '5d36561e8e09ff878da6e5cb98ae4932.jpeg', 'da14bf8c96e7f1097fa68d165b60b97b.jpg', 'c4b5885345e69fdd3e074834fd95b429.jpeg', 20, '2026-09-24 07:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'abc@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `banner_image`, `updated_at`) VALUES
(1, 'Enjoy  Our Meal', 'Lorem ipsum dolor sit amet consectetur adipiscing elit elit libero. Voluptas ex quod commodo ut nihil assumenda. Sint sunt adipiscing fugiat incididunt aut ullamco assumenda animi non do. Facilis rerum qui nobis lorem dolor omnis. Tempore consequat consequat est et fuga accusamus. Quo ut ullamco sit ea sint possimus quibusdam maxime quidem aute ex et. Harum dolorem est eu est in qui sunt id dignissimos ipsum. Nobis laborum dolor proident nihil dolorum voluptas dolor sit et odio iusto culpa. Et est deserunt id autem et deserunt molestias assumenda voluptatum. Est adipiscing et voluptatum culpa est. Do atque in nobis et voluptas veniam sunt adipiscing nam omnis ipsum aute. Distinctio rerum consequatur aliquip lorem amet sunt deserunt. Id proident in laborum dolore nihil sint odio.', 'b5a5002e5bde68c8f145801569064925.jpg', '2026-10-07 07:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

DROP TABLE IF EXISTS `menu_categories`;
CREATE TABLE IF NOT EXISTS `menu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `category_name`, `subtitle`) VALUES
(1, 'Popular', 'Breakfast'),
(2, 'Special', 'Lunch'),
(3, 'Lovely', 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `category_id`, `item_name`, `description`, `price`, `image`, `created_at`) VALUES
(1, 1, 'burger', 'Ipsum ipsum clita erat amet dolor justo diam', '250.00', 'menu-2.jpg', '2026-10-07 10:05:35'),
(2, 3, 'abc', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '222.00', 'menu-6.jpg', '2026-10-07 10:12:36'),
(3, 2, 'axxx', 'mpor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed ', '320.00', 'menu-1.jpg', '2026-10-07 10:17:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
