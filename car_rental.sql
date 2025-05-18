-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 10:55 AM
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
-- Database: `car_rental`
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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Toyota Allion', 'Toyota', 'Toyota Allion', 2023, 'Sedan', 1500.00, 1, 'cars/zTMgmpvl2slPl832Q7Brbq3vit84xOkbCEbocdO7.webp', '2025-05-16 06:49:25', '2025-05-16 06:49:25'),
(3, 'Toyota Hiace', 'Toyota', 'Toyota Hiace', 2024, 'Hatchback', 3000.00, 1, 'cars/7Xsnla7N9ugVXADUc2aTZ8rVh8h54KZZbV3Oggkr.webp', '2025-05-16 06:52:52', '2025-05-16 06:52:52'),
(5, 'Suzuki Ertiga', 'Suzuki', 'Suzuki Ertiga 22', 2022, 'MUV', 1800.00, 0, 'cars/b0hdyzDZDuI1m5IWSj12Nded9JYCz2YGbgiPiEQE.webp', '2025-05-16 06:56:59', '2025-05-18 02:02:44'),
(6, 'BMW M4 Competition', 'BMW', 'BMW M4 Competition', 2025, 'Coupe', 2500.00, 1, 'cars/daDjkY1eoDzRWqbOul00FtV7liLVIzR9jUJYa2IS.webp', '2025-05-16 06:59:21', '2025-05-16 06:59:21'),
(7, 'Hyundai H1', 'Hyundai', 'Hyundai H1', 2022, 'Wagon', 2800.00, 1, 'cars/ILK2bOYeD3w7uIQL6vWIaTrNc6wkJIYU2HcoVmLD.webp', '2025-05-16 07:02:11', '2025-05-16 07:02:11'),
(8, 'Toyota Probox', 'Toyotaa', 'Toyota Probox', 2023, 'Wagon', 2200.00, 0, 'cars/SuWaxormeLAmMdCeMFE2KxgSTirW1RxYEyP0g5fn.webp', '2025-05-16 07:03:55', '2025-05-18 01:55:45'),
(10, 'Toyota Probox', 'Suzuki', 'Toyota Probox', 2022, 'Sedan', 2590.00, 1, 'cars/NGpTNvxaGpwVmp21mQCgCM7pbIItxmAv57964gYJ.webp', '2025-05-18 01:56:51', '2025-05-18 01:56:51'),
(11, 'MITSUBISHI XPANDER', 'MITSUBISHI', 'MITSUBISHI XPANDER', 2023, 'MUV', 2000.00, 1, 'cars/usu8JETVB71Tc5sQbDc5XgGm57PwBzNOrGwNM7D9.webp', '2025-05-18 02:03:41', '2025-05-18 02:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2025_05_13_074634_create_cars_table', 1),
(5, '2025_05_13_074635_create_rentals_table', 1),
(6, '2025_05_16_122015_add_is_admin_to_users_table', 2),
(7, '2025_05_17_141628_add_status_to_rentals_table', 3);

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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `total_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `status`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 2, 7, '2025-05-18', '2025-05-19', 'ongoing', 5600.00, '2025-05-17 01:12:28', '2025-05-18 01:57:28'),
(2, 2, 7, '2025-05-22', '2025-05-23', 'processing', 5600.00, '2025-05-17 01:20:44', '2025-05-17 08:39:17'),
(3, 2, 2, '2025-05-18', '2025-05-19', 'confirmed', 3000.00, '2025-05-17 01:25:10', '2025-05-17 08:22:30'),
(5, 2, 3, '2025-05-27', '2025-05-28', 'cancelled', 6000.00, '2025-05-17 01:42:34', '2025-05-17 08:22:21'),
(6, 2, 7, '2025-05-30', '2025-05-31', 'completed', 5600.00, '2025-05-17 07:56:08', '2025-05-17 08:22:16'),
(7, 2, 8, '2025-05-19', '2025-05-20', 'ongoing', 4400.00, '2025-05-17 08:03:52', '2025-05-17 08:22:11'),
(8, 2, 5, '2025-05-30', '2025-05-31', 'pending', 3600.00, '2025-05-17 08:38:26', '2025-05-17 08:38:26'),
(9, 2, 6, '2025-05-20', '2025-05-22', 'cancelled', 7500.00, '2025-05-18 01:34:00', '2025-05-18 01:49:55'),
(10, 3, 5, '2025-05-21', '2025-05-23', 'ongoing', 5400.00, '2025-05-18 01:43:45', '2025-05-18 01:49:49'),
(13, 7, 10, '2025-05-20', '2025-05-23', 'confirmed', 10360.00, '2025-05-18 02:00:44', '2025-05-18 02:02:06');

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
('1EDUDR2idUavDvDxclQGvnlAHv3PQzWLvz48HxEc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2tUTWthdGRScXpCdE41OGxuSnUzT3FPVG5sZ3ZPcWdHZ0k0dmNjQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1747555429);

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
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$ju4PDWRfQzkZE2CWRh0is.NktSeki9FhJ/mEn7nxscWsrXsoujUbO', 'admin', NULL, '2025-05-16 03:15:11', '2025-05-16 03:15:11', 0),
(2, 'priya', 'priya@gmail.com', NULL, '$2y$12$YVoQacOt9MKt6rTPYq5oJupxPn/dTean69wFswpsbQG8rER9qznHi', 'customer', NULL, '2025-05-16 06:25:57', '2025-05-17 00:42:27', 0),
(3, 'Ayon', 'ayon@gmail.com', NULL, '$2y$12$XpXqR7hEbtr6UyR.VDSG7edrD3yQMRlirwHLPsV/l8rgvNfMzbQJu', 'customer', NULL, '2025-05-18 01:42:25', '2025-05-18 01:42:25', 0),
(4, 'Hridoy', 'hridoy@gmail.com', NULL, '$2y$12$QvgFIACzqxwFBxwd458/Lup3945vkbyblh8pGEVf8g6sMXrdHa9jS', 'customer', NULL, '2025-05-18 01:45:07', '2025-05-18 01:45:07', 0),
(5, 'Priyanka', 'priyanka@gmail.com', NULL, '$2y$12$kYBRvvmd.C/aaaCjs4LO/eOH2c08V787I85BsH.yNgj/H7ia6ci/W', 'customer', NULL, '2025-05-18 01:48:08', '2025-05-18 01:48:08', 0),
(6, 'Ananya', 'ananya@gmail.com', NULL, '$2y$12$TrbSJ6PlVZqSWdsOlUKcT.NJzUUjgajgk8EuFbq3aJNdR6PAHq5iK', 'customer', NULL, '2025-05-18 01:54:08', '2025-05-18 01:54:08', 0),
(7, 'Prity', 'prity@gmail.com', NULL, '$2y$12$jPKNCbYX13FwYIv96IOwP.g1/g1DmbO9F2syBFZ633IDvhBBnhAc6', 'customer', NULL, '2025-05-18 02:00:09', '2025-05-18 02:00:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
