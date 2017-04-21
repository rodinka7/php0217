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
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'I#DwMW*$4No,ViT}w|`rBz4M^NRJja=Wz@D8}KEj^*+XKBo-U~OLB%ZE`>LYGD(8');
define('SECURE_AUTH_KEY',  'p`bu52~OU!bX0/fY!~;&tq7.2Vn#S59`StanBUcyX jM@2f4LLUvGb`!(S5pexlo');
define('LOGGED_IN_KEY',    'i& <n_V:9IgOPsY9|RirK3^</F7jGY@m@}R1gA(NhDgf?T*zYPB-:FqNr&x0U4}[');
define('NONCE_KEY',        'Lm`MEnau/1T@rzWDs;D`z}$w9&9vfB_P+uou{}^M2vsWV;M`?CI8D`A<yRl)K9N,');
define('AUTH_SALT',        '^n&_z-:UVR,HzpY]t(5=[9wbcjd=.C~,R-kjtNg(Su@D}.tZ 3p_%;4sK!rc0wW^');
define('SECURE_AUTH_SALT', 'C#r6+_vNlei36[HA_e8K>XyQc+wZbpn7zl|3 qv$G,k3K;M8Zw/6UxJDj.J%qh,X');
define('LOGGED_IN_SALT',   'q/R8sPB^|T=xYUl: ;0ESCHMmS^9e~+M?JRo-4$m%{IcLj7>d$<U`td=;zN=z#oB');
define('NONCE_SALT',       'a{zm$XAI-`2f4Grl`;{0%x*Vtdy|^a*aAX8+<{J.kJO_U^XuqlG~CO}YAXoo(zSF');

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
