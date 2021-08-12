<?php
/*
  * Template name: Home
  * */
get_header();

$all_information = get_post_meta($post->ID);
$all_information2 = get_post($post->ID);

wp_enqueue_style(home_page_style);
// wp_enqueue_style(bootstrap);

?><a name="obsluzhivanie"></a>
<div class='title_block_main' style='background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>);'>

    <div class="wrapper main_block">
        <div class="title_block">
            <h1 class="main_title">
                <?php echo $all_information['ale_title'][0]; ?>
            </h1>

            <div class="call_form">
                <form action="" id="subscribe_form2">
                    <input type="text" placeholder="+7 (999) 999-99-99" id='call_me_main'>
                    <input type="submit" value="Заказать звонок" id="subscribe_form2">
                </form>
            </div>
        </div>
        <img src="<?php echo $all_information['ale_image1'][0]; ?>" class="main_block_img">
    </div>
</div>
<!--
<div class="featured-link link-to-service">
    <a href="https://aiggroup.ru/listits/1%d1%81-%d1%84%d1%80%d0%b5%d1%88/"><span>1С через Интернет!</span></a>
</div> -->

<?php
$pluses = get_posts(array(
    'numberposts' => -1,
    'orderby'     => 'post_date',
    'order'       => 'ASC',
    'post_type'   => 'workPlus',
    'post_status'   => 'publish',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));

?>

<div class="wrapper clearfix">
    <div class="our_plus">

        <img src="<?php echo $all_information['ale_image2'][0]; ?>" alt="">

        <div class="our_plus_text">
            <p class="title-h2">Как мы работаем</p>
            <!-- changes by max -->
            <div class="step-cards">
                <?php $count = 1;
                foreach ($pluses as $plus) { ?>
                    <div class="step-cards__item">
                        <div class="step-cards__item-title">

                            <div class="step-cards__item-title_number"><?= $count ?></div>
                            <!--<div class="step-cards__item-title_name"><?= $plus->post_title ?></div>-->
                        </div>

                        <div class="step-cards__item-description">
                            <div><?= $plus->post_content ?></div>
                        </div>
                    </div>
                <?php
                    $count++;
                }   ?>





            </div>

            <!--/-->

            <!--<div class="plus">
	<?php $count = 1;
    foreach ($pluses as $plus) { ?>
        <div class='one_plus'> 
		<span class='number_plus'><?php echo $count; ?></span>
		<span><?php echo $plus->post_title; ?></span>
            <p><?php echo $plus->post_content; ?></p>
        </div>
		<?php
        $count++;
    }    ?>
    </div>-->
        </div>
    </div>
</div>

<?php
$products = get_posts(array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'products',
    'post_status'   => 'publish',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));

?>

<div class="background_peach">
    <div class="wrapper clearfix">

        <div class="our_main_product">
            <p class="our_main_product_title title-h2">Популярные решения среди наших клиентов</p>
            <a class="all_product" href="<?php echo get_permalink('50') ?>">Все решения</a>
            <div class="clearfix"></div>
            <div class="products">
                <?php foreach ($products as $product) {
                    $this_product_meta = get_post_meta($product->ID);
                ?>
                    <div class="product">
                        <p class="title-h4"><?php echo $product->post_title; ?></p>
                        <img src="<?php echo get_the_post_thumbnail_url($product->ID); ?>" alt="">
                        <div id='coast'>Стоимость: <span class='coast_color'><?php echo $this_product_meta['ale_coast'][0]; ?> рублей</span></div>

                        <p id='coast_none'><?php echo $this_product_meta['ale_coast'][0]; ?> </p>
                        <p class='get_buy_popup'>Подробнее</p>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$services = get_posts(array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'post_type'   => 'service',
    'post_status'   => 'publish',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
));
?>

