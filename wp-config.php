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
define('DB_NAME', 'ar-aviation');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'gmg@123');

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
define('AUTH_KEY',         '?t1x|zwk.UsZ?r?F,u,0Te#99{r*-Mulr%NrC=bUy[lV:I&YI9AQ>Js:*Cz[8s[]');
define('SECURE_AUTH_KEY',  '$[M+eiL(Ez2}lFq:?oegu;ta%)h|eN@?wz-Rm`]O|]afLF4n$>H%k+>./|~AW2B^');
define('LOGGED_IN_KEY',    'oIiscMs?-B`lK.a0g3mnAg%bPdB/h)C5/bQxec(DIL]Tw9{%GDlY(l*E^7F4:t&0');
define('NONCE_KEY',        'T1{PTVKf:Fr$=K .`[}rmr`H<m`tO?_O0#G7iR?C*qMk@6m5C?:e{+gR:iGJ;9R<');
define('AUTH_SALT',        '@t!AIA)<K*XE=7w}cgAT$|l}o<>!nm9a/ZOB&Sm_6(:-VpKQAYYj8FmaJ:PpIsMK');
define('SECURE_AUTH_SALT', 'ogpVSU2RS#4fuB!Bc_$)(*0Qdz)!nq(q]Gq09R}O`vrRYQCmqr{CAHh-3-;R hfY');
define('LOGGED_IN_SALT',   'k[QDhPz.U|lO5)o__mUw5A,x(,5[f.;9OL(dmk$gt%-,61+n/]GEFpaKxHa_E@0z');
define('NONCE_SALT',       'FW,qRUzym9hE?yl^,nW>Z]L;Az*p9l&{~H@C6wlXNw;&*`B^*wDa9Y/y$8eftXO@');

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
