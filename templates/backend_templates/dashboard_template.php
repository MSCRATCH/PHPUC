<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//dashboard_template.php
//MMXXVI MSCRATCH
?>

<div class="template_dynamic_row">
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_1']);?></h3></div>
<div class="wrapper_content">
<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['dashboard_template_text_1']);?></p>
<?php } ?>
</div>
</div>
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_2']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($system_data as $key => $value) {  ?>
<li class="li_mtb"><?php echo sanitize_1($key);?>: <?php echo sanitize_1($value);?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-plus"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_3']);?></h3></div>
<div class="wrapper_content">
<?php if ($most_recent_users !== false) { ?>
<ul>
<?php foreach ($most_recent_users as $most_recent_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($most_recent_user['public_id']);?>"><?php echo sanitize_3($most_recent_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['dashboard_template_text_3']);?></p>
<?php } ?>
</div>
</div>
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-wifi"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_4']);?></h3></div>
<div class="wrapper_content">
<?php if ($online_users !== false) { ?>
<ul>
<?php foreach ($online_users as $online_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($online_user['public_id']);?>"><?php echo sanitize_3($online_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['dashboard_template_text_4']);?></p>
<?php } ?>
</div>
</div>
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-lock"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_5']);?></h3></div>
<div class="wrapper_content">
<?php if ($not_activated_users !== false) { ?>
<ul>
<?php foreach ($not_activated_users as $not_activated_user) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($not_activated_user['public_id']);?>"><?php echo sanitize_3($not_activated_user['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['dashboard_template_text_5']);?></p>
<?php } ?>
</div>
</div>
<div class="template_dynamic_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_backend['dashboard_template_title_6']);?></h3></div>
<div class="wrapper_content">
<?php if ($moderators !== false) { ?>
<ul>
<?php foreach ($moderators as $moderator) {  ?>
<li><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($moderator['public_id']);?>"><?php echo sanitize_3($moderator['username']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['dashboard_template_text_6']);?></p>
<?php } ?>
</div>
</div>
</div>
