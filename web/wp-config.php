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
 * @todo Use just one wp-config file for any environment. The script must have just read environment variables to
 * create the configuration.
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'DB_NAME' ) );

/** MySQL database username */
define( 'DB_USER', getenv( 'DB_USER' ));

/** MySQL database password */
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );

/** MySQL hostname */
define( 'DB_HOST', getenv( 'DB_HOST' ) );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', getenv( 'DB_CHARSET' ) );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', getenv( 'DB_COLLATE' ) );

define('FS_METHOD', 'direct');


/**
 * WP Mail STMP integration
 * https://br.wordpress.org/plugins/wp-mail-smtp/
 */
define( 'WPMS_ON',              true );
define( 'WPMS_MAIL_FROM',       getenv( 'WPMS_MAIL_FROM' ) );
define( 'WPMS_MAIL_FROM_NAME',  getenv( 'WPMS_MAIL_FROM_NAME' ) );
define( 'WPMS_MAILER',          getenv( 'WPMS_MAILER' ) );
define( 'WPMS_SET_RETURN_PATH', getenv( 'WPMS_SET_RETURN_PATH' ) );
define( 'WPMS_SMTP_HOST',       getenv( 'WPMS_SMTP_HOST' ) );
define( 'WPMS_SMTP_PORT',       getenv( 'WPMS_SMTP_PORT' ) );
define( 'WPMS_SSL',             getenv( 'WPMS_SSL' ) );
define( 'WPMS_SMTP_AUTH',       getenv( 'WPMS_SMTP_AUTH' ) );
define( 'WPMS_SMTP_USER',       getenv( 'WPMS_SMTP_USER' ) );
define( 'WPMS_SMTP_PASS',       getenv( 'WPMS_SMTP_PASS' ) );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY',  getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY',    getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY',        getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT',        getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT',   getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT',       getenv( 'NONCE_SALT' ) );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv( 'DB_TABLE_PREFIX' );

if( 'development' === getenv( 'ENV' ) ) {
	// Enable WP_DEBUG mode
	define( 'WP_DEBUG', true );

	// Disable display of errors and warnings
	define( 'WP_DEBUG_DISPLAY', false );

	// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
	define( 'SCRIPT_DEBUG', true );
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
