<?php
/*
  * Template name: ourParners
  * */
  
get_header();

wp_enqueue_style(ourProduct_style);

$all_information = get_post($post->ID);

$products = get_posts( array(
	'numberposts' => -1, /*Получение всех элементов*/
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'partners',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

// echo '<pre>';
// print_r($products);
// echo '</pre>';

?>
<div class='our_partners'>
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
			<?php foreach($products as $product){
			$this_product_meta = get_post_meta($product->ID);
				?>
                    <div class="product">
					 <h4><?php echo $product->post_title;?></h4>
					<div class='img' style='background-image: url(<?php echo $this_product_meta['ale_partners_logo'][0]?>);'></div>
                        
                    </div>
				<?php }	?>
                </div>
            </div>
        </div>
</div>

<?php get_footer();