<?php
/****************************************************************
 * DO NOT DELETE
 ****************************************************************/
if ( get_stylesheet_directory() == get_template_directory() ) {
	define('ALETHEME_PATH', get_template_directory() . '/aletheme');
	define('ALETHEME_URL', get_template_directory_uri() . '/aletheme');
}  else {
    define('ALETHEME_PATH', get_theme_root() . '/fuerza/aletheme');
    define('ALETHEME_URL', get_theme_root_uri() . '/fuerza/aletheme');
}

require_once ALETHEME_PATH . '/init.php';

include_once("lib/class.phpmailer.php");
include_once("lib/CURLmail.php");

load_theme_textdomain( 'aletheme', get_template_directory() . '/lang' );
$locale = get_locale();
$locale_file = get_template_directory() . "/lang/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);

   function create_issue($data)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Basic  $user ",
        ));
        
        $encoded_data = json_encode($data);

        curl_setopt($ch, CURLOPT_URL, 'https://jira.aiggroup.ru/rest/api/2/issue');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
	   
        curl_close($ch);


	    // Получаем самую раннюю заявку, находящуюся в работе
        if ($data['fields']['project']['key'] === 'HOTLINE') {
            $token = $_POST['token'];

            if (check_recaptcha($token)) {
                $ch2 = curl_init('');
            
                curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
                    "Content-Type: application/json",
                    "Authorization: Basic  $user ",
                ));
            
                curl_setopt($ch2, CURLOPT_URL, 'https://jira.aiggroup.ru/rest/api/2/search?jql=project%20%3D%2011403%20AND%20status%20%3D%20%22To%20Do%22ORDER%20BY%20updated%20ASC');
                curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch2, CURLOPT_HEADER, 0);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

                $earliest_issues = json_decode(curl_exec($ch2));

                $issue_data = json_decode($result);
                $issue_data->new = parse_issue_key($issue_data->key); // Номер заявки в системе
                $issue_data->current = parse_issue_key($earliest_issues->issues[0]->key); // Номер последней выполняемой заявки
                $issue_data->count = count($earliest_issues->issues); // Количество активных заявок
                
                $result = json_encode($issue_data);
                echo($result);
        
                curl_close($ch2);
            } else {
               echo json_encode( array("error" => "Вы не прошли проверку от спама.") );
            }
        }
    
        return $result;
    }

    function check_recaptcha($token) {
        $url_google_api = 'https://www.google.com/recaptcha/api/siteverify';
        $secret = RECAPTCHA_SECRET_KEY;
        $query = $url_google_api.'?secret='.$secret.'&response='.$token.'&remoteip='.$_SERVER['REMOTE_ADDR'];
        $data = json_decode(file_get_contents($query), true);
        $score = $data['score']; 

        if( $data['success'] ) { 
            return $score >= 0.5;
        } else {
            return false;
        }
    }
    
    function parse_issue_key($key) 
    {
        preg_match('/(?<=HOTLINE-)\d*/m', $key, $matches);
        return $matches[0];
    }

   function add_file_issue($attach_files, $issue_id)
    {

        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_id/attachments");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $attach_files);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	
	
   function create_comment($comment, $issue_key)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
            "Content-Type: application/json",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_key/comment");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $comment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	
		
   function get_issue($issue_id)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
            "Content-Type: application/json",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_id");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	
	function get_data($project, $phone, $name, $inn, $type_request){
		 $data_create_issue = array(
                    "fields" => array(
                        "project" => array(
                            "key" => $project,
                        ),
                        "summary" => 'Заказ обратного звонка AIG',
                        "description" => "Телефон: $phone \n ФИО: $name \n Цель: $type_request \n ИНН: $inn \n" ,
                        "issuetype" => array(
                            "name" => "Задача"
                        ),
                    ),
                );
			return $data_create_issue;
	}
	function get_data_feedback($project, $name, $mail, $message){
		 $data_create_issue = array(
                    "fields" => array(
                        "project" => array(
                            "key" => $project,
                        ),
                        "summary" => 'Обратная связь с сайта АИГ',
                        "description" => "Email: $mail \n ФИО: $name \n Сообщение: $message \n" ,
                        "issuetype" => array(
                            "name" => "Задача"
                        ),
                    ),
                );
			return $data_create_issue;
	}

	function get_data_with_executor($project, $phone, $name, $inn, $type_request){
		 $data_create_issue = array(
                    "fields" => array(
                        "project" => array(
                            "key" => $project,
                        ),
                        "summary" => 'Заказ обратного звонка AIG',
                        "description" => "Телефон: $phone \n ФИО: $name \n Цель: $type_request \n ИНН: $inn \n" ,
                        "issuetype" => array(
                            "name" => "Задача"
                        ),
						 "customfield_10400" => array(
                            array(
                                "self" => "https://jira.aiggroup.ru/rest/api/2/user?username=n.kulikova%40aiggroup.ru",
                                "displayName" => "Наталия Куликова",
                                "emailAddress" => "n.kulikova@aiggroup.ru",
                                "name" => "n.kulikova@aiggroup.ru",
                                "key" => "n.kulikova@aiggroup.ru"
                            ),
						)
                    ),
                );
			return $data_create_issue;
	}

	function get_data_earliest_issue($project_id){
		 $data_create_issue = array(
                    "fields" => array(
                        "project" => array(
                            "id" => $project_id,
                        ),
                    ),
                );
			return $data_create_issue;
	}

/****************************************************************
 * You can add your functions here.
 * 
 * BE CAREFULL! Functions will dissapear after update.
 * If you want to add custom functions you should do manual
 * updates only.
 ****************************************************************/


/*Подключаем стили*/
// wp_register_style( 'home_page_style', get_template_directory_uri().'/css/home_page.css' );
// wp_register_style( 'about_page_style', get_template_directory_uri().'/css/about_page_style.css' );
// wp_register_style( 'general_style', get_template_directory_uri().'/css/general.css', array(), filemtime( get_stylesheet_directory() . '/css/general.css' ) );
// wp_register_style( 'ourProduct_style', get_template_directory_uri().'/css/ourProduct_page.css' );
// wp_register_style( 'news_style', get_template_directory_uri().'/css/news_page.css' );
// wp_register_style( 'font_awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css' );
// wp_register_style( 'all_single_style', get_template_directory_uri().'/css/all_single_style.css' );
// wp_register_style( 'footer', get_template_directory_uri().'/css/footer.css' );
// wp_register_style( 'service_style', get_template_directory_uri().'/css/service_style.css' );
// wp_register_style( 'header', get_template_directory_uri().'/css/header.css' );
// wp_register_style( 'ourReview_style', get_template_directory_uri().'/css/review.css' );

register_aig_style( 'home_page_style', '/css/home_page.css' );
register_aig_style( 'bootstrap', '/css/bootstrap/css/bootstrap.min.css' );
register_aig_style( 'about_page_style', '/css/about_page_style.css' );
register_aig_style( 'general_style', '/css/general.css' );
register_aig_style( 'ourProduct_style', '/css/ourProduct_page.css' );
register_aig_style( 'news_style', '/css/news_page.css' );
register_aig_style( 'font_awesome', '/css/font-awesome/css/font-awesome.min.css' );
register_aig_style( 'all_single_style', '/css/all_single_style.css' );
register_aig_style( 'footer', '/css/footer.css' );
register_aig_style( 'service_style', '/css/service_style.css' );
register_aig_style( 'header', '/css/header.css' );
register_aig_style( 'ourReview_style', '/css/review.css' );

function register_aig_style($handle, $src, $deps = array()){
    wp_register_style( $handle, get_template_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ) );
}

