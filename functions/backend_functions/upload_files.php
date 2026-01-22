<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//upload_files.php
//MMXXVI MSCRATCH

function get_total_number_of_uploaded_files_by_user($db, $user_id_upload_files){
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT COUNT(*) AS count_result FROM files");
$row = $stmt->fetch_assoc();
$stmt->free();
return $row['count_result'];
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT COUNT(*) AS count_result FROM files WHERE file_user_id = ?");
$stmt->bind_param('i', $user_id_upload_files);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
return $row['count_result'];
}
}

function get_paginated_uploaded_files_by_user($db, $offset, $entries_per_page, $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT file_id, file_name, file_title FROM files ORDER BY file_id DESC LIMIT ?, ?");
$stmt->bind_param('ii', $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_id, file_name, file_title FROM files WHERE file_user_id = ? ORDER BY file_id DESC LIMIT ?, ?");
$stmt->bind_param('iii', $user_id_upload_files, $offset, $entries_per_page);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}
}

function check_file_id_by_user($db, $file_id_get, $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT file_id FROM files WHERE file_id = ?");
$stmt->bind_param('i', $file_id_get);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows !== 1) {
$stmt->close();
return false;
} else {
$stmt->close();
return true;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_id FROM files WHERE file_id = ? AND file_user_id = ?");
$stmt->bind_param('ii', $file_id_get, $user_id_upload_files);
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
}

function get_uploaded_files_by_id_and_by_user($db, $file_id_get, $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("SELECT files.file_name, files.file_title, files.file_description, users.username, users.public_id FROM files INNER JOIN users ON files.file_user_id = users.user_id WHERE files.file_id = ?");
$stmt->bind_param('i', $file_id_get);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
$stmt->close();
return $row;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_name, file_title, file_description FROM files WHERE file_id = ? AND file_user_id = ?");
$stmt->bind_param('ii', $file_id_get, $user_id_upload_files);
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
}

function get_latest_uploaded_files_by_user($db, $user_id_blog_post) {
if (user_is_administrator() === true) {
$stmt = $db->query("SELECT file_name, file_title FROM files ORDER BY file_id DESC LIMIT 15");
$uploaded_files = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("SELECT file_name, file_title FROM files WHERE file_user_id = ? ORDER BY file_id DESC LIMIT 15");
$stmt->bind_param('i', $user_id_blog_post);
$stmt->execute();
$result = $stmt->get_result();
$uploaded_files = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}
}

function get_latest_uploaded_files($db) {
$stmt = $db->query("SELECT file_name, file_title FROM files ORDER BY file_id DESC LIMIT 15");
$uploaded_files = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($uploaded_files !== false && ! empty($uploaded_files)) {
return $uploaded_files;
} else {
return false;
}
}

