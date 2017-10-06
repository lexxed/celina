-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.16-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table homestead.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagetitle` text COLLATE utf8mb4_unicode_ci,
  `pagedescription` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_name_unique` (`name`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  UNIQUE KEY `products_image_unique` (`image`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table homestead.products: ~9 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `created_at`, `updated_at`, `display`, `pagetitle`, `pagedescription`) VALUES
	(1, 'Share Plum', 'share-plum', 'Finland\'s besting selling Slimming and Detoxifying Green Plum.', 38.20, 'share-plum.png', NULL, NULL, '1', 'Share Plum Slimming & Detoxifying All Natural Plum', 'Helps treats Weight Loss, Constipation, Digestive Disorder, Hangover Cure & Chronic Fatigue. 100% Natural Ingredients. '),
	(2, 'Xbox One', 'xbox-one', 'nil', 449.99, 'xbox-one.jpg', NULL, NULL, '', NULL, NULL),
	(3, 'Apple Macbook Pro', 'macbook-pro', 'nil', 2299.99, 'macbook-pro.jpg', NULL, NULL, '', NULL, NULL),
	(4, 'Apple iPad Retina', 'ipad-retina', 'nil', 799.99, 'ipad-retina.jpg', NULL, NULL, '', NULL, NULL),
	(5, 'Acoustic Guitar', 'acoustic-guitar', 'nil', 699.99, 'acoustic.jpg', NULL, NULL, '', NULL, NULL),
	(6, 'Electric Guitar', 'electric-guitar', 'nil', 899.99, 'electric.jpg', NULL, NULL, '', NULL, NULL),
	(7, 'Headphones', 'headphones', 'nil', 99.99, 'headphones.jpg', NULL, NULL, '', NULL, NULL),
	(8, 'Speakers', 'speakers', 'nil', 499.99, 'speakers.jpg', NULL, NULL, '', NULL, NULL),
	(9, 'HHA Royal Jelly paper', 'royal-jelly', 'Korea\'s best selling 3-in-1 Make up removal, facial cleanser and skin care protection.The Royal Jelly deeply nourishes skin, improves skins radiance, leaving skin soft and fair. It also has excellent anti-bacterial properties.', 38.40, 'royal-jelly.jpg', '2017-01-31 08:40:02', '2017-01-31 08:40:02', '1', 'HHA Royal Jelly Paper 100pcs Wholesale Prices HHA&#174;', 'Buy HHA Royal Jelly Paper Free Shipping at Bulk Prices. Makeup Remover and Cleanser made of Royal Jelly');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
