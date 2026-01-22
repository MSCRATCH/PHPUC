<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//backend_system_message_template.php
//MMXXVI MSCRATCH
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo SCRIPTNAME;?></title>
<meta charset="utf-8">
<meta name="author" content="MSCRATCH">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/backend_theme/backend.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="<?php echo sanitize_1($backend_system_message['message_wrapper']);?>">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1(SCRIPTNAME);?></h3></div>
<div class="msg_default">
<ul>
<p class="paragraph_nm"><?php echo sanitize_1($backend_system_message['message_text']);?></p>
<a href="<?php echo sanitize_1($backend_system_message['message_url']);?>"><button class="msg_btn"><?php echo sanitize_1($backend_system_message['message_button_text']);?></button></a>
</ul>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</body>
</html>
