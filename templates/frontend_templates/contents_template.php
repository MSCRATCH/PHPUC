<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//contents_template.php
//MMXXVI MSCRATCH
?>

<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-folder"></i> <?php echo sanitize_1($custom_content['custom_content_title']);?></h3></div>
<div class="template_wrapper_content">
<?php echo parse_bb_code($db, $custom_content['custom_content'], $text_frontend);?>
</div>
</div>
