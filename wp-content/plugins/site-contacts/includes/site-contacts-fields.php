<?php
if (!defined('ABSPATH')) exit;

add_action('admin_init', function () {

    register_setting('site_contacts_group', 'sc_email1');
    register_setting('site_contacts_group', 'sc_email2');
    register_setting('site_contacts_group', 'sc_phone1');
    register_setting('site_contacts_group', 'sc_phone2');
    register_setting('site_contacts_group', 'sc_address1');
    register_setting('site_contacts_group', 'sc_address2');


    register_setting('site_contacts_group', 'sc_bank_name');
    register_setting('site_contacts_group', 'sc_account_name');
    register_setting('site_contacts_group', 'sc_iban');
    register_setting('site_contacts_group', 'sc_bic_swift');
    register_setting('site_contacts_group', 'sc_vat_number');
    register_setting('site_contacts_group', 'sc_kvk_number');



    register_setting('site_contacts_group', 'sc_facebook');
    register_setting('site_contacts_group', 'sc_twitter');
    register_setting('site_contacts_group', 'sc_instagram');
    register_setting('site_contacts_group', 'sc_tiktok');

    add_settings_section(
        'site_contacts_section',
        'Business Information',
        null,
        'site-contacts'
    );

    $fields = [
        'sc_email1'    => 'Email 1',
        'sc_email2'    => 'Email 2',
        'sc_phone1'    => 'Phone 1',
        'sc_phone2'    => 'Phone 2',
        'sc_address1'   => 'Address 1',
        'sc_address2'   => 'Address 2',
        'sc_bank_name'   => 'Bank Name',
        'sc_account_name'   => 'Account Name',
        'sc_iban'   => 'IBAN',
        'sc_bic_swift'   => 'BIC/SWIFT',
        'sc_vat_number'   => 'VAT Number',
        'sc_kvk_number'   => 'KvK Number',
        'sc_facebook'  => 'Facebook URL',
        'sc_twitter'   => 'Twitter URL',
        'sc_instagram' => 'Instagram URL',
        'sc_tiktok'    => 'TikTok URL',
    ];

    foreach ($fields as $key => $label) {
        add_settings_field(
            $key,
            $label,
            'site_contacts_field_render',
            'site-contacts',
            'site_contacts_section',
            ['key' => $key]
        );
    }
});

function site_contacts_field_render($args) {
    $key = $args['key'];
    $value = get_option($key);
    ?>
    <input type="text" name="<?php echo esc_attr($key); ?>"
           value="<?php echo esc_attr($value); ?>"
           style="width: 400px;">
    <?php
}
