<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('save_post_gpp_pricing_plan', 'gpp_save_pricing_plan_meta');

function gpp_save_pricing_plan_meta($post_id) {

    if (
        !isset($_POST['gpp_pricing_plan_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['gpp_pricing_plan_nonce'])),
            'gpp_save_pricing_plan'
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

    $icon = isset($_POST['gpp_icon'])
        ? sanitize_text_field(wp_unslash($_POST['gpp_icon']))
        : '';

    $description = isset($_POST['gpp_description'])
        ? sanitize_textarea_field(wp_unslash($_POST['gpp_description']))
        : '';

    $price = isset($_POST['gpp_price'])
        ? sanitize_text_field(wp_unslash($_POST['gpp_price']))
        : '';

    $features = [];

    if (isset($_POST['gpp_features']) && is_array($_POST['gpp_features'])) {
        foreach ($_POST['gpp_features'] as $feature) {
            $feature = sanitize_text_field(wp_unslash($feature));

            if ($feature !== '') {
                $features[] = $feature;
            }
        }
    }

    update_post_meta($post_id, '_gpp_icon', $icon);
    update_post_meta($post_id, '_gpp_description', $description);
    update_post_meta($post_id, '_gpp_price', $price);
    update_post_meta($post_id, '_gpp_features', $features);
}