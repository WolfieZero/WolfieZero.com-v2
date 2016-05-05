    <div class="full-screen-nav">
        <?php
            if (has_nav_menu('header')) {
               wp_nav_menu([
                   'theme_location'  => 'header',
                   'container'       => 'nav',
                   'container_class' => 'full-screen-nav__contents',
                   'menu_class' => 'list--no-style text-center',
               ]);
            }
        ?>
        <?php get_template_part('partials/social'); ?>
    </div>

    <footer class="site-footer container">
        <p class="aligncenter">Copyright <?php echo date('Y'); ?> Neil Sweeney</p>
        <p class="aligncenter">
            <a href="https://github.com/wolfiezero/wolfiezero.com/"><i class="fa fa-github" aria-hidden="true"></i></a>
            &nbsp; &nbsp;
            <a href="https://m.do.co/c/b09f57880a88"><i class="fa fa-cloud" aria-hidden="true"></i></a>
            &nbsp; &nbsp;
            <a href="https://github.com/small-skeletal/wordpress"><i class="fa fa-wordpress" aria-hidden="true"></i></a>
        </p>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
