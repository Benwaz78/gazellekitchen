<?php

if (!defined('ABSPATH')) exit;

add_action('admin_enqueue_scripts', function ($hook) {

    if (strpos($hook, 'gazelle') === false) return;

    wp_enqueue_media();

    wp_enqueue_script(
        'gazelle-social-gallery',
        GAZELLE_SG_URL . 'assets/js/admin.js',
        ['jquery'],
        GAZELLE_SG_VERSION,
        true
    );

    wp_enqueue_style(
        'gazelle-social-gallery',
        GAZELLE_SG_URL . 'assets/css/admin.css',
        [],
        GAZELLE_SG_VERSION
    );
});