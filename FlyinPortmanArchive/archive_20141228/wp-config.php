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
define('DB_NAME', 'flyinpor_wor1621');

/** MySQL database username */
define('DB_USER', 'flyinpor_wor1621');

/** MySQL database password */
define('DB_PASSWORD', 'VUfvL6IjTaJW');

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
define('AUTH_KEY', 'FFO<Fw+XCo+}$<Zp&NBYLC^NTIcxbbcBZl;<eeg]vX;JZmgPhgSp}tAHtY_$PQzmb{ra)GG$B[{ykD?jyZSyXNySn[;kkb!ZQFbRf+SSv&DKpf?GV(]Ut>^JVx^xKAFc');
define('SECURE_AUTH_KEY', 'aH*qNAx}sO-udlqt}KKk/${ATwS^*knVQ+(({BJm*_SHspwFHdxgp@dREhe(gWi?VG%xbO/S@>MK-IhVm<[tf[+Hc@?DESv|@wRU&wRbolpT&z)J!/Ata)!Xo{%aTAcY');
define('LOGGED_IN_KEY', '(isEkuP&)@_I*v}CBqK<J;ieXfFZ%|x@zrEkp&<;(dCL!l;aLIUYxL=KWrPaQ(nz]QKaOPtu/[;Wxe^ryJMe+/mGOIUHDSODebaO|;=%ztu<h(vsDX[)CgYc*E}s<EPE');
define('NONCE_KEY', '$uh]i@pfmCQUbF%+}AOq;+AFlSCI^/G;y{nTMIU/%l*=|hrj/(gd_fN(b=LLVMuyjxyXMeOyy_!A=>^GsWySQmQ)T}k)_Js_%!nW{pyafAW)NmQrDzg+*Ij<)u*T/lje');
define('AUTH_SALT', 'A^/EHSCn!v@OY$AZ)XKle-RgjZ-_(&UbKMMFh_@x(wIP?c&;ka)m@xU(/+x[LVnw[K<}(IRfvHSvKWm*iTHmIFF+IP&frTxuwYOCD>r!|DS$Oxv$$^nc^dPc{nPXl/G?');
define('SECURE_AUTH_SALT', '@s[GVvy=_NIx&WX]Od^uFo_%vxtd/%Zw){zUMI$^&uk-pt%AdlJd@PRAQ?C*+g_wiS{Q-<>yjwbgNO?kBZ;)O}N=PnrgDvI;^m}!PlGVMUK^WwfO}HwH_AYNiuC;m-Q!');
define('LOGGED_IN_SALT', 'B}{lQwW_jfklQjfJ+oSG@>FJ;e|BCczXJ&]p(CGvV!E}qboIv};Ttb=$XUOgvvzK-tjDY_w?afqsalNbDG;kcsJ[md(/^VixU*G^xS@*=lPv[QJhN/k?$p|*}/w&u[$Y');
define('NONCE_SALT', '[NW?g*IKV^-K^bTTn+|vsMyQe!C-r+($]wi>{yEd+MadBzD$X-_|peZ_$A]TP[u|t]-)reuGG@nj+{XTpoeKB*iwBMM=lxc*$Sse=dq&WznwMZ!pjjla$a/eRN$}Y&^R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_qufo_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
