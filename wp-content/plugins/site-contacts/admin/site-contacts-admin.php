<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {
    add_menu_page(
        'Business Information',
        'Business Information',
        'manage_options',
        'site-contacts',
        'site_contacts_admin_page',
        'dashicons-phone',
        60
    );
});

function site_contacts_admin_page() {
    ?>
    <div class="wrap">
        <h1>Business Information</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('site_contacts_group');
            do_settings_sections('site-contacts');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
