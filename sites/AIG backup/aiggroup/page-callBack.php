<?php
/*
  * Template name: callBack
  * */
  
get_header();

wp_enqueue_style(footer);

$all_information = get_post($post->ID);
$all_information_meta = get_post_meta($post->ID);
// echo '<pre>';
// print_r($all_information_meta);
// echo '</pre>';
?>
<div class='page_callBack'>
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
		<div class='text_blok'>
			<h2>Уважаемые клиенты!</h2>
			<p>Если у Вас есть пожелания или отзывы о работе наших сотрудников, то мы с радостью выслушаем Вас и откорректируем нашу работу.</p>
			<p class='to_whom'>С уважением,<br>
			Игорь Гаврилов, <br>
			Директор АИГ Консалт</p>
		</div>
		<div class='form_blok'>
			<form action=""  class="feedback">
				<input type="text" placeholder='Ваше имя'>
				<input type="text" placeholder='Ваш email'>
				<textarea name="" id="" cols="30" rows="10" placeholder='Ваше сообщение'></textarea>
				<input type="submit" class='btn_orange' id="send_feedback">
			</form>
		</div>
	</div>
</div>
	<div class='clearfix' ></div>
<?php get_footer();