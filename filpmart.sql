-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2022 at 06:49 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filpmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` bigint UNSIGNED NOT NULL,
  `banner_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_mid_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner_subtitle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `banner_button` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_url` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_order` int DEFAULT NULL,
  `banner_publish` int NOT NULL DEFAULT '0',
  `banner_creator` int DEFAULT NULL,
  `banner_editor` int DEFAULT NULL,
  `banner_slug` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic_infos`
--

CREATE TABLE `basic_infos` (
  `basic_id` bigint UNSIGNED NOT NULL,
  `basic_company` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_title` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_header_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_footer_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_infos`
--

INSERT INTO `basic_infos` (`basic_id`, `basic_company`, `basic_title`, `basic_header_logo`, `basic_footer_logo`, `basic_favicon`, `basic_status`, `created_at`, `updated_at`) VALUES
(1, 'Flipmart', 'Flipmart Ecommarce Store', '1653329993_2458711.png', '1653329998_1101151.png', '1653330006_6428035.png', 1, '2022-05-23 09:02:19', '2022-05-23 12:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_feature` int DEFAULT NULL,
  `brand_creator` int DEFAULT NULL,
  `brand_editor` int DEFAULT NULL,
  `brand_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_slug`, `brand_remarks`, `brand_image`, `brand_feature`, `brand_creator`, `brand_editor`, `brand_status`, `created_at`, `updated_at`) VALUES
