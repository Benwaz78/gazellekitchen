<?php
function gk_get_product_card_description($product_id, $length = 90)
{
    $product = wc_get_product($product_id);

    if (!$product) {
        return '';
    }

    // Use short description first
    $description = $product->get_short_description();

    // Fallback to main description
    if (empty($description)) {
        $description = get_post_field(
            'post_content',
            $product_id
        );
    }

    $description = wp_strip_all_tags($description);

    return wp_html_excerpt(
        $description,
        $length,
        '...'
    );
}