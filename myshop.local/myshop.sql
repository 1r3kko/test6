-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 19 2021 г., 20:57
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
-- База данных: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'Телефоны'),
(2, 0, 'Планшеты'),
(3, 1, 'Телефоны Samsung'),
(4, 1, 'Телефоны Apple'),
(5, 2, 'Планшеты Apple'),
(6, 2, 'Планшеты Acer'),
(7, 2, 'Планшеты Samsung'),
(8, 1, 'testNewCat'),
(9, 1, 'testNewCat2'),
(10, 0, 'newGeneralCat');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_payment` datetime DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment` text NOT NULL,
  `user_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_created`, `date_payment`, `date_modification`, `status`, `comment`, `user_ip`) VALUES
(1, 16, '2020-07-30 13:58:24', NULL, '2020-07-30 10:58:24', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(2, 16, '2020-07-30 13:58:26', NULL, '2020-07-30 10:58:26', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(3, 16, '2020-08-01 12:14:00', NULL, '2020-08-01 09:14:00', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(4, 16, '2020-08-01 12:16:12', NULL, '2020-08-01 09:16:12', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(5, 16, '2020-08-01 12:17:50', NULL, '2020-08-01 09:17:50', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(6, 20, '2020-08-01 13:57:35', NULL, '2020-08-07 07:59:13', 0, 'id пользователя:20<br />\r\n		Имя: 2<br />\r\n		Тел: 2<br />\r\n		Адрес:  выаыв', '127.0.0.1'),
(7, 16, '2020-08-06 20:49:47', '2020-08-10 10:10:11', '2020-08-07 08:03:10', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес: {adress}', '127.0.0.1'),
(8, 16, '2020-08-07 13:24:22', NULL, '2020-08-07 10:24:22', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1'),
(9, 16, '2020-08-07 13:25:17', NULL, '2020-08-07 10:25:17', 0, 'id пользователя:16<br />\r\n		Имя: Ввав<br />\r\n		Тел: <br />\r\n		Адрес:  {adress} ', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(1, 3, 'GT-C3560', '                        <p>Закругленные углы и окантовка  вносят стильный штрих в минималистичный дизайн телефона. Металлическая отделка смотрится  элегантно и современно. А благодаря небольшим размерам С3560 удобно лежит в руке и легко помещается в кармане.</p>\n<br />\n\n<p>Спецификации:</p>\n<ul><li>Стандарты сети GSM и EDGE : GSM (850/900/1800/1900)</li><li>Стандарт сети 3G : N/A</li><li>Стандарт сети CDMA : N/A</li><li>TD-SCDMA Band : N/A</li></ul>\n                    ', 3000, '1.png', 1),
(3, 3, 'GT-E2600', '<p>Тонкий и изящный дизайн телефона E2600? широкий экран и пользовательский интерфейс Paragon UX обеспечивают удобство и комфорт в использовании.  Телефон оснащен интуитивно-понятным пользовательским интерфейсом.  </p>\n<br />\n<p>Спецификации:</p>\n<ul><li>850 / 900 / 1800 / 1900 МГц GSM &amp; EDGE Band</li><li>GPRS Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>EDGE Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>фирменная</li><li>Интернет браузерr ( NetFront 4.2)</li><li>JAVA™ SUN CLDC HotSpot Implementation 1.1 (MIDP 2.0) Platform</li><li>SAR 0,45 Вт./кг.</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER</a>', 5000, '3.png', 1),
(2, 3, 'S5570 Galaxy mini', 'Платформа\n850/900/1800/1900 МГц\nДиапазон 900/2100 МГц\nAndroid 2.2 OS\nИнтернет браузер (Android Browser)\nФизические характеристики\nВес трубки 106,6 г.\nРазмеры трубки: 110,4 x 60,6 x 12,1 мм', 7000, '2.png', 1),
(4, 3, 'E2530 La Fleur', '                        <ul><li>850/900/1800/1900 МГц</li><li>GPRS класс 12</li><li>EDGE Class12(только RX)</li><li>Proprietary (MMP) OS</li><li>Интернет браузер</li><li>MIDP 2,1 / CLDC 1.1</li></ul>\n\n<ul><li>Вес трубки 86 г.</li><li>Размеры трубки: 94.4 x 47.2 x 17.4 мм</li></ul>\n\n<ul><li>Стандартная батарея: до 800 мАч</li><li>До 680 мин. в режиме разговора</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER\">\nhttp://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER</a>\n                    ', 6000, '4.png', 1),
(5, 3, 'S3350 Chat 335', '<p>Samsung Ch@t 335 — самый тонкий QWERTY-телефон на современном рынке, чья толщина составляет всего 11,9&nbsp;мм. Обтекаемый корпус с хромированным покрытием придает модели изысканный классический вид. 2,4-дюймовый LQVGA дисплей идеально подходит для просмотра снимков и чтения длинных сообщений.</p>\n<br />\n<p>Благодаря новой, улучшенной QWERTY-клавиатуре набор текста становится еще более быстрым и удобным, как при печати на ПК. Есть возможность настраивать горячие клавиши для часто используемых приложений (например, A для будильника и т.п.).</p>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER</a>', 10000, '5.png', 1),
(6, 3, 'S5380 La Fleur Wave Y', 'Стандарты сети 850/900/1800/1900MHz GSM&EDGE Band\nСтандарты сети: 900/2100МГц 3G\nПоддерживаемые 3G: GPRS Network&Data :850/900/1800/1900 (Slave)\nEDGE Network&Data: стандарты сетей: 850/900/1800/1900 (Master)\nNetwork&Data (3G): HSDPA 7,2Мбит/с.\nBada 2.0\nБраузер Dolfin Browser 3.0\nПлатформа SUN CLDC 1.1\nЗначение SAR: 0,797мВт./г.\n', 12000, '6.png', 1),
(7, 3, 'I9001 Galaxy S Plus', 'Платформа\n850 / 900 / 1800 / 1900 МГц\nGPRS Class12\nEDGE Class12\nИнтернет браузер (Android Browser)\nДисплей\nРазрешение дисплея 480 x 800 WVGA\n<br />\n<br />\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER</a>', 11000, '7.png', 1),
(8, 3, 'I8350 Omnia W', 'Windows Phone 7.5 Mango\nGSM&EDGE 850 / 900 / 1,800 / 1,900 МГц\n3G 900 / 2,100 MГц\nGPRS: Класс 12\nEDGE: Класс 12\nHSDPA 14.4 / HSUPA 5.76 Мбит/с\nInternet Explorer 9\n', 15000, '8.png', 1),
(11, 4, 'iPhone 3GS', 'Широкоформатный дисплей Multi-Touch с диагональю 3,5 дюйма\nРазрешение 480 x 320 пикселей (163 пикселя/дюйм)\nОлеофобное покрытие, препятствующее появлению отпечатков пальцев\nПоддержка одновременного отображения нескольких языков и наборов символов\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/iphone-3gs/specs.html\">http://www.apple.com/ru/iphone/iphone-3gs/specs.html</a>', 20000, '11.PNG', 1),
(12, 4, 'iPhone 4S', '                                                Поддержка международных сетей\nUMTS/HSDPA/HSUPA (850, 900, 1900, 2100 МГц); \nGSM/EDGE (850, 900, 1800, 1900 МГц)\nCDMA EV-DO Rev. A (800, 1900 МГц)3\n802.11b/g/n Wi-Fi (802.11n только 2,4 ГГц)\nБеспроводная технология Bluetooth 4.0\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/specs.html\">http://www.apple.com/ru/iphone/specs.html</a>\n                    \n                    ', 25000, '12.png', 1),
(13, 1, 'sdf', 'dfd\n', 1111, NULL, 0),
(14, 3, 'newProduct1', 'описание newProduct1\n\n\n\n\n\n\n\n', 1111, '14.png', 0),
(15, 3, 'prro', 'описание product2\n', 2000, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `order_id`, `product_id`, `price`, `amount`) VALUES
(1, 4, 1, 3000, 1),
(2, 5, 6, 12000, 1),
(3, 5, 11, 20000, 1),
(4, 5, 12, 25000, 3),
(5, 6, 7, 11000, 1),
(6, 7, 11, 20000, 1),
(7, 8, 12, 25000, 1),
(8, 9, 7, 11000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adress` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `name`, `phone`, `adress`) VALUES
(1, '', 'efe6398127928f1b2e9ef3207fb82663', '', '', '{adress}'),
(2, 'qwe', 'qwe', 'qwe', '232', 'qwe'),
(3, 'myemail@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', '{adress}'),
(4, 'wer', 'e130e5e618f15cee7a519d8b7b8306a0', '', '', '{adress}'),
(5, 'ee', '08a4415e9d594ff960030b921d42b91e', '', '', '{adress}'),
(6, 'eee', '3847820138564525205299f1f444c5ec', '', '', '{adress}'),
(7, 'wwww', 'f1290186a5d0b1ceab27f4e77c0c5d68', '', '', '{adress}'),
(8, 'wwwww', '7694f4a66316e53c8cdd9d9954bd611d', '', '', '{adress}'),
(9, 'wwwwww', 'c81e728d9d4c2f636f067f89cc14862c', '', '', '{adress}'),
(10, 'wwwwwwq', 'f1290186a5d0b1ceab27f4e77c0c5d68', '', '', '{adress}'),
(11, 'wwwwwwq2', 'e0323a9039add2978bf5b49550572c7c', '', '', '{adress}'),
(12, 'wwwwwwq22', '182be0c5cdcd5072bb1864cdee4d3d6e', '', '', '{adress}'),
(13, 'wwwwwwwww', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '{adress}'),
(14, 'ww1', 'c81e728d9d4c2f636f067f89cc14862c', '', '', '{adress}'),
(15, '22', '934b535800b1cba8f96a5d72f72f1611', '', '', '{adress}'),
(16, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Ввав', '', '{adress}'),
(17, '32', 'b6d767d2f8ed5d21a44b0e5886680cb9', '', '', '{adress}'),
(18, '2', 'c81e728d9d4c2f636f067f89cc14862c', '2222222', '222222', ' авав'),
(19, '222', 'c81e728d9d4c2f636f067f89cc14862c', '2', '2', ' авы'),
(20, '12321', '202cb962ac59075b964b07152d234b70', '2', '2', ' выаыв');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
