<?php
/*
  * Template name: allNews
  * */
  
get_header();

wp_enqueue_style(news_style);

$all_information = get_post($post->ID);

$all_news = get_posts( array(
	'numberposts' => -1, /*Получение всех элементов*/
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'news',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

// echo '<pre>';
// print_r($news);
// echo '</pre>';
include_once('partials/sidebar.php');
?>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
             <h5 class="sub_title">
                <?php echo $all_information->post_content;?>
             </h5>
         </div>
	</div>
</div>

			<div class="all_news">
			<?php foreach($all_news as $news){
			$this_news_meta = get_post_meta($news->ID);
				?>
                    <div class="news">
						<div class='photo_block'><img class='news_photo' src="<?php echo get_the_post_thumbnail_url($news->ID); ?>" alt=""></div>
						<div class='preview_info'>
							<p class='date_time_news'><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo get_the_date('l, j F Y, H:i');?></p>
							<h4><?php echo $news->post_title;?></h4>
							<div class='preview'><?php echo $this_news_meta['ale_preview'][0];?></div>
							<a class='btn_orange' href="<?php echo get_permalink($news->ID)?>">Подробнее</a>
						</div>
                    </div>
				<?php }	?>
            </div>

	<div class='clearfix'></div>
<?php get_footer();