<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Hooks
|--------------------------------------------------------------------------
*/

add_action(
    'gk_catering_request_created',
    'gk_send_catering_emails'
);

/*
|--------------------------------------------------------------------------
| Send Emails
|--------------------------------------------------------------------------
*/

function gk_send_catering_emails($request_id)
{
    gk_send_business_email($request_id);

    gk_send_customer_email($request_id);
}


function gk_send_business_email($request_id)
{

    $request = get_post($request_id);

    $plan_id = get_post_meta($request_id, 'plan_id', true);

    $plan = get_post($plan_id);

    $full_name = get_post_meta($request_id, 'full_name', true);
    $email = get_post_meta($request_id, 'email', true);
    $phone = get_post_meta($request_id, 'phone', true);
    $delivery_date = get_post_meta($request_id, 'delivery_date', true);
    $delivery_location = get_post_meta($request_id, 'delivery_location', true);
    $special_instruction = get_post_meta($request_id, 'special_instruction', true);


    ob_start();

    include GPP_PATH . 'includes/emails/business.php';

    $message = ob_get_clean();

    wp_mail(
        get_option('admin_email'),
        'New Catering Request',
        $message,
        [
            'Content-Type: text/html; charset=UTF-8'
        ]
    );

}


function gk_send_customer_email($request_id)
{
    $request = get_post($request_id);

    if (!$request) {
        return;
    }

    $plan_id = get_post_meta($request_id, 'plan_id', true);
    $plan    = get_post($plan_id);

    $full_name           = get_post_meta($request_id, 'full_name', true);
    $email               = get_post_meta($request_id, 'email', true);
    $phone               = get_post_meta($request_id, 'phone', true);
    $delivery_date       = get_post_meta($request_id, 'delivery_date', true);
    $delivery_location   = get_post_meta($request_id, 'delivery_location', true);
    $special_instruction = get_post_meta($request_id, 'special_instruction', true);
    $whatsapp_url = gk_get_whatsapp_url($request_id);

    if (empty($email)) {
        return;
    }

    ob_start();

    include GPP_PATH . 'includes/emails/customer.php';

    $message = ob_get_clean();

    $subject = 'We\'ve Received Your Catering Request';

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
    ];

    wp_mail(
        $email,
        $subject,
        $message,
        $headers
    );
}