<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('add_meta_boxes', 'gpp_add_pricing_plan_meta_box');

function gpp_add_pricing_plan_meta_box() {

    add_meta_box(
        'gpp_pricing_plan_details',
        'Pricing Plan Details',
        'gpp_render_pricing_plan_meta_box',
        'gpp_pricing_plan',
        'normal',
        'high'
    );
}

function gpp_render_pricing_plan_meta_box($post) {

    wp_nonce_field('gpp_save_pricing_plan', 'gpp_pricing_plan_nonce');

    $icon        = get_post_meta($post->ID, '_gpp_icon', true);
    $description = get_post_meta($post->ID, '_gpp_description', true);
    $price       = get_post_meta($post->ID, '_gpp_price', true);
    $features    = get_post_meta($post->ID, '_gpp_features', true);

    if (!is_array($features) || empty($features)) {
        $features = [''];
    }
    ?>

    <div class="gpp-meta-fields">

        <p>
            <label for="gpp_icon"><strong>FontAwesome Icon Class</strong></label>
            <input
                type="text"
                id="gpp_icon"
                name="gpp_icon"
                class="widefat"
                value="<?php echo esc_attr($icon); ?>"
                placeholder="fas fa-utensils">
            <span class="description">Example: <code>fas fa-utensils</code></span>
        </p>

        <p>
            <label for="gpp_description"><strong>Description</strong></label>
            <textarea
                id="gpp_description"
                name="gpp_description"
                class="widefat"
                rows="4"
                placeholder="Short description of this plan"><?php echo esc_textarea($description); ?></textarea>
        </p>

        <p>
            <label for="gpp_price"><strong>Price</strong></label>
            <input
                type="text"
                id="gpp_price"
                name="gpp_price"
                value="<?php echo esc_attr($price); ?>"
                placeholder="60.00">
            <span class="description">Enter only the amount. Example: 60 or 60.00</span>
        </p>

        <hr>

        <div class="gpp-features-wrapper">
            <p><strong>Plan Features</strong></p>

            <div class="gpp-features-list">

                <?php foreach ($features as $feature) : ?>
                    <div class="gpp-feature-item">
                        <input
                            type="text"
                            name="gpp_features[]"
                            value="<?php echo esc_attr($feature); ?>"
                            class="widefat"
                            placeholder="Example: 5 meals per week">

                        <button
                            type="button"
                            class="button gpp-remove-feature">
                            Remove
                        </button>
                    </div>
                <?php endforeach; ?>

            </div>

            <button
                type="button"
                class="button button-secondary gpp-add-feature">
                + Add Feature
            </button>
        </div>

    </div>
    <?php
}