-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 04:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tohoku6`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'グルメ', NULL, NULL),
(2, 'ショッピング', NULL, NULL),
(3, '宿泊', '2022-10-06 02:17:29', '2022-10-06 02:17:29'),
(4, '体験', NULL, NULL),
(5, '自然', NULL, NULL),
(6, 'SNS映え', NULL, NULL),
(7, '歴史', NULL, NULL),
(9, '3', '2022-10-10 19:48:28', '2022-10-10 19:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `category_by_posts`
--

CREATE TABLE `category_by_posts` (
  `id` int(11) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `type_posts` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_by_posts`
--

INSERT INTO `category_by_posts` (`id`, `id_posts`, `type_posts`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 5, 'event', 1, NULL, NULL),
(2, 5, 'event', 2, NULL, NULL),
(3, 3, 'spots', 2, '2022-10-10 02:14:50', '2022-10-10 02:14:50'),
(4, 3, 'spots', 3, '2022-10-10 02:14:50', '2022-10-10 02:14:50'),
(5, 4, 'spots', 2, '2022-10-10 02:25:51', '2022-10-10 02:25:51'),
(6, 4, 'spots', 3, '2022-10-10 02:25:51', '2022-10-10 02:25:51'),
(7, 5, 'spots', 2, '2022-10-10 02:26:55', '2022-10-10 02:26:55'),
(8, 5, 'spots', 3, '2022-10-10 02:26:55', '2022-10-10 02:26:55'),
(9, 6, 'spots', 2, '2022-10-10 02:27:21', '2022-10-10 02:27:21'),
(10, 6, 'spots', 3, '2022-10-10 02:27:21', '2022-10-10 02:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `spot_id`, `user_id`, `name_user`, `content`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'Admin', 'chats qua', '2022-10-04 00:35:13', '2022-10-04 00:35:13'),
(9, 1, 1, 'Admin', 'sdasda', '2022-10-04 00:37:17', '2022-10-04 00:37:17'),
(10, 1, 1, 'Admin', 'đâs', '2022-10-04 00:39:31', '2022-10-04 00:39:31'),
(11, 1, 1, 'Admin', 'đâs', '2022-10-04 00:39:42', '2022-10-04 00:39:42'),
(12, 1, 1, 'Admin', 'ádffdas', '2022-10-04 00:48:43', '2022-10-04 00:48:43'),
(13, 1, 1, 'Admin', 'fsdfsd', '2022-10-04 00:48:48', '2022-10-04 00:48:48'),
(14, 1, 1, 'Admin', 'fsdfdsf', '2022-10-04 00:48:52', '2022-10-04 00:48:52'),
(15, 1, 27, 'Đại Hữu Nguyễn', 'asas', '2022-10-04 02:12:16', '2022-10-04 02:12:16'),
(16, 4, 47, 'dai huudasd', 'hay', '2022-10-10 03:22:28', '2022-10-10 03:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `intro` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `favorite` int(11) NOT NULL,
  `count_comment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `alias`, `location`, `time_start`, `intro`, `image_id`, `images_id`, `author`, `favorite`, `count_comment`, `created_at`, `updated_at`) VALUES
(5, '上品な音楽祭', '上品な音楽祭', 'Akita', '2022-10-10 08:02:38', '上品な音楽祭', 14, '[\"5\",\"6\",\"7\"]', 27, 1, 0, '2022-10-03 21:46:21', '2022-10-05 00:03:13'),
(6, 'ギフト共有パーティー', 'ギフト共有パーティー', 'tokio', '2022-10-10 08:02:44', '上品な音楽祭', 4, '[\"7\",\"8\",\"9\"]', 27, 3, 0, '2022-10-03 21:46:39', '2022-10-07 01:46:48'),
(7, 'Dai Huu', 'dai-huu', 'Akita', '2022-10-10 08:02:50', 'sss', 6, '[\"5\",\"6\"]', 1, 0, 0, '2022-10-06 20:25:14', '2022-10-06 20:35:18'),
(8, 'ハノイ音楽祭', 'ハノイ音楽祭', 'Fukushima', '2022-10-10 08:02:55', 'dsf', 42, '[\"41\",\"6\",\"5\"]', 1, 0, 0, '2022-10-06 20:55:39', '2022-10-06 20:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_goods`
--

CREATE TABLE `exchange_goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `furigana` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exchange_goods`
--

INSERT INTO `exchange_goods` (`id`, `name`, `furigana`, `phone`, `zip_code`, `address`, `home_address`, `created_at`, `updated_at`) VALUES
(1, 'huudaddad', 'ssss', '0563064010', '100000', 'thon 1', 'das', '2022-10-04 20:59:33', '2022-10-04 20:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `type_posts` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `posts_id`, `type_posts`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1, '27,3,4,1', '2022-09-29 08:52:53', '2022-10-04 00:34:42'),
(10, 2, 1, NULL, '2022-09-29 02:08:16', '2022-09-29 02:08:16'),
(12, 1, 2, '27', '2022-09-29 10:08:08', '2022-09-29 03:13:23'),
(13, 3, 2, '27', '2022-10-03 02:49:54', '2022-10-02 19:51:40'),
(14, 3, 1, NULL, '2022-10-03 02:27:50', '2022-10-03 02:27:50'),
(15, 4, 1, NULL, '2022-10-03 02:29:21', '2022-10-03 02:29:21'),
(16, 5, 1, NULL, '2022-10-03 02:30:48', '2022-10-03 02:30:48'),
(17, 6, 1, NULL, '2022-10-03 03:08:33', '2022-10-03 03:08:33'),
(18, 7, 1, NULL, '2022-10-03 03:14:23', '2022-10-03 03:14:23'),
(19, 8, 1, '47', '2022-10-03 03:15:28', '2022-10-05 19:41:00'),
(20, 9, 1, NULL, '2022-10-03 03:16:48', '2022-10-03 03:16:48'),
(21, 10, 1, NULL, '2022-10-03 03:20:16', '2022-10-03 03:20:16'),
(22, 11, 1, NULL, '2022-10-03 03:24:37', '2022-10-03 03:24:37'),
(23, 1, 1, NULL, '2022-10-03 18:42:53', '2022-10-03 18:42:53'),
(24, 2, 1, NULL, '2022-10-04 21:42:03', '2022-10-04 21:42:03'),
(25, 5, 2, '27', NULL, '2022-10-05 00:03:13'),
(26, 3, 1, NULL, '2022-10-05 19:24:44', '2022-10-05 19:24:44'),
(27, 4, 1, NULL, '2022-10-05 19:29:10', '2022-10-05 19:29:10'),
(28, 5, 1, NULL, '2022-10-05 19:30:14', '2022-10-05 19:30:14'),
(29, 6, 2, '1', '2022-10-05 19:31:05', '2022-10-07 01:46:48'),
(30, 7, 2, NULL, '2022-10-05 19:31:07', '2022-10-05 19:31:07'),
(32, 12, 1, NULL, NULL, NULL),
(33, 8, 2, NULL, NULL, NULL),
(34, 13, 1, NULL, '2022-10-09 20:26:58', '2022-10-09 20:26:58'),
(35, 14, 1, NULL, '2022-10-09 21:29:13', '2022-10-09 21:29:13'),
(36, 15, 1, NULL, '2022-10-10 00:53:38', '2022-10-10 00:53:38'),
(37, 1, 1, NULL, '2022-10-10 02:13:12', '2022-10-10 02:13:12'),
(38, 2, 1, NULL, '2022-10-10 02:14:17', '2022-10-10 02:14:17'),
(39, 3, 1, NULL, '2022-10-10 02:14:50', '2022-10-10 02:14:50'),
(40, 4, 1, NULL, '2022-10-10 02:25:51', '2022-10-10 02:25:51'),
(41, 5, 1, NULL, '2022-10-10 02:26:55', '2022-10-10 02:26:55'),
(42, 6, 1, NULL, '2022-10-10 02:27:21', '2022-10-10 02:27:21'),
(43, 9, 1, '1', '2022-10-10 19:48:28', '2022-10-10 19:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `id_posts`, `id_user`, `content`, `created_at`, `updated_at`) VALUES
(1, 14, 47, 'ddd', '2022-10-10 02:51:16', '2022-10-10 02:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `intro` text NOT NULL,
  `point` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `alias`, `image_id`, `images_id`, `intro`, `point`, `location`, `author`, `created_at`, `updated_at`) VALUES
(3, 'new', 'new', 6, '[\"42\"]', 'depdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '200', '', 1, '2022-10-10 09:52:38', '2022-10-10 09:52:38'),
(4, 'Dai Huu', 'dai-huu', 42, '[\"42\",\"172\"]', 'depdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '200', 'hanoi1', 1, '2022-10-10 19:42:29', '2022-10-10 19:42:29');

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
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `posts_id`, `feedback`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '投稿スポットが公開されました', 47, '2022-10-10 10:03:42', '2022-10-09 17:00:00'),
(2, 4, 'dai huudasdがあなたの投稿にコメントしました', 47, '2022-10-10 03:22:28', '2022-10-10 03:22:28'),
(3, 9, '承認された投稿', 1, '2022-10-10 19:48:28', '2022-10-10 19:48:28');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample_terms`
--

CREATE TABLE `sample_terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `image_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_count` int(10) UNSIGNED DEFAULT NULL,
  `fields` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sample_term_map`
--

CREATE TABLE `sample_term_map` (
  `id` int(10) UNSIGNED NOT NULL,
  `object_id` int(10) UNSIGNED NOT NULL,
  `term_id` int(10) UNSIGNED NOT NULL,
  `is_primary` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `intro` text NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `favorite` int(11) NOT NULL,
  `count_comment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spots`
--

INSERT INTO `spots` (`id`, `name`, `alias`, `image_id`, `images_id`, `address`, `location`, `intro`, `author`, `status`, `favorite`, `count_comment`, `created_at`, `updated_at`) VALUES
(1, 'ベジタリアンイベント', 'ベジタリアンイベント', 167, '[\"164\",\"165\",\"166\"]', 'Akita', 'Akita', 'ベジタリアンイベント', '47', 'disabled', 0, 0, '2022-10-10 02:13:12', '2022-10-10 02:13:12'),
(4, 'ádasd', 'adasd', 169, '[\"\"]', 'ádasda', 'ádasda', 'đasa', '47', 'disabled', 0, 1, '2022-10-10 02:25:51', '2022-10-10 03:22:28'),
(9, 'Khóa Học Tiếng Anh Mới Nhất', 'khoa-hoc-tieng-anh-moi-nhat', 172, NULL, 'ha noi', 'Akita', 'dsf', '1', 'active', 0, 0, '2022-10-10 19:48:28', '2022-10-10 19:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dai Huu', '2022-09-22 22:00:14', '2022-09-22 22:00:14'),
(2, 'Dai Huu', '2022-09-22 22:00:35', '2022-09-22 22:00:35'),
(3, 'Dai Huu', '2022-09-22 23:31:54', '2022-09-22 23:31:54'),
(4, 'Dai Huu', '2022-09-22 23:41:55', '2022-09-22 23:41:55'),
(5, 'daihuu03', '2022-09-22 23:43:57', '2022-09-22 23:43:57'),
(6, 'ssssss', '2022-09-22 23:47:28', '2022-09-22 23:47:28'),
(7, 'aaa', '2022-09-22 23:50:19', '2022-09-22 23:50:19'),
(8, 'aaa', '2022-09-22 23:51:08', '2022-09-22 23:51:08'),
(9, 'ss', '2022-09-22 23:53:24', '2022-09-22 23:53:24'),
(10, 'ss', '2022-09-22 23:54:07', '2022-09-22 23:54:07'),
(11, 'ss', '2022-09-22 23:54:11', '2022-09-22 23:54:11'),
(12, 'ss', '2022-09-22 23:54:21', '2022-09-22 23:54:21'),
(13, 'ss', '2022-09-22 23:54:33', '2022-09-22 23:54:33'),
(14, 'ss', '2022-09-22 23:55:16', '2022-09-22 23:55:16'),
(15, 'as', '2022-09-22 23:56:50', '2022-09-22 23:56:50'),
(16, 'as', '2022-09-22 23:57:11', '2022-09-22 23:57:11'),
(17, 'as', '2022-09-22 23:58:07', '2022-09-22 23:58:07'),
(18, 'as', '2022-09-22 23:58:20', '2022-09-22 23:58:20'),
(19, 'as', '2022-09-22 23:59:23', '2022-09-22 23:59:23'),
(20, 'dai20010301@gmail.com', '2022-09-22 23:59:55', '2022-09-22 23:59:55'),
(21, 'dai20010301@gmail.com', '2022-09-23 00:00:05', '2022-09-23 00:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `file_info` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `folder_path`, `file_name`, `extension`, `mime_type`, `file_size`, `file_info`, `created_at`, `updated_at`) VALUES
(3, 'Screenshot 2022-08-12 182711', '', 'Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO.png', 'png', 'image/png', 258088, '{\"width\":1399,\"height\":793,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":145,\"file_name\":\"Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO-thumbnail.png\"},\"small\":{\"width\":1129,\"height\":640,\"file_name\":\"Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO-small.png\"}}}', '2022-10-03 18:42:51', '2022-10-03 18:42:51'),
(4, 'Screenshot 2022-05-09 100156', '/', '15lme8pIEMHQULCpHSsWmIwuLmP6xnAuAFCdrKv5.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"15lme8pIEMHQULCpHSsWmIwuLmP6xnAuAFCdrKv5-thumbnail.png\"}}}', '2022-10-03 18:42:51', '2022-10-03 18:42:51'),
(5, 'anh1', NULL, 'QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP-small.png\"}}}', '2022-10-03 21:28:27', '2022-10-03 21:28:27'),
(6, 'anh2', NULL, '5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH-small.png\"}}}', '2022-10-03 21:28:28', '2022-10-03 21:28:28'),
(7, 'Screenshot 2022-08-12 123520', '', '5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M-small.png\"}}}', '2022-10-04 01:48:45', '2022-10-04 01:48:45'),
(9, 'anh2', '', '8ScSi6wShveQK5qA3KEQcD44ldaTl5if0O2dwruc.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"8ScSi6wShveQK5qA3KEQcD44ldaTl5if0O2dwruc-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"8ScSi6wShveQK5qA3KEQcD44ldaTl5if0O2dwruc-small.png\"}}}', '2022-10-04 21:42:00', '2022-10-04 21:42:00'),
(10, 'Screenshot 2022-08-12 182711', '', '0YK3G4r1j1Zcdej3SDrlgzo9dhhTZa5oVssItgWA.png', 'png', 'image/png', 258088, '{\"width\":1399,\"height\":793,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":145,\"file_name\":\"0YK3G4r1j1Zcdej3SDrlgzo9dhhTZa5oVssItgWA-thumbnail.png\"},\"small\":{\"width\":1129,\"height\":640,\"file_name\":\"0YK3G4r1j1Zcdej3SDrlgzo9dhhTZa5oVssItgWA-small.png\"}}}', '2022-10-04 21:42:01', '2022-10-04 21:42:01'),
(11, 'Screenshot 2022-05-09 100156', '', 'lXON50e24TtxFDF06xVsRlxMYx9zIwgCBq1P8lAD.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"lXON50e24TtxFDF06xVsRlxMYx9zIwgCBq1P8lAD-thumbnail.png\"}}}', '2022-10-04 21:42:01', '2022-10-04 21:42:01'),
(12, '62bf13c6e02706.54663818', '', 'gh0RcDu94EYN3pP7iOMTBmve8YzEyEF81MHGpcL3.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-05 00:14:37', '2022-10-05 00:14:37'),
(13, '5917 1', '', 'Q2Bw7GmHM6j0feJ4IuHgPqVD6zFzFvwK0z081n4X.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"Q2Bw7GmHM6j0feJ4IuHgPqVD6zFzFvwK0z081n4X-thumbnail.png\"}}}', '2022-10-05 19:24:31', '2022-10-05 19:24:31'),
(14, '62bf13c6e02706.54663818', '', 'lmKI9oinBRmxWLsK7vAN8WQxqOfS6GDYK43QVPPc.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-05 19:24:31', '2022-10-05 19:24:31'),
(15, '6311cd2d78de25.73278519.banner onl 1', '', 't0jAsd7PdkVLXINPvcCJhMBoaBbnny9txqkLhIUC.png', 'png', 'image/png', 764038, '{\"width\":1366,\"height\":596,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":112,\"file_name\":\"t0jAsd7PdkVLXINPvcCJhMBoaBbnny9txqkLhIUC-thumbnail.png\"}}}', '2022-10-05 19:24:32', '2022-10-05 19:24:32'),
(16, '62ad7579756253.85112626', '', 'UuSvMJJUqRKJAIC6UVJK3tncQEiKCjQFyyOi1vq0.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"UuSvMJJUqRKJAIC6UVJK3tncQEiKCjQFyyOi1vq0-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"UuSvMJJUqRKJAIC6UVJK3tncQEiKCjQFyyOi1vq0-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"UuSvMJJUqRKJAIC6UVJK3tncQEiKCjQFyyOi1vq0-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"UuSvMJJUqRKJAIC6UVJK3tncQEiKCjQFyyOi1vq0-large.jpg\"}}}', '2022-10-05 19:24:36', '2022-10-05 19:24:36'),
(17, '6317db4ce2d4f2.29158913.aerial-view-business-team 1', '', 'FL9BIVtGomblkCarKB1BKsarzN6CdjYWZcpn4Egx.png', 'png', 'image/png', 851452, '{\"width\":1366,\"height\":435,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":82,\"file_name\":\"FL9BIVtGomblkCarKB1BKsarzN6CdjYWZcpn4Egx-thumbnail.png\"}}}', '2022-10-05 19:29:06', '2022-10-05 19:29:06'),
(18, '5917 1', '', '4Ym7I0N2AQDjylbtafDW0zCqgPbW1iBd27ydVxV4.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"4Ym7I0N2AQDjylbtafDW0zCqgPbW1iBd27ydVxV4-thumbnail.png\"}}}', '2022-10-05 19:29:06', '2022-10-05 19:29:06'),
(19, '63088b9c00f048.41413655.anh1', '', 'joKhAD7gTSDuR5rpBYXhhIZwWztQuihCRrjAUBjY.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"joKhAD7gTSDuR5rpBYXhhIZwWztQuihCRrjAUBjY-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"joKhAD7gTSDuR5rpBYXhhIZwWztQuihCRrjAUBjY-small.png\"}}}', '2022-10-05 19:29:06', '2022-10-05 19:29:06'),
(20, '6311cebf8771c7.36857817.banner_user', '', 'Kq7cVfl4MepUmEsN8IOnqY5CNgTTFNDH6YzkuWX8.png', 'png', 'image/png', 356693, '{\"width\":941,\"height\":340,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":92,\"file_name\":\"Kq7cVfl4MepUmEsN8IOnqY5CNgTTFNDH6YzkuWX8-thumbnail.png\"}}}', '2022-10-05 19:29:06', '2022-10-05 19:29:06'),
(21, '63088b01f13ec9.47722173.anh2', '', 'hVPvyMkAYbTdshqFIwC4dqR3Ysjj4YHrMdz4KZdH.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"hVPvyMkAYbTdshqFIwC4dqR3Ysjj4YHrMdz4KZdH-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"hVPvyMkAYbTdshqFIwC4dqR3Ysjj4YHrMdz4KZdH-small.png\"}}}', '2022-10-05 19:34:45', '2022-10-05 19:34:45'),
(22, '6317db4ce2d4f2.29158913.aerial-view-business-team 1', '', 'MiGq5eyIWWWiMKyyv3cPxmKjgHe6ZgLrFnNo6s0H.png', 'png', 'image/png', 851452, '{\"width\":1366,\"height\":435,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":82,\"file_name\":\"MiGq5eyIWWWiMKyyv3cPxmKjgHe6ZgLrFnNo6s0H-thumbnail.png\"}}}', '2022-10-05 19:34:45', '2022-10-05 19:34:45'),
(23, '63087be169fae2.45985627.anh2', '', 'benO1cgU9IqOZaDrEaGazcGq9gi3jzIn1beZCOns.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"benO1cgU9IqOZaDrEaGazcGq9gi3jzIn1beZCOns-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"benO1cgU9IqOZaDrEaGazcGq9gi3jzIn1beZCOns-small.png\"}}}', '2022-10-05 19:34:46', '2022-10-05 19:34:46'),
(24, '63088a62a7d3f3.99856021.screenshot 2022-05-09 100156', '', 'Lr2bKywlWFBIvXu2K7dTZkzgIBAg5kDxyUcghaJZ.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"Lr2bKywlWFBIvXu2K7dTZkzgIBAg5kDxyUcghaJZ-thumbnail.png\"}}}', '2022-10-05 19:34:46', '2022-10-05 19:34:46'),
(25, '63088b01f13ec9.47722173.anh2', '', 'aTtSbzot4w511x5rmHoleSQ0Wk3DBi5Gu3YgwJyw.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"aTtSbzot4w511x5rmHoleSQ0Wk3DBi5Gu3YgwJyw-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"aTtSbzot4w511x5rmHoleSQ0Wk3DBi5Gu3YgwJyw-small.png\"}}}', '2022-10-05 19:35:57', '2022-10-05 19:35:57'),
(26, '6317db4ce2d4f2.29158913.aerial-view-business-team 1', '', 'WLQkO0i9JZAWOFXfjnV69Dd9GeInJ6aKT4wi9zfm.png', 'png', 'image/png', 851452, '{\"width\":1366,\"height\":435,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":82,\"file_name\":\"WLQkO0i9JZAWOFXfjnV69Dd9GeInJ6aKT4wi9zfm-thumbnail.png\"}}}', '2022-10-05 19:35:57', '2022-10-05 19:35:57'),
(27, '63087be169fae2.45985627.anh2', '', 'n2HlxIid8Rd1kS8EEUTk28TjxeT7VVVwnkmuEpyh.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"n2HlxIid8Rd1kS8EEUTk28TjxeT7VVVwnkmuEpyh-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"n2HlxIid8Rd1kS8EEUTk28TjxeT7VVVwnkmuEpyh-small.png\"}}}', '2022-10-05 19:35:57', '2022-10-05 19:35:57'),
(28, '63088a62a7d3f3.99856021.screenshot 2022-05-09 100156', '', 'dvFGlR9Y71LZCzI3z7ph3Ep0JDeoBDq1LI5HN9KI.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"dvFGlR9Y71LZCzI3z7ph3Ep0JDeoBDq1LI5HN9KI-thumbnail.png\"}}}', '2022-10-05 19:35:57', '2022-10-05 19:35:57'),
(29, '63088b01f13ec9.47722173.anh2', '', 'VG8CSqEIryIPlYuJZAVZCEBzP0GSAGYuJ24ZdnKJ.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"VG8CSqEIryIPlYuJZAVZCEBzP0GSAGYuJ24ZdnKJ-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"VG8CSqEIryIPlYuJZAVZCEBzP0GSAGYuJ24ZdnKJ-small.png\"}}}', '2022-10-05 19:36:54', '2022-10-05 19:36:54'),
(30, '6317db4ce2d4f2.29158913.aerial-view-business-team 1', '', '2tvwk8KzajgKzhSvOw0wYKaDjjjaLE77dkPsWULc.png', 'png', 'image/png', 851452, '{\"width\":1366,\"height\":435,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":82,\"file_name\":\"2tvwk8KzajgKzhSvOw0wYKaDjjjaLE77dkPsWULc-thumbnail.png\"}}}', '2022-10-05 19:36:54', '2022-10-05 19:36:54'),
(31, '63087be169fae2.45985627.anh2', '', 'OvN6kuk35piUa661YKzWqJzvf9F4VP9B86K0mcK7.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"OvN6kuk35piUa661YKzWqJzvf9F4VP9B86K0mcK7-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"OvN6kuk35piUa661YKzWqJzvf9F4VP9B86K0mcK7-small.png\"}}}', '2022-10-05 19:36:54', '2022-10-05 19:36:54'),
(32, '63088a62a7d3f3.99856021.screenshot 2022-05-09 100156', '', '0TRQ7pCayhoX21gzkdeESHDxTQtLgu8caSWct23M.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"0TRQ7pCayhoX21gzkdeESHDxTQtLgu8caSWct23M-thumbnail.png\"}}}', '2022-10-05 19:36:54', '2022-10-05 19:36:54'),
(33, '63088b01f13ec9.47722173.anh2', '', 'COOgdVv90FvRkn9BF3lphu2zN1uiAxJTz7kqjt3N.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"COOgdVv90FvRkn9BF3lphu2zN1uiAxJTz7kqjt3N-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"COOgdVv90FvRkn9BF3lphu2zN1uiAxJTz7kqjt3N-small.png\"}}}', '2022-10-05 19:37:03', '2022-10-05 19:37:03'),
(34, '6317db4ce2d4f2.29158913.aerial-view-business-team 1', '', 'cFhX11d296Mre6yMeMEdLiRc8Ik4Lfdhm6WuxTLO.png', 'png', 'image/png', 851452, '{\"width\":1366,\"height\":435,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":82,\"file_name\":\"cFhX11d296Mre6yMeMEdLiRc8Ik4Lfdhm6WuxTLO-thumbnail.png\"}}}', '2022-10-05 19:37:03', '2022-10-05 19:37:03'),
(35, '63087be169fae2.45985627.anh2', '', '5as2zS5VTDXJMOeIV6bVYrQItUUUuq1v3FaD5uKM.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"5as2zS5VTDXJMOeIV6bVYrQItUUUuq1v3FaD5uKM-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"5as2zS5VTDXJMOeIV6bVYrQItUUUuq1v3FaD5uKM-small.png\"}}}', '2022-10-05 19:37:03', '2022-10-05 19:37:03'),
(36, '63088a62a7d3f3.99856021.screenshot 2022-05-09 100156', '', 'lRyUL4WBKe0JKgGrc7eetISODf8RPxUbMNTlHgAv.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"lRyUL4WBKe0JKgGrc7eetISODf8RPxUbMNTlHgAv-thumbnail.png\"}}}', '2022-10-05 19:37:03', '2022-10-05 19:37:03'),
(37, '6311cebf8771c7.36857817.banner_user', '', 'eN8qSSYKrTOT22IjxGhOHoYxAT8HH3ppkYG1RrkS.png', 'png', 'image/png', 356693, '{\"width\":941,\"height\":340,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":92,\"file_name\":\"eN8qSSYKrTOT22IjxGhOHoYxAT8HH3ppkYG1RrkS-thumbnail.png\"}}}', '2022-10-06 03:09:04', '2022-10-06 03:09:04'),
(38, '63087c767b1ee4.76135030.anh2', '', 'SkwqKIzH7zbo0CEGb0jY9slW7b7H2a0ubEAej093.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"SkwqKIzH7zbo0CEGb0jY9slW7b7H2a0ubEAej093-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"SkwqKIzH7zbo0CEGb0jY9slW7b7H2a0ubEAej093-small.png\"}}}', '2022-10-06 03:09:05', '2022-10-06 03:09:05'),
(39, '63087be169e6f5.75996806.anh1', '', 'AIkHe37bgwhW5RYuz1Q56wq9Q7NixhjvJiDTEgRi.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"AIkHe37bgwhW5RYuz1Q56wq9Q7NixhjvJiDTEgRi-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"AIkHe37bgwhW5RYuz1Q56wq9Q7NixhjvJiDTEgRi-small.png\"}}}', '2022-10-06 03:09:05', '2022-10-06 03:09:05'),
(40, '62bf13c6e02706.54663818', '', 'XGWamYn3ZjcfXSbVyYfxoj7HOUFh0JhIxrZ3yiom.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-06 03:09:05', '2022-10-06 03:09:05'),
(41, '63087be169e6f5.75996806.anh1', NULL, 'oZbATLnQquFDeLTGayHa7iba9nWtNmON71wnnse3.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"oZbATLnQquFDeLTGayHa7iba9nWtNmON71wnnse3-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"oZbATLnQquFDeLTGayHa7iba9nWtNmON71wnnse3-small.png\"}}}', '2022-10-06 18:37:39', '2022-10-06 18:37:39'),
(42, '6317daba5502b1.23939962.5917 1', NULL, 'oZ7nEahkIS8lJKw1xOkPzZrVbe4MyS0maU8qxlh0.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"oZ7nEahkIS8lJKw1xOkPzZrVbe4MyS0maU8qxlh0-thumbnail.png\"}}}', '2022-10-06 20:42:25', '2022-10-06 20:42:25'),
(43, '62bf13c6e02706.54663818', '', 'sU896WCbxe50A3Kv2bZoIUbDK6F5oa7LtkRRUfWt.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:11:50', '2022-10-09 20:11:50'),
(44, '62bf13c6e02706.54663818', '', 'SJiF3V4T8IIEATkt1T6nS9zmipMwTNFh2lDKIMLv.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:14:23', '2022-10-09 20:14:23'),
(45, '62ad7579756253.85112626', '', 'tNQF0sBGxyrw3Q90d0em5FfC1VpFGQidjmy1miuN.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"tNQF0sBGxyrw3Q90d0em5FfC1VpFGQidjmy1miuN-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"tNQF0sBGxyrw3Q90d0em5FfC1VpFGQidjmy1miuN-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"tNQF0sBGxyrw3Q90d0em5FfC1VpFGQidjmy1miuN-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"tNQF0sBGxyrw3Q90d0em5FfC1VpFGQidjmy1miuN-large.jpg\"}}}', '2022-10-09 20:14:28', '2022-10-09 20:14:28'),
(46, '62ad7452629087.97014797', '', 'OTSYJTfv5kTweegxAKNSBEdLust3RIbKKGPtgQdq.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"OTSYJTfv5kTweegxAKNSBEdLust3RIbKKGPtgQdq-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"OTSYJTfv5kTweegxAKNSBEdLust3RIbKKGPtgQdq-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"OTSYJTfv5kTweegxAKNSBEdLust3RIbKKGPtgQdq-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"OTSYJTfv5kTweegxAKNSBEdLust3RIbKKGPtgQdq-large.jpg\"}}}', '2022-10-09 20:14:33', '2022-10-09 20:14:33'),
(47, '62ad7452629087.97014797', '', 'gQN6sjS0s1D3opJ7OlK08oe4zFHG4EF92BRgV5eS.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"gQN6sjS0s1D3opJ7OlK08oe4zFHG4EF92BRgV5eS-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"gQN6sjS0s1D3opJ7OlK08oe4zFHG4EF92BRgV5eS-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"gQN6sjS0s1D3opJ7OlK08oe4zFHG4EF92BRgV5eS-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"gQN6sjS0s1D3opJ7OlK08oe4zFHG4EF92BRgV5eS-large.jpg\"}}}', '2022-10-09 20:14:38', '2022-10-09 20:14:38'),
(48, '62bf13c6e02706.54663818', '', '5JI8WL3227AxjM4VsROT4kv8cqFgufbmyihbuHSd.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:15:03', '2022-10-09 20:15:03'),
(49, '62ad7579756253.85112626', '', 'SnTXhAqh1bS5sTPrBuhzzswiZrvU6GA6xWh3Od4B.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"SnTXhAqh1bS5sTPrBuhzzswiZrvU6GA6xWh3Od4B-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"SnTXhAqh1bS5sTPrBuhzzswiZrvU6GA6xWh3Od4B-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"SnTXhAqh1bS5sTPrBuhzzswiZrvU6GA6xWh3Od4B-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"SnTXhAqh1bS5sTPrBuhzzswiZrvU6GA6xWh3Od4B-large.jpg\"}}}', '2022-10-09 20:15:08', '2022-10-09 20:15:08'),
(50, '62ad7452629087.97014797', '', 'AUFVTVyksAQSrzEw8ESf0mK8eMPiD6IP2nHjGDGm.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"AUFVTVyksAQSrzEw8ESf0mK8eMPiD6IP2nHjGDGm-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"AUFVTVyksAQSrzEw8ESf0mK8eMPiD6IP2nHjGDGm-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"AUFVTVyksAQSrzEw8ESf0mK8eMPiD6IP2nHjGDGm-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"AUFVTVyksAQSrzEw8ESf0mK8eMPiD6IP2nHjGDGm-large.jpg\"}}}', '2022-10-09 20:15:13', '2022-10-09 20:15:13'),
(51, '62ad7452629087.97014797', '', 'xOza1ug0sBFXPc0F9feXYm2KcLRiAkz4UQYCIVYO.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"xOza1ug0sBFXPc0F9feXYm2KcLRiAkz4UQYCIVYO-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"xOza1ug0sBFXPc0F9feXYm2KcLRiAkz4UQYCIVYO-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"xOza1ug0sBFXPc0F9feXYm2KcLRiAkz4UQYCIVYO-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"xOza1ug0sBFXPc0F9feXYm2KcLRiAkz4UQYCIVYO-large.jpg\"}}}', '2022-10-09 20:15:18', '2022-10-09 20:15:18'),
(52, '62bf13c6e02706.54663818', '', 'ZkCFMxX1Lma8twFkc9aZHf2Hs6DDbnfoQlP83QJj.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:15:51', '2022-10-09 20:15:51'),
(53, '62ad7579756253.85112626', '', 'McsPl5XJsrRePnWhHqVfcT0AeuzKCfDDDmaAUsIh.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"McsPl5XJsrRePnWhHqVfcT0AeuzKCfDDDmaAUsIh-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"McsPl5XJsrRePnWhHqVfcT0AeuzKCfDDDmaAUsIh-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"McsPl5XJsrRePnWhHqVfcT0AeuzKCfDDDmaAUsIh-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"McsPl5XJsrRePnWhHqVfcT0AeuzKCfDDDmaAUsIh-large.jpg\"}}}', '2022-10-09 20:15:56', '2022-10-09 20:15:56'),
(54, '62ad7452629087.97014797', '', 'J98C9d6kIWNCoVU8xeZINEAjKzFNL0oNxkei5aSg.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"J98C9d6kIWNCoVU8xeZINEAjKzFNL0oNxkei5aSg-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"J98C9d6kIWNCoVU8xeZINEAjKzFNL0oNxkei5aSg-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"J98C9d6kIWNCoVU8xeZINEAjKzFNL0oNxkei5aSg-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"J98C9d6kIWNCoVU8xeZINEAjKzFNL0oNxkei5aSg-large.jpg\"}}}', '2022-10-09 20:16:01', '2022-10-09 20:16:01'),
(55, '62ad7452629087.97014797', '', '0k9Yzemr8kAMUJX5X8t85s4jvaRaBqj4ifHQvQ1M.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"0k9Yzemr8kAMUJX5X8t85s4jvaRaBqj4ifHQvQ1M-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"0k9Yzemr8kAMUJX5X8t85s4jvaRaBqj4ifHQvQ1M-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"0k9Yzemr8kAMUJX5X8t85s4jvaRaBqj4ifHQvQ1M-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"0k9Yzemr8kAMUJX5X8t85s4jvaRaBqj4ifHQvQ1M-large.jpg\"}}}', '2022-10-09 20:16:07', '2022-10-09 20:16:07'),
(56, '62bf13c6e02706.54663818', '', 'wsovLBAChqCIwlsrnbs7UHNT7nhftTRQo2KYd8cI.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:16:31', '2022-10-09 20:16:31'),
(57, '62ad7579756253.85112626', '', '9sRuzRq191YK5B4Pc9Ceuu1ENxioGh7ANqKtyLEx.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"9sRuzRq191YK5B4Pc9Ceuu1ENxioGh7ANqKtyLEx-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"9sRuzRq191YK5B4Pc9Ceuu1ENxioGh7ANqKtyLEx-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"9sRuzRq191YK5B4Pc9Ceuu1ENxioGh7ANqKtyLEx-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"9sRuzRq191YK5B4Pc9Ceuu1ENxioGh7ANqKtyLEx-large.jpg\"}}}', '2022-10-09 20:16:36', '2022-10-09 20:16:36'),
(58, '62ad7452629087.97014797', '', 'YZ5RgJgCDunzDMqPC5TfcBtNtK7mbvdAajTzu1KD.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"YZ5RgJgCDunzDMqPC5TfcBtNtK7mbvdAajTzu1KD-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"YZ5RgJgCDunzDMqPC5TfcBtNtK7mbvdAajTzu1KD-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"YZ5RgJgCDunzDMqPC5TfcBtNtK7mbvdAajTzu1KD-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"YZ5RgJgCDunzDMqPC5TfcBtNtK7mbvdAajTzu1KD-large.jpg\"}}}', '2022-10-09 20:16:41', '2022-10-09 20:16:41'),
(59, '62ad7452629087.97014797', '', 'j37VtJxTzFh3l8H8t9QIpAYacTAZcfYtnQvTEBjS.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"j37VtJxTzFh3l8H8t9QIpAYacTAZcfYtnQvTEBjS-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"j37VtJxTzFh3l8H8t9QIpAYacTAZcfYtnQvTEBjS-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"j37VtJxTzFh3l8H8t9QIpAYacTAZcfYtnQvTEBjS-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"j37VtJxTzFh3l8H8t9QIpAYacTAZcfYtnQvTEBjS-large.jpg\"}}}', '2022-10-09 20:16:46', '2022-10-09 20:16:46'),
(60, '62bf13c6e02706.54663818', '', 'EohYOwQW7TxRukDhr6FjWsq0R7tawR2mVT4teO4r.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:17:17', '2022-10-09 20:17:17'),
(61, '62ad7579756253.85112626', '', 'YLvmKutaa7f0ynxLYDQ4DeGevZ8y3NnG5NcnkNGq.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"YLvmKutaa7f0ynxLYDQ4DeGevZ8y3NnG5NcnkNGq-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"YLvmKutaa7f0ynxLYDQ4DeGevZ8y3NnG5NcnkNGq-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"YLvmKutaa7f0ynxLYDQ4DeGevZ8y3NnG5NcnkNGq-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"YLvmKutaa7f0ynxLYDQ4DeGevZ8y3NnG5NcnkNGq-large.jpg\"}}}', '2022-10-09 20:17:22', '2022-10-09 20:17:22'),
(62, '62ad7452629087.97014797', '', 'WqCWR0NJNxOSfhTNVzZ9Z2Jaaqz73ek6plwz9j9O.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"WqCWR0NJNxOSfhTNVzZ9Z2Jaaqz73ek6plwz9j9O-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"WqCWR0NJNxOSfhTNVzZ9Z2Jaaqz73ek6plwz9j9O-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"WqCWR0NJNxOSfhTNVzZ9Z2Jaaqz73ek6plwz9j9O-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"WqCWR0NJNxOSfhTNVzZ9Z2Jaaqz73ek6plwz9j9O-large.jpg\"}}}', '2022-10-09 20:17:27', '2022-10-09 20:17:27'),
(63, '62ad7452629087.97014797', '', 'Cz1F3NdRv2QH2arZN6ytm0feVMwntMcbnAUwJTVR.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"Cz1F3NdRv2QH2arZN6ytm0feVMwntMcbnAUwJTVR-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"Cz1F3NdRv2QH2arZN6ytm0feVMwntMcbnAUwJTVR-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"Cz1F3NdRv2QH2arZN6ytm0feVMwntMcbnAUwJTVR-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"Cz1F3NdRv2QH2arZN6ytm0feVMwntMcbnAUwJTVR-large.jpg\"}}}', '2022-10-09 20:17:32', '2022-10-09 20:17:32'),
(64, '62bf13c6e02706.54663818', '', 'BW5Iydrp9FlWEqyK6hY7pFedNp2n18slWeX5gv8M.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:19:40', '2022-10-09 20:19:40'),
(65, '62ad7579756253.85112626', '', 'vAna9ZWxnwuuzqpgCvOqIx1k7USh7wM8s8KQzbCH.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"vAna9ZWxnwuuzqpgCvOqIx1k7USh7wM8s8KQzbCH-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"vAna9ZWxnwuuzqpgCvOqIx1k7USh7wM8s8KQzbCH-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"vAna9ZWxnwuuzqpgCvOqIx1k7USh7wM8s8KQzbCH-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"vAna9ZWxnwuuzqpgCvOqIx1k7USh7wM8s8KQzbCH-large.jpg\"}}}', '2022-10-09 20:19:45', '2022-10-09 20:19:45'),
(66, '62ad7452629087.97014797', '', 'x0UKRrfAIBZKvOUQEkk8iVolMWfm12boLBg9SV69.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"x0UKRrfAIBZKvOUQEkk8iVolMWfm12boLBg9SV69-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"x0UKRrfAIBZKvOUQEkk8iVolMWfm12boLBg9SV69-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"x0UKRrfAIBZKvOUQEkk8iVolMWfm12boLBg9SV69-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"x0UKRrfAIBZKvOUQEkk8iVolMWfm12boLBg9SV69-large.jpg\"}}}', '2022-10-09 20:19:49', '2022-10-09 20:19:49'),
(67, '62ad7452629087.97014797', '', 'BFnTE8mgWC8d3MMsSWTaRd7yePeRFYWrJZ2qM7Xa.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"BFnTE8mgWC8d3MMsSWTaRd7yePeRFYWrJZ2qM7Xa-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"BFnTE8mgWC8d3MMsSWTaRd7yePeRFYWrJZ2qM7Xa-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"BFnTE8mgWC8d3MMsSWTaRd7yePeRFYWrJZ2qM7Xa-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"BFnTE8mgWC8d3MMsSWTaRd7yePeRFYWrJZ2qM7Xa-large.jpg\"}}}', '2022-10-09 20:19:54', '2022-10-09 20:19:54'),
(68, '62bf13c6e02706.54663818', '', '8TE1ylcf63lZh0OcTLWt6sjMsaiE2g61aBqJbUO6.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:21:00', '2022-10-09 20:21:00'),
(69, '62ad7579756253.85112626', '', 'LWVPiICHspRmqbSuWBfqgdj0sjHFMXTBedjmaG2p.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"LWVPiICHspRmqbSuWBfqgdj0sjHFMXTBedjmaG2p-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"LWVPiICHspRmqbSuWBfqgdj0sjHFMXTBedjmaG2p-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"LWVPiICHspRmqbSuWBfqgdj0sjHFMXTBedjmaG2p-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"LWVPiICHspRmqbSuWBfqgdj0sjHFMXTBedjmaG2p-large.jpg\"}}}', '2022-10-09 20:21:05', '2022-10-09 20:21:05'),
(70, '62ad7452629087.97014797', '', 'aXxAYYZCqfcEkec9ljQkKLLsghgOMyzbTXYxal0f.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"aXxAYYZCqfcEkec9ljQkKLLsghgOMyzbTXYxal0f-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"aXxAYYZCqfcEkec9ljQkKLLsghgOMyzbTXYxal0f-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"aXxAYYZCqfcEkec9ljQkKLLsghgOMyzbTXYxal0f-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"aXxAYYZCqfcEkec9ljQkKLLsghgOMyzbTXYxal0f-large.jpg\"}}}', '2022-10-09 20:21:09', '2022-10-09 20:21:09'),
(71, '62ad7452629087.97014797', '', 'D9gpk8TUL946922Jjk4OMLsKwFMhiL2y4NBdBqAY.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"D9gpk8TUL946922Jjk4OMLsKwFMhiL2y4NBdBqAY-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"D9gpk8TUL946922Jjk4OMLsKwFMhiL2y4NBdBqAY-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"D9gpk8TUL946922Jjk4OMLsKwFMhiL2y4NBdBqAY-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"D9gpk8TUL946922Jjk4OMLsKwFMhiL2y4NBdBqAY-large.jpg\"}}}', '2022-10-09 20:21:14', '2022-10-09 20:21:14'),
(72, '62bf13c6e02706.54663818', '', 'PrdFRFZtCdyJMtmUu4jTwAqikMbLXBhS1ZG4ouOg.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:21:56', '2022-10-09 20:21:56'),
(73, '62ad7579756253.85112626', '', 'dcU2QVbzxjTczkxyKCQQ8RaRgMZMmliAnI8UomM7.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"dcU2QVbzxjTczkxyKCQQ8RaRgMZMmliAnI8UomM7-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"dcU2QVbzxjTczkxyKCQQ8RaRgMZMmliAnI8UomM7-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"dcU2QVbzxjTczkxyKCQQ8RaRgMZMmliAnI8UomM7-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"dcU2QVbzxjTczkxyKCQQ8RaRgMZMmliAnI8UomM7-large.jpg\"}}}', '2022-10-09 20:22:01', '2022-10-09 20:22:01'),
(74, '62ad7452629087.97014797', '', 'OXtlm51pp9PbXrnaWNi2pxEIVLSAJVMkxDoYD6LM.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"OXtlm51pp9PbXrnaWNi2pxEIVLSAJVMkxDoYD6LM-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"OXtlm51pp9PbXrnaWNi2pxEIVLSAJVMkxDoYD6LM-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"OXtlm51pp9PbXrnaWNi2pxEIVLSAJVMkxDoYD6LM-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"OXtlm51pp9PbXrnaWNi2pxEIVLSAJVMkxDoYD6LM-large.jpg\"}}}', '2022-10-09 20:22:06', '2022-10-09 20:22:06'),
(75, '62ad7452629087.97014797', '', 'rYn8381O9E9BSLNyl0cnfzfGUOcboJEzXwLkK3cv.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"rYn8381O9E9BSLNyl0cnfzfGUOcboJEzXwLkK3cv-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"rYn8381O9E9BSLNyl0cnfzfGUOcboJEzXwLkK3cv-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"rYn8381O9E9BSLNyl0cnfzfGUOcboJEzXwLkK3cv-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"rYn8381O9E9BSLNyl0cnfzfGUOcboJEzXwLkK3cv-large.jpg\"}}}', '2022-10-09 20:22:11', '2022-10-09 20:22:11'),
(76, '62bf13c6e02706.54663818', '', 'Uq5gk0eTAnmtdFiQSVsBUXjlzO0ysWFvJpU8SBsF.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:22:32', '2022-10-09 20:22:32'),
(77, '62ad7579756253.85112626', '', '647innARuRuOdD6KfuO7vNng18sOcDJcsMOl9KHo.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"647innARuRuOdD6KfuO7vNng18sOcDJcsMOl9KHo-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"647innARuRuOdD6KfuO7vNng18sOcDJcsMOl9KHo-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"647innARuRuOdD6KfuO7vNng18sOcDJcsMOl9KHo-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"647innARuRuOdD6KfuO7vNng18sOcDJcsMOl9KHo-large.jpg\"}}}', '2022-10-09 20:22:38', '2022-10-09 20:22:38'),
(78, '62ad7452629087.97014797', '', 'NqYOJ1Hdo7AnMv33mwg0qo92UpRz3DdYZNB3HfNk.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"NqYOJ1Hdo7AnMv33mwg0qo92UpRz3DdYZNB3HfNk-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"NqYOJ1Hdo7AnMv33mwg0qo92UpRz3DdYZNB3HfNk-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"NqYOJ1Hdo7AnMv33mwg0qo92UpRz3DdYZNB3HfNk-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"NqYOJ1Hdo7AnMv33mwg0qo92UpRz3DdYZNB3HfNk-large.jpg\"}}}', '2022-10-09 20:22:44', '2022-10-09 20:22:44'),
(79, '62bf13c6e02706.54663818', '', 'ndtGWLMozAUzIs7xotJQHdWLzIl5t5rkonwQmYjV.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:22:46', '2022-10-09 20:22:46'),
(80, '62ad7452629087.97014797', '', '5sBGlwkNsgoZgHJ8G0HBfCnWl6cjieKj9bQbzzgN.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"5sBGlwkNsgoZgHJ8G0HBfCnWl6cjieKj9bQbzzgN-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"5sBGlwkNsgoZgHJ8G0HBfCnWl6cjieKj9bQbzzgN-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"5sBGlwkNsgoZgHJ8G0HBfCnWl6cjieKj9bQbzzgN-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"5sBGlwkNsgoZgHJ8G0HBfCnWl6cjieKj9bQbzzgN-large.jpg\"}}}', '2022-10-09 20:22:50', '2022-10-09 20:22:50'),
(81, '62ad7579756253.85112626', '', 'QrEPZScRn8ZWEqN72P3yCnBbXRImSqi92zRqZzHN.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"QrEPZScRn8ZWEqN72P3yCnBbXRImSqi92zRqZzHN-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"QrEPZScRn8ZWEqN72P3yCnBbXRImSqi92zRqZzHN-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"QrEPZScRn8ZWEqN72P3yCnBbXRImSqi92zRqZzHN-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"QrEPZScRn8ZWEqN72P3yCnBbXRImSqi92zRqZzHN-large.jpg\"}}}', '2022-10-09 20:22:53', '2022-10-09 20:22:53'),
(82, '62ad7452629087.97014797', '', 'ecLHkcXvIDfkhqI2UZb93tvAPmF4rgz5d90bbqCK.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"ecLHkcXvIDfkhqI2UZb93tvAPmF4rgz5d90bbqCK-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"ecLHkcXvIDfkhqI2UZb93tvAPmF4rgz5d90bbqCK-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"ecLHkcXvIDfkhqI2UZb93tvAPmF4rgz5d90bbqCK-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"ecLHkcXvIDfkhqI2UZb93tvAPmF4rgz5d90bbqCK-large.jpg\"}}}', '2022-10-09 20:22:58', '2022-10-09 20:22:58'),
(83, '62ad7452629087.97014797', '', 'JekFdLsLeFkF84jn2WrExbdf1TYXbAI2dL0ruIkh.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"JekFdLsLeFkF84jn2WrExbdf1TYXbAI2dL0ruIkh-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"JekFdLsLeFkF84jn2WrExbdf1TYXbAI2dL0ruIkh-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"JekFdLsLeFkF84jn2WrExbdf1TYXbAI2dL0ruIkh-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"JekFdLsLeFkF84jn2WrExbdf1TYXbAI2dL0ruIkh-large.jpg\"}}}', '2022-10-09 20:23:04', '2022-10-09 20:23:04'),
(84, '62bf13c6e02706.54663818', '', 'I3ADtPMb4HSL9CJ5K3JPxo639LLS8GsVVr0OHCQQ.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:23:19', '2022-10-09 20:23:19'),
(85, '62ad7579756253.85112626', '', 'ssAaeBAqyRfE68I5Qda8ugUpmtrPpm898dJdDLBh.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"ssAaeBAqyRfE68I5Qda8ugUpmtrPpm898dJdDLBh-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"ssAaeBAqyRfE68I5Qda8ugUpmtrPpm898dJdDLBh-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"ssAaeBAqyRfE68I5Qda8ugUpmtrPpm898dJdDLBh-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"ssAaeBAqyRfE68I5Qda8ugUpmtrPpm898dJdDLBh-large.jpg\"}}}', '2022-10-09 20:23:24', '2022-10-09 20:23:24'),
(86, '62ad7452629087.97014797', '', '3lmcy3uVQl23T0BQDhlZMRsGm2EXvcviC0gjmw5p.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"3lmcy3uVQl23T0BQDhlZMRsGm2EXvcviC0gjmw5p-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"3lmcy3uVQl23T0BQDhlZMRsGm2EXvcviC0gjmw5p-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"3lmcy3uVQl23T0BQDhlZMRsGm2EXvcviC0gjmw5p-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"3lmcy3uVQl23T0BQDhlZMRsGm2EXvcviC0gjmw5p-large.jpg\"}}}', '2022-10-09 20:23:30', '2022-10-09 20:23:30'),
(87, '62ad7452629087.97014797', '', 'XTPCW5m3jfzKr9tDeG0r3u48arle0ArXEd7QFqTc.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"XTPCW5m3jfzKr9tDeG0r3u48arle0ArXEd7QFqTc-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"XTPCW5m3jfzKr9tDeG0r3u48arle0ArXEd7QFqTc-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"XTPCW5m3jfzKr9tDeG0r3u48arle0ArXEd7QFqTc-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"XTPCW5m3jfzKr9tDeG0r3u48arle0ArXEd7QFqTc-large.jpg\"}}}', '2022-10-09 20:23:35', '2022-10-09 20:23:35'),
(88, '62bf13c6e02706.54663818', '', 'kav50bd7ouVVXM769j30ojkz3R1SYdjkWhHmtfkg.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-09 20:24:24', '2022-10-09 20:24:24'),
(89, '62ad7579756253.85112626', '', 'WYKdNTmnBLzOxF3xw0OmGWXnvAplTKwOBQYyacvH.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"WYKdNTmnBLzOxF3xw0OmGWXnvAplTKwOBQYyacvH-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"WYKdNTmnBLzOxF3xw0OmGWXnvAplTKwOBQYyacvH-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"WYKdNTmnBLzOxF3xw0OmGWXnvAplTKwOBQYyacvH-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"WYKdNTmnBLzOxF3xw0OmGWXnvAplTKwOBQYyacvH-large.jpg\"}}}', '2022-10-09 20:24:29', '2022-10-09 20:24:29'),
(90, '62ad7452629087.97014797', '', 'IjKTWXcVG6VcW3DDuTuKD3PLZLKbnUWXlynhP3wW.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"IjKTWXcVG6VcW3DDuTuKD3PLZLKbnUWXlynhP3wW-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"IjKTWXcVG6VcW3DDuTuKD3PLZLKbnUWXlynhP3wW-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"IjKTWXcVG6VcW3DDuTuKD3PLZLKbnUWXlynhP3wW-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"IjKTWXcVG6VcW3DDuTuKD3PLZLKbnUWXlynhP3wW-large.jpg\"}}}', '2022-10-09 20:24:34', '2022-10-09 20:24:34'),
(91, '62ad7452629087.97014797', '', 'eKLQyAGM5YNe1DtjzCHLZuDdSwFvaj8VL7GrzUfe.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"eKLQyAGM5YNe1DtjzCHLZuDdSwFvaj8VL7GrzUfe-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"eKLQyAGM5YNe1DtjzCHLZuDdSwFvaj8VL7GrzUfe-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"eKLQyAGM5YNe1DtjzCHLZuDdSwFvaj8VL7GrzUfe-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"eKLQyAGM5YNe1DtjzCHLZuDdSwFvaj8VL7GrzUfe-large.jpg\"}}}', '2022-10-09 20:24:39', '2022-10-09 20:24:39'),
(92, '62ad7579756253.85112626', '', 'vn2SLjnDb1gRF1XGkVX53em6V6BhwH4W8csstkUj.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"vn2SLjnDb1gRF1XGkVX53em6V6BhwH4W8csstkUj-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"vn2SLjnDb1gRF1XGkVX53em6V6BhwH4W8csstkUj-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"vn2SLjnDb1gRF1XGkVX53em6V6BhwH4W8csstkUj-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"vn2SLjnDb1gRF1XGkVX53em6V6BhwH4W8csstkUj-large.jpg\"}}}', '2022-10-09 20:25:16', '2022-10-09 20:25:16'),
(93, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'nP2eY6LUXa2k3NikebiKegMKsSfaoz3AC1lCmIK6.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"nP2eY6LUXa2k3NikebiKegMKsSfaoz3AC1lCmIK6-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"nP2eY6LUXa2k3NikebiKegMKsSfaoz3AC1lCmIK6-small.png\"}}}', '2022-10-09 20:25:17', '2022-10-09 20:25:17'),
(94, '62ad7579756253.85112626', '', 'Wov1uaKpBUV8j3cYn6dFRF0l5faUqxZ5jivNiB7C.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"Wov1uaKpBUV8j3cYn6dFRF0l5faUqxZ5jivNiB7C-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"Wov1uaKpBUV8j3cYn6dFRF0l5faUqxZ5jivNiB7C-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"Wov1uaKpBUV8j3cYn6dFRF0l5faUqxZ5jivNiB7C-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"Wov1uaKpBUV8j3cYn6dFRF0l5faUqxZ5jivNiB7C-large.jpg\"}}}', '2022-10-09 20:25:23', '2022-10-09 20:25:23'),
(95, '62ad7484590d63.53055531', '', '9E2cU0s3XP0OF5N836d788nt5yc3KDfOjxknT6nb.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"9E2cU0s3XP0OF5N836d788nt5yc3KDfOjxknT6nb-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"9E2cU0s3XP0OF5N836d788nt5yc3KDfOjxknT6nb-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"9E2cU0s3XP0OF5N836d788nt5yc3KDfOjxknT6nb-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"9E2cU0s3XP0OF5N836d788nt5yc3KDfOjxknT6nb-large.jpg\"}}}', '2022-10-09 20:25:28', '2022-10-09 20:25:28'),
(96, '62ad7579756253.85112626', '', '5f4V0tmsK28WIYVYIAYTF3UldtUnqn38ikJIlpxk.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"5f4V0tmsK28WIYVYIAYTF3UldtUnqn38ikJIlpxk-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"5f4V0tmsK28WIYVYIAYTF3UldtUnqn38ikJIlpxk-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"5f4V0tmsK28WIYVYIAYTF3UldtUnqn38ikJIlpxk-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"5f4V0tmsK28WIYVYIAYTF3UldtUnqn38ikJIlpxk-large.jpg\"}}}', '2022-10-09 20:25:50', '2022-10-09 20:25:50'),
(97, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'pUelOmckpBPotuZBCS2iaXT5sreUhMuXxFXrP1BB.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"pUelOmckpBPotuZBCS2iaXT5sreUhMuXxFXrP1BB-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"pUelOmckpBPotuZBCS2iaXT5sreUhMuXxFXrP1BB-small.png\"}}}', '2022-10-09 20:25:51', '2022-10-09 20:25:51'),
(98, '62ad7579756253.85112626', '', '2SXgvQl6xNGspqumxN6nxcQosAK4cP5V9WMbbiK3.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"2SXgvQl6xNGspqumxN6nxcQosAK4cP5V9WMbbiK3-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"2SXgvQl6xNGspqumxN6nxcQosAK4cP5V9WMbbiK3-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"2SXgvQl6xNGspqumxN6nxcQosAK4cP5V9WMbbiK3-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"2SXgvQl6xNGspqumxN6nxcQosAK4cP5V9WMbbiK3-large.jpg\"}}}', '2022-10-09 20:25:56', '2022-10-09 20:25:56'),
(99, '62ad7484590d63.53055531', '', 'TI503vxdR3PzL7Nahcsj0oaMM3xUtbI98I1X7BvM.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"TI503vxdR3PzL7Nahcsj0oaMM3xUtbI98I1X7BvM-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"TI503vxdR3PzL7Nahcsj0oaMM3xUtbI98I1X7BvM-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"TI503vxdR3PzL7Nahcsj0oaMM3xUtbI98I1X7BvM-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"TI503vxdR3PzL7Nahcsj0oaMM3xUtbI98I1X7BvM-large.jpg\"}}}', '2022-10-09 20:26:02', '2022-10-09 20:26:02'),
(100, '62ad7579756253.85112626', '', 'BfGZNtOO88RZ0jxJH8FzNZXpcfVABIVbk0CN0FKy.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"BfGZNtOO88RZ0jxJH8FzNZXpcfVABIVbk0CN0FKy-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"BfGZNtOO88RZ0jxJH8FzNZXpcfVABIVbk0CN0FKy-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"BfGZNtOO88RZ0jxJH8FzNZXpcfVABIVbk0CN0FKy-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"BfGZNtOO88RZ0jxJH8FzNZXpcfVABIVbk0CN0FKy-large.jpg\"}}}', '2022-10-09 20:26:19', '2022-10-09 20:26:19'),
(101, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'YBBMvC1V03G6aHXEcj3vv1O2JV68Y1Lt5SmweV7C.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"YBBMvC1V03G6aHXEcj3vv1O2JV68Y1Lt5SmweV7C-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"YBBMvC1V03G6aHXEcj3vv1O2JV68Y1Lt5SmweV7C-small.png\"}}}', '2022-10-09 20:26:20', '2022-10-09 20:26:20'),
(102, '62ad7579756253.85112626', '', 'KepoykYeD9g6CFTPSpV0FB8ECsYbMjf8OCJ4iFxh.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"KepoykYeD9g6CFTPSpV0FB8ECsYbMjf8OCJ4iFxh-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"KepoykYeD9g6CFTPSpV0FB8ECsYbMjf8OCJ4iFxh-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"KepoykYeD9g6CFTPSpV0FB8ECsYbMjf8OCJ4iFxh-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"KepoykYeD9g6CFTPSpV0FB8ECsYbMjf8OCJ4iFxh-large.jpg\"}}}', '2022-10-09 20:26:25', '2022-10-09 20:26:25'),
(103, '62ad7484590d63.53055531', '', 'Th5YR4aGgyX5BlLbfCnAN8qhTsUaHxJlAHyYza1q.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"Th5YR4aGgyX5BlLbfCnAN8qhTsUaHxJlAHyYza1q-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"Th5YR4aGgyX5BlLbfCnAN8qhTsUaHxJlAHyYza1q-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"Th5YR4aGgyX5BlLbfCnAN8qhTsUaHxJlAHyYza1q-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"Th5YR4aGgyX5BlLbfCnAN8qhTsUaHxJlAHyYza1q-large.jpg\"}}}', '2022-10-09 20:26:30', '2022-10-09 20:26:30'),
(104, '62ad7579756253.85112626', '', 'WrcQjMlQQWyRw53wJrhoJJNTypNLawy0MJdrcapp.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"WrcQjMlQQWyRw53wJrhoJJNTypNLawy0MJdrcapp-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"WrcQjMlQQWyRw53wJrhoJJNTypNLawy0MJdrcapp-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"WrcQjMlQQWyRw53wJrhoJJNTypNLawy0MJdrcapp-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"WrcQjMlQQWyRw53wJrhoJJNTypNLawy0MJdrcapp-large.jpg\"}}}', '2022-10-09 20:31:42', '2022-10-09 20:31:42');
INSERT INTO `uploads` (`id`, `name`, `folder_path`, `file_name`, `extension`, `mime_type`, `file_size`, `file_info`, `created_at`, `updated_at`) VALUES
(105, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'bB5Fp5thtTZmsdm9Ut2C6epIiT17qkNpIkmy2X8H.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"bB5Fp5thtTZmsdm9Ut2C6epIiT17qkNpIkmy2X8H-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"bB5Fp5thtTZmsdm9Ut2C6epIiT17qkNpIkmy2X8H-small.png\"}}}', '2022-10-09 20:31:42', '2022-10-09 20:31:42'),
(106, '62ad7579756253.85112626', '', 'rLaDC93aZuRECoSIGgqGgQM1CAyrNNEvM27j7mNa.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"rLaDC93aZuRECoSIGgqGgQM1CAyrNNEvM27j7mNa-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"rLaDC93aZuRECoSIGgqGgQM1CAyrNNEvM27j7mNa-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"rLaDC93aZuRECoSIGgqGgQM1CAyrNNEvM27j7mNa-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"rLaDC93aZuRECoSIGgqGgQM1CAyrNNEvM27j7mNa-large.jpg\"}}}', '2022-10-09 20:31:47', '2022-10-09 20:31:47'),
(107, '62ad7484590d63.53055531', '', 'h6HkT4PKO9YJcWOzNTS2SldSxMwknYTEGChyXLBj.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"h6HkT4PKO9YJcWOzNTS2SldSxMwknYTEGChyXLBj-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"h6HkT4PKO9YJcWOzNTS2SldSxMwknYTEGChyXLBj-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"h6HkT4PKO9YJcWOzNTS2SldSxMwknYTEGChyXLBj-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"h6HkT4PKO9YJcWOzNTS2SldSxMwknYTEGChyXLBj-large.jpg\"}}}', '2022-10-09 20:31:51', '2022-10-09 20:31:51'),
(108, '62ad7579756253.85112626', '', 'YE2r9ZXfe6P4tu5RS5UIHJ3RMBeq0gzaBoa9r9dl.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"YE2r9ZXfe6P4tu5RS5UIHJ3RMBeq0gzaBoa9r9dl-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"YE2r9ZXfe6P4tu5RS5UIHJ3RMBeq0gzaBoa9r9dl-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"YE2r9ZXfe6P4tu5RS5UIHJ3RMBeq0gzaBoa9r9dl-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"YE2r9ZXfe6P4tu5RS5UIHJ3RMBeq0gzaBoa9r9dl-large.jpg\"}}}', '2022-10-09 20:40:16', '2022-10-09 20:40:16'),
(109, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'iNI0AytXP6heQKv4e8dbHKayRgkrglkycSMGiQ7d.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"iNI0AytXP6heQKv4e8dbHKayRgkrglkycSMGiQ7d-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"iNI0AytXP6heQKv4e8dbHKayRgkrglkycSMGiQ7d-small.png\"}}}', '2022-10-09 20:40:17', '2022-10-09 20:40:17'),
(110, '62ad7579756253.85112626', '', 'y1vFc1CCF9ruqjDNFmqsyA4tlUCSfKx0IWP9t17R.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"y1vFc1CCF9ruqjDNFmqsyA4tlUCSfKx0IWP9t17R-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"y1vFc1CCF9ruqjDNFmqsyA4tlUCSfKx0IWP9t17R-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"y1vFc1CCF9ruqjDNFmqsyA4tlUCSfKx0IWP9t17R-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"y1vFc1CCF9ruqjDNFmqsyA4tlUCSfKx0IWP9t17R-large.jpg\"}}}', '2022-10-09 20:40:22', '2022-10-09 20:40:22'),
(111, '62ad7484590d63.53055531', '', 'jAJrEGU3PCSIhy610icJUmBK32Skf9ANWtvIJPRY.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"jAJrEGU3PCSIhy610icJUmBK32Skf9ANWtvIJPRY-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"jAJrEGU3PCSIhy610icJUmBK32Skf9ANWtvIJPRY-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"jAJrEGU3PCSIhy610icJUmBK32Skf9ANWtvIJPRY-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"jAJrEGU3PCSIhy610icJUmBK32Skf9ANWtvIJPRY-large.jpg\"}}}', '2022-10-09 20:40:28', '2022-10-09 20:40:28'),
(112, '62ad7579756253.85112626', '', 'HZMJfk0MIs0rVUhg9awHloxPSrUqRrNrxwUvjrWD.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"HZMJfk0MIs0rVUhg9awHloxPSrUqRrNrxwUvjrWD-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"HZMJfk0MIs0rVUhg9awHloxPSrUqRrNrxwUvjrWD-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"HZMJfk0MIs0rVUhg9awHloxPSrUqRrNrxwUvjrWD-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"HZMJfk0MIs0rVUhg9awHloxPSrUqRrNrxwUvjrWD-large.jpg\"}}}', '2022-10-09 20:41:38', '2022-10-09 20:41:38'),
(113, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', '8EclfwOiTj6RoV779Bz79ZjOXZFB3MJKdrj2wUG3.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"8EclfwOiTj6RoV779Bz79ZjOXZFB3MJKdrj2wUG3-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"8EclfwOiTj6RoV779Bz79ZjOXZFB3MJKdrj2wUG3-small.png\"}}}', '2022-10-09 20:41:39', '2022-10-09 20:41:39'),
(114, '62ad7579756253.85112626', '', 'x1AwXtlb2UEXZ6PA5Mkm0Kp7UJ5mKZwhX6gm78Kc.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"x1AwXtlb2UEXZ6PA5Mkm0Kp7UJ5mKZwhX6gm78Kc-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"x1AwXtlb2UEXZ6PA5Mkm0Kp7UJ5mKZwhX6gm78Kc-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"x1AwXtlb2UEXZ6PA5Mkm0Kp7UJ5mKZwhX6gm78Kc-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"x1AwXtlb2UEXZ6PA5Mkm0Kp7UJ5mKZwhX6gm78Kc-large.jpg\"}}}', '2022-10-09 20:41:44', '2022-10-09 20:41:44'),
(115, '62ad7484590d63.53055531', '', 'yM3BQl55KW6e4Vx4ns6aKQCLxlkcnW60QIrPv1Mg.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"yM3BQl55KW6e4Vx4ns6aKQCLxlkcnW60QIrPv1Mg-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"yM3BQl55KW6e4Vx4ns6aKQCLxlkcnW60QIrPv1Mg-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"yM3BQl55KW6e4Vx4ns6aKQCLxlkcnW60QIrPv1Mg-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"yM3BQl55KW6e4Vx4ns6aKQCLxlkcnW60QIrPv1Mg-large.jpg\"}}}', '2022-10-09 20:41:50', '2022-10-09 20:41:50'),
(116, '62ad7579756253.85112626', '', 'cWLiI8RRR5Vp18LoRr7XWYHZssf45rXdUzv2QhfJ.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"cWLiI8RRR5Vp18LoRr7XWYHZssf45rXdUzv2QhfJ-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"cWLiI8RRR5Vp18LoRr7XWYHZssf45rXdUzv2QhfJ-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"cWLiI8RRR5Vp18LoRr7XWYHZssf45rXdUzv2QhfJ-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"cWLiI8RRR5Vp18LoRr7XWYHZssf45rXdUzv2QhfJ-large.jpg\"}}}', '2022-10-09 20:43:22', '2022-10-09 20:43:22'),
(117, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'g1crYxUsQJ1Je0GbaGfs9xtZLMMaq2Xc8lHQJThP.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"g1crYxUsQJ1Je0GbaGfs9xtZLMMaq2Xc8lHQJThP-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"g1crYxUsQJ1Je0GbaGfs9xtZLMMaq2Xc8lHQJThP-small.png\"}}}', '2022-10-09 20:43:23', '2022-10-09 20:43:23'),
(118, '62ad7579756253.85112626', '', 'jKBCqFwZ9WAk7tGUcj723iGuoS3XcrJd7wk1MQns.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"jKBCqFwZ9WAk7tGUcj723iGuoS3XcrJd7wk1MQns-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"jKBCqFwZ9WAk7tGUcj723iGuoS3XcrJd7wk1MQns-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"jKBCqFwZ9WAk7tGUcj723iGuoS3XcrJd7wk1MQns-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"jKBCqFwZ9WAk7tGUcj723iGuoS3XcrJd7wk1MQns-large.jpg\"}}}', '2022-10-09 20:43:28', '2022-10-09 20:43:28'),
(119, '62ad7484590d63.53055531', '', '73PB3sQ0HHIsysrw42cJxtQFpPRSz9aew0c0G6pF.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"73PB3sQ0HHIsysrw42cJxtQFpPRSz9aew0c0G6pF-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"73PB3sQ0HHIsysrw42cJxtQFpPRSz9aew0c0G6pF-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"73PB3sQ0HHIsysrw42cJxtQFpPRSz9aew0c0G6pF-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"73PB3sQ0HHIsysrw42cJxtQFpPRSz9aew0c0G6pF-large.jpg\"}}}', '2022-10-09 20:43:32', '2022-10-09 20:43:32'),
(120, '62ad7579756253.85112626', '', '9rv6LkhKJJRt1OtiQzPYbkO0bpaho8zKOdNuSXWr.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"9rv6LkhKJJRt1OtiQzPYbkO0bpaho8zKOdNuSXWr-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"9rv6LkhKJJRt1OtiQzPYbkO0bpaho8zKOdNuSXWr-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"9rv6LkhKJJRt1OtiQzPYbkO0bpaho8zKOdNuSXWr-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"9rv6LkhKJJRt1OtiQzPYbkO0bpaho8zKOdNuSXWr-large.jpg\"}}}', '2022-10-09 20:44:11', '2022-10-09 20:44:11'),
(121, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'xRMvyQ37w4TeocjSZPHRwgGIcQZfPaOdy29pUqF8.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"xRMvyQ37w4TeocjSZPHRwgGIcQZfPaOdy29pUqF8-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"xRMvyQ37w4TeocjSZPHRwgGIcQZfPaOdy29pUqF8-small.png\"}}}', '2022-10-09 20:44:12', '2022-10-09 20:44:12'),
(122, '62ad7579756253.85112626', '', '18fP3lk9BlDYU2evT3DSBsXB38GwwFlH03XwoO33.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"18fP3lk9BlDYU2evT3DSBsXB38GwwFlH03XwoO33-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"18fP3lk9BlDYU2evT3DSBsXB38GwwFlH03XwoO33-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"18fP3lk9BlDYU2evT3DSBsXB38GwwFlH03XwoO33-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"18fP3lk9BlDYU2evT3DSBsXB38GwwFlH03XwoO33-large.jpg\"}}}', '2022-10-09 20:44:17', '2022-10-09 20:44:17'),
(123, '62ad7484590d63.53055531', '', 'ltheFinnJghWjkkb4HizBX1W8Cu1oxf2ecbawCqz.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"ltheFinnJghWjkkb4HizBX1W8Cu1oxf2ecbawCqz-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"ltheFinnJghWjkkb4HizBX1W8Cu1oxf2ecbawCqz-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"ltheFinnJghWjkkb4HizBX1W8Cu1oxf2ecbawCqz-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"ltheFinnJghWjkkb4HizBX1W8Cu1oxf2ecbawCqz-large.jpg\"}}}', '2022-10-09 20:44:22', '2022-10-09 20:44:22'),
(124, '62ad7579756253.85112626', '', 'VWo3znA1mdrvVuPErr4LtafOOEbf7G5zAMwmcp9B.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"VWo3znA1mdrvVuPErr4LtafOOEbf7G5zAMwmcp9B-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"VWo3znA1mdrvVuPErr4LtafOOEbf7G5zAMwmcp9B-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"VWo3znA1mdrvVuPErr4LtafOOEbf7G5zAMwmcp9B-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"VWo3znA1mdrvVuPErr4LtafOOEbf7G5zAMwmcp9B-large.jpg\"}}}', '2022-10-09 20:45:25', '2022-10-09 20:45:25'),
(125, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'EMF0DCUr0Yv9i1C7svxvmkZEJAPsTQbmP7wLgt7Y.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"EMF0DCUr0Yv9i1C7svxvmkZEJAPsTQbmP7wLgt7Y-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"EMF0DCUr0Yv9i1C7svxvmkZEJAPsTQbmP7wLgt7Y-small.png\"}}}', '2022-10-09 20:45:26', '2022-10-09 20:45:26'),
(126, '62ad7579756253.85112626', '', 'mS8XBKVXRhAjjxrTbWXd139QYeBJmVAOrGwPbxdJ.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"mS8XBKVXRhAjjxrTbWXd139QYeBJmVAOrGwPbxdJ-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"mS8XBKVXRhAjjxrTbWXd139QYeBJmVAOrGwPbxdJ-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"mS8XBKVXRhAjjxrTbWXd139QYeBJmVAOrGwPbxdJ-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"mS8XBKVXRhAjjxrTbWXd139QYeBJmVAOrGwPbxdJ-large.jpg\"}}}', '2022-10-09 20:45:31', '2022-10-09 20:45:31'),
(127, '62ad7484590d63.53055531', '', 'UA9vViYqRwbRGoJmV4NtTKWpHHeo2QMtMdq4xdJp.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"UA9vViYqRwbRGoJmV4NtTKWpHHeo2QMtMdq4xdJp-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"UA9vViYqRwbRGoJmV4NtTKWpHHeo2QMtMdq4xdJp-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"UA9vViYqRwbRGoJmV4NtTKWpHHeo2QMtMdq4xdJp-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"UA9vViYqRwbRGoJmV4NtTKWpHHeo2QMtMdq4xdJp-large.jpg\"}}}', '2022-10-09 20:45:36', '2022-10-09 20:45:36'),
(128, '62ad7579756253.85112626', '', 'f5F93xl5mmgEbYvdskYAQrek71XeHAjXnnDej906.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"f5F93xl5mmgEbYvdskYAQrek71XeHAjXnnDej906-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"f5F93xl5mmgEbYvdskYAQrek71XeHAjXnnDej906-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"f5F93xl5mmgEbYvdskYAQrek71XeHAjXnnDej906-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"f5F93xl5mmgEbYvdskYAQrek71XeHAjXnnDej906-large.jpg\"}}}', '2022-10-09 20:47:51', '2022-10-09 20:47:51'),
(129, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'OT9lpVwvw8AsNgHGMfoNSbBQvUHF3TSoDrOSHKCy.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"OT9lpVwvw8AsNgHGMfoNSbBQvUHF3TSoDrOSHKCy-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"OT9lpVwvw8AsNgHGMfoNSbBQvUHF3TSoDrOSHKCy-small.png\"}}}', '2022-10-09 20:47:52', '2022-10-09 20:47:52'),
(130, '62ad7579756253.85112626', '', '6Uwf9s3JgdHg0FZ80qECoaZ3xyM6yWmZS9OMCtMk.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"6Uwf9s3JgdHg0FZ80qECoaZ3xyM6yWmZS9OMCtMk-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"6Uwf9s3JgdHg0FZ80qECoaZ3xyM6yWmZS9OMCtMk-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"6Uwf9s3JgdHg0FZ80qECoaZ3xyM6yWmZS9OMCtMk-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"6Uwf9s3JgdHg0FZ80qECoaZ3xyM6yWmZS9OMCtMk-large.jpg\"}}}', '2022-10-09 20:48:00', '2022-10-09 20:48:00'),
(131, '62ad7484590d63.53055531', '', 'k0Z5JD3bfEWIFEIxV5jvcTcFANgaadh0bj27QAv3.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"k0Z5JD3bfEWIFEIxV5jvcTcFANgaadh0bj27QAv3-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"k0Z5JD3bfEWIFEIxV5jvcTcFANgaadh0bj27QAv3-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"k0Z5JD3bfEWIFEIxV5jvcTcFANgaadh0bj27QAv3-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"k0Z5JD3bfEWIFEIxV5jvcTcFANgaadh0bj27QAv3-large.jpg\"}}}', '2022-10-09 20:48:07', '2022-10-09 20:48:07'),
(132, '62ad7579756253.85112626', '', 'kxqmekZQU8LLOs2jMuaHmo7hVddQG7jz6eixFrhQ.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"kxqmekZQU8LLOs2jMuaHmo7hVddQG7jz6eixFrhQ-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"kxqmekZQU8LLOs2jMuaHmo7hVddQG7jz6eixFrhQ-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"kxqmekZQU8LLOs2jMuaHmo7hVddQG7jz6eixFrhQ-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"kxqmekZQU8LLOs2jMuaHmo7hVddQG7jz6eixFrhQ-large.jpg\"}}}', '2022-10-09 20:53:30', '2022-10-09 20:53:30'),
(133, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'aQTjQfBXnqO5gxpSWW6uavrLZkF2w1hkF2jVRrbH.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"aQTjQfBXnqO5gxpSWW6uavrLZkF2w1hkF2jVRrbH-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"aQTjQfBXnqO5gxpSWW6uavrLZkF2w1hkF2jVRrbH-small.png\"}}}', '2022-10-09 20:53:31', '2022-10-09 20:53:31'),
(134, '62ad7579756253.85112626', '', 'YWbuWfxIuwhMEWPb4A32gLUZDl7MDrZzrkGslAoy.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"YWbuWfxIuwhMEWPb4A32gLUZDl7MDrZzrkGslAoy-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"YWbuWfxIuwhMEWPb4A32gLUZDl7MDrZzrkGslAoy-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"YWbuWfxIuwhMEWPb4A32gLUZDl7MDrZzrkGslAoy-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"YWbuWfxIuwhMEWPb4A32gLUZDl7MDrZzrkGslAoy-large.jpg\"}}}', '2022-10-09 20:53:36', '2022-10-09 20:53:36'),
(135, '62ad7484590d63.53055531', '', 'W7x3mlrCVWIWoSE6QVhAyqfKCGsZi7FGv4U16aBt.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"W7x3mlrCVWIWoSE6QVhAyqfKCGsZi7FGv4U16aBt-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"W7x3mlrCVWIWoSE6QVhAyqfKCGsZi7FGv4U16aBt-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"W7x3mlrCVWIWoSE6QVhAyqfKCGsZi7FGv4U16aBt-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"W7x3mlrCVWIWoSE6QVhAyqfKCGsZi7FGv4U16aBt-large.jpg\"}}}', '2022-10-09 20:53:40', '2022-10-09 20:53:40'),
(136, '62ad7579756253.85112626', '', 'UJhseaXHi97yG3Gb7OoorWyylVJQnZDBQ9cLGnm2.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"UJhseaXHi97yG3Gb7OoorWyylVJQnZDBQ9cLGnm2-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"UJhseaXHi97yG3Gb7OoorWyylVJQnZDBQ9cLGnm2-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"UJhseaXHi97yG3Gb7OoorWyylVJQnZDBQ9cLGnm2-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"UJhseaXHi97yG3Gb7OoorWyylVJQnZDBQ9cLGnm2-large.jpg\"}}}', '2022-10-09 20:55:48', '2022-10-09 20:55:48'),
(137, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'Y9BqYtJX1yOr9gV1Pzz1ZkgPhexcZRhSIyKaU1Cb.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"Y9BqYtJX1yOr9gV1Pzz1ZkgPhexcZRhSIyKaU1Cb-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"Y9BqYtJX1yOr9gV1Pzz1ZkgPhexcZRhSIyKaU1Cb-small.png\"}}}', '2022-10-09 20:55:49', '2022-10-09 20:55:49'),
(138, '62ad7579756253.85112626', '', '2hUdJbpHWiDCnaf8Dmjd9mzGFFIjNQfXC2I0Fh4p.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"2hUdJbpHWiDCnaf8Dmjd9mzGFFIjNQfXC2I0Fh4p-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"2hUdJbpHWiDCnaf8Dmjd9mzGFFIjNQfXC2I0Fh4p-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"2hUdJbpHWiDCnaf8Dmjd9mzGFFIjNQfXC2I0Fh4p-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"2hUdJbpHWiDCnaf8Dmjd9mzGFFIjNQfXC2I0Fh4p-large.jpg\"}}}', '2022-10-09 20:55:54', '2022-10-09 20:55:54'),
(139, '62ad7484590d63.53055531', '', 'M89tsfDqEwcxQbCgRRKABzjEd1hER5ID2DyGigkf.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"M89tsfDqEwcxQbCgRRKABzjEd1hER5ID2DyGigkf-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"M89tsfDqEwcxQbCgRRKABzjEd1hER5ID2DyGigkf-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"M89tsfDqEwcxQbCgRRKABzjEd1hER5ID2DyGigkf-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"M89tsfDqEwcxQbCgRRKABzjEd1hER5ID2DyGigkf-large.jpg\"}}}', '2022-10-09 20:55:58', '2022-10-09 20:55:58'),
(140, '62ad7579756253.85112626', '', 'gZZQm9vVcssu1sS4y8kCjgWUX0Hb1FcI6wScj0w1.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"gZZQm9vVcssu1sS4y8kCjgWUX0Hb1FcI6wScj0w1-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"gZZQm9vVcssu1sS4y8kCjgWUX0Hb1FcI6wScj0w1-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"gZZQm9vVcssu1sS4y8kCjgWUX0Hb1FcI6wScj0w1-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"gZZQm9vVcssu1sS4y8kCjgWUX0Hb1FcI6wScj0w1-large.jpg\"}}}', '2022-10-09 20:57:16', '2022-10-09 20:57:16'),
(141, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', 'QaP2Xs7qPxOv5cXiC1AUh57ToV25rHQc8VLDhylz.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"QaP2Xs7qPxOv5cXiC1AUh57ToV25rHQc8VLDhylz-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"QaP2Xs7qPxOv5cXiC1AUh57ToV25rHQc8VLDhylz-small.png\"}}}', '2022-10-09 20:57:16', '2022-10-09 20:57:16'),
(142, '62ad7579756253.85112626', '', 'Ly9nYBvVK8NMIAxjyKtMVboq3LQyQRvSdt1Y3bub.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"Ly9nYBvVK8NMIAxjyKtMVboq3LQyQRvSdt1Y3bub-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"Ly9nYBvVK8NMIAxjyKtMVboq3LQyQRvSdt1Y3bub-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"Ly9nYBvVK8NMIAxjyKtMVboq3LQyQRvSdt1Y3bub-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"Ly9nYBvVK8NMIAxjyKtMVboq3LQyQRvSdt1Y3bub-large.jpg\"}}}', '2022-10-09 20:57:21', '2022-10-09 20:57:21'),
(143, '62ad7484590d63.53055531', '', 'DzRkPqVAD9SDYvLpKmhXhDjq8gwxelFsUDBm2rdK.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"DzRkPqVAD9SDYvLpKmhXhDjq8gwxelFsUDBm2rdK-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"DzRkPqVAD9SDYvLpKmhXhDjq8gwxelFsUDBm2rdK-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"DzRkPqVAD9SDYvLpKmhXhDjq8gwxelFsUDBm2rdK-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"DzRkPqVAD9SDYvLpKmhXhDjq8gwxelFsUDBm2rdK-large.jpg\"}}}', '2022-10-09 20:57:26', '2022-10-09 20:57:26'),
(144, '62ad7579756253.85112626', '', 'Knp5YMUohvFgbQG0FoHoWS00AIKlFEYZsQgCcMce.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"Knp5YMUohvFgbQG0FoHoWS00AIKlFEYZsQgCcMce-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"Knp5YMUohvFgbQG0FoHoWS00AIKlFEYZsQgCcMce-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"Knp5YMUohvFgbQG0FoHoWS00AIKlFEYZsQgCcMce-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"Knp5YMUohvFgbQG0FoHoWS00AIKlFEYZsQgCcMce-large.jpg\"}}}', '2022-10-09 20:59:12', '2022-10-09 20:59:12'),
(145, '6311cd2d78ae96.53395043.screenshot 2022-08-12 123520', '', '0q9SLWEO5PJlkfwDOzNW6Q0hJPnXHNsmqSG5RjlB.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"0q9SLWEO5PJlkfwDOzNW6Q0hJPnXHNsmqSG5RjlB-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"0q9SLWEO5PJlkfwDOzNW6Q0hJPnXHNsmqSG5RjlB-small.png\"}}}', '2022-10-09 20:59:13', '2022-10-09 20:59:13'),
(146, '62ad7579756253.85112626', '', 'tJA3rKmL4wawFUIqhaOdUb1fVTOCXq83YqO7MkMo.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"tJA3rKmL4wawFUIqhaOdUb1fVTOCXq83YqO7MkMo-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"tJA3rKmL4wawFUIqhaOdUb1fVTOCXq83YqO7MkMo-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"tJA3rKmL4wawFUIqhaOdUb1fVTOCXq83YqO7MkMo-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"tJA3rKmL4wawFUIqhaOdUb1fVTOCXq83YqO7MkMo-large.jpg\"}}}', '2022-10-09 20:59:18', '2022-10-09 20:59:18'),
(147, '62ad7484590d63.53055531', '', 'NUJ0eDsTdx7gMsLhjkK00prQW9QLiu3uamtoBVpX.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"NUJ0eDsTdx7gMsLhjkK00prQW9QLiu3uamtoBVpX-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"NUJ0eDsTdx7gMsLhjkK00prQW9QLiu3uamtoBVpX-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"NUJ0eDsTdx7gMsLhjkK00prQW9QLiu3uamtoBVpX-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"NUJ0eDsTdx7gMsLhjkK00prQW9QLiu3uamtoBVpX-large.jpg\"}}}', '2022-10-09 20:59:22', '2022-10-09 20:59:22'),
(152, '5917 1', '', 'rrLD3O1H97CYVgLuboVYfirSCWA7w4SQ4vip5UTa.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"rrLD3O1H97CYVgLuboVYfirSCWA7w4SQ4vip5UTa-thumbnail.png\"}}}', '2022-10-09 21:21:21', '2022-10-09 21:21:21'),
(153, '5917 1', '', 'kAIWaSXrqhvf0EXPVe4dC7QXOjE56GFXJ1LwXCjz.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"kAIWaSXrqhvf0EXPVe4dC7QXOjE56GFXJ1LwXCjz-thumbnail.png\"}}}', '2022-10-09 21:22:00', '2022-10-09 21:22:00'),
(154, '5917 1', '', 'i5l5Y5X8rowkcqBMIKHDuuqp4A8KfdsPKHkzjOFT.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"i5l5Y5X8rowkcqBMIKHDuuqp4A8KfdsPKHkzjOFT-thumbnail.png\"}}}', '2022-10-09 21:22:05', '2022-10-09 21:22:05'),
(155, '5917 1', '', 'U8AxZjK4SLvDZjjTRC0M9fzUKzBYjTpcQKDuoXEQ.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"U8AxZjK4SLvDZjjTRC0M9fzUKzBYjTpcQKDuoXEQ-thumbnail.png\"}}}', '2022-10-09 21:22:54', '2022-10-09 21:22:54'),
(156, '5917 1', '', 'cTUao5xPbpZag6sB9kpvVs53Uh0B9uFYgUZgew3f.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"cTUao5xPbpZag6sB9kpvVs53Uh0B9uFYgUZgew3f-thumbnail.png\"}}}', '2022-10-09 21:23:13', '2022-10-09 21:23:13'),
(157, '5917 1', '', 'G3Nk8rbxnPXGn0fH20Y0BsRs16P8ZVGrv3kO1uk3.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"G3Nk8rbxnPXGn0fH20Y0BsRs16P8ZVGrv3kO1uk3-thumbnail.png\"}}}', '2022-10-09 21:23:25', '2022-10-09 21:23:25'),
(158, '5917 1', '', '9KBAvfZMZ9n4jqPNUROtVgXJvdrRIrytP8spVtag.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"9KBAvfZMZ9n4jqPNUROtVgXJvdrRIrytP8spVtag-thumbnail.png\"}}}', '2022-10-09 21:24:09', '2022-10-09 21:24:09'),
(159, '5917 1', '', 'u71I1zCZMHJUGSi5KrOhBwskbw2noPaG0wJ2xBpe.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"u71I1zCZMHJUGSi5KrOhBwskbw2noPaG0wJ2xBpe-thumbnail.png\"}}}', '2022-10-09 21:24:27', '2022-10-09 21:24:27'),
(160, '5917 1', '', 'eGy8ttPTzbM4zEpIBgrIIYVHsiRrHHx987oln3rv.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"eGy8ttPTzbM4zEpIBgrIIYVHsiRrHHx987oln3rv-thumbnail.png\"}}}', '2022-10-09 21:24:39', '2022-10-09 21:24:39'),
(161, '5917 1', '', 'OMxv3T7IH7yhAa1ldVk36XYOk4NopG7ZmsIAZWl9.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"OMxv3T7IH7yhAa1ldVk36XYOk4NopG7ZmsIAZWl9-thumbnail.png\"}}}', '2022-10-09 21:25:09', '2022-10-09 21:25:09'),
(162, '62bf13c6e02706.54663818', '', 'TrPCZui94mSaZruBamVTMbQY5J4Vnd2BQagn9Six.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-10 00:42:45', '2022-10-10 00:42:45'),
(163, '62ad7579756253.85112626', '', 'dcI904dcHGI5TLzEOmpEu2rzgAYPMGJSs11E6nli.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"dcI904dcHGI5TLzEOmpEu2rzgAYPMGJSs11E6nli-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"dcI904dcHGI5TLzEOmpEu2rzgAYPMGJSs11E6nli-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"dcI904dcHGI5TLzEOmpEu2rzgAYPMGJSs11E6nli-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"dcI904dcHGI5TLzEOmpEu2rzgAYPMGJSs11E6nli-large.jpg\"}}}', '2022-10-10 00:43:45', '2022-10-10 00:43:45'),
(164, '6317da63a00240.40633515.20944161 1', '', 'Yf0NZ9Gh44w3yMj74kourEry5GpRkga4OChkEDat.png', 'png', 'image/png', 77149, '{\"width\":509,\"height\":339,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"Yf0NZ9Gh44w3yMj74kourEry5GpRkga4OChkEDat-thumbnail.png\"}}}', '2022-10-10 02:12:27', '2022-10-10 02:12:27'),
(165, '6311cebf8771c7.36857817.banner_user', '', 'rdgw3abJyM56eqmTJciq5aAzPsjx2fz0r0ME7wCu.png', 'png', 'image/png', 356693, '{\"width\":941,\"height\":340,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":92,\"file_name\":\"rdgw3abJyM56eqmTJciq5aAzPsjx2fz0r0ME7wCu-thumbnail.png\"}}}', '2022-10-10 02:12:27', '2022-10-10 02:12:27'),
(166, '5917 1', '', 'D9G5HCR05eDuqxutMOhPAiMQhbqgH2e2K7QoXt31.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"D9G5HCR05eDuqxutMOhPAiMQhbqgH2e2K7QoXt31-thumbnail.png\"}}}', '2022-10-10 02:12:28', '2022-10-10 02:12:28'),
(167, '6317daba5502b1.23939962.5917 1', '', 'DYeCqtdjkWnnQIhDG0tdnuYTTr3WNRgg5gUvTnv1.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"DYeCqtdjkWnnQIhDG0tdnuYTTr3WNRgg5gUvTnv1-thumbnail.png\"}}}', '2022-10-10 02:12:28', '2022-10-10 02:12:28'),
(168, '62ad7579756253.85112626', '', 'X02UzOcpUn19rSTahcIYsJ2khVvyoXFuN2osVfIt.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"X02UzOcpUn19rSTahcIYsJ2khVvyoXFuN2osVfIt-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"X02UzOcpUn19rSTahcIYsJ2khVvyoXFuN2osVfIt-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"X02UzOcpUn19rSTahcIYsJ2khVvyoXFuN2osVfIt-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"X02UzOcpUn19rSTahcIYsJ2khVvyoXFuN2osVfIt-large.jpg\"}}}', '2022-10-10 02:17:28', '2022-10-10 02:17:28'),
(169, '62ad7452629087.97014797', '', 'E0PvRGf0NGpUtO1UibLHtZIyoCsAtr4l84NBvlAK.jpg', 'jpg', 'image/jpeg', 2800145, '{\"width\":3840,\"height\":2160,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":144,\"file_name\":\"E0PvRGf0NGpUtO1UibLHtZIyoCsAtr4l84NBvlAK-thumbnail.jpg\"},\"small\":{\"width\":1138,\"height\":640,\"file_name\":\"E0PvRGf0NGpUtO1UibLHtZIyoCsAtr4l84NBvlAK-small.jpg\"},\"medium\":{\"width\":2276,\"height\":1280,\"file_name\":\"E0PvRGf0NGpUtO1UibLHtZIyoCsAtr4l84NBvlAK-medium.jpg\"},\"large\":{\"width\":3413,\"height\":1920,\"file_name\":\"E0PvRGf0NGpUtO1UibLHtZIyoCsAtr4l84NBvlAK-large.jpg\"}}}', '2022-10-10 02:25:35', '2022-10-10 02:25:35'),
(170, '6311cebf8771c7.36857817.banner_user', '', 'y3ipW4EJQ0SbCIYi0fMuHPBF86S39A3djbtqkaTU.png', 'png', 'image/png', 356693, '{\"width\":941,\"height\":340,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":92,\"file_name\":\"y3ipW4EJQ0SbCIYi0fMuHPBF86S39A3djbtqkaTU-thumbnail.png\"}}}', '2022-10-10 02:27:18', '2022-10-10 02:27:18'),
(171, '62bf13c6e02706.54663818', '', 'xeX94tPQf01XApB6cmzTWZVdioPlaGyZEEHOfskQ.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-10 19:14:20', '2022-10-10 19:14:20'),
(172, '20944161 1', NULL, 'TzvoepV4k22zdeglqOIUMqAwtveT2c65IUjQgeGN.png', 'png', 'image/png', 77149, '{\"width\":509,\"height\":339,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"TzvoepV4k22zdeglqOIUMqAwtveT2c65IUjQgeGN-thumbnail.png\"}}}', '2022-10-10 19:41:52', '2022-10-10 19:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_image_id` int(10) UNSIGNED DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_token` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fields` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sns_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login_name`, `name`, `avatar_image_id`, `role`, `gender`, `birth_day`, `intro`, `email`, `location`, `password`, `email_verified_at`, `email_verified_token`, `remember_token`, `fields`, `point`, `status`, `otp`, `twitter_url`, `tiktok_url`, `instagram_url`, `sns_active`, `google_id`, `facebook_id`, `twitter_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, 'admin', NULL, NULL, '', 'admin@sample.email', NULL, '$2y$10$HT3qwQXcuh6BZR88auQUt.pfNNslChaKBVFBrkOu1YsYq9Gg5q65e', NULL, NULL, NULL, '[]', NULL, 'active', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2020-12-31 17:00:00', '2022-09-18 23:58:29'),
(7, 'gfdgdg', '6666', NULL, 'admin', NULL, NULL, '', NULL, NULL, '$2y$10$yWs830Yi7fuSpgbZCc/TiOx9yUs81R7sS0fuAF7X/5AqqsbC1KD9C', NULL, NULL, NULL, '[]', NULL, 'active', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-04-19 01:44:59', '2022-09-19 02:24:03'),
(9, 'dassad', NULL, NULL, 'admin', NULL, NULL, '', 'se@gmail.com', NULL, '$2y$10$cZOWi58jI0fdZ.0x8IiYBODygn/zu3IeFG/C5i/mpUYjxRJM9aMRm', NULL, NULL, NULL, NULL, NULL, 'active', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-09-20 21:32:41', '2022-09-20 21:32:41'),
(11, 'moi', NULL, NULL, 'admin', NULL, NULL, '', 'longpro298@gmail.com', NULL, '$2y$10$m8M7E9drmqvCHQUTiPcVQOwTY6mahU/F9vGldsLjwGA8jpHxIzf.C', NULL, NULL, NULL, NULL, NULL, 'active', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-09-20 21:37:19', '2022-09-20 21:37:19'),
(13, 'sasa', NULL, NULL, 'member', NULL, NULL, '', 'sinh@gmail.com', NULL, '$2y$10$w0lOjv55Ejk8/WwvPfuqTuTbztQ2Ls7mjaSBPCenv4CRM7SToW0Oy', NULL, NULL, NULL, NULL, NULL, 'active', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-09-21 00:13:30', '2022-09-21 00:13:30'),
(14, 'ssssssssss', NULL, NULL, 'admin', NULL, NULL, '', 'aa@gmail.com', NULL, '$2y$10$s6VtXvq1IXYbxmMo685DMued8egIOhza5QcFEiMYJ4DiarSNgrRVG', NULL, NULL, NULL, NULL, NULL, 'disabled', '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-09-21 00:15:16', '2022-09-21 19:51:11'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, '', 'huudai001@gmail.com', NULL, '1111', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '0', '0', NULL, 0, '2022-09-21 21:44:00', '2022-09-21 21:44:00'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, '', 'dangm452@gmail.com', NULL, '$2y$10$85t2tSr49WzGYnU5tjabUefDArQP.vGpM.R77gjUmF8GP3DoCgTP2', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '0', NULL, NULL, 0, '2022-09-22 02:38:56', '2022-09-22 02:38:56'),
(27, NULL, 'Đại Hữu Nguyễn', 12, NULL, 3, '2022-09-21', 'hhhss', 'huudai032001@gmail.com', '川崎', '$2y$10$IUk1oNmK8Wjz82VghmVRVOjI5v.tVxAAI/OznEnoYKpcN/5f6/RSW', NULL, NULL, NULL, NULL, '3000', 'active', '', 'https://www.youtube.com/watch?v=XFJ09PqqwU8&list=RDMM&index=6', 'dasd', 'dasdasd', '[\"1\",\"2\",\"3\"]', '109829984724144315607', '3226743507581614', NULL, '2022-09-22 20:52:43', '2022-10-09 18:51:52'),
(47, NULL, 'dai huudasd', 43, 'member', 1, '2022-09-28', 'sda', 'dai20010301@gmail.com', '川崎', '$2y$10$HiYtwOy1RXEOZO5WlFcU0e3lvHqZ3y1yUE3hlAU1TF1Zn9hsCOx7K', NULL, NULL, NULL, NULL, NULL, 'active', '92155', NULL, NULL, NULL, '[\"1\"]', NULL, NULL, NULL, '2022-10-05 02:15:25', '2022-10-09 20:11:50'),
(52, NULL, 'mail tests', 171, NULL, 1, '2022-10-10', 'ấ', 'mailtests2001@gmail.com', '東京', '$2y$10$D4tgkR.ixxE4m.UUAH431OGiJUoHR0Qf.0.y6TtdnWmTpl8Kly9wy', NULL, NULL, NULL, NULL, NULL, 'active', '44836', NULL, NULL, NULL, NULL, '102272033398519678082', NULL, NULL, '2022-10-10 19:02:09', '2022-10-10 19:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `zip_code`
--

CREATE TABLE `zip_code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zip_code`
--

INSERT INTO `zip_code` (`id`, `code`, `city`, `district`, `town`, `created_at`, `updated_at`) VALUES
(1, '113-0024', '東京都', '文京区', '西片', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_by_posts`
--
ALTER TABLE `category_by_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_goods`
--
ALTER TABLE `exchange_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
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
-- Indexes for table `sample_terms`
--
ALTER TABLE `sample_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_term_map`
--
ALTER TABLE `sample_term_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_name_unique` (`login_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zip_code`
--
ALTER TABLE `zip_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_by_posts`
--
ALTER TABLE `category_by_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exchange_goods`
--
ALTER TABLE `exchange_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sample_terms`
--
ALTER TABLE `sample_terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sample_term_map`
--
ALTER TABLE `sample_term_map`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `zip_code`
--
ALTER TABLE `zip_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
