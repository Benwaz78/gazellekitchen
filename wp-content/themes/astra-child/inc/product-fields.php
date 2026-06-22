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




