<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_navigations.php
//MMXXVI MSCRATCH

function home_nav_item($text_backend) {
return '<li><a href="'. BASE_URL. 'home">'. $text_backend['home_nav_item']. '</a></li>';
}

function blog_nav_item($text_backend) {
return '<li><a href="'. BASE_URL. 'blog">'. $text_backend['blog_nav_item']. '</a></li>';
}

function login_nav_item($text_backend) {
if (user_is_logged_in() === false) {
return '<li><a href="'. BASE_URL. 'login">'. $text_backend['login_nav_item']. '</a></li>';
} else {
return '';
}
}

function register_nav_item($text_backend, $settings) {
if (user_is_logged_in() === false && $settings['disable_registration'] === "no") {
return '<li><a href="'. BASE_URL. 'register">'. $text_backend['register_nav_item']. '</a></li>';
} else {
return '';
}
}

function profile_nav_item() {
if (user_is_logged_in() !== false) {
$username_header = get_username();
$public_user_id_header = get_public_user_id();
return '<li><a href="' .BASE_URL. 'profile/'. sanitize_1($public_user_id_header) . '">' . sanitize_3($username_header) . '</a></li>';
} else {
return '';
}
}

function profile_settings_nav_item($text_backend) {
if (user_is_logged_in() !== false) {
return '<li><a href="'. BASE_URL. 'manage_profile">'. $text_backend['profile_settings_nav_item']. '</a></li>';
} else {
return '';
}
}

function dashboard_nav_item($text_backend) {
if (user_is_administrator() !== false) {
return '<li><a href="'. BASE_URL. 'dashboard">'. $text_backend['dashboard_nav_item']. '</a></li>';
} else {
return '';
}
}

function dashboard_moderator_nav_item($text_backend) {
if (user_is_moderator() !== false) {
return '<li><a href="'. BASE_URL. 'dashboard_moderator">'. $text_backend['dashboard_moderator_nav_item']. '</a></li>';
} else {
return '';
}
}

function logout_nav_item($text_backend) {
if (user_is_logged_in() !== false) {
return '<li><a href="'. BASE_URL. 'logout">'. $text_backend['logout_nav_item']. '</a></li>';
} else {
return '';
}
}

function dashboard_nav_moderator($text_backend) {
if (user_is_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'home"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_backend['dashboard_nav_moderator_1']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard_moderator"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_backend['dashboard_nav_moderator_2']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav_administrator($text_backend) {
if (user_is_administrator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'home"><i class="fa-solid fa-arrow-left"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_1']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'dashboard"><i class="fa-solid fa-house"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_2']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'settings"><i class="fa-solid fa-gear"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_3']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'activity_log"><i class="fa-solid fa-floppy-disk"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_4']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'error_log"><i class="fa-solid fa-bug"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_5']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'blocklist"><i class="fa-solid fa-ban"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_6']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'users"><i class="fa-solid fa-user"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_7']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'manage_contents"><i class="fa-solid fa-folder"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_8']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'manage_navigations"><i class="fa-solid fa-bars"></i>'. "&nbsp;". $text_backend['dashboard_nav_administrator_9']. '</a></li>';
return $output;
} else {
return '';
}
}

function dashboard_nav($text_backend) {
if (user_is_administrator_or_moderator() !== false) {
$output = '';
$output .= '<li><a href="' . BASE_URL . 'upload_files"><i class="fa-solid fa-cloud"></i>'. "&nbsp;". $text_backend['dashboard_nav_1']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'manage_blog"><i class="fa-solid fa-message"></i>'. "&nbsp;". $text_backend['dashboard_nav_2']. '</a></li>';
$output .= '<li><a href="' . BASE_URL . 'backend_logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>'. "&nbsp;". $text_backend['dashboard_nav_3']. '</a></li>';
return $output;
} else {
return '';
}
}

