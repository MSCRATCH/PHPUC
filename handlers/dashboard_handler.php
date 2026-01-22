<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//dashboard_handler.php
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

$result = get_activity_log($db);

$system_data = get_system_data($db);
$most_recent_users = get_most_recent_users($db);
$online_users = get_online_users($db);
$not_activated_users = get_not_activated_users($db);
$moderators = get_moderators($db);
$total_number_entries_activity_log = get_total_number_entries_activity_log($db);

$errors = clearing_activity_log($db, $text_backend, $total_number_entries_activity_log, $result);

render_page([
'template_name' => 'dashboard_template',
'system_data' => $system_data,
'most_recent_users' => $most_recent_users,
'online_users' => $online_users,
'not_activated_users' => $not_activated_users,
'moderators' => $moderators,
'errors' => $errors ?? [],
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'backend_templates', 'backend_theme', 'backend_layout');
