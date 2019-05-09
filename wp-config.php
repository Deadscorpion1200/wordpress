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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'e]6)J$.1QZK~VkIU@w[49XRKR7Oc;S*nAT,Wqs25e,!4d_ &ZGk+IY,jQt3 &8n?');
define('SECURE_AUTH_KEY',  '`oLA?p/M~{JqT{;bbeUwab{m4UJihI/2Hz>@2>KiZDk*yi1}QKs??NxWINq=L4^S');
define('LOGGED_IN_KEY',    'k2r@[;{11a364f?%4pSUuKlE5%p}LpniNk);m-T0:mYhSsRPHlSm.U8&$ >ufHk3');
define('NONCE_KEY',        '?:&icA,rZm{f(bvIB;eE<j=$1M@}Yvclk:[G3zB (m&29gUfIEfNh;CADF:}l3{j');
define('AUTH_SALT',        '<L4@KU:11(./I*B+!gh|L7z|kwQlR W__dRzo|SGC]YsTG,WnC4q(O-]Y5~CCv~V');
define('SECURE_AUTH_SALT', 'VQtNFNPZ9NiLv}A-`d/-72kF.L=6+,co8bJ;?[{1f^&.aM:ie]BF(&^8Iz).kyK&');
define('LOGGED_IN_SALT',   'yA<5mjip~CV^V:1O^~dpUvV>_glY:j?#W|g<]OmyJ:2&*:6X7I@wJ#hN&]x?Y/<G');
define('NONCE_SALT',       ' gcO^Q6MR;9u,DnO:+nmn!o^x9j${1}P/ZwB8H=E#@n>6Pnl9M63/7-P+sX!7)Le');

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
