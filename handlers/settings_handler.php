<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//settings_handler.php
//MMXXVI MSCRATCH

//Administrator access only.
if (user_is_administrator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}
//Administrator access only.

$settings_from_db = get_settings_from_db($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['submit_settings'])) {
if (validate_token('submit_settings', $_POST['csrf_token'])) {

$settings_form = '';
if (isset($_POST['settings_form'])) {
$settings_form = $_POST['settings_form'];
}

$result = update_setting($db, $text_backend, $settings_form);

if ($result === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['settings_handler_text_1']),
'message_url'     => BASE_URL . 'settings',
'message_button_text'  => sanitize_1($text_backend['settings_handler_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
$errors = $result;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['settings_handler_text_2']),
'message_url'     => BASE_URL . 'settings',
'message_button_text'  => sanitize_1($text_backend['settings_handler_btn_2']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

render_page([
'template_name' => 'settings_template',
'settings_from_db' => $settings_from_db,
'errors' => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout');
