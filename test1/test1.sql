-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2021 г., 14:43
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `surname`, `name`, `patronymic`, `birthdate`, `gender`) VALUES
(1, 'Иванов', 'Федор', 'Павлович', '1999-03-04', 0),
(2, 'Кузнецов', 'Виктор', 'Михайлович', '1985-02-07', 0),
(3, 'Смирнова', 'Екатерина', 'Анатольевна', '1987-08-21', 1),
(4, 'Зинина', 'Зина', 'Дмитриевна', '1977-02-18', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `previous_jobs`
--

CREATE TABLE `previous_jobs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `job_start` date NOT NULL,
  `job_end` date NOT NULL,
  `organization_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `previous_jobs`
--

INSERT INTO `previous_jobs` (`id`, `employee_id`, `job_start`, `job_end`, `organization_name`) VALUES
(1, 1, '2010-02-15', '2014-03-23', 'Яндекс'),
(2, 1, '2014-05-30', '2018-07-21', 'Гугл'),
(3, 2, '2005-01-20', '2015-05-17', 'Школа №102'),
(4, 2, '2016-07-20', '2021-01-21', 'Tesla Motors');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `previous_jobs`
--
ALTER TABLE `previous_jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `previous_jobs`
--
ALTER TABLE `previous_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
