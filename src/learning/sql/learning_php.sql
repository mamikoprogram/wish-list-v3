-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2022 年 7 月 23 日 05:00
-- サーバのバージョン： 5.7.36
-- PHP のバージョン: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `learning_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
                         `id` int(10) NOT NULL,
                         `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
                         `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
                         `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
                                                            (7, 'テスト１', 'test1@gmail.com', 'd6cdfeb7d1f6a670650fc4b6d9930df32d62ccd6'),
                                                            (8, 'テスト２', 'test2@gmail.com', '1615ed643efd9ea299c743862acfe539d1abff99'),
                                                            (9, '<script>!</script>', 'test3@gmail.com', 'c049ec1535d081feff99ac17fe615d7ccb3af6ae'),
                                                            (10, '', 'test4@gmail.com', '7c3560609137ce99793216c76c68840aa49a34ae'),
                                                            (69, 'テスト８', 'test8@gmail.com', '4b1c46f16ecc2e2194a28ae984820fe39ec5c4c6');

-- --------------------------------------------------------

--
-- テーブルの構造 `wishes`
--

CREATE TABLE `wishes` (
                          `id` int(10) NOT NULL,
                          `subject` varchar(255) DEFAULT NULL,
                          `memo` text,
                          `completion` tinyint(1) NOT NULL DEFAULT '0',
                          `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `wishes`
--

INSERT INTO `wishes` (`id`, `subject`, `memo`, `completion`, `user_id`) VALUES
                                                                            (20, 'テスト１', 'ユーザー抽出できているか？', 0, 7),
                                                                            (21, 'テスト２', 'ユーザー毎の抽出ができているか？', 0, 8),
                                                                            (29, '<script> alert(!) </script>', 'XSS 対策OK？', 0, 69),
                                                                            (30, '長いwish長いwish長いwish長い', '長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いwish長い長いwish長いwish長いw', 0, 69),
                                                                            (31, 'テスト４', '４のwish', 0, 10),
                                                                            (32, 'テスト３', '旅行に行こう〜', 0, 9),
                                                                            (33, 'テスト８', 'テストwish', 0, 69);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `wishes`
--
ALTER TABLE `wishes`
    ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- テーブルの AUTO_INCREMENT `wishes`
--
ALTER TABLE `wishes`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
