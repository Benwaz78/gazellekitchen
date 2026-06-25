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
    'woocommerce_checkout_fields',
    'custom_checkout_fields'
);

// add_action('init', function () {
//     if (isset($_GET['clear-cart'])) {
//         WC()->cart->empty_cart();
//     }
// });
// http://localhost/gazelleskitchen/?clear-cart=1
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {

    ob_start();
    ?>
    <span class="cart-qty">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['span.cart-qty'] = ob_get_clean();

    ob_start();
    gazelle_header_mini_cart();
    $fragments['#headerTopCartDropdown'] = ob_get_clean();

    return $fragments;
});




function gazelle_get_price($product_id, $formatted = true)
{
    $product = wc_get_product($product_id);

    if (!$product) return '';

    $price = $product->is_type('variable')
        ? min($product->get_variation_prices(true)['price'] ?? [0])
        : $product->get_price();

    // REMOVE FORMATTING COMPLETELY (YOUR REQUIREMENT)
    if (!$formatted) {
        return (string) round($price);
    }

    return wc_price($price);
}


function gazelle_header_mini_cart() {
    ?>
    <div class="header-nav-features-dropdown" id="headerTopCartDropdown">

        <?php if (WC()->cart && ! WC()->cart->is_empty()) : ?>

            <ol class="mini-products-list">

                <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>

                    <?php
                    $product = $cart_item['data'];

                    if (! $product || ! $product->exists()) {
                        continue;
                    }

                    $product_id    = $product->get_id();
                    $product_name  = $product->get_name();
                    $product_url   = $product->is_visible()
                        ? $product->get_permalink($cart_item)
                        : '';

                    $image         = $product->get_image('thumbnail');
                    $quantity      = $cart_item['quantity'];
                    $item_price    = WC()->cart->get_product_price($product);
                    $variation     = wc_get_formatted_cart_item_data($cart_item);
                    $remove_url    = wc_get_cart_remove_url($cart_item_key);
                    ?>

                    <li class="item">
                        <a
                            href="<?php echo esc_url($product_url); ?>"
                            title="<?php echo esc_attr($product_name); ?>"
                            class="product-image"
                        >
                            <?php echo wp_kses_post($image); ?>
                        </a>

                        <div class="product-details">

                            <p class="product-name">
                                <a href="<?php echo esc_url($product_url); ?>">
                                    <?php echo esc_html($product_name); ?>
                                </a>
                            </p>

                            <?php if ($variation) : ?>
                                <div class="mini-cart-variation">
                                    <?php echo wp_kses_post($variation); ?>
                                </div>
                            <?php endif; ?>

                            <p class="qty-price">
                                <?php echo esc_html($quantity); ?>X
                                <span class="price">
                                    <?php echo wp_kses_post($item_price); ?>
                                </span>
                            </p>

                            <a
                                href="<?php echo esc_url($remove_url); ?>"
                                class="btn-remove remove remove_from_cart_button"
                                data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>"
                                aria-label="<?php echo esc_attr__('Remove this item', 'gazelles-kitchen'); ?>"
                                title="<?php echo esc_attr__('Remove this item', 'gazelles-kitchen'); ?>"
                            >
                                <i class="fas fa-times"></i>
                            </a>

                        </div>
                    </li>

                <?php endforeach; ?>

            </ol>

            <div class="totals">
                <span class="label">Total:</span>

                <span class="price-total">
                    <span class="price">
                        <?php echo wp_kses_post(WC()->cart->get_cart_total()); ?>
                    </span>
                </span>
            </div>

            <div class="actions">
                <a class="btn btn-dark" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    View Cart
                </a>

                <a class="btn btn-primary" href="<?php echo esc_url(wc_get_checkout_url()); ?>">
                    Checkout
                </a>
            </div>

        <?php else : ?>

            <div class="mini-cart-empty text-center py-3">
                <i class="icon-basket d-block mb-2"></i>
                <p class="mb-0">Your cart is empty.</p>
            </div>

        <?php endif; ?>

    </div>
    <?php
}