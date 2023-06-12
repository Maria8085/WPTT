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
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_test_seo' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
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
define( 'AUTH_KEY',         '#GcpDs`ers5PvCWn5#U;HWDRkD7/ZYb0!9( H7R|:JU/k>BJCsmjPVLnOoGq@4lo' );
define( 'SECURE_AUTH_KEY',  'o+Lqpb`4AXZWXf>3m-!H`Z*U,X(pm:Vx1L[1Zp[_$}#/?~l%U!DGXooS7$~6%mbt' );
define( 'LOGGED_IN_KEY',    'vxbQ@s_cW`]V9]D>cn5}dH<,0ZL8U9|Ev)b?$}xRmue4/=LMi.$7=if`?R5U:1X4' );
define( 'NONCE_KEY',        '/HkOI*o45;3(;{96GsO?E5Ze!ZeWKUr+%/mB0Cxc!5T{mL+y]Uw8jqP)uq6&^keT' );
define( 'AUTH_SALT',        'v0k*,@{^rmyq~`XUQk(w>/R(0Nqtfu=7c,22}svcZ^[G28*LAQRs3jVkVf-~7vI^' );
define( 'SECURE_AUTH_SALT', '%(lL*%$u2Zi&3+BwxeaafadxHs$=cD#|a[i2oCLZ144mP|RK@_4`iiDhju_E0(f9' );
define( 'LOGGED_IN_SALT',   'Uy)U%~UOc7g}WDe;uao{pVN8,/i#TZZTJo+4D*Q:kmC+y{PqohT%c@>2yDV[jh/f' );
define( 'NONCE_SALT',       '!, $W:|]%J+}/H:^^Ke^YcA{lDkI;u#L$+uwi(%c4dVcD&ZOB.5/,`a4VzESwgaq' );

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
