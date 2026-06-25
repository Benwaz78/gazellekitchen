<?php
/**
 * Custom Gazelles Kitchen Cart Template
 */

defined('ABSPATH') || exit;
 get_header();
do_action('woocommerce_before_cart');
?>
<div role="main" class="main">

    <section
        class="gazelle-page-header-bg-container menu-header-padding"
        style="
            --page-desktop: url('<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/gazelle-banner.jpg');
            --page-mobile: url('<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/img/hero-mobile.jpg');
        "
    >
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-12">
                    <h1 class="text-white">Shopping Cart</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="page-list-section bg-light">
        <div class="container">

            <?php if (WC()->cart->is_empty()) : ?>

                <div class="text-center py-5">
                    <h3 class="mb-3">Your cart is empty</h3>

                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>"
                       class="btn btn-primary btn-modern text-uppercase">
                        Browse Our Menu
                    </a>
                </div>

            <?php else : ?>

                <div class="row pb-4 mb-5">

                    <div class="col-lg-8 mb-5 mb-lg-0">

                        <form
                            class="woocommerce-cart-form"
                            action="<?php echo esc_url(wc_get_cart_url()); ?>"
                            method="post"
                        >

                            <?php do_action('woocommerce_before_cart_table'); ?>

                            <div class="table-responsive">
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">

                                    <thead>
                                        <tr class="text-color-dark">
                                            <th class="product-thumbnail" width="15%">&nbsp;</th>
                                            <th class="product-name text-uppercase" width="30%">Product</th>
                                            <th class="product-price text-uppercase" width="15%">Price</th>
                                            <th class="product-quantity text-uppercase" width="20%">Quantity</th>
                                            <th class="product-subtotal text-uppercase text-end" width="20%">Subtotal</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php do_action('woocommerce_before_cart_contents'); ?>

                                        <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>

                                            <?php
                                            $_product   = apply_filters(
                                                'woocommerce_cart_item_product',
                                                $cart_item['data'],
                                                $cart_item,
                                                $cart_item_key
                                            );

                                            $product_id = apply_filters(
                                                'woocommerce_cart_item_product_id',
                                                $cart_item['product_id'],
                                                $cart_item,
                                                $cart_item_key
                                            );

                                            if (
                                                ! $_product ||
                                                ! $_product->exists() ||
                                                $cart_item['quantity'] <= 0
                                            ) {
                                                continue;
                                            }

                                            $product_permalink = apply_filters(
                                                'woocommerce_cart_item_permalink',
                                                $_product->is_visible()
                                                    ? $_product->get_permalink($cart_item)
                                                    : '',
                                                $cart_item,
                                                $cart_item_key
                                            );
                                            ?>

                                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                                <!-- Image + Remove -->
                                                <td class="product-thumbnail">

                                                    <div class="product-thumbnail-wrapper">

                                                        <?php
                                                        echo apply_filters(
                                                            'woocommerce_cart_item_remove_link',
                                                            sprintf(
                                                                '<a href="%s" class="product-thumbnail-remove remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-times"></i></a>',
                                                                esc_url(
                                                                    wc_get_cart_remove_url($cart_item_key)
                                                                ),
                                                                esc_attr__('Remove this item', 'woocommerce'),
                                                                esc_attr($product_id),
                                                                esc_attr($_product->get_sku())
                                                            ),
                                                            $cart_item_key
                                                        );
                                                        ?>

                                                        <?php
                                                        $thumbnail = apply_filters(
                                                            'woocommerce_cart_item_thumbnail',
                                                            $_product->get_image('woocommerce_thumbnail'),
                                                            $cart_item,
                                                            $cart_item_key
                                                        );

                                                        if (! $product_permalink) {
                                                            echo '<span class="product-thumbnail-image">' . $thumbnail . '</span>';
                                                        } else {
                                                            printf(
                                                                '<a href="%s" class="product-thumbnail-image">%s</a>',
                                                                esc_url($product_permalink),
                                                                $thumbnail
                                                            );
                                                        }
                                                        ?>

                                                    </div>

                                                </td>

                                                <!-- Product Name + Variation -->
                                                <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">

                                                    <?php
                                                    $product_name = $_product->get_name();

                                                    if (! $product_permalink) {
                                                        echo wp_kses_post(
                                                            '<span class="font-weight-semi-bold text-color-dark">'
                                                            . $product_name .
                                                            '</span>'
                                                        );
                                                    } else {
                                                        printf(
                                                            '<a href="%s" class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none">%s</a>',
                                                            esc_url($product_permalink),
                                                            wp_kses_post($product_name)
                                                        );
                                                    }

                                                    // Shows Portion Size: 3L, Pieces: 6, etc.
                                                    echo wc_get_formatted_cart_item_data($cart_item);

                                                    do_action(
                                                        'woocommerce_after_cart_item_name',
                                                        $cart_item,
                                                        $cart_item_key
                                                    );
                                                    ?>

                                                </td>

                                                <!-- Unit Price -->
                                                <td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                                    <span class="amount font-weight-medium text-color-grey">
                                                        <?php
                                                        echo apply_filters(
                                                            'woocommerce_cart_item_price',
                                                            WC()->cart->get_product_price($_product),
                                                            $cart_item,
                                                            $cart_item_key
                                                        );
                                                        ?>
                                                    </span>
                                                </td>

                                                <!-- Quantity -->
                                                <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">

                                                    <?php
                                                    if ($_product->is_sold_individually()) {
                                                        $product_quantity = sprintf(
                                                            '<input type="hidden" name="cart[%s][qty]" value="1" />1',
                                                            esc_attr($cart_item_key)
                                                        );
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(
                                                            [
                                                                'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                'input_value'  => $cart_item['quantity'],
                                                                'max_value'    => $_product->get_max_purchase_quantity(),
                                                                'min_value'    => '0',
                                                                'product_name' => $_product->get_name(),
                                                            ],
                                                            $_product,
                                                            false
                                                        );
                                                    }

                                                    echo apply_filters(
                                                        'woocommerce_cart_item_quantity',
                                                        $product_quantity,
                                                        $cart_item_key,
                                                        $cart_item
                                                    );
                                                    ?>

                                                </td>

                                                <!-- Row Subtotal -->
                                                <td class="product-subtotal text-end" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                                                    <span class="amount text-color-dark font-weight-bold text-4">
                                                        <?php
                                                        echo apply_filters(
                                                            'woocommerce_cart_item_subtotal',
                                                            WC()->cart->get_product_subtotal(
                                                                $_product,
                                                                $cart_item['quantity']
                                                            ),
                                                            $cart_item,
                                                            $cart_item_key
                                                        );
                                                        ?>
                                                    </span>
                                                </td>

                                            </tr>

                                        <?php endforeach; ?>

                                        <?php do_action('woocommerce_cart_contents'); ?>

                                        <!-- Update Cart -->
                                        <tr>
                                            <td colspan="5">

                                                <div class="row justify-content-between mx-0">

                                                    <div class="px-0">
                                                        <button
                                                            type="submit"
                                                            class="btn btn-primary w-100 btn-modern text-color-white text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 btn-px-4 py-3"
                                                            name="update_cart"
                                                            value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"
                                                        >
                                                            Update Cart
                                                        </button>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>

                                        <?php do_action('woocommerce_after_cart_contents'); ?>

                                    </tbody>

                                </table>
                            </div>

                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

                            <?php do_action('woocommerce_after_cart_table'); ?>

                        </form>

                    </div>

                    <!-- Cart Totals -->
                    <div class="col-lg-4 position-relative">

                        <div
                            class="card border-width-3 border-radius-0 border-color-hover-dark"
                            data-plugin-sticky
                            data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}"
                        >
                            <div class="card-body">

                                <h4 class="font-weight-bold text-uppercase text-4 mb-3">
                                    Cart Totals
                                </h4>

                                <table class="shop_table cart-totals mb-4">
                                    <tbody>

                                        <tr class="cart-subtotal">
                                            <td class="border-top-0">
                                                <strong class="text-color-dark">Subtotal</strong>
                                            </td>

                                            <td class="border-top-0 text-end">
                                                <strong class="font-weight-medium">
                                                    <?php wc_cart_totals_subtotal_html(); ?>
                                                </strong>
                                            </td>
                                        </tr>

                                        <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                                            <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                                                <td>
                                                    <strong class="text-color-dark">
                                                        <?php wc_cart_totals_coupon_label($coupon); ?>
                                                    </strong>
                                                </td>
                                                <td class="text-end">
                                                    <?php wc_cart_totals_coupon_html($coupon); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                                            <tr class="shipping">
                                                <td colspan="2">
                                                    <?php wc_cart_totals_shipping_html(); ?>
                                                </td>
                                            </tr>

                                        <?php endif; ?>

                                        <?php foreach (WC()->cart->get_fees() as $fee) : ?>
                                            <tr class="fee">
                                                <td>
                                                    <strong class="text-color-dark">
                                                        <?php echo esc_html($fee->name); ?>
                                                    </strong>
                                                </td>
                                                <td class="text-end">
                                                    <?php wc_cart_totals_fee_html($fee); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <?php if (wc_tax_enabled() && ! WC()->cart->display_prices_including_tax()) : ?>
                                            <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
                                                <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                                                    <tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
                                                        <td>
                                                            <strong class="text-color-dark">
                                                                <?php echo esc_html($tax->label); ?>
                                                            </strong>
                                                        </td>
                                                        <td class="text-end">
                                                            <?php echo wp_kses_post($tax->formatted_amount); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr class="tax-total">
                                                    <td>
                                                        <strong class="text-color-dark">
                                                            <?php echo esc_html(WC()->countries->tax_or_vat()); ?>
                                                        </strong>
                                                    </td>
                                                    <td class="text-end">
                                                        <?php wc_cart_totals_taxes_total_html(); ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <tr class="total order-total">
                                            <td>
                                                <strong class="text-color-dark text-3-5">Total</strong>
                                            </td>
                                            <td class="text-end">
                                                <strong class="text-color-dark text-5">
                                                    <?php wc_cart_totals_order_total_html(); ?>
                                                </strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <a
                                    href="<?php echo esc_url(wc_get_checkout_url()); ?>"
                                    class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3"
                                >
                                    Proceed to Checkout
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>

                            </div>
                        </div>

                    </div>

                </div>

            <?php endif; ?>

        </div>
    </section>

</div>
<?php 
do_action('woocommerce_after_cart'); 
get_footer()
?>