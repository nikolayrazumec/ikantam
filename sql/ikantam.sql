-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2018 г., 01:47
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

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
(29, '123', '3niko@niko.ru2', '12345678aA', 0),
(30, '07niko', '07niko@niko.ru', '12345678aaA', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_blog`
--

INSERT INTO `user_blog` (`id`, `id_user`, `title`, `text`, `time`, `img`) VALUES
(6, 1, 'title1', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\n\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\n\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 19:26:48', '1.jpg'),
(7, 2, 'title2', 'text2\r\nA FOREIGN KEY is a key used to link two tables together.\r\n\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\n\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 19:27:03', '1.jpg'),
(8, 1, 'title3', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '2.jpg'),
(9, 2, 'title4', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '2.jpg'),
(10, 1, 'title5', 'text1\r\nA FOREIGN KEY is a key used to link two tables together.\r\nA FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.\r\nThe table containing the foreign key is called the child table, and the table containing the candidate key is called the referenced or parent table.', '2018-04-05 21:12:00', '1.jpg'),
(34, 26, 'You can', 'You can directly input a URL into the editor and JSONLint will scrape it for JSON and parse it.\r\nYou can provide JSON to lint in the URL if you link to JSONLint with the "json" parameter. Here''s an example URL to test.\r\nJSONLint can also be used as a JSON compressor if you add ?reformat=compress to the URL.', '2018-04-06 18:29:19', '11.jpg'),
(35, 26, 'asd', 'You can directly input a URL into the editor and JSONLint will scrape it for JSON and parse it.\r\nYou can provide JSON to lint in the URL if you link to JSONLint with the "json" parameter. Here''s an example URL to test.\r\nJSONLint can also be used as a JSON compressor if you add ?reformat=compress to the URL.', '2018-04-06 18:29:58', '35.jpg'),
(40, 1, 'logic123', 'Whilst it is possible to write JavaScript directly inside the HTML event attributes (such as onclick="this.className+='' MyClass''") this is not recommended behaviour. Especially on larger applications, more maintainable code is achieved by separating HTML markup from JavaScript interaction logic.', '2018-04-06 22:02:36', '36.jpg'),
(41, 30, 'your code', 'The above code is all in standard JavaScript, however it is common practise to use either a framework or a library to simplify common tasks, as well as benefit from fixed bugs and edge cases that you might not think of when writing your code.', '2018-04-06 22:05:13', '41.jpg'),
(42, 26, 'your code1', 'Whilst some people consider it overkill to add a ~50 KB framework for simply changing a class, if you are doing any substantial amount of JavaScript work, or anything that might have unusual cross-browser behaviour, it is well worth considering.', '2018-04-06 22:06:30', '42.jpg'),
(43, 30, 'good', 'Another common way to do this is with a correlated subquery. This can be much less efficient, depending on how good your system’s query optimizer is. You might find it clearer, though.Another common way to do this is with a correlated subquery. This can be much less efficient, depending on how good your system’s query optimizer is. You might find it clearer, though.Another common way to do this is with a correlated subquery. This can be much less efficient, depending on how good your system’s query optimizer is. You might find it clearer, though.', '2018-04-06 22:11:45', '43.jpg');

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
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `user_blog`
--
ALTER TABLE `user_blog`
  MODIFY `id` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
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
