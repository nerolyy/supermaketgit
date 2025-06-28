-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 28 2025 г., 03:37
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `supermarket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Красная рыба'),
(2, 'Белая рыба'),
(3, 'Консервная рыба'),
(4, 'Овощи'),
(5, 'Грибы'),
(6, 'Диабетическая продукция'),
(7, 'Спортивное питание'),
(8, 'Суперфуд'),
(9, 'Аптека'),
(10, 'Бумажная и ватная продукция'),
(11, 'Косметические наборы'),
(12, 'Шашлык'),
(13, 'Мясо птицы'),
(14, 'Говядина'),
(15, 'Чипсы'),
(16, 'Снэки'),
(17, 'Попкорн'),
(18, 'Готовая еда с курицей'),
(19, 'Готовая еда с говядиной'),
(20, 'Готовая еда с рыбой'),
(21, 'Фрукты'),
(22, 'Шоколад'),
(23, 'Конфеты'),
(24, 'Сладости');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `message`, `submitted_at`) VALUES
(1, '1233123131@yandex.ru', '123', '2025-06-27 05:16:04');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`, `address`, `phone`, `comments`) VALUES
(8, 19, '2025-06-24 06:35:53', 'доставлен', 'Мантулинская улица, 9к3', '79017407741', 'Побыстрей пожалуйста'),
(12, 19, '2025-06-26 00:00:00', 'Новый', 'Пушкина д9', '79645133333', ')'),
(13, 10, '2025-06-26 00:00:00', 'Новый', 'ццц', '89037539985', 'ф');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `quantity`) VALUES
(22, 8, 'Чипсы сырные Lay\'s', 140.00, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `name`, `weight`, `original_price`, `discount_price`, `discount_percent`, `image`, `expiration_date`) VALUES
(12, 1, 1, 'Лосось', '1', 980.00, 980.00, 0, 'img/foodcatalog/losos.jpg', '2025-12-31'),
(13, 1, 1, 'Форель', '1', 890.00, 890.00, 0, 'img/foodcatalog/forel.jpg', '2025-12-31'),
(14, 2, 1, 'Треска', '1 кг', 560.00, 560.00, 0, 'img/foodcatalog/treska.jpg', '2025-12-31'),
(15, 2, 1, 'Пикша', '1 кг', 470.00, 470.00, 0, 'img/foodcatalog/piksha.jpg', '2025-12-31'),
(16, 3, 1, 'Тунец в масле', '1 банка', 120.00, 120.00, 0, 'img/foodcatalog/tunec.jpg', '2026-06-01'),
(17, 3, 1, 'Сардины', '1 банка', 85.00, 85.00, 0, 'img/foodcatalog/sardina.jpg', '2026-06-01'),
(18, 21, 2, 'Яблоки', '1', 180.00, 180.00, 0, 'img/foodcatalog/apple.jpg', '2025-12-31'),
(19, 21, 1, 'Бананы', '1 кг', 130.00, 130.00, 0, 'img/foodcatalog/banana.jpg', '2025-12-31'),
(20, 4, 1, 'Помидоры', '1 кг', 220.00, 220.00, 0, 'img/foodcatalog/tomato.jpg', '2025-12-31'),
(21, 4, 3, 'Огурцы', '1 кг', 135.00, 135.00, 0, 'img/foodcatalog/cucumber.jpg', '2025-12-31'),
(22, 5, 1, 'Шампиньоны', '1 кг', 200.00, 200.00, 0, 'img/foodcatalog/mushrooms.jpg', '2025-12-31'),
(23, 5, 2, 'Белые грибы', '1 кг', 380.00, 380.00, 0, 'img/foodcatalog/white mushrooms.jpg', '2025-12-31'),
(24, 22, 3, 'Молочный шоколад', '1 шт', 150.00, 150.00, 0, 'img/foodcatalog/milkchocolate.jpg', '2026-06-30'),
(25, 22, 3, 'Тёмный шоколад', '1 шт', 180.00, 180.00, 0, 'img/foodcatalog/darkchocolate.jpg', '2026-06-30'),
(26, 23, 3, 'Ириски', '1 шт', 120.00, 120.00, 0, 'img/foodcatalog/iris.jpg', '2026-06-30'),
(27, 23, 3, 'Чупа-Чупс', '1 шт', 110.00, 110.00, 0, 'img/foodcatalog/chupachups.jpg', '2026-06-30'),
(28, 24, 3, 'Печенье', '1 шт', 80.00, 80.00, 0, 'img/foodcatalog/cookies.jpg', '2026-06-30'),
(29, 24, 3, 'Маффин', '1 шт', 130.00, 130.00, 0, 'img/foodcatalog/maffin.jpg', '2026-06-30'),
(42, 7, 2, 'Батончик протеиновый', '1 шт', 120.00, 120.00, 0, 'img/foodcatalog/proteinbar.jpg', '2026-12-31'),
(43, 7, 2, 'Мороженое протеиновое', '1 шт', 110.00, 110.00, 0, 'img/foodcatalog/proteinice.jpg', '2026-12-31'),
(44, 8, 1, 'Масло тыквенное', '1 уп.', 2400.00, 2400.00, 0, 'img/foodcatalog/oiltikva.jpg', '2027-06-30'),
(45, 8, 1, 'Семена конопли', '1 уп.', 250.00, 250.00, 0, 'img/foodcatalog/semenakonopli.jpg', '2027-06-30'),
(74, 9, 1, 'Витамин Д3', '1шт', 1500.00, 1500.00, 0, 'img/foodcatalog/vitamins.jpg', '2026-12-31'),
(75, 9, 1, 'Аскорбиновая кислота', '1шт', 180.00, 180.00, 0, 'img/foodcatalog/ascorbin.jpg', '2026-12-31'),
(76, 10, 1, 'Салфетки влажные', '1шт', 120.00, 120.00, 0, 'img/foodcatalog/vlajnie.jpg', '2026-12-31'),
(77, 10, 1, 'Салфетки бумажные', '1шт', 110.00, 110.00, 0, 'img/foodcatalog/salfekipaper.jpg', '2026-12-31'),
(78, 11, 1, 'Набор для бровей', '1шт', 2000.00, 2000.00, 0, 'img/foodcatalog/tush.jpg', '2026-12-31'),
(79, 11, 1, 'Набор подарочный', '1шт', 1500.00, 1500.00, 0, 'img/foodcatalog/nabor.jpg', '2026-12-31'),
(80, 6, 1, 'Гранола (Мюсли)', '1 шт', 150.00, 150.00, 0, 'img/foodcatalog/granola.jpg', '2026-12-31'),
(81, 6, 1, 'Цикорий', '1 шт', 180.00, 180.00, 0, 'img/foodcatalog/cikoriy.jpg', '2026-12-31'),
(82, 12, 1, 'Шашлык куриный в маринаде', '1 кг', 980.00, 980.00, 0, 'img/foodcatalog/kebabchicken.jpg', '2026-12-31'),
(83, 12, 1, 'Шашлык по-московски', '1 кг', 890.00, 890.00, 0, 'img/foodcatalog/kebabcow.jpg', '2026-12-31'),
(84, 13, 1, 'Филе грудки', '1 кг', 560.00, 560.00, 0, 'img/foodcatalog/chicken.jpg', '2026-12-31'),
(85, 13, 1, 'Стейк из грудки', '1 кг', 570.00, 570.00, 0, 'img/foodcatalog/chicken1.jpg', '2026-12-31'),
(86, 14, 1, 'Стейк Рибай', '1 кг', 1200.00, 1200.00, 0, 'img/foodcatalog/stakeribai.jpg', '2026-12-31'),
(87, 14, 1, 'Стейк Топ Блейд', '1 кг', 1350.00, 1350.00, 0, 'img/foodcatalog/steikdenver.jpg', '2026-12-31'),
(88, 15, 3, 'Чипсы сырные Lay\'s', '1 шт', 140.00, 140.00, 0, 'img/foodcatalog/chips.jpg', '2026-12-31'),
(89, 15, 3, 'Чипсы Lay\'s MAXX \'Грибы в сливочном соусе\'', '1 шт', 150.00, 150.00, 0, 'img/foodcatalog/chips1.jpg', '2026-12-31'),
(90, 16, 3, 'Сладкая кукуруза Кузя', '1 шт', 70.00, 70.00, 0, 'img/foodcatalog/kuzya.jpg', '2026-12-31'),
(91, 16, 3, 'Гренки с бужениной', '1 шт', 75.00, 75.00, 0, 'img/foodcatalog/grenki.jpg', '2026-12-31'),
(92, 17, 2, 'Попкорн Holy Corn морская соль', '1 шт', 100.00, 100.00, 0, 'img/foodcatalog/popcornsalt.jpg', '2026-12-31'),
(93, 17, 2, 'Попкорн Holy Corn нежный сыр', '1 шт', 100.00, 100.00, 0, 'img/foodcatalog/popcorncheese.jpg', '2026-12-31'),
(94, 18, 1, 'Сэндвич с курицей', '1 шт', 150.00, 150.00, 0, 'img/foodcatalog/sandwich.jpg', '2026-12-31'),
(95, 18, 1, 'Салат цезарь', '1 шт', 270.00, 270.00, 0, 'img/foodcatalog/cesar.jpg', '2026-12-31'),
(96, 19, 1, 'Гамбургер', '1 шт', 120.00, 120.00, 0, 'img/foodcatalog/gamburger.jpg', '2026-12-31'),
(97, 19, 1, 'Шаурма с говядиной', '0', 230.00, 230.00, 0, 'img/foodcatalog/shaurma.jpg', '2026-12-31'),
(98, 20, 1, 'Суши калифорния (8шт)', '1 шт', 300.00, 300.00, 0, 'img/foodcatalog/sushi.jpg', '2026-12-31'),
(99, 20, 1, 'Сэндвич с тунцом', '1 шт', 170.00, 170.00, 0, 'img/foodcatalog/sandwichtunec.jpg', '2026-12-31'),
(100, 22, 3, 'Шоколадный батончик Mars Max', '81г', 119.00, 107.00, 10, 'discounts/mars.jpg', '2025-12-01'),
(101, 24, 2, 'Бисквит Медвежонок Барни, с молочной начинкой', '150 г', 239.00, 173.00, 36, 'discounts/barni.jpg', '2025-10-15'),
(102, 4, 3, 'Авокадо Хасс спелое,2шт', '2шт', 249.00, 199.00, 20, 'discounts/avocado.jpg', '2025-06-25'),
(103, 8, 1, 'Масло оливковое Filippo Berio Extra Virgin', '500мл', 1149.00, 799.00, 30, 'discounts/oil.jpg', '2026-01-20'),
(104, 24, 2, 'Торт Mirel Карамельный на сгущёнке', '700г', 619.00, 519.00, 17, 'discounts/cake.jpg', '2025-06-29'),
(105, 21, 1, 'Абрикосы', '500г', 369.00, 299.00, 18, 'discounts/abrikos.jpg', '2025-06-28'),
(106, 15, 2, 'Чипсы Lay\'s Рифленые Сметана-Лук', '225г', 299.00, 239.00, 20, 'discounts/chips.jpg', '2025-09-05'),
(107, 18, 3, 'Котлета куриная с картофельным пюре', '260г', 229.00, 199.00, 13, 'discounts/readyeat.jpg', '2025-06-23'),
(108, 16, 1, 'Сухиничи Мираторг из куриного филе сушеные', '40г', 184.00, 119.00, 35, 'discounts/suxinichi.jpg', '2025-07-15'),
(109, 11, 2, 'Тушь Vivienne Sabo Cabaret со сценическим эффектом для ресниц тон 01', '9мл', 589.00, 399.00, 32, 'discounts/womanmoment.jpg', '2027-01-01'),
(110, 3, 3, 'Филе Thai Blue тунца желтоперого в собственном соку', '160г', 239.00, 194.00, 18, 'discounts/tunec.jpg', '2025-07-20'),
(111, 11, 2, 'Крем Missha М Perfect Cover BB EX SPF42 тон 23', '20мл', 1799.00, 1339.00, 25, 'discounts/womanmoment1.jpg', '2026-05-01'),
(112, 4, 1, 'Томаты Рост Фламенко красные сливовидные', '2', 279.00, 209.00, 25, 'img/saletomato.webp', '2025-06-24'),
(113, 4, 1, 'Картофель ранний Египет', '1кг', 99.00, 84.99, 15, 'img/potatosale.webp', '2025-06-30'),
(114, 4, 3, 'Капуста брокколи', 'кг', 359.00, 299.00, 16, 'discounts/broccoli.jpg', '2025-06-23');

