<?php

if (!defined('ABSPATH')) exit;

/**
 * =========================================================
 * GENERIC STORAGE HELPERS
 * =========================================================
 */

/**
 * Save gallery by type
 * Example: whatsapp, instagram
 */
function gazelle_sg_save_gallery($type, $ids = []) {

    if (!is_array($ids)) {
        $ids = explode(',', $ids);
    }

    $ids = array_filter(array_map('absint', $ids));

    update_option('gazelle_sg_' . $type . '_gallery', $ids);
}

/**
 * Get gallery by type
 */
function gazelle_sg_get_gallery($type) {

    $data = get_option('gazelle_sg_' . $type . '_gallery', []);

    return is_array($data) ? $data : [];
}

/**
 * Clear gallery
 */
function gazelle_sg_clear_gallery($type) {
    delete_option('gazelle_sg_' . $type . '_gallery');
}