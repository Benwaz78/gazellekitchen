<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_enqueue_scripts', 'gpp_enqueue_admin_assets');

function gpp_enqueue_admin_assets($hook) {

    $screen = get_current_screen();

    if (
        !$screen ||
        $screen->post_type !== 'gpp_pricing_plan'
    ) {
        return;
    }

    wp_enqueue_style(
        'gpp-admin-css',
        GPP_URL . 'assets/css/admin.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'gpp-admin-js',
        GPP_URL . 'assets/js/admin.js',
        ['jquery'],
        '1.0.0',
        true
    );
}