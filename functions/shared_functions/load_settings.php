<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//load_settings.php
//MMXXVI MSCRATCH

function load_settings($db) {
$stmt = $db->query("SELECT setting_key, setting_value FROM settings");
$result = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($result !== false && ! empty($result)) {
foreach ($result as $row) {
$settings[$row['setting_key']] = $row['setting_value'];
}
return $settings;
} else {
die("Failed to load the settings due to a critical error.");
}
}
