<?php
/*
  * Template name: Service
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
             <h5 class="sub_title">
                Поможем ускорить, упорядочить и автоматизировать работу вашей компании. Внедряем программные продукты 1С, подключаем сервисы 1С:ИТС,  настраиваем обмен,  дорабатываем любую конфигурацию под ваши пожелания и сопровождаем на всём пути деятельности предприятия. Наша цель – сделать работу для бухгалтеров простой и продуктивной, а для руководителей – бизнес прозрачным.
             </h5>
         </div>
	</div>
</div>


<?php
$services = get_posts( array(
	'numberposts' => -1,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'post_type'   => 'service',
	'post_status'   => 'publish',
	'exclude'     => '824, 823, 822, 820, 744',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>

<div class="wrapper clearfix">
	<div class="NEW-about_small">
		<? $line_break_counter = 0; ?>
		<?php foreach($services as $service){
			$this_service_meta = get_post_meta($service->ID);
			if(isset($this_service_meta['ale_product_service'])){
		?> 		
                <div class="NEW-about_small_inside">
                	<div>
						<h4><a class='NEW-main_link' href="<?php if (get_permalink($service->ID)==='https://aiggroup.ru/service/%d0%be%d0%b1%d1%81%d0%bb%d1%83%d0%b6%d0%b8%d0%b2%d0%b0%d0%bd%d0%b8%d0%b5-1%d1%81/') {
				echo 'https://aiggroup.ru/#obsluzhivanie';
			} else {
				echo get_permalink($service->ID);
			} ?><?php if ($this_service_meta['ale_get_service'][0]){ echo '?type='.$this_service_meta['ale_get_service'][0];}?>"><?php echo $service->post_title;?></a></h4>
					</div>
					<div>
					<?php if ($this_service_meta['ale_preview'][0]): ?>
						<p><?php echo $this_service_meta['ale_preview'][0]?></p>
					<?php endif; ?>
					<a href="<?php if (get_permalink($service->ID)==='https://aiggroup.ru/service/%d0%be%d0%b1%d1%81%d0%bb%d1%83%d0%b6%d0%b8%d0%b2%d0%b0%d0%bd%d0%b8%d0%b5-1%d1%81/') {
			echo 'https://aiggroup.ru/#obsluzhivanie';
		} else {
			echo get_permalink($service->ID);
		} ?><?php if ($this_service_meta['ale_get_service'][0]){ echo '?type='.$this_service_meta['ale_get_service'][0];}?>" class="go-next"><i class="fa fa-arrow-right go_to_text" aria-hidden="true"></i></a>

                    <!--<img class='img_about' src='<?php echo $this_service_meta['ale_product_photo'][0]?>);'>
                    <img class='img_about_hover' src='<?php echo $this_service_meta['ale_product_photo_hover'][0]?>);'>-->
                    </div>
                </div>
			<?php }
			$line_break_counter++;
			 if ($line_break_counter == 3) {
			 	echo "<div class='line-breaker'></div>";
			 }
			}
		?>
	</div>

 <!--Делаем блок ссылкой целиком -->
 <script>
 	var target='.NEW-about_small_inside';

	jQuery(target).each(function(){
	    jQuery(this).click(function(){
	        location = jQuery(this).find('a.NEW-main_link').attr('href');});
	    
	});
	
	//Удаляем лайн-брейкер
	if (jQuery(window).width() <= 755){
		jQuery(".line-breaker").remove();
	}
	jQuery(window).resize(()=>{
		if (jQuery(window).width() <= 755){
			jQuery(".line-breaker").remove();
		}
	})
	
 </script>
			<!--/--->




	<div class="text-block">
			<?php echo $all_information->post_content;?>
		</div>
</div>
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