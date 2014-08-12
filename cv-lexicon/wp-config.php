<?php
/**
 * Baskonfiguration för WordPress.
 *
 * Denna fil innehåller följande konfigurationer: Inställningar för MySQL,
 * Tabellprefix, Säkerhetsnycklar, WordPress-språk, och ABSPATH.
 * Mer information på {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter får du från ditt webbhotell.
 *
 * Denna fil används av wp-config.php-genereringsskript under installationen.
 * Du behöver inte använda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i värdena.
 *
 * @package WordPress
 */

// ** MySQL-inställningar - MySQL-uppgifter får du från ditt webbhotell ** //
/** Namnet på databasen du vill använda för WordPress */
define('DB_NAME', 'vvt_mediadesign');

/** MySQL-databasens användarnamn */
define('DB_USER', 'vvt_mediadesign');

/** MySQL-databasens lösenord */
define('DB_PASSWORD', 'nP7cNWec');

/** MySQL-server */
define('DB_HOST', 'vvt-mediadesign.se.mysql');

/** Teckenkodning för tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp för databasen. Ändra inte om du är osäker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Ändra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan när som helst ändra dessa nycklar för att göra aktiva cookies obrukbara, vilket tvingar alla användare att logga in på nytt.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{Ux2y4}BKD(Wg/,-9/|DXy&u,3fIRS?&fQK~}c=+Oj2_5(t<F[n(TJ98&^xa/%<y');
define('SECURE_AUTH_KEY',  'AuO{y++BBVA;/RUG.J|}5m)iU=?@~mlnUGp9_A>AOY06L`o:0xQxsIr>BQ-Jlx+O');
define('LOGGED_IN_KEY',    'kY`vic/./ZA.Q[vpA1Q>iVcAg=&dp*Wd%_Y-vh)>%:pH-+8dUQiEQ!D<$<6*S3v4');
define('NONCE_KEY',        'tdTu:-+Jr3G3{`MDa<V{l&VQoJ|]8Lzwx4|RF?$(%JP,*1^JBCe+o?EClOZ|VcaT');
define('AUTH_SALT',        '|%*CK2H:(8g0=GMoM:(J6)_|KZt+%}DUt=bc%74Ot5-rhX@+w5` |vq{chiEO|(t');
define('SECURE_AUTH_SALT', '<EN-#q)7[7dvF:)|Zbho )dpUJ=ZyCEZH+VVP5oV,L|)O&Y6h!|s|aQ%50>`7?$P');
define('LOGGED_IN_SALT',   'C+M7Pq[3zR+o]weWlj>ZV5M1N5t%I`~;<`lvsL.4]&;r@m>hD7vN0o673)r@Vv w');
define('NONCE_SALT',       '68B}jZN^%=.T4(&f-NsZin$f6=xe]Fig}I.+OL1JOLef4V9&+K_-z+h)k>RBPo_8');

/**#@-*/

/**
 * Tabellprefix för WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokstäver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-språk, förinställt för svenska.
 *
 * Du kan ändra detta för att ändra språk för WordPress.  En motsvarande .mo-fil
 * för det valda språket måste finnas i wp-content/languages. Exempel, lägg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' för att få sidan
 * på svenska.
 */
define('WPLANG', 'sv_SE');

/** 
 * För utvecklare: WordPress felsökningsläge. 
 * 
 * Ändra detta till true för att aktivera meddelanden under utveckling. 
 * Det är rekommderat att man som tilläggsskapare och temaskapare använder WP_DEBUG 
 * i sin utvecklingsmiljö. 
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera här! Blogga på. */

/** Absoluta sökväg till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-värden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');