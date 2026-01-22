<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//page_content.php
//MMXXVI MSCRATCH

function render_page(array $page_view = [], $db, $settings, $text_frontend, $text_backend, $text_shared, string $area, string $theme, string $layout) {

ob_start();
extract($page_view, EXTR_SKIP);
$template_path = templates_path . "/$area/{$template_name}.php";
$real_template_path = realpath($template_path);

if ($real_template_path && str_starts_with($real_template_path, realpath(templates_path)) && file_exists($real_template_path)) {
require $real_template_path;
} else {
die("A critical error occurred while loading the respective template.");
}
$content = ob_get_clean();

$data = [
'content' => $content,
'page_title' => $settings['page_title'],
'page_description' => $settings['page_description'],
'page_keywords' => $settings['page_keywords'],
'footer_text' => $settings['footer_text'],
'primary_nav' => primary_nav($db),
'secondary_nav' => secondary_nav($db),
'home_nav_item' => home_nav_item($text_backend),
'blog_nav_item' => blog_nav_item($text_backend),
'login_nav_item' => login_nav_item($text_backend),
'register_nav_item' => register_nav_item($text_backend, $settings),
'profile_nav_item' => profile_nav_item(),
'profile_settings_nav_item' => profile_settings_nav_item($text_backend),
'dashboard_nav_item' => dashboard_nav_item($text_backend),
'dashboard_moderator_nav_item' => dashboard_moderator_nav_item($text_backend),
'logout_nav_item' => logout_nav_item($text_backend),
'dashboard_nav_moderator' => dashboard_nav_moderator($text_backend),
'dashboard_nav_administrator' => dashboard_nav_administrator($text_backend),
'dashboard_nav' => dashboard_nav($text_backend),
'script_name' => SCRIPTNAME,
'script_version' => VERSION,
'script_author' => AUTHOR,
'base_url' => BASE_URL,
];

$layout_path = themes_path . "/$theme/{$layout}.php";
$real_layout = realpath($layout_path);

if ($real_layout && str_starts_with($real_layout, realpath(themes_path)) && file_exists($real_layout)) {
ob_start();
require $real_layout;
$layout_html = ob_get_clean();

foreach ($data as $key => $value) {
$layout_html = str_replace('{' . $key . '}', (string)$value, $layout_html);
}
echo $layout_html;
} else {
die("A critical error occurred while loading the respective layout.");
}
}
