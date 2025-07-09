-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-07-09 16:23:47
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `tieat`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `created_time`, `updated_time`) VALUES
(1, 'admin', '12345', '2025-07-05 05:17:02', '2025-07-06 06:22:40'),
(19, 'test01', '12345', '2025-07-06 06:35:17', '2025-07-06 06:35:17'),
(28, 'ssssss', '111', '2025-07-06 10:27:00', '2025-07-06 10:27:00'),
(31, 'gg', 'ggg', '2025-07-06 10:43:35', '2025-07-06 10:43:35'),
(32, 'fff', '111', '2025-07-06 10:44:44', '2025-07-06 10:44:44');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `text`) VALUES
(1, NULL),
(2, 'Copyright © 2025 Tieat. All Rights Reserved 泰好喝有限公司');

-- --------------------------------------------------------

--
-- 資料表結構 `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_no` text NOT NULL,
  `item_name` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED DEFAULT NULL,
  `bg_date` date DEFAULT NULL,
  `ed_date` date DEFAULT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `items`
--

INSERT INTO `items` (`id`, `item_no`, `item_name`, `price`, `cost`, `bg_date`, `ed_date`, `created_time`, `updated_time`, `img`) VALUES
(1, 'a001', '拿鐵', 50, 20, '2025-07-01', '2026-12-31', '2025-07-06', '2025-07-06 12:33:23', ''),
(2, 'a002', '紅茶', 35, 15, '0000-00-00', '0000-00-00', '2025-07-06', '2025-07-06 12:34:21', ''),
(4, 'a005', ' 綠茶', 30, 10, '0000-00-00', '0000-00-00', '2025-07-06', '2025-07-06 12:35:52', '');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `name` text NOT NULL,
  `email` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `acc`, `pw`, `name`, `email`, `birthday`, `created_time`, `updated_time`) VALUES
(1, 'doris01', '1234', '黃芯', 'dorishsh2678@gmail.com', '2000-02-01', '2025-07-05 06:14:37', '2025-07-06 14:14:28');

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `href` text DEFAULT NULL,
  `sh` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order1`
--

CREATE TABLE `order1` (
  `id` int(10) UNSIGNED NOT NULL,
  `date1` date NOT NULL,
  `or_no` varchar(20) NOT NULL,
  `acc` text NOT NULL,
  `name` text NOT NULL,
  `amt` int(11) NOT NULL DEFAULT 0,
  `tel` varchar(20) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order1`
--

INSERT INTO `order1` (`id`, `date1`, `or_no`, `acc`, `name`, `amt`, `tel`, `created_time`, `updated_time`) VALUES
(38, '2025-07-09', '', '', 'doris01', 145, '', '2025-07-09 14:18:15', '2025-07-09 14:18:15'),
(39, '2025-07-09', '', '', 'doris01', 100, '0900000000', '2025-07-09 14:23:12', '2025-07-09 14:23:12');

-- --------------------------------------------------------

--
-- 資料表結構 `order2`
--

CREATE TABLE `order2` (
  `id` int(10) UNSIGNED NOT NULL,
  `or_no` varchar(20) DEFAULT NULL,
  `item_no` text DEFAULT NULL,
  `item_name` text DEFAULT NULL,
  `price` int(10) DEFAULT 0,
  `qty` int(10) DEFAULT 0,
  `created_time` timestamp NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order2`
--

INSERT INTO `order2` (`id`, `or_no`, `item_no`, `item_name`, `price`, `qty`, `created_time`, `updated_time`) VALUES
(65, NULL, 'a001', '拿鐵', 50, 1, '2025-07-09 14:18:15', '2025-07-09 14:18:15'),
(66, NULL, 'a002', '紅茶', 35, 1, '2025-07-09 14:18:15', '2025-07-09 14:18:15'),
(67, NULL, 'a005', '綠茶', 30, 2, '2025-07-09 14:18:15', '2025-07-09 14:18:15'),
(68, NULL, 'a001', '拿鐵', 50, 2, '2025-07-09 14:23:12', '2025-07-09 14:23:12');

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `sh` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `title`
--

INSERT INTO `title` (`id`, `text`, `img`, `sh`) VALUES
(1, '泰好喝', NULL, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order2`
--
ALTER TABLE `order2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order1`
--
ALTER TABLE `order1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order2`
--
ALTER TABLE `order2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `title`
--
ALTER TABLE `title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
