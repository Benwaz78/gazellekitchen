<?php

remove_action(
    'woocommerce_before_main_content',
    'woocommerce_breadcrumb',
    20
);

add_filter(
    'woocommerce_output_related_products_args',
    function($args) {

        $args['posts_per_page'] = 4;

        return $args;
    }
);

add_filter(
    'loop_shop_per_page',
    function() {
        return 12;
    }
);

remove_action(
    'woocommerce_before_main_content',
    'woocommerce_breadcrumb',
    20
);

add_filter(
    'woocommerce_add_to_cart_fragments',
    'update_cart_count'
);

add_filter(
    'woocommerce_checkout_fields',
    'custom_checkout_fields'
);