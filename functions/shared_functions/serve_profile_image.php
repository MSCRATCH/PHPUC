<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//serve_profile_images.php
//MMXXVI MSCRATCH

function serve_profile_image(string $file, array $settings) {
$file = basename($file);
$real = realpath(profile_images_path . '/' . $file);

if (! $real || ! str_starts_with($real, realpath(profile_images_path))) {
http_response_code(404);
die("The requested profile image could not be found.");
}

$ext = strtolower(pathinfo($real, PATHINFO_EXTENSION));
switch ($ext) {
case 'jpg':
case 'jpeg':
header('Content-Type: image/jpeg');
break;
case 'png':
header('Content-Type: image/png');
break;
default:
header('Content-Type: application/octet-stream');
}
readfile($real);
exit();
}
