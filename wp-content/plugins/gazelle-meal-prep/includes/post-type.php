<?php
defined('ABSPATH') || exit;

/**
 * Register Meal Prep Orders Post Type
 */
function gk_meal_prep_register_post_type()
{
    $labels = [
        'name'                  => __('Meal Prep Orders', 'gazelle-meal-prep'),
        'singular_name'         => __('Meal Prep Order', 'gazelle-meal-prep'),
        'menu_name'             => __('Meal Prep Orders', 'gazelle-meal-prep'),
        'name_admin_bar'        => __('Meal Prep Order', 'gazelle-meal-prep'),
        'add_new'               => __('Add New', 'gazelle-meal-prep'),
        'add_new_item'          => __('Add New Order', 'gazelle-meal-prep'),
        'edit_item'             => __('View Order', 'gazelle-meal-prep'),
        'new_item'              => __('New Order', 'gazelle-meal-prep'),
        'view_item'             => __('View Order', 'gazelle-meal-prep'),
        'search_items'          => __('Search Orders', 'gazelle-meal-prep'),
        'not_found'             => __('No orders found', 'gazelle-meal-prep'),
        'not_found_in_trash'    => __('No orders found in Trash', 'gazelle-meal-prep'),
        'all_items'             => __('Meal Prep Orders', 'gazelle-meal-prep'),
    ];

    register_post_type('gk_meal_prep_order', [

        'labels'             => $labels,

        'public'             => false,

        'show_ui'            => true,

        'show_in_menu'       => true,

        'show_in_admin_bar'  => true,

        'show_in_nav_menus'  => false,

        'exclude_from_search'=> true,

        'publicly_queryable' => false,

        'has_archive'        => false,

        'rewrite'            => false,

        'menu_icon'          => 'dashicons-food',

        'menu_position'      => 25,

        'supports'           => [
            'title',
        ],

    ]);
}

add_action('init', 'gk_meal_prep_register_post_type');