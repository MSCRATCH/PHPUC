<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//backend_login_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === true) {
header('Location:'. BASE_URL. 'dashboard');
exit();
}
//Administrator or moderator access only.

if (isset($_POST['csrf_token'])) {
if (isset($_POST['backend_login'])) {
if (validate_token('backend_login', $_POST['csrf_token'])) {

$backend_login_name_form = '';
if (isset($_POST['backend_login_name_form'])) {
$backend_login_name_form = trim($_POST['backend_login_name_form']);
}

$backend_login_password_form = '';
if (isset($_POST['backend_login_password_form'])) {
$backend_login_password_form = trim($_POST['backend_login_password_form']);
}

$result = backend_login($db, $text_backend, $backend_login_name_form, $backend_login_password_form);
if ($result === true) {
if (user_is_administrator() === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['backend_login_handler_text_1']),
'message_url'     => BASE_URL . 'dashboard',
'message_button_text'  => sanitize_1($text_backend['backend_login_handler_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
if (user_is_moderator() === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['backend_login_handler_text_1']),
'message_url'     => BASE_URL . 'dashboard_moderator',
'message_button_text'  => sanitize_1($text_backend['backend_login_handler_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
} else {
$errors = $result;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['backend_login_handler_text_2']),
'message_url'     => BASE_URL . 'backend_login',
'message_button_text'  => sanitize_1($text_backend['backend_login_handler_btn_2']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
}
}

render_page([
'template_name' => 'backend_login_template',
'errors'        => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout_secondary');
