<?php
/**
 * Plugin Name: App Relative URLs
 * Description: Make URLs relative apposed to absolute.
 * Version: 1.0.0
 * Author: Neil Sweeney
 * Website: http://wolfiezero.com
 * License: GPLv2 or later
 *
 * Code based on the following
 * - http://www.456bereastreet.com/archive/201010/how_to_make_wordpress_urls_root_relative/
 * - https://github.com/roots/soil/blob/master/modules/relative-urls.php
 */


if (is_admin() || isset($_GET['sitemap']) || in_array($GLOBALS['pagenow'], ['wp-login.php', 'wp-register.php'])) {
    return;
}

$filters = apply_filters('relative-url-filters', [
    'bloginfo_url',
    'the_permalink',
    'wp_list_pages',
    'wp_list_categories',
    'wp_get_attachment_url',
    'the_content_more_link',
    'the_tags',
    'get_pagenum_link',
    'get_comment_link',
    'month_link',
    'day_link',
    'year_link',
    'term_link',
    'the_author_posts_link',
    'script_loader_src',
    'style_loader_src'
]);

foreach ($filters as $filter) {
    add_filter($filter, 'makeRelative', 10, 1);
}


function makeRelative($input)
{
    if (is_feed()) {
        return $input;
    }

    $url = parse_url($input);

    // Check to see if the host or path isn't set then return what was given
    if (! isset($url['host']) || ! isset($url['path'])) {
        return $input;
    }

    $siteUrl = parse_url(network_home_url());

    // Check that we scheme (a la `http` or `https`) and if not set it to
    // what we're are currently on
    if (! isset($url['scheme'])) {
        $url['scheme'] = $siteUrl['scheme'];
    }

    // Check that the URL given is an internal one and not anything else
    $doesHostMatch  = $siteUrl['host'] === $url['host'];
    $doSchemesMatch = $siteUrl['scheme'] === $url['scheme'];
    $doPortsMatch   = (isset($siteUrl['port']) && isset($url['port'])) ? $siteUrl['port'] === $url['port'] : true;

    if ($doesHostMatch && $doSchemesMatch && $doPortsMatch) {
        return wp_make_link_relative($input);
    }

    return $input;
}
