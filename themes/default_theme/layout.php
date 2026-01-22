<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title>{page_title}</title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="{page_description}">
<meta name="keywords" content="{page_keywords}">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{base_url}themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="{base_url}fontawesome/css/all.min.css" />
<script src="{base_url}themes/default_theme/js/menu.js" defer></script>
<script src="{base_url}themes/default_theme/js/upd_btn.js" defer></script>
</head>
<body>
<nav class="navbar">
<div class="navbar_title">{page_title}</div>
<a href="#" class="toggle_button">Menu</a>
<div class="navbar_links">
<ul>{home_nav_item}{blog_nav_item}{login_nav_item}{register_nav_item}{profile_nav_item}{profile_settings_nav_item}{dashboard_nav_item}{dashboard_moderator_nav_item}{primary_nav}{logout_nav_item}</ul>
</div>
</nav>
<div class="main_wrapper">
<div class="template_row">
<div class="template_column_1">
<div class="sidebar_nav">
<div class="sidebar_nav_title"><h3><i class="fa-solid fa-bars"></i> {page_title}</h3></div>
<ul>{secondary_nav}</ul>
</div>
</div>
<div class="template_column_2">
{content}
<footer class="footer_primary">
<div class="footer_title">{footer_text}</div>
</footer>
</div>
</div>
</div>
</body>
</html>
