<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//profile_handler.php
//MMXXVI MSCRATCH

$public_user_id_get = '';
if (isset($_GET['id'])) {
$public_user_id_get = $_GET['id'];
}

$result = check_public_user_id($db, $public_user_id_get);

if ($result === false) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['profile_handler_text_1']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['profile_handler_btn_1']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}

$profile = get_profile_by_public_user_id($db, $public_user_id_get);

if ($profile['user_level'] === "not_activated") {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['profile_handler_text_2']),
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => sanitize_1($text_frontend['profile_handler_btn_2']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}

render_page([
'template_name' => 'profile_template',
'profile' => $profile,
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout');