-- --------------------------------------------------------

--
-- Структура таблицы `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `email`) VALUES
(1, 'ООО \"Moscow-Vladivostok', '+79070000001', '9MM@viperr.com'),
(2, 'ООО \"WW\"', '+79070000011', 'WW@gmail.com'),
(3, 'ООО \"LL\"', '+79070000003', 'LL@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `pass`, `address`, `role`) VALUES
(10, '9', 'майсик', '79057563333', '9mm@yandex.ru', '123', '', 'user'),
(11, '123', '123', '123', '123@gmail.com', '123', '', 'user'),
(13, '12345', '12345', '12345', '12345@gmail.com', '123', '123', 'user'),
(14, '12', '12', '12', '12@yandex.ru', '12', '12', 'user'),
(16, '12', '12', '12', '1233123131@yandex.ru', '12', '12', 'user'),
(17, 'Кристина', 'Юсс', '+7 901 740 7741', '11112213@yandex.ru', '123', 'Карамышевская набержная дом 14', 'user'),
(19, 'Кристина', 'Юсс', '79017407741', 'isip_k.d.uss@mpt.ru', '123', 'Мантулинская улица, 9к3', 'admin'),
(21, 'ss', 'ss', '89637779168', 'sss@gmail.com', '$2y$10$LlKPsPnMmK2FFoIBG5fUseCpbECp0B3Qo/3DQeMDiG6US6CPRGYFC', 'Пресненская набержная', 'user'),
(23, 'ыыы', 'ыыы', '89037539985', 'aaa@mail.ru', '', 'ццц', 'user');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_all_categories`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_all_categories` (
`id` int(11)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_all_orders`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_all_orders` (
`id` int(11)
,`user_id` int(11)
,`order_date` datetime
,`status` varchar(50)
,`address` text
,`phone` varchar(20)
,`comments` text
,`first_name` varchar(50)
,`last_name` varchar(50)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_all_products`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_all_products` (
`id` int(11)
,`category_id` int(11)
,`supplier_id` int(11)
,`name` varchar(255)
,`weight` varchar(50)
,`original_price` decimal(10,2)
,`discount_price` decimal(10,2)
,`discount_percent` int(11)
,`image` varchar(255)
,`expiration_date` date
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_all_suppliers`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_all_suppliers` (
`id` int(11)
,`name` varchar(100)
,`phone` varchar(20)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_all_users`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_all_users` (
`id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`phone` varchar(20)
,`email` varchar(100)
,`address` varchar(200)
,`role` enum('user','admin')
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_orders_by_user`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_orders_by_user` (
`id` int(11)
,`user_id` int(11)
,`order_date` datetime
,`status` varchar(50)
,`address` text
,`phone` varchar(20)
,`comments` text
,`first_name` varchar(50)
,`last_name` varchar(50)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_orders_in_period`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_orders_in_period` (
`id` int(11)
,`user_id` int(11)
,`order_date` datetime
,`status` varchar(50)
,`address` text
,`phone` varchar(20)
,`comments` text
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_products_expiring_7_days`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_products_expiring_7_days` (
`id` int(11)
,`category_id` int(11)
,`supplier_id` int(11)
,`name` varchar(255)
,`weight` varchar(50)
,`original_price` decimal(10,2)
,`discount_price` decimal(10,2)
,`discount_percent` int(11)
,`image` varchar(255)
,`expiration_date` date
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_products_with_category`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_products_with_category` (
`id` int(11)
,`category_id` int(11)
,`supplier_id` int(11)
,`name` varchar(255)
,`weight` varchar(50)
,`original_price` decimal(10,2)
,`discount_price` decimal(10,2)
,`discount_percent` int(11)
,`image` varchar(255)
,`expiration_date` date
,`category_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_suppliers_with_expiring_products_3_days`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_suppliers_with_expiring_products_3_days` (
`id` int(11)
,`name` varchar(100)
,`phone` varchar(20)
,`email` varchar(100)
);

-- --------------------------------------------------------

--
-- Структура для представления `view_all_categories`
--
DROP TABLE IF EXISTS `view_all_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_categories`  AS SELECT `categories`.`id` AS `id`, `categories`.`name` AS `name` FROM `categories` ;

-- --------------------------------------------------------

--
-- Структура для представления `view_all_orders`
--
DROP TABLE IF EXISTS `view_all_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_orders`  AS SELECT `o`.`id` AS `id`, `o`.`user_id` AS `user_id`, `o`.`order_date` AS `order_date`, `o`.`status` AS `status`, `o`.`address` AS `address`, `o`.`phone` AS `phone`, `o`.`comments` AS `comments`, `u`.`first_name` AS `first_name`, `u`.`last_name` AS `last_name`, `u`.`email` AS `email` FROM (`orders` `o` join `users` `u` on(`o`.`user_id` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Структура для представления `view_all_products`
--
DROP TABLE IF EXISTS `view_all_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_products`  AS SELECT `products`.`id` AS `id`, `products`.`category_id` AS `category_id`, `products`.`supplier_id` AS `supplier_id`, `products`.`name` AS `name`, `products`.`weight` AS `weight`, `products`.`original_price` AS `original_price`, `products`.`discount_price` AS `discount_price`, `products`.`discount_percent` AS `discount_percent`, `products`.`image` AS `image`, `products`.`expiration_date` AS `expiration_date` FROM `products` ;

-- --------------------------------------------------------

--
-- Структура для представления `view_all_suppliers`
--
DROP TABLE IF EXISTS `view_all_suppliers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_suppliers`  AS SELECT `suppliers`.`id` AS `id`, `suppliers`.`name` AS `name`, `suppliers`.`phone` AS `phone`, `suppliers`.`email` AS `email` FROM `suppliers` ;

-- --------------------------------------------------------

--
-- Структура для представления `view_all_users`
--
DROP TABLE IF EXISTS `view_all_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all_users`  AS SELECT `users`.`id` AS `id`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`phone` AS `phone`, `users`.`email` AS `email`, `users`.`address` AS `address`, `users`.`role` AS `role` FROM `users` ;

-- --------------------------------------------------------

--
-- Структура для представления `view_orders_by_user`
--
DROP TABLE IF EXISTS `view_orders_by_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_orders_by_user`  AS SELECT `o`.`id` AS `id`, `o`.`user_id` AS `user_id`, `o`.`order_date` AS `order_date`, `o`.`status` AS `status`, `o`.`address` AS `address`, `o`.`phone` AS `phone`, `o`.`comments` AS `comments`, `u`.`first_name` AS `first_name`, `u`.`last_name` AS `last_name`, `u`.`email` AS `email` FROM (`orders` `o` join `users` `u` on(`o`.`user_id` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Структура для представления `view_orders_in_period`
--
DROP TABLE IF EXISTS `view_orders_in_period`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_orders_in_period`  AS SELECT `orders`.`id` AS `id`, `orders`.`user_id` AS `user_id`, `orders`.`order_date` AS `order_date`, `orders`.`status` AS `status`, `orders`.`address` AS `address`, `orders`.`phone` AS `phone`, `orders`.`comments` AS `comments` FROM `orders` WHERE `orders`.`order_date` between '2025-01-01' and '2025-12-31' ;

-- --------------------------------------------------------

--
-- Структура для представления `view_products_expiring_7_days`
--
DROP TABLE IF EXISTS `view_products_expiring_7_days`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products_expiring_7_days`  AS SELECT `products`.`id` AS `id`, `products`.`category_id` AS `category_id`, `products`.`supplier_id` AS `supplier_id`, `products`.`name` AS `name`, `products`.`weight` AS `weight`, `products`.`original_price` AS `original_price`, `products`.`discount_price` AS `discount_price`, `products`.`discount_percent` AS `discount_percent`, `products`.`image` AS `image`, `products`.`expiration_date` AS `expiration_date` FROM `products` WHERE `products`.`expiration_date` between curdate() and curdate() + interval 7 day ;

-- --------------------------------------------------------

--
-- Структура для представления `view_products_with_category`
--
DROP TABLE IF EXISTS `view_products_with_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products_with_category`  AS SELECT `p`.`id` AS `id`, `p`.`category_id` AS `category_id`, `p`.`supplier_id` AS `supplier_id`, `p`.`name` AS `name`, `p`.`weight` AS `weight`, `p`.`original_price` AS `original_price`, `p`.`discount_price` AS `discount_price`, `p`.`discount_percent` AS `discount_percent`, `p`.`image` AS `image`, `p`.`expiration_date` AS `expiration_date`, `c`.`name` AS `category_name` FROM (`products` `p` join `categories` `c` on(`p`.`category_id` = `c`.`id`)) ;

-- --------------------------------------------------------

--
-- Структура для представления `view_suppliers_with_expiring_products_3_days`
--
DROP TABLE IF EXISTS `view_suppliers_with_expiring_products_3_days`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_suppliers_with_expiring_products_3_days`  AS SELECT DISTINCT `s`.`id` AS `id`, `s`.`name` AS `name`, `s`.`phone` AS `phone`, `s`.`email` AS `email` FROM (`suppliers` `s` join `products` `p` on(`s`.`id` = `p`.`supplier_id`)) WHERE `p`.`expiration_date` between curdate() and curdate() + interval 3 day ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_supplier` (`supplier_id`);

--
-- Индексы таблицы `suppliers`
--
ALTER TABLE `suppliers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT для таблицы `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
