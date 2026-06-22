<?php
/**
 * Plugin Name: Gazelles CMS
 */

if (!defined('ABSPATH')) exit;

define('GAZELLES_CMS_PATH', plugin_dir_path(__FILE__));
define('GAZELLES_CMS_URL', plugin_dir_url(__FILE__));

require_once GAZELLES_CMS_PATH . 'includes/core/enqueue.php';

require_once GAZELLES_CMS_PATH . 'includes/pages/homepage.php';