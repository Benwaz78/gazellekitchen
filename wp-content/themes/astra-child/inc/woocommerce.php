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
                                href="#"
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


add_action('wp_ajax_gk_remove_from_cart', 'gk_remove_from_cart');
add_action('wp_ajax_nopriv_gk_remove_from_cart', 'gk_remove_from_cart');

function gk_remove_from_cart()
{
    check_ajax_referer('gk_cart_nonce', 'nonce');

    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);

    // Get product name BEFORE removing it
    $product_name = '';

    $cart = WC()->cart->get_cart();

    if (isset($cart[$cart_item_key])) {
        $product_name = $cart[$cart_item_key]['data']->get_name();
    }

    error_log(print_r(WC()->cart->get_cart(), true));

    error_log('Key: ' . $cart_item_key);

    // Now remove it
    WC()->cart->remove_cart_item($cart_item_key);

    // Rebuild mini cart
    ob_start();
    gazelle_header_mini_cart();
    $mini_cart = ob_get_clean();

    wp_send_json_success([
        'count'        => WC()->cart->get_cart_contents_count(),
        'mini_cart'    => $mini_cart,
        'product_name' => $product_name,
        'cart_url'     => wc_get_cart_url(),
    ]);
}




add_action('wp_ajax_gazelle_load_product', 'gazelle_load_product');
add_action('wp_ajax_nopriv_gazelle_load_product', 'gazelle_load_product');

function gazelle_load_product()
{
    $product_id = absint($_POST['product_id']);

    if (!$product_id) {
        wp_die();
    }

    global $post;

    $post = get_post($product_id);

    if (!$post) {
        wp_die();
    }

    setup_postdata($post);

    get_template_part('template-parts/components/product-content');

    wp_reset_postdata();

    wp_die();
}

add_action('wp_ajax_gk_add_to_cart', 'gk_add_to_cart');
add_action('wp_ajax_nopriv_gk_add_to_cart', 'gk_add_to_cart');

function gk_add_to_cart()
{
   
    check_ajax_referer('gk_cart_nonce', 'nonce');

    $product_id   = absint($_POST['product_id'] ?? 0);
    $quantity     = max(1, absint($_POST['quantity'] ?? 1));
    $variation_id = absint($_POST['variation_id'] ?? 0);

    $variation = [];

    foreach ($_POST as $key => $value) {

        if (strpos($key, 'attribute_') === 0) {
            $variation[$key] = sanitize_text_field(wp_unslash($value));
        }

    }


    $added = WC()->cart->add_to_cart(
        $product_id,
        $quantity,
        $variation_id,
        $variation
    );

    if (!$added) {

        wp_send_json_error([
        'message' => wc_get_notices('error')
    ]);


    }

    ob_start();
    gazelle_header_mini_cart();
    $mini_cart = ob_get_clean();

    $product = wc_get_product($variation_id ?: $product_id);

    wp_send_json_success([
        'count'        => WC()->cart->get_cart_contents_count(),
        'mini_cart'    => $mini_cart,
        'product_name' => $product ? $product->get_name() : '',
        'cart_url'     => wc_get_cart_url(),
    ]);

}



