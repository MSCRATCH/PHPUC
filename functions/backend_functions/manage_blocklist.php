<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//manage_blocklist.php
//MMXXVI MSCRATCH

function get_blocklist($db) {
$stmt = $db->query("SELECT blocklist_id, blocklist_value FROM blocklist");
$blocklist = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($blocklist !== false && ! empty($blocklist)) {
return $blocklist;
} else {
return false;
}
}

function get_blocklist_usernames($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_usernames = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "username") {
$blocklist_usernames [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_usernames)) {
return $blocklist_usernames;
} else {
return false;
}
} else {
return false;
}
}

function get_blocklist_names($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_names = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "name") {
$blocklist_names [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_names)) {
return $blocklist_names;
} else {
return false;
}
} else {
return false;
}
}

function get_blocklist_emails($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_emails = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "email") {
$blocklist_emails [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_emails)) {
return $blocklist_emails;
} else {
return false;
}
} else {
return false;
}
}

function get_blocklist_domains($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_domains = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "domain") {
$blocklist_domains [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_domains)) {
return $blocklist_domains;
} else {
return false;
}
} else {
return false;
}
}

function get_blocklist_id($db, $blocklist_value_remove) {
$stmt = $db->prepare("SELECT blocklist_id FROM blocklist WHERE blocklist_value = ?");
$stmt->bind_param('s', $blocklist_value_remove);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 1) {
$stmt->bind_result($blocklist_id);
$stmt->fetch();
$stmt->close();
return $blocklist_id;
} else {
return false;
}
}

function save_blocklist_entry($db, $blocklist_entry_form) {
$stmt = $db->prepare("INSERT INTO blocklist(blocklist_value) VALUES(?) ON DUPLICATE KEY UPDATE blocklist_value = VALUES(blocklist_value)");
$stmt->bind_param('s', $blocklist_entry_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function remove_blocklist_entry($db, $blocklist_id) {
$stmt = $db->prepare("DELETE FROM blocklist WHERE blocklist_id = ? LIMIT 1");
$stmt->bind_param('i', $blocklist_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}

function manage_blocklist($db, $text_backend, $blocklist_command) {

$errors = array();

$allowed_commands = array(
'save',
'remove',
);

$allowed_types = array(
'username',
'domain',
'email',
'name',
);

if (empty($blocklist_command)) {
$errors [] = $text_backend['message_manage_blocklist_no_value'];
return $errors;
}

$parts = explode('_', $blocklist_command, 3);

if (count($parts) !== 3) {
$errors [] = $text_backend['message_manage_blocklist_invalid_format'];
return $errors;
}

list($command, $type, $value) = $parts;


if (! in_array($command, $allowed_commands)) {
$errors [] = $text_backend['message_manage_blocklist_invalid_command'];
}

if (! in_array($type, $allowed_types)) {
$errors [] = $text_backend['message_manage_blocklist_invalid_type'];
}

$command = trim($command);
$type = trim($type);
$value = trim($value);

switch ($type) {
case 'username':
if (! preg_match('/^[a-zA-Z0-9]+$/', $value)) {
$errors[] = $text_backend['message_manage_blocklist_invalid_value_username'];
}
break;
case 'name':
if (! preg_match('/^[a-zA-Z]+$/', $value)) {
$errors[] = $text_backend['message_manage_blocklist_invalid_value_name'];
}
break;
case 'email':
if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
$errors[] = $text_backend['message_manage_blocklist_invalid_value_email'];
}
break;
case 'domain':
if (! preg_match('/^[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', $value)) {
$errors[] = $text_backend['message_manage_blocklist_invalid_value_domain'];
}
break;
}

if (empty($errors)) {
switch ($command) {
case 'remove':
$value_remove = $type. '_'. $value;
$blocklist_id = get_blocklist_id($db, $value_remove);
if ($blocklist_id === false) {
$errors [] = $text_backend['message_manage_blocklist_no_existing_value'];
} else {
$result_remove = remove_blocklist_entry($db, $blocklist_id);
if ($result_remove === false) {
$errors [] = $text_backend['message_manage_blocklist_remove_stmt_failed'];
}
}
break;
case 'save':
$value_save = $type. '_'. $value;
$result_save = save_blocklist_entry($db, $value_save);
if ($result_save === false) {
$errors [] = $text_backend['message_manage_blocklist_save_stmt_failed'];
}
break;
}
}
if (empty($errors)) {
return true;
} else {
return $errors;
}
}
