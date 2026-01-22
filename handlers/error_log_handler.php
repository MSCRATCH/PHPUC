<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//error_log_handler.php
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

$entries_per_page = 25;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_errors = get_total_number_of_errors($db);

$number_of_pages = calculate_number_of_pages($total_number_of_errors, $entries_per_page);
$current_page = validate_page_number($total_number_of_errors, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_error_log($db, $offset, $entries_per_page);


if (isset($_POST['csrf_token'])) {
if (isset($_POST['clear_error_log'])) {
if (validate_token('clear_error_log', $_POST['csrf_token'])) {

$result_clear_error_log = clear_error_log($db, $content_id_get);
if ($result_clear_error_log === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['error_log_handler_text_1']),
'message_url'     => BASE_URL . 'error_log',
'message_button_text'  => sanitize_1($text_backend['error_log_handler_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['error_log_handler_text_2']),
'message_url'     => BASE_URL . 'error_log',
'message_button_text'  => sanitize_1($text_backend['error_log_handler_btn_2']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

render_page([
'template_name' => 'error_log_template',
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'result' => $result,
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout');