/*Подключаем скрипты*/
wp_register_script( 'mask_jquery', get_template_directory_uri().'/js/input-mask/jquery.inputmask.js' );
wp_register_script( 'mask_jquery_reg', get_template_directory_uri().'/js/input-mask/jquery.inputmask.regex.extensions.js' );
wp_register_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY );


// function aiggroup_scripts_and_styles() {
	// enqueue_versioned_style( 'home_page_style', '/css/home_page.css' );
//     enqueue_versioned_style( 'about_page_style', '/css/about_page_style.css' );
    // enqueue_versioned_style( 'general_style', '/css/general.css' );
//     enqueue_versioned_style( 'ourProduct_style', '/css/ourProduct_page.css' );
//     enqueue_versioned_style( 'news_style', '/css/news_page.css' );
//     enqueue_versioned_style( 'font_awesome', '/css/font-awesome/css/font-awesome.min.css' );
//     enqueue_versioned_style( 'all_single_style', '/css/all_single_style.css' );
//     enqueue_versioned_style( 'footer', '/css/footer.css' );
//     enqueue_versioned_style( 'service_style', '/css/service_style.css' );
//     enqueue_versioned_style( 'header', '/css/header.css' );
//     enqueue_versioned_style( 'ourReview_style', '/css/review.css' );
// }
 
// add_action( 'wp_enqueue_scripts', 'aiggroup_scripts_and_styles' );



/*Все функции новые*/
add_action('wp_ajax_callBack', 'callBack');
add_action('wp_ajax_nopriv_callBack', 'callBack');

