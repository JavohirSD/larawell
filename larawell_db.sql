-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2022 at 08:03 PM
-- Server version: 5.7.38
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larawell_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `category_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `anons`, `description`, `status`, `slug`, `language`, `image`, `author_id`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Updated blog title 001', 'Blog anons 001', 'Blog description 001', 1, 'blog-slug-001', 1, 'Base64 image 001', 1, 1659890815, 1659890815, 0),
(2, 'Updated blog title 002', 'Blog anons 002', 'Blog description 002', 1, 'blog-slug-002', 1, 'Base64 image 002', 1, 1659890820, 1659890820, 0),
(3, 'Updated blog title 003', 'Blog anons 003', 'Blog description 003', 1, 'blog-slug-003', 1, 'Base64 image 003', 1, 1659890831, 1659890831, 0),
(4, 'Updated blog title 004', 'Blog anons 004', 'Blog description 004', 1, 'blog-slug-004', 1, 'Base64 image 004', 1, 1659890839, 1659890839, 0),
(5, 'Updated blog title 005', 'Blog anons 005', 'Blog description 005', 1, 'blog-slug-005', 1, 'Base64 image 005', 1, 1659890846, 1659890846, 0),
(6, 'Updated blog title 006', 'Blog anons 006', 'Blog description 006', 1, 'blog-slug-006', 1, 'Base64 image 006', 1, 1659890859, 1659890859, 0),
(8, 'She had just begun to repeat it, but.', 'Caterpillar. Alice folded her hands, and began:-- \'You are old,\' said the Cat.', 'Alice crouched down among the party. Some of the ground, Alice soon began talking to him,\' the Mock Turtle recovered his voice, and, with tears running down his brush, and had no very clear notion.', 1, 'fuga-est-non-ut-corrupti-sunt-sit-et-reiciendis1659890942', 1, 'https://via.placeholder.com/640x480.png/005500?text=minima', 7, 1659890942, 1659890942, 0),
(9, 'Hatter began, in a helpless sort of.', 'There\'s no pleasing them!\' Alice was beginning to see the Queen. \'It proves.', 'Tell her to speak again. The rabbit-hole went straight on like a serpent. She had not got into the garden. Then she went slowly after it: \'I never said I didn\'t!\' interrupted Alice. \'You are,\' said.', 1, 'molestiae-tempora-praesentium-non-nemo1659891026', 1, 'https://via.placeholder.com/640x480.png/000066?text=nihil', 8, 1659891026, 1659891026, 0),
(10, 'There was no label this time she saw.', 'You see, she came rather late, and the beak-- Pray how did you call him.', 'The March Hare said in a long, low hall, which was immediately suppressed by the White Rabbit as he could go. Alice took up the little golden key in the direction in which case it would be like.', 1, 'harum-ut-facilis-ut-autem-id-fuga1659891026', 1, 'https://via.placeholder.com/640x480.png/0077bb?text=totam', 1, 1659891026, 1659891026, 0),
(11, 'Mock Turtle persisted. \'How COULD he.', 'For the Mouse to tell me the truth: did you ever saw. How she longed to change.', 'Hatter. \'Does YOUR watch tell you his history,\' As they walked off together, Alice heard it before,\' said the Rabbit say, \'A barrowful will do, to begin with.\' \'A barrowful will do, to begin at HIS.', 1, 'et-totam-voluptatem-molestiae-praesentium-ex1659891117', 1, 'https://via.placeholder.com/640x480.png/00ffff?text=quod', 5, 1659891117, 1659891117, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_14_125401_create_blog_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, '162efec2acde181659890730', '1fa6204a31e97b34380054745cc8a5ed6dbe4474d9533a1915ee6a40cd0285cb', '[\"*\"]', '2022-08-07 18:57:41', '2022-08-07 18:45:30', '2022-08-07 18:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `username`, `password_reset_token`, `password_hash`, `auth_key`, `status`) VALUES
(1, 'First name', 'firstname3@mail.ru', NULL, NULL, 1659890730, 1659890730, 'firstname3', NULL, '$2y$10$5Y44RaX5qSkUtOeVEYCMRO9KLoSxcivpdyLQ6nVURZm6WhtajlTCO', '12345678', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_title_unique` (`title`),
  ADD UNIQUE KEY `blog_slug_unique` (`slug`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
