<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//front_controller.php
//MMXXVI MSCRATCH

function front_controller($db, $settings, $allowed_sections, $text_frontend, $text_backend, $text_shared) {

$section = $_GET['p'] ?? 'home';
$section = basename($section);

if (in_array($section, $allowed_sections, true)) {
$file = handlers_path . "/{$section}_handler.php";
$real = realpath($file);

if ($real && str_starts_with($real, realpath(handlers_path)) && file_exists($real)) {
require_once $real;
return;
} else {
require_once handlers_path . '/home_handler.php';
return;
}
}

$custom_content = get_custom_content($db, $section);

if ($custom_content !== false) {
render_page([
'template_name' => 'contents_template',
'custom_content' => $custom_content,
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout');
return;
}

require_once handlers_path . '/home_handler.php';
}
