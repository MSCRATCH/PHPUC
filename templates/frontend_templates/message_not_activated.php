<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//message_not_activated.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1($settings['page_title']);?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_frontend['message_not_activated_title']);?></h3></div>
<div class="msg_default">
<p class="paragraph_nm"><?php echo sanitize_1($text_frontend['message_not_activated_text']);?></p>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title"><?php echo sanitize_1($settings['footer_text']);?></div>
</footer>
</div>
</body>
</html>
