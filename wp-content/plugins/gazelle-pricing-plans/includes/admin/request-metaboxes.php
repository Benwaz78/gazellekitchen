<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Register Metaboxes
|--------------------------------------------------------------------------
*/

add_action(
    'add_meta_boxes',
    'gpp_register_request_metaboxes'
);

function gpp_register_request_metaboxes()
{
   add_meta_box(
    'gpp_catering_plan',
    __('Selected Catering Plan', 'gazelle'),
    'gpp_catering_plan_metabox',
    'gpp_catering_request',
    'side',
    'high'
);
    
    add_meta_box(
        'gpp_customer_information',
        __('Customer Information', 'gazelle'),
        'gpp_customer_information_metabox',
        'gpp_catering_request',
        'normal',
        'high'
    );

    add_meta_box(
    'gpp_delivery_information',
    __('Delivery Information', 'gazelle'),
    'gpp_delivery_information_metabox',
    'gpp_catering_request',
    'normal',
    'default'
);

add_meta_box(
    'gpp_request_status',
    __('Request Status', 'gazelle'),
    'gpp_request_status_metabox',
    'gpp_catering_request',
    'side',
    'default'
);

add_meta_box(
    'gpp_quick_actions',
    __('Quick Actions', 'gazelle'),
    'gpp_quick_actions_metabox',
    'gpp_catering_request',
    'side',
    'low'
);
}

/*
|--------------------------------------------------------------------------
| Customer Information
|--------------------------------------------------------------------------
*/

function gpp_customer_information_metabox($post)
{
    $full_name = get_post_meta(
        $post->ID,
        'full_name',
        true
    );

    $email = get_post_meta(
        $post->ID,
        'email',
        true
    );

    $phone = get_post_meta(
        $post->ID,
        'phone',
        true
    );

    ?>

    <table class="form-table">

        <tr>

            <th width="180">

                <?php esc_html_e('Full Name', 'gazelle'); ?>

            </th>

            <td>

                <input
                    type="text"
                    class="regular-text"
                    value="<?php echo esc_attr($full_name); ?>"
                    readonly
                >

            </td>

        </tr>

        <tr>

            <th>

                <?php esc_html_e('Email', 'gazelle'); ?>

            </th>

            <td>

                <input
                    type="email"
                    class="regular-text"
                    value="<?php echo esc_attr($email); ?>"
                    readonly
                >

            </td>

        </tr>

        <tr>

            <th>

                <?php esc_html_e('Phone', 'gazelle'); ?>

            </th>

            <td>

                <input
                    type="text"
                    class="regular-text"
                    value="<?php echo esc_attr($phone); ?>"
                    readonly
                >

            </td>

        </tr>

    </table>

    <?php
}

/*
|--------------------------------------------------------------------------
| Catering Plan
|--------------------------------------------------------------------------
*/

function gpp_catering_plan_metabox($post)
{
    $plan_id = get_post_meta(
        $post->ID,
        'plan_id',
        true
    );

    if (!$plan_id) {

        echo '<p>No catering plan selected.</p>';

        return;
    }

    $plan = get_post($plan_id);

    if (!$plan) {

        echo '<p>Selected plan could not be found.</p>';

        return;
    }

    ?>

    <p>

        <strong>

            <?php echo esc_html($plan->post_title); ?>

        </strong>

    </p>

    <p>

        <a
            href="<?php echo esc_url(get_edit_post_link($plan_id)); ?>"
            class="button button-secondary"
        >
            View Catering Plan
        </a>

    </p>

    <?php
}



/*
|--------------------------------------------------------------------------
| Delivery Information
|--------------------------------------------------------------------------
*/

function gpp_delivery_information_metabox($post)
{
    $delivery_date = get_post_meta(
        $post->ID,
        'delivery_date',
        true
    );

    $delivery_location = get_post_meta(
        $post->ID,
        'delivery_location',
        true
    );

    ?>

    <table class="form-table">

        <tr>

            <th width="180">

                <?php esc_html_e('Delivery Date', 'gazelle'); ?>

            </th>

            <td>

                <input
                    type="text"
                    class="regular-text"
                    value="<?php echo esc_attr($delivery_date); ?>"
                    readonly
                >

            </td>

        </tr>

        <tr>

            <th>

                <?php esc_html_e('Delivery Location', 'gazelle'); ?>

            </th>

            <td>

                <textarea
                    rows="4"
                    class="large-text"
                    readonly
                ><?php echo esc_textarea($delivery_location); ?></textarea>

            </td>

        </tr>

    </table>

    <?php
}


/*
|--------------------------------------------------------------------------
| Request Status
|--------------------------------------------------------------------------
*/

function gpp_request_status_metabox($post)
{
    wp_nonce_field(
        'gpp_save_request_status',
        'gpp_request_status_nonce'
    );

    $status = get_post_meta(
        $post->ID,
        'status',
        true
    );

    if (empty($status)) {
        $status = 'pending';
    }

    ?>

    <p>

        <label for="gpp_request_status">

            <strong><?php esc_html_e('Status', 'gazelle'); ?></strong>

        </label>

    </p>

    <select
        name="gpp_request_status"
        id="gpp_request_status"
        style="width:100%;"
    >

        <option value="pending" <?php selected($status, 'pending'); ?>>

            Pending

        </option>

        <option value="processing" <?php selected($status, 'processing'); ?>>

            Processing

        </option>

        <option value="confirmed" <?php selected($status, 'confirmed'); ?>>

            Confirmed

        </option>

        <option value="out_for_delivery" <?php selected($status, 'out_for_delivery'); ?>>

            Out For Delivery

        </option>

        <option value="delivered" <?php selected($status, 'delivered'); ?>>

            Delivered

        </option>

        <option value="cancelled" <?php selected($status, 'cancelled'); ?>>

            Cancelled

        </option>

    </select>

    <p style="margin-top:15px;color:#666;font-size:12px;">

        Changing the status helps you track the progress of this catering request.

    </p>

    <?php
}


/*
|--------------------------------------------------------------------------
| Quick Actions
|--------------------------------------------------------------------------
*/

function gpp_quick_actions_metabox($post)
{
    $phone = get_post_meta(
        $post->ID,
        'phone',
        true
    );

    $full_name = get_post_meta(
        $post->ID,
        'full_name',
        true
    );

    $plan_id = get_post_meta(
        $post->ID,
        'plan_id',
        true
    );

    $plan = get_post($plan_id);

    $plan_name = $plan ? $plan->post_title : '';

    if (!$phone) {

        echo '<p>No phone number available.</p>';

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Convert phone to WhatsApp format
    |--------------------------------------------------------------------------
    */

    $phone = preg_replace('/\D+/', '', $phone);

    if (strpos($phone, '0') === 0) {

        $phone = '234' . substr($phone, 1);

    }

    $message = sprintf(
        "Hello %s,\n\nThis is Gazelles Kitchen regarding your \"%s\" catering request.\n\nWe're reaching out to discuss your order.",
        $full_name,
        $plan_name
    );

    $whatsapp_url = sprintf(
        'https://wa.me/%s?text=%s',
        $phone,
        rawurlencode($message)
    );

    ?>

    <p>

        <a
            href="<?php echo $whatsapp_url; ?>"
            target="_blank"
            class="button button-primary"
            style="
                width:100%;
                text-align:center;
                background:#25D366;
                border-color:#25D366;
                padding:10px;
                font-size:14px;
            "
        >

            💬 Chat on WhatsApp

        </a>

    </p>

    <?php
}