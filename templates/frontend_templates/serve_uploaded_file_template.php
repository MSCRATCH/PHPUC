<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//serve_uploaded_file_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_download_file = generate_token('download_file'); ?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo sanitize_1($settings['page_title']);?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= BASE_URL ?>themes/default_theme/default.css" media="all" type="text/css">
<link rel="stylesheet" href="<?= BASE_URL ?>fontawesome/css/all.min.css" />
</head>
<body>
<div class="main_wrapper">
<div class="wrapper_narrow_bg">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($file_data['file_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_nm"><?php echo sanitize_1($file_data['file_description']);?></p>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_download_file;?>">
<button class="btn_dynamic_mtb" type="submit" name="download_file"><?php echo sanitize_1($text_frontend['serve_uploaded_file_template_btn_1']);?></button>
</form>
<a href="<?= BASE_URL ?>home"><button class="btn_dynamic_mtb"><?php echo sanitize_1($text_frontend['serve_uploaded_file_template_btn_2']);?></button></a>
</div>
</div>
<footer class="footer_secondary">
<div class="footer_title">This page is based on <?php echo SCRIPTNAME;?> <?php echo VERSION;?> programmed by <?php echo AUTHOR;?></div>
</footer>
</div>
</body>
</html>
