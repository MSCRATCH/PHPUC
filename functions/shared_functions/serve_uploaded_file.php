<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//serve_uploaded_file.php
//MMXXVI MSCRATCH

function serve_uploaded_file($db, $text_frontend, $text_backend, $text_shared, $file, $settings) {
$file = basename($file);
$real = realpath(files_path . '/' . $file);

if (! $real || ! str_starts_with($real, realpath(files_path)) || ! file_exists($real)) {
http_response_code(404);
die("The requested file could not be found.");
}

$ext = strtolower(pathinfo($real, PATHINFO_EXTENSION));

if (in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
header('Content-Type: image/' . ($ext === 'png' ? 'png' : 'jpeg'));
header('Content-Disposition: inline; filename="' . $file . '"');
header('Content-Length: ' . filesize($real));
readfile($real);
exit();
}

if (in_array($ext, ['zip', 'rar'], true)) {
$file_data = get_uploaded_file_by_file_name($db, $file);

if ($file_data === false) {
http_response_code(404);
die("The requested file could not be found.");
}

if (isset($_POST['csrf_token'])) {
if (validate_token('download_file', $_POST['csrf_token'])) {
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Length: ' . filesize($real));
readfile($real);
exit();
} else {
$frontend_system_message = ([
'message_wrapper' => 'wrapper_narrow_bg',
'message_text'    => 'Your session has been terminated for security reasons.',
'message_url'     => BASE_URL . 'home',
'message_button_text'  => 'Return',
]);
frontend_system_message($frontend_system_message, $settings);
exit();
}
}
require templates_path . "/frontend_templates/serve_uploaded_file_template.php";
exit();
}
}
