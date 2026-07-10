<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'gpp_register_pricing_plan_cpt');

function gpp_register_pricing_plan_cpt() {

    $labels = [
        'name'               => 'Catering Plans',
        'singular_name'      => 'Catering Plan',
        'add_new'            => 'Add New Catering Plan',
        'add_new_item'       => 'Add New Catering Plan',
        'edit_item'          => 'Edit Catering Plan',
        'new_item'           => 'New Catering Plan',
        'view_item'          => 'View Catering Plan',
        'search_items'       => 'Search Catering Plans',
        'not_found'          => 'No Catering Plans found',
        'not_found_in_trash' => 'No Catering Plans found in Trash',
        'menu_name'          => 'Catering Plans',
    ];

    register_post_type('gpp_pricing_plan', [
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-money-alt',
        'supports'           => ['title', 'page-attributes'],
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'catering'],
        'show_in_rest'       => false,
    ]);
}