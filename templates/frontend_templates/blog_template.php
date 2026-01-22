<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//blog_template.php
//MMXXVI MSCRATCH
?>

<?php if ($result !== false) { ?>
<?php foreach ($result as $row) {  ?>
<div class="template_wrapper">
<div class="template_wrapper_title"><h3><i class="fa-solid fa-message"></i> <?php echo sanitize_1($row['blog_post_title']);?></h3></div>
<div class="template_wrapper_content">
<?php echo parse_bb_code($db, $row['blog_post_content'], $text_frontend);?>
</div>
<div class="template_wrapper_footer"><h3><?php echo sanitize_1($text_frontend['blog_template_by']);?> <?php echo sanitize_3($row['username']);?> <?php echo sanitize_1($text_frontend['blog_template_at']);?> <?php echo sanitize_1($row['blog_post_date']);?></h3></div>
</div>
<?php } ?>
<div class="pagination">
<?php echo pagination('blog', $number_of_pages, $current_page); ?>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_frontend['blog_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_frontend['blog_template_no_entries_text']);?></p>
</div>
</div>
<?php } ?>
