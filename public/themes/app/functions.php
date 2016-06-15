<?php
// =============================================================================
// Functions File
// =============================================================================
// All functions that are essental to the design and not the site


// Includes
// =============================================================================

include 'lib/custom-fields.php';


// Actions
// =============================================================================

add_action('wp_enqueue_scripts', ['AppTheme', 'enqueue_files']);
add_action('init', ['AppTheme', 'navigation']);
add_action('init', ['AppTheme', 'theme_setup']);
add_action('init', ['AppTheme', 'theme_support']);


// Filters
// =============================================================================

add_filter('embed_oembed_html', ['AppTheme', 'video_embed'], 10, 3);
add_filter('wp_title', ['AppTheme', 'modify_wp_title']);
add_filter('excerpt_more', ['AppTheme', 'modify_excerpt_more']);
add_filter('excerpt_length', ['AppTheme', 'modify_excerpt_length']);


// Functions
// =============================================================================

class AppTheme {

    /**
     * Scripts to be included.
     *
     * @var  array
     */
    private static $scripts = [
        'app' => '/../themes/app/assets/app.js',
        'syntax-hilight' => 'https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert'
    ];

    /**
     * jQuery version number.
     *
     * @var  string
     */
    private static $jquery_version = '2.2.0';

    /**
     * Adds theme support
     *
     * @return  void
     */
    public static function theme_support()
    {
        // SHow the admin bar on the client sreens.
        show_admin_bar(false);

        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size(50, 50, true);
        // add_image_size('thumbnail-large', 500, '', false);

        // Add title tag theme support.
        add_theme_support('title-tag');

        // Add HTML5 support.
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'widgets',
        ]);
    }

    /**
     * Takes a embed URL and alters the default action
     *
     * @param   string  $original_html  HTML of WordPress default action
     * @param   string  $url            URL of embed
     * @param   array   $args           Aguments
     * @return  string
     */
    public static function video_embed($original_html, $url, $args)
    {
        return '<div class="single__embed">' . $original_html . '</div>';
    }

    /**
     * Navigation for the theme
     *
     * @return  void
     */
    public static function navigation()
    {
        register_nav_menus([
            'header' => 'Header',
            'home'   => 'Home Page',
        ]);
    }

    /**
     * Theme set up settings.
     *
     * @return  void
     */
    public static function theme_setup()
    {
        // Add title tag theme support.
        add_theme_support('title-tag');

        // Add HTML5 support.
        add_theme_support('html5', [
            'search-form',
//            'comment-form',
//            'comment-list',
            'gallery',
            'caption',
//            'widgets',
        ]);
    }

    /**
     * Enqueue and register scripts the right way.
     *
     * @return  void
     */
    public static function enqueue_files()
    {
        if (! is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', 'http' . (self::is_connection_secure() ? 's' : '') . '://code.jquery.com/jquery-' . self::$jquery_version . '.min.js', false, null, true);
            wp_enqueue_script('jquery');

            remove_action('wp_head', 'wp_print_scripts');
            remove_action('wp_head', 'wp_print_head_scripts', 9);
            remove_action('wp_head', 'wp_enqueue_scripts', 1);

            foreach (self::$scripts as $name => $url) {
                wp_enqueue_script($name, $url, ['jquery'], null, true);
            }

            wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
        }
    }

    /**
     * Configure default title.
     *
     * @return  string
     */
    public static function modify_wp_title($title)
    {
        global $post;

        $name        = get_bloginfo('name');
        $description = get_bloginfo('description');

        if (is_front_page() || is_home()) {
            if ($description) {
                return sprintf('%s - %s', $name, $description);
            }

            return $name;
        }

        return sprintf('%s - %s', trim($post->post_title), $name);
    }

    /**
     * Configure excerpt string.
     *
     * @return  string
     */
    public static function modify_excerpt_more()
    {
        return '…';
    }

    /**
     * Change default excerpt length (default: 55).
     *
     * @return  integer
     */
    public static function modify_excerpt_length()
    {
        return 101;
    }

    /**
     * Checks if the current connection to the site is secure.
     *
     * @return  boolean
     */
    public static function is_connection_secure()
    {
        if ($_SERVER['SERVER_PORT'] === 443) {
            return true;
        }

        return false;
    }

}
