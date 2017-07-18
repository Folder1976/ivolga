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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ivolgaio_wp_m2n6' );

/** MySQL database username */
define( 'DB_USER', 'ivolgaio_wp_m2n6' );

/** MySQL database password */
define( 'DB_PASSWORD', 'D8A376g5u1met4y2n0x9' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|s_+ No;S=+ks|q<)hf+,G (y&-~e!nr(}R!t0W0.pS>b$MV!Y^,J$6|?BgjnTuk');
define('SECURE_AUTH_KEY',  'f{yd<lb~[5<hz{)gRo@*X3]+K/50Z-!I$[sF3>d#_V_a~g1)KTOd5|F&]7T[=IU;');
define('LOGGED_IN_KEY',    '2mL8!bX~bH~B#`mt][jp)Ka^oS+iX3=w-X,q73B/<P]2[/y<@[C3GyEqL3Ry.q7h');
define('NONCE_KEY',        'g)UR+{0?la8FtvYh`*^3;=9;S[ d|PYdA+:=%r}6|LU(brrN+UYi<F?gIdbu]3Z@');
define('AUTH_SALT',        '|f3_HPh@x@7?QDVsxWCM[n|UEAdO|cf+J!awetk>mk)L5b!`iag0-C+($30*qE*M');
define('SECURE_AUTH_SALT', 'Y>82<GE|7y!3|R<-SslJf,?~Tr8XL*|at-lJ051jS__<<(GvI>D+hu_cu887)i5u');
define('LOGGED_IN_SALT',   'iwj3|r.tr%F7]ED,lg=`(-ES|t7pr4[O+b?[]5d H^M&asWDg&9.A7@0xm[T3 ?3');
define('NONCE_SALT',       ')|lVOkT)v[9m:ebsn|-B&#xVL7l[(Ie4(ka|.gCp3e]C$?pB}ia51FcTS9=..|W9');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_m2n6r8l4_';


define( 'AUTOSAVE_INTERVAL',    300   );
define( 'WP_POST_REVISIONS',    5     );
define( 'EMPTY_TRASH_DAYS',     7     );
define( 'WP_AUTO_UPDATE_CORE',  true  );
define( 'WP_CRON_LOCK_TIMEOUT', 120   );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
