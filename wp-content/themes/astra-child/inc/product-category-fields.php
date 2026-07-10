<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add category fields
 */
add_action('product_cat_add_form_fields', 'gazelle_add_category_fields');

function gazelle_add_category_fields() {
    ?>
    <div class="form-field">
        <label for="category_banner">Category Desktop Banner</label>

        <input
            type="hidden"
            name="category_banner"
            id="category_banner"
            value=""
        >

        <p>
            <button
                type="button"
                class="button upload_banner_button">
                Upload Desktop Banner
            </button>

            <button
                type="button"
                class="button remove-banner-button"
                style="display:none;">
                Remove
            </button>
        </p>

        <div class="banner-preview"></div>

        <p class="description">
            Recommended desktop size: 1920 × 450 pixels.
        </p>
    </div>

    <div class="form-field">
        <label for="mobile_banner_id">Category Mobile Banner</label>

        <input
            type="hidden"
            name="mobile_banner_id"
            id="mobile_banner_id"
            value=""
        >

        <p>
            <button
                type="button"
                class="button upload_mobile_banner_button">
                Upload Mobile Banner
            </button>

            <button
                type="button"
                class="button remove-mobile-banner"
                style="display:none;">
                Remove
            </button>
        </p>

        <div class="mobile-banner-preview"></div>

        <p class="description">
            Recommended mobile size: 1080 × 1350 pixels.
        </p>
    </div>

    <div class="form-field">
        <label for="category_icon">FontAwesome Unicode</label>

        <input
            type="text"
            name="category_icon"
            id="category_icon"
            value=""
        >

        <p class="description">
            Example: f2e7
        </p>
    </div>
    <?php
}


/**
 * Edit category fields
 */
add_action('product_cat_edit_form_fields', 'gazelle_edit_category_fields', 10, 2);

function gazelle_edit_category_fields($term, $taxonomy) {

    $desktop_banner_id = get_term_meta(
        $term->term_id,
        'category_banner',
        true
    );

    $mobile_banner_id = get_term_meta(
        $term->term_id,
        'mobile_banner_id',
        true
    );

    $category_icon = get_term_meta(
        $term->term_id,
        'category_icon',
        true
    );

    /*
     * Old data compatibility:
     * If you previously saved a URL, show it in the preview,
     * but do not place it inside the hidden input.
     */
    $desktop_preview_url = '';

    if ($desktop_banner_id && is_numeric($desktop_banner_id)) {
        $desktop_preview_url = wp_get_attachment_image_url(
            absint($desktop_banner_id),
            'category-banner-desktop'
        );
    } elseif ($desktop_banner_id && filter_var($desktop_banner_id, FILTER_VALIDATE_URL)) {
        $desktop_preview_url = $desktop_banner_id;
        $desktop_banner_id = '';
    }

    $mobile_preview_url = '';

    if ($mobile_banner_id && is_numeric($mobile_banner_id)) {
        $mobile_preview_url = wp_get_attachment_image_url(
            absint($mobile_banner_id),
            'category-banner-mobile'
        );
    } elseif ($mobile_banner_id && filter_var($mobile_banner_id, FILTER_VALIDATE_URL)) {
        $mobile_preview_url = $mobile_banner_id;
        $mobile_banner_id = '';
    }

    ?>
    <tr class="form-field">
        <th scope="row">
            <label for="category_banner">Category Desktop Banner</label>
        </th>

        <td>
            <input
                type="hidden"
                name="category_banner"
                id="category_banner"
                value="<?php echo esc_attr(absint($desktop_banner_id)); ?>"
            >

            <p>
                <button
                    type="button"
                    class="button upload_banner_button">
                    Upload / Change Desktop Banner
                </button>

                <button
                    type="button"
                    class="button remove-banner-button"
                    <?php echo empty($desktop_preview_url) ? 'style="display:none;"' : ''; ?>>
                    Remove
                </button>
            </p>

            <div class="banner-preview">
                <?php if ($desktop_preview_url) : ?>
                    <img
                        src="<?php echo esc_url($desktop_preview_url); ?>"
                        alt=""
                        style="max-width:200px;height:auto;display:block;"
                    >
                <?php endif; ?>
            </div>

            <p class="description">
                Recommended desktop size: 1920 × 450 pixels.
            </p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row">
            <label for="mobile_banner_id">Category Mobile Banner</label>
        </th>

        <td>
            <input
                type="hidden"
                name="mobile_banner_id"
                id="mobile_banner_id"
                value="<?php echo esc_attr(absint($mobile_banner_id)); ?>"
            >

            <p>
                <button
                    type="button"
                    class="button upload_mobile_banner_button">
                    Upload / Change Mobile Banner
                </button>

                <button
                    type="button"
                    class="button remove-mobile-banner"
                    <?php echo empty($mobile_preview_url) ? 'style="display:none;"' : ''; ?>>
                    Remove
                </button>
            </p>

            <div class="mobile-banner-preview">
                <?php if ($mobile_preview_url) : ?>
                    <img
                        src="<?php echo esc_url($mobile_preview_url); ?>"
                        alt=""
                        style="max-width:200px;height:auto;display:block;"
                    >
                <?php endif; ?>
            </div>

            <p class="description">
                Recommended mobile size: 1080 × 1350 pixels.
            </p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row">
            <label for="category_icon">FontAwesome Unicode</label>
        </th>

        <td>
            <input
                type="text"
                name="category_icon"
                id="category_icon"
                value="<?php echo esc_attr($category_icon); ?>"
            >

            <p class="description">
                Example: f2e7
            </p>
        </td>
    </tr>
    <?php
}


/**
 * Save category fields
 */
add_action('created_product_cat', 'gazelle_save_category_fields', 10, 2);
add_action('edited_product_cat', 'gazelle_save_category_fields', 10, 2);

function gazelle_save_category_fields($term_id) {

    if (isset($_POST['category_banner'])) {
        update_term_meta(
            $term_id,
            'category_banner',
            absint($_POST['category_banner'])
        );
    }

    if (isset($_POST['mobile_banner_id'])) {
        update_term_meta(
            $term_id,
            'mobile_banner_id',
            absint($_POST['mobile_banner_id'])
        );
    }

    if (isset($_POST['category_icon'])) {
        update_term_meta(
            $term_id,
            'category_icon',
            sanitize_text_field($_POST['category_icon'])
        );
    }
}


/**
 * Load WordPress media uploader and category JS
 */
add_action('admin_enqueue_scripts', 'gazelle_admin_media_uploader');

function gazelle_admin_media_uploader($hook) {

    if (!isset($_GET['taxonomy']) || $_GET['taxonomy'] !== 'product_cat') {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_script(
        'gazelle-category-media',
        get_stylesheet_directory_uri() . '/assets/js/category-media.js',
        ['jquery'],
        '1.0.0',
        true
    );
}