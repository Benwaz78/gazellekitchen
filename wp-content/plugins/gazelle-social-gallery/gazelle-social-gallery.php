<?php
/**
 * Plugin Name: Gazelle Social Gallery
 * Description: Modular media system for WhatsApp testimonials, Instagram feeds and reusable social galleries.
 * Version: 1.0.0
 * Author: Gazelle Systems
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * =========================================================
 * CONSTANTS
 * =========================================================
 */

define('GAZELLE_SG_PATH', plugin_dir_path(__FILE__));
define('GAZELLE_SG_URL', plugin_dir_url(__FILE__));
define('GAZELLE_SG_VERSION', '1.0.0');

/**
 * =========================================================
 * CORE LOADER
 * (ONLY CORE BOOTSTRAP LOGIC HERE)
 * =========================================================
 */

require_once GAZELLE_SG_PATH . 'includes/core/enqueue.php';
require_once GAZELLE_SG_PATH . 'includes/core/storage.php';

/**
 * =========================================================
 * ADMIN MENU LOADER
 * (ALL MENU REGISTRATION IS HANDLED HERE)
 * =========================================================
 */

require_once GAZELLE_SG_PATH . 'includes/admin/menu.php';

/**
 * =========================================================
 * MODULE LOADER
 * (EACH FEATURE IS ISOLATED)
 * =========================================================
 */

require_once GAZELLE_SG_PATH . 'includes/modules/whatsapp.php';
require_once GAZELLE_SG_PATH . 'includes/modules/instagram.php';

/**
 * =========================================================
 * ACTIVATION / DEACTIVATION
 * =========================================================
 */

register_activation_hook(__FILE__, function () {

    /**
     * Future use:
     * - create default options
     * - initialize DB tables if needed
     */

});

register_deactivation_hook(__FILE__, function () {

    /**
     * Optional cleanup logic
     */

});