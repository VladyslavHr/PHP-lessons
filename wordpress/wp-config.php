<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
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
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '4<-B]8KUJsOLVxc31|x){t;~GAH^S?.IWh{YH<Yo`XN7t7eg}0BY^7`|fem0Esia' );
define( 'SECURE_AUTH_KEY',  '?PL%y|oCX  -.-T2`CgEAD1=>5.*]H2Z sR8?H_0(GKPa& YxST/kbhUSLz+A}tU' );
define( 'LOGGED_IN_KEY',    'S7o~/k0_L&H%Kma)fsb%?`3&R@C{=9iF%EHak// xhp,,$S|2KS3.w.^hHr`]C$^' );
define( 'NONCE_KEY',        '*m<DxBu$/Izt#8v,MuPp|1A&^>!a?jGSKyCkwz4}WhZe&YKi*Ve3 rl,;2cdOm|#' );
define( 'AUTH_SALT',        ':}b.$&v2M:a4/iV1kd17WW5OE!c&~[^rrSU^L4$+`v3+sjNcU8}HSX^B&`ua}NES' );
define( 'SECURE_AUTH_SALT', '^s)?<^&;=nC |J|w!!][3b`5VP2X0[Flx`@%ea.oz}!nnOA!WCBjhX}z}YV{q[w^' );
define( 'LOGGED_IN_SALT',   '(PCBWcvN3ctuV*&W&54)U_#]n1[f =jwD)3%^=k#PIwO1gW:.8DF,60e!MBg?43V' );
define( 'NONCE_SALT',       'H>-^gY,.kWR&XmrTC!6)>a!$3n,@gOd6,OvukIIMbQ07yIj}ES{^_hI700*U)K$*' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
