<?php

defined('ABSPATH') || exit;

add_action(
    'save_post_gpp_catering_request',
    'gpp_save_request_status'
);

function gpp_save_request_status($post_id)
{
    if (
        !isset($_POST['gpp_request_status_nonce']) ||
        !wp_verify_nonce(
            $_POST['gpp_request_status_nonce'],
            'gpp_save_request_status'
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

    if (!isset($_POST['gpp_request_status'])) {
        return;
    }

    update_post_meta(
        $post_id,
        'status',
        sanitize_text_field($_POST['gpp_request_status'])
    );
}