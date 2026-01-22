<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//backend_system_message.php
//MMXXVI MSCRATCH

function backend_system_message($backend_system_message, $settings) {
if (! empty($backend_system_message)) {
require templates_path . "/backend_templates/backend_system_message_template.php";
exit();
} 
}
