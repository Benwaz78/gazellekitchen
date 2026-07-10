<?php

defined('ABSPATH') || exit;

/**
 * Register Meta Box
 */
add_action(
    'add_meta_boxes',
    'gk_meal_prep_add_meta_box'
);

function gk_meal_prep_add_meta_box()
{
    add_meta_box(
        'gk_meal_prep_order_details',
        __('Order Details', 'gazelle-meal-prep'),
        'gk_meal_prep_render_meta_box',
        'gk_meal_prep_order',
        'normal',
        'high'
    );
}

/**
 * Render Order Details
 */
function gk_meal_prep_render_meta_box($post)
{
    $fullname = get_post_meta($post->ID, '_fullname', true);
    $email = get_post_meta($post->ID, '_email', true);
    $phone = get_post_meta($post->ID, '_phone', true);
    $city = get_post_meta($post->ID, '_delivery_city', true);
    $delivery_date = get_post_meta($post->ID, '_delivery_date', true);
    $instruction = get_post_meta($post->ID, '_special_instruction', true);
    $status = get_post_meta($post->ID, '_status', true);
    ?>

    <table class="widefat striped">

        <tbody>

            <tr>
                <th width="220">
                    <?php esc_html_e('Full Name', 'gazelle-meal-prep'); ?>
                </th>
                <td><?php echo esc_html($fullname); ?></td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Email Address', 'gazelle-meal-prep'); ?>
                </th>
                <td><?php echo esc_html($email); ?></td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Phone Number', 'gazelle-meal-prep'); ?>
                </th>
                <td><?php echo esc_html($phone); ?></td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Delivery City', 'gazelle-meal-prep'); ?>
                </th>
                <td><?php echo esc_html($city); ?></td>
            </tr>

           

            <tr>
                <th>
                    <?php esc_html_e('Preferred Delivery Date', 'gazelle-meal-prep'); ?>
                </th>
                <td><?php echo esc_html($delivery_date); ?></td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Special Instruction', 'gazelle-meal-prep'); ?>
                </th>
                <td>
                    <?php echo nl2br(esc_html($instruction)); ?>
                </td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Status', 'gazelle-meal-prep'); ?>
                </th>
                <td>
                    <?php echo esc_html(ucfirst($status)); ?>
                </td>
            </tr>

            <tr>
                <th>
                    <?php esc_html_e('Date Submitted', 'gazelle-meal-prep'); ?>
                </th>
                <td>
                    <?php echo esc_html(get_the_date('', $post)); ?>
                    &nbsp;
                    <?php echo esc_html(get_the_time('', $post)); ?>
                </td>
            </tr>

        </tbody>

    </table>

    <?php
}