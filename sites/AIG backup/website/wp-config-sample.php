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
define( 'DB_NAME', 'aiggroup_new' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'microklad' );

/** Имя сервера MySQL */
define( 'DB_HOST', '62.109.4.90' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8_bin' );

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
define( 'AUTH_KEY',         '}HB`!Oh:wM9m3~43dqjLW8X[Z!:j!TJB_~<Qx`AZ&Y6@R-3QQS_xWX/djVV0I9wx' );
define( 'SECURE_AUTH_KEY',  'p$R7fIbL(y6B]Rk!Zo/Z3zkM&=7$vpG+ui%KSWD+b0;OZD<LNp2a_`Y^ZwQ.K,7,' );
define( 'LOGGED_IN_KEY',    'SO?%_uYKEmneP6F#Cvmk(75IY5LZU}?#PjEN[s6 rbQjLGfO^q*nb6-,|0V/Nrb!' );
define( 'NONCE_KEY',        '#Lb9YBBk*K:Z,K;|ryK.Jm_xfy`*[.>n6!~HR{A<wu+Df INL*yErKE951bW<Uy/' );
define( 'AUTH_SALT',        '|@|I6Kme1f,ue]mKoIa>9JR[Q^LuJmY0#MM3l3#|5:HI6(p{pWFd.Lu5A;hl|=}H' );
define( 'SECURE_AUTH_SALT', 'FM2^V,yj7QrS{V0ppZv9W2 #@$)vg>D#!W~),&Ho~46_[~bAV~#)}HZ)],0=&7eY' );
define( 'LOGGED_IN_SALT',   'cj+)`s~i*T.5R-1m0PQH^_kTx=*:Iq=l]LT:| bnOEBNso&jMg3L8p}:w,;[tH3_' );
define( 'NONCE_SALT',       '<%AR;0sZW;:8CRSK)zp^r#aCNs-x`Bc)w9P^X]ljq Cq>O@^i`]0k!Np}j09rFJM' );

define( 'RECAPTCHA_SITE_KEY',       '6LeqYt4UAAAAAAvOa5Qtd50tcfOWppt_jSJmsxvh' );
define( 'RECAPTCHA_SECRET_KEY',       '6LeqYt4UAAAAAN_Ik5081iOUYCZcm0SruKAzNtl6' );
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
