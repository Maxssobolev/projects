<?php
/*
  * Template name: Vacancy
  * */
  
get_header();

wp_enqueue_style(ourProduct_style);

$all_information = get_post($post->ID);

$jobs = get_posts( array(
	'numberposts' => -1, /*Получение всех элементов*/
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'vacancy',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

// echo '<pre>';
// print_r($products);
// echo '</pre>';

?>
<div class='our_vacancy'>
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
        <div class="our_main_product">
				 <div class="products">
			<?php foreach($jobs as $job){
			$this_product_meta = get_post_meta($job->ID);
				?>
                    <div class="product"  style='padding-bottom: 40px !important'>
					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
					 <h4><?php echo $job->post_title;?></h4>
                         <a href="<?php echo get_permalink($job->ID)?>">Подробнее</a>
                    </div>
				<?php }	?>
                </div>
            </div>
        </div>
</div>

<?php get_footer();