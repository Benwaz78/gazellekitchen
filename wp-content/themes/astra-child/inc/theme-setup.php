<?php

add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_image_size(
        'menu-card',
        800,
        600,
        true
    );

    add_image_size(
        'menu-detail',
        1200,
        1200,
        true
    );

    add_image_size('category-banner-desktop', 1920, 450, true);
    add_image_size('category-banner-mobile', 1080, 1350, true);
    add_image_size('about-image', 1080, 1350, true);
    add_image_size('general-banner-desktop', 1920, 450, true);
    add_image_size('general-banner-mobile', 1080, 1350, true);
    add_image_size('social-gallery', 1200, 9999, false);
    add_image_size('social-gallery-ig', 1200, 1200, true);

    register_nav_menus([
         'primary' => __('Primary Menu', 'gazelles'),
          'footer'  => __('Footer Menu', 'gazelles')
    ]);

});
