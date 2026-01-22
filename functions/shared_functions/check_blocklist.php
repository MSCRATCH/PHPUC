<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//check_blocklist.php
//MMXXVI MSCRATCH

function load_blocklist($db) {
$stmt = $db->query("SELECT blocklist_id, blocklist_value FROM blocklist");
$blocklist = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($blocklist !== false) {
return $blocklist;
} else {
die("A critical error occurred while processing your registration.");
}
}

function check_blocklist($db, $text_shared, $user_email_form, $username_form) {

$errors_blocklist = array();
$blocklist = load_blocklist($db);

if (empty($blocklist)) {
return $errors_blocklist;
} else {

list($email_name_form, $domain_name_form) = explode('@', $user_email_form);

foreach ($blocklist as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
switch ($type) {
case 'name':
if ($email_name_form === $value) {
$errors_blocklist[] = $text_shared['message_blocklist_invalid_email_name'];
}
break;
case 'domain':
if ($domain_name_form === $value) {
$errors_blocklist[] = $text_shared['message_blocklist_invalid_domain_name'];
}
break;
case 'email':
if ($user_email_form === $value) {
$errors_blocklist[] = $text_shared['message_blocklist_invalid_email_address'];
}
break;
case 'username':
if ($username_form === $value) {
$errors_blocklist[] = $text_shared['message_blocklist_invalid_username'];
}
break;
}
}
}
return $errors_blocklist;
}
