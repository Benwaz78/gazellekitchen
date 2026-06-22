<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'gpp_register_pricing_plan_cpt');

function gpp_register_pricing_plan_cpt() {

    $labels = [
        'name'               => 'Pricing Plans',
        'singular_name'      => 'Pricing Plan',
        'add_new'            => 'Add New Plan',
        'add_new_item'       => 'Add New Pricing Plan',
        'edit_item'          => 'Edit Pricing Plan',
        'new_item'           => 'New Pricing Plan',
        'view_item'          => 'View Pricing Plan',
        'search_items'       => 'Search Pricing Plans',
        'not_found'          => 'No pricing plans found',
        'not_found_in_trash' => 'No pricing plans found in Trash',
        'menu_name'          => 'Pricing Plans',
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