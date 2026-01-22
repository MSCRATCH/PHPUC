<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//message_remove_user.php
//MMXXVI MSCRATCH
?>

<?php  $token_remove_user_confirm = generate_token('remove_user_confirm'); ?>

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
<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="msg_default">
<p class="paragraph_nm"><?php echo sanitize_1($text_backend['message_remove_user_text_1']);?></p>
<form method="post">
<input type="hidden" name="user_id_remove_user_confirm_form" value="<?php echo sanitize_1($user_id_remove_form);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_user_confirm;?>">
<button class="msg_btn" type="submit" name="remove_user_confirm"><?php echo sanitize_1($text_backend['message_remove_user_btn_1']);?></button>
</form>
<a href="<?= BASE_URL ?>users"><button class="msg_btn"><?php echo sanitize_1($text_backend['message_remove_user_btn_2']);?></button></a>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</body>
</html>
