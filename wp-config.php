<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'easyenergy_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'shiva69');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'gi>H-5+9-vFjl$-#wN|Cz|#^+e~P!+id]62Z6r)GUPcP+|~{)a]|%3-ZZS!<_Q)p');
define('SECURE_AUTH_KEY',  'H/o?6QViTNzYnx5OK? `|Kdk@efUzE75p(U~k 8~7$&Cmz?NLXy;zGLU+=576dyQ');
define('LOGGED_IN_KEY',    '0$v(|oh&CY&H~1C&&QvreF-q@E<EikfShXUYvWgKnU<a9-gLj_}Iq;*6G3C{L635');
define('NONCE_KEY',        'UL01%fG><>|c`k?>03s[:YsraZmd?=a{&=.M@X=.fhe1ez_e5iKbz0US4`Xl|znb');
define('AUTH_SALT',        '{!F_1xRE}vP4rsoH=p?}3FVLTo9J=<R(|jk^EVqA`hatz-1=O_g;[sg8O9->x<;K');
define('SECURE_AUTH_SALT', 'nABr,B//#.>3n&^m|=j}r/K-g<m&4-GPc<&03b]3D<Q=-RA:9e55D{O)}sbBAP~!');
define('LOGGED_IN_SALT',   'sd[,k),rH.FI[,4a4NJ|t [G*JA?Csc+1`/$Yjyt6mhp*E$/EMLNl-{I>Bz(F(J$');
define('NONCE_SALT',       'gup+z$|wAPr?eDIzH|U|astgL]0{;~gRCO%+/gWCNh G_4H%mJJXuFW;MYv;N|`m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
