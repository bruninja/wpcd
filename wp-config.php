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
define('DB_NAME', 'dias');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'prospero888');

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
define('AUTH_KEY',         '@N,;/%GbG>o_kvog$yRuaFh}Iy<vp+;+Fc_G.)(L2yov)OD`/LS.~}`]{A*C&)Lw');
define('SECURE_AUTH_KEY',  'o:NUEpA*~2DT`ZR!).#%0_kT#kO90C<*wi0Oy)ZLJ)SAc{7DaW1ubdi91}&LgLFz');
define('LOGGED_IN_KEY',    'p&8eLhq1?g5zrw+nQ8 gB_^k_tU&Xs0m]PS$L{)htpGJgw=Gpazx90?|b)zk+W-f');
define('NONCE_KEY',        'R6jHA6U>,j/]e+;wctR+MD4>VKmruM([k`JF:j6rNd|H1(c{LJFg32*7=4R3sG+9');
define('AUTH_SALT',        '$Am4MohlO%%Xv:[9$|pYnRpv>=8]s,d;3S)`]>5,Z#ACmm)##5P+V<7.`1Vf#Q$t');
define('SECURE_AUTH_SALT', 'cqG%!2;[cPgpXv{pIu;iz!KcugdO!;!ZT:TUSIiB| sm<~{lhEpMs#6H6`4#8RR{');
define('LOGGED_IN_SALT',   '(Q|lg|12%qxnA>S9Csyb+Nel GmGI_i9pE0^934S)_t |2Iy^$CC1I5~*#_;1q:]');
define('NONCE_SALT',       's@Y41wNA{!|#8e&yej&HStYU6-yEs>qtF7C{1=2P]]|I<*E4?EnxR;iuN@4h[pb}');

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
