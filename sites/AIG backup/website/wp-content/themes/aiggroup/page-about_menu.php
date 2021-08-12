<?php
/*
  * Template name: AboutMenu
  * */
  
get_header();

wp_enqueue_style(about_page_style);
$all_information = get_post($post->ID);

?>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
         </div>
	</div>
</div>
<div class="page_about_menu">
	<div class="wrapper">
		<div class="all_item">
			<div>
				<a href="<?php echo get_site_url();?>/about/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/about_company.svg" alt="">
			<h2>О компании</h2></a>
			</div>
			<div>
			<a href="<?php echo get_site_url();?>/allleaders/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/specialists.svg" alt="">
				<h2>Руководители</h2></a>
			</div>
			<div>
				<a href="<?php echo get_site_url();?>/allstatus/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/status.svg" alt="">
			<h2>Статусы и сертификаты</h2></a>
			</div>
			<div>
				<a href="<?php echo get_site_url();?>/allnews/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/news.svg" alt="">
			<h2>Новости</h2></a>
			</div>
			<div>
			<a href="<?php echo get_site_url();?>/call-back/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/virtual_reception.svg" alt="">
				<h2>Виртуальная приемная</h2></a>
			</div>
			<div>
			<a href="<?php echo get_site_url();?>/allreview/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/review.svg" alt="">
				<h2>Отзывы</h2></a>
			</div>
			<div>
			<a href="<?php echo get_site_url();?>/allvacancy/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/career.svg" alt="">
				<h2>Карьера в АИГ</h2></a>
			</div>
			<div>
			<a href="<?php echo get_site_url();?>/allcustomer/">
				<img src="<?php echo get_template_directory_uri();?>/css/img/customer.svg" alt="">
				<h2>Наши клиенты</h2></a>
			</div>
		</div>
		<div class="text-block">
			<?php echo $all_information->post_content;?>
		</div>
	</div>
</div>

<?php get_footer();