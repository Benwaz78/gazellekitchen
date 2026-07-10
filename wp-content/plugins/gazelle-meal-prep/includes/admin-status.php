<?php

defined('ABSPATH') || exit;

add_action(
    'add_meta_boxes',
    'gk_meal_prep_add_status_metabox'
);

function gk_meal_prep_add_status_metabox()
{
    add_meta_box(
        'gmp-order-status',
        __('Order Status', 'gazelle-meal-prep'),
        'gk_meal_prep_status_metabox',
        'gk_meal_prep_order',
        'side',
        'high'
    );
}


function gk_meal_prep_status_metabox($post)
{
    $status = get_post_meta(
        $post->ID,
        '_order_status',
        true
    );

    wp_nonce_field(
        'gmp_save_status',
        'gmp_status_nonce'
    );

    $statuses = [
        'new'        => 'New',
        'contacted'  => 'Contacted',
        'scheduled'  => 'Scheduled',
        'delivered'  => 'Delivered',
        'cancelled'  => 'Cancelled',
    ];

    echo '<select name="gmp_order_status" style="width:100%;">';

    foreach ($statuses as $value => $label) {

        printf(
            '<option value="%s" %s>%s</option>',
            esc_attr($value),
            selected($status, $value, false),
            esc_html($label)
        );

    }

    echo '</select>';
}

add_action(
    'save_post',
    'gk_meal_prep_save_status',
    10,
    2
);

function gk_meal_prep_save_status($post_id)
{
    if (
        !isset($_POST['gmp_status_nonce']) ||
        !wp_verify_nonce(
            $_POST['gmp_status_nonce'],
            'gmp_save_status'
        )
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['gmp_order_status'])) {

        update_post_meta(
            $post_id,
            '_order_status',
            sanitize_key(
                $_POST['gmp_order_status']
            )
        );

    }
}