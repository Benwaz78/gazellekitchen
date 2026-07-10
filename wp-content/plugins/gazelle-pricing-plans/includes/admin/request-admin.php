<?php

defined('ABSPATH') || exit;

add_action(
    'admin_menu',
    'gpp_remove_request_editor'
);

function gpp_remove_request_editor()
{
    remove_post_type_support(
        'gpp_catering_request',
        'editor'
    );

    remove_post_type_support(
        'gpp_catering_request',
        'thumbnail'
    );

    remove_post_type_support(
        'gpp_catering_request',
        'excerpt'
    );
}