<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_profile_handler.php
//MMXXVI MSCRATCH

//Access only by users who are logged in.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by users who are logged in.

if (user_is_logged_in() === true) {
$profile_user_id = get_user_id();
}

$profile = get_profile_by_id($db, $profile_user_id);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_profile'])) {
if (validate_token('update_profile', $_POST['csrf_token'])) {

$user_profile_location_form = '';
if (isset($_POST['user_profile_location_form'])) {
$user_profile_location_form = trim($_POST['user_profile_location_form']);
}

$user_profile_description_form = '';
if (isset($_POST['user_profile_description_form'])) {
$user_profile_description_form = trim($_POST['user_profile_description_form']);
}

$result = update_profile($db, $user_profile_location_form, $user_profile_description_form, $profile_user_id);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['manage_profile_handler_text_1']),
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => sanitize_1($text_frontend['manage_profile_handler_btn_1']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['manage_profile_handler_csrf_text']),
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => sanitize_1($text_frontend['manage_profile_handler_csrf_btn']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}
}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['upload_user_profile_image'])) {
if (validate_token('upload_user_profile_image', $_POST['csrf_token'])) {

$profile_image_file = '';
if (isset($_FILES['user_profile_image'])) {
$profile_image_file = $_FILES['user_profile_image'];
}

$result = upload_profile_image($db, $text_frontend, $profile_image_file, $profile_user_id);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['manage_profile_handler_text_2']),
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => sanitize_1($text_frontend['manage_profile_handler_btn_2']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
} else {
$errors = $result;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['manage_profile_handler_csrf_text']),
'message_url'     => BASE_URL . 'manage_profile',
'message_button_text'  => sanitize_1($text_frontend['manage_profile_handler_csrf_btn']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}
}
}

render_page([
'template_name' => 'manage_profile_template',
'profile'  => $profile,
'errors'  => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout');
