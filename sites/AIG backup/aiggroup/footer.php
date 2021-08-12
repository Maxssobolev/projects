    <!-- Footer -->
<?php
wp_enqueue_style(footer);
?>
<footer class='main_footer'>
   <div class="wrapper">
    <div>
    <p><?php echo ale_get_option('left_footer_text') ?></p>
    <p> <i class="fa fa-copyright" aria-hidden="true"> </i> <?php echo ale_get_option('year') ?></p>
    </div>
    <div>
        <h4 class="footer_sub_title">Карта сайта</h4>
		  <ul>
             <li><a href="<?php echo get_site_url();?>/about/">О компании</a></li>
              <li><a href="<?php echo get_site_url();?>/programm/">Программы 1C</a></li>
              <li><a href="<?php echo get_site_url();?>/stock/">Акции</a></li>
              <li><a href="<?php echo get_site_url();?>/contacts/">Контакты</a></li>
         </ul>    
    </div>
    <div>
         <h4 class="footer_sub_title">Услуги</h4>
         <ul>
             <li><a href="<?php echo get_site_url();?>/introduction/">Внедрение 1С</a></li>
             <li><a href="<?php echo get_site_url();?>/#obsluzhivanie">Обслуживание 1С</a></li>
             <li><a href="<?php echo get_site_url();?>/maintenance/">Сопровождение 1С</a></li>
             <li><a href="<?php echo get_site_url();?>/integration/">Интеграция 1С</a></li>
			 <li><a href="<?php echo get_site_url();?>/nastrojka_1s/">Настройка 1С</a></li>
         </ul>
    </div>
	<div>
         <h4 class="footer_sub_title"></h4>
         <ul>
             <li><a href="<?php echo get_site_url();?>/konsultacii-1c/">Консультации 1С</a></li>
             <li><a href="<?php echo get_site_url();?>/podderzhka-1s/">Поддержка 1С</a></li>
			 <li><a href="<?php echo get_site_url();?>/dokumentooborot-1s">Документооборот 1С</a></li>
             <li><a href="<?php echo get_site_url();?>/its/">ИТС Сопровождение</a></li>
             <li><a href="<?php echo get_site_url();?>/integraciya-crm-s-1s">Интеграция CRM с 1С</a></li>
         </ul>
    </div>
    <div>
        <h4 class="footer_sub_title">Хотите оставаться в курсе новостей и акций?</h4>
        <form action="" id="subscribe_form">
            <input type="text" placeholder='Оставьте свой E-mail'>
            <input type="submit" value="Подписаться" id="subscribe">
        </form>

<!--        <div class='social_network'>
<h4 class="footer_sub_title">Мы в социальных сетях</h4>  
 <ul class='social_network_href'>
             <li><a href=""><i class="fa fa-vk" aria-hidden="true"></i></a></li>
             <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
             <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
             <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
         </ul> 
</div> -->
    </div>
    </div>
</footer>
    <!-- Scripts -->
    <?php wp_footer(); ?>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(57285733, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/57285733" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>