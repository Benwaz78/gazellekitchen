<?php
/**
 * Plugin Name: Gazelle Meal Prep Manager
 * Description: Admin system for Meal Prep page (header + content + images)
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit;

// Define paths
define('GMP_PATH', plugin_dir_path(__FILE__));
define('GMP_URL', plugin_dir_url(__FILE__));

// Includes
require_once GMP_PATH . 'includes/admin-page.php';
require_once GMP_PATH . 'includes/save-handler.php';
require_once GMP_PATH . 'includes/enqueue.php';
require_once GMP_PATH . 'includes/post-type.php';
require_once GMP_PATH . 'includes/mailer.php';
require_once GMP_PATH . 'includes/functions.php';
require_once GMP_PATH . 'includes/form-handler.php';
require_once GMP_PATH . 'includes/helpers.php';
require_once GMP_PATH . 'includes/meta-box.php';
require_once GMP_PATH . 'includes/settings.php';
require_once GMP_PATH . 'includes/whatsapp.php';
require_once GMP_PATH . 'includes/admin-status.php';
require_once GMP_PATH . 'includes/admin-columns.php';