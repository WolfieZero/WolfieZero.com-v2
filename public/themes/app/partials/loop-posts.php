<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    query_posts([
        'showposts' => 5,
        'paged'     => $paged
    ]);
    $count_posts = wp_count_posts();
    $published_posts = $count_posts->publish;
?>

<?php while (have_posts()) : the_post(); ?>

    <?php
        $featured_image_url = '';
        if( has_post_thumbnail() ) {
            $thumb_id           = get_post_thumbnail_id();
            $thumb_url          = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
            $featured_image_url = $thumb_url[0];
        }
    ?>
    <article class="article-item"<?php if( $featured_image_url ) echo ' style="background-image: url(' . $featured_image_url . ');"'; ?>>
        <a href="<?php the_permalink(); ?>" rel="bookmark">
            <h3 class="article-item__title"><?php the_title(); ?></h3>
            <p class="article__meta"><abbr class="published" title="<?php echo date(DATE_ATOM, strtotime(get_the_date('Ymdhis'))); ?>"><?php the_date('d M Y'); ?></abbr></p>
            <p class="article__blurb"><?php echo $post->post_excerpt; ?></p>
        </a>
    </article>

<?php endwhile; ?>

<?php if ($published_posts > 5) : ?>
    <nav class="articles-nav">
        <span class="articles-nav__button">
            <?php next_posts_link('Older posts'); ?>
        </span>
    </nav>
<?php endif; ?>
