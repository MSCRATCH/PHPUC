<?php

//This file is part of PHPUC
//index.php
//MMXXVI MSCRATCH

define('MAIN', true);

require_once '../includes/paths.php';
require_once includes_path. '/loader.php';

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
session_start ();

define('SCRIPTNAME', 'PHPUC');
define('VERSION', '2.6.1');
define('AUTHOR', 'MSCRATCH');
define('YEAR', 'MMXXV');

error_reporting(0);
ini_set('display_errors', 0);

$csp = "default-src 'self'; "
. "script-src 'self'; "
. "style-src 'self'; "
. "font-src 'self'; "
. "img-src 'self' data:;";

header("Content-Security-Policy: $csp");

$db = connect();
register_error_handler($db);
$settings = load_settings($db);
log_activity($db);
handle_file_requests($db, $text_frontend, $text_backend, $text_shared, $settings);
if (user_is_logged_in() === false) {
set_cct();
echo cct($text_shared);
} else {
$user_id_front_controller = get_user_id();
update_last_activity($db, $user_id_front_controller);
}
if (user_is_not_activated() === true) {
require_once templates_path. '/frontend_templates/message_not_activated.php';
exit();
}

front_controller($db, $settings, $allowed_sections, $text_frontend, $text_backend, $text_shared);
