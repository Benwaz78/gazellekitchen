<?php

add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menus([
         'primary' => __('Primary Menu', 'gazelles'),
          'footer'  => __('Footer Menu', 'gazelles')
    ]);

});