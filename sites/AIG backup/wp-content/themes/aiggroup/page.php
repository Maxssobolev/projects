<?php get_header(); ?>
    <!-- Content -->

<?php if(get_permalink() == "https://aiggroup.ru/view-product/"){
     $product = get_post($_GET['id']);
 } ?>

    





<?php   
            //если это страница УНФ - подключаем ее тепмлпейт
            if ($_GET['id'] == '386'):
                include_once('unf_page.php');
            
            ?>

        
            <?php else: ?>

            <div class='title_block' style='background-image: url(https://aiggroup.ru/wp-content/uploads/2019/06/bg.png)'>
                <div class="wrapper main_block">
                    <div class="title_block_inside">
                         <h1 class="main_title">
                            <?=$product->post_title;?>
                         </h1>
                         <h5 class="sub_title">
                            
                         </h5>
                     </div>
                </div>
            </div>
            <div class="wrapper">
                   <div class="inner-wrapper">
                        <div class="text-block description">
                            <?=$product->post_content; ?>
                        </div>

                   </div>


                    
                </div>
                <style>
                    .inner-wrapper{
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                    }

                    .wrapper .inner-wrapper .title{
                        font-size: 24px;
                        margin: 35px;
                    }
                </style>
                <?php endif; ?>



<?php if(get_permalink() != "https://aiggroup.ru/view-product/"): ?>

            <div class="page-center">
                <div class="content">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="h2" ><?php the_title(); ?></div>
                        <div class="contact-content">
                            <?php ale_part('pagehead');?>
                            <?php the_content(); ?>
                            <?php ale_part('pagefooter');?>
                        </div>
                    <?php endwhile; else: ?>
                    <?php ale_part('notfound')?>
                    <?php endif; ?>
                </div>
            </div>

<?php endif; ?>
<?php get_footer(); ?>