-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 06:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `size` varchar(200) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1:active;0:inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `quantity`, `total_amount`, `size`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 699, 8, 5592, '9', 'white', 0, '2025-06-01 13:09:45', '2025-06-01 14:30:25'),
(2, 1, 1, 699, 6, 4194, '8', 'white', 0, '2025-06-01 13:16:45', '2025-06-01 14:30:23'),
(3, 1, 2, 499, 6, 2994, '8', 'white', 0, '2025-06-01 13:27:24', '2025-06-01 14:23:02'),
(4, 1, 1, 699, 1, 699, '8', 'white', 0, '2025-06-01 13:31:43', '2025-06-01 14:22:54'),
(5, 1, 2, 499, 3, 1497, '8', 'white', 0, '2025-06-01 14:30:44', '2025-06-01 14:35:36'),
(6, 1, 2, 499, 1, 499, '8', 'white', 0, '2025-06-01 14:35:57', '2025-06-01 14:36:01'),
(7, 1, 2, 499, 1, 499, '8', 'white', 0, '2025-06-01 14:36:19', '2025-06-01 14:36:45'),
(8, 1, 2, 499, 1, 499, '8', 'white', 0, '2025-06-01 14:37:30', '2025-06-01 14:37:34'),
(9, 1, 2, 499, 1, 499, '8', 'white', 0, '2025-06-01 14:38:44', '2025-06-01 14:38:48'),
(10, 1, 1, 699, 2, 1398, '8', 'white', 0, '2025-06-01 14:39:36', '2025-06-01 18:33:26'),
(11, 1, 2, 499, 2, 998, '8', 'white', 0, '2025-06-01 14:40:09', '2025-06-01 18:33:26'),
(12, 1, 1, 699, 1, 699, '9', 'white', 0, '2025-06-01 15:16:03', '2025-06-01 18:33:26'),
(13, 1, 1, 699, 1, 699, '10', 'white', 0, '2025-06-01 15:16:07', '2025-06-01 18:33:26'),
(14, 1, 1, 699, 4, 2796, '8', 'white', 0, '2025-06-01 18:35:34', '2025-06-01 20:32:33'),
(15, 1, 2, 499, 5, 2495, '8', 'white', 0, '2025-06-01 18:38:22', '2025-06-01 20:32:33'),
(16, 1, 2, 499, 2, 998, '8', 'white', 0, '2025-06-01 20:34:08', '2025-06-01 20:34:37'),
(17, 1, 1, 699, 3, 2097, '9', 'white', 0, '2025-06-01 20:34:14', '2025-06-01 20:34:37'),
(18, 1, 2, 499, 4, 1996, '8', 'white', 0, '2025-06-01 21:14:05', '2025-06-02 02:26:02'),
(19, 1, 1, 699, 4, 2796, '10', 'white', 0, '2025-06-01 21:14:22', '2025-06-02 02:26:02'),
(20, 1, 8, 1999, 13, 25987, '8', 'blue', 0, '2025-06-02 01:03:12', '2025-06-02 02:26:02'),
(21, 1, 7, 3999, 1, 3999, '8', 'Grey', 0, '2025-06-02 01:23:51', '2025-06-02 02:25:17'),
(22, 1, 3, 1999, 1, 1999, '6', 'white', 0, '2025-06-02 01:31:52', '2025-06-02 02:25:17'),
(23, 1, 3, 1999, 4, 7996, '8', 'white', 0, '2025-06-02 01:32:03', '2025-06-02 02:25:16'),
(24, 1, 3, 1999, 3, 5997, '8', 'white', 0, '2025-06-02 02:20:02', '2025-06-02 02:25:15'),
(25, 1, 2, 499, 6, 2994, '8', 'white', 1, '2025-06-02 02:26:24', '2025-06-02 02:46:14'),
(26, 1, 3, 1999, 4, 7996, '6', 'white', 1, '2025-06-02 02:26:40', '2025-06-02 02:34:07'),
(27, 1, 1, 699, 1, 699, '8', 'white', 1, '2025-06-02 02:34:12', '2025-06-02 02:34:12'),
(28, 1, 3, 1999, 1, 1999, '8', 'white', 1, '2025-06-02 02:43:58', '2025-06-02 02:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_083330_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(800) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `address` varchar(700) DEFAULT NULL,
  `city` varchar(300) DEFAULT NULL,
  `state` varchar(300) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `cart_number` varchar(20) DEFAULT NULL,
  `security_code` varchar(10) DEFAULT NULL,
  `name_on_cart` varchar(300) DEFAULT NULL,
  `expiration_date` varchar(20) DEFAULT NULL,
  `tax_amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `product_id`, `status`, `first_name`, `last_name`, `address`, `city`, `state`, `pincode`, `cart_number`, `security_code`, `name_on_cart`, `expiration_date`, `tax_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, '[1,2,1,1]', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', NULL, NULL, 0, 3794, '2025-06-01 17:31:31', '2025-06-01 17:31:31'),
(2, 1, '[1,2,1,1]', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', NULL, NULL, 0, 3794, '2025-06-01 17:32:59', '2025-06-01 17:32:59'),
(3, 1, '[1,2,1,1]', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '44', NULL, NULL, 0, 3794, '2025-06-01 17:33:15', '2025-06-01 17:33:15'),
(4, 1, '[\"1\"]', 0, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '6566', 'canarabank', '01 / 01', 0, 3495, '2025-06-01 17:44:15', '2025-06-01 17:44:15'),
(5, 1, '[\"2\"]', 0, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '2212', 'Canara Bank', '12 / 20', 0, 499, '2025-06-01 18:26:59', '2025-06-01 18:26:59'),
(6, 1, '[1,2,1,1]', 1, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '3323', 'Canara Bank', '12 / 20', 0, 3794, '2025-06-01 18:33:26', '2025-06-01 18:33:26'),
(7, 1, '[1,2]', 1, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '2121', 'Canara Bank', '12 / 12', 0, 5291, '2025-06-01 20:32:33', '2025-06-01 20:32:33'),
(8, 1, '[2,1]', 1, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '1212', 'Canara Bank', '12 / 12', 0, 3095, '2025-06-01 20:34:37', '2025-06-01 20:34:37'),
(9, 1, '[2,1,8]', 1, 'Srikanth', 'c', 'salem\r\nsalem', 'salem', 'Tamil Nadu', '636301', '656545654565456', '1212', 'Canara Bank', '12 / 12', 0, 30779, '2025-06-02 02:26:02', '2025-06-02 02:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `size` int(100) NOT NULL,
  `color` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `user_id`, `name`, `status`, `order_id`, `product_id`, `image`, `size`, `color`, `price`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bridge Comfort Walking Shoes For Men', 0, 5, 2, 'http://127.0.0.1:8000/img/puma1.jpeg', 8, 'white', 499, 1, 499, '2025-06-01 18:26:59', '2025-06-01 18:26:59'),
(2, 1, 'Puma Men\'s Momento Sneakers', 0, 6, 1, 'http://127.0.0.1:8000/img/shopping.webp', 8, 'white', 699, 2, 1398, '2025-06-01 18:33:26', '2025-06-01 18:33:26'),
(3, 1, 'Bridge Comfort Walking Shoes For Men', 0, 6, 2, 'http://127.0.0.1:8000/img/puma1.jpeg', 8, 'white', 499, 2, 998, '2025-06-01 18:33:26', '2025-06-01 18:33:26'),
(4, 1, 'Puma Men\'s Momento Sneakers', 0, 6, 1, 'http://127.0.0.1:8000/img/shopping.webp', 9, 'white', 699, 1, 699, '2025-06-01 18:33:26', '2025-06-01 18:33:26'),
(5, 1, 'Puma Men\'s Momento Sneakers', 0, 6, 1, 'http://127.0.0.1:8000/img/shopping.webp', 10, 'white', 699, 1, 699, '2025-06-01 18:33:26', '2025-06-01 18:33:26'),
(6, 1, 'Puma Men\'s Momento Sneakers', 0, 7, 1, 'http://127.0.0.1:8000/img/shopping.webp', 8, 'white', 699, 4, 2796, '2025-06-01 20:32:33', '2025-06-01 20:32:33'),
(7, 1, 'Bridge Comfort Walking Shoes For Men', 0, 7, 2, 'http://127.0.0.1:8000/img/puma1.jpeg', 8, 'white', 499, 5, 2495, '2025-06-01 20:32:33', '2025-06-01 20:32:33'),
(8, 1, 'Bridge Comfort Walking Shoes For Men', 0, 8, 2, 'http://127.0.0.1:8000/img/puma1.jpeg', 8, 'white', 499, 2, 998, '2025-06-01 20:34:37', '2025-06-01 20:34:37'),
(9, 1, 'Puma Men\'s Momento Sneakers', 0, 8, 1, 'http://127.0.0.1:8000/img/shopping.webp', 9, 'white', 699, 3, 2097, '2025-06-01 20:34:38', '2025-06-01 20:34:38'),
(10, 1, 'Bridge Comfort Walking Shoes For Men', 0, 9, 2, 'http://127.0.0.1:8000/img/puma1.jpeg', 8, 'white', 499, 4, 1996, '2025-06-02 02:26:02', '2025-06-02 02:26:02'),
(11, 1, 'Puma Men\'s Momento Sneakers', 0, 9, 1, 'http://127.0.0.1:8000/img/shopping.webp', 10, 'white', 699, 4, 2796, '2025-06-02 02:26:02', '2025-06-02 02:26:02'),
(12, 1, 'Nike Flex Experience Run 11 Training & Gym Shoes for Men', 0, 9, 8, 'http://127.0.0.1:8000/img/new/b1.jpeg', 8, 'blue', 1999, 13, 25987, '2025-06-02 02:26:02', '2025-06-02 02:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(700) NOT NULL,
  `image` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1:active;0:inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `color`, `size`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Puma Men\'s Momento Sneakers', 'Step out in style with Puma Men\'s Momento Sneakers — where sleek design meets everyday comfort. Perfect for casual wear with durable build and cushioned support.', '[\"img/shopping.webp\",\"img/shopping (1).webp\",\"img/shopping (2).webp\"]', '[\"white\"]', '[8,9,10]', 699, 1, '2025-05-31 02:45:09', '2025-05-31 02:45:09'),
(2, 'Bridge Comfort Walking Shoes For Men', 'Experience all-day comfort with Puma Bridge Comfort Walking Shoes for Men — lightweight, cushioned, and built for everyday walks. Stylish design meets breathable support for active lifestyles.', '[\"img/puma1.jpeg\",\"img/puma2.jpeg\",\"img/puma3.jpeg\"]', '[\"white\"]', '[8]', 499, 1, '2025-06-01 13:23:33', '2025-06-01 13:24:37'),
(3, 'Adidas Predator League FG/MG Football Shoes for Men', 'Engineered for precision, these boots feature a Hybridfeel upper with 3D texture and Strikescale fins for enhanced shooting accuracy. The Controlplate 2.0 outsole ensures stability on firm and artificial grounds.', '[\"img/new/a1.jpeg\",\"img/new/a2.jpeg\",\"img/new/a3.jpeg\"]', '[\"white\"]', '[6,7,8,9,10]', 1999, 1, '2025-06-02 00:07:14', '2025-06-02 00:07:14'),
(4, 'Nike Air Max Impact 4 Sneakers for Men', 'Elevate your game with Max Air cushioning and herringbone traction for confident landings and quick cuts. Lightweight mesh and molded rubber wings offer breathable support and lateral stability on and off the court.', '[\"img/new/n1.jpeg\",\"img/new/n2.jpeg\",\"img/new/n3.jpeg\"]', '[\"black\"]', '[8,9,10]', 999, 1, '2025-06-02 00:10:15', '2025-06-02 00:10:15'),
(5, 'Nike Mens Court Vision Low Shoes', 'Inspired by 80s basketball, these sneakers feature a durable synthetic leather upper and a rubber cupsole for all-day comfort and traction.', '[\"img/new/ni1.webp\",\"img/new/ni2.webp\",\"img/new/ni3.webp\"]', '[\"white\"]', '[6,7,8,9,10]', 799, 1, '2025-06-02 00:12:53', '2025-06-02 00:12:53'),
(6, 'Nike Men\'s Court Vision Low Next Nature Shoes', 'Step into sustainable style with Nike\'s Court Vision Low Next Nature shoes. Made with at least 20% recycled materials, these sneakers blend classic design with modern eco-conscious innovation.', '[\"img/new/shopping.webp\",\"img/new/shopping (1).webp\"]', '[\"white\",\"black\"]', '[6,7,8,9,10]', 599, 1, '2025-06-02 00:14:38', '2025-06-02 00:48:40'),
(7, 'Nike Flex Experience Run 11 Running Shoes for Men', 'Lightweight and breathable, these shoes feature flex grooves for natural movement and a mesh upper for all-day comfort. Crafted with at least 20% recycled content, they support both your stride and sustainability goals.', '[\"img/new/g1.jpeg\",\"img/new/g2.jpeg\",\"img/new/g3.jpeg\"]', '[\"Grey\"]', '[8,9,10]', 3999, 1, '2025-06-02 00:30:46', '2025-06-02 00:33:45'),
(8, 'Nike Flex Experience Run 11 Training & Gym Shoes for Men', 'Experience lightweight comfort with the Nike Flex Experience Run 11, featuring a breathable mesh upper and flexible outsole grooves for natural movement. Designed with at least 20% recycled materials, these shoes support both your performance and sustainability goals.', '[\"img/new/b1.jpeg\",\"img/new/b2.jpeg\"]', '[\"blue\"]', '[8]', 1999, 1, '2025-06-02 00:33:31', '2025-06-02 00:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YL5RB6rKPLAJCkcfGNf0qZ4k6gfAGCXp3IMC5B6s', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY0NMMW03ZFJubUhmWlFuY3JKU2ZjREdHWDJ4QVg1YzlINjhnY1FoaSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1748812844);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'srikanth', 'sri@gmail.com', NULL, '$2y$12$VKPGiJcwFnkw3pHoaN4rK.WFcITu4pOJLfoe7Dn9fVBeCaWM0NSGm', 'I0At7BAQENrgRfjDxV6rBbr7dQq5l7EyNCmvF9Mox84V68WZ7vHD5T7xRDfu', '2025-05-30 03:08:34', '2025-05-30 03:08:34'),
(2, 'Srikanth', 'srikanth240620@gmail.com', NULL, '$2y$12$ZH9p9C.952EoBPS6U.oAluU1ehGfHp2jeq2z5yAZPbpFWYR9LGaOu', NULL, '2025-06-01 09:48:03', '2025-06-01 09:48:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
