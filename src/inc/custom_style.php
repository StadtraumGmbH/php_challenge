<?php
if (!defined('IS_PAGE')) {
    exit('Direct script access denied.');
}

function get_custom_style_content_for_city($city) {
    require_once dirname(__FILE__). '/../config.php';
    global $custom_styles;

    if (isset($custom_styles[$city]))  {
        get_custom_style_content($custom_styles[$city]);
    }
}

function get_custom_style_content($name) {
    $filePath = dirname(__FILE__). "/../templates/${name}.style.php";
    if(file_exists($filePath)) {
        require_once $filePath;
    }
}
