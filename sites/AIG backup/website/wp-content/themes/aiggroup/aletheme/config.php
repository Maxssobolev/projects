<?php
/**
 * Get current theme options
 * 
 * @return array
 */
function aletheme_get_options() {
	$comments_style = array(
		'wp'  => 'Alethemes Comments',
		'fb'  => 'Facebook Comments',
		'dq'  => 'DISQUS',
		'lf'  => 'Livefyre',
		'off' => 'Disable All Comments',
	);

    $headerfont = array_merge(ale_get_safe_webfonts(), ale_get_google_webfonts());

    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment'=>'scroll'
    );

	
	$imagepath =  ALETHEME_URL . '/assets/images/';
	
	$options = array();
		
	$options[] = array("name" => "Theme",
						"type" => "heading");

    $options[] = array( "name" => "Site Logo",
                        "desc" => "Upload or put the site logo link (Default logo size: 133-52px)",
                        "id" => "ale_sitelogo",
                        "std" => "",
                        "type" => "upload");
                        
    $options[] = array( "name" => "Телефон отдел продаж",
                        "desc" => "Введите телефон в формате (812)000-00-00",
                        "id" => "ale_phone_main",
                        "std" => "",
                        "type" => "text");
                        
    $options[] = array( "name" => "Телефон консультантов",
                        "desc" => "Введите телефон в формате (812)000-00-00",
                        "id" => "ale_phone_consultation",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Текст из левой колонки footer",
                        "desc" => "Введите короткий текст о компании",
                        "id" => "ale_left_footer_text",
                        "std" => "",
                        "type" => "textarea");
                        
    $options[] = array( "name" => "Год ",
                        "desc" => "Введите год цифрой",
                        "id" => "ale_year",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Телефон hr ",
                        "desc" => "Введите телефон в формате (812)000-00-00",
                        "id" => "ale_hr_phone",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Имя hr ",
                        "desc" => "Введите имя HR",
                        "id" => "ale_hr_name",
                        "std" => "",
                        "type" => "text");
    
    
    
    /*Это внутренние поля wp*/                    
    $options[] = array( "name" => "Site Footer Logo",
                        "desc" => "Upload or put the site logo link (Default logo size: 133-52px)",
                        "id" => "ale_sitelogofooter",
                        "std" => "",
                        "type" => "upload");

    $options[] = array( 'name' => "Manage Background",
                        'desc' => "Select the background color, or upload a custom background image. Default background is the #f5f5f5 color",
                        'id' => 'ale_background',
                        'std' => $background_defaults,
                        'type' => 'background');

    $options[] = array( "name" => "Show Site Preloader",
                        "desc" => "Description kakoito.",
                        "id" => "ale_backcover",
                        "std" => "1",
                        "type" => "checkbox");

    $options[] = array( "name" => "Uplaod a favicon icon",
                        "desc" => "Upload or put the link of your favicon icon",
                        "id" => "ale_favicon",
                        "std" => "",
                        "type" => "upload");

	$options[] = array( "name" => "Comments Style",
						"desc" => "Choose your comments style. If you want to use DISQUS comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Disqus+Comment+System&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.  If you want to use Livefyre Realtime Comments comments please install and activate this plugin from <a href=\"" . admin_url('plugin-install.php?tab=search&type=term&s=Livefyre+Realtime+Comments&plugin-search-input=Search+Plugins') . "\">Wordpress Repository</a>.",
						"id" => "ale_comments_style",
						"std" => "wp",
						"type" => "select",
						"options" => $comments_style);

	$options[] = array( "name" => "AJAX Comments",
						"desc" => "Use AJAX on comments posting (works only with Alethemes Comments selected).",
						"id" => "ale_ajax_comments",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => "Social Sharing",
						"desc" => "Enable social sharing for posts.",
						"id" => "ale_social_sharing",
						"std" => "1",
						"type" => "checkbox");

    $options[] = array( "name" => "Copyrights",
                        "desc" => "Your copyright message.",
                        "id" => "ale_copyrights",
                        "std" => "",
                        "type" => "editor");

    $options[] = array( "name" => "Home Page Slider slug",
                        "desc" => "Insert the slider slug. Get the slug on Sliders Section",
                        "id" => "ale_homeslugfull",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Blog Slider slug",
                        "desc" => "Insert the slider slug. Get the slug on Sliders Section",
                        "id" => "ale_blogslugfull",
                        "std" => "",
                        "type" => "text");

    $options[] = array( "name" => "Typography",
                        "type" => "heading");

    $options[] = array( "name" => "Select the body Font from Google Library",
                        "desc" => "The default Font is - Raleway",
                        "id" => "ale_headerfont",
                        "std" => "Raleway",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => "Select the body Font (Extended) from Google Library",
                        "desc" => "The default Font (extended) is - 600",
                        "id" => "ale_headerfontex",
                        "std" => "600",
                        "type" => "text",
                        );

    $options[] = array( "name" => "Select the Headers Font from Google Library",
                        "desc" => "The default Font is - Libre Baskerville",
                        "id" => "ale_mainfont",
                        "std" => "Libre+Baskerville",
                        "type" => "select",
                        "options" => $headerfont);

    $options[] = array( "name" => "Select the Headers Font (Extended) from Google Library",
                        "desc" => "The default Font (extended) is - 400,400italic",
                        "id" => "ale_mainfontex",
                        "std" => "400,400italic",
                        "type" => "text",
                        );

    $options[] = array( 'name' => "H1 Style",
                        'desc' => "Change the h1 style",
                        'id' => 'ale_h1sty',
                        'std' => array('size' => '22px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H2 Style",
                        'desc' => "Change the h2 style",
                        'id' => 'ale_h2sty',
                        'std' => array('size' => '20px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H3 Style",
                        'desc' => "Change the h3 style",
                        'id' => 'ale_h3sty',
                        'std' => array('size' => '18px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H4 Style",
                        'desc' => "Change the h4 style",
                        'id' => 'ale_h4sty',
                        'std' => array('size' => '16px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H5 Style",
                        'desc' => "Change the h5 style",
                        'id' => 'ale_h5sty',
                        'std' => array('size' => '14px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "H6 Style",
                        'desc' => "Change the h6 style",
                        'id' => 'ale_h6sty',
                        'std' => array('size' => '12px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

    $options[] = array( 'name' => "Body Style",
                        'desc' => "Change the body font style",
                        'id' => 'ale_bodystyle',
                        'std' => array('size' => '11px','face' => 'Libre+Baskerville','style' => 'normal','color' => '#111111'),
                        'type' => 'typography');

	$options[] = array( "name" => "Social",
						"type" => "heading");

    $options[] = array( "name" => "Twitter",
                        "desc" => "Your twitter profile URL.",
                        "id" => "ale_twi",
                        "std" => "",
                        "type" => "text");
	$options[] = array( "name" => "Facebook",
						"desc" => "Your facebook profile URL.",
						"id" => "ale_fb",
						"std" => "",
						"type" => "text");
    $options[] = array( "name" => "Google+",
                        "desc" => "Your google+ profile URL.",
                        "id" => "ale_gog",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Pinterest",
                        "desc" => "Your pinteres profile URL.",
                        "id" => "ale_pint",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Flickr",
                        "desc" => "Your flickr profile URL.",
                        "id" => "ale_flickr",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Linkedin",
                        "desc" => "Your linked profile URL.",
                        "id" => "ale_linked",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Instagram",
                        "desc" => "Your instagram profile URL.",
                        "id" => "ale_insta",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Email",
                        "desc" => "Your email",
                        "id" => "ale_emailcont",
                        "std" => "",
                        "type" => "text");
    $options[] = array( "name" => "Show RSS",
                        "desc" => "Check if you want to show the RSS icon on your site",
                        "id" => "ale_rssicon",
                        "std" => "1",
                        "type" => "checkbox");

	
	$options[] = array( "name" => "Facebook Application ID",
						"desc" => "If you have Application ID you can connect the blog to your Facebook Profile and monitor statistics there.",
						"id" => "ale_fb_id",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Enable Open Graph",
						"desc" => "The <a href=\"http://www.ogp.me/\">Open Graph</a> protocol enables any web page to become a rich object in a social graph.",
						"id" => "ale_og_enabled",
						"std" => "",
						"type" => "checkbox");


	
	$options[] = array( "name" => "Advanced Settings",
						"type" => "heading");

	
	$options[] = array( "name" => "Google Analytics",
						"desc" => "Please insert your Google Analytics code here. Example: <strong>UA-22231623-1</strong>",
						"id" => "ale_ga",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => "Footer Code",
						"desc" => "If you have anything else to add in the footer - please add it here.",
						"id" => "ale_footer_info",
						"std" => "",
						"type" => "textarea");

    $options[] = array( "name" => "Custom CSS Styles",
                        "desc" => "You can add here your styles. ex. .boxclass { padding:10px; }",
                        "id" => "ale_customcsscode",
                        "std" => "",
                        "type" => "textarea");

    $options[] = array( "name" => "Footer menu title",
                        "desc" => "Insert the footer menu title",
                        "id" => "ale_footermenutitle",
                        "std" => "Select a category",
                        "type" => "text");

    $options[] = array( "name" => "Footer menu title",
                        "desc" => "Insert the footer menu title",
                        "id" => "ale_footermenutitle_1",
                        "std" => "",
                        "type" => "images",
                        "options" => array(
                            'image_1' => $imagepath.'/1col.png',
                            'image_2' => $imagepath.'/2cl.png',
                            'image_3' => $imagepath.'/2cr.png', ),
        );
	
	return $options;
}

/**
 * Add custom scripts to Options Page
 */
function aletheme_options_custom_scripts() {
 ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#ale_commentongallery').click(function() {
        jQuery('#section-ale_gallerycomments_style').fadeToggle(400);
    });
    if (jQuery('#ale_commentongallery:checked').val() !== undefined) {
        jQuery('#section-ale_gallerycomments_style').show();
    }
});
</script>

<?php
}

/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function aletheme_metaboxes($meta_boxes) {
	
	$meta_boxes = array();

    $prefix = "ale_";


    $meta_boxes[] = array(
        'id'         => 'home_page_metabox',
        'title'      => 'Home Meta Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => 'Заголовок',
                'desc' => 'Заголовок страницы',
                'id'   => $prefix . 'title',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Подзаголовок',
                'desc' => 'Подзаголовок страницы',
                'id'   => $prefix . 'sub_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Картинка 1',
                'desc' => 'Insert the text',
                'id'   => $prefix . 'image1',
                'type' => 'file',
            ),
             array(
                'name' => 'Картинка 2',
                'desc' => 'Insert the text',
                'id'   => $prefix . 'image2',
                'type' => 'file',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'title',
        'title'      => 'Подзаголовок',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-leaders.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Заголовок блока',
                'desc' => 'Заголовок блока',
                'id'   => $prefix . 'sub_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Тэг',
                'desc' => 'Тэг блока',
                'id'   => $prefix . 'teg',
                'type' => 'text',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'about1',
        'title'      => 'Наша команда',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-contact.php'), ), // Specific post templates to display this metabox

        'fields' => array(

            array(
                'name' => 'Email',
                'desc' => 'Если несколько, то указывать через запятую',
                'id'   => $prefix . 'email',
                'type' => 'text',
            ),
            array(
                'name' => 'Телефон',
                'desc' => 'Если несколько, то указывать через запятую',
                'id'   => $prefix . 'phone',
                'type' => 'text',
            ),
            array(
                'name' => 'Адрес',
                'desc' => 'Адрес кампании',
                'id'   => $prefix . 'address',
                'type' => 'text',
            )

        )
    );
   $meta_boxes[] = array(
        'id'         => 'service_page',
        'title'      => 'Внедрение и обслуживание',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-service.php'), ), // Specific post templates to display this metabox

        'fields' => array(

            array(
                'name' => 'Картинка',
                'desc' => 'Картинка блока',
                'id'   => $prefix . 'image',
                'type' => 'file',
            ),
            array(
                'name' => 'Фон',
                'desc' => 'ФОН блока',
                'id'   => $prefix . 'image_bg',
                'type' => 'file',
            ),
            array(
                'name' => 'Тэг',
                'desc' => 'Тэг блока',
                'id'   => $prefix . 'teg',
                'type' => 'text',
            ),
            array(
                'name' => 'Заголовок',
                'desc' => 'Заголовок блока',
                'id'   => $prefix . 'sub_title',
                'type' => 'text',
            ),
            array(
                'name' => 'Описание',
                'desc' => 'Краткое описание блока',
                'id'   => $prefix . 'block_text',
                'type' => 'textarea',
            ),
           array(
                'name' => 'Услуга 1',
                'desc' => 'Описание первой услуги',
                'id'   => $prefix . 'service1',
                'type' => 'text',
            ),
             array(
                'name' => 'Услуга 2',
                'desc' => 'Описание второй услуги',
                'id'   => $prefix . 'service2',
                'type' => 'text',
            ),
            array(
                'name' => 'Услуга 3',
                'desc' => 'Описание третьей услуги',
                'id'   => $prefix . 'service3',
                'type' => 'text',
            ),

        )
    );
        $meta_boxes[] = array(
        'id'         => 'about1',
        'title'      => 'Наша команда',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-aboutUs.php'), ), // Specific post templates to display this metabox

        'fields' => array(

            array(
                'name' => 'Картинка',
                'desc' => 'Картинка блока',
                'id'   => $prefix . 'image1',
                'type' => 'file',
            ),
            array(
                'name' => 'Тэг',
                'desc' => 'Тэг блока',
                'id'   => $prefix . 'teg1',
                'type' => 'text',
            ),
            array(
                'name' => 'Заголовок',
                'desc' => 'Заголовок блока',
                'id'   => $prefix . 'sub_title1',
                'type' => 'text',
            ),
           array(
                'name' => 'О нас',
                'desc' => 'Текст о нас',
                'id'   => $prefix . 'text_block1',
                'type' => 'textarea',
            ),

        )
    );
    $meta_boxes[] = array(
        'id'         => 'about2',
        'title'      => 'Внедрение и обслуживание',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-aboutUs.php'), ), // Specific post templates to display this metabox

        'fields' => array(

            array(
                'name' => 'Картинка',
                'desc' => 'Картинка блока',
                'id'   => $prefix . 'image2',
                'type' => 'file',
            ),
            array(
                'name' => 'Тэг',
                'desc' => 'Тэг блока',
                'id'   => $prefix . 'teg2',
                'type' => 'text',
            ),
            array(
                'name' => 'Заголовок',
                'desc' => 'Заголовок блока',
                'id'   => $prefix . 'sub_title2',
                'type' => 'text',
            ),
           array(
                'name' => 'Мы эффективны 1',
                'desc' => '1 пункт, почему мы эффективны',
                'id'   => $prefix . 'efficiency1',
                'type' => 'text',
            ),
             array(
                'name' => 'Мы эффективны 2',
                'desc' => '2 пункт, почему мы эффективны',
                'id'   => $prefix . 'efficiency2',
                'type' => 'text',
            ),
            array(
                'name' => 'Мы эффективны 3',
                'desc' => '3 пункт, почему мы эффективны',
                'id'   => $prefix . 'efficiency3',
                'type' => 'text',
            ),

        )
    );
        $meta_boxes[] = array(
        'id'         => 'about3',
        'title'      => 'Почетные статусы ',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('page-aboutUs.php'), ), // Specific post templates to display this metabox

        'fields' => array(

            array(
                'name' => 'Картинка',
                'desc' => 'Картинка блока',
                'id'   => $prefix . 'image3',
                'type' => 'file',
            ),
            array(
                'name' => 'Логотип 1',
                'desc' => 'Здесь находится логотип партнера/достижения',
                'id'   => $prefix . 'logo1',
                'type' => 'file',
            ),
            array(
                'name' => 'Описание достижения 1',
                'desc' => 'Краткое описание достижения/партнера',
                'id'   => $prefix . 'logo_about1',
                'type' => 'text',
            ),
                        array(
                'name' => 'Логотип 2',
                'desc' => 'Здесь находится логотип партнера/достижения',
                'id'   => $prefix . 'logo2',
                'type' => 'file',
            ),
            array(
                'name' => 'Описание достижения 2',
                'desc' => 'Краткое описание достижения/партнера',
                'id'   => $prefix . 'logo_about2',
                'type' => 'text',
            ),
                        array(
                'name' => 'Логотип 3',
                'desc' => 'Здесь находится логотип партнера/достижения',
                'id'   => $prefix . 'logo3',
                'type' => 'file',
            ),
            array(
                'name' => 'Описание достижения 3',
                'desc' => 'Краткое описание достижения/партнера',
                'id'   => $prefix . 'logo_about3',
                'type' => 'text',
            ),
                        array(
                'name' => 'Логотип 4',
                'desc' => 'Здесь находится логотип партнера/достижения',
                'id'   => $prefix . 'logo4',
                'type' => 'file',
            ),
            array(
                'name' => 'Описание достижения 4',
                'desc' => 'Краткое описание достижения/партнера',
                'id'   => $prefix . 'logo_about4',
                'type' => 'text',
            ),
           array(
                'name' => 'Тэг',
                'desc' => 'Тэг блока',
                'id'   => $prefix . 'teg3',
                'type' => 'text',
            ),
            array(
                'name' => 'Заголовок',
                'desc' => 'Заголовок блока',
                'id'   => $prefix . 'sub_title3',
                'type' => 'text',
            ),

        )
    );
    $meta_boxes[] = array(
        'id'         => 'leaders',
        'title'      => 'Руководители',
        'pages'      => array( 'leaders', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
       // 'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => 'ФИО',
                'desc' => 'Фамилия и Имя',
                'id'   => $prefix . 'fio',
                'type' => 'text',
            ),
			array(
                'name' => 'phone',
                'desc' => 'Контактный телефон',
                'id'   => $prefix . 'phone',
                'type' => 'text',
            ),
			array(
                'name' => 'mail',
                'desc' => 'Контактный mail',
                'id'   => $prefix . 'mail',
                'type' => 'text',
            ),
			array(
                'name' => 'Должность',
                'desc' => 'Занимаемая должность',
                'id'   => $prefix . 'position',
                'type' => 'text',
            ),
            array(
                'name' => 'Фотография',
                'desc' => 'Добавить фотографию',
                'id'   => $prefix . 'leader_photo',
                'type' => 'file',
            ),
        )
    );
        $meta_boxes[] = array(
        'id'         => 'vacancy',
        'title'      => 'Вакансии',
        'pages'      => array( 'vacancy', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
       // 'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox

        'fields' => array(
            array(
                'name' => 'Превью',
                'desc' => 'Краткое описание вакансий',
                'id'   => $prefix . 'priview',
                'type' => 'textarea',
            )
        )
    );
    
    $meta_boxes[] = array(
        'id'         => 'products',
        'title'      => '1C продукты',
        'pages'      => array( 'products', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
       // 'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox

         'fields' => array(
             array(
                 'name' => 'Стоимость программы',
                 'desc' => 'ТОЛЬКО ЦИФРЫ',
                 'id'   => $prefix . 'coast',
                 'type' => 'text',
             ),
         )
    );
        

    $meta_boxes[] = array(
        'id'         => 'service',
        'title'      => 'Услуги',
        'pages'      => array( 'service', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left

        'fields' => array(
            array(
                'name' => 'Показать на главной странице',
                'desc' => 'Отметьте, если нужно показывать на главной странице',
                'id'   => $prefix . 'product_main',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Показать на на странице услуг',
                'desc' => 'Отметьте, если нужно показывать на странице услуг',
                'id'   => $prefix . 'product_service',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Описание',
                'desc' => 'Краткое описание услуги',
                'id'   => $prefix . 'preview',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Иконка',
                'desc' => 'Коралловый цвет',
                'id'   => $prefix . 'product_photo',
                'type' => 'file',
            ),
             array(
                'name' => 'Иконка по наведению',
                'desc' => 'Белый цвет',
                'id'   => $prefix . 'product_photo_hover',
                'type' => 'file',
            ),
            array(
                'name' => 'GET параметр',
                'desc' => 'НЕ УДАЛЯТЬ, НЕ ИЗМЕНЯТЬ!!!',
                'id'   => $prefix . 'get_service',
                'type' => 'text',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'news',
        'title'      => 'Новость',
        'pages'      => array( 'news', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left

        'fields' => array(
            array(
                'name' => 'Превью',
                'desc' => 'Краткое описание новости',
                'id'   => $prefix . 'preview',
                'type' => 'textarea',
            ),
             array(
                'name' => 'Изображение',
                'desc' => 'Изображение внутри новости',
                'id'   => $prefix . 'news_photo',
                'type' => 'file',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'partners',
        'title'      => 'Партнер',
        'pages'      => array( 'partners', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left

        'fields' => array(
             array(
                'name' => 'С какого года партнеры',
                'desc' => 'Только год, без каких-либо других символов! ',
                'id'   => $prefix . 'since',
                'type' => 'text',
            ),
            array(
                'name' => 'Превью',
                'desc' => 'Краткое описание партнера',
                'id'   => $prefix . 'preview',
                'type' => 'textarea',
            ),
             array(
                'name' => 'Лого',
                'desc' => 'Лого партнера',
                'id'   => $prefix . 'partners_logo',
                'type' => 'file',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'vacancy',
        'title'      => 'Вакансии',
        'pages'      => array( 'vacancy', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left

        'fields' => array(
            array(
                'name' => 'Образование',
                'desc' => 'Образование кандидата',
                'id'   => $prefix . 'education',
                'type' => 'text',
            ),
             array(
                'name' => 'Зарплата',
                'desc' => 'Цифра  ОТ которой начинается зп ',
                'id'   => $prefix . 'salary',
                'type' => 'text',
            ),
            array(
                'name' => 'Требования к кандидату',
                'desc' => 'Описание требований',
                'id'   => $prefix . 'requirement',
                'type' => 'textarea',
            ),
           array(
                'name' => 'Рабочие обязанности',
                'desc' => 'Описание обязанностей',
                'id'   => $prefix . 'responsibilities',
                'type' => 'textarea',
            ),

        )
    );
    $meta_boxes[] = array(
         'id'         => 'preview_list',
         'title'      => 'Превью',
         'pages'      => array( 'listintegration',  'listservice',  'listsupport',  'liststock', 'listimplementation', 'listteaching', 'listits' ), // Post type
         'context'    => 'normal',
         'priority'   => 'high',
         'show_names' => true, // Show field names on the left

         'fields' => array(
             array(
                 'name' => 'Превью',
                 'desc' => 'Краткое описание',
                 'id'   => $prefix . 'preview',
                 'type' => 'textarea',
             ),
         )
     );
         $meta_boxes[] = array(
         'id'         => 'programm_coast',
         'title'      => 'Превью',
         'pages'      => array( 'control',  'work',  'zkh',  'hotel', 'car', 'gosych', 'beauty', 'typovay', ), // Post type
         'context'    => 'normal',
         'priority'   => 'high',
         'show_names' => true, // Show field names on the left

         'fields' => array(
             array(
                 'name' => 'Стоимость программы',
                 'desc' => 'ТОЛЬКО ЦИФРЫ',
                 'id'   => $prefix . 'coast',
                 'type' => 'text',
             ),
         )
     );
    $meta_boxes[] = array(
        'id'         => 'press_page_metabox',
        'title'      => 'Press Page Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'show_on'    => array( 'key' => 'page-template', 'value' => array('template-press.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Press title #1',
                'desc' => 'Insert the title',
                'id'   => $prefix . 'presstit1',
                'type' => 'text',
            ),
            array(
                'name' => 'Press Thumb #1',
                'desc' => 'Insert the image (max-height - 280px)',
                'id'   => $prefix . 'pressthumb1',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Image #1',
                'desc' => 'Insert the image or let it empty if you want to use a video.',
                'id'   => $prefix . 'pressimage1',
                'type' => 'file',
            ),
            array(
                'name' => 'Press Video link #1',
                'desc' => 'Insert the video or let it empty if you want to use an image. (Embed link - ex //www.youtube.com/embed/LtulTGxJdDc)',
                'id'   => $prefix . 'pressvideo1',
                'type' => 'text',
            ),
        )
    );

	return $meta_boxes;
}

/**
 * Get image sizes for images
 * 
 * @return array
 */
function aletheme_get_images_sizes() {
	return array(

        'gallery' => array(
            array(
                'name'      => 'gallery-thumba',
                'width'     => 430,
                'height'    => 267,
                'crop'      => true,
            ),
            array(
                'name'      => 'gallery-mini',
                'width'     => 100,
                'height'    => 67,
                'crop'      => true,
            ),
            array(
                'name'      => 'gallery-big',
                'width'     => 680,
                'height'    => 9999,
                'crop'      => false,
            ),
        ),
        'post' => array(
            array(
                'name'      => 'post-thumba',
                'width'     => 475,
                'height'    => 295,
                'crop'      => true,
            ),
            array(
                'name'      => 'post-minibox',
                'width'     => 500,
                'height'    => 200,
                'crop'      => true,
            ),
        ),


    );
}

/**
 * Add post types that are used in the theme 
 * 
 * @return array
 */
function aletheme_get_post_types() {
	return array(
        'status' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Статусы и сертификаты',
            'multiple' => 'Статусы и сертификаты',
            'columns'    => array(
                'first_image',
            )
        ),
        'leaders' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-universal-access',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Руководитель',
            'multiple' => 'Руководители',
            'columns'  => array(
                'first_image',
            )
        ),
        'vacancy' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Вакансия',
            'multiple' => 'Вакансии',
            'columns'  => array(
                'first_image',
            )
        ),
		'products' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-testimonial',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Продукты на главной',
            'multiple' => 'Продукты на главной',
            'columns'  => array(
                'first_image',
            )
        ),
       'review' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-testimonial',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Отзыв',
            'multiple' => 'Отзывы',
            'columns'  => array(
                'first_image',
            )
        ),
        'listimplementation' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Внедрение 1с',
            'multiple' => 'Все виды внедрения',
            'columns'  => array(
                'first_image',
            )
        ),
        'listintegration' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Интеграции',
            'multiple' => 'Все виды интеграций',
            'columns'  => array(
                'first_image',
            )
        ),
        'listservice' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Обслуживание',
            'multiple' => 'Все виды Обслуживаний',
            'columns'  => array(
                'first_image',
            )
        ),
        'listteaching' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Обучение',
            'multiple' => 'Все обучение',
            'columns'  => array(
                'first_image',
            )
        ),
        'listits' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'ИТС',
            'multiple' => 'Все виды ИТС',
            'columns'  => array(
                'first_image',
            )
        ),
        'listsupport' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-tools',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'сопровождение',
            'multiple' => 'Все виды сопровождения',
            'columns'  => array(
                'first_image',
            )
        ),
        'liststock' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-megaphone',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'акция',
            'multiple' => 'Все акции',
            'columns'  => array(
                'first_image',
            )
        ),
        'partners' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-buddicons-buddypress-logo',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Партнер',
            'multiple' => 'Партнеры',
            'columns'  => array(
                'first_image',
            )
        ),
        'news' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-align-right',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Новость',
            'multiple' => 'Новости',
            'columns'  => array(
                'first_image',
            )
        ),
        'beauty' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Красота и здоровье',
            'columns'  => array(
                'first_image',
            )
        ),
       'car' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Транспорт и сервис',
            'columns'  => array(
                'first_image',
            )
        ),
        'hotel' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С HoReCa',
            'columns'  => array(
                'first_image',
            )
        ),
        'gosych' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Государственные учреждения',
            'columns'  => array(
                'first_image',
            )
        ),
        'typovay' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Типовые программы',
            'columns'  => array(
                'first_image',
            )
        ),
        'control' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Управление',
            'columns'  => array(
                'first_image',
            )
        ),
        'work' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Производство',
            'columns'  => array(
                'first_image',
            )
        ),
        'zkh' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-images-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => '1С продукт',
            'multiple' => '1С Строительство, недвижимость, ЖКХ',
            'columns'  => array(
                'first_image',
            )
        ),
         'service' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-thumbs-up',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Услуга',
            'multiple' => 'Услуги',
            'columns'  => array(
                'first_image',
            )
        ),
       'workPlus' => array(
            'config' => array(
                'public' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-plus-alt',
                'has_archive'   => true,
                'supports'=> array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'show_in_nav_menus'=> true,
            ),
            'singular' => 'Работа. Пункт',
            'multiple' => 'Работа. Пункты',
            'columns'  => array(
                'first_image',
            ),
        ),
    );
}

/**
 * Add taxonomies that are used in theme
 * 
 * @return array
 */
function aletheme_get_taxonomies() {
	return array(

        'gallery-category'    => array(
            'for'        => array('gallery'),
            'config'    => array(
                'sort'        => true,
                'args'        => array('orderby' => 'term_order'),
                'hierarchical' => true,
            ),
            'singular'    => 'Gallery Category',
            'multiple'    => 'Gallery Categories',
        ),

    );
}

/**
 * Add post formats that are used in theme
 * 
 * @return array
 */
function aletheme_get_post_formats() {
	return array();
}

/**
 * Get sidebars list
 * 
 * @return array
 */
function aletheme_get_sidebars() {
	$sidebars = array();
	return $sidebars;
}

/**
 * Predefine custom sliders
 * @return array
 */
function aletheme_get_sliders() {
	return array(
		'sneak-peek' => array(
			'title'		=> 'Sneak Peek',
		),
	);
}

/**
 * Post types where metaboxes should show
 * 
 * @return array
 */
function aletheme_get_post_types_with_gallery() {
	return array('gallery');
}

/**
 * Add custom fields for media attachments
 * @return array
 */
function aletheme_media_custom_fields() {
	return array();
}