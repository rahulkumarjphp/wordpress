<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wedding-safa' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'D&gd`/w#5!,GvoXdSXqIW!A,=4G8z Q46Flul.,)p)eY?m7HR|kN[=gSsqAH1{3u' );
define( 'SECURE_AUTH_KEY',  'Uazv=ZHEUBE*M2JY1GGV?&Be(J%O#d;Z-Iidh3UhvO{^EMx(3sJ%hq0JfSPw8,=W' );
define( 'LOGGED_IN_KEY',    's.BS `EQ5xp<TGF$j-{q}ed6X60RxIW{0?uKqU*e/4{/DKY%W)jR|_c.WA&T]dJK' );
define( 'NONCE_KEY',        'm?@$= nZH_V6vV^FsZ|(W;Q}ZR%~Z@DJmd6**c-F}d~563DIl5SK[Y6DOHDlFW<p' );
define( 'AUTH_SALT',        'ZNSsSk|wW8tK/@c9X50PQmbt(}Fq9$!>P,whdG9-3zxtRaw~c(?Y?fl;`Fok<WjC' );
define( 'SECURE_AUTH_SALT', 'rnS$HsaHG1>wA3?H[a6W:PaPFkc,CueD_9+cj20LG[r<n&OYfGWj9k8WbgwSI[-p' );
define( 'LOGGED_IN_SALT',   '_gkd<>f[5B|=O38UhwRCPb$6z{vC*}EIDe@LM]`DO)V8$:^SDyja?&D{&r6UC{<~' );
define( 'NONCE_SALT',       'gs^[rhu>aA>/; </>Jjy/fdS{7=;puc[oDA_%#%szod ffs7<6oZP6jzuFhT)?^W' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
