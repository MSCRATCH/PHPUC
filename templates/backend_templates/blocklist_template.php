<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blocklist_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_submit_blocklist_command = generate_token('submit_blocklist_command');?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($settings['system_message_title']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="template_content_row">
<div class="template_content_column_2">
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-ban"></i> <?php echo sanitize_1($text_backend['blocklist_template_title_1']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['blocklist_template_text_1']);?></p>
<ul>
<li class="list_style_none">save_</li>
<li class="list_style_none">remove_</li>
<li class="list_style_none">username_value</li>
<li class="list_style_none">domain_value</li>
<li class="list_style_none">email_value</li>
<li class="list_style_none">name_value</li>
</ul>
<form method="post">
<label class="label_default" for="blocklist_command_form"><?php echo sanitize_1($text_backend['blocklist_template_label_command']);?></label>
<?php if (isset($blocklist_remove_command_get)) { ?>
<input class="form_text_default" type="text" name="blocklist_command_form" id="blocklist_command_form" value="<?php echo sanitize_1($blocklist_remove_command_get);?>">
<?php } else { ?>
<input class="form_text_default" type="text" name="blocklist_command_form" id="blocklist_command_form">
<?php } ?>
<input type="hidden" name="csrf_token" value="<?php echo $token_submit_blocklist_command;?>">
<button class="btn_dynamic_mtb" type="submit" name="submit_blocklist_command"><?php echo sanitize_1($text_backend['blocklist_template_btn']);?></button>
</form>
</div>
</div>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_backend['blocklist_template_title_2']);?></h3></div>
<div class="wrapper_content">
<?php if ($blocklist_usernames !== false) { ?>
<ul>
<?php foreach ($blocklist_usernames as $blocklist_username) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>blocklist/command/<?php echo sanitize_1($blocklist_username);?>"><?php echo sanitize_1($blocklist_username);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['blocklist_template_text_2']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-at"></i> <?php echo sanitize_1($text_backend['blocklist_template_title_3']);?></h3></div>
<div class="wrapper_content">
<?php if ($blocklist_names !== false) { ?>
<ul>
<?php foreach ($blocklist_names as $blocklist_name) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>blocklist/command/<?php echo sanitize_1($blocklist_name);?>"><?php echo sanitize_1($blocklist_name);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['blocklist_template_text_3']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-at"></i> <?php echo sanitize_1($text_backend['blocklist_template_title_4']);?></h3></div>
<div class="wrapper_content">
<?php if ($blocklist_emails !== false) { ?>
<ul>
<?php foreach ($blocklist_emails as $blocklist_email) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>blocklist/command/<?php echo sanitize_1($blocklist_email);?>"><?php echo sanitize_1($blocklist_email);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['blocklist_template_text_4']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-server"></i> <?php echo sanitize_1($text_backend['blocklist_template_title_5']);?></h3></div>
<div class="wrapper_content">
<?php if ($blocklist_domains !== false) { ?>
<ul>
<?php foreach ($blocklist_domains as $blocklist_domain) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>blocklist/command/<?php echo sanitize_1($blocklist_domain);?>"><?php echo sanitize_1($blocklist_domain);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['blocklist_template_text_5']);?></p>
<?php } ?>
</div>
</div>
</div>
</div>
