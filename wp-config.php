<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'web_khobo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{^H4c7PU9#O65&{4w?Vf[5+qEVID0{pGO#wSEV%=1!H4-sI?S++tp:Fy8F$=+fPt' );
define( 'SECURE_AUTH_KEY',  ']#g1nNVUehop0W]G5vtzFmD,V4R=W RX%T6?ws72Rvs%M2L0ziJCuCo7f0oOAiqo' );
define( 'LOGGED_IN_KEY',    'a95hk0ARxwJ5w^r%:3X5TO;GG` N%]+9zq/At?sCCL 8_3P{)pbn59VR=^XJw4>&' );
define( 'NONCE_KEY',        '8]iNG!Pi/_G;%]xPcolkCf4*48)iQGd2<C7z-4%5;dNROT8xkS++nYO7`a2U b<Z' );
define( 'AUTH_SALT',        'p6~x1v6-ip,4.Eh6hUJsxj0*B2+.gd|T|Gp${3r,l3b<HM8UX7q.C]N2m5W18tH5' );
define( 'SECURE_AUTH_SALT', '.I.=,0za33Mh=t?|^WqD-V3#E?a4e$~}MAzs ,dn%WuS(EW wIAf,p_`$FKmk`L9' );
define( 'LOGGED_IN_SALT',   ';1NP08j&!OE*;#nJZ1H8/5z4Fk=i@tgUp6PSC7ZVYYwRn*4 Cu2a;uaK(=.PX>uc' );
define( 'NONCE_SALT',       ',CDH&y_jKHV%5^6p4LtLoWPTGokIpeuLv~pAyHrK7G_d,;^Y0z=BckiayR(PzT]C' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
