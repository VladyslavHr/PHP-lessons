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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kirillovka' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'A[%SJn.c+=u3lh0peRq2J>QA0RpSqTGK&Wo;$HP7/r,zf%J|tdr.d0oPO:R<h[-I' );
define( 'SECURE_AUTH_KEY',  ']c5;B=ay|l.K6PV(@+[<~4R*ONFS]`XVIz:(s1&7xxGs`}t!g;C6VG-kn8P?1S+M' );
define( 'LOGGED_IN_KEY',    '#dav65o^ObXmD]gaI8AjNi=By7kg>[m/u+ w/!6S(Y4A_[;.LfVc!S8%[W<#]@9U' );
define( 'NONCE_KEY',        'HL*^P9R:8<MF5=V}:D8d$tm!$S?&qMAgP9t?mg~{H@lhZ*`W_Iq9NCtRt)EVRZ.D' );
define( 'AUTH_SALT',        'F7WWVMa>ipuw>pP{^qA(FOb8*RX?2FZaSWX[_DN[oN?U,y$7a=6Qs/l{6?m;S_VS' );
define( 'SECURE_AUTH_SALT', 'M`emIt5McANJ$,fNKC$(P1VJTbM=ETNoV}*Q8TX%oUyxWH}`A`^J2$ t7Ku~.s<+' );
define( 'LOGGED_IN_SALT',   '=7FlOsc=UTC$6A921dk(6%a= K]Q+sV7{`1sBN]3v5Hnb`2w$MnloWcLign(+}e#' );
define( 'NONCE_SALT',       '3k~Pz-j8rFg}s4?baddHIm(-O=Uths&12/+%n,il<jf!~_#lPylPBCjx*~HlirM+' );

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
