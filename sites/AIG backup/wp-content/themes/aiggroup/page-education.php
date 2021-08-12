<?php
/*
  * Template name: Education
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
                        <?php echo $all_information->post_content;?>
                    </h5>
                </div>
            </div>
        </div>


        <?php
        $services = get_posts( array(
            'numberposts' => -1,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'post_type'   => 'listteaching',
            'post_status'   => 'publish',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        ?>

        <div class="wrapper clearfix">
            <div class="about_small">
                <?php foreach($services as $service){
                    $this_service_meta = get_post_meta($service->ID);?>
                    <div class="about_small_inside">
                        <img class='img_about' src='<?php echo get_site_url()?>/wp-content/uploads/2019/07/education-1.gif'>
                        <h4><?php echo $service->post_title;?></h4>
                        <p><?php echo $this_service_meta['ale_preview'][0]?></p>
                        <div>
                            <a href="<?php echo get_permalink($service->ID)?>"><i class="fa fa-arrow-right go_to_text" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php }	?>
            </div>
        </div>

    </div>
<?php get_footer();