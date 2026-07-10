<?php
function gk_meal_prep_order_number($post_id)
{
    return 'MP-' . str_pad(
        $post_id,
        6,
        '0',
        STR_PAD_LEFT
    );
}


function gk_meal_prep_status_badge($status)
{
    $statuses = [

        'new' => [
            'label' => 'New',
            'background' => '#E8F5E9',
            'color' => '#2E7D32'
        ],

        'contacted' => [
            'label' => 'Contacted',
            'background' => '#FFF3E0',
            'color' => '#EF6C00'
        ],

        'scheduled' => [
            'label' => 'Scheduled',
            'background' => '#E3F2FD',
            'color' => '#1565C0'
        ],

        'delivered' => [
            'label' => 'Delivered',
            'background' => '#E8F5E9',
            'color' => '#1B5E20'
        ],

        'cancelled' => [
            'label' => 'Cancelled',
            'background' => '#FFEBEE',
            'color' => '#C62828'
        ],

    ];

    if (!isset($statuses[$status])) {
        $status = 'new';
    }

    $badge = $statuses[$status];

    printf(
        '<span style="
            display:inline-block;
            padding:4px 10px;
            border-radius:20px;
            background:%s;
            color:%s;
            font-weight:600;
            font-size:12px;
        ">%s</span>',
        esc_attr($badge['background']),
        esc_attr($badge['color']),
        esc_html($badge['label'])
    );
}

function gk_meal_prep_customer_whatsapp($post_id)
{
    $phone = get_post_meta($post_id, '_phone', true);

    if (!$phone) {
        return '';
    }

    $phone = preg_replace('/[^0-9]/', '', $phone);

    $name = get_post_meta($post_id, '_fullname', true);

    $message = sprintf(
        "Hello %s,\n\nThis is Gazelle Kitchen regarding your Meal Prep order %s.\n\nPlease let us know if you have any questions.",
        $name,
        gk_meal_prep_order_number($post_id)
    );

    return sprintf(
        'https://wa.me/%s?text=%s',
        $phone,
        rawurlencode($message)
    );
}

add_filter(
    'post_row_actions',
    'gk_meal_prep_row_actions',
    10,
    2
);

function gk_meal_prep_row_actions($actions, $post)
{
    if ($post->post_type !== 'gk_meal_prep_order') {
        return $actions;
    }

    $url = gk_meal_prep_customer_whatsapp($post->ID);

    if ($url) {

        $actions['whatsapp'] = sprintf(
            '<a href="%s" target="_blank" rel="noopener noreferrer">WhatsApp</a>',
            esc_url($url)
        );

    }

    return $actions;
}