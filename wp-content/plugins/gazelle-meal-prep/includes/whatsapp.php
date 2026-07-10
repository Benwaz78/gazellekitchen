<?php

defined('ABSPATH') || exit;

/**
 * Build WhatsApp URL for an order.
 *
 * @param int $post_id
 * @return string
 */
function gk_meal_prep_get_whatsapp_url($order_id)
{
    if (!function_exists('site_contact')) {
        return '';
    }

    $number = site_contact('sc_phone1');

    if (empty($number)) {
        return '';
    }

    // Remove spaces and symbols
    $number = preg_replace('/[^0-9]/', '', $number);

    $fullname = get_post_meta($order_id, '_fullname', true);
    $phone = get_post_meta($order_id, '_phone', true);
    $city = get_post_meta($order_id, '_delivery_city', true);
    $delivery_date = get_post_meta($order_id, '_delivery_date', true);
    if (!empty($delivery_date)) {
    $delivery_date = wp_date(
        'l, j F Y',
        strtotime($delivery_date)
    );
}
    $instruction = get_post_meta($order_id, '_special_instruction', true);

    $message = "Hello, I would like to place a Meal Prep order.\n\n";

    $message .= "Full Name: {$fullname}\n";
    $message .= "Phone Number: {$phone}\n";
    $message .= "Delivery City: {$city}\n";
    $message .= "Preferred Delivery Date: {$delivery_date}\n";

    if (!empty($instruction)) {
        $message .= "Special Instruction: {$instruction}\n";
    }

    return sprintf(
        'https://wa.me/%s?text=%s',
        $number,
        rawurlencode($message)
    );
}