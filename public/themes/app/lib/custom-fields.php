<?php
// =============================================================================
// Custom Fields
// =============================================================================


if (function_exists('register_field_group')) {


    // Attribution
    // =========================================================================

    register_field_group(array (
        'id' => 'acf_attribution',
        'title' => 'Attribution',
        'fields' => array (
            array (
                'key' => 'field_571bfca9da5da',
                'label' => 'Creator',
                'name' => 'creator',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_571bfcbbda5db',
                'label' => 'Origin',
                'name' => 'origin',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_57275cef2db25',
                'label' => 'Creator URL',
                'name' => 'creator_url',
                'type' => 'text',
                'instructions' => 'URL of the creator',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'ef_media',
                    'operator' => '==',
                    'value' => 'all',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