function get_uploaded_file_by_file_name($db, $file) {
$stmt = $db->prepare("SELECT file_name, file_title, file_description FROM files WHERE file_name = ?");
$stmt->bind_param('s', $file);
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

function update_file_data($db, $file_title_update_form, $file_description_update_form, $file_id_get, $user_id_upload_files) {
if (user_is_administrator() === true) {
$stmt = $db->prepare("UPDATE files SET file_title = ?, file_description = ?  WHERE file_id = ? LIMIT 1");
$stmt->bind_param('ssi', $file_title_update_form, $file_description_update_form, $file_id_get);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$stmt = $db->prepare("UPDATE files SET file_title = ?, file_description = ?  WHERE file_id = ? AND file_user_id = ? LIMIT 1");
$stmt->bind_param('ssii', $file_title_update_form, $file_description_update_form, $file_id_get, $user_id_upload_files);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
}

function remove_file($db, $file_id_get, $user_id_upload_files) {
$result = get_uploaded_files_by_id_and_by_user($db, $file_id_get, $user_id_upload_files);
if (user_is_administrator() === true) {
$file_name = $result['file_name'];
$stmt = $db->prepare("DELETE FROM files WHERE file_id = ? LIMIT 1");
$stmt->bind_param('i', $file_id_get);
if ($stmt->execute()) {
$stmt->close();
$file_path = files_path. '/' . basename($file_name);
if (file_exists($file_path)) {
unlink($file_path);
}
return true;
} else {
$stmt->close();
return false;
}
} elseif (user_is_moderator() === true) {
$file_name = $result['file_name'];
$stmt = $db->prepare("DELETE FROM files WHERE file_id = ? AND file_user_id = ? LIMIT 1");
$stmt->bind_param('ii', $file_id_get, $user_id_upload_files);
if ($stmt->execute()) {
$stmt->close();
$file_path = files_path. '/' . basename($file_name);
if (file_exists($file_path)) {
unlink($file_path);
}
return true;
} else {
$stmt->close();
return false;
}
}
}

function create_new_file_name($file_name) {
$new_file_name = uniqid();
$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
return $result = $new_file_name.  "." . $file_extension;
}

function upload_file_data($db, $new_file_name, $file_title_form, $file_description_form, $user_id_upload_files) {
$stmt = $db->prepare("INSERT INTO files(file_name, file_title, file_description, file_user_id) VALUES(?, ?, ?, ?)");
$stmt->bind_param('sssi', $new_file_name, $file_title_form, $file_description_form, $user_id_upload_files);
$stmt->execute();
$stmt->store_result();
if ($stmt->affected_rows === 1) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function validate_file($uploaded_file, $text_backend, $allowed_extensions, $file_title_form, $file_description_form, $allowed_mime_types, $maximum_file_size, $file_name, $file_error, $file_size, $file_type, $file_tmp_name) {

$errors = array();

if (isset($uploaded_file) && is_array($uploaded_file)) {
if ($uploaded_file['error'] !== UPLOAD_ERR_OK) {
if ($uploaded_file['error'] === UPLOAD_ERR_NO_FILE) {
$errors [] = $text_backend['message_upload_files_no_file'];
}
return $errors;
}

if (empty($file_title_form)) {
$errors [] = $text_backend['message_upload_files_no_file_title'];
}

if (empty($file_description_form)) {
$errors [] = $text_backend['message_upload_files_no_file_description'];
}

$file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
if (! in_array(strtolower($file_extension), $allowed_extensions)) {
$errors [] = $text_backend['message_upload_files_invalid_extension'];
}

if ($file_size > $maximum_file_size) {
$errors [] = $text_backend['message_upload_files_invalid_size'];
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$real_mime = finfo_file($finfo, $file_tmp_name);
finfo_close($finfo);

if (! in_array($real_mime, $allowed_mime_types)) {
$errors[] = $text_backend['message_upload_files_invalid_type'];
}
return $errors;
}
}

function upload_file($db, $text_backend, $file_title_form, $file_description_form, $uploaded_file, $user_id_upload_files) {

$allowed_extensions = [
'zip',
'rar',
'jpg',
'jpeg',
'png',
];

$allowed_mime_types = [
'application/zip',
'application/x-zip-compressed',
'multipart/x-zip',
'application/x-rar',
'application/x-rar-compressed',
'application/vnd.rar',
'image/jpeg',
'image/png',
];

$maximum_file_size = 2.5 * 1024 * 1024;

$file_name = $uploaded_file['name'];
$file_error = $uploaded_file['error'];
$file_size = $uploaded_file['size'];
$file_type = $uploaded_file['type'];
$file_tmp_name = $uploaded_file['tmp_name'];

$errors = validate_file($uploaded_file, $text_backend, $allowed_extensions, $file_title_form, $file_description_form, $allowed_mime_types, $maximum_file_size, $file_name, $file_error, $file_size, $file_type, $file_tmp_name);

if (empty($errors)) {
$new_file_name = create_new_file_name($file_name);
$success_upload_file_data = upload_file_data($db, $new_file_name, $file_title_form, $file_description_form, $user_id_upload_files);
$upload_path = files_path. '/' . basename($new_file_name);
if ($success_upload_file_data !== false && move_uploaded_file ($file_tmp_name , $upload_path)) {
return true;
} else {
return false;
}
} else {
return $errors;
}
}
