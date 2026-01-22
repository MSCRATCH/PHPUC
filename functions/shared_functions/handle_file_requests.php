<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//handle_file_requests.php
//MMXXVI MSCRATCH

function handle_file_requests($db, $text_frontend, $text_backend, $text_shared, $settings) {
if (isset($_GET['p']) && $_GET['p'] === 'profile_image' && isset($_GET['file']) && ! empty($_GET['file'])) {
require shared_functions_path . '/serve_profile_image.php';
serve_profile_image($_GET['file'], $settings);
exit();
}

if (isset($_GET['p']) && $_GET['p'] === 'file' && isset($_GET['file']) && ! empty($_GET['file'])) {
require shared_functions_path . '/serve_uploaded_file.php';
serve_uploaded_file($db, $text_frontend, $text_backend, $text_shared, $_GET['file'], $settings);
exit();
}
}
