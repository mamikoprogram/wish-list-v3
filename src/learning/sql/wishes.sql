-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2022 年 6 月 26 日 15:04
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
-- テーブルの構造 `wishes`
--

CREATE TABLE `wishes` (
                          `id` int(10) NOT NULL,
                          `my_wish` varchar(255) DEFAULT NULL,
                          `memo` varchar(255) DEFAULT NULL,
                          `completion` varchar(12) DEFAULT '0',
                          `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `wishes`
--

INSERT INTO `wishes` (`id`, `my_wish`, `memo`, `completion`, `user_id`) VALUES
                                                                            (9, 'テスト１', 'user_id 確認', '0', 7),
                                                                            (10, 'テスト３', 'user_id　確認', '0', 9),
                                                                            (11, 'テスト５', '長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト長いテキスト', '0', 66);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wishes`
--
ALTER TABLE `wishes`
    ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `wishes`
--
ALTER TABLE `wishes`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;