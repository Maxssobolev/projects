<?php
/*
  * Template name: About
  * */
get_header();

$all_information_meta = get_post_meta($post->ID);
$all_information = get_post($post->ID);
wp_enqueue_style(about_page_style);

// echo '<pre>';
// print_r($all_information2);
// echo '</pre>';

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
<div class="wrapper">
    <div class="our_team page_block">
        <div class="left">
            <span class="tag"><?php echo $all_information_meta['ale_teg1'][0]; ?></span>
            <h2 class="block_title"><?php echo $all_information_meta['ale_sub_title1'][0]; ?></h2>
            <div class="about_team"><p><?php echo $all_information_meta['ale_text_block1'][0]; ?></p></div>
<!--			   <button class='btn_orange'>Стать клиентом</button>-->
        </div>
        <div class="right">
            <img class='block_main_img'  src="<?php echo $all_information_meta['ale_image1'][0]; ?>" alt="">
        </div>
    </div>
</div>
<div class="background_peach">
	<div class="wrapper">
		<div class="our_services page_block">
			<div class="left">
					<img class='block_main_img'  src="<?php echo $all_information_meta['ale_image2'][0]; ?>" alt="">
			</div>
			<div class="right">
				<span class="tag"><?php echo $all_information_meta['ale_teg2'][0]; ?></span>
				<h2 class="block_title"><?php echo $all_information_meta['ale_sub_title2'][0]; ?></h2>

				<?php
				foreach($all_information_meta as $key => $value){
							if(preg_match("/^ale_efficiency\d+$/", $key)){ ?>
				<div class="one_service">
				 <i class="fa fa-check" aria-hidden="true"></i><p><?php echo $value[0];?></p>
				 </div>
				<?php
				 }
				}?>
				   <a class='all_product_href' href="<?php echo get_permalink('50')?>">Подобрать решение</a>
			</div>
		</div>
	</div>
</div>


</div>
<div class='leaders_page clearfix'>
		<div class='wrapper clearfix'>
				<p class='block_teg'>Наша команда</p>
				<div class="text_block">
					<div class="left">
						<h2 class='block_title'>Мы всегда поможем решить любые вопросы</h2>
					</div>
					<div class="right">
						<a class='btn_orange' href="#">Связаться с нами</a>
					</div>
				</div>
				<div class='leaders_info'>
				 <?php $about_first = get_post_meta('104')?>
						<div class='sub_leaders'>
							<img src=" <?php echo $about_first['ale_leader_photo'][0]?>" alt="">
							<h4> <?php echo $about_first['ale_fio'][0]?></h4>
							<p> <?php echo $about_first['ale_position'][0]?></p>
							<p> <?php echo $about_first['ale_phone'][0]?></p>
							<p> <?php echo $about_first['ale_mail'][0]?></p>
						</div>
				<?php $about_second = get_post_meta('99')?>
						<div class='main_leaders'> 
							<img src=" <?php echo $about_second['ale_leader_photo'][0]?>" alt="">
							<h4> <?php echo $about_second['ale_fio'][0]?></h4>
							<p> <?php echo $about_second['ale_position'][0]?></p>
							<p> <?php echo $about_second['ale_phone'][0]?></p>
						</div>
				<?php $about_third = get_post_meta('103')?>
						<div class='sub_leaders'>
							<img src=" <?php echo $about_third['ale_leader_photo'][0]?>" alt="">
							<h4> <?php echo $about_third['ale_fio'][0]?></h4>
							<p> <?php echo $about_third['ale_position'][0]?></p>
							<p> <?php echo $about_third['ale_phone'][0]?></p>
							<p> <?php echo $about_third['ale_mail'][0]?></p>
						</div>
				</div>
		</div>
</div>
<?php get_footer();

