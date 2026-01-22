<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//upload_files_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_upload_file = generate_token('upload_file');?>
<?php  $token_update_file = generate_token('update_file');?>
<?php  $token_remove_file = generate_token('remove_file');?>

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
<?php if (isset($file_id_get) && ! empty($file_id_get)) { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($file_data['file_title']);?></h3></div>
<div class="wrapper_content">
<ul>
<?php  if (user_is_administrator() === true) { ?>
<li class="list_style_none"><span class="span_default"><?php echo sanitize_1($text_backend['upload_files_template_file_uploaded_by']);?></span> <a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($file_data['public_id']);?>"><?php echo sanitize_3($file_data['username']);?></a></li>
<?php } ?>
<li class="list_style_none"><span class="span_default"><?php echo sanitize_1($text_backend['upload_files_template_file_name']);?></span> <a class="default_link" target="_blank" href="<?php echo BASE_URL;?>file/<?php echo sanitize_1($file_data['file_name']);?>"><?php echo sanitize_1($file_data['file_name']);?></a></li>
</ul>
<form method="post">
<label class="label_default" for="file_title_update_form"><?php echo sanitize_1($text_backend['upload_files_template_label_1']);?></label>
<input class="form_text_default" type="text" name="file_title_update_form" id="file_title_update_form" value="<?php echo sanitize_1($file_data['file_title']);?>">
<label class="label_default" for="file_description_update_form"><?php echo sanitize_1($text_backend['upload_files_template_label_2']);?></label>
<textarea class="textarea_default" name="file_description_update_form" id="file_description_update_form"><?php echo sanitize_1($file_data['file_description']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_file;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_file"><?php echo sanitize_1($text_backend['upload_files_template_btn_1']);?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_file;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_file"><?php echo sanitize_1($text_backend['upload_files_template_btn_2']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_backend['upload_files_template_title_1']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['upload_files_template_text_1']);?></p>
<form enctype="multipart/form-data" method="post">
<label class="label_default" for="file_title_form"><?php echo sanitize_1($text_backend['upload_files_template_label_3']);?></label>
<input class="form_text_default" type="text" name="file_title_form" id="file_title_form">
<label class="label_default" for="file_description_form"><?php echo sanitize_1($text_backend['upload_files_template_label_4']);?></label>
<textarea class="textarea_default" name="file_description_form" id="file_description_form"></textarea>
<button class="btn_upload" type="button" id="btn_upload"><?php echo sanitize_1($text_backend['upload_files_template_label_5']);?></button>
<input type="file" name="uploaded_file" id="file_input">
<input type="hidden" name="csrf_token" value="<?php echo $token_upload_file;?>">
<button class="btn_submit" type="submit" name="upload_file" id="btn_submit"><?php echo sanitize_1($text_backend['upload_files_template_btn_3']);?></button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<?php if ($result !== false) { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_backend['upload_files_template_title_2']);?></h3></div>
<div class="wrapper_content">
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>upload_files"><?php echo sanitize_1($text_backend['upload_files_template_text_2']);?></a></li>
<?php foreach ($result as $row) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>upload_files/file/<?php echo sanitize_1($row['file_id']);?>"><?php echo sanitize_1($row['file_title']);?></a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="pagination">
<?php echo pagination('upload_files', $number_of_pages, $current_page); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_backend['upload_files_template_title_2']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['upload_files_template_text_3']);?></p>
</div>
</div>
<?php } ?>
</div>
</div>
