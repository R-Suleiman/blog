-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 09:02 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `title`, `bio`, `rank`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'jdoe@example.com', 'Chie Journalist, Mwanasport Magazines', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius vel autem sit tempore deleniti, omnis quaerat temporibus laudantium. Exercitationem neque voluptates accusamus animi itaque quod sit eos distinctio assumenda quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quae quam illum, voluptate eius nobis dolorum? Debitis laudantium quam ut porro, vel asperiores perspiciatis accusamus quisquam earum iusto eum numquam.', 1, '$2y$12$0Y9bPPsYtCsohbv651rPju3JvQwuRgwNMdoBR6IrelmNRKwL2oeJK', 'user.avif-1734900309avif', NULL, '2024-12-31 09:57:22'),
(2, 'Logan', 'May', 'logan@example.com', 'Assistant Secretary, Nipashe magazines', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius vel autem sit tempore deleniti, omnis quaerat temporibus laudantium. Exercitationem neque voluptates accusamus animi itaque quod sit eos distinctio assumenda quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quae quam illum, voluptate eius nobis dolorum? Debitis laudantium quam ut porro, vel asperiores perspiciatis accusamus quisquam earum iusto eum numquam.', 0, '$2y$12$r0DR1uqlfak4uyvBo2G5Nuz34anWPwhJHT1SQHJhPhfWKzWtNyP2q', 'user.avif-1735303211.avif', '2024-12-27 09:40:13', '2024-12-27 09:40:13');

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
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `likable_type` varchar(255) NOT NULL,
  `likable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Jonas', 'Blue', 'jonas@example.com', 'Contact Message Testing...', '2025-01-30 05:49:24', '2025-01-30 05:49:24');

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"5e4edeb4-ab48-484c-afed-01bd86e6e11b\",\"displayName\":\"App\\\\Events\\\\CommentEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":14:{s:5:\\\"event\\\";O:23:\\\"App\\\\Events\\\\CommentEvent\\\":1:{s:7:\\\"comment\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:24:\\\"App\\\\Models\\\\TopicComments\\\";s:2:\\\"id\\\";i:24;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:13:\\\"maxExceptions\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;}\"}}', 0, NULL, 1737537137, 1737537137);

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
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2024_12_20_114630_create_admins_table', 1),
(25, '2024_12_21_224406_create_post_categories_table', 1),
(26, '2024_12_21_224503_create_posts_table', 1),
(27, '2024_12_24_201856_add_featured_to_posts_table', 1),
(30, '2025_01_21_072137_create_topics_table', 2),
(31, '2025_01_21_072815_create_topic_comments_table', 2),
(32, '2025_01_27_132232_create_topic_likes_table', 3),
(33, '2025_01_28_132733_create_comment_likes_table', 4),
(34, '2025_01_30_080005_create_inquiries_table', 5),
(37, '2025_01_30_093845_create_subscribers_table', 6);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `file` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `category_id`, `topic`, `title`, `description`, `likes`, `dislikes`, `file`, `file_type`, `created_at`, `updated_at`, `featured`) VALUES
(2, 2, 11, 'AI', 'Concern over the rapid growth of AI on people\'s safety', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius vel autem sit tempore deleniti, omnis quaerat temporibus laudantium. Exercitationem neque voluptates accusamus animi itaque quod sit eos distinctio assumenda quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quae quam illum, voluptate eius nobis dolorum? Debitis laudantium quam ut porro, vel asperiores perspiciatis accusamus quisquam earum iusto eum numquam.', 0, 0, 'Capture.PNG-1735305648.PNG', 'Image', '2024-12-27 10:20:48', '2025-02-02 17:02:07', 1),
(5, 1, 11, 'machine Learning', 'The rapid emergency of a new AI model DeepSeek as a big competitor to OpenAi\'s ChatCPT', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius vel autem sit tempore deleniti, omnis quaerat temporibus laudantium. Exercitationem neque voluptates accusamus animi itaque quod sit eos distinctio assumenda quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi quae quam illum, voluptate eius nobis dolorum? Debitis laudantium quam ut porro, vel asperiores perspiciatis accusamus quisquam earum iusto eum numquam.', 0, 0, 'Tech-skills-2022-1.png-1738360421.png', 'Image', '2025-01-31 18:53:41', '2025-02-02 17:01:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(10, 'News', '2025-02-02 16:58:24', '2025-02-02 16:58:24'),
(11, 'Knowledge', '2025-02-02 17:00:42', '2025-02-02 17:00:42'),
(12, 'Sports', '2025-02-02 17:00:51', '2025-02-02 17:00:51'),
(13, 'Background', '2025-02-02 17:00:58', '2025-02-02 17:00:58');

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
('1yWXdieMyasuupMbzwlXKUFLmNcKZVJVzk2VPArY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicGEwT1hWRXZYTlhRTWVBMnlabEhyTEt4WHRNTDZjSURPWlhVNjkwWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1738526531);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `unsubscribe_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `shares` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `admin_id`, `category_id`, `title`, `description`, `likes`, `shares`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 'The Evolution of Artificial Intelligence (AI)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas cumque officiis voluptatum dolor iusto sequi debitis eligendi unde dolore nemo. Saepe sapiente nisi quibusdam quia vel ullam minima aut sit.lore\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque illum nostrum amet aliquam eligendi et. Aperiam culpa optio dolorum molestiae earum reprehenderit mollitia eum repudiandae, numquam, vero aut eveniet deleniti?\r\nConsectetur, tempore eum sed, delectus voluptatum quibusdam hic reprehenderit suscipit explicabo perferendis itaque amet ullam dignissimos necessitatibus nam ducimus aut placeat voluptates deleniti. Quod amet doloribus velit impedit inventore sapiente!\r\nMagni sed reiciendis aut tenetur, incidunt odio dolores, nulla vitae quae, eaque hic? Quaerat aperiam alias, quibusdam eligendi vel delectus, numquam qui impedit reiciendis sunt, et quo dolorum provident perferendis.\r\nCupiditate possimus ducimus ipsum quisquam autem vero, neque magni voluptatibus quos voluptatem? Dolores ipsa tempore velit maiores repellat doloremque neque odio doloribus? Itaque nisi doloribus dolore nobis laborum corrupti ab!', 1, 0, '2025-01-21 09:25:01', '2025-02-02 17:01:32'),
(2, 1, 11, 'Let\'s talk about cyber security.', 'These are my views About Cyber Security', 0, 0, '2025-01-25 18:44:54', '2025-02-02 17:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `topic_comments`
--

CREATE TABLE `topic_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `reply_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_comments`
--

INSERT INTO `topic_comments` (`id`, `topic_id`, `commentable_type`, `commentable_id`, `comment`, `likes`, `reply_to`, `created_at`, `updated_at`) VALUES
(2, 1, 'App\\Models\\Admin', 2, 'Hello', 0, NULL, '2025-01-21 06:27:38', '2025-01-28 11:25:20'),
(46, 1, 'App\\Models\\Admin', 2, 'nice review!', 0, 2, '2025-01-24 09:16:57', '2025-01-24 09:16:57'),
(47, 1, 'App\\Models\\Admin', 2, 'hi', 0, NULL, '2025-01-24 09:25:04', '2025-01-24 09:25:04'),
(51, 1, 'App\\Models\\Admin', 2, '@Logan: Nice work Logan!', 0, 47, '2025-01-24 11:16:30', '2025-01-24 11:16:30'),
(87, 1, 'App\\Models\\Admin', 1, 'new comment', 0, NULL, '2025-01-28 18:16:29', '2025-01-28 18:16:29'),
(88, 1, 'App\\Models\\Admin', 1, 'reply 1', 0, 87, '2025-01-28 18:16:39', '2025-01-28 18:16:39'),
(89, 1, 'App\\Models\\Admin', 1, 'reply 2', 0, 87, '2025-01-28 18:16:53', '2025-01-28 18:16:53'),
(90, 1, 'App\\Models\\Admin', 1, 'reply 1 1', 0, 88, '2025-01-28 18:17:06', '2025-01-28 18:17:06'),
(91, 1, 'App\\Models\\Admin', 1, 'reply 2 2', 0, 89, '2025-01-28 18:17:25', '2025-01-28 18:17:25'),
(92, 1, 'App\\Models\\Admin', 1, 'reply 2 2 2', 0, 91, '2025-01-28 18:17:37', '2025-01-28 18:17:37'),
(93, 1, 'App\\Models\\Admin', 1, 'reply 3', 0, 87, '2025-01-28 18:17:51', '2025-01-28 18:17:51'),
(94, 1, 'App\\Models\\Admin', 1, 'reply 1 1 2', 0, 88, '2025-01-28 18:21:58', '2025-01-28 18:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `topic_likes`
--

CREATE TABLE `topic_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `likable_type` varchar(255) NOT NULL,
  `likable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topic_likes`
--

INSERT INTO `topic_likes` (`id`, `topic_id`, `likable_type`, `likable_id`, `created_at`, `updated_at`) VALUES
(17, 1, 'App\\Models\\Admin', 1, '2025-01-28 05:39:06', '2025-01-28 05:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Senior', 'McAllister', 'seniorsuleiman@gmail.com', NULL, NULL, '$2y$12$q1c/effrSsuhISHs6CLieeQHdeTp8VsYGYVqHtJIlEWc5Sdc2BwOC', NULL, '2024-12-26 07:17:04', '2024-12-31 12:13:16'),
(2, 'Mira', 'Neil', 'mira@example.com', 'user.avif-1737707127.avif', NULL, '$2y$12$yRlQsPcAUibIfz0amKahX.YTQVZKhf3QV4PVkQopKkaYd0JnRtVUO', NULL, '2024-12-27 21:58:33', '2025-01-24 05:25:27'),
(3, 'Pedri', 'Gavi', 'seniorsuleiman2901@gmail.com', NULL, '2025-01-30 04:54:02', '$2y$12$8535J7CDiE5iRdeZN4Uw3.3YLTJ2t1rBnDlmxGoFH20sw7ocbfgN.', NULL, '2025-01-29 06:50:36', '2025-01-30 04:54:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_likes_likable_type_likable_id_index` (`likable_type`,`likable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_admin_id_foreign` (`admin_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `topic_comments`
--
ALTER TABLE `topic_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topic_likes`
--
ALTER TABLE `topic_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_likes_topic_id_foreign` (`topic_id`),
  ADD KEY `topic_likes_likable_type_likable_id_index` (`likable_type`,`likable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic_comments`
--
ALTER TABLE `topic_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `topic_likes`
--
ALTER TABLE `topic_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `topic_comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`);

--
-- Constraints for table `topic_comments`
--
ALTER TABLE `topic_comments`
  ADD CONSTRAINT `topic_comments_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `topic_likes`
--
ALTER TABLE `topic_likes`
  ADD CONSTRAINT `topic_likes_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
