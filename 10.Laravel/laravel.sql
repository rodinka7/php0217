-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2017 г., 23:54
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

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
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Colby Homenick', 'Gryphon. ''Turn a somersault in the face. ''I''ll put a stop to this,'' she said these words her foot as far down the chimney!'' ''Oh! So Bill''s got to.', '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(2, 'Ramon Ullrich', 'Gryphon, the squeaking of the way the people near the looking-glass. There was no time she''d have everybody executed, all round. ''But she must have.', '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(3, 'Samanta Koch', 'INSIDE, you might like to show you! A little bright-eyed terrier, you know, as we needn''t try to find it out, we should all have our heads cut off,.', '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(4, 'Miss Alanna Bayer', 'Dodo, pointing to the fifth bend, I think?'' ''I had NOT!'' cried the Mouse, sharply and very soon finished off the top of his tail. ''As if I fell off.', '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(5, 'Nia Parker', 'I must have been changed for any lesson-books!'' And so it was as steady as ever; Yet you finished the first figure,'' said the Hatter, who turned.', '2017-04-29 17:42:26', '2017-04-29 17:42:26');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mervin Baumbach V', 'Hatter replied. ''Of course they were'', said the Footman, ''and that for the garden!'' and she went back to the shore. CHAPTER III. A Caucus-Race and a.', '92dcac39922a63e8c081f3efe12c82e2.jpg', 631, '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(2, 3, 'Prof. Ruby Gusikowski PhD', 'Shall I try the first to speak. ''What size do you know what they''re like.'' ''I believe so,'' Alice replied very readily: ''but that''s because it stays.', '0c24b5f14e2eff0d08f36def54b42bcb.jpg', 609, '2017-04-29 17:42:26', '2017-04-29 17:42:26'),
(3, 4, 'Mr. Eleazar Prosacco', 'Alice dodged behind a great letter, nearly as she spoke, but no result seemed to her to begin.'' He looked anxiously over his shoulder with some.', '025e4b04953bd51ece49af0b4d20a0ba.jpg', 1481, '2017-04-29 17:42:27', '2017-04-29 17:42:27'),
(4, 2, 'Prof. Althea Heathcote III', 'Dormouse: ''not in that case I can creep under the sea--'' (''I haven''t,'' said Alice)--''and perhaps you haven''t found it made no mark; but he now.', 'aa0be99ee215da29257cb1a9ad391738.jpg', 1300, '2017-04-29 17:42:27', '2017-04-29 17:42:27'),
(5, 1, 'Prof. Carter Emard IV', 'There was a table in the beautiful garden, among the trees behind him. ''--or next day, maybe,'' the Footman remarked, ''till tomorrow--'' At this.', '7eb675b53838ca4b73f0a2d5c4395590.jpg', 946, '2017-04-29 17:42:27', '2017-04-29 17:42:27'),
(6, 3, 'Prof. Ana Mayert', 'Please, Ma''am, is this New Zealand or Australia?'' (and she tried the effect of lying down on their faces, so that altogether, for the garden!'' and.', '9a3b047333d1d7ec319c727cda771a4e.jpg', 1091, '2017-04-29 17:42:27', '2017-04-29 17:42:27'),
(7, 1, 'Amiya Roberts', 'I shouldn''t like THAT!'' ''Oh, you foolish Alice!'' she answered herself. ''How can you learn lessons in here? Why, there''s hardly room to open it; but,.', '3030e6fb2432048d430bdacb42e68e56.jpg', 503, '2017-04-29 17:42:28', '2017-04-29 17:42:28'),
(8, 1, 'Prof. Roel Koelpin III', 'I to do it.'' (And, as you can--'' ''Swim after them!'' screamed the Queen. ''I haven''t the slightest idea,'' said the March Hare, ''that "I like what I.', '40647bd37f20f5af875fc8151e0e7c71.jpg', 1122, '2017-04-29 17:42:28', '2017-04-29 17:42:28'),
(9, 3, 'Dewitt Kulas', 'Gryphon, with a soldier on each side to guard him; and near the door between us. For instance, if you wouldn''t have come here.'' Alice didn''t think.', '29364edc603d20151a057f1c3efa16b4.jpg', 955, '2017-04-29 17:42:28', '2017-04-29 17:42:28'),
(10, 4, 'Cheyenne Grimes', 'Time!'' ''Perhaps not,'' Alice replied thoughtfully. ''They have their tails in their proper places--ALL,'' he repeated with great curiosity, and this.', 'e8a779dda9fad425cbce0262794459c0.jpg', 506, '2017-04-29 17:42:28', '2017-04-29 17:42:28');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_24_110436_create_posts_table', 1),
(4, '2017_04_27_115140_create_categories_table', 2),
(5, '2017_04_27_116541_create_goods_table', 2),
(6, '2017_04_27_220451_create_news_table', 3),
(7, '2017_04_27_220451_create_posts_table', 4),
(8, '2017_04_28_115140_create_categories_table', 5),
(9, '2017_04_28_116541_create_goods_table', 5),
(10, '2017_04_28_220451_create_posts_table', 6),
(11, '2014_10_13_000000_create_users_table', 7),
(12, '2017_04_30_171400_create_orders_table', 8),
(13, '2017_04_30_172400_create_orders_table', 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `good_id`, `price`, `user_id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, '631', 2, 'Tania', 'rodinka7@gmail.com', '2017-04-30 14:52:03', '2017-04-30 14:52:03'),
(11, 1, '631', 2, 'hjk', 'rodinka7@gmail.com', '2017-04-30 17:56:07', '2017-04-30 17:56:07'),
(12, 1, '631', 2, 'Jack', 'rodinka7@gmail.com', '2017-05-01 07:24:26', '2017-05-01 07:24:26');

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
(1, 'Dr. Theresia Grant Jr.', 'Tempora repellendus aut veniam et perspiciatis magni iusto. Vitae ullam voluptas dolorum voluptas maxime. Iste et eum magni consequatur qui ad beatae.', 'fe14b93cce90d51fb17a4563cdab31ba.jpg', '2017-04-29 17:42:28', '2017-04-29 17:42:28'),
(2, 'Sim Walsh', 'Maxime voluptas non sed impedit et molestiae. Tempora cumque fuga doloribus sit consectetur voluptas. Atque qui totam dolorem. Recusandae autem voluptatem quos ipsum.', '6b1f5a7b5696e21797b4f0bf2234da37.jpg', '2017-04-29 17:42:29', '2017-04-29 17:42:29'),
(3, 'Ruth Gleason', 'Odit error cupiditate sed sequi repellendus debitis. Minima necessitatibus incidunt similique nam. Pariatur nulla autem quo et et.', '206d8cf2de3f3d7b5ad91eaf4a347423.jpg', '2017-04-29 17:42:29', '2017-04-29 17:42:29'),
(4, 'Norval Bartoletti', 'Enim id aut dignissimos. Consequatur nihil suscipit explicabo libero deserunt iure non. Praesentium consectetur est quo nulla. Velit earum saepe ut odit debitis.', 'c84aa8798c068eacc11156b7f15ece91.jpg', '2017-04-29 17:42:29', '2017-04-29 17:42:29'),
(5, 'Miss Gladyce Crona Jr.', 'Ipsa provident odit voluptatem et. Neque odio molestiae suscipit ipsum quam velit. Sapiente corporis aliquid recusandae cupiditate distinctio reiciendis non.', '4c512e480b142885ae2a2328b4c7683c.jpg', '2017-04-29 17:42:29', '2017-04-29 17:42:29');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'rodinka7@gmail.com', '$2y$10$/DvOuwO1tj6rMxhx8tBw2uBOcu7ee5hcM48Cru2QFmWDg3AnG6fai', 0, 'Cy1NmQbAiIa63M90FDYJSrvQbhuI3cugCQ88A84SAjJgTd5zRey39GRl2MHG', '2017-04-30 11:27:34', '2017-04-30 11:27:34');

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
