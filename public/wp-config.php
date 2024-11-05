<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/dh_8vqth2/bmi.teressaellison.com/public/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'bmi_teressaellison_com');

/** MySQL database username */
define('DB_USER', 'bmiteressaelliso');

/** MySQL database password */
define('DB_PASSWORD', 'bXA5!sNx');

/** MySQL hostname */
define('DB_HOST', 'mysql.bmi.teressaellison.com');

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
define('AUTH_KEY',         'K")y`y2/X;$d21+4A(_QVjUK&tDzTgDS%Esh)y9k)3tBzSccIv@9GJwoj%McO6Mw');
define('SECURE_AUTH_KEY',  'y)2TOIDC^^g^/^cNy6C%^~Gz*(SRo%jJosF&Z:NpcQ*(Q$WGpg^Rlm&`ziMYQeq*');
define('LOGGED_IN_KEY',    'HIMe:MxMp^6Z2wT^FMR&mw5R/@t$gltZ`9pSN0dn`(4;%A@ckm%T?dd+X/:0@ANJ');
define('NONCE_KEY',        'FQKfdW"%/mBA1hChNf+H@(E|BtR0Gb0A%B)g`PBg~TDCgH:TZnH52Q"VHoHA^jiE');
define('AUTH_SALT',        'Jm"86ZU!4eCVZQBVKg+I:GYaTXQ|`71|ao|u+#aeDSZEvF?IDcx1yAcRsGf7u%GZ');
define('SECURE_AUTH_SALT', 'C7qe8P5/4In273W^8eXKqC2vqvZeu&Shrs&@Z#Lrp9jO5WUhH%J_ewkUSxH^`KX%');
define('LOGGED_IN_SALT',   ';ytq+DYWtz8CRL*fsjOjwgDM"Msqp$U!7TpD6NlbQ)HVBl!?(evS"D:@8FsG3|NC');
define('NONCE_SALT',       'VpWTGAsMUqjWM`JQQ3fh/cg6nBLim/#3sxJjSf/n)Mstu`V!8Z?LHc@uQj/2O66d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_6ndg2m_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (isset($_SERVER['HTTP_HOST']) && preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
        define('JETPACK_STAGING_MODE', true);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
