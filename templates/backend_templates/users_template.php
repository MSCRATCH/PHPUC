<?php
defined('MAIN') or die("Direct access to this file is restricted.");
//This file is part of PHPUC
//users_template.php
//MMXXVI MSCRATCH
?>

<?php  $token_remove_user = generate_token('remove_user'); ?>
<?php  $token_update_user_level = generate_token('update_user_level'); ?>

<?php if ($users !== false) { ?>
<div class="table_wrap">
<div class="horizontal_scroll">
<table class="responsive">
<thead>
<tr>
<th><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_backend['users_template_username']);?></th>
<th><i class="fa-solid fa-at"></i> <?php echo sanitize_1($text_backend['users_template_email']);?></th>
<th><i class="fa-solid fa-user"></i> <?php echo sanitize_1($text_backend['users_template_user_level']);?></th>
<th><i class="fa-solid fa-calendar"></i> <?php echo sanitize_1($text_backend['users_template_registered']);?></th>
<th><i class="fa-solid fa-wifi"></i> <?php echo sanitize_1($text_backend['users_template_last_activity']);?></th>
<th><i class="fa-solid fa-trash"></i> <?php echo sanitize_1($text_backend['users_template_remove']);?></th>
<th><i class="fa-solid fa-pen-to-square"></i> <?php echo sanitize_1($text_backend['users_template_change_user_level']);?></th>
</tr>
</thead>
<tbody>
<?php foreach ($users as $user) {  ?>
<tr>
<td data-label="Username"><a class="default_link" target="_blank" href="<?= BASE_URL ?>profile/<?php echo sanitize_1($user['public_id']);?>"><?php echo sanitize_3($user['username']);?></a></td>
<td data-label="E-Mail"><?php echo sanitize_1($user['user_email']);?></td>
<td data-label="User level"><?php echo sanitize_1($user['user_level']);?></td>
<td data-label="Registered"><?php echo sanitize_1($user['user_date']);?></td>
<?php if ($user['last_activity_minutes'] <= 5) { ?>
<td data-label="Last activity"><?php echo sanitize_1($text_backend['users_template_online']);?></td>
<?php } else { ?>
<td data-label="Last activity"><?php echo sanitize_1($user['last_activity']);?></td>
<?php } ?>
<td data-label="Remove">
<form method="post">
<input type="hidden" name="user_id_remove_form" value="<?php echo sanitize_1($user['user_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_remove_user;?>">
<button class="btn_table" type="submit" name="remove_user"><?php echo sanitize_1($text_backend['users_template_btn_1']);?></button>
</form>
</td>
<td data-label="Change user level">
<form method="post">
<select class="select_level" name="user_level_form">
<option value="<?php echo sanitize_1($user['user_level']);?>"><?php echo sanitize_1($user['user_level']);?></option>
<?php if ($user['user_level'] !== 'user') { ?>
<option value="user">user</option>
<?php } ?>
<?php if ($user['user_level'] !== 'not_activated') { ?>
<option value="not_activated">not activated</option>
<?php } ?>
<?php if ($user['user_level'] !== 'moderator') { ?>
<option value="moderator">moderator</option>  <?php } ?>
</select>
<input type="hidden" name="user_id_user_level_form" value="<?php echo sanitize_1($user['user_id']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_update_user_level;?>">
<button class="btn_table" type="submit" name="update_user_level"><?php echo sanitize_1($text_backend['users_template_btn_2']);?></button>
</form>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="pagination_secondary">
<?php echo pagination('users', $number_of_pages, $current_page); ?>
</div>
</div>
<?php } else { ?>
<div class="template_wrapper">
<div class="wrapper_title"><h3><?php echo sanitize_1($text_backend['users_template_no_entries_title']);?></h3></div>
<div class="wrapper_content">
<p class="paragraph_mtb"><?php echo sanitize_1($text_backend['users_template_no_entries_text']);?></p>
</div>
</div>
<?php }?>
