<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Contact Enquiries Admin Columns
 */
function gk_contact_columns($columns)
{
    return [
        'cb'            => $columns['cb'],
        'title'         => __('Name', 'gazelles-kitchen'),
        'email'         => __('Email', 'gazelles-kitchen'),
        'phone'         => __('Phone', 'gazelles-kitchen'),
        'status'        => __('Status', 'gazelles-kitchen'),
        'date'          => __('Date', 'gazelles-kitchen'),
    ];
}

add_filter(
    'manage_gk_contact_posts_columns',
    'gk_contact_columns'
);

/**
 * Populate Custom Columns
 */
function gk_contact_column_content($column, $post_id)
{
    switch ($column) {

        case 'email':
            echo esc_html(
                get_post_meta(
                    $post_id,
                    '_contact_email',
                    true
                )
            );
            break;

        case 'phone':
            echo esc_html(
                get_post_meta(
                    $post_id,
                    '_contact_phone',
                    true
                )
            );
            break;

        

        case 'status':

            $status = get_post_meta(
                $post_id,
                '_contact_status',
                true
            );

            if (empty($status)) {
                $status = 'new';
            }

            echo esc_html(ucwords(str_replace('_', ' ', $status)));

            break;
    }
}

add_action(
    'manage_gk_contact_posts_custom_column',
    'gk_contact_column_content',
    10,
    2
);