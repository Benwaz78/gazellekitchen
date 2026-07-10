<?php

defined('ABSPATH') || exit;

/**
 * Get Thank You Page URL
 *
 * Creates the page automatically if it doesn't exist.
 */
function gk_get_thank_you_page_url()
{
    $page_id = get_option('gk_thank_you_page_id', 0);

    /*
    |--------------------------------------------------------------------------
    | Page already exists
    |--------------------------------------------------------------------------
    */

    if ($page_id && get_post($page_id)) {
        return get_permalink($page_id);
    }

    /*
    |--------------------------------------------------------------------------
    | Maybe the page exists but the option was never saved
    |--------------------------------------------------------------------------
    */

    $page = get_page_by_path('catering-thank-you');

    if ($page) {

        update_option(
            'gk_thank_you_page_id',
            $page->ID
        );

        return get_permalink($page->ID);
    }

    /*
    |--------------------------------------------------------------------------
    | Create the page
    |--------------------------------------------------------------------------
    */

    $page_id = wp_insert_post([
        'post_title'   => 'Catering Thank You',
        'post_name'    => 'catering-thank-you',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_content' => '[gk_catering_thank_you]',
    ]);

    if (is_wp_error($page_id)) {
        return home_url('/');
    }

    /*
    |--------------------------------------------------------------------------
    | Save page ID for future use
    |--------------------------------------------------------------------------
    */

    update_option(
        'gk_thank_you_page_id',
        $page_id
    );

    return get_permalink($page_id);
}