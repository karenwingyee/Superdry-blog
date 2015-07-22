<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'superdry');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '%_7o=|m]9[53M UniW]%?@4Sdw~+P<$;-!HndzJTu6%FcY28zw(pkm_+-~(zT-|t');
define('SECURE_AUTH_KEY',  'QCUA]1<>ZH`<in.p6cckte/i`o;L]k:J[1e|]4wEG&E+sZmB|+MF*~Xg[aCDdN;^');
define('LOGGED_IN_KEY',    '1u[)7ySqf+hW%54qvaJKe]4>TQ8RzZi{tSL^pF.w2;H,!bAD7:[~I_]YL!C[I)IS');
define('NONCE_KEY',        ',y,o]U{_Cslwgkp_.Co7oas EqELx#$W=xApsu.ybY@<Zv;M&a NWs..{N5fQ-g>');
define('AUTH_SALT',        '_4K](eGA3Mjt/5KcG:=<B[uplE%!70+4%)@q[O)_]urB0%e|+Qko!r!j]]qtx68-');
define('SECURE_AUTH_SALT', 'VdrRmZPs]Hw.|38MAJ:?N8~J*c^IUb0bTbvsp%/_7HW3X@SSx)_+;gFkBn$[`c2e');
define('LOGGED_IN_SALT',   'I<!@=/g-%9oo:Gi:cmV:UwkL>7dBN(4B1]S?nYGc9+U;9i~pHUo`=VHiQ|1xUjD2');
define('NONCE_SALT',       'Pz][s%Eu00QSkxtYM$+Nw?|ih]chJnp^OXjmUnTCRe/ZO=Hpu {0-7|qYX?ncI|P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
