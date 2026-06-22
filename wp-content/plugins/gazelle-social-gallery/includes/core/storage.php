<?php

if (!defined('ABSPATH')) {
    exit;
}

function gazelle_sg_get_gallery($type) {

    return get_option(
        'gazelle_sg_' . $type,
        []
    );
}

function gazelle_sg_save_gallery($type, $ids) {

    $ids = array_filter(
        array_map(
            'absint',
            (array) $ids
        )
    );

    update_option(
        'gazelle_sg_' . $type,
        $ids
    );
}