<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Contact Details Metabox
 */
function gk_contact_add_meta_boxes()
{
    add_meta_box(
        'gk_contact_details',
        __('Contact Details', 'gazelles-kitchen'),
        'gk_contact_details_callback',
        'gk_contact',
        'normal',
        'high'
    );
}

add_action('add_meta_boxes', 'gk_contact_add_meta_boxes');

/**
 * Contact Details Metabox
 */
function gk_contact_details_callback($post)
{
    wp_nonce_field('gk_contact_meta_box', 'gk_contact_meta_box_nonce');

    $full_name = get_post_meta($post->ID, '_contact_full_name', true);
    $email     = get_post_meta($post->ID, '_contact_email', true);
    $phone     = get_post_meta($post->ID, '_contact_phone', true);
    $subject   = get_post_meta($post->ID, '_contact_subject', true);
    $message   = get_post_meta($post->ID, '_contact_message', true);
    $status    = get_post_meta($post->ID, '_contact_status', true);

    if (empty($status)) {
        $status = 'new';
    }

    ?>

    <table class="form-table">

        <tr>
            <th><label>Full Name</label></th>
            <td><?php echo esc_html($full_name); ?></td>
        </tr>

        <tr>
            <th><label>Email Address</label></th>
            <td>
                <a href="mailto:<?php echo esc_attr($email); ?>">
                    <?php echo esc_html($email); ?>
                </a>
            </td>
        </tr>

        <tr>
            <th><label>Phone Number</label></th>
            <td><?php echo esc_html($phone); ?></td>
        </tr>

        <tr>
            <th><label>Subject</label></th>
            <td><?php echo esc_html($subject); ?></td>
        </tr>

        <tr>
            <th><label>Message</label></th>
            <td>
                <?php echo nl2br(esc_html($message)); ?>
            </td>
        </tr>

        <tr>
            <th><label>Status</label></th>
            <td>

                <select name="contact_status">

                    <option value="new" <?php selected($status, 'new'); ?>>
                        New
                    </option>

                    <option value="in_progress" <?php selected($status, 'in_progress'); ?>>
                        In Progress
                    </option>

                    <option value="resolved" <?php selected($status, 'resolved'); ?>>
                        Resolved
                    </option>

                    <option value="closed" <?php selected($status, 'closed'); ?>>
                        Closed
                    </option>

                </select>

            </td>
        </tr>

    </table>

    <?php
}

/**
 * Save Contact Status
 */
function gk_contact_save_meta_box($post_id)
{
    if (!isset($_POST['gk_contact_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce(
        $_POST['gk_contact_meta_box_nonce'],
        'gk_contact_meta_box'
    )) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) !== 'gk_contact') {
        return;
    }

    if (isset($_POST['contact_status'])) {
        update_post_meta(
            $post_id,
            '_contact_status',
            sanitize_text_field($_POST['contact_status'])
        );
    }
}

add_action('save_post', 'gk_contact_save_meta_box');