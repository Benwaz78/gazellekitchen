<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {

    add_menu_page(
        'Meal Prep',
        'Meal Prep',
        'manage_options',
        'gazelle-meal-prep',
        'gmp_render_admin_page',
        'dashicons-carrot',
        25
    );
});

function gmp_render_admin_page() {

    $data = get_option('gazelle_meal_prep_page', [
        'header' => [
            'title' => '',
            'description' => '',
            'desktop_banner_id' => '',
            'mobile_banner_id' => ''
        ],
        'content' => [
            'text' => '',
            'image_id' => ''
        ]
    ]);
    ?>

    <div class="wrap">
        <h1>Meal Prep Manager</h1>

        <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">

            <input type="hidden" name="action" value="gmp_save">
            <?php wp_nonce_field('gmp_save_action'); ?>

            <h2>Header Section</h2>

            <table class="form-table">

                <tr>
                    <th>Title</th>
                    <td>
                        <input type="text" name="title"
                            value="<?php echo esc_attr($data['header']['title']); ?>"
                            class="regular-text">
                    </td>
                </tr>

                 <tr>
                    <th>Tag Line</th>
                    <td>
                        <input type="text" name="tagline"
                            value="<?php echo esc_attr($data['header']['tagline']); ?>"
                            class="regular-text">
                    </td>
                </tr>

              <tr>
                <th scope="row">
                    <label for="header_description">Description</label>
                </th>

                <td>
                    <?php
                    wp_editor(
                        $data['header']['description'] ?? '',
                        'header_description_editor',
                        [
                            'textarea_name' => 'description',
                            'textarea_rows' => 7,
                            'media_buttons' => false,
                            'teeny'         => true,
                            'quicktags'     => true,
                        ]
                    );
                    ?>
                    <p class="description">
                        Use a new paragraph for each separate message.
                    </p>
                </td>
            </tr>

                <tr>
                    <th>Desktop Banner</th>
                    <td>
                        <input type="hidden" id="desktop_banner_id" name="desktop_banner_id"
                            value="<?php echo esc_attr($data['header']['desktop_banner_id']); ?>">

                        <button type="button" class="button gmp-upload" data-target="desktop_banner_id">
                            Upload
                        </button>

                        <div class="preview desktop-preview">
                            <?php
                            if ($data['header']['desktop_banner_id']) {
                                echo wp_get_attachment_image($data['header']['desktop_banner_id'], 'medium');
                            }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th>Mobile Banner</th>
                    <td>
                        <input type="hidden" id="mobile_banner_id" name="mobile_banner_id"
                            value="<?php echo esc_attr($data['header']['mobile_banner_id']); ?>">

                        <button type="button" class="button gmp-upload" data-target="mobile_banner_id">
                            Upload
                        </button>

                        <div class="preview mobile-preview">
                            <?php
                            if ($data['header']['mobile_banner_id']) {
                                echo wp_get_attachment_image($data['header']['mobile_banner_id'], 'medium');
                            }
                            ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="meal_prep_price">Price</label>
                    </th>

                    <td>
                        <input
                            type="number"
                            id="meal_prep_price"
                            name="meal_prep_price"
                            value="<?php echo esc_attr($data['content']['price'] ?? ''); ?>"
                            class="regular-text"
                            min="0"
                            step="0.01"
                        >

                        <p class="description">
                            Enter only the amount, for example: 50 or 50.00. Do not include €.
                        </p>
                    </td>
                </tr>

            </table>

            <hr>

            <h2>Meal Prep Content</h2>

            <table class="form-table">

                <tr>
                    <th>Meal Prep Content</th>
                    <td>
                        <?php
                        wp_editor(
                            $data['content']['text'],
                            'content_text_editor',
                            [
                                'textarea_name' => 'content_text',
                                'media_buttons' => true,
                                'textarea_rows' => 8,
                                'teeny' => false,
                                'quicktags'     => true,
                            ]
                        );
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Image</th>
                    <td>
                        <input type="hidden" id="content_image_id" name="content_image_id"
                            value="<?php echo esc_attr($data['content']['image_id']); ?>">

                        <button type="button" class="button gmp-upload" data-target="content_image_id">
                            Upload
                        </button>

                        <div class="preview content-preview">
                            <?php
                            if ($data['content']['image_id']) {
                                echo wp_get_attachment_image($data['content']['image_id'], 'medium');
                            }
                            ?>
                        </div>
                    </td>
                </tr>

            </table>

            <?php submit_button('Save Meal Prep'); ?>
        </form>
    </div>

    <?php
}