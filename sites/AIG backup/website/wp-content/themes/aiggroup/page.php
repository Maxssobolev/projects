<?php get_header(); ?>
    <!-- Content -->


 <?php if(get_permalink() == "https://aiggroup.ru/view-product/"): 
            $product = get_post($_GET['id']);

            ?>

        

        <div class="wrapper">
               <div class="inner-wrapper">
                    
                    <div class="title">
                        <h2><?=$product->post_title;?></h2>
                    </div>
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

        <?php else: ?>




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