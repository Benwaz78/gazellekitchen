<?php

defined('ABSPATH') || exit;

/**
 * Customize Meal Prep Order Columns
 */
add_filter(
    'manage_gk_meal_prep_order_posts_columns',
    'gk_meal_prep_admin_columns'
);

function gk_meal_prep_admin_columns($columns)
{
    return [

        'cb' => $columns['cb'],

        'order_number' => __('Order Number', 'gazelle-meal-prep'),

        'customer'      => __('Customer', 'gazelle-meal-prep'),

        'phone' => __('Phone', 'gazelle-meal-prep'),

        'delivery_city' => __('Delivery City', 'gazelle-meal-prep'),

        'delivery_date' => __('Delivery Date', 'gazelle-meal-prep'),

        'status' => __('Status', 'gazelle-meal-prep'),

        'date' => __('Submitted', 'gazelle-meal-prep')

    ];
}

/**
 * Render Custom Columns
 */
add_action(
    'manage_gk_meal_prep_order_posts_custom_column',
    'gk_meal_prep_render_admin_columns',
    10,
    2
);

function gk_meal_prep_render_admin_columns($column, $post_id)
{

    switch ($column) {

        case 'order_number':

            echo esc_html(
                gk_meal_prep_order_number($post_id)
            );
            break;

        case 'customer':

            echo esc_html(
                get_post_meta(
                    $post_id,
                    '_fullname',
                    true
                )
            );

            break;

        case 'phone':

            echo esc_html(
                get_post_meta($post_id, '_phone', true)
            );

            break;

        case 'delivery_city':

            echo esc_html(
                get_post_meta($post_id, '_delivery_city', true)
            );

            break;

        case 'delivery_date':

            echo esc_html(
                get_post_meta($post_id, '_delivery_date', true)
            );

            break;

        case 'status':

            $status = get_post_meta(
                $post_id,
                '_order_status',
                true
            );

            if (!$status) {
                $status = 'new';
            }

            echo gk_meal_prep_status_badge($status);

            break;

    }

}


/**
 * Register Sortable Columns
 */
add_filter(
    'manage_edit-gk_meal_prep_order_sortable_columns',
    'gk_meal_prep_sortable_columns'
);

function gk_meal_prep_sortable_columns($columns)
{
    $columns['delivery_city'] = 'delivery_city';
    $columns['delivery_date'] = 'delivery_date';
    $columns['status'] = 'status';

    return $columns;
}


