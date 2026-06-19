<?php

add_action('product_cat_add_form_fields', 'gazelle_add_category_fields');

function gazelle_add_category_fields() {
    ?>
    <div class="form-field">
        <label for="category_banner">Category Banner</label>

        <input type="hidden" name="category_banner" id="category_banner" />

        <div style="margin-top:10px;">
            <button type="button" class="upload_banner_button button">
                Upload Banner Image
            </button>
        </div>

        <div class="banner-preview" style="margin-top:10px;"></div>

        <p class="description">Upload a banner image from Media Library recommended size (1200px X 450px)</p>
    </div>

    <div class="form-field">
        <label for="mobile_banner_id">Mobile Banner</label>

        <input type="hidden" name="mobile_banner_id" id="mobile_banner_id">

        <div style="margin-top:10px;">
            <button type="button" class="upload_mobile_banner_button button">
                Upload Mobile Banner
            </button>
        </div>

        <div class="mobile-banner-preview" style="margin-top:10px;"></div>

        <p class="description">
            Mobile banner (recommended 1080 × 1350)
        </p>
    </div>

    <div class="form-field">
        <label for="category_icon">FontAwesome Unicode</label>
        <input type="text" name="category_icon" id="category_icon" />
        <p class="description">Example: f2e7 (used in CSS content)</p>
    </div>
    <?php
}


add_action('product_cat_edit_form_fields', 'gazelle_edit_category_fields', 10, 2);

function gazelle_edit_category_fields($term, $taxonomy) {

    $banner = get_term_meta($term->term_id, 'category_banner', true);
    $icon   = get_term_meta($term->term_id, 'category_icon', true);
    $mobile_banner_id = get_term_meta(
    $term->term_id,
    'mobile_banner_id',
    true
);
    ?>

    <tr class="form-field">
        <th scope="row"><label>Category Banner</label></th>
        <td>
            <input type="hidden" name="category_banner" id="category_banner" value="<?php echo esc_attr($banner); ?>" />

            <button type="button" class="upload_banner_button button">
                Upload/Change Banner
            </button>

            <div class="banner-preview" style="margin-top:10px;">
                <?php
                if ($banner) {
                    echo wp_get_attachment_image(
                        $banner,
                        'medium',
                        false,
                        ['style' => 'max-width:200px;height:auto;']
                    );
                }
                ?>
            </div>

            <p class="description">Upload banner image from Media Library</p>
        </td>
    </tr>

    <tr class="form-field">
        <th scope="row">
            <label for="mobile_banner_id">
                Mobile Banner
            </label>
        </th>
        <td>

            <input
                type="hidden"
                id="mobile_banner_id"
                name="mobile_banner_id"
                value="<?php echo esc_attr($mobile_banner_id); ?>">

            <div class="mobile-banner-preview">

                <?php
                if ($mobile_banner_id) {
                    echo wp_get_attachment_image(
                        $mobile_banner_id,
                        'medium'
                    );
                }
                ?>

            </div>

            <button
                type="button"
                class="button upload_mobile_banner_button">
                Upload Mobile Banner
            </button>

            <button
                type="button"
                class="button remove-mobile-banner">
                Remove
            </button>

        </td>
    </tr>

    <tr class="form-field">
        <th scope="row"><label>FontAwesome Unicode</label></th>
        <td>
            <input type="text" name="category_icon" value="<?php echo esc_attr($icon); ?>" />
        </td>
    </tr>

    

    <?php
}

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
        update_term_meta($term_id, 'category_icon', sanitize_text_field($_POST['category_icon']));
    }
}


add_action('admin_enqueue_scripts', 'gazelle_admin_media_uploader');

function gazelle_admin_media_uploader() {

    if (!isset($_GET['taxonomy']) || $_GET['taxonomy'] !== 'product_cat') {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script(
        'gazelle-category-media',
        get_stylesheet_directory_uri() . '/assets/js/category-media.js',
        ['jquery'],
        null,
        true
    );
}