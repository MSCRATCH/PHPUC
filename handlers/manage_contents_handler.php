<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_contents_handler.php
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

$content_id_get = '';
if (isset($_GET['content'])) {
$content_id_get = (INT) $_GET['content'];
}

if (isset($content_id_get) && ! empty($content_id_get)) {

$result_check_custom_content_id = check_custom_content_id($db, $content_id_get);

if ($result_check_custom_content_id === false) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_text_1']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_btn_1']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

$content = get_content_by_id($db, $content_id_get);

}

$contents = get_contents($db);
$uploaded_files = get_latest_uploaded_files($db);

if (isset($_POST['csrf_token'])) {
if (isset($_POST['save_content'])) {
if (validate_token('save_content', $_POST['csrf_token'])) {

$custom_content_url_form = '';
if (isset($_POST['custom_content_url_form'])) {
$custom_content_url_form = make_safe_url($_POST['custom_content_url_form']);
}

$custom_content_title_form = '';
if (isset($_POST['custom_content_title_form'])) {
$custom_content_title_form = trim($_POST['custom_content_title_form']);
}

$custom_content_form = '';
if (isset($_POST['custom_content_form'])) {
$custom_content_form = trim($_POST['custom_content_form']);
}

$result_save_custom_content = save_custom_content($db, $allowed_sections, $text_backend, $custom_content_url_form, $custom_content_title_form, $custom_content_form);
if ($result_save_custom_content === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_text_2']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_btn_2']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
$errors = $result_save_custom_content;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_csrf_text']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['update_content'])) {
if (validate_token('update_content', $_POST['csrf_token'])) {

$custom_content_url_update_form = '';
if (isset($_POST['custom_content_url_update_form'])) {
$custom_content_url_update_form = make_safe_url($_POST['custom_content_url_update_form']);
}

$custom_content_title_update_form = '';
if (isset($_POST['custom_content_title_update_form'])) {
$custom_content_title_update_form = trim($_POST['custom_content_title_update_form']);
}

$custom_content_update_form = '';
if (isset($_POST['custom_content_update_form'])) {
$custom_content_update_form = trim($_POST['custom_content_update_form']);
}

$result_update_custom_content = update_custom_content($db, $allowed_sections, $text_backend, $custom_content_url_update_form, $custom_content_title_update_form, $custom_content_update_form, $content_id_get);
if ($result_update_custom_content === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_text_3']),
'message_url'     => BASE_URL . 'manage_contents/content/' . $content_id_get,
'message_button_text'  => sanitize_1($text_backend['manage_contents_btn_3']),
]);
backend_system_message($backend_system_message, $settings);
exit();
} else {
$errors = $result_update_custom_content;
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_csrf_text']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

if (isset($_POST['csrf_token'])) {
if (isset($_POST['remove_content'])) {
if (validate_token('remove_content', $_POST['csrf_token'])) {

$result_remove_custom_content = remove_custom_content($db, $content_id_get);
if ($result_remove_custom_content === true) {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_text_4']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_btn_4']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}
} else {
$backend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => sanitize_1($text_backend['manage_contents_csrf_text']),
'message_url'     => BASE_URL . 'manage_contents',
'message_button_text'  => sanitize_1($text_backend['manage_contents_csrf_btn']),
]);
backend_system_message($backend_system_message, $settings);
exit();
}

}
}

render_page([
'template_name' => 'manage_contents_template',
'content_id_get' => $content_id_get ?? null,
'content' => $content ?? false,
'contents' => $contents,
'uploaded_files' => $uploaded_files,
'errors'  => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout');
