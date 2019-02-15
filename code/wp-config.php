<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'webproje_claro');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'webproje_claro');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Yw-K2hu!oCip');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '}=,`3eLrK+#fY(OMcUO3Efw=k;oe-k,WkBtQ<AO-Z)GIC;j%yg$h+xfZpLk&ISj#');
define('SECURE_AUTH_KEY', '=F|T(g&etB2,B{ms@)h:i&jdmF43/*U,ci2f&HI%aly!H&: oE}_$<+`l6+9s{DX');
define('LOGGED_IN_KEY', '?IGsxAr?M7e:P7zxRq8RyUROz|Tq,xo? hEJpT=Dn9YQ9fo;Q;,|5]_mA6s;`{a|');
define('NONCE_KEY', 'cAhD(Htb`D#9M93.lB;4h``P$cO|)Y@h[1P?k3eRXJL#+Ua0Hh /PiFheyq,xc?M');
define('AUTH_SALT', 'bpjr`d=e>`zUADo7TY)chdY&TsxoIo ,C3CiP*V$IlrT![as9w@.G<&R}Q&bK`|%');
define('SECURE_AUTH_SALT', 'c]P5hz*q`)f`LD*#z>r[>RRyEPhAqNmB`lB?:;|;jAQD[Nm|_91 !:,/K1_rA5f6');
define('LOGGED_IN_SALT', 'zK%?YIf+[sTK_0rRwbOq_c30D5P,8]PE$.ZIeuw[)]km$y-nW([)a0JHz2Y]$-#(');
define('NONCE_SALT', 'xZ;[r*aGv%dyMd>l2.W.}4)D#xmH~N_5QpxIVJyLhZIMfq?Y{:EZ%k/;d5hD~|Ao');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'cl_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

