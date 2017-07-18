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
define('DB_NAME', 'ivolgaio_ss_dbname34d');

/** MySQL database username */
define('DB_USER', 'ivolgaio_ss_d34d');

/** MySQL database password */
define('DB_PASSWORD', 'sXu4eCuFS9SY');

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
define('AUTH_KEY', 'IiyIXhK;n?!?Yv+oT{R@bo]^uW(p)m&hIY!o@dkJq*^n<O(syzUyxq+a/<nGA!|f%pxv[is%xsl<g;gpNoO^Rty>dVCC-<z)CXps^IsSSOMTF?w|eh^[FPZmPTQ]PnTS');
define('SECURE_AUTH_KEY', 'tBDHt]ceDq$KV]j/<tu}K%xP|jDJyboceULrmbw-]toCi]()d*D-NokS=Oh_fz<}O+%bv-)}v[R!n@&P_*nx)L|ProC(zg@ISzZghUb?^PtBJIujVBi>D%&;rf/Ux+R!');
define('LOGGED_IN_KEY', 'PLvaYaS;C)@v*ppFR/DpnLBzRH@kjW@qX@MkJhd}HDu?T/UriRKy?RCa&CQQlacao?wqtDc=}=h/{PSgBou<{vtrlFD@XTi]Dd}H%|aD*I&y[/V|k|Y$x@&SUw@miAe>');
define('NONCE_KEY', 'oKl^Rzs[Ko]=XWIu{<ZZX<I@?ZF$uNfRuR-<FSCk];Nh=g)hZA=jIA%[UwgfQc|&Uf})IwQdD[a$UUHF([y_[bI&yZ-&;[X}?*(Mf}HfjafdKD^cU(??EkuGTCgy&b;r');
define('AUTH_SALT', 'ySq|vdlxAUMq*wYPxxom!KkspOg!%zgaGN&Fq]P?w^CDfxLt]rhFin&V(@&]+{/yR;aAqBIT=Vz[AF$M?iY]CfhRhxjtaDL|yKPqkoQEA+YcMIPmy_RrLZmJSih+@Dal');
define('SECURE_AUTH_SALT', 'CiU%QYniXL;%Q){bLh$+^Yq&@&M@%qfb{y+w>>Wq]n&_Fsw?!zYmtYG=+ho$BKA]f?sMA;CTay}yF^wHx[mF$pGHnxn(ZTOTSS;L}CGFYxDRL+qD&)DWF!{E=RvVUD(P');
define('LOGGED_IN_SALT', 'LwKk_qHedYDBUFl=!fgBLer@nlL_XOgvVvp*DX|ZMuiz^fXjQuQyZFPYFJm|hP&GjB(UPtM>qd*O=Yvu&lV!X_fCWU{H?&tn}i(KLpfbI=rZRzdBpV%ZtQjehPs|XyLh');
define('NONCE_SALT', 'GN_u&RmbqUe;CpIMACp+EBZi&<X?r<$B-s)Z(v]BDQJ*oER/>Wq)PKwOC&e%sC%;k}jhG)!|ddTOI[W+d*Q+n-tH}b@skmLyVIc$^O^b>LfoMsAm$^?!/luLr}rr(qz^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_kvol_';

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
