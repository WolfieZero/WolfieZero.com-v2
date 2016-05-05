<?php
// ============================================================================
// Home
// ============================================================================

get_header();
?>

<main class="site-main container">

    <section class="article-list" id="blog">

        <h1 class="article-list__header">Blog</h1>

        <?php get_template_part('partials/loop', 'posts'); ?>

        <nav class="articles-nav">
            <span class="articles-nav__button alignleft">
                <?php next_posts_link('Older posts'); ?>
            </span>
            <span class="articles-nav__button alignright">
                <?php previous_posts_link('Newer posts'); ?>
            </span>
        </nav>

    </section>

</main>

<?php get_footer(); ?>
