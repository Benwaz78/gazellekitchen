<?php

function gazelles_enqueue_assets() {

    $theme_uri = get_stylesheet_directory_uri();
    $version   = wp_get_theme()->get('Version');

    /**
     * CSS
     */

    // Bootstrap
    wp_enqueue_style(
        'bootstrap',
        $theme_uri . '/assets/vendor/bootstrap/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Font Awesome
    wp_enqueue_style(
        'fontawesome',
        $theme_uri . '/assets/vendor/fontawesome-free/css/all.min.css',
        [],
        '6.7.2'
    );

    // Animate
    wp_enqueue_style(
        'animate',
        $theme_uri . '/assets/vendor/animate/animate.compat.css',
        [],
        null
    );

    // Simple Line Icons
    wp_enqueue_style(
        'simple-line-icons',
        $theme_uri . '/assets/vendor/simple-line-icons/css/simple-line-icons.min.css',
        [],
        null
    );

    // Owl Carousel
    wp_enqueue_style(
        'owl-carousel',
        $theme_uri . '/assets/vendor/owl.carousel/assets/owl.carousel.min.css',
        [],
        null
    );

    wp_enqueue_style(
        'owl-carousel-theme',
        $theme_uri . '/assets/vendor/owl.carousel/assets/owl.theme.default.min.css',
        ['owl-carousel'],
        null
    );

    // Magnific Popup
    wp_enqueue_style(
        'magnific-popup',
        $theme_uri . '/assets/vendor/magnific-popup/magnific-popup.min.css',
        [],
        null
    );

    // Theme CSS
    wp_enqueue_style(
        'gazelle-theme',
        $theme_uri . '/assets/css/theme.css',
        [],
        $version
    );

    wp_enqueue_style(
        'gazelle-theme-elements',
        $theme_uri . '/assets/css/theme-elements.css',
        ['gazelle-theme'],
        $version
    );

    wp_enqueue_style(
        'gazelle-theme-blog',
        $theme_uri . '/assets/css/theme-blog.css',
        ['gazelle-theme'],
        $version
    );

    wp_enqueue_style(
        'gazelle-theme-shop',
        $theme_uri . '/assets/css/theme-shop.css',
        ['gazelle-theme'],
        $version
    );

    // Skin
    wp_enqueue_style(
        'gazelle-skin',
        $theme_uri . '/assets/css/gazelle-skin.css',
        ['gazelle-theme'],
        $version
    );

    // Custom CSS LAST
    wp_enqueue_style(
        'gazelle-custom',
        $theme_uri . '/assets/css/custom.css',
        ['gazelle-skin'],
        $version
    );



    /**
     * JS
     */

    wp_enqueue_script(
        'gazelle-plugins',
        $theme_uri . '/assets/vendor/plugins/js/plugins.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'gazelle-theme',
        $theme_uri . '/assets/js/theme.js',
        ['gazelle-plugins'],
        $version,
        true
    );

    wp_enqueue_script(
        'gazelle-custom',
        $theme_uri . '/assets/js/custom.js',
        ['gazelle-theme'],
        $version,
        true
    );

    // Cart Customizations
    wp_enqueue_script(
        'gazelle-cart',
        $theme_uri . '/assets/js/cart.js',
        ['jquery'],
        $version,
        true
    );

    wp_enqueue_script(
        'gazelle-theme-init',
        $theme_uri . '/assets/js/theme.init.js',
        ['gazelle-theme'],
        $version,
        true
    );

    wp_enqueue_script(
        'gazelle-lightboxes',
        $theme_uri . '/assets/js/examples/examples.lightboxes.js',
        ['gazelle-theme'],
        $version,
        true
    );
}

add_action('wp_enqueue_scripts', 'gazelles_enqueue_assets', 20);