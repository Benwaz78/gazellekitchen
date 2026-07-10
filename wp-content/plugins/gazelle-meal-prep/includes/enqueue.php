<?php
if (!defined('ABSPATH')) exit;

add_action('admin_enqueue_scripts', function ($hook) {

    if ($hook !== 'toplevel_page_gazelle-meal-prep') return;

    wp_enqueue_media();

    wp_enqueue_script(
        'gmp-admin',
        GMP_URL . 'assets/js/admin.js',
        ['jquery'],
        '1.0',
        true
    );

   wp_enqueue_style(
        'gmp-admin-css',
        GMP_URL . 'assets/css/admin.css',
        [],
        '1.0'
    );
});