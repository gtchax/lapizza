<?php get_header(); ?>
    <?php if( have_posts() ): while(have_posts()) : the_post();?>
         <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
                <div class="hero-content">
                    <div class="hero-text">
                        <?php the_title('<h2>','</h2>'); ?>
                    </div>
                </div>
            </div>

            <div class="main-content container">
                <main class="text-center content-text">
                    <?php the_content(); ?>
                </main>
            </div>
    <?php endwhile; endif; ?>

  

<div class="clear">
    <?php get_footer(); ?>
</div>