<?php
if (!defined('ABSPATH')) exit;

/**
 * Get a site contact value safely
 */
function site_contact($key) {
    $value = get_option($key);
    return $value ? esc_html($value) : null;
}

/**
 * Check if contact exists
 */
function has_site_contact($key) {
    return !empty(get_option($key));
}
