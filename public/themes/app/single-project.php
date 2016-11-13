<?php
// ============================================================================
// Project
// ============================================================================

the_post();

$featured_image_url = '';
$hero_style         = 'hero--minimal';
$hero_content_class = 'hero__content';
$fields             = (object) get_fields();

dump($fields);

$techs = '';
foreach ($fields->techs as $tech) {
    $techs .= $tech . ', ';
}
$tech = substr($techs, 0, -2);

if (has_post_thumbnail()) {
    $thumb_id            = get_post_thumbnail_id();
    $thumb_url           = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
    $thumb_creator       = get_post_custom_values('creator', $thumb_id)[0];
    $thumb_creator_url   = get_post_custom_values('creator_url', $thumb_id)[0];
    $thumb_origin        = get_post_custom_values('origin', $thumb_id)[0];
    $featured_image_url  = $thumb_url[0];
    $hero_style          = 'hero--majority';
    $hero_content_class .= ' hero__content--fade';
}

get_header();
?>

<article class="article">

    <header class="article__header hero hero--style<?php echo ' ' . $hero_style; ?>" style="background-image: url('<?php echo $featured_image_url; ?>');">
        <div class="<?php echo $hero_content_class; ?>">
            <div class="container">
                <h1 class="article__title"><?php the_title(); ?></h1>
                <div class="article__blurb">
                    <p class="article__meta">
                        <?php
                            echo $tech;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <div class="article__content">
        <div class="content">
            <div class="">
                <div class="device device__phone device__phone--landscape">
                    <iframe class="device__screen" src="http://fubra.com/"></iframe>
                </div>
            </div>

            <?php the_content(); ?>
        </div>
    </div>

</article>

<?php get_footer(); ?>
