<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {
    add_menu_page(
        'Site Contacts',
        'Site Contacts',
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
        <h1>Site Contacts</h1>

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
