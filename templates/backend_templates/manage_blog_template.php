<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_blog_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_blog_post = generate_token('save_blog_post');?>
<?php  $token_update_blog_post = generate_token('update_blog_post');?>
<?php  $token_remove_blog_post = generate_token('remove_blog_post');?>

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
<?php if (isset($blog_post_id_get) && ! empty($blog_post_id_get) && $blog_post !== false) { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_3($blog_post['blog_post_date']);?></h3></div>
<div class="wrapper_content">
<?php  if (user_is_administrator() === true) { ?>
<a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($blog_post['public_id']);?>"><?php echo sanitize_3($blog_post['username']);?></a>
<?php } ?>
<form method="post">
<label class="label_default" for="blog_post_title_update_form"><?php echo sanitize_1($text_backend['manage_blog_template_label_1']);?></label>
<input class="form_text_default" type="text" name="blog_post_title_update_form" id="blog_post_title_update_form" value="<?php echo sanitize_1($blog_post['blog_post_title']);?>">
<label class="label_default" for="textarea_secondary"><?php echo sanitize_1($text_backend['manage_blog_template_label_2']);?></label>
<textarea class="textarea_secondary" name="blog_post_content_update_form" id="textarea_secondary"><?php echo sanitize_1($blog_post['blog_post_content']);?></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_update_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_blog_post"><?php echo sanitize_1($text_backend['manage_blog_template_btn_1']);?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_blog_post"><?php echo sanitize_1($text_backend['manage_blog_template_btn_2']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_backend['manage_blog_template_title_1']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_blog_template_text_1']);?></p>
<form method="post">
<label class="label_default" for="blog_post_title_form"><?php echo sanitize_1($text_backend['manage_blog_template_label_3']);?></label>
<input class="form_text_default" type="text" name="blog_post_title_form" id="blog_post_title_form">
<label class="label_default" for="textarea_secondary"><?php echo sanitize_1($text_backend['manage_blog_template_label_4']);?></label>
<textarea class="textarea_secondary" name="blog_post_content_form" id="textarea_secondary"></textarea>
<input type="hidden" name="csrf_token" value="<?php echo $token_save_blog_post;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_blog_post"><?php echo sanitize_1($text_backend['manage_blog_template_btn_3']);?></button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<?php if ($paginated_blog_posts !== false) { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_backend['manage_blog_template_title_2']);?></h3></div>
<div class="wrapper_content">
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_blog"><?php echo sanitize_1($text_backend['manage_blog_template_text_2']);?></a></li>
<?php foreach ($paginated_blog_posts as $paginated_blog_post) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_blog/post/<?php echo sanitize_1($paginated_blog_post['blog_post_id']);?>"><?php echo sanitize_1($paginated_blog_post['blog_post_title']);?></a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="pagination">
<?php echo pagination('manage_blog', $number_of_pages, $current_page); ?>
</div>
<?php } else { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($text_backend['manage_blog_template_title_2']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_blog_template_text_3']);?></p>
</div>
</div>
<?php } ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-cloud"></i> <?php echo sanitize_1($text_backend['manage_blog_template_title_3']);?></h3></div>
<div class="wrapper_content">
<?php if ($uploaded_files !== false) { ?>
<ul id="file_list">
<?php foreach ($uploaded_files as $uploaded_file) { ?>
<li class="list_style_hover" data-value="<?php echo sanitize_1($uploaded_file['file_name']);?>"><?php echo sanitize_1($uploaded_file['file_title']);?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_blog_template_text_4']);?></p>
<?php } ?>
</div>
</div>
</div>
</div>
