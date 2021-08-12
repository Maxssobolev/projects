<?php
  
get_header();

wp_enqueue_style(all_single_style);

$all_information = get_post($post->ID);
$this_news_meta = get_post_meta($post->ID);
// echo '<pre>';
// print_r($all_information);
// echo '</pre>';
$last_news = get_posts( array(
	'numberposts' => 2, 
	'orderby'     => 'date',
	'order'       => 'ASC',
	'post_type'   => 'news',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

?>
<div class='single_news'>
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
	<div class='single_news_small'>
			<div class="wrapper_single">
				<p class='date_time_news'><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date('l, j F Y, H:i');?></p>
					<h4><?php echo $all_information->post_title;?></h4>
					<div class='image_block'><?php echo get_the_post_thumbnail($post->ID);?></div>
					<div class='text_service'><?php	echo $all_information->post_content;?></div>
			</div>
			<div class="wrapper_single">
				<div class="small_hidden">
					<h4>Другие новости</h4>
					<div class='two_last_news'>
					<?php foreach($last_news as $news){
					$this_news_meta = get_post_meta($news->ID);
						?>
							<div class="news_preview_last">
								<div class='photo_block_last'><img class='news_photo_last' src="<?php echo get_the_post_thumbnail_url($news->ID); ?>" alt=""></div>
									<a href="<?php echo get_permalink($news->ID)?>"><h4><?php echo $news->post_title;?></h4></a>
								</div>
						<?php }	?>
						  </div>
					</div>
				</div>
			</div>
		</div>
</div>

	
<div class='clearfix'></div>
<?php get_footer();