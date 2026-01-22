<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//frontend_system_message.php
//MMXXVI MSCRATCH

function frontend_system_message($frontend_system_message, $settings) {
if (! empty($frontend_system_message)) {
require templates_path . "/frontend_templates/frontend_system_message_template.php";
exit();
}
}
