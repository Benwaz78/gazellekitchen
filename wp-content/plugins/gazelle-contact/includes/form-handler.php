<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle Contact Form Submission
 */
add_action(
    'admin_post_nopriv_gk_contact_submit',
    'gk_contact_form_handler'
);

add_action(
    'admin_post_gk_contact_submit',
    'gk_contact_form_handler'
);

function gk_contact_form_handler()
{
    if (!isset($_POST['gk_contact_nonce'])) {
        wp_die(__('Invalid request.', 'gazelles-kitchen'));
    }

    if (
        !wp_verify_nonce(
            $_POST['gk_contact_nonce'],
            'gk_contact_submit'
        )
    ) {
        wp_die(__('Security check failed.', 'gazelles-kitchen'));
    }

    $full_name = sanitize_text_field($_POST['name'] ?? '');
    $email     = sanitize_email($_POST['email'] ?? '');
    $phone     = sanitize_text_field($_POST['phone'] ?? '');
    $message   = sanitize_textarea_field($_POST['message'] ?? '');

    /**
     * Validation
     */
    if (
        empty($full_name) ||
        empty($email) ||
        empty($phone) ||
        empty($message)
    ) {

        wp_safe_redirect(
            add_query_arg(
                'contact',
                'required',
                wp_get_referer()
            )
        );

        exit;
    }

    /**
     * Create Contact Enquiry
     */
    $post_id = wp_insert_post([
        'post_type'   => 'gk_contact',
        'post_status' => 'publish',
        'post_title'  => $full_name,
    ]);

    if (is_wp_error($post_id)) {

        wp_safe_redirect(
            add_query_arg(
                'contact',
                'failed',
                wp_get_referer()
            )
        );

        exit;
    }

    /**
     * Save Meta
     */
    update_post_meta($post_id, '_contact_full_name', $full_name);
    update_post_meta($post_id, '_contact_email', $email);
    update_post_meta($post_id, '_contact_phone', $phone);
    update_post_meta($post_id, '_contact_message', $message);
    update_post_meta($post_id, '_contact_status', 'new');

    /**
     * Send Admin Email
     */
    gk_contact_send_admin_email($post_id);

    /**
     * Redirect back
     */
    wp_safe_redirect(
        add_query_arg(
            'contact',
            'success',
            wp_get_referer()
        )."#success"
    );

    exit;
}