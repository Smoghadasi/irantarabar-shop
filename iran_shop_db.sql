-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2025 at 07:40 PM
-- Server version: 5.7.40
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irantarabar_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'آچار', 'select', '2025-05-14 16:49:14', '2025-05-14 16:49:14'),
(2, 'استپر موتور', 'select', '2025-05-14 16:50:34', '2025-05-14 16:50:34'),
(3, 'بلبرینگ', 'select', '2025-05-16 08:24:26', '2025-05-16 08:24:26'),
(4, 'بوش', 'select', '2025-05-16 08:24:32', '2025-05-16 08:24:32'),
(5, 'پمپ ترمز', 'select', '2025-05-16 08:24:47', '2025-05-16 08:24:47'),
(6, 'آرم خودرو', 'select', '2025-05-16 08:51:40', '2025-05-16 08:51:40'),
(7, 'شاسی لای درب', 'select', '2025-05-16 08:53:39', '2025-05-16 08:53:39'),
(8, 'قفل', 'select', '2025-05-16 08:53:49', '2025-05-16 08:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

DROP TABLE IF EXISTS `attribute_category`;
CREATE TABLE IF NOT EXISTS `attribute_category` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `is_filter` tinyint(1) NOT NULL DEFAULT '0',
  `is_variation` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`attribute_id`,`category_id`),
  KEY `attribute_category_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`attribute_id`, `category_id`, `is_filter`, `is_variation`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 0, NULL, NULL),
(1, 1, 1, 1, NULL, NULL),
(3, 2, 1, 1, NULL, NULL),
(4, 2, 1, 0, NULL, NULL),
(5, 2, 0, 0, NULL, NULL),
(1, 3, 1, 0, NULL, NULL),
(6, 3, 0, 1, NULL, NULL),
(8, 4, 0, 0, NULL, NULL),
(7, 4, 1, 1, NULL, NULL),
(3, 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

DROP TABLE IF EXISTS `attribute_values`;
CREATE TABLE IF NOT EXISTS `attribute_values` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_values_attribute_id_foreign` (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `text`, `priority`, `is_active`, `type`, `button_text`, `button_link`, `button_icon`, `created_at`, `updated_at`) VALUES
(4, '2025_5_24_19_18_51_491174_1-3-1024x409.jpg', NULL, NULL, 1, 1, 'index-top', NULL, NULL, NULL, '2025-05-24 15:48:51', '2025-05-24 15:48:51'),
(5, '2025_5_24_19_19_1_664446_1-4-1024x409.jpg', NULL, NULL, 2, 1, 'index-top', NULL, NULL, NULL, '2025-05-24 15:49:01', '2025-05-24 15:49:01'),
(6, '2025_5_24_19_19_19_616003_17288242557338916.png-ezgif.com-webp-to-jpg-converter.jpg', NULL, NULL, 1, 1, 'index-center', NULL, NULL, NULL, '2025-05-24 15:49:19', '2025-05-24 15:49:19'),
(7, '2025_5_24_19_19_27_677556_17288243377268815.png-ezgif.com-webp-to-jpg-converter.jpg', NULL, NULL, 2, 1, 'index-center', NULL, NULL, NULL, '2025-05-24 15:49:27', '2025-05-24 15:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ایساکو', NULL, 1, '2025-05-16 11:27:25', '2025-05-16 11:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `description`, `is_active`, `icon`, `created_at`, `updated_at`) VALUES
(1, 0, 'لوازم یدکی خودرو', 'Car spare parts', NULL, 1, NULL, '2025-05-14 16:52:08', '2025-05-16 11:31:28'),
(2, 1, 'جلوبندی و ترمز', 'blocking-braking', NULL, 1, NULL, '2025-05-16 08:25:27', '2025-05-16 08:25:27'),
(3, 0, 'لوازم جانبی خودرو', 'car accessories', NULL, 1, NULL, '2025-05-16 08:52:22', '2025-05-16 08:52:22'),
(4, 3, 'ضد سرقت', 'anti-theft', NULL, 1, NULL, '2025-05-16 08:54:21', '2025-05-16 08:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_29_095334_create_brands_table', 1),
(5, '2025_03_29_110231_create_attributes_table', 1),
(6, '2025_03_30_051147_create_categories_table', 1),
(7, '2025_03_30_071316_attribute_category_table', 1),
(8, '2025_03_30_071530_create_attribute_values_table', 1),
(9, '2025_04_14_110949_create_products_table', 1),
(10, '2025_04_14_120939_create_product_attributes_table', 1),
(11, '2025_04_14_121535_create_product_images_table', 1),
(12, '2025_04_15_100135_create_roles_table', 1),
(13, '2025_04_15_100249_create_role_user_table', 1),
(14, '2025_04_19_113736_create_tags_table', 1),
(15, '2025_04_19_113903_add_product_tag_table', 1),
(16, '2025_04_19_113950_create_comments_table', 1),
(17, '2025_04_19_114627_create_product_variations_table', 1),
(18, '2025_04_19_121723_create_product_rates_table', 1),
(19, '2025_04_26_113905_create_orders_table', 1),
(20, '2025_04_26_114339_create_order_items_table', 1),
(21, '2025_04_26_115809_create_transactions_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(23, '2025_05_23_114845_create_user_addresses_table', 3),
(24, '2025_05_24_184527_create_banners_table', 4),
(25, '2025_05_28_192924_create_wishlists_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` bigint(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `subtotal` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_product_variation_id_foreign` (`product_variation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `delivery_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `delivery_amount_per_product` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_owner_id_foreign` (`owner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `category_id`, `owner_id`, `slug`, `primary_image`, `description`, `is_active`, `delivery_amount`, `delivery_amount_per_product`, `created_at`, `updated_at`) VALUES
(1, 'لاستیک', 1, 2, 1, 'l-st', '2025_5_19_19_34_17_125992_20250315_194013-1.jpg', 'سبسثب', 1, 54778, 4353, '2025-05-16 11:37:56', '2025-05-19 16:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE IF NOT EXISTS `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_attributes_attribute_id_foreign` (`attribute_id`),
  KEY `product_attributes_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `attribute_id`, `product_id`, `value`, `is_active`, `created_at`, `updated_at`) VALUES
(6, 5, 1, 'vdvsef', 1, '2025-05-16 12:05:30', '2025-05-16 12:05:30'),
(5, 4, 1, 'xvxd', 1, '2025-05-16 12:05:30', '2025-05-16 12:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, '2025_5_19_19_34_17_166015_20250315_193610-1.jpg', '2025-05-19 16:04:17', '2025-05-19 16:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_rates`
--

DROP TABLE IF EXISTS `product_rates`;
CREATE TABLE IF NOT EXISTS `product_rates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE IF NOT EXISTS `product_tag` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`,`product_id`),
  KEY `product_tag_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`tag_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

DROP TABLE IF EXISTS `product_variations`;
CREATE TABLE IF NOT EXISTS `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` int(10) UNSIGNED DEFAULT NULL,
  `date_on_sale_from` timestamp NULL DEFAULT NULL,
  `date_on_sale_to` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variations_attribute_id_foreign` (`attribute_id`),
  KEY `product_variations_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `attribute_id`, `product_id`, `value`, `price`, `quantity`, `sku`, `sale_price`, `date_on_sale_from`, `date_on_sale_to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'سبسثب', 345353, 5000, '546456745', NULL, NULL, NULL, '2025-05-16 11:37:56', '2025-05-16 12:04:54', '2025-05-16 12:04:54'),
(2, 3, 1, 'sefsef', 43535, 4, '345345', NULL, NULL, NULL, '2025-05-16 12:04:54', '2025-05-16 12:05:30', '2025-05-16 12:05:30'),
(3, 3, 1, '18 سایز', 50000, 35, '35345', 45000, '2025-05-16 20:30:00', '2025-05-20 19:31:29', '2025-05-16 12:05:30', '2025-05-17 14:38:29', NULL),
(4, 3, 1, '20 سایز', 70000, 35, '35348', 58000, '2025-05-16 20:30:00', '2025-05-20 19:31:29', '2025-05-16 12:05:30', '2025-05-17 14:38:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province_cities`
--

DROP TABLE IF EXISTS `province_cities`;
CREATE TABLE IF NOT EXISTS `province_cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `centerOfProvince` double NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1394 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `province_cities`
--

INSERT INTO `province_cities` (`id`, `parent_id`, `centerOfProvince`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, '0', 0, 'آذربایجان شرقی', '37.9064', '46.1436', NULL, NULL),
(2, '0', 0, 'آذربایجان غربی', '37.5486', '45.0675', NULL, NULL),
(3, '0', 0, 'اردبیل', '38.2466', '48.2956', NULL, NULL),
(4, '0', 0, 'اصفهان', '32.6546', '51.6678', NULL, NULL),
(5, '0', 0, 'البرز', '35.9971', '50.9294', NULL, NULL),
(6, '0', 0, 'ایلام', '33.6364', '46.4044', NULL, NULL),
(7, '0', 0, 'بوشهر', '28.9234', '50.8203', NULL, NULL),
(8, '0', 0, 'تهران', '35.6892', '51.3889', NULL, NULL),
(9, '0', 0, 'چهارمحال وبختیاری', '31.9337', '50.8362', NULL, NULL),
(10, '0', 0, 'خراسان جنوبی', '32.5672', '59.2215', NULL, NULL),
(11, '0', 0, 'خراسان رضوی', '36.3022', '59.6057', NULL, NULL),
(12, '0', 0, 'خراسان شمالی', '37.4748', '57.3290', NULL, NULL),
(13, '0', 0, 'خوزستان', '31.4360', '48.0700', NULL, NULL),
(14, '0', 0, 'زنجان', '36.6777', '48.4904', NULL, NULL),
(15, '0', 0, 'سمنان', '35.5778', '53.3963', NULL, NULL),
(16, '0', 0, 'سیستان وبلوچستان', '29.5013', '60.8626', NULL, NULL),
(17, '0', 0, 'فارس', '29.1044', '53.0456', NULL, NULL),
(18, '0', 0, 'قزوین', '36.2797', '50.0041', NULL, NULL),
(19, '0', 0, 'قم', '34.6399', '50.8759', NULL, NULL),
(20, '0', 0, 'کردستان', '35.3218', '47.0044', NULL, NULL),
(21, '0', 0, 'کرمان', '30.2839', '57.0833', NULL, NULL),
(22, '0', 0, 'کرمانشاه', '34.3142', '47.0650', NULL, NULL),
(23, '0', 0, 'کهگیلویه وبویراحمد', '30.8370', '50.8091', NULL, NULL),
(24, '0', 0, 'گلستان', '37.2898', '54.3291', NULL, NULL),
(25, '0', 0, 'گیلان', '37.2097', '49.8126', NULL, NULL),
(26, '0', 0, 'لرستان', '33.4878', '48.3571', NULL, NULL),
(27, '0', 0, 'مازندران', '36.2267', '52.5373', NULL, NULL),
(28, '0', 0, 'مرکزی', '34.7666', '50.0065', NULL, NULL),
(29, '0', 0, 'هرمزگان', '27.1387', '56.2396', NULL, NULL),
(30, '0', 0, 'همدان', '34.7992', '48.5146', NULL, NULL),
(31, '0', 0, 'یزد', '32.1006', '54.4342', NULL, NULL),
(32, '1', 0, 'آذرشهر', '37.9378', '46.1416', NULL, NULL),
(33, '1', 0, 'تیمورلو', '38.0580', '46.2888', NULL, NULL),
(34, '1', 0, 'گوگان', '37.2519', '45.9951', NULL, NULL),
(35, '1', 0, 'ممقان', '37.5117', '47.5213', NULL, NULL),
(36, '1', 0, 'اسکو', '37.9243', '46.1215', NULL, NULL),
(37, '1', 0, 'ایلخچی', '38.0125', '45.7534', NULL, NULL),
(38, '1', 0, 'سهند', '37.6942', '46.2181', NULL, NULL),
(39, '1', 0, 'اهر', '37.8325', '45.9621', NULL, NULL),
(40, '1', 0, 'هوراند', '37.4922', '47.0557', NULL, NULL),
(41, '1', 0, 'بستان آباد', '37.4684', '45.8420', NULL, NULL),
(42, '1', 0, 'تیکمه داش', '38.1938', '45.9383', NULL, NULL),
(43, '1', 0, 'بناب', '37.3422', '46.0561', NULL, NULL),
(44, '1', 0, 'باسمنج', '38.2032', '45.9691', NULL, NULL),
(45, '1', 1, 'تبریز', '38.0796', '46.3016', NULL, '2025-04-03 10:05:50'),
(46, '1', 0, 'خسروشاه', '38.0421', '45.7164', NULL, NULL),
(47, '1', 0, 'سردرود', '37.9407', '45.5354', NULL, NULL),
(48, '1', 0, 'جلفا', '38.9348', '45.6304', NULL, NULL),
(49, '1', 0, 'سیه رود', '38.2180', '45.7146', NULL, NULL),
(50, '1', 0, 'هادیشهر', '38.2071', '46.0421', NULL, NULL),
(51, '1', 0, 'قره آغاج', '39.2822', '47.2949', NULL, NULL),
(52, '1', 0, 'خمارلو', '38.9500', '45.9411', NULL, NULL),
(53, '1', 0, 'دوزدوزان', '38.7383', '45.8933', NULL, NULL),
(54, '1', 0, 'سراب', '37.9407', '46.5354', NULL, NULL),
(55, '1', 0, 'شربیان', '37.9483', '45.6374', NULL, NULL),
(56, '1', 0, 'مهربان', '38.9606', '45.6335', NULL, NULL),
(57, '1', 0, 'تسوج', '38.1451', '45.9920', NULL, NULL),
(58, '1', 0, 'خامنه', '38.9693', '45.9182', NULL, NULL),
(59, '1', 0, 'سیس', '37.9821', '46.3330', NULL, NULL),
(60, '1', 0, 'شبستر', '38.1810', '45.7000', NULL, NULL),
(61, '1', 0, 'شرفخانه', '37.4862', '45.0803', NULL, NULL),
(62, '1', 0, 'شندآباد', '37.4763', '46.1866', NULL, NULL),
(63, '1', 0, 'صوفیان', '38.4887', '45.9057', NULL, NULL),
(64, '1', 0, 'کوزه کنان', '38.8006', '45.9853', NULL, NULL),
(65, '1', 0, 'وایقان', '38.3433', '45.6940', NULL, NULL),
(66, '1', 0, 'جوان قلعه', '37.5437', '45.0472', NULL, NULL),
(67, '1', 0, 'عجب شیر', '38.4230', '45.8221', NULL, NULL),
(68, '1', 0, 'آبش احمد', '38.6111', '46.4131', NULL, NULL),
(69, '1', 0, 'کلیبر', '38.9564', '45.6286', NULL, NULL),
(70, '1', 0, 'خداجو(خراجو)', '38.8000', '45.9353', NULL, NULL),
(71, '1', 0, 'مراغه', '38.4293', '46.2617', NULL, NULL),
(72, '1', 0, 'بناب مرند', '38.2304', '45.9025', NULL, NULL),
(73, '1', 0, 'زنوز', '38.7911', '45.9645', NULL, NULL),
(74, '1', 0, 'کشکسرای', '38.9781', '45.8914', NULL, NULL),
(75, '1', 0, 'مرند', '38.4274', '45.7686', NULL, NULL),
(76, '1', 0, 'یامچی', '37.9513', '45.7612', NULL, NULL),
(77, '1', 0, 'لیلان', '38.4910', '45.6089', NULL, NULL),
(78, '1', 0, 'مبارک شهر', '38.3925', '44.9577', NULL, NULL),
(79, '1', 0, 'ملکان', '38.8667', '45.9167', NULL, NULL),
(80, '1', 0, 'آقکند', '38.4000', '45.9167', NULL, NULL),
(81, '1', 0, 'اچاچی', '38.4692', '45.7435', NULL, NULL),
(82, '1', 0, 'ترک', '38.9973', '45.3383', NULL, NULL),
(83, '1', 0, 'ترکمانچای', '38.0639', '46.2956', NULL, NULL),
(84, '1', 0, 'میانه', '37.4208', '47.0692', NULL, NULL),
(85, '1', 0, 'خاروانا', '37.6879', '46.0667', NULL, NULL),
(86, '1', 0, 'ورزقان', '37.2234', '46.0052', NULL, NULL),
(87, '1', 0, 'بخشایش', '38.2197', '46.1735', NULL, NULL),
(88, '1', 0, 'خواجه', '38.2739', '45.6923', NULL, NULL),
(89, '1', 0, 'زرنق', '38.0113', '46.3022', NULL, NULL),
(90, '1', 0, 'کلوانق', '38.4248', '45.8005', NULL, NULL),
(91, '1', 0, 'هریس', '38.2451', '45.7266', NULL, NULL),
(92, '1', 0, 'نظرکهریزی', '38.0834', '45.7827', NULL, NULL),
(93, '1', 0, 'هشترود', '37.4756', '47.0535', NULL, NULL),
(94, '2', 1, 'ارومیه', '37.5527', '45.0761', NULL, '2025-04-03 10:06:00'),
(95, '2', 0, 'سرو', '36.5281', '46.2039', NULL, NULL),
(96, '2', 0, 'سیلوانه', '36.5497', '45.6694', NULL, NULL),
(97, '2', 0, 'قوشچی', '36.6242', '45.6563', NULL, NULL),
(98, '2', 0, 'نوشین', '37.2986', '45.8853', NULL, NULL),
(99, '2', 0, 'اشنویه', '37.0364', '45.0885', NULL, NULL),
(100, '2', 0, 'نالوس', '37.0826', '45.0428', NULL, NULL),
(101, '2', 0, 'بوکان', '36.5211', '46.2083', NULL, NULL),
(102, '2', 0, 'سیمینه', '36.2071', '46.2869', NULL, NULL),
(103, '2', 0, 'پلدشت', '36.2151', '45.3999', NULL, NULL),
(104, '2', 0, 'نازک علیا', '36.0045', '45.2909', NULL, NULL),
(105, '2', 0, 'پیرانشهر', '36.6871', '45.1367', NULL, NULL),
(106, '2', 0, 'گردکشانه', '36.1529', '45.2909', NULL, NULL),
(107, '2', 0, 'تکاب', '36.4000', '47.1139', NULL, NULL),
(108, '2', 0, 'آواجیق', '36.0678', '45.8903', NULL, NULL),
(109, '2', 0, 'سیه چشمه', '36.1739', '45.3625', NULL, NULL),
(110, '2', 0, 'قره ضیاءالدین', '36.5499', '45.3217', NULL, NULL),
(111, '2', 0, 'ایواوغلی', '36.3752', '46.0632', NULL, NULL),
(112, '2', 0, 'خوی', '38.5506', '44.9475', NULL, NULL),
(113, '2', 0, 'دیزج دیز', '35.3403', '46.8223', NULL, NULL),
(114, '2', 0, 'زرآباد', '35.2161', '46.3650', NULL, NULL),
(115, '2', 0, 'فیرورق', '35.5117', '46.3769', NULL, NULL),
(116, '2', 0, 'قطور', '35.1910', '46.8840', NULL, NULL),
(117, '2', 0, 'ربط', '35.5640', '47.7899', NULL, NULL),
(118, '2', 0, 'سردشت', '36.1623', '45.5672', NULL, NULL),
(119, '2', 0, 'میرآباد', '36.7602', '46.1112', NULL, NULL),
(120, '2', 0, 'تازه شهر', '38.1919', '44.7695', NULL, NULL),
(121, '2', 0, 'سلماس', '38.1994', '44.7683', NULL, NULL),
(122, '2', 0, 'شاهین دژ', '36.6774', '46.5610', NULL, NULL),
(123, '2', 0, 'کشاورز', '36.5169', '46.1218', NULL, NULL),
(124, '2', 0, 'محمودآباد', '36.7654', '46.0736', NULL, NULL),
(125, '2', 0, 'شوط', '36.4338', '46.3066', NULL, NULL),
(126, '2', 0, 'مرگنلر', '36.4208', '46.5296', NULL, NULL),
(127, '2', 0, 'بازرگان', '36.5600', '47.6150', NULL, NULL),
(128, '2', 0, 'ماکو', '39.2942', '44.5163', NULL, NULL),
(129, '2', 0, 'خلیفان', '38.2500', '44.2500', NULL, NULL),
(130, '2', 0, 'مهاباد', '36.7631', '45.7221', NULL, NULL),
(131, '2', 0, 'باروق', '37.2056', '45.1353', NULL, NULL),
(132, '2', 0, 'چهاربرج', '36.2197', '45.3071', NULL, NULL),
(133, '2', 0, 'میاندوآب', '36.9694', '46.1025', NULL, NULL),
(134, '2', 0, 'محمدیار', '36.9692', '45.5399', NULL, NULL),
(135, '2', 0, 'نقده', '36.9553', '45.3886', NULL, NULL),
(136, '3', 1, 'اردبیل', '38.2466', '48.2956', NULL, '2025-04-03 10:06:12'),
(137, '3', 0, 'هیر', '38.1509', '47.0786', NULL, NULL),
(138, '3', 0, 'بیله سوار', '38.2103', '48.2758', NULL, NULL),
(139, '3', 0, 'جعفرآباد', '38.3490', '48.0000', NULL, NULL),
(140, '3', 0, 'اسلام اباد', '38.4411', '47.0382', NULL, NULL),
(141, '3', 0, 'اصلاندوز', '38.2845', '47.8085', NULL, NULL),
(142, '3', 0, 'پارس آباد', '38.3776', '48.2676', NULL, NULL),
(143, '3', 0, 'تازه کند', '38.4642', '48.2392', NULL, NULL),
(144, '3', 0, 'خلخال', '37.6183', '48.5253', NULL, NULL),
(145, '3', 0, 'کلور', '37.4194', '48.5297', NULL, NULL),
(146, '3', 0, 'هشتجین', '37.4771', '47.0597', NULL, NULL),
(147, '3', 0, 'سرعین', '38.1476', '48.8073', NULL, NULL),
(148, '3', 0, 'گیوی', '38.1033', '47.8224', NULL, NULL),
(149, '3', 0, 'تازه کندانگوت', '38.3225', '48.2383', NULL, NULL),
(150, '3', 0, 'گرمی', '38.9622', '47.0259', NULL, NULL),
(151, '3', 0, 'رضی', '38.1923', '47.2703', NULL, NULL),
(152, '3', 0, 'فخراباد', '38.4261', '48.3469', NULL, NULL),
(153, '3', 0, 'قصابه', '38.2323', '48.3104', NULL, NULL),
(154, '3', 0, 'لاهرود', '38.4643', '48.4646', NULL, NULL),
(155, '3', 0, 'مرادلو', '38.2157', '48.2601', NULL, NULL),
(156, '3', 0, 'مشگین شهر', '38.3925', '47.6782', NULL, NULL),
(157, '3', 0, 'آبی بیگلو', '38.4412', '48.0129', NULL, NULL),
(158, '3', 0, 'عنبران', '38.3433', '48.4784', NULL, NULL),
(159, '3', 0, 'نمین', '38.4264', '47.6634', NULL, NULL),
(160, '3', 0, 'کوراییم', '38.2884', '48.3836', NULL, NULL),
(161, '3', 0, 'نیر', '38.0848', '47.7720', NULL, NULL),
(162, '4', 0, 'آران وبیدگل', '34.0586', '49.4628', NULL, NULL),
(163, '4', 0, 'ابوزیدآباد', '33.8197', '50.5538', NULL, NULL),
(164, '4', 0, 'سفیدشهر', '32.8751', '51.5274', NULL, NULL),
(165, '4', 0, 'نوش آباد', '32.5075', '51.6319', NULL, NULL),
(166, '4', 0, 'اردستان', '33.3769', '52.3693', NULL, NULL),
(167, '4', 0, 'زواره', '33.4581', '51.2594', NULL, NULL),
(168, '4', 0, 'مهاباد', '33.8696', '50.0045', NULL, NULL),
(169, '4', 0, 'اژیه', '33.9361', '51.0460', NULL, NULL),
(170, '4', 1, 'اصفهان', '32.6546', '51.6678', NULL, '2025-04-03 10:06:25'),
(171, '4', 0, 'بهارستان', '33.1995', '52.2133', NULL, NULL),
(172, '4', 0, 'تودشک', '32.8106', '51.7077', NULL, NULL),
(173, '4', 0, 'حسن اباد', '33.9403', '50.6973', NULL, NULL),
(174, '4', 0, 'زیار', '33.4177', '51.5690', NULL, NULL),
(175, '4', 0, 'سجزی', '32.5419', '51.5704', NULL, NULL),
(176, '4', 0, 'قهجاورستان', '32.8843', '51.5501', NULL, NULL),
(177, '4', 0, 'کوهپایه', '33.0622', '51.7254', NULL, NULL),
(178, '4', 0, 'محمدآباد', '32.7942', '51.6843', NULL, NULL),
(179, '4', 0, 'نصرآباد', '33.1004', '51.4364', NULL, NULL),
(180, '4', 0, 'نیک آباد', '32.9110', '51.5495', NULL, NULL),
(181, '4', 0, 'ورزنه', '33.3522', '51.4948', NULL, NULL),
(182, '4', 0, 'هرند', '32.4358', '51.5712', NULL, NULL),
(183, '4', 0, 'حبیب آباد', '32.9524', '51.5223', NULL, NULL),
(184, '4', 0, 'خورزوق', '32.6067', '51.6828', NULL, NULL),
(185, '4', 0, 'دستگرد', '32.8279', '51.4617', NULL, NULL),
(186, '4', 0, 'دولت آباد', '32.8421', '51.7887', NULL, NULL),
(187, '4', 0, 'سین', '32.9773', '51.3875', NULL, NULL),
(188, '4', 0, 'شاپورآباد', '32.5737', '51.5589', NULL, NULL),
(189, '4', 0, 'کمشچه', '32.5099', '51.5177', NULL, NULL),
(190, '4', 0, 'افوس', '32.9832', '51.7092', NULL, NULL),
(191, '4', 0, 'بویین ومیاندشت', '32.4693', '51.3807', NULL, NULL),
(192, '4', 0, 'تیران', '32.7169', '51.4332', NULL, NULL),
(193, '4', 0, 'رضوانشهر', '33.0784', '51.4704', NULL, NULL),
(194, '4', 0, 'عسگران', '32.6550', '51.5562', NULL, NULL),
(195, '4', 0, 'چادگان', '32.6441', '51.5793', NULL, NULL),
(196, '4', 0, 'رزوه', '33.5367', '51.9721', NULL, NULL),
(197, '4', 0, 'اصغرآباد', '32.8543', '51.4276', NULL, NULL),
(198, '4', 0, 'خمینی شهر', '32.7000', '51.5167', NULL, NULL),
(199, '4', 0, 'درچه', '33.3752', '50.7225', NULL, NULL),
(200, '4', 0, 'کوشک', '32.8260', '51.5505', NULL, NULL),
(201, '4', 0, 'خوانسار', '33.2148', '51.5122', NULL, NULL),
(202, '4', 0, 'جندق', '33.2976', '51.8927', NULL, NULL),
(203, '4', 0, 'خور', '33.5104', '50.8867', NULL, NULL),
(204, '4', 0, 'فرخی', '33.6754', '51.4648', NULL, NULL),
(205, '4', 0, 'دهاقان', '32.6900', '51.5428', NULL, NULL),
(206, '4', 0, 'گلشن', '32.4569', '51.6638', NULL, NULL),
(207, '4', 0, 'حنا', '32.4500', '51.5833', NULL, NULL),
(208, '4', 0, 'سمیرم', '32.8494', '51.5525', NULL, NULL),
(209, '4', 0, 'کمه', '32.7074', '51.6844', NULL, NULL),
(210, '4', 0, 'ونک', '35.7349', '51.4258', NULL, NULL),
(211, '4', 0, 'شاهین شهر', '35.6536', '51.0880', NULL, NULL),
(212, '4', 0, 'گرگاب', '34.4442', '49.0912', NULL, NULL),
(213, '4', 0, 'گزبرخوار', '32.4761', '51.3889', NULL, NULL),
(214, '4', 0, 'لای بید', '32.0370', '54.2348', NULL, NULL),
(215, '4', 0, 'میمه', '32.5836', '50.9501', NULL, NULL),
(216, '4', 0, 'وزوان', '31.4733', '51.6123', NULL, NULL),
(217, '4', 0, 'شهرضا', '32.0088', '51.8767', NULL, NULL),
(218, '4', 0, 'منظریه', '32.4882', '51.6370', NULL, NULL),
(219, '4', 0, 'داران', '31.5580', '51.0050', NULL, NULL),
(220, '4', 0, 'دامنه', '31.8463', '51.4488', NULL, NULL),
(221, '4', 0, 'برف انبار', '32.3212', '52.2439', NULL, NULL),
(222, '4', 0, 'فریدونشهر', '32.9408', '50.1213', NULL, NULL),
(223, '4', 0, 'ابریشم', '32.0176', '51.0931', NULL, NULL),
(224, '4', 0, 'ایمانشهر', '32.7464', '51.4608', NULL, NULL),
(225, '4', 0, 'بهاران شهر', '32.8567', '51.8360', NULL, NULL),
(226, '4', 0, 'پیربکران', '32.8574', '51.1542', NULL, NULL),
(227, '4', 0, 'زازران', '32.0489', '51.4078', NULL, NULL),
(228, '4', 0, 'فلاورجان', '32.5629', '51.4812', NULL, NULL),
(229, '4', 0, 'قهدریجان', '32.7539', '51.5695', NULL, NULL),
(230, '4', 0, 'کلیشادوسودرجان', '32.6542', '51.3663', NULL, NULL),
(231, '4', 0, 'برزک', '32.0719', '51.5147', NULL, NULL),
(232, '4', 0, 'جوشقان قالی', '32.0102', '51.5310', NULL, NULL),
(233, '4', 0, 'قمصر', '32.6296', '51.3652', NULL, NULL),
(234, '4', 0, 'کاشان', '33.9850', '51.4099', NULL, NULL),
(235, '4', 0, 'کامو و چوگان', '33.6190', '51.4040', NULL, NULL),
(236, '4', 0, 'مشکات', '32.3654', '51.4756', NULL, NULL),
(237, '4', 0, 'نیاسر', '33.2825', '51.2998', NULL, NULL),
(238, '4', 0, 'گلپایگان', '33.4425', '50.2878', NULL, NULL),
(239, '4', 0, 'گلشهر', '32.8861', '51.6467', NULL, NULL),
(240, '4', 0, 'گوگد', '32.4540', '51.1859', NULL, NULL),
(241, '4', 0, 'باغ بهادران', '31.7794', '51.5295', NULL, NULL),
(242, '4', 0, 'باغشاد', '32.3632', '51.4964', NULL, NULL),
(243, '4', 0, 'چرمهین', '31.8439', '51.6114', NULL, NULL),
(244, '4', 0, 'چمگردان', '32.9355', '50.4020', NULL, NULL),
(245, '4', 0, 'زاینده رود', '36.3980', '52.5310', NULL, NULL),
(246, '4', 0, 'زرین شهر', '32.3921', '51.2341', NULL, NULL),
(247, '4', 0, 'سده لنجان', '32.0070', '51.4280', NULL, NULL),
(248, '4', 0, 'فولادشهر', '32.5949', '51.4891', NULL, NULL),
(249, '4', 0, 'ورنامخواست', '32.3740', '51.3259', NULL, NULL),
(250, '4', 0, 'دیزیچه', '33.0637', '51.4226', NULL, NULL),
(251, '4', 0, 'زیباشهر', '35.7211', '50.5563', NULL, NULL),
(252, '4', 0, 'طالخونچه', '33.1185', '50.1247', NULL, NULL),
(253, '4', 0, 'کرکوند', '32.6947', '51.0125', NULL, NULL),
(254, '4', 0, 'مبارکه', '32.3474', '50.5996', NULL, NULL),
(255, '4', 0, 'مجلسی', '32.2486', '51.5286', NULL, NULL),
(256, '4', 0, 'انارک', '31.8966', '51.6493', NULL, NULL),
(257, '4', 0, 'بافران', '32.0119', '51.4186', NULL, NULL),
(258, '4', 0, 'نایین', '32.8628', '53.0767', NULL, NULL),
(259, '4', 0, 'جوزدان', '32.0217', '50.3444', NULL, NULL),
(260, '4', 0, 'دهق', '33.1429', '50.1986', NULL, NULL),
(261, '4', 0, 'علویجه', '31.6767', '49.8672', NULL, NULL),
(262, '4', 0, 'کهریزسنگ', '33.5000', '51.6145', NULL, NULL),
(263, '4', 0, 'گلدشت', '31.9994', '50.5291', NULL, NULL),
(264, '4', 0, 'نجف آباد', '32.4346', '51.3677', NULL, NULL),
(265, '4', 0, 'بادرود', '31.8312', '50.2895', NULL, NULL),
(266, '4', 0, 'خالدآباد', '32.0167', '51.1833', NULL, NULL),
(267, '4', 0, 'طرق رود', '32.3000', '51.7000', NULL, NULL),
(268, '4', 0, 'نطنز', '33.5065', '51.9192', NULL, NULL),
(269, '5', 0, 'اشتهارد', '35.7314', '50.3317', NULL, NULL),
(270, '5', 0, 'چهارباغ', '35.6514', '50.9306', NULL, NULL),
(271, '5', 0, 'شهرجدیدهشتگرد', '35.8336', '50.5469', NULL, NULL),
(272, '5', 0, 'کوهسار', '35.3364', '50.9825', NULL, NULL),
(273, '5', 0, 'گلسار', '35.7186', '50.7825', NULL, NULL),
(274, '5', 0, 'هشتگرد', '35.9922', '50.6842', NULL, NULL),
(275, '5', 0, 'طالقان', '35.8914', '50.8911', NULL, NULL),
(276, '5', 0, 'فردیس', '35.6969', '51.0036', NULL, NULL),
(277, '5', 0, 'مشکین دشت', '35.5975', '50.9328', NULL, NULL),
(278, '5', 0, 'آسارا', '35.8433', '50.7403', NULL, NULL),
(279, '5', 1, 'کرج', '35.8288', '50.9501', NULL, '2025-04-03 10:06:35'),
(280, '5', 0, 'کمال شهر', '35.8131', '50.9842', NULL, NULL),
(281, '5', 0, 'گرمدره', '35.2336', '51.1508', NULL, NULL),
(282, '5', 0, 'ماهدشت', '35.7722', '50.8653', NULL, NULL),
(283, '5', 0, 'محمدشهر', '35.5473', '50.6752', NULL, NULL),
(284, '5', 0, 'تنکمان', '35.5833', '50.9567', NULL, NULL),
(285, '5', 0, 'نظرآباد', '36.4297', '52.5751', NULL, NULL),
(286, '6', 0, 'آبدانان', '32.9936', '47.4194', NULL, NULL),
(287, '6', 0, 'سراب باغ', '33.1444', '46.8144', NULL, NULL),
(288, '6', 0, 'مورموری', '33.4167', '46.7213', NULL, NULL),
(289, '6', 1, 'ایلام', '33.6374', '46.4227', NULL, '2025-04-03 10:06:48'),
(290, '6', 0, 'چوار', '32.8133', '46.7114', NULL, NULL),
(291, '6', 0, 'ایوان', '33.8303', '46.3203', NULL, NULL),
(292, '6', 0, 'زرنه', '33.4447', '47.2975', NULL, NULL),
(293, '6', 0, 'بدره', '33.1492', '46.5492', NULL, NULL),
(294, '6', 0, 'آسمان آباد', '33.3500', '47.3833', NULL, NULL),
(295, '6', 0, 'بلاوه', '33.5581', '46.2478', NULL, NULL),
(296, '6', 0, 'توحید', '33.5722', '46.2311', NULL, NULL),
(297, '6', 0, 'سرابله', '33.5645', '46.3454', NULL, NULL),
(298, '6', 0, 'شباب', '33.4847', '46.3134', NULL, NULL),
(299, '6', 0, 'دره شهر', '33.1494', '47.7136', NULL, NULL),
(300, '6', 0, 'ماژین', '33.3547', '47.3825', NULL, NULL),
(301, '6', 0, 'پهله', '33.1603', '46.7219', NULL, NULL),
(302, '6', 0, 'دهلران', '32.6950', '47.2671', NULL, NULL),
(303, '6', 0, 'موسیان', '33.4450', '46.6700', NULL, NULL),
(304, '6', 0, 'میمه', '33.1490', '46.4700', NULL, NULL),
(305, '6', 0, 'لومار', '33.1725', '46.7642', NULL, NULL),
(306, '6', 0, 'ارکواز', '33.3564', '47.0661', NULL, NULL),
(307, '6', 0, 'دلگشا', '33.3400', '46.5900', NULL, NULL),
(1367, '4', 0, 'اشترجان', '32.4708573', '51.4705982', '2024-03-12 11:10:21', '2024-03-12 11:10:21'),
(309, '6', 0, 'صالح آباد', '33.1786', '46.7843', NULL, NULL),
(310, '6', 0, 'مهران', '33.1211', '46.1656', NULL, NULL),
(311, '7', 1, 'بوشهر', '28.9690', '50.8388', NULL, '2025-04-03 10:06:58'),
(312, '7', 0, 'چغادک', '28.9167', '50.8167', NULL, NULL),
(313, '7', 0, 'خارک', '28.8108', '51.0075', NULL, NULL),
(314, '7', 0, 'عالی شهر', '29.4500', '50.6833', NULL, NULL),
(1327, '29', 0, 'هشتبندي', '57.451237', '27.164568', '2024-03-09 05:11:41', '2024-03-09 05:11:41'),
(316, '7', 0, 'اهرم', '28.9370', '50.8308', NULL, NULL),
(317, '7', 0, 'دلوار', '29.8086', '50.2697', NULL, NULL),
(318, '7', 0, 'انارستان', '29.2169', '51.4300', NULL, NULL),
(319, '7', 0, 'جم', '27.8245', '52.3955', NULL, NULL),
(320, '7', 0, 'ریز', '28.9145', '51.1685', NULL, NULL),
(321, '7', 0, 'آب پخش', '29.2500', '50.5667', NULL, NULL),
(322, '7', 0, 'برازجان', '29.2738', '51.2157', NULL, NULL),
(323, '7', 0, 'بوشکان', '28.9925', '51.2907', NULL, NULL),
(324, '7', 0, 'تنگ ارم', '29.1523', '50.4641', NULL, NULL),
(325, '7', 0, 'دالکی', '28.7589', '51.6181', NULL, NULL),
(326, '7', 0, 'سعد آباد', '29.1728', '51.3594', NULL, NULL),
(327, '7', 0, 'شبانکاره', '29.2744', '51.2225', NULL, NULL),
(328, '7', 0, 'کلمه', '29.3842', '50.9900', NULL, NULL),
(329, '7', 0, 'وحدتیه', '28.8791', '51.2806', NULL, NULL),
(330, '7', 0, 'بادوله', '29.2756', '51.3514', NULL, NULL),
(331, '7', 0, 'خورموج', '28.6167', '51.5167', NULL, NULL),
(1295, '27', 0, 'سی سنگان', '36.6439465', '51.4970344', '2024-03-07 20:49:17', '2024-03-07 20:49:17'),
(333, '7', 0, 'کاکی', '29.2073', '50.3020', NULL, NULL),
(334, '7', 0, 'آبدان', '29.2367', '51.1147', NULL, NULL),
(335, '7', 0, 'بردخون', '28.9223', '51.0505', NULL, NULL),
(336, '7', 0, 'بردستان', '29.3069', '51.3505', NULL, NULL),
(337, '7', 0, 'بندردیر', '27.8439', '51.9522', NULL, NULL),
(338, '7', 0, 'دوراهک', '28.8314', '51.2600', NULL, NULL),
(339, '7', 0, 'امام حسن', '29.2729', '51.3637', NULL, NULL),
(340, '7', 0, 'بندردیلم', '28.9417', '50.8617', NULL, NULL),
(341, '7', 0, 'عسلویه', '27.4728', '52.6092', NULL, NULL),
(342, '7', 0, 'نخل تقی', '29.2427', '50.9935', NULL, NULL),
(343, '7', 0, 'بندرکنگان', '27.8445', '52.0616', NULL, NULL),
(344, '7', 0, 'بنک', '29.6148', '51.4724', NULL, NULL),
(345, '7', 0, 'سیراف', '28.2028', '51.5464', NULL, NULL),
(346, '7', 0, 'بندرریگ', '28.2500', '51.5167', NULL, NULL),
(347, '7', 0, 'بندرگناوه', '29.5895', '50.5122', NULL, NULL),
(348, '8', 0, 'احمد آباد مستوفی', '35.9609', '50.9737', NULL, NULL),
(349, '8', 0, 'اسلامشهر', '35.5487', '51.2303', NULL, NULL),
(350, '8', 0, 'چهاردانگه', '35.7236', '51.0845', NULL, NULL),
(351, '8', 0, 'صالحیه', '35.7849', '51.4743', NULL, NULL),
(352, '8', 0, 'گلستان', '35.4794', '51.0295', NULL, NULL),
(353, '8', 0, 'نسیم شهر', '35.6994', '51.3589', NULL, NULL),
(354, '8', 0, 'پاکدشت', '35.5301', '51.6923', NULL, NULL),
(355, '8', 0, 'شریف آباد', '35.7608', '51.2166', NULL, NULL),
(356, '8', 0, 'فرون اباد', '35.7367', '51.2283', NULL, NULL),
(357, '8', 0, 'بومهن', '35.5405', '51.1051', NULL, NULL),
(358, '8', 0, 'پردیس', '35.7039', '51.1101', NULL, NULL),
(359, '8', 0, 'پیشوا', '35.7250', '51.1830', NULL, NULL),
(360, '8', 1, 'تهران', '35.6892', '51.3890', NULL, '2025-04-03 09:54:17'),
(361, '8', 0, 'آبسرد', '35.9278', '51.6016', NULL, NULL),
(362, '8', 0, 'آبعلی', '35.9203', '51.5086', NULL, NULL),
(363, '8', 0, 'دماوند', '35.7021', '52.0429', NULL, NULL),
(364, '8', 0, 'رودهن', '35.7887', '51.7871', NULL, NULL),
(365, '8', 0, 'کیلان', '35.5860', '51.2027', NULL, NULL),
(366, '8', 0, 'پرند', '35.6961', '51.3477', NULL, NULL),
(367, '8', 0, 'رباطکریم', '35.4808', '51.0786', NULL, NULL),
(368, '8', 0, 'نصیرشهر', '35.6720', '51.0634', NULL, NULL),
(369, '8', 0, 'باقرشهر', '35.6849', '51.2919', NULL, NULL),
(370, '8', 0, 'حسن آباد', '35.6594', '51.0730', NULL, NULL),
(371, '8', 0, 'ری', '35.7058', '51.4099', NULL, NULL),
(372, '8', 0, 'کهریزک', '35.5665', '51.3350', NULL, NULL),
(373, '8', 0, 'تجریش', '35.7321', '51.4688', NULL, NULL),
(374, '8', 0, 'شمشک', '35.9292', '51.4009', NULL, NULL),
(375, '8', 0, 'فشم', '35.7130', '51.2463', NULL, NULL),
(376, '8', 0, 'لواسان', '35.8801', '51.5998', NULL, NULL),
(377, '8', 0, 'اندیشه', '35.9090', '51.5954', NULL, NULL),
(378, '8', 0, 'باغستان', '35.7700', '51.3292', NULL, NULL),
(379, '8', 0, 'شاهدشهر', '35.5903', '51.2148', NULL, NULL),
(380, '8', 0, 'شهریار', '35.6533', '51.0517', NULL, NULL),
(381, '8', 0, 'صباشهر', '35.6556', '51.0539', NULL, NULL),
(382, '8', 0, 'فردوسیه', '35.6474', '51.1296', NULL, NULL),
(383, '8', 0, 'وحیدیه', '35.5515', '51.3841', NULL, NULL),
(1336, '1297', 0, 'کونیا', '37.8785065', '32.5064825', '2024-03-09 05:31:52', '2024-03-09 05:31:52'),
(385, '8', 0, 'فیروزکوه', '35.7886', '52.0649', NULL, NULL),
(386, '8', 0, 'قدس', '35.7189', '51.1083', NULL, NULL),
(387, '8', 0, 'قرچک', '35.8314', '50.9144', NULL, NULL),
(388, '8', 0, 'صفادشت', '35.6444', '51.0827', NULL, NULL),
(389, '8', 0, 'ملارد', '35.6675', '50.9765', NULL, NULL),
(390, '8', 0, 'جوادآباد', '35.4886', '51.1542', NULL, NULL),
(391, '8', 0, 'ورامین', '35.3250', '51.6479', NULL, NULL),
(392, '9', 0, 'اردل', '31.9989', '50.6619', NULL, NULL),
(393, '9', 0, 'دشتک', '33.4142', '50.1264', NULL, NULL),
(394, '9', 0, 'سرخون', '32.0670', '51.8640', NULL, NULL),
(395, '9', 0, 'کاج', '32.3325', '50.8566', NULL, NULL),
(396, '9', 0, 'بروجن', '31.9654', '51.2878', NULL, NULL),
(397, '9', 0, 'بلداجی', '32.2272', '50.6311', NULL, NULL),
(398, '9', 0, 'سفیددشت', '32.0795', '50.5768', NULL, NULL),
(399, '9', 0, 'فرادبنه', '32.6188', '50.6293', NULL, NULL),
(400, '9', 0, 'گندمان', '32.4833', '50.6833', NULL, NULL),
(401, '9', 0, 'نقنه', '32.0393', '50.8683', NULL, NULL),
(402, '9', 0, 'بن', '32.5225', '50.9428', NULL, NULL),
(403, '9', 0, 'وردنجان', '31.7239', '51.4772', NULL, NULL),
(404, '9', 0, 'سامان', '32.0975', '51.5511', NULL, NULL),
(405, '9', 0, 'سودجان', '31.5642', '51.2856', NULL, NULL),
(406, '9', 0, 'سورشجان', '32.2886', '50.7647', NULL, NULL),
(407, '9', 1, 'شهرکرد', '32.3256', '50.8649', NULL, '2025-04-03 10:07:19'),
(408, '9', 0, 'طاقانک', '32.0056', '50.9133', NULL, NULL),
(409, '9', 0, 'فرخ شهر', '32.2744', '51.1600', NULL, NULL),
(410, '9', 0, 'کیان', '32.2672', '50.9514', NULL, NULL),
(411, '9', 0, 'نافچ', '32.3261', '50.8256', NULL, NULL),
(412, '9', 0, 'هارونی', '32.3320', '50.8019', NULL, NULL),
(413, '9', 0, 'هفشجان', '31.5975', '50.6558', NULL, NULL),
(414, '9', 0, 'باباحیدر', '31.7894', '50.5128', NULL, NULL),
(415, '9', 0, 'پردنجان', '32.1656', '50.7111', NULL, NULL),
(416, '9', 0, 'جونقان', '31.7983', '50.3497', NULL, NULL),
(417, '9', 0, 'چلیچه', '31.4167', '51.6614', NULL, NULL),
(418, '9', 0, 'فارسان', '31.5164', '51.4633', NULL, NULL),
(419, '9', 0, 'گوجان', '32.2725', '50.7589', NULL, NULL),
(420, '9', 0, 'بازفت', '32.0200', '50.5550', NULL, NULL),
(421, '9', 0, 'چلگرد', '31.8917', '50.8464', NULL, NULL),
(422, '9', 0, 'صمصامی', '31.7836', '50.5617', NULL, NULL),
(423, '9', 0, 'دستنا', '32.1311', '50.6358', NULL, NULL),
(424, '9', 0, 'شلمزار', '31.7928', '50.6239', NULL, NULL),
(425, '9', 0, 'گهرو', '32.3125', '50.8125', NULL, NULL),
(426, '9', 0, 'ناغان', '31.5183', '51.4000', NULL, NULL),
(427, '9', 0, 'آلونی', '32.3003', '51.5253', NULL, NULL),
(428, '9', 0, 'سردشت', '30.7769', '54.3469', NULL, NULL),
(429, '9', 0, 'لردگان', '31.5140', '51.0820', NULL, NULL),
(430, '9', 0, 'مال خلیفه', '32.1533', '50.5678', NULL, NULL),
(431, '9', 0, 'منج', '31.7283', '51.5567', NULL, NULL),
(432, '10', 0, 'ارسک', '32.3251', '59.1897', NULL, NULL),
(433, '10', 0, 'بشرویه', '32.0447', '59.3186', NULL, NULL),
(434, '10', 1, 'بیرجند', '32.8663', '59.2211', NULL, '2025-04-03 10:07:29'),
(435, '10', 0, 'خوسف', '32.2939', '59.2178', NULL, NULL),
(436, '10', 0, 'محمدشهر', '32.0992', '60.1417', NULL, NULL),
(437, '10', 0, 'اسدیه', '32.6222', '59.8525', NULL, NULL),
(438, '10', 0, 'طبس مسینا', '33.5989', '56.9267', NULL, NULL),
(439, '10', 0, 'قهستان', '33.7392', '58.4306', NULL, NULL),
(440, '10', 0, 'گزیک', '33.4428', '58.4292', NULL, NULL),
(441, '10', 0, 'حاجی آباد', '33.4428', '59.1786', NULL, NULL),
(442, '10', 0, 'زهان', '33.4483', '58.9136', NULL, NULL),
(443, '10', 0, 'آیسک', '33.5956', '56.9211', NULL, NULL),
(444, '10', 0, 'سرایان', '33.8614', '58.5161', NULL, NULL),
(445, '10', 0, 'سه قلعه', '33.8214', '59.2014', NULL, NULL),
(446, '10', 0, 'سربیشه', '32.5733', '61.2575', NULL, NULL),
(447, '10', 0, 'مود', '33.6633', '58.4367', NULL, NULL),
(448, '10', 0, 'دیهوک', '33.5122', '60.1994', NULL, NULL),
(449, '10', 0, 'طبس', '33.5956', '56.9211', NULL, NULL),
(450, '10', 0, 'عشق آباد', '33.6783', '58.5033', NULL, NULL),
(451, '10', 0, 'اسلامیه', '34.1708', '58.8142', NULL, NULL),
(452, '10', 0, 'فردوس', '34.0167', '58.1722', NULL, NULL),
(453, '10', 0, 'آرین شهر', '33.8644', '58.0325', NULL, NULL),
(454, '10', 0, 'اسفدن', '34.8667', '60.8333', NULL, NULL),
(455, '10', 0, 'خضری دشت بیاض', '34.1819', '59.1867', NULL, NULL),
(456, '10', 0, 'قاین', '33.7250', '59.1847', NULL, NULL),
(457, '10', 0, 'نیمبلوک', '33.6206', '59.9739', NULL, NULL),
(458, '10', 0, 'شوسف', '34.3406', '58.7150', NULL, NULL),
(459, '10', 0, 'نهبندان', '32.9972', '59.4653', NULL, NULL),
(460, '11', 0, 'باخرز', '34.9931', '60.3172', NULL, NULL),
(461, '11', 0, 'بجستان', '34.5078', '57.3350', NULL, NULL),
(462, '11', 0, 'یونسی', '35.0142', '58.8883', NULL, NULL),
(463, '11', 0, 'انابد', '34.3817', '58.6819', NULL, NULL),
(464, '11', 0, 'بردسکن', '35.2620', '57.9806', NULL, NULL),
(465, '11', 0, 'شهراباد', '35.6583', '57.7342', NULL, NULL),
(466, '11', 0, 'شاندیز', '36.4242', '59.5150', NULL, NULL),
(467, '11', 0, 'طرقبه', '36.3200', '59.4300', NULL, NULL),
(468, '11', 0, 'تایباد', '34.7400', '60.7753', NULL, NULL),
(469, '11', 0, 'کاریز', '36.0631', '58.0311', NULL, NULL),
(470, '11', 0, 'مشهدریزه', '36.2436', '59.6178', NULL, NULL),
(471, '11', 0, 'احمدابادصولت', '36.1561', '58.2389', NULL, NULL),
(472, '11', 0, 'تربت جام', '35.2236', '60.6222', NULL, NULL),
(473, '11', 0, 'صالح آباد', '36.5036', '59.4744', NULL, NULL),
(474, '11', 0, 'نصرآباد', '36.6769', '59.2314', NULL, NULL),
(475, '11', 0, 'نیل شهر', '36.2158', '58.7950', NULL, NULL),
(476, '11', 0, 'بایک', '36.5850', '59.1053', NULL, NULL),
(477, '11', 0, 'تربت حیدریه', '35.2739', '59.2194', NULL, NULL),
(478, '11', 0, 'رباط سنگ', '34.3081', '58.8222', NULL, NULL),
(479, '11', 0, 'کدکن', '35.0083', '58.7200', NULL, NULL),
(480, '11', 0, 'جغتای', '36.6475', '58.4886', NULL, NULL),
(481, '11', 0, 'نقاب', '34.0814', '58.1694', NULL, NULL),
(482, '11', 0, 'چناران', '34.3000', '58.5500', NULL, NULL),
(483, '11', 0, 'گلبهار', '35.2178', '58.4711', NULL, NULL),
(484, '11', 0, 'گلمکان', '34.3453', '58.7089', NULL, NULL),
(485, '11', 0, 'خلیل آباد', '35.2461', '58.8494', NULL, NULL),
(486, '11', 0, 'کندر', '34.5128', '60.8814', NULL, NULL),
(487, '11', 0, 'خواف', '37.7000', '45.0000', NULL, NULL),
(488, '11', 0, 'سلامی', '36.1375', '58.0047', NULL, NULL),
(489, '11', 0, 'سنگان', '35.3022', '58.4003', NULL, NULL),
(490, '11', 0, 'قاسم آباد', '34.8622', '59.0347', NULL, NULL),
(491, '11', 0, 'نشتیفان', '34.2408', '59.6261', NULL, NULL),
(492, '11', 0, 'سلطان آباد', '35.3789', '59.4458', NULL, NULL),
(493, '11', 0, 'داورزن', '35.2575', '59.7400', NULL, NULL),
(494, '11', 0, 'چاپشلو', '36.6350', '58.2889', NULL, NULL),
(495, '11', 0, 'درگز', '37.4422', '59.1236', NULL, NULL),
(496, '11', 0, 'لطف آباد', '36.1758', '58.8392', NULL, NULL),
(497, '11', 0, 'نوخندان', '34.9611', '60.2133', NULL, NULL),
(498, '11', 0, 'جنگل', '34.4944', '58.2356', NULL, NULL),
(499, '11', 0, 'رشتخوار', '35.0214', '59.1097', NULL, NULL),
(500, '11', 0, 'دولت آباد', '36.2672', '58.6747', NULL, NULL),
(501, '11', 0, 'روداب', '37.1700', '57.5094', NULL, NULL),
(502, '11', 0, 'سبزوار', '36.2154', '57.6792', NULL, NULL),
(503, '11', 0, 'ششتمد', '37.1050', '58.5097', NULL, NULL),
(504, '11', 0, 'سرخس', '36.5392', '61.1575', NULL, NULL),
(505, '11', 0, 'مزدآوند', '34.7831', '58.5153', NULL, NULL),
(506, '11', 0, 'سفیدسنگ', '36.5333', '57.7958', NULL, NULL),
(507, '11', 0, 'فرهادگرد', '34.4792', '58.2886', NULL, NULL),
(508, '11', 0, 'فریمان', '35.7089', '59.8503', NULL, NULL),
(509, '11', 0, 'قلندرآباد', '34.0500', '58.2167', NULL, NULL),
(510, '11', 0, 'فیروزه', '35.8000', '58.9000', NULL, NULL),
(511, '11', 0, 'همت آباد', '35.5469', '59.4431', NULL, NULL),
(512, '11', 0, 'باجگیران', '35.3333', '58.4000', NULL, NULL),
(513, '11', 0, 'قوچان', '37.1061', '58.5097', NULL, NULL),
(514, '11', 0, 'ریوش', '37.1833', '59.0000', NULL, NULL),
(515, '11', 0, 'کاشمر', '35.2422', '58.4647', NULL, NULL),
(516, '11', 0, 'شهرزو', '36.9000', '58.2500', NULL, NULL),
(517, '11', 0, 'کلات', '36.9950', '54.3425', NULL, NULL),
(518, '11', 0, 'بیدخت', '35.3056', '58.4447', NULL, NULL),
(519, '11', 0, 'کاخک', '36.8611', '58.6944', NULL, NULL),
(520, '11', 0, 'گناباد', '34.3403', '58.6783', NULL, NULL),
(521, '11', 0, 'رضویه', '35.5000', '57.5000', NULL, NULL),
(522, '11', 1, 'مشهد', '36.2605', '59.6168', NULL, '2025-04-03 10:08:09'),
(523, '11', 0, 'مشهد ثامن', '36.2450', '59.6050', NULL, NULL),
(524, '11', 0, 'ملک آباد', '34.7833', '59.5500', NULL, NULL),
(525, '11', 0, 'شادمهر', '34.7583', '58.6453', NULL, NULL),
(526, '11', 0, 'فیض آباد', '34.6000', '59.1400', NULL, NULL),
(528, '11', 0, 'چکنه', '36.9917', '57.5950', NULL, NULL),
(529, '11', 0, 'خرو', '36.3150', '59.1047', NULL, NULL),
(530, '11', 0, 'درود', '34.9525', '58.9486', NULL, NULL),
(531, '11', 0, 'عشق آباد', '36.7244', '58.7778', NULL, NULL),
(532, '11', 0, 'قدمگاه', '36.3500', '59.5833', NULL, NULL),
(533, '11', 0, 'نیشابور', '36.2133', '58.7950', NULL, NULL),
(534, '12', 0, 'اسفراین', '37.0769', '57.5106', NULL, NULL),
(535, '12', 0, 'صفی آباد', '37.3090', '57.9150', NULL, NULL),
(536, '12', 1, 'بجنورد', '37.4753', '57.3294', NULL, '2025-04-03 10:07:52'),
(537, '12', 0, 'چناران شهر', '37.0683', '57.5086', NULL, NULL),
(538, '12', 0, 'حصارگرمخان', '37.4583', '57.3297', NULL, NULL),
(539, '12', 0, 'جاجرم', '37.3997', '57.9292', NULL, NULL),
(540, '12', 0, 'سنخواست', '37.2683', '56.8831', NULL, NULL),
(541, '12', 0, 'شوقان', '37.3344', '57.3667', NULL, NULL),
(542, '12', 0, 'راز', '37.8536', '57.6750', NULL, NULL),
(543, '12', 0, 'زیارت', '37.3200', '56.8200', NULL, NULL),
(544, '12', 0, 'شیروان', '37.4097', '57.9292', NULL, NULL),
(545, '12', 0, 'قوشخانه', '37.6167', '56.2792', NULL, NULL),
(546, '12', 0, 'لوجلی', '37.0442', '57.5097', NULL, NULL),
(547, '12', 0, 'تیتکانلو', '37.3275', '57.5156', NULL, NULL),
(548, '12', 0, 'فاروج', '37.2167', '57.2833', NULL, NULL),
(549, '12', 0, 'ایور', '36.9692', '57.5939', NULL, NULL),
(550, '12', 0, 'درق', '37.3100', '57.9347', NULL, NULL),
(551, '12', 0, 'گرمه', '37.9828', '57.6811', NULL, NULL),
(552, '12', 0, 'آشخانه', '37.7358', '57.4114', NULL, NULL),
(553, '12', 0, 'آوا', '37.9339', '57.9822', NULL, NULL),
(554, '12', 0, 'پیش قلعه', '37.3719', '57.2056', NULL, NULL),
(555, '12', 0, 'قاضی', '37.8325', '56.9972', NULL, NULL),
(556, '13', 0, 'آبادان', '30.3392', '48.3043', NULL, NULL),
(557, '13', 0, 'اروندکنار', '31.0110', '49.7750', NULL, NULL),
(558, '13', 0, 'چویبده', '32.1000', '48.5000', NULL, NULL),
(559, '13', 0, 'آغاجاری', '32.2500', '48.2500', NULL, NULL),
(560, '13', 0, 'امیدیه', '30.7500', '49.7000', NULL, NULL),
(561, '13', 0, 'جایزان', '31.0337', '49.8624', NULL, NULL),
(562, '13', 0, 'آبژدان', '30.3544', '48.2447', NULL, NULL),
(563, '13', 0, 'قلعه خواجه', '32.0744', '48.8236', NULL, NULL),
(564, '13', 0, 'آزادی', '30.8139', '49.4295', NULL, NULL),
(565, '13', 0, 'اندیمشک', '32.4510', '48.4028', NULL, NULL),
(566, '13', 0, 'بیدروبه', '31.5787', '49.8659', NULL, NULL),
(567, '13', 0, 'چم گلک', '31.5500', '49.8672', NULL, NULL),
(568, '13', 0, 'حسینیه', '31.1625', '49.1842', NULL, NULL),
(569, '13', 0, 'الهایی', '31.4165', '49.8783', NULL, NULL),
(570, '13', 1, 'اهواز', '31.3183', '48.6713', NULL, '2025-04-03 10:08:24'),
(571, '13', 0, 'ایذه', '31.8250', '49.8650', NULL, NULL),
(572, '13', 0, 'دهدز', '30.7938', '49.5651', NULL, NULL),
(573, '13', 0, 'باغ ملک', '30.8100', '49.4482', NULL, NULL),
(574, '13', 0, 'صیدون', '32.1900', '49.7800', NULL, NULL),
(575, '13', 0, 'قلعه تل', '31.5371', '49.7657', NULL, NULL),
(576, '13', 0, 'میداود', '31.4050', '48.6471', NULL, NULL),
(577, '13', 0, 'شیبان', '31.6864', '49.2810', NULL, NULL),
(578, '13', 0, 'ملاثانی', '31.2551', '49.5582', NULL, NULL),
(579, '13', 0, 'ویس', '31.4942', '49.4855', NULL, NULL),
(580, '13', 0, 'بندرامام خمینی', '30.4203', '49.0685', NULL, NULL),
(581, '13', 0, 'بندرماهشهر', '30.5564', '49.1767', NULL, NULL),
(582, '13', 0, 'چمران', '30.9417', '49.4062', NULL, NULL),
(583, '13', 0, 'بهبهان', '30.5967', '50.2412', NULL, NULL),
(584, '13', 0, 'تشان', '31.6030', '48.6841', NULL, NULL),
(585, '13', 0, 'سردشت', '30.2425', '48.2933', NULL, NULL),
(586, '13', 0, 'منصوریه', '31.8784', '49.2422', NULL, NULL),
(587, '13', 0, 'حمیدیه', '30.9403', '48.6970', NULL, NULL),
(588, '13', 0, 'خرمشهر', '30.4299', '48.1841', NULL, NULL),
(589, '13', 0, 'مقاومت', '31.6184', '48.8878', NULL, NULL),
(590, '13', 0, 'مینوشهر', '31.5600', '48.7100', NULL, NULL),
(591, '13', 0, 'چغامیش', '32.6468', '48.4611', NULL, NULL),
(592, '13', 0, 'حمزه', '30.1536', '48.8255', NULL, NULL),
(593, '13', 0, 'دزفول', '32.3811', '48.3978', NULL, NULL),
(594, '13', 0, 'سالند', '31.5514', '49.8758', NULL, NULL),
(595, '13', 0, 'سیاه منصور', '31.1975', '48.6273', NULL, NULL),
(1375, '8', 0, 'شمس آباد', '35.27755859950133', '51.581046636202515', '2024-03-17 07:32:42', '2024-03-17 07:32:42'),
(597, '13', 0, 'شهر امام', '31.8431', '49.8650', NULL, NULL),
(598, '13', 0, 'صفی آباد', '31.9294', '49.2738', NULL, NULL),
(599, '13', 0, 'میانرود', '31.4229', '49.7578', NULL, NULL),
(600, '13', 0, 'ابوحمیظه', '30.5972', '49.1673', NULL, NULL),
(601, '13', 0, 'بستان', '32.8675', '51.5450', NULL, NULL),
(602, '13', 0, 'سوسنگرد', '33.1947', '52.1975', NULL, NULL),
(603, '13', 0, 'کوت سیدنعیم', '32.7464', '49.5111', NULL, NULL),
(604, '13', 0, 'رامشیر', '30.8939', '49.4097', NULL, NULL),
(605, '13', 0, 'مشراگه', '30.9275', '49.3981', NULL, NULL),
(606, '13', 0, 'رامهرمز', '31.2700', '49.6044', NULL, NULL),
(607, '13', 0, 'خنافره', '31.3842', '49.5894', NULL, NULL),
(608, '13', 0, 'دارخوین', '31.5589', '49.8047', NULL, NULL),
(609, '13', 0, 'شادگان', '30.6550', '48.6583', NULL, NULL),
(610, '13', 0, 'الوان', '31.6436', '49.9458', NULL, NULL),
(611, '13', 0, 'حر', '31.5436', '49.9186', NULL, NULL),
(612, '13', 0, 'شاوور', '31.5914', '49.8728', NULL, NULL),
(613, '13', 0, 'شوش', '32.1942', '48.2444', NULL, NULL),
(614, '13', 0, 'فتح المبین', '32.1358', '48.2475', NULL, NULL),
(615, '13', 0, 'سرداران', '32.0322', '48.8542', NULL, NULL),
(616, '13', 0, 'شرافت', '32.0492', '48.8203', NULL, NULL),
(617, '13', 0, 'شوشتر', '32.0433', '48.8567', NULL, NULL),
(618, '13', 0, 'گوریه', '32.4447', '49.2867', NULL, NULL),
(619, '13', 0, 'کوت عبداله', '32.4625', '48.8061', NULL, NULL),
(620, '13', 0, 'ترکالکی', '31.5792', '48.1994', NULL, NULL),
(621, '13', 0, 'جنت مکان', '31.7908', '49.9442', NULL, NULL),
(622, '13', 0, 'سماله', '31.8811', '48.7614', NULL, NULL),
(623, '13', 0, 'صالح شهر', '32.0406', '48.8242', NULL, NULL),
(624, '13', 0, 'گتوند', '32.2425', '49.0992', NULL, NULL),
(625, '13', 0, 'لالی', '32.2625', '49.2392', NULL, NULL),
(626, '13', 0, 'گلگیر', '32.3761', '49.3622', NULL, NULL),
(627, '13', 0, 'مسجدسلیمان', '31.9364', '49.3036', NULL, NULL),
(628, '13', 0, 'هفتگل', '32.0389', '49.1478', NULL, NULL),
(629, '13', 0, 'زهره', '32.2250', '49.3097', NULL, NULL),
(630, '13', 0, 'هندیجان', '32.4592', '49.1714', NULL, NULL),
(631, '13', 0, 'رفیع', '32.6764', '49.5536', NULL, NULL),
(632, '13', 0, 'هویزه', '32.7008', '51.1533', NULL, NULL),
(633, '14', 0, 'ابهر', '36.1467', '49.2194', NULL, NULL),
(634, '14', 0, 'صایین قلعه', '36.2869', '49.2147', NULL, NULL),
(635, '14', 0, 'هیدج', '36.1617', '49.1825', NULL, NULL),
(636, '14', 0, 'حلب', '36.2244', '49.1911', NULL, NULL),
(637, '14', 0, 'زرین آباد', '35.1247', '47.8283', NULL, NULL),
(638, '14', 0, 'زرین رود', '36.5019', '49.2083', NULL, NULL),
(639, '14', 0, 'سجاس', '36.3939', '48.6344', NULL, NULL),
(640, '14', 0, 'سهرورد', '36.6222', '48.5153', NULL, NULL),
(641, '14', 0, 'قیدار', '36.4742', '49.4236', NULL, NULL),
(642, '14', 0, 'کرسف', '36.1417', '49.1889', NULL, NULL),
(643, '14', 0, 'گرماب', '36.3058', '49.6194', NULL, NULL),
(644, '14', 0, 'نوربهار', '36.0122', '49.2597', NULL, NULL),
(645, '14', 0, 'خرمدره', '36.2031', '49.1819', NULL, NULL),
(646, '14', 0, 'ارمغانخانه', '36.2678', '49.5006', NULL, NULL),
(647, '14', 1, 'زنجان', '36.6736', '48.5080', NULL, '2025-04-03 10:08:39'),
(648, '14', 0, 'نیک پی', '36.6714', '47.9789', NULL, NULL),
(649, '14', 0, 'سلطانیه', '36.6250', '48.5294', NULL, NULL),
(650, '14', 0, 'آب بر', '36.1642', '49.2208', NULL, NULL),
(651, '14', 0, 'چورزق', '36.8919', '54.1003', NULL, NULL),
(652, '14', 0, 'دندی', '36.4686', '54.9600', NULL, NULL),
(653, '14', 0, 'ماه نشان', '35.6839', '53.3486', NULL, NULL),
(654, '15', 0, 'آرادان', '36.6639', '55.0678', NULL, NULL),
(655, '15', 0, 'کهن آباد', '35.2422', '56.9644', NULL, NULL),
(656, '15', 0, 'امیریه', '36.4731', '56.3692', NULL, NULL),
(657, '15', 0, 'دامغان', '36.1647', '54.3419', NULL, NULL),
(658, '15', 0, 'دیباج', '36.0128', '55.3789', NULL, NULL),
(659, '15', 0, 'کلاته', '36.9922', '54.8736', NULL, NULL),
(660, '15', 0, 'سرخه', '36.5411', '54.3994', NULL, NULL),
(661, '15', 1, 'سمنان', '35.5700', '53.3975', NULL, '2025-04-03 10:08:52'),
(662, '15', 0, 'بسطام', '35.2978', '54.0450', NULL, NULL),
(663, '15', 0, 'بیارجمند', '35.4589', '53.4517', NULL, NULL),
(664, '15', 0, 'رودیان', '36.3025', '55.1044', NULL, NULL),
(665, '15', 0, 'شاهرود', '36.4189', '55.0167', NULL, NULL),
(666, '15', 0, 'کلاته خیج', '36.9922', '54.8736', NULL, NULL),
(667, '15', 0, 'مجن', '36.2600', '54.5200', NULL, NULL),
(668, '15', 0, 'ایوانکی', '35.3242', '53.9750', NULL, NULL),
(669, '15', 0, 'گرمسار', '35.2133', '52.3400', NULL, NULL),
(670, '15', 0, 'درجزین', '35.6658', '52.0469', NULL, NULL),
(671, '15', 0, 'شهمیرزاد', '35.3847', '53.1933', NULL, NULL),
(672, '15', 0, 'مهدی شهر', '35.6986', '53.3436', NULL, NULL),
(673, '15', 0, 'میامی', '36.4089', '55.6578', NULL, NULL),
(674, '16', 0, 'ایرانشهر', '27.2025', '60.6844', NULL, NULL),
(675, '16', 0, 'بزمان', '25.4425', '60.4061', NULL, NULL),
(676, '16', 0, 'بمپور', '27.2003', '60.7206', NULL, NULL),
(677, '16', 0, 'محمدان', '26.9589', '61.7344', NULL, NULL),
(678, '16', 0, 'چابهار', '25.2925', '60.6433', NULL, NULL),
(679, '16', 0, 'نگور', '26.9367', '59.6431', NULL, NULL),
(680, '16', 0, 'خاش', '28.2167', '61.2150', NULL, NULL),
(681, '16', 0, 'نوک آباد', '26.5247', '58.9561', NULL, NULL),
(682, '16', 0, 'گلمورتی', '27.6775', '57.7083', NULL, NULL),
(683, '16', 0, 'بنجار', '26.5039', '61.1647', NULL, NULL),
(684, '16', 0, 'زابل', '31.0292', '61.4933', NULL, NULL),
(685, '16', 1, 'زاهدان', '29.4964', '60.8625', NULL, '2025-04-03 10:09:14'),
(686, '16', 0, 'نصرت آباد', '27.2086', '60.6881', NULL, NULL),
(687, '16', 0, 'زهک', '30.8933', '61.6817', NULL, NULL),
(688, '16', 0, 'جالق', '25.6483', '60.8542', NULL, NULL),
(689, '16', 0, 'سراوان', '27.3500', '62.3000', NULL, NULL),
(690, '16', 0, 'سیرکان', '29.4581', '55.6811', NULL, NULL),
(691, '16', 0, 'گشت', '27.7836', '54.3364', NULL, NULL),
(1353, '1297', 0, 'آدانا', '36.997934923328906', '35.336815872520056', '2024-03-10 05:10:09', '2024-03-10 05:10:09'),
(693, '16', 0, 'پیشین', '26.5547', '61.7556', NULL, NULL),
(694, '16', 0, 'راسک', '26.2222', '61.3992', NULL, NULL),
(695, '16', 0, 'سرباز', '26.6319', '61.2603', NULL, NULL),
(696, '16', 0, 'سوران', '25.2992', '60.4339', NULL, NULL),
(697, '16', 0, 'هیدوچ', '27.2650', '60.7217', NULL, NULL),
(698, '16', 0, 'فنوج', '26.5783', '58.3147', NULL, NULL),
(699, '16', 0, 'قصرقند', '26.5597', '61.2156', NULL, NULL),
(700, '16', 0, 'زرآباد', '25.4200', '60.6472', NULL, NULL),
(701, '16', 0, 'کنارک', '25.3955', '57.6865', NULL, NULL),
(702, '16', 0, 'مهرستان', '25.2911', '57.4511', NULL, NULL),
(703, '16', 0, 'میرجاوه', '29.4964', '61.8625', NULL, NULL),
(704, '16', 0, 'اسپکه', '27.1355', '60.6724', NULL, NULL),
(705, '16', 0, 'بنت', '26.3389', '60.3958', NULL, NULL),
(706, '16', 0, 'نیک شهر', '26.2369', '60.2197', NULL, NULL),
(707, '16', 0, 'ادیمی', '26.1075', '60.0133', NULL, NULL),
(708, '16', 0, 'شهرک علی اکبر', '26.5614', '60.7344', NULL, NULL),
(709, '16', 0, 'محمدآباد', '26.8072', '60.0419', NULL, NULL),
(710, '16', 0, 'دوست محمد', '26.1000', '61.6500', NULL, NULL),
(711, '17', 0, 'آباده', '31.1592', '52.6503', NULL, NULL),
(712, '17', 0, 'ایزدخواست', '31.8331', '52.2522', NULL, NULL),
(713, '17', 0, 'بهمن', '28.9811', '53.5531', NULL, NULL),
(714, '17', 0, 'سورمق', '30.1569', '51.5428', NULL, NULL),
(715, '17', 0, 'صغاد', '30.6439', '51.5872', NULL, NULL),
(716, '17', 0, 'ارسنجان', '29.1275', '53.2719', NULL, NULL),
(717, '17', 0, 'استهبان', '29.1294', '54.0428', NULL, NULL),
(718, '17', 0, 'ایج', '30.8669', '52.6900', NULL, NULL),
(719, '17', 0, 'رونیز', '30.6872', '51.5564', NULL, NULL),
(720, '17', 0, 'اقلید', '30.9033', '52.6892', NULL, NULL),
(721, '17', 0, 'حسن اباد', '30.5642', '53.1725', NULL, NULL),
(722, '17', 0, 'دژکرد', '30.6717', '50.2375', NULL, NULL),
(723, '17', 0, 'سده', '30.6492', '51.5822', NULL, NULL),
(724, '17', 0, 'بوانات', '30.4692', '51.2828', NULL, NULL),
(725, '17', 0, 'حسامی', '30.9328', '52.2708', NULL, NULL),
(726, '17', 0, 'کره ای', '31.0631', '51.5681', NULL, NULL),
(727, '17', 0, 'مزایجان', '29.4775', '51.4650', NULL, NULL),
(728, '17', 0, 'سعادت شهر', '29.6125', '51.7092', NULL, NULL),
(729, '17', 0, 'مادرسلیمان', '31.9753', '49.2994', NULL, NULL),
(730, '17', 0, 'باب انار', '29.1381', '51.2067', NULL, NULL),
(731, '17', 0, 'جهرم', '28.5164', '53.5614', NULL, NULL),
(732, '17', 0, 'خاوران', '31.5867', '54.4497', NULL, NULL),
(733, '17', 0, 'دوزه', '28.7278', '52.6258', NULL, NULL),
(734, '17', 0, 'قطب آباد', '28.6183', '53.3494', NULL, NULL),
(735, '17', 0, 'خرامه', '28.2300', '53.6236', NULL, NULL),
(736, '17', 0, 'سلطان شهر', '29.5789', '52.5867', NULL, NULL),
(737, '17', 0, 'صفاشهر', '28.9611', '53.5489', NULL, NULL),
(738, '17', 0, 'قادراباد', '28.5936', '53.6297', NULL, NULL),
(739, '17', 0, 'خنج', '27.8950', '53.4342', NULL, NULL),
(740, '17', 0, 'جنت شهر', '29.0339', '51.9069', NULL, NULL),
(741, '17', 0, 'داراب', '28.7514', '54.5481', NULL, NULL),
(742, '17', 0, 'دوبرجی', '28.9206', '54.1697', NULL, NULL),
(743, '17', 0, 'فدامی', '28.6353', '54.4394', NULL, NULL),
(744, '17', 0, 'کوپن', '29.8019', '52.8347', NULL, NULL),
(745, '17', 0, 'مصیری', '28.1617', '53.7858', NULL, NULL),
(746, '17', 0, 'حاجی آباد', '28.3083', '54.2156', NULL, NULL),
(747, '17', 0, 'دبیران', '28.9142', '54.3653', NULL, NULL),
(748, '17', 0, 'شهرپیر', '29.1625', '54.3986', NULL, NULL),
(749, '17', 0, 'اردکان', '29.9225', '53.3078', NULL, NULL),
(750, '17', 0, 'بیضا', '29.9761', '53.5583', NULL, NULL),
(751, '17', 0, 'هماشهر', '28.7744', '53.4797', NULL, NULL),
(752, '17', 0, 'سروستان', '29.2675', '53.2167', NULL, NULL),
(753, '17', 0, 'کوهنجان', '28.9408', '52.7908', NULL, NULL),
(754, '17', 0, 'خانه زنیان', '29.1592', '53.3031', NULL, NULL),
(755, '17', 0, 'داریان', '29.2806', '52.5842', NULL, NULL),
(756, '17', 0, 'زرقان', '29.7631', '52.7306', NULL, NULL),
(757, '17', 0, 'شهرصدرا', '29.9644', '52.8692', NULL, NULL),
(758, '17', 1, 'شیراز', '29.5916', '52.5838', NULL, '2025-04-03 10:10:39'),
(759, '17', 0, 'لپویی', '27.5053', '56.0322', NULL, NULL),
(760, '17', 0, 'دهرم', '30.7947', '51.9444', NULL, NULL),
(761, '17', 0, 'فراشبند', '28.8469', '52.5756', NULL, NULL),
(762, '17', 0, 'نوجین', '29.2008', '52.0558', NULL, NULL),
(763, '17', 0, 'زاهدشهر', '31.5611', '51.0472', NULL, NULL),
(764, '17', 0, 'ششده', '29.4669', '53.2994', NULL, NULL),
(765, '17', 0, 'فسا', '28.9714', '53.6475', NULL, NULL),
(766, '17', 0, 'قره بلاغ', '28.1556', '52.7544', NULL, NULL),
(767, '17', 0, 'میانشهر', '28.4778', '53.2197', NULL, NULL),
(768, '17', 0, 'نوبندگان', '27.6717', '53.1936', NULL, NULL),
(769, '17', 0, 'فیروزآباد', '28.8533', '52.5714', NULL, NULL),
(770, '17', 0, 'میمند', '29.8931', '52.1411', NULL, NULL),
(771, '17', 0, 'افزر', '29.9350', '53.3958', NULL, NULL),
(772, '17', 0, 'امام شهر', '31.6533', '51.4872', NULL, NULL),
(773, '17', 0, 'قیر', '29.5025', '51.5194', NULL, NULL),
(774, '17', 0, 'کارزین (فتح آباد)', '30.8036', '53.2292', NULL, NULL),
(775, '17', 0, 'مبارک آباددیز', '29.2703', '52.6478', NULL, NULL),
(776, '17', 0, 'بالاده', '30.3667', '51.2833', NULL, NULL),
(777, '17', 0, 'خشت', '27.2086', '56.2714', NULL, NULL),
(778, '17', 0, 'قایمیه', '29.8458', '52.9089', NULL, NULL),
(779, '17', 0, 'کازرون', '29.6167', '51.6497', NULL, NULL),
(780, '17', 0, 'کنارتخته', '29.4744', '50.9897', NULL, NULL),
(781, '17', 0, 'نودان', '30.7564', '51.5769', NULL, NULL),
(782, '17', 0, 'کوار', '29.2178', '50.2889', NULL, NULL),
(783, '17', 0, 'گراش', '29.0842', '52.6422', NULL, NULL),
(784, '17', 0, 'اوز', '30.5167', '51.9667', NULL, NULL),
(785, '17', 0, 'بنارویه', '28.9739', '51.0703', NULL, NULL),
(786, '17', 0, 'بیرم', '29.2172', '52.0522', NULL, NULL),
(787, '17', 0, 'جویم', '28.4792', '52.1603', NULL, NULL),
(788, '17', 0, 'خور', '27.6878', '54.1450', NULL, NULL),
(789, '17', 0, 'عمادده', '29.2408', '52.7831', NULL, NULL),
(790, '17', 0, 'لار', '27.6614', '54.3261', NULL, NULL),
(791, '17', 0, 'لطیفی', '27.4192', '54.2225', NULL, NULL),
(792, '17', 0, 'اشکنان', '28.0008', '52.6478', NULL, NULL),
(793, '17', 0, 'اهل', '29.0886', '52.6792', NULL, NULL),
(794, '17', 0, 'علامرودشت', '28.4850', '52.1975', NULL, NULL),
(795, '17', 0, 'لامرد', '27.3425', '53.1894', NULL, NULL),
(796, '17', 0, 'خانیمن', '30.9436', '50.4697', NULL, NULL),
(797, '17', 0, 'رامجرد', '28.9278', '52.2233', NULL, NULL),
(798, '17', 0, 'سیدان', '30.3394', '51.2275', NULL, NULL),
(799, '17', 0, 'کامفیروز', '29.3286', '52.6897', NULL, NULL),
(800, '17', 0, 'مرودشت', '29.8744', '52.8181', NULL, NULL),
(801, '17', 0, 'بابامنیر', '29.1125', '52.8197', NULL, NULL),
(802, '17', 0, 'خومه زار', '29.2767', '52.5883', NULL, NULL),
(803, '17', 0, 'نورآباد', '27.2025', '54.3661', NULL, NULL),
(804, '17', 0, 'اسیر', '28.2700', '51.2067', NULL, NULL),
(805, '17', 0, 'خوزی', '28.8722', '52.0436', NULL, NULL),
(806, '17', 0, 'گله دار', '27.9508', '52.8103', NULL, NULL),
(807, '17', 0, 'مهر', '27.5561', '52.8922', NULL, NULL),
(808, '17', 0, 'وراوی', '28.2633', '52.4061', NULL, NULL),
(809, '17', 0, 'آباده طشک', '29.1172', '52.1317', NULL, NULL),
(810, '17', 0, 'قطرویه', '29.1661', '52.4178', NULL, NULL),
(811, '17', 0, 'مشکان', '29.3494', '52.5158', NULL, NULL),
(812, '17', 0, 'نی ریز', '29.1558', '52.0728', NULL, NULL),
(813, '18', 0, 'آبیک', '36.0517', '49.6950', NULL, NULL),
(814, '18', 0, 'خاکعلی', '36.6575', '50.5628', NULL, NULL),
(815, '18', 0, 'آبگرم', '36.6256', '49.2183', NULL, NULL),
(816, '18', 0, 'آوج', '35.9786', '50.8208', NULL, NULL),
(817, '18', 0, 'الوند', '36.0592', '49.6628', NULL, NULL),
(818, '18', 0, 'بیدستان', '36.4403', '50.5711', NULL, NULL),
(819, '18', 0, 'شریفیه', '36.5147', '49.2192', NULL, NULL),
(820, '18', 0, 'محمدیه', '36.1981', '49.2025', NULL, NULL),
(821, '18', 0, 'ارداق', '36.0783', '49.6958', NULL, NULL),
(822, '18', 0, 'بویین زهرا', '35.7658', '50.0567', NULL, NULL),
(823, '18', 0, 'دانسفهان', '35.7317', '49.7072', NULL, NULL),
(824, '18', 0, 'سگزآباد', '36.1725', '50.5967', NULL, NULL),
(825, '18', 0, 'شال', '36.4706', '49.4294', NULL, NULL),
(826, '18', 0, 'اسفرورین', '35.8622', '49.8067', NULL, NULL),
(827, '18', 0, 'تاکستان', '35.7781', '50.5564', NULL, NULL),
(828, '18', 0, 'خرمدشت', '35.6900', '50.5400', NULL, NULL),
(829, '18', 0, 'ضیاڈآباد', '36.0833', '49.0333', NULL, NULL),
(830, '18', 0, 'نرجه', '36.3803', '49.1867', NULL, NULL),
(831, '18', 0, 'اقبالیه', '35.8306', '50.1175', NULL, NULL),
(832, '18', 0, 'رازمیان', '35.9494', '49.4836', NULL, NULL),
(833, '18', 0, 'سیردان', '35.7150', '49.4875', NULL, NULL),
(834, '18', 1, 'قزوین', '36.2797', '50.0047', NULL, '2025-04-03 10:09:52'),
(835, '18', 0, 'کوهین', '35.7222', '50.8011', NULL, NULL),
(836, '18', 0, 'محمودآبادنمونه', '36.3344', '49.5064', NULL, NULL),
(837, '18', 0, 'معلم کلایه', '36.6481', '49.2753', NULL, NULL),
(838, '19', 0, 'جعفریه', '34.4364', '50.9142', NULL, NULL),
(839, '19', 0, 'دستجرد', '34.4222', '50.7853', NULL, NULL),
(840, '19', 0, 'سلفچگان', '34.4942', '50.4528', NULL, NULL),
(841, '19', 1, 'قم', '34.6394', '50.8759', NULL, '2025-04-03 10:10:57'),
(842, '19', 0, 'قنوات', '34.3681', '50.3847', NULL, NULL),
(843, '19', 0, 'کهک', '34.3875', '50.8181', NULL, NULL),
(844, '20', 0, 'آرمرده', '35.2836', '47.0069', NULL, NULL),
(845, '20', 0, 'بانه', '35.9975', '45.8858', NULL, NULL),
(846, '20', 0, 'بویین سفلی', '35.8703', '50.7986', NULL, NULL),
(847, '20', 0, 'کانی سور', '35.4050', '46.3019', NULL, NULL),
(848, '20', 0, 'بابارشانی', '35.6242', '47.9611', NULL, NULL),
(849, '20', 0, 'بیجار', '35.8697', '47.6014', NULL, NULL),
(850, '20', 0, 'پیرتاج', '36.0458', '45.6797', NULL, NULL),
(851, '20', 0, 'توپ آغاج', '35.2275', '47.0005', NULL, NULL),
(852, '20', 0, 'یاسوکند', '35.8683', '46.0272', NULL, NULL),
(853, '20', 0, 'بلبان آباد', '35.3022', '46.3586', NULL, NULL),
(854, '20', 0, 'دهگلان', '35.2394', '47.0032', NULL, NULL),
(855, '20', 0, 'دیواندره', '35.9230', '47.0385', NULL, NULL),
(856, '20', 0, 'زرینه', '35.2811', '46.3667', NULL, NULL);
INSERT INTO `province_cities` (`id`, `parent_id`, `centerOfProvince`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(857, '20', 0, 'اورامان تخت', '35.1842', '46.6553', NULL, NULL),
(858, '20', 0, 'سروآباد', '35.3113', '46.3541', NULL, NULL),
(859, '20', 0, 'سقز', '36.2496', '46.2653', NULL, NULL),
(861, '20', 1, 'سنندج', '35.3143', '46.9923', NULL, '2025-04-03 10:11:07'),
(862, '20', 0, 'شویشه', '35.1801', '46.6714', NULL, NULL),
(863, '20', 0, 'دزج', '35.9421', '47.0263', NULL, NULL),
(864, '20', 0, 'دلبران', '35.9344', '46.6126', NULL, NULL),
(865, '20', 0, 'سریش آباد', '35.5282', '46.2884', NULL, NULL),
(866, '20', 0, 'قروه', '35.1639', '47.8052', NULL, NULL),
(867, '20', 0, 'کامیاران', '35.8147', '46.9384', NULL, NULL),
(868, '20', 0, 'موچش', '35.5339', '46.2283', NULL, NULL),
(869, '20', 0, 'برده رشه', '35.9220', '46.2973', NULL, NULL),
(870, '20', 0, 'چناره', '35.7769', '46.7081', NULL, NULL),
(871, '20', 0, 'کانی دینار', '35.2750', '46.9813', NULL, NULL),
(872, '20', 0, 'مریوان', '35.5303', '46.1759', NULL, NULL),
(873, '21', 0, 'ارزوییه', '31.2554', '56.7570', NULL, NULL),
(874, '21', 0, 'امین شهر', '31.2372', '56.7739', NULL, NULL),
(875, '21', 0, 'انار', '30.8684', '55.3556', NULL, NULL),
(876, '21', 0, 'بافت', '31.6124', '56.3667', NULL, NULL),
(877, '21', 0, 'بزنجان', '30.4716', '55.3232', NULL, NULL),
(878, '21', 0, 'بردسیر', '29.9230', '56.5731', NULL, NULL),
(879, '21', 0, 'دشتکار', '31.4450', '56.0147', NULL, NULL),
(880, '21', 0, 'گلزار', '30.4839', '55.9619', NULL, NULL),
(881, '21', 0, 'لاله زار', '29.5147', '55.7978', NULL, NULL),
(882, '21', 0, 'نگار', '30.5820', '56.2643', NULL, NULL),
(883, '21', 0, 'بروات', '30.2582', '56.6182', NULL, NULL),
(884, '21', 0, 'بم', '29.1060', '58.3540', NULL, NULL),
(885, '21', 0, 'بلوک', '27.2014', '61.1957', NULL, NULL),
(886, '21', 0, 'جبالبارز', '27.6906', '59.1053', NULL, NULL),
(887, '21', 0, 'جیرفت', '28.6835', '57.7434', NULL, NULL),
(888, '21', 0, 'درب بهشت', '28.9601', '57.9566', NULL, NULL),
(889, '21', 0, 'رابر', '29.6161', '56.5434', NULL, NULL),
(890, '21', 0, 'هنزا', '29.0240', '56.8299', NULL, NULL),
(891, '21', 0, 'راور', '29.9135', '56.5895', NULL, NULL),
(892, '21', 0, 'هجدک', '28.6758', '57.7869', NULL, NULL),
(893, '21', 0, 'بهرمان', '30.0042', '57.3171', NULL, NULL),
(894, '21', 0, 'رفسنجان', '30.4058', '55.9935', NULL, NULL),
(895, '21', 0, 'صفاییه', '29.2513', '55.6863', NULL, NULL),
(896, '21', 0, 'کشکوییه', '29.5555', '56.5377', NULL, NULL),
(897, '21', 0, 'مس سرچشمه', '30.8756', '57.1737', NULL, NULL),
(898, '21', 0, 'رودبار', '30.1746', '57.6470', NULL, NULL),
(899, '21', 0, 'زهکلوت', '29.2106', '56.5575', NULL, NULL),
(900, '21', 0, 'گنبکی', '28.5333', '57.8239', NULL, NULL),
(901, '21', 0, 'محمدآباد', '32.8664', '54.0175', NULL, NULL),
(902, '21', 0, 'خانوک', '32.6547', '54.6772', NULL, NULL),
(903, '21', 0, 'ریحان', '30.3992', '55.9939', NULL, NULL),
(904, '21', 0, 'زرند', '31.3961', '54.3417', NULL, NULL),
(905, '21', 0, 'یزدان شهر', '31.8975', '54.3608', NULL, NULL),
(906, '21', 0, 'بلورد', '33.5950', '51.2436', NULL, NULL),
(907, '21', 0, 'پاریز', '33.8986', '51.4547', NULL, NULL),
(908, '21', 0, 'خواجو شهر', '34.3833', '58.3175', NULL, NULL),
(909, '21', 0, 'زیدآباد', '31.7397', '54.5600', NULL, NULL),
(910, '21', 0, 'سیرجان', '29.4511', '55.6711', NULL, NULL),
(911, '21', 0, 'نجف شهر', '32.0050', '51.8769', NULL, NULL),
(912, '21', 0, 'هماشهر', '32.2619', '52.9544', NULL, NULL),
(913, '21', 0, 'جوزم', '32.3072', '54.0128', NULL, NULL),
(914, '21', 0, 'خاتون اباد', '32.6500', '51.6556', NULL, NULL),
(915, '21', 0, 'خورسند', '31.3336', '55.3975', NULL, NULL),
(916, '21', 0, 'دهج', '30.8036', '56.5639', NULL, NULL),
(917, '21', 0, 'شهربابک', '30.1169', '55.1186', NULL, NULL),
(918, '21', 0, 'دوساری', '28.7536', '54.5719', NULL, NULL),
(919, '21', 0, 'عنبرآباد', '31.6225', '55.4147', NULL, NULL),
(920, '21', 0, 'مردهک', '29.7792', '54.3744', NULL, NULL),
(921, '21', 0, 'فاریاب', '28.9333', '53.6333', NULL, NULL),
(922, '21', 0, 'فهرج', '28.9467', '56.2736', NULL, NULL),
(923, '21', 0, 'قلعه گنج', '27.5211', '54.2925', NULL, NULL),
(924, '21', 0, 'اختیارآباد', '30.8164', '53.9078', NULL, NULL),
(925, '21', 0, 'اندوهجرد', '32.2569', '52.2922', NULL, NULL),
(926, '21', 0, 'باغین', '28.9175', '54.3450', NULL, NULL),
(927, '21', 0, 'جوپار', '31.3433', '53.6958', NULL, NULL),
(928, '21', 0, 'چترود', '32.7953', '52.6158', NULL, NULL),
(929, '21', 0, 'راین', '31.8197', '54.3233', NULL, NULL),
(930, '21', 0, 'زنگی آباد', '31.0469', '54.5347', NULL, NULL),
(931, '21', 0, 'شهداد', '31.5353', '54.4461', NULL, NULL),
(932, '21', 0, 'کاظم آباد', '32.6164', '51.3661', NULL, NULL),
(933, '21', 1, 'کرمان', '30.2833', '57.0833', NULL, '2025-04-03 10:11:50'),
(934, '21', 0, 'گلباف', '30.4847', '55.7253', NULL, NULL),
(935, '21', 0, 'ماهان', '31.5844', '56.2844', NULL, NULL),
(936, '21', 0, 'محی آباد', '28.4981', '54.1972', NULL, NULL),
(937, '21', 0, 'کوهبنان', '33.5292', '47.6061', NULL, NULL),
(938, '21', 0, 'کیانشهر', '31.4242', '56.2836', NULL, NULL),
(939, '21', 0, 'کهنوج', '27.9761', '56.3294', NULL, NULL),
(940, '21', 0, 'منوجان', '27.3639', '57.2006', NULL, NULL),
(941, '21', 0, 'نودژ', '27.4639', '57.1883', NULL, NULL),
(942, '21', 0, 'نرماشیر', '27.2531', '57.4453', NULL, NULL),
(943, '21', 0, 'نظام شهر', '32.2000', '56.0167', NULL, NULL),
(944, '22', 0, 'اسلام آبادغرب', '34.1139', '46.1461', NULL, NULL),
(945, '22', 0, 'حمیل', '34.1975', '45.7667', NULL, NULL),
(946, '22', 0, 'بانوره', '34.9408', '45.8728', NULL, NULL),
(947, '22', 0, 'باینگان', '34.6483', '46.6519', NULL, NULL),
(948, '22', 0, 'پاوه', '35.0431', '46.3564', NULL, NULL),
(949, '22', 0, 'نودشه', '34.5525', '47.3447', NULL, NULL),
(950, '22', 0, 'نوسود', '34.3675', '47.9917', NULL, NULL),
(951, '22', 0, 'ازگله', '34.7278', '46.4569', NULL, NULL),
(952, '22', 0, 'تازه آباد', '34.1969', '47.6772', NULL, NULL),
(953, '22', 0, 'جوانرود', '34.8017', '46.4489', NULL, NULL),
(954, '22', 0, 'ریجاب', '34.0794', '47.9214', NULL, NULL),
(955, '22', 0, 'کرند', '34.5636', '47.9494', NULL, NULL),
(956, '22', 0, 'گهواره', '34.7981', '47.6053', NULL, NULL),
(957, '22', 0, 'روانسر', '34.7286', '46.6586', NULL, NULL),
(958, '22', 0, 'شاهو', '34.7131', '46.6600', NULL, NULL),
(959, '22', 0, 'سرپل ذهاب', '34.4600', '45.8639', NULL, NULL),
(960, '22', 0, 'سطر', '34.4994', '46.0428', NULL, NULL),
(961, '22', 0, 'سنقر', '34.7836', '47.6014', NULL, NULL),
(962, '22', 0, 'صحنه', '34.4786', '47.6867', NULL, NULL),
(963, '22', 0, 'میان راهان', '34.8103', '47.5547', NULL, NULL),
(964, '22', 0, 'سومار', '34.1992', '45.8497', NULL, NULL),
(965, '22', 0, 'قصرشیرین', '34.5128', '45.5772', NULL, NULL),
(966, '22', 0, 'رباط', '34.2094', '47.5467', NULL, NULL),
(967, '22', 1, 'کرمانشاه', '34.3142', '47.0650', NULL, '2025-04-03 10:12:02'),
(968, '22', 0, 'کوزران', '34.3975', '47.9453', NULL, NULL),
(969, '22', 0, 'هلشی', '34.4386', '46.2517', NULL, NULL),
(970, '22', 0, 'کنگاور', '34.5042', '47.9633', NULL, NULL),
(971, '22', 0, 'گودین', '34.8642', '46.2456', NULL, NULL),
(972, '22', 0, 'سرمست', '34.3617', '47.4036', NULL, NULL),
(973, '22', 0, 'گیلانغرب', '34.1392', '45.9206', NULL, NULL),
(974, '22', 0, 'بیستون', '34.3881', '47.4494', NULL, NULL),
(975, '22', 0, 'هرسین', '34.2681', '47.5864', NULL, NULL),
(976, '23', 0, 'باشت', '30.3622', '51.1700', NULL, NULL),
(977, '23', 0, 'چیتاب', '30.7133', '51.3456', NULL, NULL),
(978, '23', 0, 'گراب سفلی', '30.1708', '50.4189', NULL, NULL),
(979, '23', 0, 'مادوان', '30.1869', '51.5328', NULL, NULL),
(980, '23', 0, 'مارگون', '30.1867', '50.1994', NULL, NULL),
(981, '23', 1, 'یاسوج', '30.6686', '51.5878', NULL, '2025-04-03 10:12:23'),
(982, '23', 0, 'لیکک', '30.9614', '51.5581', NULL, NULL),
(983, '23', 0, 'چرام', '30.7450', '51.6772', NULL, NULL),
(984, '23', 0, 'سرفاریاب', '30.8350', '51.5731', NULL, NULL),
(985, '23', 0, 'پاتاوه', '30.1000', '51.2864', NULL, NULL),
(986, '23', 0, 'سی سخت', '30.1397', '51.5453', NULL, NULL),
(987, '23', 0, 'دهدشت', '30.7928', '50.5603', NULL, NULL),
(988, '23', 0, 'دیشموک', '30.8492', '51.5636', NULL, NULL),
(989, '23', 0, 'سوق', '30.0067', '50.1753', NULL, NULL),
(990, '23', 0, 'قلعه رییسی', '30.6978', '51.1603', NULL, NULL),
(991, '23', 0, 'دوگنبدان', '30.3636', '50.7986', NULL, NULL),
(992, '23', 0, 'لنده', '30.9753', '50.4233', NULL, NULL),
(993, '24', 0, 'آزادشهر', '37.0870', '55.1754', NULL, NULL),
(994, '24', 0, 'نگین شهر', '36.9525', '54.5428', NULL, NULL),
(995, '24', 0, 'نوده خاندوز', '36.6456', '54.7994', NULL, NULL),
(996, '24', 0, 'آق قلا', '37.0139', '54.4569', NULL, NULL),
(997, '24', 0, 'انبارآلوم', '37.2439', '55.1692', NULL, NULL),
(998, '24', 0, 'بندرگز', '36.7653', '53.9547', NULL, NULL),
(999, '24', 0, 'نوکنده', '36.6903', '53.2547', NULL, NULL),
(1000, '24', 0, 'بندرترکمن', '36.9025', '54.0731', NULL, NULL),
(1001, '24', 0, 'تاتارعلیا', '37.7320', '55.6424', NULL, NULL),
(1002, '24', 0, 'خان ببین', '37.6861', '55.6667', NULL, NULL),
(1003, '24', 0, 'دلند', '37.7705', '55.8915', NULL, NULL),
(1004, '24', 0, 'رامیان', '37.0133', '54.4502', NULL, NULL),
(1005, '24', 0, 'سنگدوین', '37.2729', '55.5094', NULL, NULL),
(1006, '24', 0, 'علی اباد', '36.9375', '54.8832', NULL, NULL),
(1007, '24', 0, 'فاضل آباد', '37.1408', '55.1563', NULL, NULL),
(1008, '24', 0, 'مزرعه', '37.7120', '55.5454', NULL, NULL),
(1009, '24', 0, 'کردکوی', '37.7987', '55.4063', NULL, NULL),
(1010, '24', 0, 'فراغی', '37.6056', '55.3075', NULL, NULL),
(1011, '24', 0, 'کلاله', '37.3860', '55.4914', NULL, NULL),
(1012, '24', 0, 'گالیکش', '37.2567', '55.4271', NULL, NULL),
(1013, '24', 0, 'جلین', '37.1469', '55.5163', NULL, NULL),
(1014, '24', 0, 'سرخنکلاته', '37.1351', '55.3982', NULL, NULL),
(1015, '24', 1, 'گرگان', '36.8384', '54.4409', NULL, '2025-04-03 10:12:42'),
(1016, '24', 0, 'سیمین شهر', '36.5823', '52.6716', NULL, NULL),
(1017, '24', 0, 'گمیش تپه', '37.0658', '54.1458', NULL, NULL),
(1018, '24', 0, 'اینچه برون', '37.7986', '55.4784', NULL, NULL),
(1019, '24', 0, 'گنبدکاووس', '37.2522', '55.1691', NULL, NULL),
(1020, '24', 0, 'مراوه', '37.3656', '55.4562', NULL, NULL),
(1021, '24', 0, 'مینودشت', '37.2219', '55.3786', NULL, NULL),
(1022, '25', 0, 'آستارا', '38.4291', '48.8755', NULL, NULL),
(1023, '25', 0, 'لوندویل', '37.1126', '50.0469', NULL, NULL),
(1024, '25', 0, 'آستانه اشرفیه', '37.2555', '49.9443', NULL, NULL),
(1025, '25', 0, 'کیاشهر', '37.2708', '49.9589', NULL, NULL),
(1026, '25', 0, 'املش', '37.0904', '50.1768', NULL, NULL),
(1027, '25', 0, 'رانکوه', '37.0143', '49.5117', NULL, NULL),
(1028, '25', 0, 'بندرانزلی', '37.4644', '49.4788', NULL, NULL),
(1029, '25', 0, 'خشکبیجار', '37.9478', '48.9303', NULL, NULL),
(1030, '25', 0, 'خمام', '37.4008', '49.5648', NULL, NULL),
(1031, '25', 1, 'رشت', '37.2800', '49.5832', NULL, '2025-04-03 10:12:52'),
(1032, '25', 0, 'سنگر', '36.8436', '49.4131', NULL, NULL),
(1033, '25', 0, 'کوچصفهان', '36.6363', '49.1708', NULL, NULL),
(1034, '25', 0, 'لشت نشاء', '37.0234', '50.3453', NULL, NULL),
(1035, '25', 0, 'لولمان', '37.2586', '49.7003', NULL, NULL),
(1036, '25', 0, 'پره سر', '37.7964', '49.5383', NULL, NULL),
(1037, '25', 0, 'رضوانشهر', '37.2025', '49.5383', NULL, NULL),
(1038, '25', 0, 'بره سر', '37.2728', '49.7861', NULL, NULL),
(1039, '25', 0, 'توتکابن', '37.8000', '49.4500', NULL, NULL),
(1040, '25', 0, 'جیرنده', '37.0314', '48.9964', NULL, NULL),
(1041, '25', 0, 'رستم آباد', '37.4167', '49.7000', NULL, NULL),
(1042, '25', 0, 'رودبار', '36.8115', '49.4236', NULL, NULL),
(1043, '25', 0, 'لوشان', '37.2567', '50.0036', NULL, NULL),
(1044, '25', 0, 'منجیل', '37.1928', '49.6578', NULL, NULL),
(1045, '25', 0, 'چابکسر', '37.4344', '49.6428', NULL, NULL),
(1046, '25', 0, 'رحیم آباد', '37.1905', '50.1365', NULL, NULL),
(1047, '25', 0, 'رودسر', '37.1406', '50.2948', NULL, NULL),
(1048, '25', 0, 'کلاچای', '37.3669', '50.0139', NULL, NULL),
(1049, '25', 0, 'واجارگاه', '37.2015', '49.7860', NULL, NULL),
(1050, '25', 0, 'دیلمان', '37.1685', '49.3938', NULL, NULL),
(1051, '25', 0, 'سیاهکل', '37.1570', '49.8960', NULL, NULL),
(1052, '25', 0, 'احمدسرگوراب', '37.4264', '49.5507', NULL, NULL),
(1053, '25', 0, 'شفت', '37.1997', '49.3110', NULL, NULL),
(1054, '25', 0, 'صومعه سرا', '37.3042', '49.3085', NULL, NULL),
(1055, '25', 0, 'گوراب زرمیخ', '37.5548', '49.1336', NULL, NULL),
(1056, '25', 0, 'مرجقل', '37.1857', '49.7825', NULL, NULL),
(1057, '25', 0, 'اسالم', '37.2893', '49.2919', NULL, NULL),
(1058, '25', 0, 'چوبر', '37.3644', '49.0517', NULL, NULL),
(1059, '25', 0, 'حویق', '37.0944', '49.5306', NULL, NULL),
(1060, '25', 0, 'لیسار', '37.2838', '49.0019', NULL, NULL),
(1061, '25', 0, 'هشتپر (تالش)', '37.7511', '48.9074', NULL, NULL),
(1062, '25', 0, 'فومن', '37.2331', '49.3037', NULL, NULL),
(1063, '25', 0, 'ماسوله', '37.3770', '49.1302', NULL, NULL),
(1064, '25', 0, 'ماکلوان', '37.3000', '49.3500', NULL, NULL),
(1065, '25', 0, 'رودبنه', '37.1833', '49.2995', NULL, NULL),
(1066, '25', 0, 'لاهیجان', '37.2077', '49.9852', NULL, NULL),
(1067, '25', 0, 'اطاقور', '37.3565', '49.8237', NULL, NULL),
(1068, '25', 0, 'چاف و چمخاله', '37.4942', '48.8981', NULL, NULL),
(1069, '25', 0, 'شلمان', '37.2245', '49.7981', NULL, NULL),
(1070, '25', 0, 'کومله', '37.1569', '49.2002', NULL, NULL),
(1071, '25', 0, 'لنگرود', '37.1979', '50.1496', NULL, NULL),
(1072, '25', 0, 'بازار جمعه', '37.1570', '49.8960', NULL, NULL),
(1073, '25', 0, 'ماسال', '37.3779', '49.1319', NULL, NULL),
(1074, '26', 0, 'ازنا', '33.4525', '48.3485', NULL, NULL),
(1075, '26', 0, 'مومن آباد', '34.2853', '47.9566', NULL, NULL),
(1076, '26', 0, 'الیگودرز', '33.3992', '49.6964', NULL, NULL),
(1077, '26', 0, 'شول آباد', '33.9263', '48.2784', NULL, NULL),
(1078, '26', 0, 'اشترینان', '33.8542', '48.0200', NULL, NULL),
(1079, '26', 0, 'بروجرد', '33.8942', '48.7551', NULL, NULL),
(1080, '26', 0, 'پلدختر', '33.1533', '47.7095', NULL, NULL),
(1081, '26', 0, 'معمولان', '33.5708', '48.1050', NULL, NULL),
(1082, '26', 0, 'بیران شهر', '33.7390', '47.6053', NULL, NULL),
(1083, '26', 1, 'خرم آباد', '33.4878', '48.3558', NULL, '2025-04-03 10:13:29'),
(1084, '26', 0, 'زاغه', '34.3244', '47.0400', NULL, NULL),
(1085, '26', 0, 'سپیددشت', '33.4844', '48.4425', NULL, NULL),
(1086, '26', 0, 'نورآباد', '33.9232', '48.7671', NULL, NULL),
(1087, '26', 0, 'هفت چشمه', '34.207976', '47.763011', NULL, NULL),
(1088, '26', 0, 'چالانچولان', '33.7254', '48.9334', NULL, NULL),
(1089, '26', 0, 'دورود', '33.4954', '49.0613', NULL, NULL),
(1090, '26', 0, 'سراب دوره', '33.5956', '47.8920', NULL, NULL),
(1091, '26', 0, 'ویسیان', '33.7723', '48.0475', NULL, NULL),
(1092, '26', 0, 'چقابل', '33.9325', '48.2491', NULL, NULL),
(1093, '26', 0, 'الشتر', '33.9914', '47.6065', NULL, NULL),
(1094, '26', 0, 'فیروزآباد', '33.6095', '49.2194', NULL, NULL),
(1095, '26', 0, 'درب گنبد', '33.5817', '47.9546', NULL, NULL),
(1096, '26', 0, 'کوهدشت', '33.5339', '47.6093', NULL, NULL),
(1097, '26', 0, 'کوهنانی', '33.7639', '47.3917', NULL, NULL),
(1098, '26', 0, 'گراب', '33.6808', '48.1376', NULL, NULL),
(1099, '27', 0, 'آمل', '36.4699', '52.3146', NULL, NULL),
(1100, '27', 0, 'امامزاده عبدالله', '36.4684', '52.3217', NULL, NULL),
(1101, '27', 0, 'دابودشت', '36.1682', '52.7991', NULL, NULL),
(1102, '27', 0, 'رینه', '36.5733', '52.2407', NULL, NULL),
(1103, '27', 0, 'گزنک', '36.8604', '52.8972', NULL, NULL),
(1104, '27', 0, 'امیرکلا', '36.4878', '52.3581', NULL, NULL),
(1105, '27', 0, 'بابل', '36.5536', '52.6781', NULL, NULL),
(1106, '27', 0, 'خوش رودپی', '36.2226', '53.1692', NULL, NULL),
(1107, '27', 0, 'زرگرمحله', '36.4882', '52.3588', NULL, NULL),
(1108, '27', 0, 'گتاب', '36.7156', '52.0637', NULL, NULL),
(1109, '27', 0, 'گلوگاه', '36.7524', '53.7979', NULL, NULL),
(1110, '27', 0, 'مرزیکلا', '36.8327', '53.9582', NULL, NULL),
(1111, '27', 0, 'بابلسر', '36.7026', '52.6663', NULL, NULL),
(1112, '27', 0, 'بهنمیر', '36.7350', '52.7700', NULL, NULL),
(1113, '27', 0, 'هادی شهر', '36.5920', '52.8811', NULL, NULL),
(1114, '27', 0, 'بهشهر', '36.6911', '53.5539', NULL, NULL),
(1115, '27', 0, 'خلیل شهر', '36.7044', '53.5492', NULL, NULL),
(1116, '27', 0, 'رستمکلا', '36.6074', '52.5917', NULL, NULL),
(1117, '27', 0, 'تنکابن', '36.8169', '50.8733', NULL, NULL),
(1118, '27', 0, 'خرم آباد', '33.4878', '48.3558', NULL, NULL),
(1119, '27', 0, 'شیرود', '36.6917', '53.5333', NULL, NULL),
(1120, '27', 0, 'نشتارود', '36.2156', '51.1550', NULL, NULL),
(1121, '27', 0, 'جویبار', '36.6410', '52.9111', NULL, NULL),
(1122, '27', 0, 'کوهی خیل', '36.9564', '51.5376', NULL, NULL),
(1123, '27', 0, 'چالوس', '36.6531', '51.4151', NULL, NULL),
(1124, '27', 0, 'مرزن آباد', '36.8386', '51.7353', NULL, NULL),
(1125, '27', 0, 'هچیرود', '36.2994', '51.9817', NULL, NULL),
(1126, '27', 0, 'رامسر', '36.9226', '50.6633', NULL, NULL),
(1127, '27', 0, 'کتالم وسادات شهر', '36.4398', '52.2145', NULL, NULL),
(1128, '27', 0, 'پایین هولار', '36.1583', '52.9148', NULL, NULL),
(1129, '27', 1, 'ساری', '36.5671', '53.0593', NULL, '2025-04-03 10:14:15'),
(1130, '27', 0, 'فریم', '36.3153', '52.8550', NULL, NULL),
(1131, '27', 0, 'کیاسر', '37.1040', '49.8558', NULL, NULL),
(1132, '27', 0, 'آلاشت', '36.2820', '51.3398', NULL, NULL),
(1133, '27', 0, 'پل سفید', '36.5472', '52.1334', NULL, NULL),
(1134, '27', 0, 'زیرآب', '36.6333', '53.1333', NULL, NULL),
(1135, '27', 0, 'شیرگاه', '36.2150', '53.1566', NULL, NULL),
(1136, '27', 0, 'کیاکلا', '36.6875', '52.6750', NULL, NULL),
(1137, '27', 0, 'سلمان شهر', '36.6822', '52.5993', NULL, NULL),
(1138, '27', 0, 'عباس اباد', '36.5924', '52.8911', NULL, NULL),
(1139, '27', 0, 'کلارآباد', '36.6812', '52.7185', NULL, NULL),
(1140, '27', 0, 'فریدونکنار', '36.6860', '52.5228', NULL, NULL),
(1141, '27', 0, 'ارطه', '36.9053', '52.6155', NULL, NULL),
(1142, '27', 0, 'قایم شهر', '36.2682', '52.2166', NULL, NULL),
(1143, '27', 0, 'کلاردشت', '36.7417', '51.1203', NULL, NULL),
(1144, '27', 0, 'گلوگاه', '36.7474', '53.9112', NULL, NULL),
(1145, '27', 0, 'سرخرود', '36.3203', '53.5709', NULL, NULL),
(1146, '27', 0, 'محمودآباد', '36.6428', '52.1999', NULL, NULL),
(1147, '27', 0, 'سورک', '36.5272', '53.0534', NULL, NULL),
(1148, '27', 0, 'نکا', '36.6481', '53.2981', NULL, NULL),
(1149, '27', 0, 'ایزدشهر', '36.6773', '52.5400', NULL, NULL),
(1150, '27', 0, 'بلده', '36.4667', '52.3644', NULL, NULL),
(1151, '27', 0, 'چمستان', '36.6572', '52.8202', NULL, NULL),
(1152, '27', 0, 'رویان', '36.2689', '51.9917', NULL, NULL),
(1153, '27', 0, 'نور', '36.5642', '52.8017', NULL, NULL),
(1154, '27', 0, 'پول', '36.3222', '52.8015', NULL, NULL),
(1155, '27', 0, 'کجور', '36.2158', '52.9354', NULL, NULL),
(1156, '27', 0, 'نوشهر', '36.6486', '51.4989', NULL, NULL),
(1157, '28', 0, 'آشتیان', '34.5217', '50.0097', NULL, NULL),
(1158, '28', 1, 'اراک', '34.0917', '49.6892', NULL, '2025-04-03 10:14:27'),
(1159, '28', 0, 'داودآباد', '33.6017', '50.2667', NULL, NULL),
(1160, '28', 0, 'ساروق', '33.6417', '49.8583', NULL, NULL),
(1161, '28', 0, 'کارچان', '33.8972', '49.1783', NULL, NULL),
(1162, '28', 0, 'تفرش', '34.6967', '50.0167', NULL, NULL),
(1163, '28', 0, 'خمین', '33.6417', '50.0764', NULL, NULL),
(1164, '28', 0, 'قورچی باشی', '33.5333', '49.2711', NULL, NULL),
(1165, '28', 0, 'جاورسیان', '34.2936', '50.4275', NULL, NULL),
(1166, '28', 0, 'خنداب', '33.5294', '48.5489', NULL, NULL),
(1167, '28', 0, 'دلیجان', '33.9908', '50.6833', NULL, NULL),
(1168, '28', 0, 'نراق', '34.0139', '49.2411', NULL, NULL),
(1169, '28', 0, 'پرندک', '33.6639', '50.0669', NULL, NULL),
(1170, '28', 0, 'خشکرود', '34.4833', '49.9833', NULL, NULL),
(1171, '28', 0, 'رازقان', '34.7092', '49.1744', NULL, NULL),
(1172, '28', 0, 'زاویه', '33.9217', '49.4511', NULL, NULL),
(1173, '28', 0, 'مامونیه', '34.7261', '50.4408', NULL, NULL),
(1174, '28', 0, 'آوه', '34.7992', '50.0758', NULL, NULL),
(1175, '28', 0, 'ساوه', '35.0183', '50.3319', NULL, NULL),
(1176, '28', 0, 'غرق آباد', '33.8983', '50.4075', NULL, NULL),
(1177, '28', 0, 'نوبران', '34.0572', '49.3622', NULL, NULL),
(1178, '28', 0, 'آستانه', '34.0525', '49.6989', NULL, NULL),
(1179, '28', 0, 'توره', '34.0428', '49.4942', NULL, NULL),
(1180, '28', 0, 'شازند', '33.9367', '49.4042', NULL, NULL),
(1181, '28', 0, 'شهباز', '34.0817', '49.6889', NULL, NULL),
(1182, '28', 0, 'مهاجران', '34.0383', '50.5758', NULL, NULL),
(1183, '28', 0, 'هندودر', '34.7128', '49.9172', NULL, NULL),
(1184, '28', 0, 'خنجین', '34.7994', '49.3964', NULL, NULL),
(1185, '28', 0, 'فرمهین', '34.5544', '49.1547', NULL, NULL),
(1186, '28', 0, 'کمیجان', '33.7503', '49.9289', NULL, NULL),
(1187, '28', 0, 'میلاجرد', '33.9100', '49.6975', NULL, NULL),
(1188, '28', 0, 'محلات', '33.9061', '50.4481', NULL, NULL),
(1189, '28', 0, 'نیمور', '33.9125', '50.6028', NULL, NULL),
(1190, '29', 0, 'ابوموسی', '25.8643', '55.0186', NULL, NULL),
(1191, '29', 0, 'بستک', '27.1994', '54.3661', NULL, NULL),
(1192, '29', 0, 'جناح', '27.3694', '53.1944', NULL, NULL),
(1193, '29', 0, 'سردشت', '29.2769', '51.2093', NULL, NULL),
(1194, '29', 0, 'گوهران', '27.4998', '53.8622', NULL, NULL),
(1195, '29', 1, 'بندرعباس', '27.1895', '56.2808', NULL, '2025-04-03 10:14:41'),
(1196, '29', 0, 'تازیان پایین', '27.6687', '54.3212', NULL, NULL),
(1197, '29', 0, 'تخت', '27.6947', '54.4313', NULL, NULL),
(1198, '29', 0, 'فین', '27.8204', '54.5942', NULL, NULL),
(1199, '29', 0, 'قلعه قاضی', '27.6255', '54.4397', NULL, NULL),
(1200, '29', 0, 'بندرلنگه', '26.5575', '54.8946', NULL, NULL),
(1201, '29', 0, 'چارک', '27.5984', '54.0683', NULL, NULL),
(1202, '29', 0, 'کنگ', '27.8405', '52.0619', NULL, NULL),
(1203, '29', 0, 'کیش', '26.5254', '53.9670', NULL, NULL),
(1204, '29', 0, 'لمزان', '26.9927', '57.5394', NULL, NULL),
(1205, '29', 0, 'پارسیان', '27.2015', '53.0425', NULL, NULL),
(1206, '29', 0, 'دشتی', '27.6826', '54.0171', NULL, NULL),
(1207, '29', 0, 'کوشکنار', '27.2041', '53.0801', NULL, NULL),
(1208, '29', 0, 'بندرجاسک', '25.6493', '57.7686', NULL, NULL),
(1209, '29', 0, 'حاجی اباد', '27.0976', '54.4015', NULL, NULL),
(1210, '29', 0, 'سرگز', '26.6034', '57.8834', NULL, NULL),
(1211, '29', 0, 'فارغان', '27.7745', '54.4948', NULL, NULL),
(1212, '29', 0, 'خمیر', '27.8426', '53.4385', NULL, NULL),
(1213, '29', 0, 'رویدر', '27.7455', '54.4259', NULL, NULL),
(1214, '29', 0, 'بیکاء', '26.5475', '57.8673', NULL, NULL),
(1215, '29', 0, 'دهبارز', '26.5644', '54.8786', NULL, NULL),
(1216, '29', 0, 'زیارتعلی', '27.4522', '54.1247', NULL, NULL),
(1217, '29', 0, 'سیریک', '26.5206', '57.1802', NULL, NULL),
(1218, '29', 0, 'کوهستک', '27.8639', '52.8905', NULL, NULL),
(1219, '29', 0, 'گروک', '26.7581', '55.9013', NULL, NULL),
(1220, '29', 0, 'درگهان', '27.7102', '53.6873', NULL, NULL),
(1221, '29', 0, 'سوزا', '26.9825', '57.2553', NULL, NULL),
(1222, '29', 0, 'قشم', '26.9484', '56.2719', NULL, NULL),
(1223, '29', 0, 'هرمز', '27.1061', '56.5558', NULL, NULL),
(1224, '29', 0, 'تیرور', '27.6967', '57.2078', NULL, NULL),
(1225, '29', 0, 'سندرک', '26.7946', '55.8884', NULL, NULL),
(1226, '29', 0, 'میناب', '27.1287', '57.0661', NULL, NULL),
(1227, '29', 0, 'هشتبندی', '27.2039', '54.3515', NULL, NULL),
(1228, '30', 0, 'آجین', '34.7798', '48.5773', NULL, NULL),
(1229, '30', 0, 'اسدآباد', '34.7825', '48.1189', NULL, NULL),
(1230, '30', 0, 'بهار', '34.9075', '48.4407', NULL, NULL),
(1231, '30', 0, 'صالح آباد', '34.6505', '48.4602', NULL, NULL),
(1232, '30', 0, 'لالجین', '34.9972', '48.4258', NULL, NULL),
(1233, '30', 0, 'مهاجران', '34.7325', '48.1344', NULL, NULL),
(1234, '30', 0, 'تویسرکان', '34.5489', '48.4432', NULL, NULL),
(1235, '30', 0, 'سرکان', '34.5544', '48.4784', NULL, NULL),
(1236, '30', 0, 'فرسفج', '34.4322', '48.0220', NULL, NULL),
(1237, '30', 0, 'دمق', '34.7472', '47.9447', NULL, NULL),
(1238, '30', 0, 'رزن', '34.5291', '47.9873', NULL, NULL),
(1239, '30', 0, 'قروه درجزین', '34.5953', '47.8296', NULL, NULL),
(1240, '30', 0, 'فامنین', '34.7702', '47.8694', NULL, NULL),
(1241, '30', 0, 'شیرین سو', '34.8777', '47.9183', NULL, NULL),
(1242, '30', 0, 'کبودرآهنگ', '34.2073', '47.9734', NULL, NULL),
(1243, '30', 0, 'گل تپه', '34.4215', '48.1925', NULL, NULL),
(1244, '30', 0, 'ازندریان', '34.2547', '48.2843', NULL, NULL),
(1245, '30', 0, 'جوکار', '34.4194', '49.1413', NULL, NULL),
(1246, '30', 0, 'زنگنه', '34.7903', '48.5214', NULL, NULL),
(1247, '30', 0, 'سامن', '34.3825', '48.4711', NULL, NULL),
(1248, '30', 0, 'ملایر', '34.2969', '48.8162', NULL, NULL),
(1249, '30', 0, 'برزول', '34.1131', '48.4558', NULL, NULL),
(1250, '30', 0, 'فیروزان', '34.0161', '48.6726', NULL, NULL),
(1251, '30', 0, 'گیان', '35.0217', '48.7802', NULL, NULL),
(1252, '30', 0, 'نهاوند', '34.1731', '48.3689', NULL, NULL),
(1253, '30', 0, 'جورقان', '34.4469', '48.8958', NULL, NULL),
(1254, '30', 0, 'قهاوند', '34.7976', '49.3776', NULL, NULL),
(1255, '30', 0, 'مریانج', '34.5013', '48.5767', NULL, NULL),
(1256, '30', 1, 'همدان', '34.7985', '48.5158', NULL, '2025-04-03 10:14:55'),
(1257, '18', 0, 'خوزنين', '34.5043', '45.5787', NULL, NULL),
(1258, '31', 0, 'ابرکوه', '31.1272', '53.2508', NULL, NULL),
(1259, '31', 0, 'مهردشت', '35.7869', '50.9366', NULL, NULL),
(1260, '31', 0, 'احمدآباد', '35.1608', '52.1487', NULL, NULL),
(1261, '31', 0, 'اردکان', '32.3113', '54.0189', NULL, NULL),
(1262, '31', 0, 'عقدا', '31.9116', '54.3944', NULL, NULL),
(1263, '31', 0, 'اشکذر', '32.0069', '54.9671', NULL, NULL),
(1264, '31', 0, 'خضرآباد', '34.3968', '48.8683', NULL, NULL),
(1265, '31', 0, 'بافق', '31.6099', '55.4107', NULL, NULL),
(1266, '31', 0, 'بهاباد', '31.5904', '55.3994', NULL, NULL),
(1267, '31', 0, 'تفت', '32.9293', '54.4332', NULL, NULL),
(1268, '31', 0, 'نیر', '32.0069', '54.9671', NULL, NULL),
(1269, '31', 0, 'مروست', '32.1666', '54.0166', NULL, NULL),
(1270, '31', 0, 'هرات', '33.5975', '57.3421', NULL, NULL),
(1271, '31', 0, 'مهریز', '31.5828', '54.4318', NULL, NULL),
(1272, '31', 0, 'بفروییه', '32.8648', '51.8554', NULL, NULL),
(1273, '31', 0, 'میبد', '32.2493', '54.0166', NULL, NULL),
(1274, '31', 0, 'ندوشن', '33.2105', '58.7454', NULL, NULL),
(1275, '31', 0, 'حمیدیا', '31.9645', '54.3498', NULL, NULL),
(1276, '31', 0, 'زارچ', '32.4035', '54.0166', NULL, NULL),
(1277, '31', 0, 'شاهدیه', '33.8983', '50.0211', NULL, NULL),
(1278, '31', 1, 'یزد', '32.1006', '54.4344', NULL, '2025-04-03 10:15:04'),
(1279, '4', 0, 'محمودآباد', '32.774988', '51.5748668', '2024-03-06 09:17:23', '2024-03-06 09:17:23'),
(1280, '22', 0, 'مرز خسروی', '34.383961', '45.467611', '2024-03-06 11:47:43', '2024-03-06 11:47:43'),
(1281, '22', 0, 'مرز پرویزخان', '34.554321', '45.589503', '2024-03-06 11:51:08', '2024-03-06 11:51:08'),
(1282, '10', 0, 'ماهی‌رود', '32.1899', '60.6978', '2024-03-06 11:54:19', '2024-03-06 11:54:19'),
(1283, '22', 0, 'مرز شوشمی', '35.1601564', '46.2042396', '2024-03-06 11:58:28', '2024-03-06 11:58:28'),
(1284, '8', 0, 'چرمشهر', '35.1213431961587', '51.54493354778033', '2024-03-06 12:09:24', '2024-03-06 12:09:24'),
(1285, '8', 0, 'شورآباد', '35.474348', '51.354247', '2024-03-06 12:12:17', '2024-03-06 12:12:17'),
(1286, '8', 0, 'شادآباد', '35.6579', '51.3038', '2024-03-06 12:16:29', '2024-03-06 12:16:29'),
(1287, '17', 0, 'زرین دشت', '28.360170590506925', '54.4218925333117', '2024-03-06 15:30:14', '2024-03-06 15:30:14'),
(1288, '20', 0, 'حاجی عمران', '36.6732', '45.0482', '2024-03-06 15:36:44', '2024-03-06 15:36:44'),
(1289, '13', 0, 'مرز چذابه', '31.859234518635525', '47.82010796328006', '2024-03-06 15:39:37', '2024-03-06 15:39:37'),
(1290, '22', 0, 'مرز شیخ صله', '34.97779528862475', '45.89407719954678', '2024-03-06 15:44:40', '2024-03-06 15:45:42'),
(1291, '1', 0, 'خداآفرین', '39.13820406147201', '46.96314509088985', '2024-03-06 15:50:27', '2024-03-06 15:50:27'),
(1292, '16', 0, 'چاه علی', '26.26787410113895', '59.7816323814263', '2024-03-06 15:53:30', '2024-03-06 15:53:30'),
(1350, '27', 0, 'نمک آبرود', '36.67254', '51.302465', '2024-03-09 06:18:17', '2024-03-09 06:18:17'),
(1294, '29', 0, 'سردشت بشاگرد', '26.45557570586866', '57.90112621312034', '2024-03-06 16:05:47', '2024-03-06 16:05:47'),
(1296, '16', 0, 'تفتان', '28.604133', '61.13413', '2024-03-08 06:15:57', '2024-03-08 06:15:57'),
(1297, '0', 0, 'ترکیه', '39.0876459', '35.1293295', NULL, NULL),
(1298, '0', 0, 'اسپانیا', '35.3429504', '-17.58607', NULL, NULL),
(1299, '0', 0, 'یونان', '38.0358316', '19.03546', NULL, NULL),
(1300, '0', 0, 'ایتالیا', '40.8198289', '2.1190867', NULL, NULL),
(1301, '0', 0, 'عراق', '33.1180933', '38.4226212', NULL, NULL),
(1302, '0', 0, 'ارمنستان', '40.0652387', '43.721465', NULL, NULL),
(1303, '0', 0, 'آذربایجان', '40.1501998', '45.1141504', NULL, NULL),
(1304, '0', 0, 'امارات', '24.3361388', '51.3066804', NULL, NULL),
(1305, '0', 0, 'قبرس', '35.1681362', '32.7657533', NULL, NULL),
(1306, '0', 0, 'صربستان', '44.1843118', '18.2703672', NULL, NULL),
(1307, '0', 0, 'بلغارستان', '42.6990894', '22.9030209', NULL, NULL),
(1308, '0', 0, 'افغانستان', '33.8299592', '62.412055', NULL, NULL),
(1309, '0', 0, 'روسیه', '47.7230853', '63.2206255', NULL, NULL),
(1310, '0', 0, 'گرجستان', '42.294667', '40.7173655', NULL, NULL),
(1311, '0', 0, 'قزاقستان', '47.5326703', '56.3390432', NULL, NULL),
(1312, '0', 0, 'عمان', '21.4292648', '50.8547387', NULL, NULL),
(1313, '1301', 0, 'اربیل', '36.1974061', '43.9265615', '2024-03-08 06:35:47', '2024-03-08 06:35:47'),
(1314, '1301', 0, 'سلیمانیه', '35.562741', '45.405792', '2024-03-08 06:36:38', '2024-03-08 06:36:38'),
(1315, '11', 0, 'جوین', '36.2131084', '57.594645', '2024-03-08 06:40:06', '2024-03-08 06:40:06'),
(1316, '13', 0, 'شلمچه', '30.4256678', '48.1857492', '2024-03-08 06:42:07', '2024-03-08 06:42:07'),
(1317, '5', 0, 'سعیدآباد', '35.6667187', '51.1865689', '2024-03-08 06:44:50', '2024-03-08 06:44:50'),
(1318, '20', 0, 'باشماق', '35.6075656', '46.0361266', '2024-03-08 06:47:38', '2024-03-08 06:47:38'),
(1319, '11', 0, 'زیرکوه', '33.5424161', '60.1652672', '2024-03-08 06:50:22', '2024-03-08 06:50:22'),
(1320, '16', 0, 'میلک', '30.9703879', '61.8094038', '2024-03-08 06:52:06', '2024-03-08 06:52:06'),
(1321, '11', 0, 'دوقارون', '34.7366629', '60.8816731', '2024-03-08 06:53:31', '2024-03-08 06:53:31'),
(1322, '25', 0, 'شاندرمن', '37.4202356', '49.1111578', '2024-03-08 06:54:48', '2024-03-08 06:54:48'),
(1323, '8', 0, 'گیلاوند', '35.6864049', '52.0311641', '2024-03-08 06:55:53', '2024-03-08 06:55:53'),
(1324, '29', 0, 'رودان', '57.1613835', '27.5472827', '2024-03-08 06:56:53', '2024-03-08 06:56:53'),
(1325, '19', 0, 'شکوهیه', '34.7840788', '50.8196465', '2024-03-08 06:58:48', '2024-03-08 06:58:48'),
(1326, '1304', 0, 'دبی', '25.0760224', '55.2274879', '2024-03-08 06:59:51', '2024-03-08 06:59:51'),
(1328, '0', 0, 'داخل شهری', '0', '0', NULL, NULL),
(1329, '16', 0, 'کوهک', '27.3689', '62.3385', '2024-03-09 05:14:18', '2024-03-09 05:14:18'),
(1330, '1328', 0, 'داخل شهری', '0', '0', '2024-03-09 05:18:08', '2024-03-09 05:18:08'),
(1332, '1297', 0, 'وان', '38.502903', '43.3585543', '2024-03-09 05:20:55', '2024-03-09 05:20:55'),
(1333, '17', 0, 'سپيدان', '30.25015', '51.993283', '2024-03-09 05:24:06', '2024-03-09 05:24:06'),
(1334, '3', 0, 'زیوه', '38.12535757161484', '48.25782180243447', '2024-03-09 05:28:09', '2024-03-09 05:28:09'),
(1335, '1', 0, 'خسروشهر', '37.954372', '46.050686', '2024-03-09 05:29:35', '2024-03-09 05:29:35'),
(1337, '1297', 0, 'اسکندرون', '36.586142', '36.1586559', '2024-03-09 05:33:51', '2024-03-09 05:33:51'),
(1338, '1297', 0, 'آنکارا', '39.9035233', '32.5979578', '2024-03-09 05:36:14', '2024-03-09 05:36:14'),
(1339, '1297', 0, 'ازمیر', '38.42293935811167', '27.166933023942526', '2024-03-09 05:39:39', '2024-03-09 05:39:39'),
(1340, '1297', 0, 'قبضه', '40.79995613851238', '29.431191985963817', '2024-03-09 05:40:34', '2024-03-09 05:40:34'),
(1341, '2', 0, 'تمرچین', '36.6931', '45.1439', '2024-03-09 05:42:36', '2024-03-09 05:42:36'),
(1342, '1297', 0, 'یحیالی', '38.110155', '35.3381245', '2024-03-09 05:43:32', '2024-03-09 05:43:32'),
(1343, '1297', 0, 'کارابوک', '41.2062235', '32.6506621', '2024-03-09 05:45:04', '2024-03-09 05:45:04'),
(1344, '1297', 0, 'ارنکوی', '41.6065603', '41.3087731', '2024-03-09 05:46:24', '2024-03-09 05:46:24'),
(1345, '1297', 0, 'مرسین', '36.7673056', '34.531306', '2024-03-09 05:47:27', '2024-03-09 05:47:27'),
(1346, '17', 0, 'فورگ', '28.3075005', '55.1619664', '2024-03-09 05:49:30', '2024-03-09 05:49:30'),
(1347, '27', 0, 'بندر امیرآباد', '36.859204', '53.3618198', '2024-03-09 05:55:20', '2024-03-09 05:55:20'),
(1349, '23', 0, 'گچساران', '30.3660', '50.7936', '2024-03-09 06:03:25', '2024-03-09 06:03:25'),
(1351, '8', 0, 'جاجرود', '35.659701', '51.752710', '2024-03-09 06:48:12', '2024-03-09 06:48:12'),
(1352, '8', 0, 'آدران', '35.5300171', '51.1188859', '2024-03-09 07:35:46', '2024-03-09 07:35:46'),
(1354, '1297', 0, 'قره بوک', '41.20328794930102', '32.62390660502809', '2024-03-10 05:10:45', '2024-03-10 05:10:45'),
(1355, '1308', 0, 'افغانستان', '33.40015102605919', '65.44913629995833', '2024-03-10 05:11:48', '2024-03-10 05:11:48'),
(1356, '11', 0, 'بینالود', '35.9985971', '59.3454797', '2024-03-10 05:15:55', '2024-03-10 05:15:55'),
(1357, '1297', 0, 'درینجه', '40.7633478382092', '29.860862364416', '2024-03-10 05:20:16', '2024-03-10 05:20:16'),
(1358, '1297', 0, 'آنتپ', '37.06232595389045', '37.394042260715224', '2024-03-10 05:21:09', '2024-03-10 05:21:09'),
(1359, '1297', 0, 'سیلیوری', '41.0719461', '28.200803', '2024-03-10 05:26:18', '2024-03-10 05:26:18'),
(1360, '1297', 0, 'اوشاک', '38.5566235', '29.3844905', '2024-03-10 05:28:33', '2024-03-10 05:28:33'),
(1361, '8', 0, 'جاده خاوران', '35.660011', '51.458274', '2024-03-10 06:06:11', '2024-03-10 06:06:11'),
(1362, '8', 0, 'جاده ساوه', '35.0075435', '50.3225876', '2024-03-10 06:07:09', '2024-03-10 06:07:09'),
(1363, '8', 0, 'جاده قم', '35.552514065296144', '51.40958423140439', '2024-03-10 06:11:52', '2024-03-10 06:11:52'),
(1364, '4', 0, 'مورچه خورت', '33.084799', '51.479938', '2024-03-10 07:40:05', '2024-03-10 07:40:05'),
(1365, '4', 0, 'درچه پياز', '32.604481', '51.547707', '2024-03-10 07:41:18', '2024-03-10 07:41:18'),
(1366, '27', 0, 'متل قو', '36.6822', '52.5993', '2024-03-11 12:28:02', '2024-03-11 12:28:02'),
(1368, '25', 0, 'تالش', '37.79719471405826', '48.90667552575917', '2024-03-13 08:53:31', '2024-03-13 08:53:31'),
(1369, '25', 0, 'لشت نشا', '37.36072734068518', '49.86106452058778', '2024-03-13 08:54:01', '2024-03-13 08:54:01'),
(1370, '20', 0, 'مرز حاجی عمران', '36.673310377493664', '45.042533558842834', '2024-03-13 08:55:28', '2024-03-13 08:55:28'),
(1371, '5', 0, 'مهرشهر', '35.79964611213657', '50.890046312062175', '2024-03-13 08:56:15', '2024-03-13 08:56:15'),
(1372, '4', 0, 'مورچه خورت', '33.08828690661074', '51.47886515500581', '2024-03-13 08:56:51', '2024-03-13 08:56:51'),
(1373, '8', 0, 'آهن مکان', '35.61137719691921', '51.3972616024877', '2024-03-13 08:57:56', '2024-03-13 08:57:56'),
(1376, '2', 0, 'حاجی عمران', '36.676408863672194', '45.04441846678372', '2024-04-04 06:04:02', '2024-04-04 06:04:02'),
(1377, '22', 0, 'ثلاث باباجانی', '34.8185311', '46.0804456', '2024-04-15 05:25:08', '2024-04-15 05:25:08'),
(1378, '17', 0, 'سپیدان', '30.16013026349579', '52.10705705415397', '2024-05-27 05:30:17', '2024-05-27 05:30:17'),
(1379, '24', 0, 'گلستان', '37.29368507316725', '54.95369372820699', '2024-05-28 09:49:06', '2024-05-28 09:49:06'),
(1380, '7', 0, 'کنگان', '27.84288064624992', '52.06209798196955', '2024-08-17 15:39:02', '2024-08-17 15:39:02'),
(1381, '14', 0, 'طارم', '36.93452806553643', '48.849059093459616', '2024-10-04 06:38:06', '2024-10-04 06:38:06'),
(1382, '31', 0, '123', '252525', '535353', '2025-04-16 10:33:52', '2025-04-16 10:33:52'),
(1383, '31', 0, 'شیرکوه', '31.599177431636733', '54.09618485937462', '2025-04-16 10:44:52', '2025-04-16 10:44:52'),
(1384, '25', 0, 'هشتپر', '37.79719471405826', '48.90667552575917', '2025-04-16 11:01:57', '2025-04-16 11:01:57'),
(1385, '20', 0, 'حاج عمران', '36.67527428990921', '45.04352994013013', '2025-04-16 11:08:36', '2025-04-16 11:08:36'),
(1386, '16', 0, 'ریمدان', '25.387420052939927', '61.63239516506222', '2025-04-16 11:12:15', '2025-04-16 11:12:15'),
(1387, '21', 0, 'ریگان', '28.65408710081101', '59.012598773061', '2025-04-16 11:15:00', '2025-04-16 11:15:00'),
(1388, '29', 0, 'کهورستان', '27.20815001663504', '55.56580060906787', '2025-04-16 11:17:00', '2025-04-16 11:17:00'),
(1389, '15', 0, 'کالپوش', '37.19908820899909', '55.737348742608596', '2025-04-16 11:18:04', '2025-04-16 11:18:04'),
(1390, '1', 0, 'نوردوز', '38.85358674109543', '46.20642536819908', '2025-04-16 11:19:19', '2025-04-16 11:19:19'),
(1391, '22', 0, 'ثلاث باباجانی', '34.7920324434372', '46.1092847095745', '2025-04-16 11:22:39', '2025-04-16 11:22:39'),
(1392, '11', 0, 'کوهسرخ', '35.480759118595486', '58.58136373491811', '2025-04-16 11:25:16', '2025-04-16 11:25:16'),
(1393, '16', 0, 'نوبندیان', '25.491909386812324', '61.17758267496834', '2025-04-16 11:26:58', '2025-04-16 11:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Owner', NULL, NULL),
(3, 'HUMAN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x83uR8YuEzPLYzMzYoFRxyLf3s4lAqsM9rmMj0pq', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUViZ2NXcVpFM1ByaVA2OWNhUWx6dUM0MlJOZU9wcnFKa3lGVDNtTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1747683203),
('du80gSsZCnCbXa3fCxJYk1FFLc7yBdFsCpcQATBM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0tQNDFSc3RJWHRIR1JYOG1hQU10MU9WSDAxT1kzbGtkcTZhTFlSSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1748111370),
('ZrMcsqQQDRgQlYGj8McNp5kVnio7hFgOvotEJui4', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNElraUZPZkl1WDNqNFRuSFZyaVc0WmgxZTkzTWRraFFRMmhhOHJ0USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRlZ29yaWVzL2Jsb2NraW5nLWJyYWtpbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748460300),
('2vxTHpvvE4wDw02HZbCSWGGknIxDPI0mQKsr7UQV', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFEzTU5BbENsdjFucmNrWXllaTY4cWJoVmVGa3VOY2RSUWtNUkhlRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1747686126),
('1t83ckgdCAMXzNoY0YTFKwqJE7Yfv08WIdh7PqlT', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3duMURRTGdjbFlrcTRmOXhyQWZlczFEcXBKVjBqNWE5V3hNS2VKZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWN0cy9sLXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747995697);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'لوازم یدکی سمند', '2025-05-16 11:28:34', '2025-05-16 11:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `ref_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `gateway_name` enum('zarinpal','pay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationalCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_mobilenumber_unique` (`mobileNumber`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `nationalCode`, `mobileNumber`, `birthday`, `gender`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'صدرا', 'مقدسی', NULL, '09036866949', NULL, 0, 'sadra@gmail.com', '2025-05-14 16:19:55', '$2y$12$ThwRHioYWuOCFz0SX/bEJOkZoGKs9DMgpgM4DBBU0j756jLaK6mvi', 1, '23uecPkgeVpRRbRVhtB4QepO0Am04mqnu561un37XIXxADJkFmMsN4asxBnj', '2025-05-14 16:19:55', '2025-05-14 16:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_addresses_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `title`, `address`, `cellphone`, `postal_code`, `user_id`, `province_id`, `city_id`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, NULL, 'xrgdgd', NULL, NULL, 1, 15, 668, NULL, NULL, '2025-05-23 09:25:39', '2025-05-23 09:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
