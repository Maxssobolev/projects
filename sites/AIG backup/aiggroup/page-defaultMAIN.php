<?php
/*
  * Template name: defaultMAIN
  * */
  
get_header();

wp_enqueue_style(service_style);

$all_information = get_post($post->ID);
$all_information_meta = get_post_meta($post->ID);

// echo '<pre>';
// print_r($all_information_meta);
// echo '</pre>';

?>
<div class='service_page'>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
         </div>
	</div>
</div>


<?php
$services = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'date',
	'order'       => 'ASC',
	'post_type'   => 'service',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>

<div class="wrapper clearfix">
	<div class="text-block">

			<!-- Замена английской V на галочку, и РУССКОЙ Х на крестик и "заказать" на кнопку -->
			<?php 

			// Если это страница "Сопровождение 1С"
			if (get_permalink() == 'https://aiggroup.ru/maintenance/'){
				echo str_replace(['V','Х', 'заказать'], 
					[
					'<img src="'. get_template_directory_uri() .'/css/img/tick.svg" width="50">',
					'<img src="'. get_template_directory_uri() .'/css/img/cross.svg" width="30">',
					'<div class="button-item get_buy_popup">
				      <a href="" class="btn-1">заказать</a>
				    </div>'	
					 ], 
					$all_information->post_content);

			} else {
				echo $all_information->post_content;
			}


			?>
		</div>

</div>

<?php if (get_permalink() == 'https://aiggroup.ru/maintenance/'): ?>

		<style>

			a {
			  text-decoration: none;
			  font-weight: 500;
			  position: relative;
			  color: #4A4A4A;
			  display: inline-block;
			  z-index: 1
			}

			.button-item {
			  /*padding-bottom: 2em;*/
			  margin-top:20px;
			}

			.btn-1 {
			  padding: 1em 3em;
			  border: 3px solid #4A90E2;
			  transition: all 300ms ease;
			  box-shadow: 0px 4px 10px 2px rgba(0, 0, 0, 0.2);
			}
			.btn-1:before {
			  position: absolute;
			  content: "";
			  width: 0%;
			  height: 100%;
			  background: #4A90E2;
			  top: 0;
			  left: 50%;
			  z-index: -1;
			  transition: all 0ms ease;
			}
			.btn-1:hover {
			  color: white;
			  box-shadow: none;
			}
			.btn-1:hover:before {
			  position: absolute;
			  content: "";
			  width: 100%;
			  height: 100%;
			  background: #4A90E2;
			  top: 0;
			  left: 0%;
			  z-index: -1;
			  transition: all 300ms ease;
			}

		</style>


		<script>
			
		</script>

<?php endif; ?>


<div class='service_bg' style='background-image: url(<?php echo $all_information_meta['ale_image_bg'][0] ?>);'>
	<div class="wrapper">
		<div class="our_services page_block">
			<div class="left">
				<span class="tag"><?php echo $all_information_meta['ale_teg'][0]; ?></span>
				<h2 class="block_title"><?php echo $all_information_meta['ale_sub_title'][0]; ?></h2>
				<p class="info"><?php echo $all_information_meta['ale_block_text'][0]; ?></p>
				<?php
				foreach($all_information_meta as $key => $value){
							if(preg_match("/^ale_service\d+$/", $key)){ ?>
				<div class="one_service">
				 <i class="fa fa-check" aria-hidden="true"></i><p><?php echo $value[0];?></p>
				 </div>
				<?php
				 }
				}?>
			</div>
			<div class="right">
					<img class='block_main_img'  src="<?php echo $all_information_meta['ale_image'][0]; ?>" alt="">
			</div>
		</div>
	</div>
</div>

</div>



<?php get_footer();