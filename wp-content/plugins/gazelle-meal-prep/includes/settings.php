<?php

defined('ABSPATH') || exit;

add_action(
    'admin_menu',
    'gk_meal_prep_settings_menu'
);

function gk_meal_prep_settings_menu()
{
    add_submenu_page(
        'edit.php?post_type=gk_meal_prep_order',
        'Meal Prep Settings',
        'Settings',
        'manage_options',
        'gk-meal-prep-settings',
        'gk_meal_prep_settings_page'
    );
}

add_action(
    'admin_init',
    'gk_meal_prep_register_settings'
);

function gk_meal_prep_register_settings()
{
    register_setting(
    'gk_meal_prep_settings',
    'gk_meal_prep_page'
   );
    
    register_setting(
        'gk_meal_prep_settings',
        'gk_meal_prep_thank_you_page'
    );
}

function gk_meal_prep_settings_page()
{
    ?>

    <div class="wrap">
        <h1>Meal Prep Settings</h1>

        <form method="post" action="options.php">

    <?php settings_fields('gk_meal_prep_settings'); ?>

    <table class="form-table">

        <tr>
            <th scope="row">
                Meal Prep Page
            </th>
            <td>

                <?php
                wp_dropdown_pages([
                    'name'             => 'gk_meal_prep_page',
                    'selected'         => get_option('gk_meal_prep_page'),
                    'show_option_none' => '-- Select Page --',
                ]);
                ?>

            </td>
        </tr>

        <tr>
            <th scope="row">
                Thank You Page
            </th>
            <td>

                <?php
                wp_dropdown_pages([
                    'name'             => 'gk_meal_prep_thank_you_page',
                    'selected'         => get_option('gk_meal_prep_thank_you_page'),
                    'show_option_none' => '-- Select Page --',
                ]);
                ?>

            </td>
        </tr>

    </table>

    <?php submit_button(); ?>

</form>

    </div>

    <?php
}