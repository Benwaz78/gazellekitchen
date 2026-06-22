<?php
/**
 * Plugin Name: Gazelle Pricing Plans
 * Description: Manage pricing plans with icon, description, price and repeatable features.
 * Version: 1.0.0
 * Author: Gazelle
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GPP_PATH', plugin_dir_path(__FILE__));
define('GPP_URL', plugin_dir_url(__FILE__));

require_once GPP_PATH . 'includes/core/post-type.php';
require_once GPP_PATH . 'includes/admin/meta-boxes.php';
require_once GPP_PATH . 'includes/admin/save-meta.php';
require_once GPP_PATH . 'includes/admin/enqueue.php';

register_activation_hook(__FILE__, 'gpp_activate_plugin');

function gpp_activate_plugin() {
    gpp_register_pricing_plan_cpt();
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'gpp_deactivate_plugin');

function gpp_deactivate_plugin() {
    flush_rewrite_rules();
}