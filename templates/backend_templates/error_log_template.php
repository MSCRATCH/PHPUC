<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//error_log_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_clear_error_log = generate_token('clear_error_log'); ?>

<?php if ($result !== false) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><i class="fa-solid fa-bug"></i> <?php echo sanitize_1($text_backend['error_log_template_title_1']);?></h3></div>
<div class="wrapper_content">
<form method="post">
<input type="hidden" name="csrf_token" value="<?php echo $token_clear_error_log;?>">
<button class="btn_txt" type="submit" name="clear_error_log"><?php echo sanitize_1($text_backend['error_log_template_btn']);?></button>
</form>
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['error_log_template_text_1']);?></p>
</div>
</div>
<div class="table_wrap">
<div class="horizontal_scroll">
<table class="responsive">
<thead>
<tr>
<th><i class="fa-solid fa-hashtag"></i> <?php echo sanitize_1($text_backend['error_log_template_error_number']);?></th>
<th><i class="fa-solid fa-code"></i> <?php echo sanitize_1($text_backend['error_log_template_error_string']);?></th>
<th><i class="fa-solid fa-floppy-disk"></i> <?php echo sanitize_1($text_backend['error_log_template_error_file']);?></th>
<th><i class="fa-solid fa-hashtag"></i> <?php echo sanitize_1($text_backend['error_log_template_error_line']);?></th>
<th><i class="fa-solid fa-calendar"></i> <?php echo sanitize_1($text_backend['error_log_template_registered_at']);?></th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $row) {  ?>
<tr>
<td data-label="Error number"><?php echo sanitize_1($row['errno']);?></td>
<td data-label="Error string"><?php echo sanitize_1($row['errstr']);?></td>
<td data-label="Error file"><?php echo sanitize_1($row['errfile']);?></td>
<td data-label="Error line"><?php echo sanitize_1($row['errline']);?></td>
<td data-label="Registered at"><?php echo sanitize_1($row['err_registered_at']);?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="pagination_secondary">
<?php echo pagination('error_log', $number_of_pages, $current_page); ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_backend['error_log_template_title_2']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['error_log_template_text_2']);?></p>
</div>
</div>
<?php } ?>
