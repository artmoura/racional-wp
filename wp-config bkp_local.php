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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'racionalc' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'pjm:&6P<J`|$PG;6)x$?3`,%*#tCq?neq>_b]Ffv6d0XHV3g{3Eg~RcX0`rKo&HF' );
define( 'SECURE_AUTH_KEY',  '+.p}1Ev@!,(M8d@c66Zm`FlF ):H|e?JGtD5~c?(D)-[u@e/ZekAq[!2fa$R`~xI' );
define( 'LOGGED_IN_KEY',    '~i0]^FO%ts3g]yqX::aHxqbL,3RyJIP4ftAjkJQ^=-~rV BHu4E].F6hEzn#JcQy' );
define( 'NONCE_KEY',        '|it=w$i!Dh)F3hM6dn!C2v=tL4|5`fS*qkZs,y=ud35|FU_YxB[(gs[VR-JP4@9K' );
define( 'AUTH_SALT',        '~x@[9p+8(C@?>y$Web=>o+7&4Zm2E7IA$guxT1?wvx8^85kwh@-I)4=,RvIlLMnX' );
define( 'SECURE_AUTH_SALT', 'i4:okC>0QN4Wl_j7{BW>^R1F+p=:Jj%[awdVz7D#3dnrTr88j[kn6eo}cp0*3*nY' );
define( 'LOGGED_IN_SALT',   '%1#Z:mUMCu[dwH}wSYkm?S[t=o*V#XXN}|1|&&&i3H[&:dK KiXSrWcS6A8_,aMH' );
define( 'NONCE_SALT',       'JO|3oWav#({lVm7p(NYy_O>b-eBHMhIA;pAxF]AnC n0FrjiO)_[Cj5Z+xD}7{_)' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

define('FS_METHOD', 'direct'); // for not needing to provide FTP details

define( 'JETPACK_DEV_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
