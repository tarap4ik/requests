-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 17 2018 г., 17:34
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `requests`
--

-- --------------------------------------------------------

--
-- Структура таблицы `request_view`
--

CREATE TABLE `request_view` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `telephone` text NOT NULL,
  `problem` text NOT NULL,
  `pic_name` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request_view`
--

INSERT INTO `request_view` (`id`, `name`, `telephone`, `problem`, `pic_name`, `user_id`) VALUES
(68, 'Заявка1', '8(999) 999-9999', 'йцуйцуйцуфцвфы', '', 1),
(69, 'Заявка на поломку', '8(999) 999-9999', 'Поломка машины', '8KFaUTH9u28.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', '$2y$10$KWWNsLxxFq8RywJHQe5ZLOfV6IGW3w7xNvQ1llnx8YSIOSb5.d3se'),
(2, 'admin', '$2y$10$WXrw2bvu.Ch57qrUpLkwhO4PPB2BMeVqiq43xUzMw2mKV/2EcqOrC'),
(3, 'user2', '$2y$10$zGQ.N94UyyK2ct4LONO7jOhSS2HxWuAdLlqdRYLb9lYx9.uwfljTO');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `request_view`
--
ALTER TABLE `request_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `request_view`
--
ALTER TABLE `request_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `request_view`
--
ALTER TABLE `request_view`
  ADD CONSTRAINT `request_view_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
