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
define( 'DB_NAME', 'jardin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '=N[?pa=NonzpEk[6 jEQQM{;${+g^1nbPQ`]>Ip}(M$&3nCHXNA$mF8kgTl<v>+f' );
define( 'SECURE_AUTH_KEY',  'nb#x>:39VzDyhcNNoIRsJ=vshD=QNNd!PIZ%x$KXzt :GteN]J~c{jF9m/u>]MnF' );
define( 'LOGGED_IN_KEY',    'LId>$F.pL}}P)njX,-o2Mz1Sa IZQ&8Q@nUfC;8V>tOoZfS>30H<cwG/+yye3Dt_' );
define( 'NONCE_KEY',        '^{;ya>`_0;3co;fKXWSeJ),ax0!^UO.0xQ}<4@.RaHnxj31|]&=E-yK^ r!`W8Bx' );
define( 'AUTH_SALT',        '02*2CqJgdo+AXl%*;?_DqHAm;B.oe2Hf6/vBF2KGR`1Gb?sMYxI~2ueT^8]pbbUY' );
define( 'SECURE_AUTH_SALT', '9@4|dgl;aQ>)e1aw#JF2G>2dJjR1pU9!4@ DpDG=-y5h&7HXH4F[XFH ,|2o`<Ru' );
define( 'LOGGED_IN_SALT',   '&v#<*0B-y]qn!i*Tg/}_L1||$V~ddc-T9dVlz@qs(_bqzkiS{p2NAHY>[qGWO;)P' );
define( 'NONCE_SALT',       '&Agq+J_T6Z;w75VTNE%0H^6T~Xb^UNUF @vPh qLToezQ$!PfV#f/_W(:nNr,>ZW' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define( 'FS_METHOD', 'direct' );
