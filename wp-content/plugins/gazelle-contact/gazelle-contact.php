<?php

/**
 * Plugin Name: Gazelle Contact
 * Plugin URI: https://example.com
 * Description: Contact enquiry module for Gazelles Kitchen.
 * Version: 1.0.0
 * Author: Benedict Uwazie
 * License: GPL2+
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GK_CONTACT_PATH', plugin_dir_path(__FILE__));

require_once GK_CONTACT_PATH . 'includes/post-type.php';
require_once GK_CONTACT_PATH . 'includes/form-handler.php';
require_once GK_CONTACT_PATH . 'includes/meta-boxes.php';
require_once GK_CONTACT_PATH . 'includes/admin-columns.php';
require_once GK_CONTACT_PATH . 'includes/mailer.php';
require_once GK_CONTACT_PATH . 'includes/functions.php';