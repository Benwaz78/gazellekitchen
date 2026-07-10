<?php
function gk_meal_prep_get_template($template, $args = [])
{
    if (!empty($args)) {
        extract($args, EXTR_SKIP);
    }

    $file = GMP_PATH . 'templates/' . $template . '.php';

    if (file_exists($file)) {
        include $file;
    }
}