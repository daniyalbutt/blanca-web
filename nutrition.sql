-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 07:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrition`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist_docs`
--

CREATE TABLE `checklist_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `nutritionist_client_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_check` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checklist_docs`
--

INSERT INTO `checklist_docs` (`id`, `name`, `path`, `nutritionist_client_id`, `user_id`, `user_check`, `created_at`, `updated_at`) VALUES
(1, 'avatar-s-19', 'avatar-s-19_0_]1698684405.png', 1, 1, 0, '2023-10-30 23:46:45', '2023-10-30 23:46:45'),
(2, 'dummy', 'dummy_0_]1698684406.jpg', 1, 1, 0, '2023-10-30 23:46:46', '2023-10-30 23:46:46'),
(3, 'Dzpsry', 'Dzpsry_0_]1698684406.pptx', 1, 1, 0, '2023-10-30 23:46:46', '2023-10-30 23:46:46');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_27_224142_add_paid_to_users_table', 2),
(6, '2023_10_27_231344_add_address_to_users_table', 3),
(7, '2023_10_28_001622_create_nutritionist_client_table', 4),
(8, '2023_10_30_154451_create_checklist_docs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nutritionist_client`
--

CREATE TABLE `nutritionist_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nutritionist_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nutritionist_client`
--

INSERT INTO `nutritionist_client` (`id`, `nutritionist_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2023-10-28 07:23:28', '2023-10-28 07:23:28'),
(2, 2, 5, '2023-10-28 07:36:29', '2023-10-28 07:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `phone`, `comment`, `address`) VALUES
(1, 'Grow With  Me', 'info@growwithme.com', NULL, '$2y$10$bZn7gTNsGNWoKpu1XjvQ3uvtnRQBKnopUhAGJZYNF97DJbNDRAgpi', 0, NULL, '2023-10-28 04:07:16', '2023-10-28 04:07:16', NULL, NULL, NULL),
(2, 'Declan Pierce', 'gulywyvepe@mailinator.com', NULL, '$2y$10$bZn7gTNsGNWoKpu1XjvQ3uvtnRQBKnopUhAGJZYNF97DJbNDRAgpi', 1, NULL, '2023-10-28 05:48:37', '2023-10-28 05:48:37', '+1 (165) 477-9732', 'Omnis praesentium si', NULL),
(3, 'Scarlet Decker', 'xexofo@mailinator.com', NULL, '$2y$10$fHugVr4.hzPrPgcnuo3OjODmQS5pQEMy6jmPnrIUYXLbOzi0sc2y6', 2, NULL, '2023-10-28 06:16:24', '2023-10-28 06:16:24', '+1 (702) 264-4564', 'Et pariatur Repudia', 'Quis harum quam cons'),
(4, 'Dale Barrera', 'quropaq@mailinator.com', NULL, '$2y$10$bZn7gTNsGNWoKpu1XjvQ3uvtnRQBKnopUhAGJZYNF97DJbNDRAgpi', 1, NULL, '2023-10-28 07:24:41', '2023-10-28 07:24:41', '+1 (264) 309-6267', 'Minim similique inve', NULL),
(5, 'Coby Mcintosh', 'beryfab@mailinator.com', NULL, '$2y$10$i38EvvpL6W9YEX.ToViGHuHaAdlwn3YbiSim9II9fJ.nZp/OSjS3m', 2, NULL, '2023-10-28 07:25:28', '2023-10-28 07:25:28', '+1 (762) 622-7511', 'Cupiditate dolor odi', 'Sunt sunt ab qui ma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist_docs`
--
ALTER TABLE `checklist_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklist_docs_nutritionist_client_id_foreign` (`nutritionist_client_id`),
  ADD KEY `checklist_docs_user_id_foreign` (`user_id`);

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
-- Indexes for table `nutritionist_client`
--
ALTER TABLE `nutritionist_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nutritionist_client_nutritionist_id_foreign` (`nutritionist_id`),
  ADD KEY `nutritionist_client_client_id_foreign` (`client_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `checklist_docs`
--
ALTER TABLE `checklist_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nutritionist_client`
--
ALTER TABLE `nutritionist_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checklist_docs`
--
ALTER TABLE `checklist_docs`
  ADD CONSTRAINT `checklist_docs_nutritionist_client_id_foreign` FOREIGN KEY (`nutritionist_client_id`) REFERENCES `nutritionist_client` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checklist_docs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nutritionist_client`
--
ALTER TABLE `nutritionist_client`
  ADD CONSTRAINT `nutritionist_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nutritionist_client_nutritionist_id_foreign` FOREIGN KEY (`nutritionist_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
