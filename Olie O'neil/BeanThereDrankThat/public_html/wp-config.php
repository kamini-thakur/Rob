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
define('DB_NAME', 'btdtcoff_rcmgtest');

/** MySQL database username */
define('DB_USER', 'btdtcoff_btdtco');

/** MySQL database password */
define('DB_PASSWORD', 'Sarbjeet@123');

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
define('AUTH_KEY',         'm/A_J-Cy8?k4{YP)7)o 2R!<@K>i7P)K0k|ZR,gtkuVh;LImbiaElq9_3UH0bGFo');
define('SECURE_AUTH_KEY',  'V(b c%+jNDVihj8,}zc!Tj4~RC28eV{FT/+5,2.S|$J4pd:w+)NjB/~6kjN;]VC*');
define('LOGGED_IN_KEY',    'X.5ym&N)TW2<( QL*DAs1EPNVtLGFdmFs?e:RZ`byZq`7f*u~440kU#a!iyR<sD0');
define('NONCE_KEY',        '@D8!@74zMVSQ{Ur6Cc1S?rKL0|S|A_)=z|^6S)_^@m#PZNLwP3lJ?7Vn W?rds j');
define('AUTH_SALT',        '<4=y4<qX.wc!:xGk)Z4I|?BF}$DmcBv0~fgeFrm%S{Ui8&;^kt&Zw?C}B=Ty?P t');
define('SECURE_AUTH_SALT', ' gu%yuCjRf$S}k*,Ye6)B.Om5ov9<CsP|4(RO,l[F#U!%XCbV<>x!,5J120qLXzT');
define('LOGGED_IN_SALT',   ' y:JI%O1SxbaheBGF:~+:5iZj[g.*KgkZ=-4-UV=x^X1/tcYSoPY(4W*2FHA+nu`');
define('NONCE_SALT',       'n w>fItM[+{arvjH|DF{.U4XFz,zdm,EB):~PbI0l1g*[|jB;7*~&676l}JPH9IC');

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
define('FS_METHOD', 'direct');
