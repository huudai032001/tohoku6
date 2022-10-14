-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 04:07 AM
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
-- Table structure for table `category_event`
--

CREATE TABLE `category_event` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_event`
--

INSERT INTO `category_event` (`id`, `event_id`, `category_id`) VALUES
(2, 2, 3),
(3, 3, 4),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_spot`
--

CREATE TABLE `category_spot` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_spot`
--

INSERT INTO `category_spot` (`id`, `spot_id`, `category_id`) VALUES
(7, 3, 1),
(8, 3, 2),
(11, 5, 1),
(12, 5, 7),
(13, 7, 3),
(17, 7, 4),
(18, 2, 6),
(19, 7, 6),
(20, 2, 6),
(21, 2, 7),
(24, 8, 4);

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
(3, 1, 58, 'mail tests', 'nice', '2022-10-13 01:54:30', '2022-10-13 01:54:30'),
(4, 6, 58, 'mail tests', 'verry', '2022-10-13 02:48:07', '2022-10-13 02:48:07');

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
(2, '天守県カントリーミュージックイベント', '天守県カントリーミュージックイベント', 'Akita', '2022-10-13 17:00:00', 'とても興味深い', 20, '[\"20\",\"19\",\"18\"]', 1, 0, 0, '2022-10-13 01:04:22', '2022-10-13 01:04:22'),
(3, '最新のマジック サーカス ショー', '最新のマジック サーカス ショー', 'Akita', '2022-10-12 17:00:00', 'とても魅力的な', 21, '[\"20\",\"19\",\"15\"]', 1, 0, 0, '2022-10-13 01:06:38', '2022-10-13 01:06:38'),
(4, 'テトコメディ', 'テトコメディ', 'Akita', '2022-10-13 17:00:00', '椅子から離れて笑う', 19, '[\"20\",\"18\",\"17\"]', 1, 0, 0, '2022-10-13 01:07:28', '2022-10-13 01:07:28'),
(5, 'Cry 恐れるな「弱者を守る」', 'cry', 'Fukushima', '2022-10-13 08:08:33', '最後の一滴まで魅力的', 16, '[\"21\",\"18\",\"15\"]', 1, 0, 0, '2022-10-13 01:08:33', '2022-10-13 01:08:33'),
(6, 'Khóa Học Tiếng Anh Mới Nhất', 'khoa-hoc-tieng-anh-moi-nhat', 'Aomori', '2022-10-14 17:00:00', 'depdsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 15, '[\"19\",\"18\",\"17\"]', 1, 0, 0, '2022-10-13 01:09:02', '2022-10-13 01:09:02'),
(7, '10年歌手Jso', '10jso', 'Fukushima', '2022-10-13 08:09:43', 'dep', 18, '[\"18\",\"17\",\"15\"]', 1, 0, 0, '2022-10-13 01:09:43', '2022-10-13 01:09:43');

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
(1, 1, 1, '1,58', '2022-10-13 00:48:08', '2022-10-13 01:33:31'),
(2, 1, 1, '1', '2022-10-13 00:51:14', '2022-10-13 00:51:14'),
(3, 6, 1, '1,58', '2022-10-13 01:01:42', '2022-10-13 02:47:54'),
(4, 2, 2, '1', '2022-10-13 01:04:22', '2022-10-13 01:04:22'),
(5, 3, 2, '1', '2022-10-13 01:06:38', '2022-10-13 01:06:38'),
(6, 4, 2, '1', '2022-10-13 01:07:28', '2022-10-13 01:07:28'),
(7, 5, 2, '1', '2022-10-13 01:08:33', '2022-10-13 01:08:33'),
(8, 6, 2, '1', '2022-10-13 01:09:02', '2022-10-13 01:09:02'),
(9, 7, 2, '1', '2022-10-13 01:09:43', '2022-10-13 01:09:43'),
(10, 7, 1, '1', '2022-10-13 18:37:04', '2022-10-13 18:37:04'),
(11, 2, 1, '1', '2022-10-13 18:52:46', '2022-10-13 18:52:46'),
(12, 2, 1, '1', '2022-10-13 18:55:17', '2022-10-13 18:55:17'),
(13, 2, 1, '1', '2022-10-13 18:56:25', '2022-10-13 18:56:25'),
(14, 2, 1, '1', '2022-10-13 18:56:32', '2022-10-13 18:56:32'),
(15, 8, 1, '1', '2022-10-13 18:57:24', '2022-10-13 18:57:24');

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
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `alias`, `image_id`, `images_id`, `intro`, `point`, `author`, `created_at`, `updated_at`) VALUES
(1, '最新のステッカーは非常に面白いです', '最新のステッカーは非常に面白いです', 24, '[\"22\",\"22\"]', '非常に思慮のない', '200', 1, '2022-10-13 08:17:17', '2022-10-13 08:17:17'),
(2, 'プリンセスステッカー', 'プリンセスステッカー', 23, '[\"24\",\"22\"]', 'とてもかわいい', '400', 1, '2022-10-13 08:17:22', '2022-10-13 08:17:22');

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
(1, 1, '承認された投稿', 1, '2022-10-13 00:48:08', '2022-10-13 00:48:08'),
(2, 1, '承認された投稿', 1, '2022-10-13 00:51:14', '2022-10-13 00:51:14'),
(3, 6, '承認された投稿', 1, '2022-10-13 01:01:42', '2022-10-13 01:01:42'),
(4, 1, 'mail testsが  よくある質問フォーラムについての感情を表した', 58, '2022-10-13 01:33:31', '2022-10-13 01:33:31'),
(5, 1, 'mail testsがあなたの投稿にコメントしました', 1, '2022-10-13 01:35:50', '2022-10-13 01:35:50'),
(6, 1, 'mail testsがあなたの投稿にコメントしました', 1, '2022-10-13 01:37:52', '2022-10-13 01:37:52'),
(7, 1, 'mail testsがあなたの投稿にコメントしました', 1, '2022-10-13 01:54:30', '2022-10-13 01:54:30'),
(8, 6, 'mail testsが  振り返るな、前を向くについての感情を表した', 58, '2022-10-13 02:47:54', '2022-10-13 02:47:54'),
(9, 6, 'mail testsがあなたの投稿にコメントしました', 1, '2022-10-13 02:48:07', '2022-10-13 02:48:07'),
(10, 7, '承認された投稿', 1, '2022-10-13 18:37:04', '2022-10-13 18:37:04'),
(11, 2, '承認された投稿', 1, '2022-10-13 18:52:46', '2022-10-13 18:52:46'),
(12, 2, '承認された投稿', 1, '2022-10-13 18:55:17', '2022-10-13 18:55:17'),
(13, 2, '承認された投稿', 1, '2022-10-13 18:56:25', '2022-10-13 18:56:25'),
(14, 2, '承認された投稿', 1, '2022-10-13 18:56:32', '2022-10-13 18:56:32'),
(15, 8, '承認された投稿', 1, '2022-10-13 18:57:24', '2022-10-13 18:57:24');

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
-- Table structure for table `report_comment`
--

CREATE TABLE `report_comment` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_comment`
--

