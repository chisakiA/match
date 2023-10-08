-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-10-08 16:48:26
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `match`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `chats`
--

INSERT INTO `chats` (`id`, `from_user_id`, `to_user_id`, `message`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 'tesuto', '2023-09-30 15:20:49', '2023-09-30 15:20:49'),
(8, 2, 1, 'チャット', '2023-09-30 15:21:32', '2023-09-30 15:21:32'),
(9, 2, 1, 'test message', '2023-09-30 15:21:52', '2023-09-30 15:21:52'),
(10, 1, 2, 'konnnitiwa', '2023-09-30 15:22:35', '2023-09-30 15:22:35'),
(11, 1, 2, 'test', '2023-09-30 15:29:10', '2023-09-30 15:29:10'),
(12, 1, 2, 'こんにちわ', '2023-09-30 16:04:31', '2023-09-30 16:04:31'),
(13, 2, 1, 'よろしくお願いします', '2023-09-30 18:18:42', '2023-09-30 18:18:42'),
(15, 1, 2, '今日はいい天気ですね', '2023-10-02 14:31:51', '2023-10-02 14:31:51'),
(16, 1, 1, 'こんにちわ', '2023-10-02 19:01:18', '2023-10-02 19:01:18'),
(17, 1, 2, 'こんにちわ', '2023-10-04 16:58:09', '2023-10-04 16:58:09'),
(18, 2, 1, 'こんにちわ', '2023-10-07 04:58:27', '2023-10-07 04:58:27'),
(22, 2, 4, 'こんにちは', '2023-10-07 11:22:29', '2023-10-07 11:22:29'),
(23, 2, 4, 'テストユーザー', '2023-10-07 11:22:50', '2023-10-07 11:22:50'),
(25, 3, 4, 'こんにちは！', '2023-10-07 11:51:43', '2023-10-07 11:51:43'),
(26, 3, 4, 'よろしくお願いします🎵', '2023-10-07 11:51:54', '2023-10-07 11:51:54'),
(27, 3, 4, '今日はいい天気ですね', '2023-10-07 11:52:27', '2023-10-07 11:52:27'),
(28, 4, 3, 'よろしくお願いします！', '2023-10-07 11:53:51', '2023-10-07 11:53:51'),
(30, 4, 3, '今日は雨がふっていました', '2023-10-07 12:04:27', '2023-10-07 12:04:27');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
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
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `to_user_id`, `from_user_id`, `status`) VALUES
(91, 2, 3, 1),
(213, 2, 1, 1),
(218, 3, 1, 1),
(219, 1, 5, 1),
(220, 1, 2, 1),
(224, 4, 1, 1),
(229, 3, 4, 1),
(230, 2, 4, 1),
(231, 1, 4, 1),
(232, 4, 2, 1),
(233, 3, 2, 1),
(234, 4, 3, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_17_163429_create_posts_table', 2),
(8, '2023_09_20_143824_create_users_details_table', 3),
(14, '2023_09_23_102710_add_column_to_users_table', 4),
(15, '2023_09_23_182205_create_likes_table', 4),
(17, '2023_09_30_170626_chat_users_rooms', 5),
(18, '2023_09_30_172612_chat_messages', 6),
(19, '2023_09_30_175613_chat_users', 7),
(20, '2023_09_30_182225_chats', 8);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ks427.sen@gmail.com', '$2y$10$FwaHKg7k/COyT9jqV8Pgi.PamEUPXoj4n2XXgxzOVNbVM/i54Bhci', '2023-10-07 05:27:02');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
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
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prof` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `prof`, `gender`, `age`, `image_path`) VALUES
(1, 'ユーザー1', 'ks427.sen@gmail.com', NULL, '$2y$10$iPSibgNV5HWDjnRlPJo5E.ds/8PZo/oxXLXJ.eba7OA.aDBJX0zhi', 'jFJPwtoL4FayzogCBGP0wxmQ4yrX9DxF9GkY6qrsRvB4Ihm9jXLweDWUgUAu', '2023-09-17 07:14:19', '2023-10-07 04:38:55', 'よろしくお願いします！\r\n食べることが大好きです🎵\r\n\r\n東京に住んでいます！', '女', 23, 'public/profiles/fMhPJtR5oGPcPRbV0mF3Yx9HbzBONC9dsGDBpe5G.png'),
(2, 'ユーザー2', 'test@test.co.jp', NULL, '$2y$10$5eZR6TKMNPVH8pTiP2GfqOYxLzb2PJRwGPwQvR5dsyTpSgakCPWw6', 'StMiFdtfamyxwP9o6xr7GxrtqsEinY1faWUMnBUwTww9h7I5yk7wT4E993qB', '2023-09-18 02:50:46', '2023-10-07 05:11:48', '運動が好きです、よろしくお願いします。', '男', 20, 'public/profiles/FrzRkUPGEYL6pCixCvMaqAMDkZt8zNBwkrwvNB1J.png'),
(3, 'ユーザー3', 'test@gmail.com', NULL, '$2y$10$xVvIfsZtR70DxVDJOFPRwuRV8PwNJQv0RbjLn.2Lsl6CI8nmLHKwa', NULL, '2023-09-30 17:10:10', '2023-10-07 05:20:09', '動物を飼っています。\r\n\r\n友達たくさんほしい！', 'オンな', 23, NULL),
(4, 'テストユーザー', 'test@test.com', NULL, '$2y$10$1qNSWY6vbSDBH44LeUX4SugBwS3USnAVne6yzl6XihMvNNbL0pL7q', 'jaBB8VQmDpJ2fu7BDJ5IsQVoOOFvKM8uREimPYTpvg3ENGepClqdUiu60KtJ', '2023-10-07 04:40:29', '2023-10-07 05:39:00', 'テストユーザー\r\n\r\nよろしくお願いします。', '女', 20, 'public/profiles/HEdNpDBFoYYR7NjOWtkoWX2O6BpxvKiZBguziqPn.png'),
(6, 'testユーザーさん', 'test@t.com', NULL, '$2y$10$XGs6WvjEjp/td5IJAFWQPefHmz5x18nxH18s9LlXStfMxrhMORiba', NULL, '2023-10-07 09:36:32', '2023-10-07 09:36:32', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `users_posts`
--

CREATE TABLE `users_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_posts`
--

INSERT INTO `users_posts` (`id`, `user_id`, `name`, `body`, `created_at`, `updated_at`) VALUES
(14, 1, 'ユーザー1', 'test投稿', '2023-10-07 04:59:50', '2023-10-07 04:59:50'),
(16, 2, 'ユーザー2', '今日はいい天気なので、散歩をしました。', '2023-10-07 05:12:22', '2023-10-07 05:12:22'),
(18, 3, 'ユーザー3', '今日からはじめてみました🎵よろしくお願いします。', '2023-10-07 05:20:17', '2023-10-07 05:20:17'),
(19, 4, 'テストユーザー', 'テスト投稿、よろしくお願いします。', '2023-10-07 05:36:14', '2023-10-07 05:36:14'),
(20, 4, 'テストユーザー', 'テスト投稿２回目', '2023-10-07 05:38:37', '2023-10-07 05:38:37');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_from_user_id_foreign` (`from_user_id`),
  ADD KEY `chats_to_user_id_foreign` (`to_user_id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- テーブルのインデックス `users_posts`
--
ALTER TABLE `users_posts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `users_posts`
--
ALTER TABLE `users_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
