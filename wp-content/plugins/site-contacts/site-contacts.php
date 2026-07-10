<?php
/**
 * Plugin Name: Site Contacts
 * Description: Reusable site contact information manager (email, phone, social links).
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit;

define('SITE_CONTACTS_PATH', plugin_dir_path(__FILE__));
define('SITE_CONTACTS_URL', plugin_dir_url(__FILE__));

require_once SITE_CONTACTS_PATH . 'admin/site-contacts-admin.php';
require_once SITE_CONTACTS_PATH . 'includes/site-contacts-fields.php';
require_once SITE_CONTACTS_PATH . 'includes/site-contacts-helpers.php';
