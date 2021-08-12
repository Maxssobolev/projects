<?php
  

get_header();
wp_enqueue_style(service_style);
wp_enqueue_style(all_single_style);

$all_information = get_post($post->ID);
$this_meta = get_post_meta($post->ID);
// echo '<pre>';
// print_r($all_information);
// echo '</pre>';

?>
<div class='title_block' style='background-image: url(<?php echo get_the_post_thumbnail_url('6'); ?>);'>
    <div class="wrapper main_block">
        <div class="title_block_inside">
             <h1 class="main_title">
                <?php echo $all_information->post_title;?>
             </h1>
             <h5 class="sub_title">
                <?php echo $this_news_meta_main['ale_preview'][0];?>
             </h5>
         </div>
	</div>
</div>

<div class="wrapper_single clearfix">
	<div class="about_vacancy">
	<h3>Требования:</h3>
	<p class='white_space'> <?php echo $this_meta['ale_requirement'][0];?></p> 
<?php if ($this_meta['ale_education'][0]): ?> <p>Образование: <?php echo $this_meta['ale_education'][0]?></p> <?php endif; ?>
	<h3>Обязанности:</h3>
	<p class='white_space'><?php echo $this_meta['ale_responsibilities'][0];?></p>
	<h3>Условия:</h3>
	 <?php echo $all_information->post_content;?>
	 <p> Заработная плата от: <?php echo $this_meta['ale_salary'][0]?> рублей. Условия обсуждаются индивидуально с кандидатом.</p>
	 </div>
</div>
	<div class="wrapper_single contact_form_bolck">
		<h5>По всем вопросам обращайтесь по телефону <?php echo ale_get_option('hr_phone') ?> или на e-mail <a href="mailto:hr@aiggroup.ru">hr@aiggroup.ru</a></p>
	</div>
	
<div class='clearfix'></div>
<?php get_footer();