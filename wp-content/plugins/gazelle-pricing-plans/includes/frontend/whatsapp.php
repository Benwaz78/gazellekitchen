<?php

defined('ABSPATH') || exit;

function gk_get_whatsapp_url($request_id)
{

    $business_number = '';
    if (has_site_contact('phone1')) {
        $business_number = preg_replace(
            '/\D+/',
            '',
            site_contact('phone1')
        );
    }
    $plan_id = get_post_meta($request_id, 'plan_id', true);
    $plan    = get_post($plan_id);

    $full_name = get_post_meta($request_id, 'full_name', true);

    $delivery_date = get_post_meta($request_id, 'delivery_date', true);

    $delivery_location = get_post_meta($request_id, 'delivery_location', true);

    $message = sprintf(
        "Hello Gazelles Kitchen,\n\nI recently submitted a catering request through your website.\n\nName: %s\nPlan: %s\nDelivery Date: %s\nDelivery Location: %s\n\nI'm reaching out regarding my request.\n\nThank you.",
        $full_name,
        $plan ? $plan->post_title : '',
        $delivery_date,
        $delivery_location
    );

    return sprintf(
        'https://wa.me/%s?text=%s',
        $business_number,
        rawurlencode($message)
    );
}