<?php
/** 
* Template Name: Prep Thanks
**/
get_header();

$order_id = absint(
    $_GET['order_id'] ?? 0
);

if (!$order_id) {


    wp_die('Invalid order.');
}

$fullname = get_post_meta(
    $order_id,
    '_fullname',
    true
);

$email = get_post_meta(
    $order_id,
    '_email',
    true
);

$phone = get_post_meta(
    $order_id,
    '_phone',
    true
);

$city = get_post_meta(
    $order_id,
    '_delivery_city',
    true
);

$delivery_date = get_post_meta(
    $order_id,
    '_delivery_date',
    true
);

if (!empty($delivery_date)) {
    $delivery_date = wp_date(
        'l, j F Y',
        strtotime($delivery_date)
    );
}

$order_number = gk_meal_prep_order_number($order_id);

$whatsapp = gk_meal_prep_get_whatsapp_url(
    $order_id
);


?>
<div role="main" class="main">
   <section class="gmp-success">

        <div class="container">

            <div class="gmp-success-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <span class="gmp-badge">
                Meal Prep Request Received
            </span>

            <h1 class="text-white">
                Thank You, <?php echo esc_html($fullname); ?>
            </h1>

            <p class="gmp-description">
                Your Meal Prep request has been received successfully.
                Our kitchen team will review it shortly. To complete your request,
                continue the conversation with us on WhatsApp.
            </p>

            <div class="gmp-details">

                <div class="gmp-detail">
                    <small>Reference</small>
                    <strong>#<?php echo $order_number; ?></strong>
                </div>

                <div class="gmp-detail">
                    <small>Delivery City</small>
                    <strong><?php echo esc_html($city); ?></strong>
                </div>

                <div class="gmp-detail">
                    <small>Delivery Date</small>
                    <strong><?php echo esc_html($delivery_date); ?></strong>
                </div>

            </div>

            <a href="<?php echo $whatsapp; ?>"  rel="noopener noreferrer" class="gmp-btn-whatsapp">

                <i class="fa-brands fa-whatsapp"></i>

                Continue to WhatsApp

            </a>

        </div>

    </section>
</div>
<?php get_footer(); ?>