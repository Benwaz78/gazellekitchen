<?php get_header(); ?>
<div role="main" class="main shop">

   <section 
        class="gazelle-page-header-bg-container bg-dark menu-header-padding">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <div class="thank-you-header text-center mb-5">

                            <div class="thank-you-icon mb-4">
                                <i class="fas fa-check-circle text-success fa-4x"></i>
                            </div>

                            <h1 class="text-white fw-bold mb-3">
                                Thank You!
                            </h1>

                            <p class="text-white-50 lead mb-0">
                                Your order has been received successfully.
                                We'll begin processing it once your payment has been confirmed.
                            </p>

                        </div>

                        <?php
                        if ( ! $order ) {
                            return;
                        }

                        $order_status = wc_get_order_status_name( $order->get_status() );
                        $whatsapp_url = GK_WhatsApp_Order::get_whatsapp_url($order);
                        ?>

                        <div class="order-summary">

                            <h4 class="text-white border-bottom pb-3 mb-4">
                                Order Summary
                            </h4>

                            <div class="summary-item">
                                <span class="summary-label">
                                    Order Number
                                </span>

                                <strong class="summary-value">
                                    #<?php echo esc_html( $order->get_order_number() ); ?>
                                </strong>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">
                                    Payment Method
                                </span>

                                <strong class="summary-value">
                                    <?php echo esc_html( $order->get_payment_method_title() ); ?>
                                </strong>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">
                                    Order Status
                                </span>

                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                    <?php echo esc_html( $order_status ); ?>
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="summary-label">
                                    Order Total
                                </span>

                                <strong class="summary-value">
                                    <?php echo wp_kses_post( $order->get_formatted_order_total() ); ?>
                                </strong>
                            </div>

                        </div>

                        <div class="mt-5 text-center">

                            <h4 class="text-white mb-3">
                                Confirm Your Order
                            </h4>

                            <p class="text-white-50 mb-4 mx-auto" style="max-width:700px;">
                                Once you've completed your bank transfer, click the button below to send
                                your order details to us on WhatsApp. You can also attach your payment
                                receipt in the same conversation so we can confirm your payment and begin
                                preparing your order.
                            </p>

                            <a
                                href="<?php echo esc_url( $get_whatsapp_url ); ?>"
                                target="_blank"
                                rel="noopener"
                                class="btn btn-success btn-lg px-5 py-3 rounded-pill"
                            >
                                <i class="fab fa-whatsapp me-2"></i>
                                Send Order via WhatsApp
                            </a>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    
</div>

    






<?php get_footer(); ?>