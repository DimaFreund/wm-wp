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
define('DB_NAME', 'wmetier');

/** MySQL database username */
define('DB_USER', 'wmetier');

/** MySQL database password */
define('DB_PASSWORD', 'fJ2GbcFt2yYXEru4');

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
define('AUTH_KEY',         ']HNn[LxB%?94c4x!,|{l`P8{C*p-BGB=xlsApX`Alw)tpyt0m tbk])MWxt<|bv]');
define('SECURE_AUTH_KEY',  'C&ZYbb+fOl<|<Us3L=C8@je DqfgZsZl/nb=-^?5)jng|<rE_K)Qg#9a)RzZ_K8[');
define('LOGGED_IN_KEY',    'k0!Z5ak)H=O-FbuB8Ivq+ OP_j@B1kQ^5A+tr ICW_CUPXH=IPFC/ ZBdv3 L*O[');
define('NONCE_KEY',        '`%s`RA}Mnm]>~`a/|wf42m-70myp~?LP-N+XH73Udg:!(QcEPM6WxS?dCJ$=tF4S');
define('AUTH_SALT',        'neBL~{D!GwEM78.ytUL=;5O68&w7?+cgOP~Wg3QOBSE_eHUCU/4,&0?tGWIf*kNB');
define('SECURE_AUTH_SALT', '8QP8{YY`fea(*sI49Ok5| =g4NcW{ tV?DN^gO?eJ(9=-xyua&{LXUZBI5$!(pKB');
define('LOGGED_IN_SALT',   'F(BJ$ AXj]xCY[LR`e!BZ}8w@u5?&u,QejcDW,<e]?*,%UtCNipQlJYAXptg4^YB');
define('NONCE_SALT',       'hiMs+m ~z,~5/YiZgo=V#baI+L(=C0!p0xt.Zw7O|BC`C-[JQk#E7N-Yc;D8PK<T');


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
