-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 06:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pronew`
--

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
(5, '2024_10_09_040409_create_stores_table', 2);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `logo`, `address`, `name`, `website`, `phone`, `open_hours`, `email`, `created_at`, `updated_at`) VALUES
(1, 'logos/5rxMc59fVpmTcvADObQ3lQtQergiyDFJb5uy8AIz.jpg', 'sas', 'sasasa', 'http://127.0.0.1:8000/users', '9652356235', 'asasa', 'nandhinimurugan310@gmail.com', '2024-10-08 22:41:12', '2024-10-08 22:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `first_name`, `last_name`, `photo`, `password`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'nandhini', 'nandhinimurugan310@gmail.com', '1212', 'srixcxcxcx', 'nandhini', NULL, '$2y$10$PevLJPbGqiKdJkAFKK9.ZOT.lUpxIsIBlj6Iutf50jZEIlzRtJYeC', 'uploads/profile_photos/7MY2sKwZ2ZqhmnXMumVfv9NribaGXOxb4ZI9zktv.jpg', '2024-10-08 21:03:10', '2024-10-08 22:15:10'),
(9, 'nandhinigtgg', 'tgtgt@gmail.com', '9626384502', 'sri', 'nandhini', NULL, '$2y$10$mktnpOfIXMWfgvndzQdqX.cAjfd.qF9DnkGcOqP6t61HAQPrcPhJe', 'uploads/profile_photos/Q6ub1MoVFRtrzKz5aKnhevYHVO3STyt8trq3312N.jpg', '2024-10-08 22:30:45', '2024-10-08 22:30:45'),
(10, 'nandhiniddfdfd', 'nandhinimurugan310dfdfdf@gmail.com', '9626384502', 'sri', 'nandhini', NULL, '$2y$10$lwR.0lqSWVkswvf4BV3GCOY1DjnzhwQ6Kdg76qDVGZGkUtRX0q3.2', 'uploads/profile_photos/e4ZYV1b8C4a0JqIwmpRhua8TEuKbvckjkzG73ka5.jpg', '2024-10-08 22:53:57', '2024-10-08 22:53:57'),
(11, 'davidadmin@gmail.com', 'davidadmin@gmail.com', '9626384502', 'adad', 'ad', NULL, '$2y$10$fzY4A7f8bEYuenbfxvF62.qmfKbQTxHEATuRnRaHoHmYmNC7H//86', 'uploads/profile_photos/ZurNcnuO4VHrWkoF4XQsFlT9bAVgiZ197h5D68yd.jpg', '2024-10-08 22:55:24', '2024-10-08 22:55:24'),
(12, 'kavitha.dinakaran@gmail.com', 'kavitha.dinakaran@gmail.com', '9626384502', 'sri', 'chennai', NULL, '$2y$10$FCG9UpSNTGCaGADRznqABuRk3C2S3Fwl3JrTDvkiRiBx6TX2GrG9K', 'uploads/profile_photos/JDVbDR0ZTrjjwh3vcMd4DulRiMWlvEHPoBrHwhMx.png', '2024-10-08 22:57:04', '2024-10-08 22:57:04'),
(13, 'admin@gmail.com', 'admin@gmail.com', '9626384502', 'sri', 'chennai', NULL, '$2y$10$k6.QXVBtJG6LnYCsBCuIMOEaX4msTlKB2bvpJdl01fLgbR/Ek1ET.', 'uploads/profile_photos/EkxdXcoO371HW0fzuIRuVjLaXsJOg0douShrPvph.png', '2024-10-08 22:59:43', '2024-10-08 22:59:43'),
(14, 'adminfsfsfs@gmail.com', 'adminfsfsfs@gmail.com', '9626384502', 'sri', 'nandhini', NULL, '$2y$10$wQyqCpQPThbGJXseB9c2ROom2x4RZg29ftnUpo4H27zXwUcnbdUBu', 'uploads/profile_photos/iGMpb8tRQPz7PPkxHy20x4OwvpO5lOHw7eh0XTBD.jpg', '2024-10-08 23:01:54', '2024-10-08 23:01:54'),
(15, 'adminaasa@gmail.com', 'nandhinimurugan310assasasa@gmail.com', '9626384502', 'sri', 'nandhini', NULL, '$2y$10$RdRIFPAXqAav1pyskN/xk.uwi3K1SO8Vc/oTxCoIYfyNhHhAQDmKq', 'uploads/profile_photos/Ch4pwLP0oLWr9EaeJfSJOflowUAJL5lfVSDatvEg.jpg', '2024-10-08 23:02:55', '2024-10-08 23:02:55');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
