<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Contact Enquiries CPT
 */
function gk_contact_register_post_type()
{
    $labels = [
        'name'               => __('Contact Enquiries', 'gazelles-kitchen'),
        'singular_name'      => __('Contact Enquiry', 'gazelles-kitchen'),
        'menu_name'          => __('Contact Enquiries', 'gazelles-kitchen'),
        'name_admin_bar'     => __('Contact Enquiry', 'gazelles-kitchen'),
        'add_new'            => __('Add New', 'gazelles-kitchen'),
        'add_new_item'       => __('Add New Contact Enquiry', 'gazelles-kitchen'),
        'edit_item'          => __('Edit Contact Enquiry', 'gazelles-kitchen'),
        'new_item'           => __('New Contact Enquiry', 'gazelles-kitchen'),
        'view_item'          => __('View Contact Enquiry', 'gazelles-kitchen'),
        'search_items'       => __('Search Contact Enquiries', 'gazelles-kitchen'),
        'not_found'          => __('No Contact Enquiries found.', 'gazelles-kitchen'),
        'not_found_in_trash' => __('No Contact Enquiries found in Trash.', 'gazelles-kitchen'),
    ];

    register_post_type('gk_contact', [

        'labels' => $labels,

        'public' => false,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 26,

        'menu_icon' => 'dashicons-email-alt',

        'supports' => [
            'title',
        ],

        'has_archive' => false,

        'rewrite' => false,

        'publicly_queryable' => false,

        'exclude_from_search' => true,

        'show_in_nav_menus' => false,

        'show_in_admin_bar' => true,

        'capability_type' => 'post',
    ]);
}

add_action('init', 'gk_contact_register_post_type');