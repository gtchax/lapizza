<footer>
    <?php
        $args = array(
            'theme_location'  => 'header-menu',
            'container'       => 'nav',
            'after'           => '<span class="separator"> | </span>'
        );

        wp_nav_menu($args)
    ?>

    <div class="location">
        <p>10 Down Street, London</p>
        <p>Phone Number: +23 673 678 8956</p>
        <p class="copyright">All rights reserved. Copyright <?php echo date('Y'); ?></p>
    </div>
</footer>




        <?php wp_footer(); ?>
    </body>
</html>