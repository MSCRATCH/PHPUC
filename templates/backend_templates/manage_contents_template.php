<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_contents_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_content = generate_token('save_content');?>
<?php  $token_update_content = generate_token('update_content');?>
<?php  $token_remove_content = generate_token('remove_content');?>

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
<?php if (isset($content_id_get) && ! empty($content_id_get)) { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($content['custom_content_title']);?></h3></div>
<div class="wrapper_content">
<a class="default_link" target="_blank" href="<?= BASE_URL ?><?php echo sanitize_1($content['custom_content_url']);?>"><?php echo sanitize_1($text_backend['manage_contents_template_text_1']);?></a>
<form method="post">
<label class="label_default" for="custom_content_url_update_form"><?php echo sanitize_1($text_backend['manage_contents_template_label_1']);?></label>
<input class="form_text_default" type="text" name="custom_content_url_update_form" id="custom_content_url_update_form" value="<?php echo sanitize_1($content['custom_content_url']);?>">
<label class="label_default" for="custom_content_title_form"><?php echo sanitize_1($text_backend['manage_contents_template_label_2']);?></label>
<input class="form_text_default" type="text" name="custom_content_title_update_form" id="custom_content_title_update_form" value="<?php echo sanitize_1($content['custom_content_title']);?>">
<label class="label_default" for="textarea_secondary"><?php echo sanitize_1($text_backend['manage_contents_template_label_3']);?></label>
<textarea class="textarea_secondary" name="custom_content_update_form" id="textarea_secondary"><?php echo sanitize_1($content['custom_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_content"><?php echo sanitize_1($text_backend['manage_contents_template_btn_1']);?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_content"><?php echo sanitize_1($text_backend['manage_contents_template_btn_2']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_backend['manage_contents_template_title_1']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_contents_template_text_2']);?></p>
<form method="post">
<label class="label_default" for="custom_content_url_form"><?php echo sanitize_1($text_backend['manage_contents_template_label_4']);?></label>
<input class="form_text_default" type="text" name="custom_content_url_form" id="custom_content_url_form">
<label class="label_default" for="custom_content_title_form"><?php echo sanitize_1($text_backend['manage_contents_template_label_5']);?></label>
<input class="form_text_default" type="text" name="custom_content_title_form" id="custom_content_title_form">
<label class="label_default" for="textarea_secondary"><?php echo sanitize_1($text_backend['manage_contents_template_label_6']);?></label>
<textarea class="textarea_secondary" name="custom_content_form" id="textarea_secondary"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_save_content;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_content"><?php echo sanitize_1($text_backend['manage_contents_template_btn_3']);?></button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_backend['manage_contents_template_title_2']);?></h3></div>
<div class="wrapper_content">
<?php if ($contents !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_contents"><?php echo sanitize_1($text_backend['manage_contents_template_text_3']);?></a></li>
<?php foreach ($contents as $content) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_contents/content/<?php echo sanitize_1($content['custom_content_id']);?>"><?php echo sanitize_1($content['custom_content_title']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_contents_template_text_4']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_backend['manage_contents_template_title_3']);?></h3></div>
<div class="wrapper_content">
<?php if ($uploaded_files !== false) { ?>
<ul id="file_list">
<?php foreach ($uploaded_files as $uploaded_file) { ?>
<li class="list_style_hover" data-value="<?php echo sanitize_1($uploaded_file['file_name']);?>"><?php echo sanitize_1($uploaded_file['file_title']);?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_contents_template_text_5']);?></p>
<?php } ?>
</div>
</div>
</div>
</div>
