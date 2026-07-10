<?php
if (!defined('ABSPATH')) exit;

add_action('admin_post_gmp_save', function () {

    if (!current_user_can('manage_options')) return;

    check_admin_referer('gmp_save_action');

    $data = [
        'header' => [
            'title' => sanitize_text_field($_POST['title'] ?? ''),
            'tagline' => sanitize_text_field($_POST['tagline'] ?? ''),
            'description' => sanitize_textarea_field($_POST['description'] ?? ''),
            'desktop_banner_id' => absint($_POST['desktop_banner_id'] ?? 0),
            'mobile_banner_id' => absint($_POST['mobile_banner_id'] ?? 0),
        ],
        'content' => [
            'text' => wp_kses_post(wp_unslash($_POST['content_text'] ?? '')),
            'image_id' => absint($_POST['content_image_id'] ?? 0),
            'price'    => wc_format_decimal($_POST['meal_prep_price'] ?? ''),
        ]
    ];

    update_option('gazelle_meal_prep_page', $data);

    wp_redirect(admin_url('admin.php?page=gazelle-meal-prep&saved=1'));
    exit;
});