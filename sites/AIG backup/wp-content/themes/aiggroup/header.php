<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
		<?php 

			wp_title('|', true, 'right'); bloginfo('name'); ?>
		



	</title>
	<?php wp_head();
	wp_enqueue_style(general_style);
	wp_enqueue_style(font_awesome);
	wp_enqueue_style(header);
	wp_enqueue_script(mask_jquery);
	wp_enqueue_script(mask_jquery_reg);

include_once(get_template_directory().'/partials/callBack_popup.php');
include_once(get_template_directory()."/partials/buy_popup.php");
include_once(get_template_directory()."/partials/thank-pop_up.php");
 ?>





<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
   ym(57285733, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/57285733" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<!-- script <?php echo wp_script_is( 'recaptcha' ); ?> -->
<body <?php body_class(); ?> >
<script src="https://www.google.com/recaptcha/api.js"></script>


<div class='wrapper'>
	<header class='main_header'>
		<a href='<?php echo get_home_url();?>'><img src='<?php echo ale_get_option('sitelogo') ?>' class='main_logo'></a>
		<div class='site_info'>
			<div class='main_phone_block'>
				<div class="descript">
					<br>Внедрение и сопровождение программных продуктов 1С
				</div>
				<div class="info_right">
					<div class="info_phone">
						
						
						<div class="phones">
							
							
							<div>по всем вопросам<a href="tel:89062674555" class="numb">8 (812) 425 01 75</a></div>
							<div>тел. сопровождения<a href="tel:88123364252" class="numb">8 (812) 336 42 52</a></div>
						</div>
						<div class="social">
							<a href="whatsapp://send?phone=89062674555" class="wa"></a>
							<a href="https://t.me/89062674555" class="tg"></a>
						</div>
						
						
					</div>
					<a class="sb_call" id='get_consultation_phone'>Заказать звонок</a>
				</div>
				<!--<p class='support'><a href='https://help.aiggroup.ru/login.php'>Техническая поддержка</a></p>
				<div class='site_phones'>
					<div class='bid_width'>
						<p class='phone_sales'>Отдел продаж: <span class='phone_number'> <?php echo ale_get_option('phone_main') ?></span></p>
					</div>
					<div class='small_width'>
						<p class='phone_sales'>Отдел продаж: </p> <p class='phone_number'> <?php echo ale_get_option('phone_consultation') ?></p>
					</div>
						<p id='get_sale_phone'>Заказать звонок</p>
				</div>
				
				<div class='site_phones'>
					<div class='bid_width'>
						<p class='phone_consultation'>Линия консультации: <span class='phone_number'><?php echo ale_get_option('phone_main') ?></span></p>
					</div>
					<div class='small_width'>
						<p class='phone_consultation'>Линия консультации: </p> <p class='phone_number'><?php echo ale_get_option('phone_consultation') ?></p>
					</div>
					<p id='get_consultation_phone'>Заказать звонок</p>
				</div>-->
			</div>
			<div class='menu'><?php wp_nav_menu('main_menu'); ?></div>
		</div>
	</header>
	<header class='mobile_header'>
					<a href='<?php echo get_home_url();?>'><img src='<?php echo ale_get_option('sitelogo') ?>' class='main_logo'></a>
					<i class="fa fa-bars" aria-hidden="true" id='show_menu'></i>
				<div class='mobile_menu' id='mobile_menu' ><?php wp_nav_menu('main_menu'); ?></div>
	</header>
</div>

