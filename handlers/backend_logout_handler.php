<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//backend_logout_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'home');
exit();
}
//Administrator or moderator access only.

if (backend_access_is_verified() === false) {
logout();
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['backend_logout_handler_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_backend['backend_logout_handler_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
backend_logout();
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['backend_logout_handler_text']),
'message_url'     => BASE_URL . 'home',
'message_button_text'  => sanitize_1($text_backend['backend_logout_handler_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
