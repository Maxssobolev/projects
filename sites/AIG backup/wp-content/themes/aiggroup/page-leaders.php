<?php
/*
  * Template name: Leaders
  * */
  
get_header();
/*Стили те же, что и для странице о нас*/
wp_enqueue_style(about_page_style);

$all_information = get_post($post->ID);
$all_information_meta = get_post_meta($post->ID);

// echo '<pre>';
// print_r($all_leaders);
// echo '</pre>';

?>
<div class='leaders_page clearfix'>
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

<div class='wrapper clearfix'>
		<p class='block_teg'><?php echo $all_information_meta['ale_teg'][0];?></p>
		<div class="text_block">
			<div class="left">
				<h2 class='block_title'><?php echo $all_information_meta['ale_sub_title'][0];?></h2>
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