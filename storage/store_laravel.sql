-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 05:10 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2019_02_06_113423_create_admins_table', 1),
(35, '2019_02_08_140458_create_products_table', 1),
(36, '2019_02_11_131404_create_categories_table', 1),
(37, '2019_02_11_163534_create_brands_table', 1),
(38, '2019_02_12_090642_create_suppliers_table', 1),
(39, '2019_02_12_130001_create_supplies_table', 1),
(40, '2019_02_13_104454_create_supplies_table', 2),
(41, '2019_02_13_110620_create_supplies_table', 3),
(42, '2019_02_18_115933_create_supplies_table', 4),
(43, '2019_02_21_161016_create_purchases_table', 5),
(44, '2019_02_25_141902_create_purchases_table', 6),
(45, '2019_02_28_114558_create_notifications_table', 7),
(46, '2019_03_01_114518_create_purchases_table', 8),
(47, '2019_03_01_131316_create_purchases_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('14565b4d-6a83-457b-8b3b-242efd7d52c5', 'App\\Notifications\\ProductsSupplied', 'App\\User', 1, '{\"subject\":\"New supplies.\",\"line\":{\"0\":\"The following products were supplied to the store.\",\"item\":\"Cocacola 33cl can, Mat Corn flakes, Pepsi pet bottle\",\"desc\":\"Received by mateo\"},\"action\":\"View Supply\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/supplies\\/27\",\"thanks\":\"Regards\",\"name\":\"Admin\"}', NULL, '2019-02-28 15:38:49', '2019-02-28 15:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `purchase_cost` double UNSIGNED DEFAULT '0',
  `selling_price` double UNSIGNED DEFAULT '0',
  `stock_quantity` int(11) NOT NULL DEFAULT '0',
  `physical_quantity_units` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_images`, `category_id`, `brand_id`, `purchase_cost`, `selling_price`, `stock_quantity`, `physical_quantity_units`, `physical_quantity`, `supplier_id`, `deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cocacola 33cl can', '[\"images.jpg\"]', 1, 1, 80, 100, 14, 'cl', '33', 1, 0, '2019-02-12 14:42:47', '2019-03-01 12:17:44', NULL),
(2, 'Mat Corn flakes', '[\"download.jpg\"]', 1, 1, 650, 700, 49, 'gramme', '450', 1, 0, '2019-02-13 08:44:11', '2019-03-01 12:18:46', NULL),
(3, 'Pepsi pet bottle', '[\"download.jpg\",\"images.jpg\"]', 1, 1, 85, 100, 19, 'cl', '50', 1, 0, '2019-02-25 15:14:17', '2019-03-01 12:19:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `customer_name`, `customer_phone`, `customer_mail`, `customer_address`, `product_name`, `product_id`, `size`, `rate`, `purchase_quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Anoymous', 'Anoymous', 'Anoymous', 'Anoymous', 'Cocacola 33cl can', 1, '33 cl', '100', '1', '100', '2019-02-28 12:17:44', '2019-03-01 12:17:44'),
(2, 'Anoymous', 'Anoymous', 'Anoymous', 'Anoymous', 'Mat Corn flakes', 2, '450 gramme', '700', '1', '700', '2019-03-01 12:18:46', '2019-03-01 12:18:46'),
(3, 'Anoymous', 'Anoymous', 'Anoymous', 'Anoymous', 'Pepsi pet bottle', 3, '50 cl', '100', '1', '100', '2019-03-01 12:19:54', '2019-03-01 12:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`, `created_at`, `updated_at`) VALUES
(0, 'Anonymous', '2019-02-18 13:42:22', '2019-02-18 13:42:22'),
(1, 'UAC foods', '2019-02-12 13:03:10', '2019-02-12 13:03:10'),
(2, 'Coca cola Nig', '2019-02-12 13:03:15', '2019-02-12 13:03:15'),
(3, 'Dangote foods', '2019-02-21 08:44:33', '2019-02-21 08:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `goods_supplied` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `supplier_id`, `goods_supplied`, `description`, `complete`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'It\'s here', 1, '2019-02-18 11:16:04', '2019-02-18 11:16:04'),
(2, 2, '1,2', 'It\'s here', 1, '2019-02-18 11:55:56', '2019-02-18 11:55:56'),
(5, 0, '1,2', 'Supplied by mateo', 1, '2019-02-18 13:44:15', '2019-02-18 13:44:15'),
(6, 0, '2', 'Supplied by mateo', 1, '2019-02-18 13:45:09', '2019-02-18 13:45:09'),
(7, 2, '1', 'Supplied by mateo', 1, '2019-02-18 13:46:52', '2019-02-18 13:46:52'),
(8, 1, '2', 'Received by mateo', 1, '2019-02-18 13:52:09', '2019-02-18 13:52:09'),
(9, 0, '2', 'Received by mateo', 1, '2019-02-18 13:54:31', '2019-02-18 13:54:31'),
(10, 0, '2', 'Received by mateo', 1, '2019-02-18 13:54:44', '2019-02-18 13:54:44'),
(11, 0, '1', 'Supplied by mateo', 1, '2019-02-18 13:55:56', '2019-02-18 13:55:56'),
(12, 0, '1', 'Supplied by mateo', 1, '2019-02-18 13:59:58', '2019-02-18 13:59:58'),
(13, 0, '1', 'Supplied by mateo', 1, '2019-02-18 14:01:30', '2019-02-18 14:01:30'),
(14, 1, '2', 'Received by mateo', 1, '2019-02-18 14:03:44', '2019-02-18 14:03:44'),
(15, 1, '2', 'Received by mateo', 1, '2019-02-18 14:03:55', '2019-02-18 14:03:55'),
(16, 0, '3', 'Received by mateo', 1, '2019-02-26 14:44:56', '2019-02-26 14:44:56'),
(17, 0, '3', 'La vida local', 1, '2019-02-28 11:50:28', '2019-02-28 11:50:28'),
(18, 0, '3', 'La vida local', 1, '2019-02-28 11:53:36', '2019-02-28 11:53:36'),
(19, 0, '3', 'La vida local', 1, '2019-02-28 11:54:25', '2019-02-28 11:54:25'),
(20, 3, '3', 'La vida local', 1, '2019-02-28 12:50:19', '2019-02-28 12:50:19'),
(21, 3, '3', 'La vida local', 1, '2019-02-28 12:51:11', '2019-02-28 12:51:11'),
(22, 0, '3', 'La vida local', 1, '2019-02-28 12:53:01', '2019-02-28 12:53:01'),
(23, 0, '3', 'La vida local', 1, '2019-02-28 12:58:12', '2019-02-28 12:58:12'),
(24, 0, '3', 'La vida local', 1, '2019-02-28 13:01:00', '2019-02-28 13:01:00'),
(25, 3, '1,2,3', 'Received by mateo', 1, '2019-02-28 13:04:53', '2019-02-28 13:04:53'),
(26, 3, '3', 'La vida local', 1, '2019-02-28 15:05:51', '2019-02-28 15:05:51'),
(27, 2, '1,2,3', 'Received by mateo', 1, '2019-02-28 15:38:49', '2019-02-28 15:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@doe.com', NULL, '$2y$10$Cc5a6aV.awn1bvKWmzxLROEpa1mjuhZSGvc18VxxxRkPxVoCs0c1i', 'pCi37sr1q2HsLv4jixUwIM3mgRGdNSzdMivadaZBeykK2EUbhJhnF000ALF9', '2019-02-18 14:59:39', '2019-02-18 14:59:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9457;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
