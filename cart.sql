-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 03:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(20) NOT NULL,
  `img` varchar(128) NOT NULL,
  `company` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `category`, `availability`, `price`, `stock`, `img`, `company`) VALUES
(1, 'Moisturizing Lotion 50ml', 'best possible lotion ecerLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa reprehenderit numquam, laudantium aut quos fuga alias commodi. Adipisci repellat voluptate, repudiandae soluta aliquid ipsam quaerat, provident vitae possimus, asp', 'cosmetics', 1, 60, 500, 'cream-4713579_1920.jpg', 'Ponds'),
(2, 'Poco Phone', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat nis', 'electronics', 1, 400004, 1000, 'smartphone-4076145.png', 'Xiaomi'),
(3, 'iPhone X', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'electronics', 1, 152000, 40, 'iphone-37856.png', 'Apple'),
(4, 'MacBook', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'electronics', 1, 335000, 10, 'laptop-158648_1280.png', 'Apple'),
(5, 'HP Laptopp', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'electronics', 1, 40000, 42, 'laptop-533595.png', 'HP'),
(6, 'iMac', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'electronics', 1, 453000, 5, 'apple-407122_1920.jpg', 'Apple'),
(7, 'White Sneakers', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'sports', 1, 6000, 100, 'shoes-153310_1280.png', 'Nike'),
(8, 'Running Sports Shoes', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'sports', 1, 10200, 10, 'feet-1840619_1920.jpg', 'Nike'),
(9, 'Red Sneakers', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'sports', 1, 5000, 100, 'shoe-1434962_1920.jpg', 'Hush Puppies'),
(10, 'Black Sneakers', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'sports', 1, 4000, 50, 'shoes-3445390_1920.jpg', 'Service'),
(11, 'White Comfy Sports', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'sports', 1, 3000, 150, 'shoe-5602819_1920.jpg', 'Bata'),
(12, 'Petroleum Jelly Cream 10 gram', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'cosmetics', 1, 50, 500, 'cream-1464295_1920.png', 'Vaseline'),
(13, 'Skin Whitening Cream', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'cosmetics', 1, 299, 100, 'skin-care-products-827153_1920.jpg', 'Ponds'),
(14, 'Christine 10ml Nail Polish', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'cosmetics', 1, 50, 100, 'nail-polish-1186241_1920.jpg', 'Christine'),
(15, 'Red Nail Polish', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'cosmetics', 1, 50, 400, 'lacquer-273107_1920.jpg', 'Christine'),
(16, 'Swiss Mill Nail Polish', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'cosmetics', 1, 199, 50, 'beauty-3712238_1920.jpg', 'Swiss'),
(17, 'Bugatti Gold Watch', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'watches', 1, 600000, 10, 'clock-3005574_1920.jpg', 'Rolex'),
(18, 'Golden Watch', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'watches', 1, 890000, 5, 'clock-4791415_1920.jpg', 'Rado'),
(20, 'Golden Rolex', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'watches', 1, 9999999, 5, 'wristwatch-6730043_1920.jpg', 'Rolex'),
(21, 'Golden Rolex', '\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur temporibus, tenetur laborum corporis provident dicta. Incidunt inventore ex, ea quam, eligendi veritatis temporibus porro debitis aliquam iste facilis optio quod! Ullam quaerat n', 'watches', 1, 9999999, 5, 'wristwatch-6730043_1920.jpg', 'Rolex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
