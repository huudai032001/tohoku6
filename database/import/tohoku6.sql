-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:06 PM
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
(7, '歴史', NULL, NULL);

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
(15, 1, 27, 'Đại Hữu Nguyễn', 'asas', '2022-10-04 02:12:16', '2022-10-04 02:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `intro` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `favorite` int(11) NOT NULL,
  `count_comment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `location`, `time_start`, `intro`, `image_id`, `images_id`, `author`, `category`, `favorite`, `count_comment`, `created_at`, `updated_at`) VALUES
(5, '上品な音楽祭', 'Akita', '2022-10-07 07:53:01', '上品な音楽祭', 1, '[\"1\",\"2\",\"3\"]', 27, '1', 1, 0, '2022-10-03 21:46:21', '2022-10-05 00:03:13'),
(6, 'ギフト共有パーティー', 'tokio', '2022-10-08 08:46:48', '上品な音楽祭', 1, '[\"1\",\"2\",\"3\"]', 27, '1', 3, 0, '2022-10-03 21:46:39', '2022-10-07 01:46:48'),
(7, 'Dai Huu', 'Akita', '2022-10-06 18:20:00', 'sss', 6, '[\"5\",\"6\"]', 1, '2,3', 0, 0, '2022-10-06 20:25:14', '2022-10-06 20:35:18'),
(8, 'ハノイ音楽祭', 'Fukushima', '2022-10-06 17:00:00', 'dsf', 42, '[\"41\",\"6\",\"5\"]', 1, '1,3', 0, 0, '2022-10-06 20:55:39', '2022-10-06 20:55:39');

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
(33, 8, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
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

INSERT INTO `goods` (`id`, `name`, `image_id`, `images_id`, `intro`, `point`, `location`, `author`, `created_at`, `updated_at`) VALUES
(2, 'Dai Huu', 1, NULL, 'sss', '222', '', 27, '2022-10-04 09:20:28', '2022-10-04 09:20:28'),
(3, 'new', 6, '[\"42\"]', 'depdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '200', '', 1, '2022-10-06 20:42:53', '2022-10-06 20:42:53');

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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `posts_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 47, '2022-10-06 00:21:25', '2022-10-06 00:21:25'),
(2, 10, 1, '2022-10-06 01:48:59', '2022-10-06 01:48:59'),
(3, 11, 1, '2022-10-06 18:37:58', '2022-10-06 18:37:58'),
(4, 12, 1, '2022-10-06 18:50:15', '2022-10-06 18:50:15');

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
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
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

