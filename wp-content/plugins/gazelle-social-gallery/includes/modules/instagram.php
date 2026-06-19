<?php

if (!defined('ABSPATH')) exit;

/**
 * PAGE CALLBACK
 */

function gazelle_instagram_page() {
    ?>
    <div class="wrap">
        <h1>Instagram Gallery</h1>

        <button class="button button-primary" id="gazelle-ig-upload">
            Add Instagram Images
        </button>

        <input type="hidden" id="gazelle-ig-input">

        <div id="gazelle-ig-preview"
             style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:20px;">
        </div>
    </div>
    <?php
}

/**
 * STORAGE HELPERS
 */

function gazelle_get_instagram_gallery() {
    return get_option('gazelle_ig_gallery', []);
}

function gazelle_save_instagram_gallery($ids) {
    update_option('gazelle_ig_gallery', $ids);
}