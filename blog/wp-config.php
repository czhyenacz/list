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
define('DB_NAME', 'vyhledavacdarku_cz');

/** MySQL database username */
define('DB_USER', 'vyhledavacdar_cz');

/** MySQL database password */
define('DB_PASSWORD', 'FHb8T');

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
define('AUTH_KEY',         'OYyB+kZO>%4fkA)#LI6L{fz3^HOm:ZyGySzwYUI 9?;WKk]a2u)8v]mVEaot+it4');
define('SECURE_AUTH_KEY',  'W+^%7{Y7x_;|Myp|@_iG$S8t(W-h,2V$c+=?_cD7&[{*DW6#SvoE9-%MK?Va7lx|');
define('LOGGED_IN_KEY',    'EDtlTXFHwp|b:&x$Y?~-C[EVK|LM+5[d|R-k:nQ%)K0w`;kw|;tCk|LS3xG*[`M@');
define('NONCE_KEY',        'n+-f.?13P4F.:JcO5!dxvhX*lR9S)U:{Gf,-},^paQ/U7TGTZoj+:@2-q~FBDi>R');
define('AUTH_SALT',        'f;A>jQ_n;++{Vz50,[na:s(U^yw q8|Hl0;-7OE]*JS7vsw}|y+Y!eoW^nRSD&_+');
define('SECURE_AUTH_SALT', ';DY*J6qC!S8@|0@~>1]cXvdG@3_$c?]HdYVeT]igDPscPEh%pcH-L!eh0qIdk|uK');
define('LOGGED_IN_SALT',   '40 +`aym`mSP j[3-q#K.L`H%11chB7-2WIESly7]$WG~U*8Z(T+[8u-?MUv}c+L');
define('NONCE_SALT',       ')-0||QY{`{x%rkj*KGeT+7({e}~GI/IkBOiP.Ied<:Ka2?=E~g-YtntgG:rhXQ=;');

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
define('WPLANG', 'cs_CZ');

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

