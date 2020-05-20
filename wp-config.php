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
define( 'DB_NAME', 'sheludko-vitalya_wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'user' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'W&<m~(_f$tjL_{#t&%dDAab7BvjODIN9s@=Cv/iT<[=hZ;jRC(gqZ!yLsq=]su9j' );
define( 'SECURE_AUTH_KEY',  'fn]X%]W0xKd<@~#G4r6ep_KF~xp=1e[L=*6{n5!?ODccvPi&:8T%xF2{z:b,v=b8' );
define( 'LOGGED_IN_KEY',    'zk@cd#BnN-E_pi3+LAXW_YmruQcNsJ;~0h^tJ.{pg_(a9c]RI`djzN/1j0A#<}-u' );
define( 'NONCE_KEY',        '!3bQ2hD70K)Sojn3+Z$I?|c+d@yGopFpg)kOqzTj47Sb%,(;H/,DSeJ&vLXhKE(h' );
define( 'AUTH_SALT',        'A2G#K#{|&o}1+!S7j6wb/RS$_5U:5`0/z@=Eu98-CZ?t#J>G~hv!)z/.I[buHp6C' );
define( 'SECURE_AUTH_SALT', 'zh)1`b.wd=Cmt?ft8YIHo^k?_=n|k^U>/|*#*iFIL{*k:`?aly3P*VH2+?NFQdlv' );
define( 'LOGGED_IN_SALT',   'riABtVv3r_8Gpk89:%>Q$xr6=l97ecI`0c#Z-l~mnvWf%+o|:3DQu}9{FX6DvBK9' );
define( 'NONCE_SALT',       '.S^=+Nfe(Q5?G2@/1`q?*LY-t#& rr[}CR.lLbPTl5O~Wa;*j6uSx7x+t]payG-o' );

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
define( 'WPCF7_AUTOP', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-custom-settings.php' );
