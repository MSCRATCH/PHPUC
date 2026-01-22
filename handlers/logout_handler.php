<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//logout_handler.php
//MMXXVI MSCRATCH

//Access only by logged in users.
if (user_is_logged_in() === false) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Access only by logged in users.

if (is_user() === true) {
logout();
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['logout_handler_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['logout_handler_btn']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}

if (user_is_administrator_or_moderator() === true) {
if (backend_access_is_verified() === true) {
backend_logout();
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['logout_handler_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['logout_handler_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
logout();
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_frontend['logout_handler_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_frontend['logout_handler_btn']),
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}
}