function get_primary_nav($db) {
$stmt = $db->query("SELECT primary_nav_id, primary_nav_url, primary_nav_name, primary_nav_order FROM primary_nav ORDER BY primary_nav_order ASC, primary_nav_id ASC");
$primary_nav = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($primary_nav !== false && ! empty($primary_nav)) {
return $primary_nav;
} else {
return false;
}
}

function get_secondary_nav($db) {
$stmt = $db->query("SELECT secondary_nav_id, secondary_nav_url, secondary_nav_name, secondary_nav_order FROM secondary_nav ORDER BY secondary_nav_order ASC, secondary_nav_id ASC");
$secondary_nav = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($secondary_nav !== false && ! empty($secondary_nav)) {
return $secondary_nav;
} else {
return false;
}
}

function check_primary_navigation_element_id($db, $primary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT primary_nav_id FROM primary_nav WHERE primary_nav_id = ?");
$stmt->bind_param('i', $primary_navigation_element_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}

function check_secondary_navigation_element_id($db, $secondary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT secondary_nav_id FROM secondary_nav WHERE secondary_nav_id = ?");
$stmt->bind_param('i', $secondary_navigation_element_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
}

function get_primary_navigation_element_by_id($db, $primary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT primary_nav_url, primary_nav_name, primary_nav_order FROM primary_nav WHERE primary_nav_id = ?");
$stmt->bind_param('i', $primary_navigation_element_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function get_secondary_navigation_element_by_id($db, $secondary_navigation_element_id_get) {
$stmt = $db->prepare("SELECT secondary_nav_url, secondary_nav_name, secondary_nav_order FROM secondary_nav WHERE secondary_nav_id = ?");
$stmt->bind_param('i', $secondary_navigation_element_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
}

function primary_nav($db) {
$primary_nav_elements = get_primary_nav($db);
$output_primary_nav = '';
if ($primary_nav_elements === false) {
return;
}
foreach ($primary_nav_elements as $primary_nav_element) {
$primary_nav_url  = $primary_nav_element['primary_nav_url'];
$primary_nav_name = $primary_nav_element['primary_nav_name'];
$output_primary_nav .= '<li><a href="' . BASE_URL . sanitize_1($primary_nav_url) . '">' . sanitize_1($primary_nav_name) . '</a></li>';
}
return $output_primary_nav;
}

function secondary_nav($db) {
$secondary_nav_elements = get_secondary_nav($db);
$output_secondary_nav = '';
if ($secondary_nav_elements === false) {
$output_secondary_nav .= '<li><a href="' . BASE_URL . 'home">Home</a></li>';
return $output_secondary_nav;
}
foreach ($secondary_nav_elements as $secondary_nav_element) {
$secondary_nav_url  = $secondary_nav_element['secondary_nav_url'];
$secondary_nav_name = $secondary_nav_element['secondary_nav_name'];
$output_secondary_nav .= '<li><a href="' . BASE_URL . sanitize_1($secondary_nav_url) . '">' . sanitize_1($secondary_nav_name) . '</a></li>';
}
return $output_secondary_nav;
}

function save_primary_nav_element($db, $allowed_sections, $text_backend, $primary_nav_url_form, $primary_nav_name_form, $primary_nav_order_form) {

$errors = array();

if (empty($primary_nav_url_form)) {
$errors [] = $text_backend['message_manage_navigations_no_url'];
}

if (in_array($primary_nav_url_form, $allowed_sections)) {
$errors [] = $text_backend['message_manage_navigations_invalid_url'];
}

if (empty($primary_nav_name_form)) {
$errors [] = $text_backend['message_manage_navigations_no_name'];
}

if (empty($primary_nav_order_form)) {
$errors [] = $text_backend['message_manage_navigations_no_order_value'];
}

if (! is_numeric($primary_nav_order_form)) {
$errors [] = $text_backend['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO primary_nav(primary_nav_url, primary_nav_name, primary_nav_order) VALUES(?, ?, ?)");
$stmt->bind_param('ssi', $primary_nav_url_form, $primary_nav_name_form, $primary_nav_order_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}

}

function save_secondary_nav_element($db, $allowed_sections, $text_backend, $secondary_nav_url_form, $secondary_nav_name_form, $secondary_nav_order_form) {

$errors = array();

if (empty($secondary_nav_url_form)) {
$errors [] = $text_backend['message_manage_navigations_no_url'];
}

if (in_array($secondary_nav_url_form, $allowed_sections)) {
$errors [] = $text_backend['message_manage_navigations_invalid_url'];
}

if (empty($secondary_nav_name_form)) {
$errors [] = $text_backend['message_manage_navigations_no_name'];
}

if (empty($secondary_nav_order_form)) {
$errors [] = $text_backend['message_manage_navigations_no_order_value'];
}

if (! is_numeric($secondary_nav_order_form)) {
$errors [] = $text_backend['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("INSERT INTO secondary_nav(secondary_nav_url, secondary_nav_name, secondary_nav_order) VALUES(?, ?, ?)");
$stmt->bind_param('ssi', $secondary_nav_url_form, $secondary_nav_name_form, $secondary_nav_order_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}

}


function update_primary_nav_element($db, $allowed_sections, $text_backend, $primary_nav_url_update_form, $primary_nav_name_update_form, $primary_nav_order_update_form, $primary_navigation_element_id_get) {

$errors = array();


if (empty($primary_nav_url_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_url'];
}

if (in_array($primary_nav_url_update_form, $allowed_sections)) {
$errors [] = $text_backend['message_manage_navigations_invalid_url'];
}

if (empty($primary_nav_name_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_name'];
}

if (empty($primary_nav_order_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_order_value'];
}

if (! is_numeric($primary_nav_order_update_form)) {
$errors [] = $text_backend['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE primary_nav SET primary_nav_url = ?, primary_nav_name = ?, primary_nav_order = ? WHERE primary_nav_id = ? LIMIT 1");
$stmt->bind_param('ssii', $primary_nav_url_update_form, $primary_nav_name_update_form, $primary_nav_order_update_form, $primary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}


function update_secondary_nav_element($db, $allowed_sections, $text_backend, $secondary_nav_url_update_form, $secondary_nav_name_update_form, $secondary_nav_order_update_form, $secondary_navigation_element_id_get) {

$errors = array();

if (empty($secondary_nav_url_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_url'];
}

if (in_array($secondary_nav_url_update_form, $allowed_sections)) {
$errors [] = $text_backend['message_manage_navigations_invalid_url'];
}

if (empty($secondary_nav_name_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_name'];
}

if (empty($secondary_nav_order_update_form)) {
$errors [] = $text_backend['message_manage_navigations_no_order_value'];
}

if (! is_numeric($secondary_nav_order_update_form)) {
$errors [] = $text_backend['message_manage_navigations_invalid_order_value'];
}

if (empty($errors)) {
$stmt = $db->prepare("UPDATE secondary_nav SET secondary_nav_url = ?, secondary_nav_name = ?, secondary_nav_order = ? WHERE secondary_nav_id = ? LIMIT 1");
$stmt->bind_param('ssii', $secondary_nav_url_update_form, $secondary_nav_name_update_form, $secondary_nav_order_update_form, $secondary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} else {
return $errors;
}
}

function remove_primary_nav_element($db, $primary_navigation_element_id_get) {
$stmt = $db->prepare("DELETE FROM primary_nav WHERE primary_nav_id = ? LIMIT 1");
$stmt->bind_param('i', $primary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function remove_secondary_nav_element($db, $secondary_navigation_element_id_get) {
$stmt = $db->prepare("DELETE FROM secondary_nav WHERE secondary_nav_id = ? LIMIT 1");
$stmt->bind_param('i', $secondary_navigation_element_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