(7, 'Samsung', 'samsung', NULL, '1655274349_6063709.png', 1, 1, NULL, 1, '2022-06-15 00:25:49', '2022-06-15 00:25:49'),
(8, 'Apple', 'apple', NULL, '1655274427_7362997.png', 1, 1, NULL, 1, '2022-06-15 00:27:07', '2022-06-15 00:27:07'),
(9, 'HP', 'hp', NULL, '1655274510_6579112.png', 1, 1, NULL, 1, '2022-06-15 00:28:30', '2022-06-15 00:28:30'),
(10, 'Lenovo', 'lenovo', NULL, '1655274556_7988364.png', 1, 1, 1, 1, '2022-06-15 00:28:46', '2022-06-15 00:29:16'),
(11, 'Asus', 'asus', NULL, '1655274610_747816.png', 1, 1, NULL, 1, '2022-06-15 00:30:10', '2022-06-15 00:30:10'),
(12, 'Razar', 'razar', NULL, '1655274658_8613960.png', 1, 1, NULL, 1, '2022-06-15 00:30:58', '2022-06-15 00:30:58'),
(13, 'ZKTeco', 'zkteco', NULL, '1655274737_9507848.png', 1, 1, NULL, 1, '2022-06-15 00:32:17', '2022-06-15 00:32:17'),
(14, 'Corsair', 'corsair', NULL, '1655274822_8340896.png', 1, 1, NULL, 1, '2022-06-15 00:33:42', '2022-06-15 00:33:42'),
(15, 'Nikon', 'nikon', NULL, '1655274877_3918186.png', 1, 1, NULL, 1, '2022-06-15 00:34:38', '2022-06-15 00:34:38'),
(16, 'TP-Link', 'tp-link', NULL, '1655274965_6964404.png', 1, 1, NULL, 1, '2022-06-15 00:36:05', '2022-06-15 00:36:05'),
(17, 'Apollo', 'apollo', NULL, '1655275070_7498032.png', 1, 1, NULL, 1, '2022-06-15 00:37:50', '2022-06-15 00:37:50'),
(18, 'Ryzen', 'ryzen', NULL, '1655277077_9357194.png', 1, 1, NULL, 1, '2022-06-15 01:11:17', '2022-06-15 01:11:17'),
(19, 'Gigabyte', 'gigabyte', NULL, '1655277571_9055549.png', 1, 1, NULL, 1, '2022-06-15 01:19:32', '2022-06-15 01:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `pro_cat_id` bigint UNSIGNED NOT NULL,
  `pro_cat_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_cat_parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_cat_order` int DEFAULT NULL,
  `pro_cat_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_cat_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_cat_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_cat_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`pro_cat_id`, `pro_cat_name`, `pro_cat_parent`, `pro_cat_order`, `pro_cat_image`, `pro_cat_icon`, `pro_cat_slug`, `pro_cat_status`, `created_at`, `updated_at`) VALUES
(6, 'Desktop', NULL, 1, '', 'fa fa-desktop', 'desktop', 1, '2022-06-15 00:12:01', '2022-06-21 16:40:52'),
(7, 'Laptop', NULL, 2, '', 'fa fa-laptop', 'laptop', 1, '2022-06-15 00:15:35', '2022-06-21 16:41:17'),
(8, 'Component', NULL, 3, '', 'fa fa-universal-access', 'component', 1, '2022-06-15 00:16:18', '2022-06-21 16:42:21'),
(9, 'Monitor', NULL, 4, '', 'fa fa-television', 'monitor', 1, '2022-06-15 00:16:52', '2022-06-21 16:42:47'),
(10, 'UPS', NULL, 5, '', 'fa fa-bolt', 'ups', 1, '2022-06-15 00:17:05', '2022-06-21 16:46:31'),
(11, 'Camera', NULL, 6, '', 'fa fa-camera', 'camera', 1, '2022-06-15 00:18:26', '2022-06-21 16:47:34'),
(12, 'Security', NULL, 7, '', 'fa fa-shield', 'security', 1, '2022-06-15 00:18:36', '2022-06-21 16:47:45'),
(13, 'Networking', NULL, 8, '', 'fa fa-wifi', 'networking', 1, '2022-06-15 00:18:49', '2022-06-21 16:48:44'),
(14, 'Gadget', NULL, 9, '', 'fa fa-hdd-o', 'gadget', 1, '2022-06-15 00:19:05', '2022-06-21 16:50:05'),
(15, 'Server & Storage', NULL, 10, '', 'fa fa-server', 'server-storage', 1, '2022-06-15 00:19:23', '2022-06-21 16:50:23'),
(16, 'Special PC', '6', NULL, '', '', 'special-pc', 0, '2022-06-15 00:20:23', '2022-06-15 00:22:34'),
(18, 'Brand PC', '6', NULL, '', '', 'brand-pc', 1, '2022-06-15 00:22:05', '2022-06-15 00:22:05'),
(19, 'Gamming PC', '6', NULL, '', '', 'gamming-pc', 1, '2022-06-15 00:22:20', '2022-06-15 00:22:20'),
(20, 'MacBook', '7', NULL, '', '', 'macbook', 1, '2022-06-15 00:47:40', '2022-06-15 00:47:40'),
(21, 'AppleiMac', '6', NULL, '', '', 'appleimac', 1, '2022-06-15 01:15:22', '2022-06-15 01:15:22'),
(22, 'Accessories', NULL, NULL, '', 'fa fa-headphones', 'accessories', 1, '2022-06-15 01:27:22', '2022-06-21 16:51:44'),
(23, 'Speaker', NULL, NULL, '1655724315_4683877.png', '1655724315_8276648.jpg', 'speaker', 0, '2022-06-20 05:25:15', '2022-06-20 07:09:58'),
(24, 'Plastic', NULL, 22, '', 'fa fa-pagelines', 'plastic', 0, '2022-06-21 16:12:38', '2022-06-21 16:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `contact_id` bigint UNSIGNED NOT NULL,
  `contact_phone_one` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone_two` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email_one` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email_two` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address_one` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_address_two` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contact_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`contact_id`, `contact_phone_one`, `contact_phone_two`, `contact_email_one`, `contact_email_two`, `contact_address_one`, `contact_address_two`, `contact_status`, `created_at`, `updated_at`) VALUES
(1, '01835061968', '01303132067', 'khayrulshanto@gmail.com', 'coderkhayrul@gmail.com', 'Araihazar, Narayangonj,Dhaka-1450', 'Araihazar, Narayangonj,Dhaka-1450', 1, '2022-05-23 18:54:53', '2022-06-02 01:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `coupon_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_starting` date NOT NULL,
  `coupon_ending` date NOT NULL,
  `coupon_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_creator` int NOT NULL,
  `coupon_editor` int DEFAULT NULL,
  `coupon_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_title`, `coupon_code`, `coupon_amount`, `coupon_starting`, `coupon_ending`, `coupon_remarks`, `coupon_creator`, `coupon_editor`, `coupon_slug`, `coupon_status`, `created_at`, `updated_at`) VALUES
