<?php
/**
 * Plugin Name: App Custom Post Types
 * Description: Adds custom post types to blog
 * Version: 1.0.0
 * Author: Neil Sweeney
 * Website: http://wolfiezero.com
 * License: GPLv2 or later
 */

add_action('init', 'create_post_types');

function create_post_types() {

    $post_types = [
        'project' => [
            'labels' => [
                'name' => 'Projects',
                'singular_name' => 'Project'
            ],
            'public' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ]
        ]
    ];

    foreach ($post_types as $name => $post_type) {
        register_post_type($name, $post_type);
    }

}
