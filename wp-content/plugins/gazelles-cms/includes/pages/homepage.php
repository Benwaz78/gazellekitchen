<?php
add_action('add_meta_boxes', function () {

    add_meta_box(
        'gcm_homepage',
        'Homepage Hero Settings',
        'gcm_render_homepage',
        'page',
        'normal',
        'high'
    );
});

function gcm_render_homepage($post) {

    if (get_option('page_on_front') != $post->ID) {
        echo '<p>This is not the Front Page.</p>';
        return;
    }

    $desktop = get_post_meta($post->ID, 'gcm_home_desktop', true);
    $mobile  = get_post_meta($post->ID, 'gcm_home_mobile', true);
    $hero    = get_post_meta($post->ID, 'gau_home_hero_text', true);
    $support = get_post_meta($post->ID, 'gcm_home_support', true);

    wp_nonce_field('gcm_home_save', 'gcm_home_nonce');
    ?>

    <p><strong>Hero Text</strong></p>
    <input type="text" name="gau_home_hero_text" value="<?php echo esc_attr($hero); ?>" style="width:100%;">


    <p><strong>Support Text</strong></p>
    <textarea name="gcm_home_support" style="width:100%;height:80px;"><?php echo esc_textarea($support); ?></textarea>

    <hr>

    <p><strong>Desktop Banner</strong></p>
    <input type="hidden" id="gcm_home_desktop" name="gcm_home_desktop" value="<?php echo esc_attr($desktop); ?>">
    <button type="button" class="button gcm-upload-desktop">Upload Desktop</button>

    <div class="gcm-preview-desktop">
        <?php if ($desktop) echo wp_get_attachment_image($desktop, 'medium'); ?>
    </div>

    <hr>

    <p><strong>Mobile Banner</strong></p>
    <input type="hidden" id="gcm_home_mobile" name="gcm_home_mobile" value="<?php echo esc_attr($mobile); ?>">
    <button type="button" class="button gcm-upload-mobile">Upload Mobile</button>

    <div class="gcm-preview-mobile">
        <?php if ($mobile) echo wp_get_attachment_image($mobile, 'medium'); ?>
    </div>

    <?php
}

add_action('save_post_page', function ($post_id) {

    if (!isset($_POST['gcm_home_nonce'])) return;
    if (!wp_verify_nonce($_POST['gcm_home_nonce'], 'gcm_home_save')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (get_option('page_on_front') != $post_id) return;

    update_post_meta($post_id, 'gcm_home_desktop', absint($_POST['gcm_home_desktop'] ?? 0));
    update_post_meta($post_id, 'gcm_home_mobile', absint($_POST['gcm_home_mobile'] ?? 0));
    update_post_meta($post_id, 'gau_home_hero_text', sanitize_text_field($_POST['gau_home_hero_text'] ?? ''));
    update_post_meta($post_id, 'gcm_home_support', sanitize_textarea_field($_POST['gcm_home_support'] ?? ''));
});