<div class="wrapper clearfix">
    <p class="our_main_product_title about__h2 title-h2">Основные услуги</p>
    <div class="about_small">

        <?php foreach ($services as $service) {
            $this_service_meta = get_post_meta($service->ID);
            if (isset($this_service_meta['ale_product_main'])) {
        ?>
                <div class="about_small_inside">
                    <div class='img_about' style='background-image: url(<?php echo $this_service_meta['ale_product_photo'][0] ?>);'></div>
                    <div class='img_about_hover' style='background-image: url(<?php echo $this_service_meta['ale_product_photo_hover'][0] ?>);'></div>
                    <p class="title-h4"><?php echo $service->post_title; ?></p>
                    <p><?php echo $this_service_meta['ale_preview'][0] ?>
                    </p>
                    <div>
                        <a href="<?php echo get_permalink($service->ID) ?>?type=<?php echo $this_service_meta['ale_get_service'][0] ?>"><i class="fa fa-arrow-right go_to_text" aria-hidden="true"></i></a>
                    </div>
                </div>

        <?php }
        }
        ?>
    </div>
    <div class="text-block">

        <div class="NEW-text-block">
            <p>«АИГ КОНСАЛТ» - компания-франчайзи 1С. Мы предоставляем услуги по 1с обслуживанию – обновляем, консультируем и дорабатываем продукты 1с, согласно пожеланиям клиента. Помогаем выбрать продукты на базе 1с, которые решат задачи бизнеса и проводим внедрение 1с. И ещё много чего другого, о чём подробно рассказываем в разделе <a href='https://aiggroup.ru/allservice/'>Услуги 1С.</a> </p>
            <h2>Почему мы предоставляем отличное обслуживание 1с?</h2>
            <p>Рынок организаций, осуществляющих обслуживание 1с в Санкт-Петербурге, большой, мы же выделяемся тем, что к каждому клиенту находим свой оригинальный подход. Ваши программы 1с – словно наши детища, мы ждём ваших вопросов по работе в программе, и если увидим какие-то недочёты, даже не относящиеся к вопросу – сообщим, чтобы вам было комфортнее работать.</p>
            <p>Индивидуальный подход к каждому клиенту – помимо личного менеджера и сервис-инженера, мы по- особенному тепло работаем с нашими заказчиками – с кем-то можем позволить себе пошутить, с кем-то соблюдаем лишь деловой настрой, но главное – мы искренне и ответственно подходим к любому вопросу. Иногда наши консультанты даже устраивают дискуссии, как лучше сделать ту или иную операцию, чтобы клиент тратил на это меньше времени и становился ближе к цели задачи.</p>
            <p>Специалисты АИГ КОНСАЛТ превращают работу в 1с из сложного в простое. Они легко ответят на вопросы от «где найти эту кнопку» до «почему не зайти в программу» и «не сходится баланс», так у нас происходит обслуживание 1с бухгалтерии. </p>
            <p>Мы не боимся сложностей – совершенствуем свой уровень знаний вместе с новшествами закона и с радостью делимся опытом с клиентами, а если у 1с не автоматизирован какой-либо из бизнес-процессов – найдём обходные пути стандартными документами или предложим доработку.</p>
            <p>Поэтому наши клиенты заключают с нами договора на абонентское обслуживание 1с, узнать какая на обслуживание 1с цена для конкретно вашей программы и потребности можно у наших менеджеров.</p>




        </div>







        <?php //echo $all_information2->post_content;
        ?>
        <!--
<p>Пофессиональное обслуживание 1C реализует компания «АИГ КОНСАЛТ» , которая позволит клиентам максимально эффективно решать повседневные задачи и вопросы, связанные со стабильным функционированием программного обеспечения. Они смогут подобрать для себя наиболее полезные компоненты, а специалисты систематизируют необходимые обновления и облегчат процесс внедрения разработок как внутри крупной сети, так и в небольших офисах. </p>



<p></p> -->


        <!--
<h2>Что входит в услуги
обслуживания?</h2>
 -->


        <!--



<p>Комплексное обслуживание 1C включает в себя такие операции, как доработка имеющегося функционала (с ее помощью можно ускорить процесс ознакомления сотрудников с основными возможностями программы), установка обновлений и дополнений, настройка отмена данных между программами по типу 1С, настройка прав и ролей активных пользователей, а также подключение и настройка оборудования. </p>



<p>Процесс подключения и настройки сервисов выполняется в присутствии клиента. При этом, можно заранее согласовать определённые условия использования программ для минимизации рисков и посторонних издержек. Все дополнительные консультации по 1С предоставляются на бесплатной основе. При этом, если владелец нуждается в обновлении ранее установленных компонентов, то специалист готов выполнить эти операции под ключ. </p>



<p></p>


<h2 class="text-block">Почему доверяют специалистам фирмы «АИГ&nbsp;КОНСАЛТ»?</h2>



<p></p>



<p>Мастера оперативно подходят к выполнению подобных задач, обеспечивая тем самым стабильную работу любого оборудования. Большой опыт сотрудников помогает в выполнении повседневных задач и сложных операций. </p>



<p>Преимущества заказа
услуг:&nbsp;</p>



<ul><li>комплексный
подход к решению любых задач;</li><li>ответственность
сотрудников и возможность выполнения любой задачи;</li><li>лояльная
стоимость оказываемых услуг;</li><li>только
официальное программное обеспечение, используемое для работы;</li><li>индивидуальный
подход к решению основных потребностей пользователей.</li></ul>



<p>Оставить заявку на
проведение опции можно на сайте компании. Менеджеры обязательно согласуют все
детали для дальнейшего успешного сотрудничества.&nbsp;Специалисты готовы
подъехать в любой офис в Санкт-Петербурге и оказать необходимые действия с
предоставлением официальной гарантии.&nbsp;</p>
		-->
    </div>
</div>
</div>

<!-- ОТЗЫВЫ КАРУСЕЛЬЮ 
<div class="wrapper clearfix">
<?php //echo do_shortcode( '[tpsscode themes = "theme1"]' ); 
?>
</div>

-->

<?php get_footer();
