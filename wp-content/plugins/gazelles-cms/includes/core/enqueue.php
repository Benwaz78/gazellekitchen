<?php
add_action('admin_enqueue_scripts', function ($hook) {

    if (!in_array($hook, ['post.php', 'post-new.php'])) return;

    global $post;

    if (!$post || $post->post_type !== 'page') return;

    wp_enqueue_media();

    wp_enqueue_script(
        'gcm-homepage',
        GAZELLES_CMS_URL . 'assets/js/homepage.js',
        ['jquery'],
        '1.0',
        true
    );
});