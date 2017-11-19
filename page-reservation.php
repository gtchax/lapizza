<?php
/**
* Template Name: Contact Us
**/
?>

<?php get_header(); ?>
    <?php if( have_posts() ): while(have_posts()) : the_post();?>
         <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>)">
                <div class="hero-content">
                    <div class="hero-text">
                        <?php the_title('<h2>','</h2>'); ?>
                    </div>
                </div>
            </div>

            <div class="main-content container reservation">
                <main class="content-text">
                        <div class="reservation-info">
                            <form action="" class="reservation-form" mehtod="post" id="res-form">
                                <h2>Make a reservation</h2>
                                <div class="field">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="field">
                                    <input type="datetime-local" name="date" placeholder="Date" required>
                                </div>
                                <div class="field">
                                    <input type="email" name="email" placeholder="E-mail" required>
                                </div>
                                <div class="field">
                                    <input type="tel" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="field">
                                    <textarea name="message" placeholder="Message" required></textarea>
                                </div>
                                <input type="submit" name="submit" class="button" value="Send">
                                <input type="hidden" name="hidden" value="1">
                            </form>
                        </div>
                </main>
            </div>
    <?php endwhile; endif; ?>

  

<div class="clear">
    <?php get_footer(); ?>
</div>