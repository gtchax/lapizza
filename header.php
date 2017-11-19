<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title')?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <img class="logoimage" src="<?php echo get_template_directory_uri() . '/img/logo.svg'?>" alt="lapizza logo">
            </a>
        </div><!-- .logo -->
        <div class="header-info">
            <div class="socials">
                <?php $social_args = array(
                'theme_location'  =>  'social-menu',
                'container'       =>  'nav',
                'container_class' =>  'socials',
                'container_id'    =>  'socials',
                'link_before'     =>  '<span class="sr-text">',
                'link_after'      =>  '</span>'
            );
            wp_nav_menu($social_args); ?>
            </div><!-- .socials -->
            <div class="address">
                <p>10 Downing Street, London</p>
                <p>Phone Number: +34 586 6778</p>
            </div>
        </div><!-- .header-info -->
    </div><!-- .container -->
</header>
<section class="main-menu container">
    <div class="mobile-menu">
        <a href="#" class="mobile"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a>
    </div>
    <div class="navigation">
        <?php $nav_args = array(
            'theme_location'  => 'header-menu',
            'container'       => 'nav',
            'container_class' =>  'site-nav'
        );
        wp_nav_menu($nav_args); ?>
    </div>
</section>
