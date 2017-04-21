<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'turistik');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'php0217');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&;)i-kIwL|:j&8:)V@3`{Wkz{hoBi@:{MEcComx-2CN*csVE>T!J1=p;&|N|E+`:');
define('SECURE_AUTH_KEY',  'QGo]-{s!5.<<K>[S@H)ndcw`R~v<-O8dJB[-fZ!PUHeSu0;*P!,m6j0,Zog?g@ni');
define('LOGGED_IN_KEY',    '+O+PLHUwgmQ0zj2Tl]Ek4(6_dl0C6*Ue`Ig}~f4=PZ*JjTRi&,Q}~U7e:mXlr(ga');
define('NONCE_KEY',        'W%:e0Va/qV6Pol&y0CN>lI$aGqv0n+.2U;pe4TFlrJ>^-aAcv<|ClN%x^lkSX.y6');
define('AUTH_SALT',        'ZtDBwWF&_E$M`Y&;N|.lC MC|HIH!c|YE_=*2-(=gE.{1J{`Ei>V-]$`W8eEdMml');
define('SECURE_AUTH_SALT', '^m@8]|3ZmpU590]~WPzk$v} PWxr2Mr%Yk]n5t>dVqHP9Cc/IBM>oTi9iOr{X^1y');
define('LOGGED_IN_SALT',   '{iPk@$!b:0u|bNLE+K;,]VrYzA^yzUJOv#K X];j9H~p`X&Yd)mfOZces9D>W t_');
define('NONCE_SALT',       ')X.dj_iyMBxl6*bWL.[b/5Y*gqs81?mWnd}Zi9V]%+3[32+$M^={{N~pbb g4[aj');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
