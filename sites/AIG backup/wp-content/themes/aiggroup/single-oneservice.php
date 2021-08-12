<?php
  

get_header();

wp_enqueue_style(all_single_style);

$all_information = get_post($post->ID);

$this_news_meta = get_post_meta($post->ID);
// echo '<pre>';
// print_r($all_information);
// echo '</pre>';
echo $_GET['type'];
?>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url('6'); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
             <h5 class="sub_title">
                <?php echo $this_news_meta['ale_preview'][0];?>
             </h5>
         </div>
	</div>
</div>

    <div class="wrapper_single">
		<div class='image_block'><?php echo get_the_post_thumbnail($post->ID);?></div>
		<div class='text_service'><?php	echo $all_information->post_content;?></div>
	</div>
<!--	<div class="wrapper_single contact_form_bolck">-->
<!--		<h5>Оставьте заявку на сайте прямо сейчас и мы свяжемся с вами в ближайшее время</h5>-->
<!--		<form class="сontact_us" action="">-->
<!--			<input type="text" placeholder='Ваше имя'>-->
<!--			<input type="text" placeholder='Ваш телефон'>-->
<!--			<input type="submit" class='btn_orange'>-->
<!--		</form>-->
<!--	</div>-->
	
<div class='clearfix'></div>
<?php get_footer();