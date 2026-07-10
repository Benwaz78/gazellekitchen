<?php

defined('ABSPATH') || exit;

class GK_WhatsApp_Order
{
    

   
    /**
     * Build WhatsApp URL.
     */
    public static function get_whatsapp_url(WC_Order $order)
    {
        $message = self::build_message($order);

        return sprintf(
            'https://wa.me/%s?text=%s',
            GK_WHATSAPP_NUMBER,
            rawurlencode($message)
        );
    }


    /**
     * Build WhatsApp message.
     */
     private static function build_message($order)
        {
            $message = "🍔 *NEW ORDER*\n\n";

            // Order Number
            $message .= "Order No: #" . $order->get_order_number() . "\n\n";

            // Customer
            $message .= "👤 CUSTOMER\n";
            $message .= "-------------------------\n";
            $message .= $order->get_formatted_billing_full_name() . "\n";

            if ($order->get_billing_phone()) {
                $message .= "📞 " . $order->get_billing_phone() . "\n";
            }

            if ($order->get_billing_email()) {
                $message .= "✉️ " . $order->get_billing_email() . "\n";
            }

            // Delivery Address
            $message .= "\n📍 DELIVERY ADDRESS\n";
            $message .= "-------------------------\n";

            $address = $order->get_formatted_shipping_address();

            if (!$address) {
                $address = $order->get_formatted_billing_address();
            }

            $message .= wp_strip_all_tags($address) . "\n";

            // Products
            $message .= "\n🛒 ITEMS\n";
            $message .= "-------------------------\n";

            foreach ($order->get_items() as $item_id => $item) {

                $message .= $item->get_quantity() . " × " . $item->get_name() . "\n";

                // Product Variations
                $meta = wc_get_formatted_item_meta(
                    $item,
                    false,
                    true
                );

                if (!empty($meta)) {

                    $meta = wp_strip_all_tags($meta);

                    $lines = explode("\n", $meta);

                    foreach ($lines as $line) {

                        if (!empty(trim($line))) {
                            $message .= "   • " . trim($line) . "\n";
                        }

                    }
                }

                $message .= "\n";
            }

            // Total
            $message .= "💰 TOTAL\n";
            $message .= "-------------------------\n";
            $message .= wp_strip_all_tags(
                $order->get_formatted_order_total()
            );

            $message .= "\n💳 PAYMENT METHOD\n";
            $message .= "-------------------------\n";
            $message .= $order->get_payment_method_title() . "\n";

            $message .= "\n📅 ORDER DATE\n";
            $message .= "-------------------------\n";
            $message .= $order->get_date_created()->date_i18n('d M Y, h:i A');

            // Order Totals
            $message .= "\n💰 ORDER SUMMARY\n";
            $message .= "-------------------------\n";

            foreach ($order->get_order_item_totals() as $total) {

                $message .= sprintf(
                    "%s: %s\n",
                    wp_strip_all_tags($total['label']),
                    wp_strip_all_tags($total['value'])
                );

            }

            // Customer Note
            if ($order->get_customer_note()) {

                $message .= "\n\n📝 CUSTOMER NOTE\n";
                $message .= "-------------------------\n";
                $message .= $order->get_customer_note();

            }

            $message .= "\n\n";
            $message .= "I will send my payment receipt here once I have completed the bank transfer.";

            return $message;
        }


}