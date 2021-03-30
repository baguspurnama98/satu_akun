-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2021 at 09:09 PM
-- Server version: 10.3.28-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7091454_patungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_date` datetime NOT NULL,
  `duration_date` datetime NOT NULL,
  `durasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `slot_capacity` int(11) NOT NULL,
  `slot_price` double NOT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `description`, `email_id`, `categories_id`, `expired_date`, `duration_date`, `durasi`, `status`, `slot_capacity`, `slot_price`, `media_url`, `password_email`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 'Nonton Netflix Bareng Mbak Chelsea', 'Ayo kapan lagi nobar netflix sama mbak chelsea, yuk murah meriah', NULL, 2, '2021-03-26 17:28:35', '2021-04-19 17:28:34', '1 Bulan', 0, 5, 250000, 'https://service.baguspurnama.com/api/v1/campaign/images/mikUwI1A20210319', '', 0, NULL, NULL, '2021-03-19 17:29:09', '2021-03-19 17:29:09'),
(8, 'NEFLIX BARENG MAS NONO ', 'NETFLIX MANTAP', NULL, 1, '2021-04-02 12:51:13', '2021-05-26 12:51:12', '2 Bulan', 0, 10, 24999, NULL, '', 0, NULL, NULL, '2021-03-26 12:52:45', '2021-03-26 12:52:45'),
(9, 'Nonton Bareng Mas Pamungkas', 'bismilah', NULL, 2, '2021-04-02 20:06:05', '2021-06-26 20:06:04', '3 Bulan', 0, 4, 50000, 'https://service.baguspurnama.com/api/v1/campaign/images/dqlhUycj20210326', '', 0, 'null', 'null', '2021-03-26 20:06:24', '2021-03-26 20:32:07'),
(10, 'DISNEY BARENG BANG JAY', 'DISNEY MANTAP', NULL, 1, '2021-04-02 20:08:19', '2028-03-26 20:08:17', '7 Tahun', 0, 60, 10, 'https://service.baguspurnama.com/api/v1/campaign/images/rV5HSqqZ20210326', '', 0, NULL, NULL, '2021-03-26 20:08:26', '2021-03-26 20:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_categories`
--

CREATE TABLE `campaign_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_categories`
--

INSERT INTO `campaign_categories` (`id`, `categories`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dummy', 0, 'Kanjeng', 'Dimas', '2021-03-17 15:00:14', '2021-03-17 15:00:14'),
(2, 'Pendidikan', 0, NULL, NULL, '2021-03-19 07:39:32', '2021-03-19 07:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_members`
--

CREATE TABLE `campaign_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_host` tinyint(1) NOT NULL DEFAULT 0,
  `is_pay` tinyint(1) NOT NULL DEFAULT 0,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_members`
--

INSERT INTO `campaign_members` (`id`, `user_id`, `campaign_id`, `is_host`, `is_pay`, `info`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(18, 3, 8, 0, 0, NULL, NULL, NULL, '2021-03-26 22:31:53', '2021-03-26 22:31:53'),
(21, 8, 9, 0, 0, NULL, NULL, NULL, '2021-03-29 08:13:49', '2021-03-29 08:13:49'),
(22, 8, 10, 0, 0, NULL, NULL, NULL, '2021-03-29 08:15:46', '2021-03-29 08:15:46'),
(23, 5, 8, 0, 0, NULL, NULL, NULL, NULL, NULL),
(24, 1, 8, 0, 0, NULL, NULL, NULL, NULL, NULL),
(25, 1, 9, 0, 0, NULL, NULL, NULL, '2021-03-30 17:52:05', '2021-03-30 17:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_reports`
--

CREATE TABLE `campaign_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `info`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'patungan1@gmail.com', 'Ini Dummy', 1, 0, 'Billar', 'Rizky', '2021-03-17 15:00:13', '2021-03-17 15:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_12_200714_create_user_table', 1),
(2, '2021_02_15_150359_create_social_media_table', 1),
(3, '2021_02_20_170422_create_jobs_table', 1),
(4, '2021_02_20_171304_create_failed_jobs_table', 1),
(5, '2021_02_20_193607_create_campaign_categories_table', 1),
(6, '2021_02_27_210006_create_emails_table', 1),
(7, '2021_02_27_225714_create_campaigns_table', 1),
(8, '2021_02_27_225950_create_campaign_members_table', 1),
(9, '2021_02_27_230000_create_transactions_table', 1),
(10, '2021_02_28_130115_create_campaign_reports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedias`
--

CREATE TABLE `socialmedias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campaign_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` double NOT NULL,
  `unique_code` double NOT NULL,
  `total_nominal` double NOT NULL,
  `no_rek_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rek_destination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `timeout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `campaign_id`, `bank`, `no_transaction`, `type`, `nominal`, `unique_code`, `total_nominal`, `no_rek_origin`, `no_rek_destination`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`, `timeout`) VALUES
(2, 1, 9, 'OVO', '277625031', '1', 256500, 614, 257114, NULL, NULL, 2, 0, NULL, NULL, '2021-03-20 01:02:45', '2021-03-30 21:08:04', '2021-03-29 20:59:37'),
(3, 5, 7, 'OVO', '725702366', '1', 256500, 213, 256713, NULL, NULL, 2, 0, NULL, NULL, '2021-03-25 22:03:04', '2021-03-30 21:05:03', '2021-03-29 20:58:57'),
(4, 6, 7, 'OVO', '1959688500', '1', 256500, 369, 256869, NULL, NULL, 2, 0, NULL, NULL, '2021-03-26 12:48:58', '2021-03-30 21:01:02', '2021-03-30 03:43:27'),
(5, 1, 10, 'OVO', '1698551493', '1', 2010, 758, 2768, NULL, NULL, 2, 0, NULL, NULL, '2021-03-26 20:22:55', '2021-03-30 21:01:02', '2021-03-30 03:43:44'),
(6, 8, 10, 'OVO', '2073113480', '1', 2010, 307, 2317, NULL, NULL, 2, 0, NULL, NULL, '2021-03-26 20:24:06', '2021-03-30 21:02:02', '2021-03-30 03:43:49'),
(7, 3, 10, 'OVO', '514715853', '1', 2010, 704, 2714, NULL, NULL, 2, 0, NULL, NULL, '2021-03-26 22:12:23', '2021-03-30 21:02:02', '2021-03-30 03:43:54'),
(8, 3, 8, 'OVO', '793138424', '1', 29799, 238, 30037, NULL, NULL, 2, 0, NULL, NULL, '2021-03-26 22:19:34', '2021-03-30 20:56:02', '2021-03-30 03:43:57'),
(9, 3, 8, 'OVO', '40754931', '1', 29799, 464, 30263, NULL, NULL, 0, 0, NULL, NULL, '2021-03-26 22:31:53', '2021-03-26 22:31:53', NULL),
(10, 1, 10, 'OVO', '2112110647', '1', 2010, 713, 2723, NULL, NULL, 0, 0, NULL, NULL, '2021-03-28 00:20:21', '2021-03-28 00:20:21', NULL),
(11, 1, 9, 'OVO', '1652726954', '1', 54800, 288, 55088, NULL, NULL, 0, 0, NULL, NULL, '2021-03-29 00:13:16', '2021-03-29 00:13:16', NULL),
(12, 8, 9, 'OVO', '2083056559', '1', 54800, 144, 54944, NULL, NULL, 0, 0, NULL, NULL, '2021-03-29 08:13:49', '2021-03-29 08:13:49', NULL),
(13, 8, 10, 'OVO', '23219372', '1', 2010, 825, 2835, NULL, NULL, 0, 0, NULL, NULL, '2021-03-29 08:15:46', '2021-03-29 08:15:46', NULL),
(14, 5, 8, 'OVO', '725702366', '1', 256500, 213, 256713, NULL, NULL, 2, 0, NULL, NULL, '2021-03-25 22:03:04', '2021-03-30 20:40:07', '2021-03-29 20:58:57'),
(15, 1, 9, 'OVO', '914608055', '1', 54800, 298, 55098, NULL, NULL, 0, 0, NULL, NULL, '2021-03-30 17:52:05', '2021-03-30 17:52:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `role` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'u',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `whatsapp`, `otp`, `status`, `role`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Apri', 'apriyantotobing8@gmail.com', '$2y$10$sDVNkuDrzQ9fY83CsjvwWuYaicjpCikNNFP.Uu1UGI2d8jKa/iALO', NULL, '621605', 1, 'u', NULL, NULL, '2021-03-17 15:00:13', '2021-03-29 08:51:40'),
(2, 'Admin', 'admin@patungin.com', '$2y$10$BdTQ4wjNNEt1jhN2yc69Me.RfumOWysskXOQt8fygR/FvaVZhH1fS', NULL, NULL, 1, 'a', NULL, NULL, '2021-03-17 15:00:13', '2021-03-17 15:00:13'),
(3, 'Bagus Purnama', 'baguspurnama889@gmail.com', '$2y$10$eUmJmC7N8D4nXtKxNLsyYe785PZ77ExJOQ9WDTln7bbdxmYrZMndW', '08976634788', '806592', 1, 'u', NULL, NULL, '2021-03-19 13:40:18', '2021-03-19 13:40:50'),
(4, 'Komeng', 'heriembeng02@gmail.com', '$2y$10$LhD7bacXW5AuMiaP27b6ceMW89C/DrQ3uQs5cstPfoRmF7laZa7Z6', '081211612616', '098994', 1, 'u', NULL, NULL, '2021-03-19 15:07:10', '2021-03-19 15:08:31'),
(5, 'Anastasya Eka Narwastu Napitupulu', 'tasyanapitupulu34@gmail.com', '$2y$10$Ztv6NCXX476h5I3naLe6jOwphCYjMVjQ1x9XsMgEbcZkbRGTPzpt6', '081370577233', '285047', 1, 'u', NULL, NULL, '2021-03-25 22:02:19', '2021-03-25 22:02:51'),
(6, 'Alexander Jesse Andy Firdaus', 'alxjesse@gmail.com', '$2y$10$sTeIsacwpjxH2WvoTMfJvehOE6tqyqU9eMAUmJVV6m5lz7NAssl/q', '082266605123', '482359', 1, 'u', NULL, NULL, '2021-03-26 12:47:24', '2021-03-29 08:50:16'),
(8, 'bocil', 'alxjesse@student.ub.ac.id', '$2y$10$05tFTLsqBVhipJUS9hBwOucpMRQP5skjlb/gGChrv6HYmjVrKP2qy', '082266605124', '396791', 1, 'u', NULL, NULL, '2021-03-26 20:18:40', '2021-03-26 20:19:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaigns_email_id_index` (`email_id`),
  ADD KEY `campaigns_categories_id_index` (`categories_id`);
ALTER TABLE `campaigns` ADD FULLTEXT KEY `fulltext_index` (`title`,`description`);

--
-- Indexes for table `campaign_categories`
--
ALTER TABLE `campaign_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campaign_categories_categories_unique` (`categories`);

--
-- Indexes for table `campaign_members`
--
ALTER TABLE `campaign_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_members_user_id_index` (`user_id`),
  ADD KEY `campaign_members_campaign_id_index` (`campaign_id`);

--
-- Indexes for table `campaign_reports`
--
ALTER TABLE `campaign_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campaign_reports_user_id_index` (`user_id`),
  ADD KEY `campaign_reports_campaign_id_index` (`campaign_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedias`
--
ALTER TABLE `socialmedias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socialmedias_user_id_index` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_index` (`user_id`),
  ADD KEY `transactions_campaign_id_index` (`campaign_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `campaign_categories`
--
ALTER TABLE `campaign_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaign_members`
--
ALTER TABLE `campaign_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `campaign_reports`
--
ALTER TABLE `campaign_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `socialmedias`
--
ALTER TABLE `socialmedias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `campaign_categories` (`id`),
  ADD CONSTRAINT `campaigns_email_id_foreign` FOREIGN KEY (`email_id`) REFERENCES `emails` (`id`);

--
-- Constraints for table `campaign_members`
--
ALTER TABLE `campaign_members`
  ADD CONSTRAINT `campaign_members_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `campaign_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `campaign_reports`
--
ALTER TABLE `campaign_reports`
  ADD CONSTRAINT `campaign_reports_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `campaign_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `socialmedias`
--
ALTER TABLE `socialmedias`
  ADD CONSTRAINT `socialmedias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_campaign_id_foreign` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
