<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Send Contact Enquiry Email to Admin
 *
 * @param int $post_id
 * @return bool
 */
function gk_contact_send_admin_email($post_id)
{
    $full_name = get_post_meta($post_id, '_contact_full_name', true);
    $email     = get_post_meta($post_id, '_contact_email', true);
    $phone     = get_post_meta($post_id, '_contact_phone', true);
    $subject   = "Contact Form";
    $message   = get_post_meta($post_id, '_contact_message', true);

    $admin_email = site_contact('sc_email1');

    $email_subject = sprintf(
        'New Contact Enquiry - %s',
        $subject
    );

    ob_start();

    include GK_CONTACT_PATH . 'templates/emails/admin.php';

    $email_body = ob_get_clean();

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
    ];

    return wp_mail(
        $admin_email,
        $email_subject,
        $email_body,
        $headers
    );
}