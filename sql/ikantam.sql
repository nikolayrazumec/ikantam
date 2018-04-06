-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2018 г., 03:04
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ikantam`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) unsigned NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'niko', 'niko@niko.ru', '12345678aA', 1),
(2, 'sacha', 'sacha@sacha.ru', '12345678aA', 0),
(3, 'viktor', 'viktor@viktor.ru', '12345678aA', 0),
(4, 'modest', 'modest@modest.ru', '12345678aA', 0),
(5, 'serg', 'serg@serg.ru', '12345678aA', 0),
(11, 'name', '1niko@niko.ru', '12345678aA', 0),
(13, 'name', '2niko@niko.ru', '12345678aA', 0),
(26, 'name', '3niko@niko.ru', '12345678aA', 0),
(27, 'ivan', 'ivan@niko.ru', '12345678aA', 0),
(28, 'ivan', 'ivan1@niko.ru', '12345678aA', 0),
(29, '123', '3niko@niko.ru2', '12345678aA', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_blog`
--

CREATE TABLE IF NOT EXISTS `user_blog` (
  `id` int(6) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `time` timestamp NULL DEFAULT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_blog`
--

INSERT INTO `user_blog` (`id`, `id_user`, `title`, `text`, `time`, `img`) VALUES
(6, 1, 'title1', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\n\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\n\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 19:26:48', '1.jpg'),
(7, 2, 'title2', 'text2\r\nA FOREIGN KEY is a key used to link two tables together.\r\n\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\n\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 19:27:03', '1.jpg'),
(8, 1, 'title3', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '2.jpg'),
(9, 2, 'title4', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '2.jpg'),
(10, 1, 'title5', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '1.jpg'),
(11, 3, 'title6', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_comments`
--

CREATE TABLE IF NOT EXISTS `user_comments` (
  `id` int(6) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `email_pass` (`email`,`password`);

--
-- Индексы таблицы `user_blog`
--
ALTER TABLE `user_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_blog`
--
ALTER TABLE `user_blog`
  ADD CONSTRAINT `user_blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
