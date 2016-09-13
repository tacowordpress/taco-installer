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
require_once __DIR__.'/../vendor/autoload.php';
 $dotenv = new Dotenv\Dotenv(__DIR__.'/../');
 $dotenv->load();
 $dotenv->required([
   'ENVIRONMENT',
   'DB_USER',
   'DB_HOST',
   'DB_PASS',
   'DB_NAME',
   'DB_SAVE_QUERIES',
   'WP_AUTO_UPDATE_CORE',
   'WP_DEBUG'
  ])->notEmpty();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('ENVIRONMENT_DEV', 'dev');
define('ENVIRONMENT_STAGE', 'stage');
define('ENVIRONMENT_PROD', 'prod');

define('ENVIRONMENT', getenv('ENVIRONMENT'));
define('DB_USER',     getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASS'));
define('DB_HOST',     getenv('DB_HOST'));
define('DB_NAME',     getenv('DB_NAME'));
define('SAVEQUERIES', (bool) getenv('DB_SAVE_QUERIES'));

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
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv('DB_TABLE_PREFIX');

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
define('WP_DEBUG',  (bool) getenv('WP_DEBUG'));

define('WP_AUTO_UPDATE_CORE', (bool) getenv('WP_AUTO_UPDATE_CORE'));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
