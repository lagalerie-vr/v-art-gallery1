<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'ETVTHl!)1__iW!qXpO}D!C.g?l#s*#ZMQ(igB<t;C}9dGtP:G>eDsDd_0(G`|(!a' );
define( 'SECURE_AUTH_KEY',  'r-A8P=L,6eH4Es&^k?ZR<Xd(B!xXh5.A@Ac3Dn@.NGZrl+J6]^6H{SRgjScouCD(' );
define( 'LOGGED_IN_KEY',    'pQgjaKTa7vkTly+T<_S2SI{q/{BWS3LCJ#/[K|$D=q/ml@`0X&D0gBZni}X/?ow%' );
define( 'NONCE_KEY',        'C_Z/:C{k%q}MDcoa3#Q]VZB}SIHO*Mq8^V:S ]6i.cKY$3%to$@C-? Qb!Ah/>_q' );
define( 'AUTH_SALT',        'w&bdE<t(1 H3;H.[wzY2!H;6&)[-;tw&<S~V.T/8#x`M4qJD/Q|f/N._86soGD]x' );
define( 'SECURE_AUTH_SALT', ' !wlNb>hq48ssTE1v4ZRW?6.O!ykmr<I@bnE4hebs3P*(&VYR%3#p4?Qi<B{xKnX' );
define( 'LOGGED_IN_SALT',   '+kDlonZ|--$Yb$6;k_G5!1!;{|AC<ZHq J}b:~k&>t#PizY5hZY6M k:^^)8Gm-7' );
define( 'NONCE_SALT',       ',Wm7>*s0_ns[,OZ:3|BB[<TJJ+.-^X*TgF&}v3T!wc^BoV(I|s*uUUOX|34Iu|mF' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
