<?php

if (!defined('ABSPATH')) exit;

/**
 * PAGE CALLBACK
 */

function gazelle_wa_page() {
    ?>
    <div class="wrap">
        <h1>WhatsApp Testimonials</h1>

        <button class="button button-primary" id="gazelle-wa-upload">
            Add Testimonials
        </button>

        <input type="hidden" id="gazelle-wa-input">

        <div id="gazelle-wa-preview" style="display:flex;gap:10px;flex-wrap:wrap;margin-top:20px;"></div>
    </div>
    <?php
}

/**
 * SAVE DATA
 * (simple wp_options storage for now)
 */

function gazelle_get_whatsapp_gallery() {
    return get_option('gazelle_wa_gallery', []);
}

function gazelle_save_whatsapp_gallery($ids) {
    update_option('gazelle_wa_gallery', $ids);
}