(2, 'NEW YEAR', 'NEWYEAR', '500', '2022-06-23', '2022-06-30', NULL, 1, NULL, '62b3edab3ef57', 1, '2022-06-22 22:35:55', '2022-06-22 22:35:55'),
(3, 'DIGITAL MALA', 'DIGITALMALA', '1000', '2022-06-23', '2022-06-25', 'Ad ex nihil autem mi', 1, NULL, '62b3edce27f87', 1, '2022-06-22 22:36:30', '2022-06-22 22:36:30'),
(4, 'GIVEAWAY', 'GIVEAWAY', '1500', '2022-06-24', '2022-06-24', 'Testing', 1, NULL, '62b4c6ae43194', 1, '2022-06-23 14:01:50', '2022-06-23 14:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_23_105129_create_basic_infos_table', 1),
(6, '2022_05_23_105158_create_contact_infos_table', 1),
(7, '2022_05_23_105216_create_social_media_table', 1),
(8, '2022_05_24_094508_create_banners_table', 2),
(9, '2022_06_01_101504_create_brands_table', 3),
(10, '2022_06_02_110351_create_categories_table', 4),
(11, '2022_06_06_103811_create_sellers_table', 5),
(13, '2022_06_03_071006_create_partners_table', 6),
(15, '2022_06_06_115552_create_products_table', 7),
(16, '2022_06_21_193326_create_wishlists_table', 8),
(18, '2022_06_22_173922_create_coupons_table', 9),
(19, '2022_06_24_204444_create_permission_tables', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` bigint UNSIGNED NOT NULL,
  `partner_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_url` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_order` int DEFAULT NULL,
  `partner_creator` int DEFAULT NULL,
  `partner_editor` int DEFAULT NULL,
  `partner_slug` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'User Index', 'web', '2022-06-24 15:01:37', '2022-06-24 15:01:37'),
(2, 'User Create', 'web', '2022-06-24 15:01:37', '2022-06-24 15:01:37'),
(3, 'User Show', 'web', '2022-06-24 15:01:37', '2022-06-24 15:01:37'),
(4, 'User Edit', 'web', '2022-06-24 15:01:37', '2022-06-24 15:01:37'),
(5, 'User Delete', 'web', '2022-06-24 15:01:37', '2022-06-24 15:01:37'),
(6, 'Category Index', 'web', '2022-06-25 12:55:50', '2022-06-25 12:55:50'),
(7, 'Category Create', 'web', '2022-06-25 12:55:50', '2022-06-25 12:55:50'),
(8, 'Category Show', 'web', '2022-06-25 12:55:50', '2022-06-25 12:55:50'),
(9, 'Category Edit', 'web', '2022-06-25 12:55:50', '2022-06-25 12:55:50'),
(10, 'Category Delete', 'web', '2022-06-25 12:55:50', '2022-06-25 12:55:50'),
(11, 'Product Index', 'web', '2022-06-25 13:00:50', '2022-06-25 13:00:50'),
(12, 'Product Create', 'web', '2022-06-25 13:00:50', '2022-06-25 13:00:50'),
(13, 'Product Show', 'web', '2022-06-25 13:00:50', '2022-06-25 13:00:50'),
(14, 'Product Edit', 'web', '2022-06-25 13:00:50', '2022-06-25 13:00:50'),
(15, 'Product Delete', 'web', '2022-06-25 13:00:50', '2022-06-25 13:00:50'),
(16, 'Brand Index', 'web', '2022-06-25 13:00:57', '2022-06-25 13:00:57'),
(17, 'Brand Create', 'web', '2022-06-25 13:00:57', '2022-06-25 13:00:57'),
(18, 'Brand Show', 'web', '2022-06-25 13:00:57', '2022-06-25 13:00:57'),
(19, 'Brand Edit', 'web', '2022-06-25 13:00:57', '2022-06-25 13:00:57'),
(20, 'Brand Delete', 'web', '2022-06-25 13:00:57', '2022-06-25 13:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint UNSIGNED NOT NULL,
  `pro_category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int NOT NULL,
  `product_unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detils` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_gallery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_order` int DEFAULT NULL,
  `product_feature` int NOT NULL DEFAULT '0',
  `product_creator` int NOT NULL,
  `product_editor` int DEFAULT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `pro_category_id`, `brand_id`, `product_name`, `product_price`, `product_discount_price`, `product_quantity`, `product_unit`, `product_detils`, `product_description`, `product_image`, `product_gallery`, `product_order`, `product_feature`, `product_creator`, `product_editor`, `product_slug`, `product_status`, `created_at`, `updated_at`) VALUES
