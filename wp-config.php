<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8(Y#X6pS[^#6HorjHDcoxUdP?Lqb+2-j7Bm)>!N4?9Yu*0`ZJ1Mt7X+aaZ`c;mUb' );
define( 'SECURE_AUTH_KEY',  '}U!.wT-V m}L3c:Pq+_LU4FhcC/vz-rCXB!dn)Y#YCFbAsaFM@`xst,|E32}</cX' );
define( 'LOGGED_IN_KEY',    ':wA%H_E%2HC<#lGkmO/:a<dM~$*l1[zn;b4<;xH1x[. }%rN#kTB`HX^Ho`2>mt2' );
define( 'NONCE_KEY',        'R0__!4;<4{=&,lLYAi0#h:+-hSN:B{mSfJ2k<&$Zew+:rZ.:<Iu0##.sx5q}@7GN' );
define( 'AUTH_SALT',        'p1W +j%S-t]NPIr)(E%4f(/Pt-CAt4KT/DE_}&GX8Xu4~<i;!.wu90$.q[J%:|8t' );
define( 'SECURE_AUTH_SALT', ' $Dw[#,R[[*h>Tdn,zi>`zF;_{^E&U.[)Jm+DX}9qb94`=``CR;Mi)G9yi}/lRHl' );
define( 'LOGGED_IN_SALT',   '}^U}?9<fQKY@Z@-c=+uB1k`]z,ji~1wS~]tshS-j}Yh8iCU<lnn`C&:(_a>Z-U2y' );
define( 'NONCE_SALT',       '7dtE5QiFHdE& .-xCl 70PxiW<$HLt}lI7l:/dx],RxNnriDL;@=&rDlYcPpLUtN' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
