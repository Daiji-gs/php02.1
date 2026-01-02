-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2026-01-02 06:15:04
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_books`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_books_table`
--

CREATE TABLE `gs_books_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_books_table`
--

INSERT INTO `gs_books_table` (`id`, `name`, `url`, `comment`, `date`) VALUES
(1, '日本統一', 'nihon@amazon.com', '戦国時代からの天下統一の物語', '2026-01-01 16:37:52'),
(2, '歴史１００年', 'rekishi@book.co,', '１００年の歴史', '2026-01-01 16:38:28'),
(3, 'はさだのエンジニア日記', 'hasada@amazon.com', 'XYZ', '2026-01-02 14:09:20');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_books_table`
--
ALTER TABLE `gs_books_table`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_books_table`
--
ALTER TABLE `gs_books_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
