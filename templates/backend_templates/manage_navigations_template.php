<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//manage_navigations_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_save_primary_nav_element = generate_token('save_primary_nav_element');?>
<?php  $token_save_secondary_nav_element = generate_token('save_secondary_nav_element');?>
<?php  $token_update_primary_nav_element = generate_token('update_primary_nav_element');?>
<?php  $token_update_secondary_nav_element = generate_token('update_secondary_nav_element');?>
<?php  $token_remove_primary_nav_element = generate_token('remove_primary_nav_element');?>
<?php  $token_remove_secondary_nav_element = generate_token('remove_secondary_nav_element');?>

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
<?php if (isset($primary_navigation_element_id_get) && ! empty($primary_navigation_element_id_get)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($primary_navigation_element['primary_nav_name']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="primary_nav_url_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_1']);?></label>
<input class="form_text_default" type="text" name="primary_nav_url_update_form" id="primary_nav_url_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_url']);?>">
<label class="label_default" for="primary_nav_name_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_2']);?></label>
<input class="form_text_default" type="text" name="primary_nav_name_update_form" id="primary_nav_name_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_name']);?>">
<label class="label_default" for="primary_nav_order_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_3']);?></label>
<input class="form_text_default" type="text" name="primary_nav_order_update_form" id="primary_nav_order_update_form" value="<?php echo sanitize_1($primary_navigation_element['primary_nav_order']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_primary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_1']);?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_primary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_2']);?></button>
</form>
</div>
</div>
<?php } elseif (isset($secondary_navigation_element_id_get) && ! empty($secondary_navigation_element_id_get)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($secondary_navigation_element['secondary_nav_name']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="secondary_nav_url_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_1']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_url_update_form" id="secondary_nav_url_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_url']);?>">
<label class="label_default" for="secondary_nav_name_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_2']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_name_update_form" id="secondary_nav_name_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_name']);?>">
<label class="label_default" for="secondary_nav_order_update_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_3']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_order_update_form" id="secondary_nav_order_update_form" value="<?php echo sanitize_1($secondary_navigation_element['secondary_nav_order']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="update_secondary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_1']);?></button>
</form>
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="remove_secondary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_2']);?></button>
</form>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($text_backend['manage_navigations_template_title_1']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="primary_nav_url_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_4']);?></label>
<input class="form_text_default" type="text" name="primary_nav_url_form" id="primary_nav_url_form">
<label class="label_default" for="primary_nav_name_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_5']);?></label>
<input class="form_text_default" type="text" name="primary_nav_name_form" id="primary_nav_name_form">
<label class="label_default" for="primary_nav_order_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_6']);?></label>
<input class="form_text_default" type="text" name="primary_nav_order_form" id="primary_nav_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_save_primary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_primary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_3']);?></button>
</form>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($text_backend['manage_navigations_template_title_2']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<label class="label_default" for="secondary_nav_url_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_4']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_url_form" id="secondary_nav_url_form">
<label class="label_default" for="secondary_nav_name_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_5']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_name_form" id="secondary_nav_name_form">
<label class="label_default" for="secondary_nav_order_form"><?php echo sanitize_1($text_backend['manage_navigations_template_label_6']);?></label>
<input class="form_text_default" type="text" name="secondary_nav_order_form" id="secondary_nav_order_form">
<input type="hidden" name="csrf_token" value="<?php echo $token_save_secondary_nav_element;?>">
<button class="btn_dynamic_mtb" type="submit" name="save_secondary_nav_element"><?php echo sanitize_1($text_backend['manage_navigations_template_btn_3']);?></button>
</form>
</div>
</div>
<?php } ?>
</div>
<div class="template_content_column_2">
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($text_backend['manage_navigations_template_title_3']);?></h3></div>
<div class="wrapper_content">
<?php if ($contents !== false) { ?>
<ul>
<?php foreach ($contents as $content) { ?>
<li class="list_style_none"><?php echo sanitize_1($content['custom_content_title']);?>_<?php echo sanitize_1($content['custom_content_url']);?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_navigations_template_text_1']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($text_backend['manage_navigations_template_title_4']);?></h3></div>
<div class="wrapper_content">
<?php if ($primary_nav_elements !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_navigations"><?php echo sanitize_1($text_backend['manage_navigations_template_text_2']);?></a></li>
<?php foreach ($primary_nav_elements as $primary_nav_element) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_navigations/primary_navigation_element/<?php echo sanitize_1($primary_nav_element['primary_nav_id']);?>"><?php echo sanitize_1($primary_nav_element['primary_nav_order']);?>. <?php echo sanitize_1($primary_nav_element['primary_nav_name']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_navigations_template_text_3']);?></p>
<?php } ?>
</div>
</div>
<div class="template_wrapper">
<div class="wrapper_title"><h3><i class="fa-solid fa-bars"></i> <?php echo sanitize_1($text_backend['manage_navigations_template_title_5']);?></h3></div>
<div class="wrapper_content">
<?php if ($secondary_nav_elements !== false) { ?>
<ul>
<li class="list_style_none"><a class="default_link" href="<?= BASE_URL ?>manage_navigations"><?php echo sanitize_1($text_backend['manage_navigations_template_text_4']);?></a></li>
<?php foreach ($secondary_nav_elements as $secondary_nav_element) { ?>
<li class="list_style_none"><a class="default_link" href="<?php echo BASE_URL;?>manage_navigations/secondary_navigation_element/<?php echo sanitize_1($secondary_nav_element['secondary_nav_id']);?>"><?php echo sanitize_1($secondary_nav_element['secondary_nav_order']);?>. <?php echo sanitize_1($secondary_nav_element['secondary_nav_name']);?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['manage_navigations_template_text_5']);?></p>
<?php } ?>
</div>
</div>
</div>
</div>
