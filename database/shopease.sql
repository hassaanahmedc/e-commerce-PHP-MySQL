-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.10.3-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table shopeasedb.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.cart: ~2 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cart_id`, `user_id`, `created_at`) VALUES
	(23, 11, '2023-03-01 21:02:21'),
	(24, 12, '2023-03-02 17:45:54');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table shopeasedb.cart_details
CREATE TABLE IF NOT EXISTS `cart_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_id` (`cart_id`),
  KEY `fk_cart_details_products` (`product_id`),
  CONSTRAINT `fk_cart_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.cart_details: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart_details` DISABLE KEYS */;
INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `quantity`, `price`) VALUES
	(79, 23, 9, 3, 15000),
	(81, 23, 5, 1, 40000);
/*!40000 ALTER TABLE `cart_details` ENABLE KEYS */;

-- Dumping structure for table shopeasedb.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_state` varchar(20) NOT NULL,
  `shipping_zip` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.orders: ~36 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`order_id`, `user_id`, `full_name`, `order_date`, `shipping_address`, `shipping_state`, `shipping_zip`, `order_total`, `shipping_city`) VALUES
	(1, 11, 'Ahmed', '2023-03-17', 'Bedil Bekas Colon7y Block 4 Ac', 'FATA', 45759, 925800, 'Sukkur'),
	(2, 11, 'Ahmed', '2023-03-17', 'Bedil Bekas Colon7y Block 4 Ac', 'FATA', 45759, 925800, 'Sukkur'),
	(3, 11, 'tyututyu', '2023-03-17', 'Block A nagin chorungi', 'Punjab', 755324, 925800, 'Sukker'),
	(4, 11, 'fdgdgdfg', '2023-03-17', 'fdgdfg', 'Punjab', 0, 925800, 'dfgfdgd'),
	(5, 11, '', '2023-03-17', '', 'sindh', 0, 925800, ''),
	(6, 11, 'hjkhjkhkk', '2023-03-17', 'hjkhjkhjk', 'Punjab', 46546, 925800, 'hjkhjkhjkhjk'),
	(7, 11, 'asdasd', '2023-03-17', 'pppppasas44v d', 'Punjab', 75775, 925800, 'asdasdsa'),
	(8, 11, 'asdasd', '2023-03-17', 'pppppasas44v d', 'Punjab', 75775, 925800, 'asdasdsa'),
	(9, 11, 'Farhan', '2023-03-17', 'Sheikh Zaid Mohalla House No B4', 'Punjab', 61670, 925800, 'Larkana'),
	(10, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(11, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(12, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(13, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(14, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(15, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(16, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(17, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(18, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(19, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(20, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(21, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(22, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(23, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(24, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(25, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(26, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(27, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(28, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(29, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(30, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(31, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(32, 11, 'Farhan', '2023-03-17', 'Block A Naseerabad', 'Punjab', 44889, 925800, 'Larkana'),
	(33, 11, 'Farhan', '2023-03-17', 'Sheikh Zaid Mohalla House No B4', 'Punjab', 456456, 502600, 'Sukkur'),
	(34, 11, 'Ahmed', '2023-03-17', 'Block 4Q DHA Karachi', 'FATA', 78921, 462600, 'Pindi'),
	(35, 11, 'bilal', '2023-03-18', 'Baghe hayat road house no 4D', 'Punjab', 47785, 462600, 'Sargodha'),
	(36, 11, 'Bilal Ahmed', '2023-03-18', 'Near boat bassin Block 4  House no B2', 'Sindh', 66175, -301, 'Karachi'),
	(37, 11, 'Tousif Ahmed', '2023-03-19', 'Near Mahar House Block 69', 'Sindh', 798732, 4400, 'Sukkur');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table shopeasedb.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.order_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table shopeasedb.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `img` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.products: ~20 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `name`, `description`, `category`, `availability`, `price`, `stock`, `img`, `company`) VALUES
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
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shopeasedb.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Dumping data for table shopeasedb.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
	(1, 'Hassaan', 'hassaanahmedc@gmail.com', 'Hassaan123'),
	(2, 'Mishaq', 'mishaqrajpoot69@gmail.com', 'Mishaq007'),
	(3, 'sdfdsf', '', 'sdfsf'),
	(4, 'Ahmed', 'hassaanahmed83@outlook.com', 'Asdfghjk10'),
	(5, 'Imtiaz', 'imtiazmangi009@gmail.com', 'Imtiazmangi123'),
	(6, 'Tousif Ansari', 'flygonyt@gmail.com', 'Tousifansari123'),
	(7, 'Malik Riaz', 'm.riazyt@gmail.com', 'Malikriaz123'),
	(8, 'Shahid', 'anwarshahid@gmail.com', 'Shahidanwar123'),
	(9, 'Ahmed', 'ahmedchanna22@gmail.com', 'Ahmedchanna22'),
	(10, 'Ismail ', 'mismaeilrj@gmail.com', '$2y$10$7jzXPlCG9D1.Vhkye.hPwODy/2Vjjmuw1wZIZXiIbOslR8MXOcISq'),
	(11, 'Okasha', 'okasharj@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$SHlHay84c2tOQzZSRm5YYg$7Owey4dHKsczeQPWCHhbPt8UL8dvTXPtMObV/zAmxjc'),
	(12, 'Ahmed', 'ahmedchanna44@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$N2NNQVRsdVBseFZ3clRRTg$0/myw1oyYZQguxLVns3F8NWrwXlJP9QARI7fhXNuCdQ');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
