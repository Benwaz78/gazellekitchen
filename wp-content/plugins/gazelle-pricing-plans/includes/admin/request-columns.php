<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Request Columns
|--------------------------------------------------------------------------
*/

add_filter(
    'manage_gpp_catering_request_posts_columns',
    'gpp_catering_request_columns'
);

function gpp_catering_request_columns($columns)
{
    return [

        'cb' => $columns['cb'],

        'customer'          => __('Customer', 'gazelle'),
        'plan'              => __('Plan', 'gazelle'),
        'delivery_date'     => __('Delivery Date', 'gazelle'),
        'delivery_location' => __('Location', 'gazelle'),
        'phone'             => __('Phone', 'gazelle'),
        'status'            => __('Status', 'gazelle'),
        'date'              => __('Submitted', 'gazelle'),

    ];
}

/*
|--------------------------------------------------------------------------
| Column Data
|--------------------------------------------------------------------------
*/

add_action(
    'manage_gpp_catering_request_posts_custom_column',
    'gpp_catering_request_column_data',
    10,
    2
);

function gpp_catering_request_column_data($column, $post_id)
{
    switch ($column) {

        case 'customer':

            echo esc_html(
                get_post_meta($post_id, 'full_name', true)
            );

        break;

        case 'plan':

            $plan_id = get_post_meta($post_id, 'plan_id', true);

            $plan = get_post($plan_id);

            echo $plan
                ? esc_html($plan->post_title)
                : '&mdash;';

        break;

        case 'delivery_date':

            echo esc_html(
                get_post_meta($post_id, 'delivery_date', true)
            );

        break;

        case 'delivery_location':

            echo esc_html(
                get_post_meta($post_id, 'delivery_location', true)
            );

        break;

        case 'phone':

            echo esc_html(
                get_post_meta($post_id, 'phone', true)
            );

        break;

        case 'status':

            $status = get_post_meta($post_id, 'status', true);

            if (empty($status)) {
                $status = 'pending';
            }

            printf(
                '<span class="gkc-status gkc-status-%s">%s</span>',
                esc_attr($status),
                esc_html(ucwords(str_replace('_', ' ', $status)))
            );

        break;
    }
}