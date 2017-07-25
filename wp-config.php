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
define('DB_NAME', 'arte_em_dois');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'zo<7M:D%gfjvVV=WDH`Br[wq0Hk0>BLWDAV7RM$_TeNK4^LiOoFN@9^$GKijsF.B');
define('SECURE_AUTH_KEY',  'Fo(3~&Y8E|[1Q]@.9k@Pok^[M`tIdpahw5IB`NzrG7,6q>4DPJQR5,gQ?LG9L^Oe');
define('LOGGED_IN_KEY',    '% Ecop3jeGHnWz2x1*fIg#T^_-5xZ36cd~{0Np9jbu-c6KNX|E2wBL3>]zP7>*p&');
define('NONCE_KEY',        '_h +IlfPx-~z(x&f:y;0=a;(SfNI3)UO;(5RdpDT,qJX_ATH>hR,:Vt3-,710:C2');
define('AUTH_SALT',        '}>4n<DCd[P52g`wH&ZIkKHUEmrXHg&#0w}{eI$&!m;|_<Fsc#-C])[zk1^j]N@o{');
define('SECURE_AUTH_SALT', '|Dx*iB<c+3hfj`m~-l$0bTUN`q*gN=L0L 2VoD?`9(~=_t5D ShJM]P@K=I$yNg~');
define('LOGGED_IN_SALT',   'uxvNPcWNP3w<+kobxI.c$Pk}=.E!]s{k9eJr~,dM6ep(,hd1 /rA7mT]oVp)W1DA');
define('NONCE_SALT',       '/Q@|-.[l.S_$l:z5WZw SxydH.xuEYB*4&Q,noCR/kp7|_tcl oHPNbJMqa.yn<)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ad_';

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
