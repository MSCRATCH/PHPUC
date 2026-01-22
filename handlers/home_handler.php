<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//home_handler.php
//MMXXVI MSCRATCH

render_page([
'template_name' => 'home_template',
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout');
