<?php

defined('ABSPATH') || exit;

add_action('admin_post_gk_catering_order', 'gk_handle_catering_order');
add_action('admin_post_nopriv_gk_catering_order', 'gk_handle_catering_order');

function gk_handle_catering_order()
{
    if (
        ! isset($_POST['gk_catering_nonce']) ||
        ! wp_verify_nonce($_POST['gk_catering_nonce'], 'gk_catering_order')
    ) {
        wp_die(__('Security check failed.', 'gazelle'));
    }

    $plan_id             = absint($_POST['plan_id'] ?? 0);
    $full_name           = sanitize_text_field($_POST['fullName'] ?? '');
    $phone               = sanitize_text_field($_POST['phone'] ?? '');
    $email               = sanitize_email($_POST['email'] ?? '');
    $delivery_date       = sanitize_text_field($_POST['deliveryDate'] ?? '');
    $delivery_location   = sanitize_text_field($_POST['deliveryLocation'] ?? '');
    $special_instruction = sanitize_textarea_field($_POST['specialInstruction'] ?? '');

    if (
        empty($plan_id) ||
        empty($full_name) ||
        empty($phone) ||
        empty($email) ||
        empty($delivery_date) ||
        empty($delivery_location)
    ) {
        wp_die(__('Please complete all required fields.', 'gazelle'));
    }

    $plan = get_post($plan_id);

    if (!$plan || $plan->post_type !== 'gpp_pricing_plan') {
        wp_die(__('Invalid catering plan.', 'gazelle'));
    }

    $request_id = wp_insert_post([
        'post_type'   => 'gpp_catering_request',
        'post_status' => 'publish',
        'post_title'  => $full_name . ' - ' . $plan->post_title,
    ]);

    if (is_wp_error($request_id)) {
        wp_die(__('Unable to submit your request.', 'gazelle'));
    }

    update_post_meta($request_id, 'plan_id', $plan_id);
    update_post_meta($request_id, 'full_name', $full_name);
    update_post_meta($request_id, 'phone', $phone);
    update_post_meta($request_id, 'email', $email);
    update_post_meta($request_id, 'delivery_date', $delivery_date);
    update_post_meta($request_id, 'delivery_location', $delivery_location);
    update_post_meta($request_id, 'special_instruction', $special_instruction);

    do_action('gk_catering_request_created', $request_id);

    wp_safe_redirect(
        add_query_arg(
            'request_id',
            $request_id,
            gk_get_thank_you_page_url()
        )
    );

    exit;
}