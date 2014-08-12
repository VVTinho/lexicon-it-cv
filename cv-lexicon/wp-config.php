<?php
/**
 * Baskonfiguration f�r WordPress.
 *
 * Denna fil inneh�ller f�ljande konfigurationer: Inst�llningar f�r MySQL,
 * Tabellprefix, S�kerhetsnycklar, WordPress-spr�k, och ABSPATH.
 * Mer information p� {@link http://codex.wordpress.org/Editing_wp-config.php 
 * Editing wp-config.php}. MySQL-uppgifter f�r du fr�n ditt webbhotell.
 *
 * Denna fil anv�nds av wp-config.php-genereringsskript under installationen.
 * Du beh�ver inte anv�nda webbplatsen, du kan kopiera denna fil direkt till
 * "wp-config.php" och fylla i v�rdena.
 *
 * @package WordPress
 */

// ** MySQL-inst�llningar - MySQL-uppgifter f�r du fr�n ditt webbhotell ** //
/** Namnet p� databasen du vill anv�nda f�r WordPress */
define('DB_NAME', 'vvt_mediadesign');

/** MySQL-databasens anv�ndarnamn */
define('DB_USER', 'vvt_mediadesign');

/** MySQL-databasens l�senord */
define('DB_PASSWORD', 'nP7cNWec');

/** MySQL-server */
define('DB_HOST', 'vvt-mediadesign.se.mysql');

/** Teckenkodning f�r tabellerna i databasen. */
define('DB_CHARSET', 'utf8');

/** Kollationeringstyp f�r databasen. �ndra inte om du �r os�ker. */
define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * �ndra dessa till unika fraser!
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan n�r som helst �ndra dessa nycklar f�r att g�ra aktiva cookies obrukbara, vilket tvingar alla anv�ndare att logga in p� nytt.
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
 * Tabellprefix f�r WordPress Databasen.
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 * prefix. Endast siffror, bokst�ver och understreck!
 */
$table_prefix  = 'wp_';

/**
 * WordPress-spr�k, f�rinst�llt f�r svenska.
 *
 * Du kan �ndra detta f�r att �ndra spr�k f�r WordPress.  En motsvarande .mo-fil
 * f�r det valda spr�ket m�ste finnas i wp-content/languages. Exempel, l�gg till
 * sv_SE.mo i wp-content/languages och ange WPLANG till 'sv_SE' f�r att f� sidan
 * p� svenska.
 */
define('WPLANG', 'sv_SE');

/** 
 * F�r utvecklare: WordPress fels�kningsl�ge. 
 * 
 * �ndra detta till true f�r att aktivera meddelanden under utveckling. 
 * Det �r rekommderat att man som till�ggsskapare och temaskapare anv�nder WP_DEBUG 
 * i sin utvecklingsmilj�. 
 */ 
define('WP_DEBUG', false);

/* Det var allt, sluta redigera h�r! Blogga p�. */

/** Absoluta s�kv�g till WordPress-katalogen. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Anger WordPress-v�rden och inkluderade filer. */
require_once(ABSPATH . 'wp-settings.php');