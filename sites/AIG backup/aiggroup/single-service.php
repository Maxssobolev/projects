<?php
  

get_header();
wp_enqueue_style(service_style);
wp_enqueue_style(all_single_style);

$all_information = get_post($post->ID);
$this_news_meta_main = get_post_meta($post->ID);
// echo '<pre>';
// print_r($this_news_meta);
// echo '</pre>';

?>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url('6'); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
             <h5 class="sub_title">
                <?php echo $this_news_meta_main['ale_preview'][0];?>
             </h5>
         </div>
	</div>
</div>


<?php if ($post->ID === 778){
$services = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'date',
	'order'       => 'ASC',
	'post_type'   => 'listservice',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) ); } else {
	$services = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'date',
	'order'       => 'ASC',
	'post_type'   => $_GET['type'],
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
}
?>

<div class="wrapper clearfix">
	<div class="about_small">
		<?php foreach($services as $service){
			$this_service_meta = get_post_meta($service->ID);
		?>
                <div class="about_small_inside">
                    <h4><a class="details" href="<?php echo get_permalink($service->ID)//->permalink ?>"><span><?php echo $service->post_title;?></span></a></h4>
					
					<?php// if (trim($this_service_meta['ale_preview'][0]) != ''): ?>
						<p><?php echo $this_service_meta['ale_preview'][0]?></p>
					<?php// endif; ?>
					<?php //<a class="details details-small" href="<?php echo get_page_link($service->ID) ? >"><span>Подробнее</span></a> ?>
					<a class="details details-small" href="<?php echo get_permalink($service->ID) ?>"><span>Подробнее</span></a> 
					<p class="get_buy_popup_service">Заказать</p>
                    <img class='img_about' src='/wp-content/uploads/2019/06/wrench.png'>
                </div>
         
			<?php }
		?>
	</div>
		<div class="text-block">
			<?php echo $all_information->post_content;?>
		</div>
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