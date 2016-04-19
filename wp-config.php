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
define('DB_NAME', 'rtlcbsasia');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'V$+U)O8Im2-+9:f1n<a^iC`V0Djm_3j~x70`Ox:(+)W9|:A0Vi`kdoQvV}ePyy>V');
define('SECURE_AUTH_KEY',  ',|D;+-iQ0^.:Xrl;vcDjyC@zdw4cy_J!;N=KX}iJ|A~>[u`n2Q-JRyC3+4#4GHO2');
define('LOGGED_IN_KEY',    'drUfXr6}m=nAGA;jjD%4)CH4HfE?pAbp-NnJi|{8k:h~nI/u|;gAZ3*VYC4uR>A$');
define('NONCE_KEY',        'oN i|xKK)o!k{c+,JstSQUHGA|FuveWo_r(7Cjzkk8+OVR[/GR7j_yn%4#hb9-H7');
define('AUTH_SALT',        '}M?a#yXij2;k`_}%{T_xX6uz.0fD[M`eG]Ur}8EfE.#*nLRp^7 3ns)4bdk#ne_m');
define('SECURE_AUTH_SALT', 'OL0x@wsH>J.L=uY,=09F0y<{uG$z(=d_ufOqda>_:VDy]QRy?zx_}=f|_pDOk`EK');
define('LOGGED_IN_SALT',   'vU{nQFYvs!_$Y+o;s!fj} ;;;tXVH}#mc %O[eX+*1|TX?tKX542la?fcVellb7!');
define('NONCE_SALT',       'LQzx!d+Z$cD/@XSE3-t,qARhN(LyHy2q}<twjm4QqGyN(IBlU;pzzc:]g2!{*-WV');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'rtl21016_';

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
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', '192.168.1.167');
define('PATH_CURRENT_SITE', '/rtlcbsasia/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

require_once(ABSPATH . 'wp-content/custom/library/function.php');

