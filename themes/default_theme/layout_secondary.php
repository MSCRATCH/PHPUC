<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//template_secondary.php
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
<ul>{home_nav_item}{blog_nav_item}{login_nav_item}{register_nav_item}{profile_nav_item}{profile_settings_nav_item}{dashboard_nav_item}{dashboard_moderator_nav_item}{primary_nav}{logout_nav_item}
</ul>
</div>
</nav>
<div class="main_wrapper">
{content}
<footer class="footer_secondary">
<div class="footer_title">{footer_text}</div>
</footer>
</div>
</body>
</html>
