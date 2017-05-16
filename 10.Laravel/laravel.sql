-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2017 г., 10:49
-- Версия сервера: 5.5.48
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Eva Huels', 'Iste sed sunt aliquid et. Quia minus sunt qui molestiae earum at. Ipsam voluptatem consequatur enim voluptatibus.', '2017-05-16 04:42:02', '2017-05-16 04:42:02'),
(2, 'Cleora Ledner MD', 'Consequatur odit qui architecto iure est. Illum molestias voluptates quidem porro reprehenderit voluptatem. Dignissimos officiis enim molestiae quidem nulla vel. Quaerat vel maxime rerum quo beatae.', '2017-05-16 04:42:02', '2017-05-16 04:42:02'),
(3, 'Prof. Ari Tremblay Jr.', 'Magnam temporibus ut illo unde tempora sapiente. Nihil iure vel dolor accusantium sed. Beatae at neque commodi dolorem ea magni occaecati. Et ut rem et sit voluptatum quia.', '2017-05-16 04:42:02', '2017-05-16 04:42:02'),
(4, 'Rafael Mante', 'Laborum officia quia asperiores similique. Molestiae totam quos libero culpa ad. Molestias quis omnis tempore molestiae accusantium. Quia aperiam blanditiis eum non.', '2017-05-16 04:42:02', '2017-05-16 04:42:02'),
(5, 'Ms. Meagan Goldner II', 'Voluptatem placeat provident aliquam et sunt reiciendis minima. Repellendus dicta odit eos fuga laborum aliquam voluptatem.', '2017-05-16 04:42:02', '2017-05-16 04:42:02');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 'Justice Gorczany', 'Et est enim ab. Provident sunt quam id libero. Minima consectetur rerum qui voluptatem quasi quis.', '8a97c38379ecffc4d6072f9df222b970.jpg', 1111, '2017-05-16 04:42:03', '2017-05-16 04:42:03'),
(2, 4, 'Delmer Hackett', 'Asperiores qui vel nemo quis quidem. Autem sapiente ex deserunt ipsam ut alias.', '7a351fb6f293d31a8987c5c84108c889.jpg', 1500, '2017-05-16 04:42:03', '2017-05-16 04:46:05'),
(3, 4, 'Prof. Lilian Zemlak', 'Veritatis aperiam qui aliquid omnis et. Maxime alias tempora sit non aut enim. Itaque laboriosam voluptatem ipsum beatae earum consequatur aut. Voluptate quia sapiente tempora.', '426a7b0f9baecf6181903e1f2c3717a5.jpg', 277, '2017-05-16 04:42:04', '2017-05-16 04:42:04'),
(4, 5, 'Hermann Mraz', 'Animi molestias velit maiores. Esse aperiam et ad provident. Eum non quidem dolorum. Minus in amet accusamus non voluptas.', '696c2057e3a7e5bbbcba971468cf7c4e.jpg', 390, '2017-05-16 04:42:04', '2017-05-16 04:42:04'),
(5, 1, 'Dangelo Kassulke', 'Voluptas voluptas asperiores molestias porro. Soluta nobis sed excepturi aut doloremque autem voluptatem deserunt. Vitae illo ut molestiae nulla natus et.', '96a6c94d9b2b086469d8a5a1b77bb3d5.jpg', 1003, '2017-05-16 04:42:05', '2017-05-16 04:42:05'),
(6, 1, 'Maud Terry', 'Dolor dignissimos libero iste temporibus laudantium. Aut nemo sed est sunt. Enim soluta aliquid blanditiis asperiores expedita aut eos.', '9a0fd6349a633be35a019d773a3ccb61.jpg', 1161, '2017-05-16 04:42:05', '2017-05-16 04:42:05'),
(7, 3, 'Jovan Terry', 'Sit ratione aut ab aperiam. Ut vel ea et sit dolore. Maxime eligendi maxime ratione. Debitis voluptatum doloremque beatae quaerat.', '2edf0c5151c11998513aa5edde057ccd.jpg', 543, '2017-05-16 04:42:05', '2017-05-16 04:42:05'),
(8, 3, 'Miss Katarina Borer DDS', 'Sed eaque eligendi mollitia et totam omnis quas dolores. Mollitia voluptates saepe praesentium labore veniam dolorum nihil. Possimus ex cum veniam dicta quo et.', 'dfba03b273d319ce661671dabb53d4f4.jpg', 474, '2017-05-16 04:42:06', '2017-05-16 04:42:06'),
(9, 1, 'Mr. Emerson Cassin', 'Ab optio tenetur ad voluptas. Et ut adipisci ipsa enim dolorem dolores. Placeat vitae vitae cupiditate explicabo tempora.', '934551f57fc167639b3df5877bae0780.jpg', 884, '2017-05-16 04:42:06', '2017-05-16 04:42:06'),
(10, 3, 'Miss Karine Steuber MD', 'Repudiandae sed veritatis saepe nobis nesciunt necessitatibus. Corrupti tempora in tempora iste. Asperiores quia nulla ipsum quia est inventore.', 'f9ec5a7ff4cfed6515350f9e0a87e00e.jpg', 1324, '2017-05-16 04:42:06', '2017-05-16 04:42:06'),
(11, 5, 'New Cat', 'Let it be your favourite cat', '934551f57fc167639b3df5877bae0780.jpg', 500, '2017-05-16 04:47:16', '2017-05-16 04:47:16');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100001_create_password_resets_table', 1),
(2, '2014_10_28_000000_create_users_table', 1),
(3, '2017_04_15_115141_create_categories_table', 2),
(4, '2017_04_28_220415_create_posts_table', 2),
(5, '2017_04_30_182400_create_orders_table', 2),
(6, '2017_04_12_116541_create_goods_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `good_id` int(11) NOT NULL DEFAULT '0',
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `good_id`, `price`, `user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 4, '390', 1, 'Tania', 'rodinka7@gmail.com', '2017-05-16 04:44:15', '2017-05-16 04:44:15');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Timmothy Kutch V', 'Non magnam placeat quia et rerum et. Atque reiciendis nihil sunt eveniet dolorem earum cum. Asperiores odio eaque est suscipit ratione enim.', '111a1097579f1018758cc6a0a6e0e238.jpg', '2017-05-16 04:42:07', '2017-05-16 04:42:07'),
(2, 'Constance Christiansen', 'Et maiores veniam amet nihil. Totam nihil ut velit delectus maiores cupiditate. Quisquam facilis aut quos.', '9692999e1139bdbfcf0687fb8d319109.jpg', '2017-05-16 04:42:07', '2017-05-16 04:42:07'),
(3, 'Sim Lakin', 'Quibusdam consectetur sequi consequuntur aliquid. Aut sint provident officia dignissimos laudantium qui. Repellat itaque et esse pariatur beatae.', '617de4946942b3468cdfc8f527220f48.jpg', '2017-05-16 04:42:07', '2017-05-16 04:42:07'),
(4, 'Jazmyne Kutch', 'Quo aspernatur id asperiores ullam consectetur quaerat sed. Repudiandae adipisci architecto qui aut et occaecati fugiat accusamus. Ut eos saepe itaque vitae labore.', 'd1da8d17f1e440af9206e00e5e394b98.jpg', '2017-05-16 04:42:08', '2017-05-16 04:42:08'),
(5, 'Prof. Ismael McCullough Jr.', 'Ut accusamus ea corrupti. Minima iusto dicta voluptatem soluta illo quo.', '4194ff4a4078cca27b6707391ed9b40a.jpg', '2017-05-16 04:42:08', '2017-05-16 04:42:08');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'rodinka7@gmail.com', '$2y$10$TnKFYwIs3Y.gbZxL/lol8eT7HdxslEC1xPomwNb7hcWdL9kiufEZi', '1', 'Z57CxKvKiNL92SBtBjlAlB9wKa6IIJMNfcvlDpvwkBCiYaw2Wg62RRhQ9ZLl', '2017-05-16 04:43:47', '2017-05-16 04:43:47'),
(2, 'Bob', 'bob@mail.ru', '$2y$10$v3gizQ2Cr66ENEAVVABRt.FCIxTEnUtCP9WZ4SIVVRyiHXK3cMRaC', '0', NULL, '2017-05-16 04:47:59', '2017-05-16 04:47:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
