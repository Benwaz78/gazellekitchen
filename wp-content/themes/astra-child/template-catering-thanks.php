<?php
/** 
* Template Name: Catering Thanks
**/
get_header();


defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Request ID
|--------------------------------------------------------------------------
*/

$request_id = isset($_GET['request_id'])
    ? absint($_GET['request_id'])
    : 0;

if (!$request_id) {
    wp_die('Invalid catering request.');
}

/*
|--------------------------------------------------------------------------
| Plan
|--------------------------------------------------------------------------
*/

$plan_id = get_post_meta($request_id, 'plan_id', true);

$plan = get_post($plan_id);

$plan_name = $plan ? $plan->post_title : '';

/*
|--------------------------------------------------------------------------
| Customer Information
|--------------------------------------------------------------------------
*/

$full_name = get_post_meta($request_id, 'full_name', true);

$email = get_post_meta($request_id, 'email', true);

$phone = get_post_meta($request_id, 'phone', true);

/*
|--------------------------------------------------------------------------
| Delivery
|--------------------------------------------------------------------------
*/

$delivery_date = get_post_meta($request_id, 'delivery_date', true);

$delivery_location = get_post_meta($request_id, 'delivery_location', true);

$special_instruction = get_post_meta(
    $request_id,
    'special_instruction',
    true
);

/*
|--------------------------------------------------------------------------
| WhatsApp
|--------------------------------------------------------------------------
*/

$whatsapp_url = gk_get_whatsapp_url($request_id);





?>
<div role="main" class="main">

   <section class="gmp-success">

    <div class="container">

        <div class="gmp-success-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <span class="gmp-badge">
            Catering Request Received
        </span>

        <h1 class="text-white">
            Thank You, <?php echo esc_html($full_name); ?>!
        </h1>

        <p class="gmp-description">

            Your <strong><?php echo esc_html($plan_name); ?></strong> request has been
            received successfully.

            Our catering team will review your request shortly and contact you to
            confirm every detail of your order.

            If you have any questions or would like to discuss your event immediately,
            continue the conversation with us on WhatsApp.

        </p>

        <div class="gmp-details">

            <div class="gmp-detail">

                <small>Catering Plan</small>

                <strong>
                    <?php echo esc_html($plan_name); ?>
                </strong>

            </div>

            <div class="gmp-detail">

                <small>Delivery Location</small>

                <strong>
                    <?php echo esc_html($delivery_location); ?>
                </strong>

            </div>

            <div class="gmp-detail">

                <small>Delivery Date</small>

                <strong>
                    <?php echo esc_html($delivery_date); ?>
                </strong>

            </div>

        </div>

        <a
            href="<?php echo $whatsapp_url; ?>"
            class="gmp-btn-whatsapp"
            target="_blank"
        >

            <i class="fa-brands fa-whatsapp"></i>

            Continue to WhatsApp

        </a>

    </div>

</section>

</div>
<?php get_footer(); ?>