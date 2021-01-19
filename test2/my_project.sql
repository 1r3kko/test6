-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 19 2021 г., 20:58
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `name`, `text`, `created_at`) VALUES
(1, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-10 13:43:34'),
(2, 1, 'Пост о жизни', 'Сидел я тут на кухне с друганом и тут он задал такой вопрос...', '2020-08-10 13:43:34'),
(3, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-14 15:22:56'),
(4, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-14 15:29:27'),
(5, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 12:54:45'),
(6, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 12:54:50'),
(7, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 12:59:17'),
(8, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 13:07:45'),
(9, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 13:08:36'),
(12, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:31:42'),
(13, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:33:02'),
(14, 1, 'Статья х2', 'Стааатья х2', '2020-08-15 14:33:36'),
(15, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:34:16'),
(16, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:46:24'),
(17, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:48:59'),
(18, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 14:52:36'),
(19, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:02:06'),
(20, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:04:39'),
(21, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:05:59'),
(22, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:06:11'),
(23, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:06:13'),
(24, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:07:51'),
(25, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:10:59'),
(26, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:14:28'),
(27, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:18:01'),
(30, 1, 'Новое название статьи', 'Новый текст статьи', '2020-08-15 15:24:05'),
(35, 123, 'Статья, добавленная через форму', 'Вот это даа', '2020-08-20 19:07:43'),
(36, 124, 'Markdown', 'Wow!\r\n## It works\r\n### Really?\r\n> Yes\r\n```\r\ncode\r\n```', '2020-09-01 18:49:25');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `article_id`, `text`, `created_at`) VALUES
(1, 123, 1, 'Всем привет! :)', '2020-08-21 09:55:00'),
(2, 123, 1, 'Всем привет! :)', '2020-08-21 09:55:52'),
(3, 123, 1, 'Всем привет! :))', '2020-08-21 09:56:05'),
(4, 123, 1, 'Здарова ', '2020-08-21 11:02:49'),
(5, 123, 1, 'вв', '2020-08-21 11:04:13'),
(6, 123, 1, 'Ку', '2020-08-21 11:04:58'),
(7, 123, 1, 'ee', '2020-08-21 11:08:29'),
(8, 123, 1, 'Последний', '2020-08-21 11:12:44'),
(9, 123, 1, 'ррр', '2020-08-21 13:00:42'),
(10, 123, 1, 'вуву', '2020-08-21 13:01:29'),
(11, 123, 1, 'как', '2020-08-21 13:01:43'),
(12, 123, 1, 'dee', '2020-08-21 13:35:20'),
(13, 123, 1, '3e3e', '2020-08-21 13:36:01'),
(14, 123, 1, 'eeww', '2020-08-21 13:36:21'),
(15, 123, 1, 'qwewqqw', '2020-08-21 13:40:05'),
(16, 123, 1, 'cdscd', '2020-08-21 13:40:37'),
(17, 123, 1, 'frfrjbjbjjwwf', '2020-08-21 13:43:17'),
(18, 101, 1, 'Здарова now ))9)9)ss', '2020-08-21 15:00:56'),
(19, 123, 1, 'www', '2020-08-21 15:19:42'),
(20, 123, 1, 'eww', '2020-08-21 15:22:28'),
(21, 123, 1, 'qw', '2020-08-21 15:22:34'),
(22, 123, 1, 'ewew', '2020-08-21 15:23:21'),
(23, 123, 1, '11', '2021-01-14 11:30:36'),
(24, 123, 1, '11', '2021-01-14 11:30:45'),
(25, 123, 1, '11', '2021-01-14 11:31:02'),
(26, 123, 1, 'dd', '2021-01-14 11:36:15'),
(27, 123, 1, 'ee', '2021-01-14 11:36:23'),
(28, 123, 1, '11', '2021-01-14 11:39:02');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `role` enum('admin','user') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `is_confirmed`, `role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', 1, 'admin', 'hash1', 'token1', '2020-08-10 13:41:18'),
(2, 'user', 'user@gmail.com', 1, 'user', 'hash2', 'token2', '2020-08-10 13:41:19'),
(100, 'new', 'new@gmail.com', 1, 'user', '$2y$10$4PsKfEYjYGMvqwUlxiFr0.ys9M7px1f.1LPGheQbvUv9YQOUqGSDC', '7d0a75b7fd900fd459d00c4a55a09b6e750ab202b39a611779fb7517f902b65fe32ca69c98b9136f', '2020-08-19 11:30:01'),
(101, 'new2', 'new2@gmail.com', 1, 'user', '$2y$10$AS6ExfmWg6e2pNHFOg5oJ.eLU9/axDjpHIbEzzGsBuNy9N3QeL1CS', '7803e19d2d88468bd0f5f0d667f26139dcfdd37dbb4c56964da733c0a9f115270029f59bbda9c0de', '2020-08-19 12:04:52'),
(102, 'df22dfd', 'sdf22wds@gmail.com', 1, 'user', '$2y$10$pkKHJfUiTqe9LhUdh/0Z9.bZF6HbDi0wYYg1RUpcNxBvx.peVwTaC', '22b54c5d85bbda8db195a49a9129073f40de1479fb227e7b6f1b93e47da6c6227c99d199d4a37c36', '2020-08-19 15:26:54'),
(103, 'df22dfdw', 'sdf22wwds@gmail.com', 0, 'user', '$2y$10$JnHs.PbQoq4h1BYdBb9vfe.hsRCV7w430sGzkR1ANZ1mbJJAKKNv2', '84b374d53a2a7e26dc888cb58260f66ad18d79f5ea64184949ae23bc1947f429ee4515eeff59cc90', '2020-08-19 15:54:45'),
(104, 'new15', 'new15@gmail.com', 1, 'user', '$2y$10$iDPOt4Fl1kfs/O5EfMzKHO2xchtmWCqXMvQG15KvfvXRlvHqUFnE6', 'e3d69da61e28fcde7017a95fe7090874d2c8be376f0cdfcef40c3a9c4c75b02667d16622b02048e8', '2020-08-19 15:55:20'),
(105, 'df22dfdwww', 'sdf22wdsaa@gmail.com', 0, 'user', '$2y$10$znYjFRaZYNWJ9gUr7EF27.G4y7SXwDbVFmkUQkNWq4nN5rYrrlWiq', 'cf9fcae51b3a582e09ba67ab75e969a6cfb050b911f1fa78f7e8c2094b23e9dc64379d4cfeeeda94', '2020-08-19 16:17:41'),
(106, 'nnew', 'sdf22wdwwsaa@gmail.com', 0, 'user', '$2y$10$AHx3GxWPFSY0s2QgtIS50OPgMdQSMNZxJ2ykpz2i3DQjoqcxIK/3C', '9f83ca55bf8244cd7219162dca4dfd47542f425b7eab39b50d8d684f34883733767cc4fd1e1ad57b', '2020-08-19 16:18:02'),
(107, 'nnewww', 'sdf2w2wdwwsaa@gmail.com', 1, 'user', '$2y$10$J6SZUoJci9zC/9isfcyl0.mQ/MWsBQiXUWD5GKjAOrGloYfRg/RT.', '282a1115d1900b523787fb9974063510dedc5feca6bbd12130fe8b67c1ba07729c71466ca70776f9', '2020-08-19 16:20:08'),
(108, 'Old', 'sdf22wwdwwsaa@gmail.com', 1, 'user', '$2y$10$aWPQZOSH7G7cR/oJjzUUReoJ/OsP99QYnfrodNpfLm7xap0vJ0Afi', 'd15e2700c9a240372c25c333184f66b9f7f38891d73d8af2e0cf39f2f503824f4ea40cbab10cc8cc', '2020-08-19 16:30:52'),
(109, 'Oldee', 'sdf2e2wwdwwsaa@gmail.com', 1, 'user', '$2y$10$NR718afglUjqsZFbrNvUgOOPm0liT73MnPkgfqd1jpAu6iqKqrfXC', '4284ed9464d1ac98b1135583c1f89486fb614ce2ea219018ac4d8ef05a180edf0b638e22905fb23f', '2020-08-19 18:13:21'),
(110, 'Oww', 'sdf22wwwds@gmail.com', 0, 'user', '$2y$10$VifGjMDUvgelB16UR/IVWOGf6upnJ/J1OXU5QLmUknEcCoXfI5tEm', '9c45fe199cc5d37152f07bade23c13546174e22383fb8478e1753a2244c2beb78b89f21c76928ccf', '2020-08-19 19:23:28'),
(111, 'wwww', 'sdf2w2wds@gmail.com', 0, 'user', '$2y$10$Tux53f9yPUNZP3jge2RK8OdVijgIdO3HAeSTVCT3RowXGnQPbTyJq', 'a2c1e14d9a84a5ef3bfc5ae1756cf2d8e7fc74b320c744ab315153a55144d130d537bf3501a7d081', '2020-08-19 19:24:08'),
(112, 'wwwww', 'sdf2q2wds@gmail.com', 0, 'user', '$2y$10$JwpPDE8JDA9wZSjq7pkO5OqoK5iiVd3.U.wGU3DJXORpD4RvHWCTe', '999f648bd7c52aa2254769b08d7f6341f6bfc8ab52143d800e1b0acb586e8f0abb707a2b1f744e96', '2020-08-19 19:25:51'),
(113, 'wwwwww', 'sdqf2q2wds@gmail.com', 0, 'user', '$2y$10$rZgGts0DDX29NwXStXehpecYDKZnXxRlG8LpxsApo7jSKtN0Ew7Dq', 'd735eb4fc0fa99c0ff6ba8d258b125018ca221479899c292e9bc26451d31a0853aa16441fe98da92', '2020-08-19 19:28:46'),
(114, 'wwwwwwq', 'sdqf2wq2wds@gmail.com', 0, 'user', '$2y$10$u4zYunBIW/OTrydOW5tFFeJiGx9ZLEkxSsp2N.lSolb258Pwi6DXa', 'ca7e9687ed856804892c207f92b60655ee57db875b2e07606e90b1be94bc4d467247365e97e6acdc', '2020-08-19 19:29:05'),
(115, 'wwwswwwq', 'sddqf2wq2wds@gmail.com', 0, 'user', '$2y$10$sI2xY54k3XdgtIG9.E3Wv.SFxJPbm2OVfSbkDFiv6tUzc1DVoJX2i', 'be7e32e54c97ae462ad64bd59ec113e04cea084ae065b4a2bed542486e327e0c3ee6627f5c2fb405', '2020-08-19 19:31:57'),
(116, 'wwwswwwwq', 'sddqqf2wq2wds@gmail.com', 0, 'user', '$2y$10$9JBLn0qSaOg9Plrdw9xeO.HlPwa24TZZ0c6kbr1F7kcz/.IKqS2eK', '0abf10eedb482cedc1cda553298d4a76b9900790c8e34da8e84ac1cfd5cb8c1f1da6aa4c93db2de6', '2020-08-19 19:35:13'),
(117, 'www2swwwwq', 'sddq1qf2wq2wds@gmail.com', 0, 'user', '$2y$10$ucRkAPuy7/1Db5535wpr/e.rHA5oV4zfbrHZJtFttWkld1aBTYtwi', '47301969914e2872fd78543a0ba3681383c5b5ab24bdc52f2ebba642d96f22ceade34fdd7cb2be8d', '2020-08-19 19:35:34'),
(118, 'wwwq2swwwwq', 'sddq1qqf2wq2wds@gmail.com', 0, 'user', '$2y$10$2rZYGVimj57JvLw6.Mg1E.cxZqTluB3dRCV0rt18sCBUaBHk73V6e', 'e1982c62a68aec913f7ce0d71a40d050ad022eadbe3be59bd3dbff50392e9a002a1fd07086c302e8', '2020-08-19 19:38:19'),
(119, 'wwwq2sw1wwwq', 'sddq1qq1f2wq2wds@gmail.com', 1, 'user', '$2y$10$pqv1sZd8grtp6Emk3Sc9iOX5IDsk4JMhj5KQAzaMr1DDWCtXxfZTq', '046568f0dd318edb84e56cd1c2d9b4f19192ace4e83627740dad3f982d9a35892d9a103d6d19ffe9', '2020-08-19 19:41:42'),
(120, 'wwqwq2sw1wwwq', 'sddq1qqq1f2wq2wds@gmail.com', 1, 'user', '$2y$10$2ub0M7ZGoRDp6tCsFilbge1uMpX2rMpq8BvoOiG3/NfbmKuyfkIRa', 'a459cef928a07478c7b58a9f177011e9d36490e2c91df1bef28ad2db6b5d436ed13110a360f8d2fa', '2020-08-19 19:44:33'),
(121, 'wwwq2qswwwwq', 'sddq1qqqf2wq2wds@gmail.com', 1, 'user', '$2y$10$L/yj6FrpUiqRTW6kvohx.OajVGIiqE/Kb64q4UZHowcGtP3YuMZqC', '8be03b0bc349f9c1ffed2880da788633dc374877c526a0764ff3c42bf18a2a01d0ab565a11e0ca41', '2020-08-19 19:45:26'),
(122, 'wwwq2swwqwwq', 'sddq1qqwf2wq2wds@gmail.com', 1, 'user', '$2y$10$roRCVc/pEyc95ZQ20lOHcOzClx7a4JBZwS2khJZbN7B4RcYkeVwOq', '6f0ea4e0dfbb02696092fd5354b923b587c1166013736c020dc5e70c69a310c162ad01ff00c6abe2', '2020-08-19 19:46:13'),
(123, 'now', 'now@gmail.com', 1, 'user', '$2y$10$CKM/OePuvmOmLjS3oJVq0.NkMqEJMSaaWRSzL/b5ztNB5YCWzykiy', 'ef9eec170632ccccb22aed8f16fc66f6ccc0877c677962f499db460241c82c1db46b1c1b4dd21634', '2020-08-20 10:18:01'),
(124, 'admin2', 'admin2@gmail.com', 1, 'admin', '$2y$10$X3I7OMtI69a584vIHn1eNexwG3KgKrfmWlZhJSPLHPHfyOzELsADO', '55883f75856fb755a7bc0bcbb46494b265acc98be4297bf7cabd66ad47e3c13b2eeadfd72c3d1c99', '2020-08-21 14:56:14');

-- --------------------------------------------------------

--
-- Структура таблицы `users_activation_codes`
--

CREATE TABLE `users_activation_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_activation_codes`
--

INSERT INTO `users_activation_codes` (`id`, `user_id`, `code`) VALUES
(97, 100, 'cce42d6d9996e6df516c9840301febda'),
(98, 101, '9efec6d496975d3a6c802140eb3c612d'),
(99, 102, '9e3236c59b40bed4d6f6a4805ab05877'),
(100, 104, '180eee2e1290c0a639cadb4d91693132'),
(101, 106, 'b53a28e62a05fe943111c28991245284'),
(102, 107, '87b06e183dbc0a257a96b9d3d5905241'),
(103, 108, 'f0d70d2f5fa427a16c17acf480484bd8'),
(104, 109, '4d5ddd34715ba67ca284abc9bcbb96e9'),
(105, 110, '8838bbc36fa707c0dd08c6b2bdb4569d'),
(106, 111, '90757e436a1135405e47375beafd7a9e'),
(107, 112, '5f46a18be3980d87318d4404703a0604'),
(108, 113, 'e2c523a24604f41a6938880d17a6d4ba'),
(109, 114, '3f574a30ac12e7d74acb5cc5ca2c6730'),
(110, 115, '22b74bea0f47e549fe28ab7516c6ecaf'),
(111, 116, '92d0681e8d184afa6e4a5d75bef70174'),
(112, 117, 'e163539940f7787d4071df9757233916'),
(113, 118, 'd86f3eb97ae8115fe620d52788f78191'),
(114, 119, 'd7e67bd42d02d6a9327df2a7c5f131c4'),
(115, 120, 'b73a3f80fc24696c6a7915f3deafc569');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT для таблицы `users_activation_codes`
--
ALTER TABLE `users_activation_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
