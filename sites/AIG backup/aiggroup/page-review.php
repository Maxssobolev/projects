<?php
/*
  * Template name: review
  * */
  
get_header();

wp_enqueue_style(ourReview_style);

$all_information = get_post($post->ID);

$review = get_posts( array(
	'numberposts' => -1, /*Получение всех элементов*/
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'review',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

// echo '<pre>';
// print_r($products);
// echo '</pre>';
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

<div class="wrapper clearfix">
        <div class="our_review">
				 <div class="review">
			<?php foreach($review as $one_review){
				?>
                    <div class="one_review">
                        <h4><?php echo $one_review->post_title;?></h4>
						<p class='without_bg'><?php echo $one_review->post_content;?></p>
                    </div>
				<?php }	?>
                </div>
            </div>
        </div>

<?php get_footer();