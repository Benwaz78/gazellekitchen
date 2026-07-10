<?php
/**
 * Plugin Name: Custom Email Settings
 * Description: Forces a consistent global "From" name and email across all outgoing WordPress emails.
 * Author: Benedict Uwazie
 * Version: 1.0
 */

if (!defined('ABSPATH')) exit; // Security check

/**
 * Set global sender email
 */
add_filter('wp_mail_from', function($original_email_address) {
    // Replace with your company noreply email
    return 'noreply@gazelleskitchen.com';
});

/**
 * Set global sender name
 */
add_filter('wp_mail_from_name', function($original_name) {
    // Replace with your company name
    return 'Gazelles Kitchen';
});
