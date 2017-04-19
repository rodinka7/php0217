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
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'am^G>dlkxCYn{qFYj5G-8Q1*xq|T^d1mLr<3=H310=7BE7&-q>-bf)2xO7p<`h,n');
define('SECURE_AUTH_KEY',  '{UHs6^/]ne?rK6:,%l_xnxQD+%C~hIUonzrcn|+Jzx74,tJj?-2I:aoCJZqyl<NZ');
define('LOGGED_IN_KEY',    'wBC>XKmx#%qeIK?g|c-cC2rmz6RUet!31%y3*C-?/3E6Jt}>qKR%Ki|8R8F!vs0c');
define('NONCE_KEY',        ':aK*v0*%I74K!8(h[qo-HhPKJ-rpfEl8|YQ@Qb/Y+e8)J50hc;l|]7Fr~Q0.b-~H');
define('AUTH_SALT',        'T2F^-$y[`B(xCV1~#N<Zy,QnzH@Q|Ydo_:+6M{|Y)X-@{t[|HG+P!-40bfR+]#XJ');
define('SECURE_AUTH_SALT', '/yq`OB-B[@[jf;u Kv6me!HFcB6SF/zcvP:-}cP+<D+atq6S1V6A1>q=H;u:LbR-');
define('LOGGED_IN_SALT',   '|b={.[@6nH[76bs)%49auSgT=C+gLATuQP`n|yY<r`ZS0Er_#{>4sHh]PtI91GEQ');
define('NONCE_SALT',       '[f*?s@WJ00 mFHLeVe5^$MAlM343CaUh_nq)kD-!r&&RD n }xuu-KQo:{_D[e 3');

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
