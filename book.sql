-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 06:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `link`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Humayun Ahmed', 'slug2', 'This is a humayun ahmed description.', NULL, NULL),
(4, 'Kazi Nazrul Islam Poet', 'kazi-nazrul-islam', 'Our National poet BD.', '2023-06-21 06:38:19', '2023-06-21 22:05:51'),
(5, 'Mostofa Jabbar', 'mostofa-jabbar', 'test description', '2023-06-21 07:39:18', '2023-06-21 07:39:18'),
(8, 'Jafor Iqbal', 'jafor-iqbal', 'He is a great writer.', '2023-06-23 22:29:25', '2023-06-23 22:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `publish_year` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `total_view` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_search` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_borrowed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `translator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `slug`, `isbn`, `publish_year`, `description`, `image`, `is_approved`, `total_view`, `total_search`, `total_borrowed`, `user_id`, `category_id`, `publisher_id`, `translator_id`, `created_at`, `updated_at`) VALUES
(1, 'Test book', 'test book', NULL, NULL, 'test', NULL, 0, 0, 0, 0, 1, 17, 2, 1, '2023-07-08 11:07:03', '2023-07-08 11:07:03'),
(2, 'Tempore culpa ea as', 'Quasi tenetur et par', NULL, '1988', NULL, NULL, 1, 0, 0, 0, NULL, 17, 2, NULL, '2023-07-23 03:08:55', '2023-07-23 03:08:55'),
(3, 'Illum nostrum ut si', 'Perspiciatis modi a', NULL, '1987', NULL, NULL, 1, 0, 0, 0, NULL, 15, 3, NULL, '2023-07-23 03:09:20', '2023-07-23 03:09:20'),
(4, 'Totam incidunt dolo', 'Expedita omnis omnis', NULL, '2016', NULL, NULL, 1, 0, 0, 0, NULL, 17, 2, NULL, '2023-07-23 03:16:32', '2023-07-23 03:16:32'),
(5, 'Adipisicing ad natus', 'Eligendi quia atque', NULL, '2015', NULL, NULL, 1, 0, 0, 0, NULL, 17, 5, NULL, '2023-07-23 03:16:46', '2023-07-23 03:16:46'),
(6, 'Hazar Bosor dore', 'hazar-bosor-dhore', NULL, '2023', NULL, NULL, 1, 0, 0, 0, NULL, 17, 2, NULL, '2023-07-23 03:29:55', '2023-07-23 03:29:55'),
(7, 'Eiusmod voluptas nis', 'Odio quam quis in pl', NULL, '2004', NULL, NULL, 1, 0, 0, 0, NULL, 16, 5, NULL, '2023-07-23 03:59:53', '2023-07-23 03:59:53'),
(8, 'Nostrum et perferend', 'Accusantium tempore', NULL, '2009', NULL, '1690288993-jpeg', 1, 0, 0, 0, NULL, 15, 3, NULL, '2023-07-25 06:43:13', '2023-07-25 06:43:13'),
(9, 'Corporis nihil quis', 'Iure quo duis qui al', NULL, '1973', NULL, '1690289232-.jpeg', 1, 0, 0, 0, NULL, 16, 2, NULL, '2023-07-25 06:47:12', '2023-07-25 06:47:12'),
(10, 'Cupidatat temporibus', 'Sequi aut ut beatae', NULL, '1972', NULL, '1690290360-.jpeg', 1, 0, 0, 0, NULL, 17, 5, NULL, '2023-07-25 07:06:00', '2023-07-25 07:06:00'),
(11, 'Nulla eaque neque te', 'Veniam nemo sit er', NULL, '2012', NULL, '1690290416-.jpeg', 1, 0, 0, 0, NULL, 15, 5, NULL, '2023-07-25 07:06:56', '2023-07-25 07:06:56'),
(12, 'Vel cupiditate dicta', 'Eiusmod sed quas rep', NULL, '2008', NULL, '1690290587-.jpeg', 1, 0, 0, 0, NULL, 17, 5, NULL, '2023-07-25 07:09:47', '2023-07-25 07:09:47'),
(13, 'The Compound Effect', 'compound-effect', NULL, '2023', NULL, '1691212121-.jpg', 1, 0, 0, 0, NULL, 18, 2, NULL, '2023-08-04 23:08:41', '2023-08-04 23:08:41'),
(14, 'Aut odit inventore e', 'Incididunt impedit', '1234', '1972', NULL, '1691216314-.png', 1, 0, 0, 0, NULL, 15, 5, 6, '2023-08-05 00:18:34', '2023-08-05 00:18:34'),
(15, 'New Book', 'new-book', '1234234', '2023', NULL, '1691222723-.jpg', 1, 0, 0, 0, NULL, 17, 2, 2, '2023-08-05 02:05:23', '2023-08-05 02:05:23'),
(16, 'New BOOK 1', 'new book 1', '2345', '1991', '<p>This is a description.</p>', '1691236449-.jpg', 1, 0, 0, 0, 1, 18, 2, NULL, '2023-08-05 05:54:09', '2023-08-05 05:54:09'),
(17, 'New BOOK 1', 'new book 1dd', '2345', '1991', '<p>This is a description.</p>', '1691236780-.jpg', 1, 0, 0, 0, 1, 18, 2, NULL, '2023-08-05 05:59:40', '2023-08-05 05:59:40'),
(18, 'Badsah Namdar', 'badsha-namdar', '12345678', '2022', 'This is badsah namdar book.', '1691639021-.jpg', 1, 0, 0, 0, 1, 17, 2, 13, '2023-08-09 21:43:41', '2023-08-09 21:43:41'),
(19, 'Badsah Namdar12', 'badsha-namdar-12', '1234567812', '2023', 'This is badsah namdar book. 12', '1691639079-.png', 1, 0, 0, 0, 1, 15, 3, 15, '2023-08-09 21:44:39', '2023-08-09 21:44:39'),
(20, 'Cupidatat temporibus12', 'Sequi-au- ut-beatae-12', '12', '1972', '<p>12</p>', '1691909207-.png', 1, 0, 0, 0, 1, 15, 2, 19, '2023-08-13 00:46:47', '2023-08-13 00:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_authors`
--

CREATE TABLE `book_authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_authors`
--

INSERT INTO `book_authors` (`id`, `book_id`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, '2023-07-23 03:08:55', '2023-07-23 03:08:55'),
(2, 3, 5, '2023-07-23 03:09:20', '2023-07-23 03:09:20'),
(3, 4, 8, '2023-07-23 03:16:32', '2023-07-23 03:16:32'),
(4, 5, 4, '2023-07-23 03:16:46', '2023-07-23 03:16:46'),
(5, 6, 8, '2023-07-23 03:29:55', '2023-07-23 03:29:55'),
(6, 7, 2, '2023-07-23 03:59:53', '2023-07-23 03:59:53'),
(7, 8, 4, '2023-07-25 06:43:13', '2023-07-25 06:43:13'),
(8, 9, 4, '2023-07-25 06:47:12', '2023-07-25 06:47:12'),
(9, 12, 4, '2023-07-25 07:09:47', '2023-07-25 07:09:47'),
(10, 12, 5, '2023-07-25 07:09:47', '2023-07-25 07:09:47'),
(11, 12, 8, '2023-07-25 07:09:47', '2023-07-25 07:09:47'),
(12, 13, 2, '2023-08-04 23:08:41', '2023-08-04 23:08:41'),
(13, 13, 8, '2023-08-04 23:08:41', '2023-08-04 23:08:41'),
(14, 14, 2, '2023-08-05 00:18:34', '2023-08-05 00:18:34'),
(15, 14, 4, '2023-08-05 00:18:34', '2023-08-05 00:18:34'),
(16, 14, 8, '2023-08-05 00:18:34', '2023-08-05 00:18:34'),
(17, 15, 2, '2023-08-05 02:05:23', '2023-08-05 02:05:23'),
(18, 16, 2, '2023-08-05 05:54:09', '2023-08-05 05:54:09'),
(19, 16, 4, '2023-08-05 05:54:09', '2023-08-05 05:54:09'),
(20, 17, 2, '2023-08-05 05:59:40', '2023-08-05 05:59:40'),
(21, 17, 4, '2023-08-05 05:59:40', '2023-08-05 05:59:40'),
(22, 18, 2, '2023-08-09 21:43:41', '2023-08-09 21:43:41'),
(23, 19, 2, '2023-08-09 21:44:39', '2023-08-09 21:44:39'),
(24, 19, 4, '2023-08-09 21:44:39', '2023-08-09 21:44:39'),
(25, 20, 2, '2023-08-13 00:46:47', '2023-08-13 00:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_tags`
--

CREATE TABLE `book_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(15, 'Programming', 'programming', 'test', NULL, '2023-07-06 03:28:29', '2023-07-06 03:28:29'),
(17, 'Litarature', 'Litarature book', 'litarature description.', NULL, '2023-07-11 21:43:57', '2023-07-11 21:43:57'),
(18, 'History', 'bangla-history', 'History Category Details', NULL, '2023-08-04 23:05:27', '2023-08-04 23:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_06_20_083849_create_authors_table', 1),
(5, '2023_06_20_084021_create_publishers_table', 1),
(6, '2023_06_20_084111_create_sliders_table', 1),
(7, '2023_06_20_084303_create_books_table', 1),
(8, '2023_06_20_084324_create_translators_table', 1),
(9, '2023_06_20_084344_create_book_authors_table', 1),
(10, '2023_06_20_085542_create_tags_table', 1),
(11, '2023_06_20_085557_create_book_tags_table', 1),
(12, '2023_06_19_095323_create_categories_table', 2),
(14, '2014_10_12_100000_create_password_resets_table', 3),
(16, '2014_10_12_000000_create_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mamun@gmail.com', '$2y$10$Dp9.bEMXR8PXyl42Ryxq0.GB3/btZiLCJobA8iNR628n0TP4PTrSG', '2023-08-10 04:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `link`, `address`, `outlet`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Kolom Prokashani', 'https://www.youtube.com', 'Nilkhet, Dhaka', 'Mohakhali', 'test test', '2023-06-24 01:00:37', '2023-06-24 01:59:02'),
(3, 'Onno Prokashoni', 'https://www.youtube.com', 'Mohakhali Flyover', 'Mohakhaliggg', NULL, '2023-06-24 01:05:46', '2023-06-24 03:35:19'),
(5, 'B-Kolom Prokasshani11', 'https://www.youtube.com11', 'Chittagong1', 'New Market11', 'test test11', '2023-06-24 22:10:00', '2023-06-24 22:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `link_text` varchar(255) DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Lower = Higher Priority',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translators`
--

CREATE TABLE `translators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
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
  `phone_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=not verified, 1= verified, 2=banned',
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `username`, `email_verified_at`, `password`, `status`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Al-Mamun Bhuiyan', 'mamun@gmail.com', '0888888', 'Mamun', NULL, '$2y$10$xg365cFpfeo4jtDUoGyL6OYVcqN1kbHpwAiadefCGIrLFgKdZD60y', 0, NULL, NULL, '2023-08-10 04:19:39', '2023-08-10 04:19:39'),
(3, 'Mr. Mamun', 'mamunolbd1@gmail.com', '01521308512', 'Mamun12', NULL, '$2y$10$bEBQGTVspauUrCuWuCPnzeaJibmwgrOR7MxzTnlQxMAfpMJdxHsUW', 0, NULL, NULL, '2023-08-12 04:39:27', '2023-08-12 04:39:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_slug_unique` (`slug`),
  ADD KEY `books_user_id_index` (`user_id`),
  ADD KEY `books_category_id_index` (`category_id`),
  ADD KEY `books_publisher_id_index` (`publisher_id`),
  ADD KEY `books_translator_id_index` (`translator_id`);

--
-- Indexes for table `book_authors`
--
ALTER TABLE `book_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_tags`
--
ALTER TABLE `book_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translators`
--
ALTER TABLE `translators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `book_authors`
--
ALTER TABLE `book_authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `book_tags`
--
ALTER TABLE `book_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translators`
--
ALTER TABLE `translators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
