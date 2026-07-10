<?php

defined('ABSPATH') || exit;

/**
 * Register frontend form handlers.
 */
add_action(
    'admin_post_nopriv_gk_meal_prep_order',
    'gk_meal_prep_process_form'
);

add_action(
    'admin_post_gk_meal_prep_order',
    'gk_meal_prep_process_form'
);

/**
 * Process Meal Prep Form
 */
function gk_meal_prep_process_form()
{
    if (
        !isset($_POST['gk_meal_prep_nonce']) ||
        !wp_verify_nonce(
            $_POST['gk_meal_prep_nonce'],
            'gk_meal_prep_order'
        )
    ) {
        wp_die(__('Security check failed.', 'gazelle-meal-prep'));
    }

    $order = [

        'fullname' => sanitize_text_field($_POST['fullName'] ?? ''),

        'phone' => sanitize_text_field($_POST['phoneNumber'] ?? ''),
        
        'email' => sanitize_text_field($_POST['email'] ?? ''),

        'delivery_city' => sanitize_text_field($_POST['deliveryCity'] ?? ''),

        'delivery_date' => sanitize_text_field($_POST['deliveryDate'] ?? ''),

        'special_instruction' => sanitize_textarea_field(
            $_POST['specialInstruction'] ?? ''
        ),

        'status' => 'new'

    ];

    $errors = [];

    if (!$order['fullname']) {
        $errors[] = 'Full name is required.';
    }

    if (!$order['phone']) {
        $errors[] = 'Phone number is required.';
    }

    if (!$order['delivery_city']) {
        $errors[] = 'Delivery city is required.';
    }

    if (!$order['email']) {
        $errors[] = 'Email is required.';
    }



    if (!empty($errors)) {

        wp_die(
            implode('<br>', $errors)
        );

    }

    $post_id = wp_insert_post([

        'post_type' => 'gk_meal_prep_order',

        'post_status' => 'publish',

        'post_title' => sprintf(
            '%s - %s',
            $order['fullname'],
            current_time('mysql')
        )

    ]);

    if (is_wp_error($post_id)) {

        wp_die('Unable to create order.');

    }

    foreach ($order as $key => $value) {

        update_post_meta(
            $post_id,
            '_' . $key,
            $value
        );

    }

    update_post_meta(
    $post_id,
    '_order_status',
    'new'
);

    /**
     * Allow other files
     * (WhatsApp, Mollie, Email)
     * to hook in later.
     */
    do_action(
        'gk_meal_prep_order_created',
        $post_id,
        $order
    );

    /**
     * Redirect.
     * We'll improve this later.
     */


    $page_id = get_option(
        'gk_meal_prep_thank_you_page'
    );

    if (!$page_id) {
        wp_die(
            'Please configure the Thank You page in Meal Prep Settings.'
        );
    }

    $url = add_query_arg(
        [
            'order_id' => $post_id
        ],
        get_permalink($page_id)
    );

   
    if (!$page_id) {
        wp_die(
            __('Thank you page not found.', 'gazelle-meal-prep')
        );
    }
    $url = add_query_arg(
        [
            'order_id' => $post_id
        ],
        get_permalink($page_id)
    );
    wp_safe_redirect($url);
    exit;
}