<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title>{script_name}</title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{base_url}fontawesome/css/all.min.css" />
<link rel="stylesheet" href="{base_url}themes/backend_theme/backend.css" media="all" type="text/css">
<script src="{base_url}themes/backend_theme/js/upd_btn.js" defer></script>
<script src="{base_url}themes/backend_theme/js/file_list.js" defer></script>
</head>
<body>
<div class="template_primary_wrapper_row">
<div class="template_column_1">
<div class="sidebar_nav">
<ul>
<div class="sidebar_nav_title"><h3>{script_name} {script_version}</h3></div>
{dashboard_nav_moderator}
{dashboard_nav_administrator}
{dashboard_nav}
</ul>
</div>
</div>
<div class="template_column_2">
{content}
<footer class="footer_primary">
<div class="footer_title">{script_name} {script_version} is programmed by {script_author}</div>
</footer>
</div>
</body>
</html>
