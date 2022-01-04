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
define('DB_NAME', 'larenland');

/** MySQL database username */
define('DB_USER', 'benito');

/** MySQL database password */
define('DB_PASSWORD', 'Benito2015!');

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
define('AUTH_KEY',         'Ze=inIN`.w& B~C@)_%wNDryZDob-=i3X2*N_2BCSGC/vLmt<I(ACsB(48XLrR(!');
define('SECURE_AUTH_KEY',  'c)oc<)Zz[N%jZ*nPqB.*9+2Y?n* roZKJTmb^E9)3Qxz9Sa+8@wj,FwbZ* }i050');
define('LOGGED_IN_KEY',    'e~g~o0f|fj[A}y<0@1;A-cNx,)#VMys/_H.M,)kV8e9/gh?CqnP.NoweOhF`p-Mu');
define('NONCE_KEY',        'i{lPWyH4dU M,*|w?L;<Z$+BoQ#tH |DLEo<d#o<->+IDd:Du>))aVxGwHs!sM]G');
define('AUTH_SALT',        '| TU&zW3v?h/)A&NC_cq3huZT:4JN,oi/P (Bv;A^40C7 26}N=-=k}=[_8?+8#m');
define('SECURE_AUTH_SALT', '<iS)6tfU>ct%Vg}z-*-;?_u8wMfV^h}8B.# !1_KSg32 ?3&4?~S-Bf7~O/5!wjd');
define('LOGGED_IN_SALT',   'C}!Jr`OHoISEGTJ4^Dgj>sp>aUb9S_ik:wB@7^5&`oAix=3jCTRNa&U)lsI31y%Y');
define('NONCE_SALT',       'rjM!5$kc4eq2T&`rq},50-fC%KU49eI|pAyPk_!UPbRpZ<|Ql>[+kVyi#$H2v&hM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bl_';

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
