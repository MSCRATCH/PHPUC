<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//settings_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_submit_settings = generate_token('submit_settings'); ?>

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

<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-gear"></i> <?php echo sanitize_1($text_backend['settings_template_title']);?></h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<?php foreach ($settings_from_db as $setting_from_db) {  ?>
<label class="label_default" for="<?php echo sanitize_1($setting_from_db['setting_key']);?>"><?php echo sanitize_3($setting_from_db['setting_title']);?></label>
<input class="form_text_default" type="text" name="settings_form[<?php echo sanitize_1($setting_from_db['setting_key']);?>]" id="<?php echo sanitize_1($setting_from_db['setting_key']);?>" value="<?php echo sanitize_1($setting_from_db['setting_value']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_submit_settings;?>">
<?php } ?>
<button class="btn_dynamic_mtb" type="submit" name="submit_settings"><?php echo sanitize_1($text_backend['settings_template_btn']);?></button>
</form>
</div>
</div>
</div>
