<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//blog_handler.php
//MMXXVI MSCRATCH

$entries_per_page = 5;
$current_page = isset($_GET['page']) ? (INT) $_GET['page'] : 1;

$total_number_of_blog_posts = get_total_number_of_blog_posts($db);

$number_of_pages = calculate_number_of_pages($total_number_of_blog_posts, $entries_per_page);
$current_page = validate_page_number($total_number_of_blog_posts, $current_page, $entries_per_page);
$offset = calculate_offset($current_page, $entries_per_page);

$result = get_paginated_blog_posts($db, $offset, $entries_per_page);

render_page([
'template_name' => 'blog_template',
'current_page'  => $current_page,
'number_of_pages' => $number_of_pages,
'result' => $result,
], $db, $settings, $text_frontend, $text_backend, $text_shared, 'frontend_templates', 'default_theme', 'layout');
