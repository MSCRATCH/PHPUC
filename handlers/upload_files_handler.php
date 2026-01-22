<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//upload_files_handler.php
//MMXXVI MSCRATCH

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location:'. BASE_URL. 'login');
exit();
}

if (backend_access_is_verified() === false) {
header('Location:'. BASE_URL. 'backend_login');
exit();
}

if (user_is_logged_in() !== false) {
$user_id_upload_files = get_user_id();
}
//Administrator or moderator access only.

$file_id_get = '';
if (isset($_GET['file_id'])) {
$file_id_get = (INT) $_GET['file_id'];
}

if (isset($file_id_get) && ! empty($file_id_get)) {

$result_check_file_id = check_file_id_by_user($db, $file_id_get, $user_id_upload_files);

if ($result_check_file_id === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_text_1']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

$file_data = get_uploaded_files_by_id_and_by_user($db, $file_id_get, $user_id_upload_files);

}

$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_uploaded_files = get_total_number_of_uploaded_files_by_user($db, $user_id_upload_files);

$number_of_pages = calculate_number_of_pages($total_number_of_uploaded_files, $entries_per_page);
$current_page = validate_page_number($total_number_of_uploaded_files, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_uploaded_files_by_user($db, $offset, $entries_per_page, $user_id_upload_files);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['upload_file'])) {
if (validate_token('upload_file', $_POST['csrf_token'])) {

$file_title_form = '';
if (isset($_POST['file_title_form'])) {
$file_title_form = trim($_POST['file_title_form']);
}

$file_description_form = '';
if (isset($_POST['file_description_form'])) {
$file_description_form = trim($_POST['file_description_form']);
}

$uploaded_file = '';
if (isset($_FILES['uploaded_file']) && is_array($_FILES['uploaded_file'])) {
$uploaded_file = $_FILES['uploaded_file'];
}

$result_upload_file = upload_file($db, $text_backend, $file_title_form, $file_description_form, $uploaded_file, $user_id_upload_files);
if ($result_upload_file === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_text_2']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_btn_2']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
$errors = $result_upload_file;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_csrf_text']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_file'])) {
if (validate_token('update_file', $_POST['csrf_token'])) {

$file_title_update_form = '';
if (isset($_POST['file_title_update_form'])) {
$file_title_update_form = trim($_POST['file_title_update_form']);
}

$file_description_update_form = '';
if (isset($_POST['file_description_update_form'])) {
$file_description_update_form = trim($_POST['file_description_update_form']);
}

$result_update_file = update_file_data($db, $file_title_update_form, $file_description_update_form, $file_id_get, $user_id_upload_files);
if ($result_update_file === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_text_3']),
'message_url'     => BASE_URL . 'upload_files/file/' . $file_id_get,
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_btn_3']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
$errors = $result_upload_file;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_csrf_text']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_file'])) {
if (validate_token('remove_file', $_POST['csrf_token'])) {

$result_remove_file = remove_file($db, $file_id_get, $user_id_upload_files);
if ($result_remove_file === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_text_4']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_btn_4']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['upload_files_handler_csrf_text']),
'message_url'     => BASE_URL . 'upload_files',
'message_button_text'  => sanitize_1($text_backend['upload_files_handler_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}


render_page([
'template_name' => 'upload_files_template',
'file_id_get' => $file_id_get ?? null,
'file_data' => $file_data ?? false,
'result'        => $result,
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'errors'        => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout');
