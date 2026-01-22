<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//profile_template.php
//MMXXVI MSCRATCH
?>


<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-user"></i> <?php echo sanitize_3($profile['username']);?></h3></div>
<div class="wrapper_row">
<div class="wrapper_column_1">
<div class="template_wrapper_content">
<?php if (empty($profile['user_profile_image'])) { ?>
<div class="template_wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_3($profile['username']);?> <?php echo sanitize_1($text_frontend['profile_template_text_1']);?></p>
</div>
<?php } else { ?>
<img src="<?= BASE_URL ?>profile_image/<?php echo sanitize_1($profile['user_profile_image']);?>" alt="profile_image" class="profile_image">
<?php } ?>
<ul>
<li class="list_style_none"><?php echo sanitize_3($profile['user_level']);?></li>
<li class="list_style_none"><?php echo sanitize_1($profile['user_profile_location']);?></li>
<?php if ($profile['last_activity_minutes'] <= 5) { ?>
<li class="list_style_none">Online</li>
<?php } else { ?>
<li class="list_style_none"><?php echo sanitize_1($profile['last_activity']);?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="wrapper_column_2">
<div class="template_wrapper_content">
<?php if (empty($profile['user_profile_description'])) { ?>
<p class="paragraph_nm"><?php echo sanitize_1($text_frontend['profile_template_text_2']);?></p>
<?php } else { ?>
<p class="paragraph_nm"><?php echo sanitize_1($profile['user_profile_description']);?></p>
<?php } ?>
</div>
</div>
</div>
</div>