INSERT INTO `spots` (`id`, `name`, `image_id`, `images_id`, `address`, `location`, `category`, `intro`, `author`, `status`, `favorite`, `count_comment`, `created_at`, `updated_at`) VALUES
(1, 'ハノイでのコンサート', 4, '[\"1\",\"2\",\"3\"]', '2,3,7', 'Akita', '1,2', 'とてもかっこいい', '27', 'active', 1, 7, '2022-10-03 18:42:53', '2022-10-06 00:09:16'),
(2, '音楽祭ネタ', 11, '[\"8\",\"9\",\"10\"]', 'kawa', 'kawa', '1,2', '音楽祭ネタ', '27', 'disabled', 0, 0, '2022-10-04 21:42:03', '2022-10-04 21:42:03'),
(3, '魔法のサーカス行為', 20, '[\"13\",\"14\",\"15\"]', 'kina', 'kina', '2', '魔法のサーカス行為', '47', 'active', 0, 0, '2022-10-05 19:24:44', '2022-10-05 19:24:44'),
(4, 'サーカスアクト hana,m', 20, '[\"17\",\"18\",\"19\"]', 'tokyo', 'tokyo', '1,2', 'サーカスアクト hana,m', '47', 'disabled', 0, 0, '2022-10-05 19:29:10', '2022-10-05 19:29:10'),
(5, 'サーカスアクト hana,m', 20, '[\"17\",\"18\",\"19\"]', '3,4', 'tokyo', '1,2', 'サーカスアクト hana,m', '47', 'active', 0, 0, '2022-10-05 19:30:14', '2022-10-06 00:21:25'),
(6, 'サーカスアクト hana,m', 20, '[\"17\",\"18\",\"19\"]', 'tokyo', 'tokyo', '1,2', 'サーカスアクト hana,m', '47', 'disabled', 0, 0, '2022-10-05 19:31:05', '2022-10-05 19:31:05'),
(7, 'サーカスアクト hana,m', 20, '[\"17\",\"18\",\"19\"]', 'tokyo', 'tokyo', '1,2', 'サーカスアクト hana,m', '47', 'active', 0, 0, '2022-10-05 19:31:07', '2022-10-05 19:31:07'),
(8, 'カントリーミュージック', 36, '[\"33\",\"34\",\"35\"]', '2,3', 'kawa', '1,2', 'カントリーミュージック', '47', 'active', 1, 0, '2022-10-05 19:37:16', '2022-10-06 03:01:26'),
(11, 'Dai Huu', 41, '[\"41\",\"6\",\"5\"]', 'ha noi', 'hanoi', '2', 'depdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1', 'active', 0, 0, '2022-10-06 18:37:58', '2022-10-06 18:37:58'),
(12, 'fsd', 41, '[\"41\"]', 'fsd', 'fsd', '2,3', 'sdf', '1', 'active', 0, 0, '2022-10-06 18:50:15', '2022-10-06 18:50:15');

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
(1, 'Screenshot 2022-08-12 123520', '', 'zzipDnIZLcNkCOEUR6wj94AYPsJXrT5A5bh8NZxi.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"zzipDnIZLcNkCOEUR6wj94AYPsJXrT5A5bh8NZxi-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"zzipDnIZLcNkCOEUR6wj94AYPsJXrT5A5bh8NZxi-small.png\"}}}', '2022-10-03 18:42:50', '2022-10-03 18:42:50'),
(2, 'anh2', '', 'ToQHuUsXLZyDL1Bbe3WhPZsp48chH1SNXxq3fJTI.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"ToQHuUsXLZyDL1Bbe3WhPZsp48chH1SNXxq3fJTI-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"ToQHuUsXLZyDL1Bbe3WhPZsp48chH1SNXxq3fJTI-small.png\"}}}', '2022-10-03 18:42:50', '2022-10-03 18:42:50'),
(3, 'Screenshot 2022-08-12 182711', '', 'Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO.png', 'png', 'image/png', 258088, '{\"width\":1399,\"height\":793,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":145,\"file_name\":\"Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO-thumbnail.png\"},\"small\":{\"width\":1129,\"height\":640,\"file_name\":\"Th7qdSoVlTY2fiqYu7HJT6FI5baNCwRfTTAGzlaO-small.png\"}}}', '2022-10-03 18:42:51', '2022-10-03 18:42:51'),
(4, 'Screenshot 2022-05-09 100156', '/', '15lme8pIEMHQULCpHSsWmIwuLmP6xnAuAFCdrKv5.png', 'png', 'image/png', 181017, '{\"width\":913,\"height\":487,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":137,\"file_name\":\"15lme8pIEMHQULCpHSsWmIwuLmP6xnAuAFCdrKv5-thumbnail.png\"}}}', '2022-10-03 18:42:51', '2022-10-03 18:42:51'),
(5, 'anh1', NULL, 'QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"QJhB3RNAgIHbwLfmGW7W23jmpt3KsMhiV7E6OjyP-small.png\"}}}', '2022-10-03 21:28:27', '2022-10-03 21:28:27'),
(6, 'anh2', NULL, '5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"5Z5LQoOA8yvKi2Lf9Tx8HyiOiE6gG1fOqurH2trH-small.png\"}}}', '2022-10-03 21:28:28', '2022-10-03 21:28:28'),
(7, 'Screenshot 2022-08-12 123520', '', '5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M.png', 'png', 'image/png', 327465, '{\"width\":1878,\"height\":894,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":122,\"file_name\":\"5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M-thumbnail.png\"},\"small\":{\"width\":1344,\"height\":640,\"file_name\":\"5UMtGY9Euc0N596tgQUlNAofOoYanJrR6FW6ZQ4M-small.png\"}}}', '2022-10-04 01:48:45', '2022-10-04 01:48:45'),
(8, 'anh1', '', 'Dw6FehDTlX4WxvShVMnndtwr7XDBWO4Ml2LoqHou.png', 'png', 'image/png', 140572, '{\"width\":1672,\"height\":805,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":123,\"file_name\":\"Dw6FehDTlX4WxvShVMnndtwr7XDBWO4Ml2LoqHou-thumbnail.png\"},\"small\":{\"width\":1329,\"height\":640,\"file_name\":\"Dw6FehDTlX4WxvShVMnndtwr7XDBWO4Ml2LoqHou-small.png\"}}}', '2022-10-04 21:42:00', '2022-10-04 21:42:00'),
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
(42, '6317daba5502b1.23939962.5917 1', NULL, 'oZ7nEahkIS8lJKw1xOkPzZrVbe4MyS0maU8qxlh0.png', 'png', 'image/png', 38683, '{\"width\":374,\"height\":243,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":166,\"file_name\":\"oZ7nEahkIS8lJKw1xOkPzZrVbe4MyS0maU8qxlh0-thumbnail.png\"}}}', '2022-10-06 20:42:25', '2022-10-06 20:42:25');

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
  `otp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(27, NULL, 'Đại Hữu Nguyễn', 12, NULL, 3, '2022-09-21', 'hhhss', 'huudai032001@gmail.com', '川崎', '$2y$10$IUk1oNmK8Wjz82VghmVRVOjI5v.tVxAAI/OznEnoYKpcN/5f6/RSW', NULL, NULL, NULL, NULL, '3000', 'active', '', 'https://www.youtube.com/watch?v=XFJ09PqqwU8&list=RDMM&index=6', 'dasd', 'dasdasd', '[\"1\",\"2\",\"3\"]', '109829984724144315607', '3226743507581614', NULL, '2022-09-22 20:52:43', '2022-10-05 21:17:31'),
(47, NULL, 'dai huu', NULL, 'member', 1, '2022-09-28', 'sda', 'dai20010301@gmail.com', '川崎', '$2y$10$HiYtwOy1RXEOZO5WlFcU0e3lvHqZ3y1yUE3hlAU1TF1Zn9hsCOx7K', NULL, NULL, NULL, NULL, NULL, 'active', '92155', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-05 02:15:25', '2022-10-05 20:05:12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `zip_code`
--
ALTER TABLE `zip_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
