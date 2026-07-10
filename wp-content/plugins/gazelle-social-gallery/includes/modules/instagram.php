<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Instagram Gallery Admin Page
 */
function gazelle_ig_page() {

    /**
     * Save Gallery
     */
    if (
        isset($_POST['gazelle_save_instagram']) &&
        check_admin_referer('gazelle_ig_save')
    ) {

        $ids = [];

        if (!empty($_POST['gazelle_ig_gallery'])) {

            $ids = array_filter(
                array_map(
                    'absint',
                    explode(',', sanitize_text_field($_POST['gazelle_ig_gallery']))
                )
            );
        }

        gazelle_sg_save_gallery(
            'instagram',
            $ids
        );

        echo '
        <div class="notice notice-success is-dismissible">
            <p>Instagram gallery saved successfully.</p>
        </div>';
    }

    /**
     * Load Existing Gallery
     */
    $gallery = gazelle_sg_get_gallery('instagram');

    ?>

    <div class="wrap">

        <h1>Instagram Gallery</h1>

        <form method="post">

            <?php wp_nonce_field('gazelle_ig_save'); ?>

            <input
                type="hidden"
                name="gazelle_ig_gallery"
                id="gazelle-ig-input"
                value="<?php echo esc_attr(implode(',', $gallery)); ?>">

            <p>
                <button
                    type="button"
                    class="button button-primary"
                    id="gazelle-ig-upload">
                    Add Instagram Images
                </button>
            </p>

            <div
                id="gazelle-ig-preview"
                style="
                    display:flex;
                    gap:15px;
                    flex-wrap:wrap;
                    margin-top:20px;
                    margin-bottom:20px;
                ">

                <?php if (!empty($gallery)) : ?>

                    <?php foreach ($gallery as $id) : ?>

                        <div
                            class="gazelle-gallery-item"
                            data-id="<?php echo esc_attr($id); ?>"
                            style="position:relative;width:200px;">

                            <?php
                            echo wp_get_attachment_image(
                                $id,
                                'medium',
                                false,
                                [
                                    'style' => '
                                        width:100%;
                                        height:auto;
                                        display:block;
                                    '
                                ]
                            );
                            ?>

                            <button
                                type="button"
                                class="button gazelle-remove-image"
                              >
                                ×
                            </button>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>

            <button
                type="submit"
                name="gazelle_save_instagram"
                class="button button-primary">

                Save Gallery

            </button>

        </form>

    </div>

    <?php
}