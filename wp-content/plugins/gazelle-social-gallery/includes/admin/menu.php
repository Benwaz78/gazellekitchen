<?php

if (!defined('ABSPATH')) exit;

/**
 * MAIN ADMIN MENU
 */

add_action('admin_menu', function () {

    add_menu_page(
        'Gazelle Social Gallery',
        'Social Gallery',
        'manage_options',
        'gazelle-social-gallery',
        'gazelle_sg_dashboard_page',
        'dashicons-format-gallery',
        25
    );

    add_submenu_page(
        'gazelle-social-gallery',
        'WhatsApp Testimonials',
        'WhatsApp',
        'manage_options',
        'gazelle-wa-testimonials',
        'gazelle_wa_page'
    );

    add_submenu_page(
        'gazelle-social-gallery',
        'Instagram Gallery',
        'Instagram',
        'manage_options',
        'gazelle-instagram',
        'gazelle_ig_page'
    );

});

/**
 * DASHBOARD PAGE
 */

function gazelle_sg_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Gazelle Social Gallery</h1>

        <p>Select a module to manage media content.</p>

        <ul>
            <li>WhatsApp Testimonials</li>
            <li>Instagram Gallery</li>
        </ul>
    </div>
    <?php
}