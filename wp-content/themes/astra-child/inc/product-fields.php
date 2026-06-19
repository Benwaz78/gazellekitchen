<?php
add_action('woocommerce_product_options_general_product_data', 'gk_popular_menu_field');

function gk_popular_menu_field() {

    woocommerce_wp_checkbox(array(
        'id'          => '_popular_menu',
        'label'       => __('Popular Menu', 'gazelles-kitchen'),
        'description' => __('Display this product in the Popular Menus section.', 'gazelles-kitchen'),
    ));
}

// Save Checkbox Value
add_action('woocommerce_process_product_meta', 'gk_save_popular_menu_field');

function gk_save_popular_menu_field($product_id) {

    $popular = isset($_POST['_popular_menu']) ? 'yes' : 'no';

    update_post_meta(
        $product_id,
        '_popular_menu',
        $popular
    );
}


//Card Description
add_action('woocommerce_product_options_general_product_data', 'gk_product_card_description');

function gk_product_card_description() {

    woocommerce_wp_textarea_input(array(
        'id'          => '_card_description',
        'label'       => __('Card Description', 'gazelles-kitchen'),
        'description' => __('Recommended: 80-120 characters.', 'gazelles-kitchen'),
        'desc_tip'    => true,
    ));
}

// Save Card field
add_action('woocommerce_process_product_meta', 'gk_save_product_card_description');

function gk_save_product_card_description($product_id) {

    if (isset($_POST['_card_description'])) {

        update_post_meta(
            $product_id,
            '_card_description',
            sanitize_textarea_field($_POST['_card_description'])
        );

    }
}

// $product_id = get_the_ID();

// $card_description = get_post_meta(
//     $product_id,
//     '_card_description',
//     true
// );