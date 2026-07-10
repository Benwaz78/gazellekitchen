<?php

defined('ABSPATH') || exit;

add_action(
    'gk_meal_prep_order_created',
    'gk_meal_prep_send_emails',
    10,
    2
);

/**
 * Send customer and business emails.
 */
function gk_meal_prep_send_emails($post_id, $order)
{
    /**
     * Always notify the business.
     */
    gk_meal_prep_send_business_email(
        $post_id,
        $order
    );

    /**
     * Customer email is optional.
     */
    if (!empty($order['email'])) {
        gk_meal_prep_send_customer_email(
            $post_id,
            $order
        );
    }
}

/**
 * Customer Email
 */
function gk_meal_prep_send_customer_email($post_id, $order)
{
    if (empty($order['email'])) {
        return;
    }

    $subject = 'Thank you for your Meal Prep Order';

    $message = gk_meal_prep_get_email_template(
        'customer',
        $order
    );

    $headers = [
        'Content-Type: text/html; charset=UTF-8'
    ];

    wp_mail(
        $order['email'],
        $subject,
        $message,
        $headers
    );
}

/**
 * Business Email
 */
function gk_meal_prep_send_business_email($post_id, $order)
{
    if (!function_exists('site_contact')) {
        return;
    }

    $email = site_contact('sc_email1');

    if (empty($email)) {
        return;
    }

    $subject = sprintf(
        'New Meal Prep Order - %s',
        $order['fullname']
    );

    $message = gk_meal_prep_get_email_template(
        'business',
        $order
    );

    $headers = [
        'Content-Type: text/html; charset=UTF-8'
    ];

    wp_mail(
        $email,
        $subject,
        $message,
        $headers
    );
}


/**
 * Load HTML template.
 */
function gk_meal_prep_get_email_template($template, $order)
{
    ob_start();

    gk_meal_prep_get_template(
        'emails/' . $template,
        [
            'order' => $order
        ]
    );

    return ob_get_clean();
}