(6, 20, 8, 'Apple MacBook Air 13.3-Inch Retina Display 8-core Apple M1 chip with 8GB RAM', '109000', '98000', 20, 'pis', '<ul><li>MPN: MGN63</li><li>Model: Apple MacBook Air 13\" Space Gray with Apple M1 Chip</li><li>Apple M1 chip with 8-core CPU and 7-core GPU</li><li>8GB RAM</li><li>256GB SSD</li><li>13.3-inch 2560x1600 LED-backlit Retina Display</li></ul>', '<h2><strong>Apple MacBook Air 13.3-Inch&nbsp;Retina Display 8-core Apple M1 chip with 8GB RAM, 256GB SSD&nbsp;(MGN63) Space Gray</strong></h2><p>Apple\'s thinnest, lightest notebook, was completely transformed by the Apple M1 chip. CPU speeds up to 3.5x faster. GPU speeds up to 5x faster. Our most advanced Neural Engine for up to 9x faster machine learning. The longest battery life ever in a MacBook Air. And a silent, fanless design. This much power has never been this ready to go.&nbsp;Itâ€™s here. Our first chip was designed specifically for Mac. Packed with an astonishing 16 billion transistors, the Apple M1 system on a chip (SoC) integrates the CPU, GPU, Neural Engine, I/O, and so much more onto a single tiny chip. With incredible performance, custom technologies, and industry-leading power efficiency,1 M1 is not just the next step for Mac â€” itâ€™s another level entirely.M1 has the fastest CPU weâ€™ve ever made. With that kind of processing speed, MacBook Air can take on new extraordinarily intensive tasks like professional-quality editing and action-packed gaming. But the 8â€‘core CPU on M1 isnâ€˜t just up to 3.5x faster than the previous generation2 â€” it balances high-performance cores with efficiency cores that can still crush everyday jobs while using just a tenth of the power. Up to 7-core GPUThe GPU in M1 puts MacBook Air in a class of its own. M1 features the worldâ€˜s fastest integrated graphics in a personal computer.8 Thatâ€™s up to 5x faster graphics performance compared with the previous generation.</p>', '1655275853_3792733.jpg', 'pro_4381289.jpg', 1, 1, 1, NULL, 'pro62a9814d39af0', 1, '2022-06-15 00:50:53', '2022-06-15 00:50:53'),
(7, 19, 18, 'AMD Ryzen 5 3600 Gaming PC', '95000', '87000', 15, 'pic', NULL, NULL, '1655277134_2800714.jpg', '', 2, 1, 1, NULL, 'pro62a9864ec25b4', 1, '2022-06-15 01:12:14', '2022-06-15 01:12:14'),
(8, 8, 19, 'Gigabyte Z390 M GAMING 9th Gen Micro ATX Motherboard', '12000', '11500', 12, 'pic', '<ul><li>Model: Z390 M GAMING</li><li>Chipset: Intel Z390 Express</li><li>Intel Socket LGA1151 for 9th/8th Gen Processors</li><li>4 x DIMM, Max. 64GB DDR4</li><li>4 x PCIe slots</li></ul>', '<p>Gigabyte Z390 M GAMING Micro ATX motherboard compatible with Intel 9th &amp; 8th gen (Socket LGA1151) i3, i5, i7 &amp; i9 processors. This Dual Channel Non-ECC Unbuffered with High Quality Audio Capacitor board has maximum 64GB DDR4&nbsp; memory and it has the capability of dual ultra-fast M.2 with PCIe Gen3 X4 &amp; SATA interface. If we consider the graphics of this multi-way support with PCIe Armor and Ultra Durableâ„¢ Design board has Intel HD graphics having the maximum resolution of 1920x1200@60 Hz for DVI-D &amp; 4096x2160@30 Hz of HDMI port. This lightning-fast Intel Thunderboltâ„¢ 3 AIC board has 4 x PCIe slots, IntelÂ® Native USB 3.1 Gen2 Type-A + Type-C, IntelÂ® Gigabit LAN with cFosSpeed, Ultra Durableâ„¢ 25KV ESD and 15KV Surge LAN Protection and RGB Lighting Effect in Full Colors.</p><p>Gigabyte latest 9th gen mainboard with Intel Z390 Express chipset is a great choice for your desktop setup and have the best price in Bangladesh. Order your PC components from Star Tech online shop and have the delivery at any location.</p>', '1655277670_5215739.jpg', '', 3, 1, 1, NULL, 'pro62a98866c800f', 1, '2022-06-15 01:21:10', '2022-06-15 01:21:10'),
(9, 10, 17, 'Apollo 3kVA Online UPS', '42000', '35000', 5, 'pic', '<ul><li>MPN: 2300HS</li><li>Model: Apollo 3kVA</li><li>Voltage: Single Phase, 110Vac~290Vac</li><li>Frequency: 50Hz (60Hz on request)</li><li>Power Factor: &gt; 0.98% (Full Load)</li><li>Voltage: 220Vac</li></ul>', '<h2><strong>Apollo 3kVA Online UPS</strong><br>&nbsp;</h2><p>Apollo 3kVA Online UPS comes with Single Phase input power: from 110Vac ~ 290Vac, DSP control technology with an input power factor of &gt;0.98% (Full Load). The Apollo series UPS are providing high-performance power supply systems with Single Phase input and Single Phase output and galvanic isolation by a high-performance inverter output transformer designed to supply high-quality power on a permanent basis. In this Online UPS advanced diagnostics and unit information allow users to monitor system parameters and alarms, check the status of the battery and provide access to the history of events through the system software or multi-language screen. This new Apollo series Online UPS features online UPS double conversion, Single Phase, input/ Single Phase output, DSP control technology, Galvanic insulation by output transformer, Reduced harmonic distortion, RFI filter, and Acoustic and luminous signaling. This UPS Reduced harmonic distortion of the output signal. This Online UPS also comes with High efficiency, an Output power factor of 0.8 ~1 (lagging), and Software included for System Monitoring. In this online UPS, the Extended battery options are available.</p>', '1655277769_6797664.jpg', '', 4, 0, 1, NULL, 'pro62a988c97ea6b', 1, '2022-06-15 01:22:49', '2022-06-15 01:22:49'),
(10, 11, 15, 'Nikon D5600 DSLR Camera with 18-140mm Lens', '95000', '90000', 7, 'pic', '<ul><li>Model: Nikon D5600</li><li>24.2MP DX-Format CMOS Sensor</li><li>EXPEED 4 Image Processor</li><li>Display 3.2\" Touchscreen</li><li>FHD 1080p Video Recording at 60 fps</li></ul>', '<p>Nikon D5600 Centered around a 24.2MP DX-format CMOS sensor and EXPEED 4 image processor, the camera offers a sensitivity range from ISO 100-25600 to benefit working in an array of lighting conditions, and the sensor and processor combination also supports continuous shooting up to 5 fps for working with moving subjects. Full HD 1080p video recording is also supports up to 60 fps, and time-lapse movies can be created in-camera, too.&gt;</p><p>The Nikon D5600 does feature a large 3.2\" 1.037m-dot rear LCD touchscreen and utilizes a vari-angle design to better facilitate working from high and low shooting angles. Additionally, SnapBridge is also featured, which can utilize Bluetooth low energy technology for wireless sharing of photos to your mobile device, including automatic transferring of resized images between the camera and your mobile device for seamless online sharing. Wi-Fi with NFC is featured, too, for larger file transfers, such as movies, to a linked device.</p><p><strong>03 Years Service Warranty (No parts warranty)</strong></p>', '1655277914_7535611.jpg', 'pro_3515743.jpg', 5, 1, 1, NULL, 'pro62a9895a17709', 1, '2022-06-15 01:25:14', '2022-06-15 01:25:14'),
(11, 22, 18, 'Razer DeathAdder Essential Gaming Mouse', '2000', '1500', 30, 'pic', '<ul><li>MPN: RZ01-03850100-R3M1</li><li>Model: Razer DeathAdder Essential</li><li>True 6,400 DPI Optical Sensor</li><li>Ergonomic Form Factor</li><li>5 Hyperesponse Buttons</li><li>10 million-click life cycle</li></ul>', '<h2><strong>Razer DeathAdder Essential Gaming Mouse</strong></h2><p>Razer DeathAdder Essential Gaming Mouse has been a mainstay in the global esports arena. It has garnered a reputation for reliability that gamers swear by due to its proven durability and ergonomics. The Razer DeathAdder Essential Gaming Mouse is the most renowned and recognized gaming mouse in the world. The Razer DeathAdder Essential retains the classic ergonomic form thatâ€™s been a hallmark of previous Razer DeathAdder generations. This Razer gaming mouse comes with over 9 million units sold worldwide and dozens of celebrated awards, it comes as no surprise.</p><h3><strong>Ergonomic Form</strong></h3><p>The Razer DeathAdder Essential is designed with a classic ergonomic form thatâ€™s been a hallmark of previous Razer DeathAdder generations. In this Razer gaming mouse, its sleek and distinct body is designed for comfort, allowing you to maintain high levels of performance.</p><h3><strong>5 Hyperesponse Buttons</strong></h3><p>In this Razer DeathAdder Essential gaming mouse, the Independently programmable Hyperesponse buttons give you advanced controls for a competitive edge.</p><h3><strong>Up To 10 Million Clicks</strong></h3><p>The exclusive Razer DeathAdder Essential comes with multi-award-winning Razer Mechanical Switches last up to 10 million clicks for a longer lifespan and extreme reliability.</p><p>The latest DeathAdder Essential Gaming Mouse Allows fast and precise mouse swipes that offer greater control for the most essential gaming needs. This latest exclusive Razer DeathAdder Essential Gaming Mouse comes with 02 years of warranty (Need to submit product box for warranty claim)</p><figure class=\"media\"><oembed url=\"https://youtu.be/VpCrAJHyvMI\"></oembed></figure>', '1655278256_9507603.jpg', '', NULL, 0, 1, NULL, 'pro62a98ab03b811', 1, '2022-06-15 01:30:56', '2022-06-15 01:30:56'),
(12, 6, 9, 'Intel Pentium G6400 10th Gen Special PC', '27000', '21000', 11, 'pic', '<ul><li>Model: Pentium G6400 10th Gen</li><li>MSI H510M-A PRO Intel 10th Gen and 11th Gen Mirco-ATX Motherboard</li><li>Intel Pentium Gold G6400 10th gen Coffee Lake Processor</li><li>Adata 4 GB DDR4 2666 BUS Desktop Ram</li><li>Team MP33 128GB M.2 PCIe SSD</li></ul>', '<h2><strong>Intel Pentium G6400 10th Gen Special PC</strong></h2><p>The New Intel Pentium G6400 10th Gen Special PC comes with Intel Pentium Gold G6400 10th gen Coffee Lake Processor, Gigabyte H510M H Intel 10th and 11th Gen Micro ATX Motherboard, Adata 4 GB DDR4 2666 BUS Desktop Ram, Team MP33 128GB M.2 PCIe SSD and MaxGreen 2810BG ATX Casing</p><h3><strong>Intel Pentium Gold G6400 10th gen Coffee Lake Processor</strong></h3><p>This processor comes with a new breed that has an integrated GPU, so a separate graphics card is not required for its functionality. Intel 10th Generation Intel Pentium Gold G6400 Processor having the base frequency of 4.00 GHz. It has the L3 SmartCache of 4 MB containing 2 cores and 4 threads. With the bus speed of 8 GT/s DMI, it has thermal design power (TDP) rating of 58W. This latest microchip has few expansion options such 3.0 PCI express revision having configured up to 1x16, 2x8, 1x8+2x4 and maximum 16 lanes. Considering the memory this processor has dual channel of max 128 GB of size that supports up to DDR4-2666 bus speed. Focusing on this, all the major motherboard manufacturers have already started BIOS updates for their 300-series lineup</p><h3><strong>MSI H510M-A PRO Intel 10th Gen and 11th Gen Mirco-ATX Motherboard</strong></h3><p>MSI H510M-A PRO Intel 10th Gen and 11th Gen Mirco-ATX Motherboard Support 10th Gen Intel Core, 11th Gen Intel Core, Pentium Gold, and Celeron processors for LGA 1200 socket, DDR4 Memory, up to 3200(Max) MHz. With premium layout and digital power design to support more cores and provide better performance. MSI lightning Gen 4 PCI-E is the latest and the fastest PCI-E data transfer solution with 64GB/s of transfer bandwidth that has doubled compared to its previous generation. PCIe 4.0 maintains both backward and forward compatibility with older and newer specifications. Optimized by steel armor design, your motherboards can support the weight of heavy graphics cards. It\'s Detecting CPU &amp; GPU temperatures and automatically adjusts the fan duty of system fans to a proper value by adopting MSI AI ENGINE. Here, Advanced technology delivers pure data signals for the best performance and stability. This Motherboard has Advanced technology to deliver pure data signals for the best performance and stability with PCIe 4.0 Lightning Fast Experience. Here, Running at PCI-E Gen3 x4 maximizes performance for NVMe based SSDs. The Audio Boost Rewards your ears with studio-grade sound quality. Stay connected with Intel LAN, optimized for stable internet throughput ideal for championship-level online plays. The latest MSI H510M-A PRO Intel 10th Gen and 11th Gen Mirco-ATX Motherboard has 03 years warranty.</p>', '1655322411_4796507.png', '', NULL, 1, 1, NULL, 'pro62aa372c07752', 1, '2022-06-15 13:46:52', '2022-06-15 13:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'web', '2022-06-24 14:57:34', '2022-06-24 14:57:34'),
(3, 'Admin', 'web', '2022-06-24 14:57:34', '2022-06-24 14:57:34'),
(4, 'Editor', 'web', '2022-06-24 14:57:34', '2022-06-24 14:57:34'),
(5, 'User', 'web', '2022-06-24 14:57:34', '2022-06-24 14:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(1, 5),
(6, 5),
(11, 5),
(16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `sm_id` bigint UNSIGNED NOT NULL,
  `sm_facebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_twitter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_dribbble` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_youtube` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_slack` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_instagram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_behance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_google` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_reddit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sm_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`sm_id`, `sm_facebook`, `sm_twitter`, `sm_linkedin`, `sm_dribbble`, `sm_youtube`, `sm_slack`, `sm_instagram`, `sm_behance`, `sm_google`, `sm_reddit`, `sm_status`, `created_at`, `updated_at`) VALUES
(1, 'https://facebook.com/coderkhayrul', 'https://twitter.com/coderkhayrul', '#', '#', '#', '#', '#', '#', '#', '#', 1, '2022-05-23 19:41:09', '2022-06-02 01:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 for active and 0 for deactive',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `slug`, `status`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khayrul', 'admin@mail.com', '01835061968', 'khayrul', 1, NULL, NULL, '$2y$10$E/gK0AeBwxxFh8PPncrVUOfktjrfRYNrmiOMPmg55Ql5sDdtHnjXW', NULL, '2022-06-24 15:18:42', '2022-06-25 02:06:18'),
(2, 'Hasan', 'hasan@gmail.com', '01303132067', 'hasan', 1, NULL, NULL, '$2y$10$Q.W6rGZB341rSvazavI63.0oz.ADpLhf6k1vrwx1kFYnJDQSm3Asu', NULL, '2022-06-24 16:11:39', '2022-06-24 16:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `wishlist_status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `user_id`, `product_id`, `wishlist_status`, `created_at`, `updated_at`) VALUES
(12, 1, 11, 1, '2022-06-24 14:08:00', '2022-06-24 14:08:00'),
(15, 2, 10, 1, '2022-06-25 01:40:20', '2022-06-25 01:40:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `basic_infos`
--
ALTER TABLE `basic_infos`
  ADD PRIMARY KEY (`basic_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`pro_cat_id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `coupons_coupon_slug_unique` (`coupon_slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basic_infos`
--
ALTER TABLE `basic_infos`
  MODIFY `basic_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `pro_cat_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `contact_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `partner_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `sm_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
