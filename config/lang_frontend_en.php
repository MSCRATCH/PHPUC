<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//lang_frontend_en.php
//MMXXVI MSCRATCH

$text_frontend = [

//functions\frontend_functions\parse_bb_code.php
'parse_bb_code_no_file' => 'An error occurred while loading the file.',
//functions\frontend_functions\parse_bb_code.php

//functions\frontend_functions\upload_profile_image.php
'message_profile_image_invalid_size' => 'The profile image could not be uploaded due to an invalid image size.',
'message_profile_image_invalid_extension' => 'The profile image could not be uploaded due to an invalid file type. Only JPG, JPEG, or PNG files are allowed.',
'message_profile_image_invalid_type' => 'The profile image could not be uploaded due to an invalid file type.',
'message_profile_image_invalid_dimension' => 'The profile image could not be uploaded because it must have dimensions of exactly 250 by 250 pixels.',
'message_profile_image_no_file' => 'The profile image could not be uploaded because no file was selected.',
'message_login_too_many_attempts' => 'You have exceeded the maximum number of login attempts. Please wait before trying again.',
//functions\frontend_functions\upload_profile_image.php

//functions\frontend_functions\login.php
'message_login_no_username' => 'No username was provided.',
'message_login_no_password' => 'No password was provided.',
'message_login_failed' => 'Your login was unsuccessful. Please check your credentials and try again.',
//functions\frontend_functions\login.php

//functions\frontend_functions\register.php
'message_register_no_username' => 'No username was provided.',
'message_register_no_password' => 'No password was provided.',
'message_register_no_password_confirmation' => 'No password confirmation was provided.',
'message_register_no_email_address' => 'No email address was provided.',
'message_register_no_security_question' => 'No answer was provided for the security question.',
'message_register_username_length' => 'The username cannot be longer than 30 characters.',
'message_register_username_short' => 'The username must contain a minimum of 5 characters.',
'message_register_username_special_characters' => 'The username may only contain letters and numbers.',
'message_register_password_length' => 'The password cannot be longer than 30 characters.',
'message_register_password_short' => 'The password must contain a minimum of 8 characters.',
'message_register_password_no_match' => 'The passwords entered do not match.',
'message_register_email_address_invalid' => 'The email address provided is invalid.',
'message_register_security_question_invalid' => 'The answer to the security question is invalid.',
'message_register_username_already_taken' => 'The provided username is not available. Try a different one.',
'message_register_email_address_already_taken' => 'The provided email address is not available. Try a different one.',
'message_register_critical_error' => 'Something went wrong. Please try again later.',
//functions\frontend_functions\register.php

//handlers\login_handler.php
'login_handler_text_1' => 'You have been successfully logged in.',
'login_handler_btn_1' => 'Back to the homepage',
'login_handler_text_2' => 'Your session has been terminated for security reasons.',
'login_handler_btn_2' => 'Return',
//handlers\login_handler.php

//handlers\logout_handler.php
'logout_handler_text' => 'You have been successfully logged out.',
'logout_handler_btn' => 'Back to the homepage',
//handlers\logout_handler.php

//handlers\manage_profile_handler.php
'manage_profile_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'manage_profile_handler_csrf_btn' => 'Return',
'manage_profile_handler_text_1' => 'Your profile has been successfully updated.',
'manage_profile_handler_btn_1' => 'Return',
'manage_profile_handler_text_2' => 'Your profile image has been successfully uploaded.',
'manage_profile_handler_btn_2' => 'Return',
//handlers\manage_profile_handler.php

//handlers\profile_handler.php
'profile_handler_text_1' => 'The user you are searching for does not exist.',
'profile_handler_btn_1' => 'Back to the homepage',
'profile_handler_text_2' => 'This account is not activated and therefore inaccessible.',
'profile_handler_btn_2' => 'Back to the homepage',
//handlers\profile_handler.php

//handlers\register_handler.php
'register_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'register_handler_csrf_btn' => 'Return',
'register_handler_text_1' => 'Registration has been deactivated.',
'register_handler_btn_1' => 'Return',
'register_handler_text_2' => 'You have been successfully registered.',
'register_handler_btn_2' => 'Back to the homepage',
//handlers\register_handler.php

//templates\frontend_templates\blog_template.php
'blog_template_by' => 'by',
'blog_template_at' => 'at',
'blog_template_no_entries_title' => 'No blog posts at the moment',
'blog_template_no_entries_text' => 'There are currently no blog posts.',
//templates\frontend_templates\blog_template.php

//templates\frontend_templates\home_template.php
'home_template_text' => 'PHPUC is a PHP content management system. The system focuses on security and carefully validates user input. It is written procedurally and is designed to be as clear and simple as possible. It is also extremely easy to extend. It is intended to serve as a basis for your own projects. You are welcome to modify the script. The copyright notice may also be removed, although it would be nice to mention the scripts name. Please be fair.',
//templates\frontend_templates\home_template.php

//templates\frontend_templates\login_template.php
'login_template_title' => 'Log in',
'login_template_label_1' => 'Username',
'login_template_label_2' => 'Password',
'login_template_btn_1' => 'Login',
'login_template_btn_2' => 'Return to home page',
//templates\frontend_templates\login_template.php

//templates\frontend_templates\manage_profile_template.php
'manage_profile_template_title_1' => 'Upload a profile image',
'manage_profile_template_btn_1' => 'Search for image file',
'manage_profile_template_btn_2' => 'Upload profile image',
'manage_profile_template_title_2' => 'Update the profile description',
'manage_profile_template_label_1' => 'Location',
'manage_profile_template_label_2' => 'Profile description',
'manage_profile_template_btn_3' => 'Update profile',
//templates\frontend_templates\manage_profile_template.php

//templates\frontend_templates\message_not_activated.php
'message_not_activated_title' => 'Not activated',
'message_not_activated_text' => 'Your user account has not yet been activated or it has been deactivated.',
//templates\frontend_templates\message_not_activated.php

//templates\frontend_templates\profile_template.php
'profile_template_text_1' => 'has not uploaded a profile picture.',
'profile_template_title' => 'Profile description',
'profile_template_text_2' => 'This user has not yet provided a profile description.',
//templates\frontend_templates\profile_template.php

//templates\frontend_templates\register_template.php
'register_template_title' => 'Register',
'register_template_label_1' => 'Username',
'register_template_label_2' => 'Password',
'register_template_label_3' => 'Password comparison',
'register_template_label_4' => 'E-mail address',
'register_template_label_5' => 'Security question',
'register_template_text' => 'By registering you agree to the terms of use.',
'register_template_btn_1' => 'Register',
'register_template_btn_2' => 'Return to home page',
//templates\frontend_templates\register_template.php

//templates\frontend_templates\serve_uploaded_file_template.php
'serve_uploaded_file_template_btn_1' => 'Download file',
'serve_uploaded_file_template_btn_2' => 'Return',
//templates\frontend_templates\serve_uploaded_file_template.php

];
