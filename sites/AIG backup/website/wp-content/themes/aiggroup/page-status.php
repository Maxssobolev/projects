<?php
/*
  * Template name: StatusPage
  * */
  
get_header();

wp_enqueue_style(ourProduct_style);

$all_information = get_post($post->ID);

$statuses = get_posts( array(
	'numberposts' => -1, /*Получение всех элементов*/
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'status',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>
<div class='about_us_page'>
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
			<?php foreach($statuses as $status){
				?>
                    <div class="product">
						<div class='img' style='background-image: url(<?php echo get_the_post_thumbnail_url($status->ID); ?>);'></div>
							<p class='without_bg'><?php echo $status->post_content;?></p>
                    </div>
				<?php }	?>
                </div>
            </div>
        </div>
</div>

</div>
<?php get_footer();