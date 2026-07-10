<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Register Catering Request Post Type
|--------------------------------------------------------------------------
*/

add_action('init', 'gpp_register_catering_request_post_type');

function gpp_register_catering_request_post_type()
{
    register_post_type('gpp_catering_request', [

        'labels' => [

            'name'               => __('Catering Requests', 'gazelle'),
            'singular_name'      => __('Catering Request', 'gazelle'),
            'menu_name'          => __('Catering Requests', 'gazelle'),
            'add_new'            => __('Add New', 'gazelle'),
            'add_new_item'       => __('Add Catering Request', 'gazelle'),
            'edit_item'          => __('View Catering Request', 'gazelle'),
            'new_item'           => __('New Catering Request', 'gazelle'),
            'view_item'          => __('View Catering Request', 'gazelle'),
            'search_items'       => __('Search Requests', 'gazelle'),
            'not_found'          => __('No requests found.', 'gazelle'),
            'not_found_in_trash' => __('No requests found in Trash.', 'gazelle'),

        ],

        'public' => false,

        'show_ui' => true,

        'show_in_menu' => 'edit.php?post_type=gpp_pricing_plan',

        'menu_position' => 27,

        'menu_icon' => 'dashicons-clipboard',

        'supports' => [

            'title'

        ],

        'has_archive' => false,

        'rewrite' => false,

        'show_in_rest' => false,

    ]);
}