function callBack(){
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$inn = $_POST['inn'];
	$type_request = $_POST['type_request'];
	$project = $_POST['project'];
	$executor = $_POST['executor']; //обработать добавление исполнителя
	
	if($executor == 1){
		$data_create_issue = get_data_with_executor($project, $phone, $name, $inn, $type_request);
	}
	else{
		$data_create_issue = get_data($project, $phone, $name, $inn, $type_request);
	}
	$result = create_issue($data_create_issue);
	
    wp_die();
}

add_action('wp_ajax_feedBack', 'feedBack');
add_action('wp_ajax_nopriv_feedBack', 'feedBack');

function feedBack(){
	$name = $_POST['name'];
	$mail = $_POST['mail'];
	$project = $_POST['project'];
	$message = $_POST['message']; //обработать добавление исполнителя
	
	$data_create_issue = get_data_feedback($project, $name, $mail, $message);
	$result = create_issue($data_create_issue);

    wp_die();
}

add_action('wp_ajax_subscribe', 'subscribe');
add_action('wp_ajax_nopriv_subscribe', 'subscribe');

function subscribe(){
    $mail = $_POST['mail'];
    $body_message = "Mail: $mail";

	$mail = new CURLmail('office@aiggroup.ru', "Подписка с сайта aiggroup", $body_message);
    $res=$mail->send();

    wp_die();
}

add_action('wp_ajax_programmBuy', 'programmBuy');
add_action('wp_ajax_nopriv_programmBuy', 'programmBuy');

function programmBuy(){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$coast = $_POST['coast'];
	$title = $_POST['title'];

	$time = date('l jS \of F Y h:i:s A');
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$body_message = "Имя: $name \r\n Телефон: $phone \r\n Время заполнения формы: $time \r\n IP адрес: $ip \r\n Название продукта: $title  \r\n Стоимость: $coast ";
	
	$mail = new CURLmail('office@aiggroup.ru', "Покупка программы 1С", $body_message);
	$res=$mail->send();

    wp_die();
}


/*
 * Enqueues script with WordPress and adds version number that is a timestamp of the file modified date.
 * 
 * @param string      $handle    Name of the script. Should be unique.
 * @param string|bool $src       Path to the script from the theme directory of WordPress. Example: '/js/myscript.js'.
 * @param array       $deps      Optional. An array of registered script handles this script depends on. Default empty array.
 * @param bool        $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
 *                               Default 'false'.
 */
function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
	wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}
 
/**
 * Enqueues stylesheet with WordPress and adds version number that is a timestamp of the file modified date.
 *
 * @param string      $handle Name of the stylesheet. Should be unique.
 * @param string|bool $src    Path to the stylesheet from the theme directory of WordPress. Example: '/css/mystyle.css'.
 * @param array       $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
 * @param string      $media  Optional. The media for which this stylesheet has been defined.
 *                            Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
 *                            '(orientation: portrait)' and '(max-width: 640px)'.
 */
function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
	wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_style' );
function enqueue_custom_style() {
    wp_enqueue_script( 'ds-custom', get_stylesheet_directory_uri() . '/js/custom.js', ['jquery'], '', true );
    wp_enqueue_style( 'ds-custom', get_stylesheet_directory_uri() . '/css/custom.css', [], rand(0, 100) );
}









add_action( 'edit_form_top', 'callback__edit_form_top' );
function callback__edit_form_top( $post ) {
    ?>
    <div style="margin-top: 10px;padding: 15px;color: #fff;background: #673AB7;clear: both;">
        Чтобы перенести текст на новую строку, добавьте в нужном месте <code>&lt;span  class="WP-BREAK-LINE"&gt; &lt;/span&gt;</code><br>
        Чтобы вставить пустую строку для разделения фрагементов текста, добавьте в нужном месте <code>&lt;span class="WP-BREAK-LINE_PARAGRAPH"&gt; &lt;/span&gt;</code><br>
        *делать это нужно в режиме "текст"
    </div>
    <?php
}

## Отключает Гутенберг (новый редактор блоков в WordPress).
## ver: 1.2
if( 'disable_gutenberg' ){
    remove_theme_support( 'core-block-patterns' ); // WP 5.5

    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

    // отключим подключение базовых css стилей для блоков
    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

    // Move the Privacy Policy help notice back under the title field.
    add_action( 'admin_init', function(){
        remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
        add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    } );
}


// ***********************************
// 
// // Отключаем сам REST API
//add_filter('rest_enabled', '__return_false');
 
// Отключаем фильтры REST API
//remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
//remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
//remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
 
// Отключаем события REST API
//remove_action( 'init', 'rest_api_init' );
//remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
//remove_action( 'parse_request', 'rest_api_loaded' );
 
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
 
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );