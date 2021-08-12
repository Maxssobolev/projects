<?php
/*
  * Template name: ProgrammMenu
  * */
  
get_header();

wp_enqueue_style(about_page_style);
$all_information = get_post($post->ID);

// echo '<pre>';
// print_r($ex);
// echo '</pre>';

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
                <a href="<?php echo get_site_url();?>/allcontrol/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/work.gif" alt="">
                    <h2>Управление</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allwork/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/control.gif" alt="">
                    <h2>Производство</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allzkh/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/zkh.gif" alt="">
                    <h2>Строительство, недвижимость и ЖКХ</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allhoreca/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/hotel.gif" alt="">
                    <h2>HoReCa</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allcar/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/car.gif" alt="">
                    <h2>Транспорт и сервис</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allgosych/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/gosych.gif" alt="">
                    <h2>Государственные учреждения</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/allbeauty/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/beauty.svg" alt="">
                    <h2>Красота и здоровье</h2></a>
            </div>
            <div>
                <a href="<?php echo get_site_url();?>/alltypovay/">
                    <img src="<?php echo get_template_directory_uri();?>/css/img/tipovay.svg" alt="">
                    <h2>Типовые программы</h2></a>
            </div>
		</div>
				<div class="text-block">
			<?php echo $all_information->post_content;?>
		</div>
	</div>

</div>
<?php get_footer();