INSERT INTO `report_comment` (`id`, `comment_id`, `user_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 58, 'hacker', '', '2022-10-13 01:38:56', '2022-10-13 01:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `report_spot`
--

CREATE TABLE `report_spot` (
  `id` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_spot`
--

INSERT INTO `report_spot` (`id`, `spot_id`, `user_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 60, 'hacker', '', '2022-10-13 02:26:15', '2022-10-13 02:26:15'),
(2, 6, 58, 'nice', '', '2022-10-13 02:48:19', '2022-10-13 02:48:19');

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
  `alias` varchar(255) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `images_id` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
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
(1, 'よくある質問フォーラム', 'よくある質問フォーラム', 4, NULL, '4番レーン123', 'Aomori', 'スポット説明', '1', 'active', 1, 3, NULL, '2022-10-13 01:54:30'),
(2, '定期武道交流', '定期武道交流', 6, '[\"5\"]', '6', 'Akita', 'スポット説明', '1', 'disabled', 0, 0, NULL, '2022-10-13 18:52:46'),
(3, '年末にお会いしましょう', '年末にお会いしましょう', 9, '[\"7\",\"8\"]', '9', 'Fukushima', 'スポット説明', '60', 'active', 0, 0, NULL, NULL),
(4, '成功のために走る', '成功のために走る', 11, '[\"10\"]', '11', 'Akita', 'スポット説明', '60', 'active', 0, 0, NULL, NULL),
(5, '感動的なショー', '感動的なショー', 14, '[\"12\",\"13\"]', '14', 'Aomori', 'スポット説明', '60', 'active', 0, 0, NULL, NULL),
(6, '振り返るな、前を向く', '振り返るな、前を向く', 15, '[\"17\",\"16\",\"15\"]', '62 ニッチ 34', 'Akita', 'ここに来て', '1', 'active', 1, 1, '2022-10-13 01:01:42', '2022-10-13 02:48:07'),
(7, '全国みどり会議', '全国みどり会議', 27, '[\"26\"]', '27', 'Aomori', '全国みどり会議', '1', 'disabled', 0, 0, NULL, '2022-10-13 18:37:04');

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
(1, '62bf13c6e02706.54663818', '', 'g3XWkTzfn3OiZ4xZveRhvfGoLJZed1x0NySATQgm.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-13 00:11:17', '2022-10-13 00:11:17'),
(2, '62bf13c6e02706.54663818', '', 'e3t2DgHcyS5gjJLGIK8kZsriL739CsMLOD5vQXrx.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-13 00:17:10', '2022-10-13 00:17:10'),
(3, '62bf13c6e02706.54663818', '', 'wCb8KvrJqSK2KU3R9ej9fcSabXdQPpEr1duuIwDQ.png', 'png', 'image/png', 62456, '{\"width\":200,\"height\":200,\"versions\":[]}', '2022-10-13 00:30:04', '2022-10-13 00:30:04'),
(4, 'nhat-ban-1', '', 'WSTn0qMXPEYpvMrUsG1GVBdfZFMIanV7vuJ76Hpr.jpg', 'jpg', 'image/jpeg', 1107424, '{\"width\":3226,\"height\":2419,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":192,\"file_name\":\"WSTn0qMXPEYpvMrUsG1GVBdfZFMIanV7vuJ76Hpr-thumbnail.jpg\"},\"small\":{\"width\":854,\"height\":640,\"file_name\":\"WSTn0qMXPEYpvMrUsG1GVBdfZFMIanV7vuJ76Hpr-small.jpg\"},\"medium\":{\"width\":1707,\"height\":1280,\"file_name\":\"WSTn0qMXPEYpvMrUsG1GVBdfZFMIanV7vuJ76Hpr-medium.jpg\"},\"large\":{\"width\":2561,\"height\":1920,\"file_name\":\"WSTn0qMXPEYpvMrUsG1GVBdfZFMIanV7vuJ76Hpr-large.jpg\"}}}', '2022-10-13 00:45:31', '2022-10-13 00:45:31'),
(5, 'tải xuống', '', '2HbRqvTpnKRARiYXz521WTXtyOlHd9lahtMG281j.jpg', 'jpg', 'image/jpeg', 13851, '{\"width\":286,\"height\":176,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"2HbRqvTpnKRARiYXz521WTXtyOlHd9lahtMG281j-thumbnail.jpg\"}}}', '2022-10-13 00:54:15', '2022-10-13 00:54:15'),
(6, 'cc-1', '', 'JNFofCuDd5DSt2RpPULyF56x3LOOXNcQfi2GjELH.jpg', 'jpg', 'image/jpeg', 35211, '{\"width\":499,\"height\":331,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"JNFofCuDd5DSt2RpPULyF56x3LOOXNcQfi2GjELH-thumbnail.jpg\"}}}', '2022-10-13 00:54:15', '2022-10-13 00:54:15'),
(7, 'cc-1', '', 'zVGtOM61vmZeqBjaOMAGd3xH0ZmpNPY89rkMBJG7.jpg', 'jpg', 'image/jpeg', 35211, '{\"width\":499,\"height\":331,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"zVGtOM61vmZeqBjaOMAGd3xH0ZmpNPY89rkMBJG7-thumbnail.jpg\"}}}', '2022-10-13 00:56:08', '2022-10-13 00:56:08'),
(8, 'nhat-ban-1', '', 'pDKfD8QL3X6gZm9mPSSeioLOiiL9TP1knLOP9Nhv.jpg', 'jpg', 'image/jpeg', 1107424, '{\"width\":3226,\"height\":2419,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":192,\"file_name\":\"pDKfD8QL3X6gZm9mPSSeioLOiiL9TP1knLOP9Nhv-thumbnail.jpg\"},\"small\":{\"width\":854,\"height\":640,\"file_name\":\"pDKfD8QL3X6gZm9mPSSeioLOiiL9TP1knLOP9Nhv-small.jpg\"},\"medium\":{\"width\":1707,\"height\":1280,\"file_name\":\"pDKfD8QL3X6gZm9mPSSeioLOiiL9TP1knLOP9Nhv-medium.jpg\"},\"large\":{\"width\":2561,\"height\":1920,\"file_name\":\"pDKfD8QL3X6gZm9mPSSeioLOiiL9TP1knLOP9Nhv-large.jpg\"}}}', '2022-10-13 00:56:12', '2022-10-13 00:56:12'),
(9, 'Senso-ji-temple-12102020', '', 'POVUADxUpaIgB3M3M8KKXozEHBYExyBiDdpqkM6F.jpg', 'jpg', 'image/jpeg', 114678, '{\"width\":620,\"height\":383,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"POVUADxUpaIgB3M3M8KKXozEHBYExyBiDdpqkM6F-thumbnail.jpg\"}}}', '2022-10-13 00:56:12', '2022-10-13 00:56:12'),
(10, 'cc-1', '', '9xOt2zbgLGaM5eHiwVnCjsCmrnSlFzJLh6JWKSQk.jpg', 'jpg', 'image/jpeg', 35211, '{\"width\":499,\"height\":331,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"9xOt2zbgLGaM5eHiwVnCjsCmrnSlFzJLh6JWKSQk-thumbnail.jpg\"}}}', '2022-10-13 00:57:21', '2022-10-13 00:57:21'),
(11, 'thap-tokyo-12102020', '', 'RcjGLNxQ8K01XtMORVsvs9VP1WtbeYSqRVqdq0WH.jpg', 'jpg', 'image/jpeg', 98401, '{\"width\":620,\"height\":672,\"versions\":{\"thumbnail\":{\"width\":237,\"height\":256,\"file_name\":\"RcjGLNxQ8K01XtMORVsvs9VP1WtbeYSqRVqdq0WH-thumbnail.jpg\"}}}', '2022-10-13 00:57:21', '2022-10-13 00:57:21'),
(12, 'tải xuống', '', 'ff20uakGFX51LN8uCCTzrBaXYN7D5IxE8LxiJopX.jpg', 'jpg', 'image/jpeg', 13851, '{\"width\":286,\"height\":176,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"ff20uakGFX51LN8uCCTzrBaXYN7D5IxE8LxiJopX-thumbnail.jpg\"}}}', '2022-10-13 00:59:01', '2022-10-13 00:59:01'),
(13, 'nhat-ban-1', '', 'HW7EsPfBaOqQBMOGy1sU1IClxI5GthuSX49ufs9Y.jpg', 'jpg', 'image/jpeg', 1107424, '{\"width\":3226,\"height\":2419,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":192,\"file_name\":\"HW7EsPfBaOqQBMOGy1sU1IClxI5GthuSX49ufs9Y-thumbnail.jpg\"},\"small\":{\"width\":854,\"height\":640,\"file_name\":\"HW7EsPfBaOqQBMOGy1sU1IClxI5GthuSX49ufs9Y-small.jpg\"},\"medium\":{\"width\":1707,\"height\":1280,\"file_name\":\"HW7EsPfBaOqQBMOGy1sU1IClxI5GthuSX49ufs9Y-medium.jpg\"},\"large\":{\"width\":2561,\"height\":1920,\"file_name\":\"HW7EsPfBaOqQBMOGy1sU1IClxI5GthuSX49ufs9Y-large.jpg\"}}}', '2022-10-13 00:59:05', '2022-10-13 00:59:05'),
(14, 'Senso-ji-temple-12102020', '', 'Dtg7B3y1bxvDVQfFToFgUqJYJOcnEeq7TFpAVSxb.jpg', 'jpg', 'image/jpeg', 114678, '{\"width\":620,\"height\":383,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"Dtg7B3y1bxvDVQfFToFgUqJYJOcnEeq7TFpAVSxb-thumbnail.jpg\"}}}', '2022-10-13 00:59:05', '2022-10-13 00:59:05'),
(15, 'ấdadad', NULL, 'Qhd6q1AdcAY8UkcyCkvO4iKp1C5XdMnJJt6AGg5h.jpg', 'jpg', 'image/jpeg', 67917, '{\"width\":600,\"height\":429,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":183,\"file_name\":\"Qhd6q1AdcAY8UkcyCkvO4iKp1C5XdMnJJt6AGg5h-thumbnail.jpg\"}}}', '2022-10-13 01:01:10', '2022-10-13 01:01:10'),
(16, 'Du-lịch-Kyoto-Nhật-Bản-mùa-hè-4', NULL, 'Gzc7YyvQzlpmWgyq9a2hde3C1UPgX3CHjGzFfnUc.png', 'png', 'image/png', 699515, '{\"width\":800,\"height\":543,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":174,\"file_name\":\"Gzc7YyvQzlpmWgyq9a2hde3C1UPgX3CHjGzFfnUc-thumbnail.png\"}}}', '2022-10-13 01:01:35', '2022-10-13 01:01:35'),
(17, 'Senso-ji-temple-12102020', NULL, 'txYb0m5UpKiKD8npkSdF3ERiAFzE2OYnkwZFdvvK.jpg', 'jpg', 'image/jpeg', 114678, '{\"width\":620,\"height\":383,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"txYb0m5UpKiKD8npkSdF3ERiAFzE2OYnkwZFdvvK-thumbnail.jpg\"}}}', '2022-10-13 01:01:35', '2022-10-13 01:01:35'),
(18, 'nhat-ban-1', NULL, 'Ix5XAHq2H9sNELlPhQ3pe1c9qVOZaETJ1V0BHCH3.jpg', 'jpg', 'image/jpeg', 1107424, '{\"width\":3226,\"height\":2419,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":192,\"file_name\":\"Ix5XAHq2H9sNELlPhQ3pe1c9qVOZaETJ1V0BHCH3-thumbnail.jpg\"},\"small\":{\"width\":854,\"height\":640,\"file_name\":\"Ix5XAHq2H9sNELlPhQ3pe1c9qVOZaETJ1V0BHCH3-small.jpg\"},\"medium\":{\"width\":1707,\"height\":1280,\"file_name\":\"Ix5XAHq2H9sNELlPhQ3pe1c9qVOZaETJ1V0BHCH3-medium.jpg\"},\"large\":{\"width\":2561,\"height\":1920,\"file_name\":\"Ix5XAHq2H9sNELlPhQ3pe1c9qVOZaETJ1V0BHCH3-large.jpg\"}}}', '2022-10-13 01:03:39', '2022-10-13 01:03:39'),
(19, 'tải xuống', NULL, 'XHL5rCAcevK95Asyfs23PUwLcSdvjrxICuxALYt2.jpg', 'jpg', 'image/jpeg', 13851, '{\"width\":286,\"height\":176,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"XHL5rCAcevK95Asyfs23PUwLcSdvjrxICuxALYt2-thumbnail.jpg\"}}}', '2022-10-13 01:03:39', '2022-10-13 01:03:39'),
(20, 'thap-tokyo-12102020', NULL, 'H1WNi29t88aNFp9wc43qlgJFPEORn3iKCok3SyoY.jpg', 'jpg', 'image/jpeg', 98401, '{\"width\":620,\"height\":672,\"versions\":{\"thumbnail\":{\"width\":237,\"height\":256,\"file_name\":\"H1WNi29t88aNFp9wc43qlgJFPEORn3iKCok3SyoY-thumbnail.jpg\"}}}', '2022-10-13 01:03:40', '2022-10-13 01:03:40'),
(21, 'vTz5Po6Y', NULL, 'SS5QrszyKtffhVqVMZZe0waYB9FmzlBUQc7hoBAl.jpg', 'jpg', 'image/jpeg', 25775, '{\"width\":305,\"height\":405,\"versions\":{\"thumbnail\":{\"width\":193,\"height\":256,\"file_name\":\"SS5QrszyKtffhVqVMZZe0waYB9FmzlBUQc7hoBAl-thumbnail.jpg\"}}}', '2022-10-13 01:06:24', '2022-10-13 01:06:24'),
(22, '092a59dc255ee682126d495bb89ce0c6', NULL, 'jZWoEC8PW5ktcLN6omldJxoMw4nCi0k7PFxv7v3H.jpg', 'jpg', 'image/jpeg', 414602, '{\"width\":1024,\"height\":1024,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":256,\"file_name\":\"jZWoEC8PW5ktcLN6omldJxoMw4nCi0k7PFxv7v3H-thumbnail.jpg\"},\"small\":{\"width\":640,\"height\":640,\"file_name\":\"jZWoEC8PW5ktcLN6omldJxoMw4nCi0k7PFxv7v3H-small.jpg\"}}}', '2022-10-13 01:11:50', '2022-10-13 01:11:50'),
(23, '2616614f7a1b9730e4d7de707013dec4', NULL, 'APBBBNuidyGGrluMWHg94BE6CyxCbvmtD8NQnVjE.jpg', 'jpg', 'image/jpeg', 748049, '{\"width\":758,\"height\":758,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":256,\"file_name\":\"APBBBNuidyGGrluMWHg94BE6CyxCbvmtD8NQnVjE-thumbnail.jpg\"},\"small\":{\"width\":640,\"height\":640,\"file_name\":\"APBBBNuidyGGrluMWHg94BE6CyxCbvmtD8NQnVjE-small.jpg\"}}}', '2022-10-13 01:11:51', '2022-10-13 01:11:51'),
(24, '6612fdff8f82e1796beefdca7f369fad.jpg_720x720q80.jpg_', NULL, 'IavRmfLQuAvAdf96yaIYpPERCn8cIYGuFsfMHD6e.webp', 'webp', 'image/webp', 82772, '{\"width\":720,\"height\":720,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":256,\"file_name\":\"IavRmfLQuAvAdf96yaIYpPERCn8cIYGuFsfMHD6e-thumbnail.webp\"},\"small\":{\"width\":640,\"height\":640,\"file_name\":\"IavRmfLQuAvAdf96yaIYpPERCn8cIYGuFsfMHD6e-small.webp\"}}}', '2022-10-13 01:12:13', '2022-10-13 01:12:13'),
(25, 'cc-1', '', '3II43wqTRfwBaURJtSudiE3GeUFfoPp7uBpA7xEN.jpg', 'jpg', 'image/jpeg', 35211, '{\"width\":499,\"height\":331,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":170,\"file_name\":\"3II43wqTRfwBaURJtSudiE3GeUFfoPp7uBpA7xEN-thumbnail.jpg\"}}}', '2022-10-13 01:41:55', '2022-10-13 01:41:55'),
(26, 'ấdadad', '', 'cCJpCBZWnC6g9Afv0XrmJDIG7REoO6v2ixwqMijR.jpg', 'jpg', 'image/jpeg', 67917, '{\"width\":600,\"height\":429,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":183,\"file_name\":\"cCJpCBZWnC6g9Afv0XrmJDIG7REoO6v2ixwqMijR-thumbnail.jpg\"}}}', '2022-10-13 18:33:11', '2022-10-13 18:33:11'),
(27, 'tải xuống', '', 'gLHQbln2WEtZ8es31ih7w41G3v7DoLIbd9atQYCe.jpg', 'jpg', 'image/jpeg', 13851, '{\"width\":286,\"height\":176,\"versions\":{\"thumbnail\":{\"width\":256,\"height\":158,\"file_name\":\"gLHQbln2WEtZ8es31ih7w41G3v7DoLIbd9atQYCe-thumbnail.jpg\"}}}', '2022-10-13 18:33:11', '2022-10-13 18:33:11');

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
(47, NULL, 'dai huudasd', 43, 'member', 1, '2022-09-28', 'sda', 'dai20010301@gmail.com', '川崎', '$2y$10$HiYtwOy1RXEOZO5WlFcU0e3lvHqZ3y1yUE3hlAU1TF1Zn9hsCOx7K', NULL, NULL, NULL, NULL, NULL, 'active', '92155', NULL, NULL, NULL, '[\"1\"]', '117606606609355028013', NULL, NULL, '2022-10-05 02:15:25', '2022-10-13 00:05:57'),
(58, NULL, 'mail tests', 25, NULL, 1, '2022-10-12', 'asas', 'mailtests2001@gmail.com', '東京', '$2y$10$D8ydw.x/MRjyJfrDLIhJBOn/CfiM3xseIMzg.wmBZfGu2bi6KJwmC', NULL, NULL, NULL, NULL, NULL, 'active', '68185', NULL, NULL, NULL, NULL, '102272033398519678082', NULL, NULL, '2022-10-13 00:09:44', '2022-10-13 02:47:29'),
(60, NULL, 'Đại Hữu Nguyễn', 3, NULL, 2, '2022-10-12', 'sa', 'huudai032001@gmail.com', '川崎', 'eyJpdiI6ImJrckM1ZGhFM2JPanJ0OE1kamY1clE9PSIsInZhbHVlIjoiUU1QRXNsWXEzZDBmVFpDN09QNzA5MGU4dXRuNWxKYVhITnIyaE1vV2Zjaz0iLCJtYWMiOiIxOWYwODk2YzljMWJhM2MzM2JiZDIzYmVmNDIzNjZjZGJmNjZhY2Y3NTAxYmQxZDYzNWIwNWZlYWNiMWRlOTRjIiwidGFnIjoiIn0=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asa', 'sas', 'sa', NULL, '109829984724144315607', '3226743507581614', NULL, '2022-10-13 00:16:17', '2022-10-13 18:59:47');

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
-- Indexes for table `category_event`
--
ALTER TABLE `category_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_spot`
--
ALTER TABLE `category_spot`
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
-- Indexes for table `report_comment`
--
ALTER TABLE `report_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_spot`
--
ALTER TABLE `report_spot`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `category_event`
--
ALTER TABLE `category_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_spot`
--
ALTER TABLE `category_spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_comment`
--
ALTER TABLE `report_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report_spot`
--
ALTER TABLE `report_spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `zip_code`
--
ALTER TABLE `zip_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
