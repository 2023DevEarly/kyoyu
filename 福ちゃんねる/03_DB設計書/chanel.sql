-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-07-20 02:39:10
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `chanel`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ngワード`
--

CREATE TABLE `ngワード` (
  `ng_decision` varchar(100) NOT NULL,
  `ng_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ngワード`
--

INSERT INTO `ngワード` (`ng_decision`, `ng_number`) VALUES
('あほ', 1),
('カス', 6),
('クズ', 3),
('ゴミ', 4),
('バカ', 7),
('死ね', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `いいね`
--

CREATE TABLE `いいね` (
  `good` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `スレッド`
--

CREATE TABLE `スレッド` (
  `user_id` int(11) NOT NULL,
  `handle_name` varchar(50) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `create_day` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `good` int(11) NOT NULL,
  `ng_decision` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `スレッド`
--

INSERT INTO `スレッド` (`user_id`, `handle_name`, `thread_id`, `create_day`, `title`, `comment`, `good`, `ng_decision`) VALUES
(0, 'プリキュア', 4, '2023-07-04 12:39:24', 'こんにちは', 'プリティーでキュアキュア', 0, ''),
(0, 'うんち', 5, '2023-07-04 12:39:49', 'うんこ', 'うんちぶり', 0, ''),
(0, 'ドロシー', 6, '2023-07-05 09:48:42', 'エデンとかいう楽園まがいのなにかwwww', '誰も来ないんですがそれは', 0, ''),
(0, 'スレッド', 7, '2023-07-12 01:40:46', 'タイトル', 'コメント', 0, ''),
(0, 'ruiji', 8, '2023-07-16 15:05:05', 'マンマミーア', 'マンマミーア', 0, ''),
(0, 'フクヤマ　ヒラク', 10, '2023-07-18 10:19:58', 'こんにちは', 'さようなら', 0, '');

-- --------------------------------------------------------

--
-- テーブルの構造 `メッセージ`
--

CREATE TABLE `メッセージ` (
  `thread_id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `img` longblob DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `destination_user_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `ng_decision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `ユーザー`
--

CREATE TABLE `ユーザー` (
  `user_id` int(11) NOT NULL,
  `handle_name` varchar(50) NOT NULL,
  `user_mail` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `kanri_num` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ユーザー`
--

INSERT INTO `ユーザー` (`user_id`, `handle_name`, `user_mail`, `user_pass`, `kanri_num`) VALUES
(743831488, 'ルイージ', 'ruiji@nin.jp', 'ruijiruji', 0),
(1383446562, 'マリオ', 'mario@nintendo.jp', 'mariomash', 0),
(1901122709, 'プリキュア', 'mailaddless@mmm.jp', 'abcdefgh', 0),
(2093562673, 'フクヤマ　ヒラク', '2101198@s.asojuku.ac.jp', 'fhrk0924', 0),
(2093562674, '鍋田怜也', '2101190@s.asojuku.ac.jp', '$2y$10$4BwShmRZup56IW0V1RLrv.o4.SARzezZfc9QDOXA2z9', 0),
(2093562675, '管理者', '', 'kanrisha', 12345678),
(2093562676, 'jjj', 'jjj@jjj.jp', 'jjjjjjjj', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ngワード`
--
ALTER TABLE `ngワード`
  ADD PRIMARY KEY (`ng_number`),
  ADD KEY `ng_decision` (`ng_decision`);

--
-- テーブルのインデックス `いいね`
--
ALTER TABLE `いいね`
  ADD PRIMARY KEY (`good`);

--
-- テーブルのインデックス `スレッド`
--
ALTER TABLE `スレッド`
  ADD PRIMARY KEY (`thread_id`),
  ADD KEY `user_id` (`user_id`,`handle_name`,`ng_decision`);

--
-- テーブルのインデックス `メッセージ`
--
ALTER TABLE `メッセージ`
  ADD PRIMARY KEY (`thread_id`,`user_id`,`ng_decision`);

--
-- テーブルのインデックス `ユーザー`
--
ALTER TABLE `ユーザー`
  ADD PRIMARY KEY (`user_id`,`handle_name`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ngワード`
--
ALTER TABLE `ngワード`
  MODIFY `ng_number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `いいね`
--
ALTER TABLE `いいね`
  MODIFY `good` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `スレッド`
--
ALTER TABLE `スレッド`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `ユーザー`
--
ALTER TABLE `ユーザー`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2093562677;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
