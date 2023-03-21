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
define( 'DB_NAME', 'wordpress_carolinaspa' );

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
define( 'AUTH_KEY',         '=y$v48EK4Ip>Ndh>3|@5 ,7/b3)!4Zs[3y%qR.rEfnp:Cvz7b)oc<]fXG37?)}K<' );
define( 'SECURE_AUTH_KEY',  '#-O;gWsp$/}~VD)F&U5yYE?kIRea2{V>a<gN%>iWUz&rwW&wCY:c(d~W3tm]PV9D' );
define( 'LOGGED_IN_KEY',    'H)T/DuQ[Q3aN1yfS2E@QR?5?UCstfVwX{[l`&g#*Ao=xXlzZdJ^KMX,,kq3(#xe#' );
define( 'NONCE_KEY',        '-%/Kr4PNQkC2zP+k8wxmla.;Y070&thw14Jnf-f4sn.}#/dxG$j*ix-T^B#S>-]=' );
define( 'AUTH_SALT',        'J(8^2Y9|:LGEQ=a~7/C{X[KM]nYqgZ%7jZq-sF%IUqrGP@jGl{Xtvc.mDG/%YJ3%' );
define( 'SECURE_AUTH_SALT', 'WBguBWgg!Ke&C199J89|U ;8ZMiiqRn]Zxi@y;=AIsr#Wz-ZWquv;/uH-qi);x4D' );
define( 'LOGGED_IN_SALT',   'YZt#&Xv?qvEZ4jp]B/dJ$LK<R%gbYL=Qe6]fCB!n]`C6KD;7zkV?&04yx=JqH`yo' );
define( 'NONCE_SALT',       '=YI@$7n2-6s~H#sM05Ex5n>!j(|NOZf|wX)1NF,>%g_{@ _n85/es:1yh1o#M?.A' );

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
