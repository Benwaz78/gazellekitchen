<?php
/** 
* Astra Child Theme functions. 
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
require_once get_stylesheet_directory() . '/inc/theme-setup.php';
require_once get_stylesheet_directory() . '/inc/enqueue.php';
require_once get_stylesheet_directory() . '/inc/woocommerce.php';
require_once get_stylesheet_directory() . '/inc/product-category-fields.php';
require_once get_stylesheet_directory() . '/inc/product-fields.php';
require_once get_stylesheet_directory() . '/inc/settings.php';
require_once get_stylesheet_directory() . '/inc/whatsapp-order.php';
require_once get_stylesheet_directory() . '/inc/product-card-helpers.php';
new GK_WhatsApp_Order();