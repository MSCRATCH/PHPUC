<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//register_handler.php
//MMXXVI MSCRATCH

//Access only by users who are not logged in.
if (user_is_logged_in() === true) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by users who are not logged in.

if ($settings['disable_registration'] === "yes") {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['register_handler_text_1']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['register_handler_btn_1']),
]);
frontend_system_message($frontend_system_message, $settings);
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['register'])) {
if (validate_token('register', $_POST['csrf_token'])) {

$username_form = '';
if (isset($_POST['username_form'])) {
$username_form = trim($_POST['username_form']);
}

$user_password_form = '';
if (isset($_POST['user_password_form'])) {
$user_password_form = trim($_POST['user_password_form']);
}

$user_password_confirm_form = '';
if (isset($_POST['user_password_confirm_form'])) {
$user_password_confirm_form = trim($_POST['user_password_confirm_form']);
}

$user_email_form = '';
if (isset($_POST['user_email_form'])) {
$user_email_form = trim($_POST['user_email_form']);
}

$security_question_answer_form = '';
if (isset($_POST['security_question_answer_form'])) {
$security_question_answer_form = trim($_POST['security_question_answer_form']);
}

$result = register($db, $text_frontend, $username_form, $user_password_form, $user_password_confirm_form, $user_email_form, $security_question_answer_form, $settings);
if ($result === true) {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['register_handler_text_2']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['register_handler_btn_2']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
} else {
$errors = $result;
}
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['register_handler_csrf_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['register_handler_csrf_btn']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}

}
}

render_page([
'template_name' => 'register_template',
'errors'  => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout_secondary');
