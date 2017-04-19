<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'turistik');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'php0217');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'aosjH!MTFba?;N4s>t}m[i=8fM:VFvGm>u|5Zy,TqaEjxFzbKJ{c@@kg32~8Q|?I');
define('SECURE_AUTH_KEY',  'Mh3X*^s$B!/|8;EBR{DDEI[}t=#WrXXy#hohyz$3g. a}}SJ7F#+yEN@TaUCmvVm');
define('LOGGED_IN_KEY',    'n-wTTX3aD%9d2aNa+<$~0t.RG3151YAhH]OT`(q<>6_Ny|im,aVgm`n[dGK!9(gj');
define('NONCE_KEY',        '{$iC6l!A~$cHR;!rp};&0Pr]AFn%{8<6L6jx]1^JWIzirYEJ&$xE{6.k^jNZTUh8');
define('AUTH_SALT',        '3/u]`R^fG$k+jy_/>XNy$$FOU>j;FSQ(_d.@+oRO@@>=leVN~wcv<ti6|0]X>@[?');
define('SECURE_AUTH_SALT', 'zS|+o!$wDSae(rx8O)nlY=_Qn2g|9a;e-jghZdwq{d+%]ft]PFF=*N[3BOmaNR<%');
define('LOGGED_IN_SALT',   '_S38~d0x-RL_Dx!e=|7bTk5vI?i0~)Ap7mT4J_,T]j!|??R&g:[t;3yqhCMl[wna');
define('NONCE_SALT',       '(@iJHJ`sa&.Ln[.nIi|P0TX,$v#/!/t#:^YKQTfg-oO:}tREc*95b%G`Prt3imY)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
