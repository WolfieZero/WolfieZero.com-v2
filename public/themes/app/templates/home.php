<?php
// =============================================================================
// Template Name: Home
// =============================================================================

the_post();
get_header(); ?>

<article class="hero hero--home hero--full hero--style">
    <div class="hero__content hero__content--fade">
        <div class="container">
            <h1 class="hero__title">Wolfie<span>Zero</span></h1>
            <p class="hero__blurb">I'm <strong>Neil Sweeney</strong>. A web/app developer by day. Plays video games. Listens to punk loudly. Thinks animals are pretty awesome. I have a thing about being a type 1 diabetic.</p>
            <?php get_template_part('partials/social'); ?>
        </div>
    </div>
    <div class="hero__footer">
        <?php
            if (has_nav_menu('home')) {
                wp_nav_menu([
                   'theme_location'  => 'home',
                   'container'       => 'nav',
                   'container_class' => 'nav nav--footer',
                ]);
            }
       ?>
    </div>
</article>

<main class="site-main container">

    <section class="article-list" id="blog">

        <h2 class="article-list__header">Blog</h2>

        <?php
            wp_reset_query();
            get_template_part('partials/loop', 'posts');
        ?>

        <?php if (count($post) > 5) : ?>
            <nav class="articles-nav">
                <a href="/blog/page/2/" class="articles-nav__more">More Blogs...</a>
            </nav>
        <?php endif; ?>

    </section>

</main>

<?php get_footer(); ?>
