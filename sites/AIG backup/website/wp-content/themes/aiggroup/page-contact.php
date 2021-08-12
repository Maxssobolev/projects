<?php
/*
  * Template name: Contact
  * */
  
get_header();

wp_enqueue_style(footer);

$all_information = get_post($post->ID);
$all_information_meta = get_post_meta($post->ID);

// echo '<pre>';
// print_r($all_information_meta);
// echo '</pre>';

?>
<div class='contact_page'>
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

<div class='wrapper'>
	<div class='office_info'>
		<div>
			<span><i class="fa fa-envelope" aria-hidden="true"></i>Email</span>
			<p><?php echo $all_information_meta['ale_email'][0];?></p>
		</div>
		<div>
			<span><i class="fa fa-phone" aria-hidden="true"></i>Телефон</span>
			<p><?php echo $all_information_meta['ale_phone'][0];?></p>
		</div>
		<div>
			<span><i class="fa fa-map-marker" aria-hidden="true"></i>Адрес</span>
			<p><?php echo $all_information_meta['ale_address'][0];?></p>
		</div>
		<div>
		<a href='/call-back/'><span><i class="fa fa-address-book-o" aria-hidden="true"></i></span><span class='virtual_reception'>Виртуальная приемная</span><a>
		</div>
	</div>
</div>

<div class="wrapper clearfix form_block">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.8406772205055!2d30.377834343758575!3d59.93478584708959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631a84e99cddf%3A0x2ef72e392ebd9be3!2zOC3RjyDQodC-0LLQtdGC0YHQutCw0Y8g0YPQuy4sIDQ4LCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywgMTkxMDM2!5e0!3m2!1sru!2sru!4v1560431953836!5m2!1sru!2sru" width="540" height="695" frameborder="0" style="border:0" allowfullscreen></iframe>
   
   <form class='feedback'>
   <p class="teg">Обратная связь</p>
   <h2 class="form_title">Напишите нам</h2>
       <input type="text"  placeholder='Ваше имя' name='fio_feedback'>
       <input type="text" placeholder='Ваш email' name='mail_feedback'>
       <textarea placeholder='Ваше сообщение' name='message'></textarea>
       <input type="submit" class="btn_orange" value='Отправить' id='send_feedback'>
   </form>
    
</div>
</div>
<?php get_footer();