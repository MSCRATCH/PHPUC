<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//This file is part of PHPUC
//lang_backend_en.php
//MMXXVI MSCRATCH

$text_backend = [

//functions\backend_functions\backend_login.php
'message_backend_login_too_many_attempts' => 'You have exceeded the maximum number of login attempts. Please wait before trying again.',
'message_backend_login_no_username' => 'No username was provided.',
'message_backend_login_no_password' => 'No password was provided.',
'message_backend_login_failed' => 'Your login was unsuccessful. Please check your credentials and try again.',
//functions\backend_functions\backend_login.php

//functions\backend_functions\manage_settings.php
'message_settings_no_settings' => 'No settings have been submitted.',
'message_settings_invalid_key' => 'You have submitted an invalid setting key.',
'message_settings_no_value' => 'You have not provided a value for the setting.',
'message_settings_no_key' => 'You have not provided a key for the setting.',
'message_settings_invalid_register_value' => 'Only yes or no are accepted as valid parameters.',
'message_settings_stmt_failed' => 'Something went wrong. Please try again later.',
//functions\backend_functions\manage_settings.php

//functions\backend_functions\clearing_activity_log.php
'message_activity_log_save_failed' => 'An error occurred in the activity log. The system automatically deletes logs from the database after 1000 entries and saves them to text files. Please ensure that the logs directory exists and is writable.',
'message_activity_log_remove_failed' => 'There was a problem with the activity log. The system could not clear the database log.',
//functions\backend_functions\clearing_activity_log.php

//functions\backend_functions\manage_blocklist.php
'message_manage_blocklist_no_value' => 'No commands were submitted.',
'message_manage_blocklist_invalid_format' => 'Invalid command format. A valid command must consist of a prefix and a value separated by an underscore.',
'message_manage_blocklist_invalid_command' => 'Invalid command. Only save_ and remove_ prefixes are permitted.',
'message_manage_blocklist_invalid_type' => 'Invalid type. Acceptable types are username_value, name_value, domain_value, email_value.',
'message_manage_blocklist_invalid_value_username' => 'A valid username can only consist of alphabetic characters.',
'message_manage_blocklist_invalid_value_name' => 'A valid name can only consist of alphabetic characters.',
'message_manage_blocklist_invalid_value_email' => 'An email address must follow the standard format name@domain.tld.',
'message_manage_blocklist_invalid_value_domain' => 'An domain name must follow the standard format domain.tld.',
'message_manage_blocklist_no_existing_value' => 'The value associated with the remove_ command cannot be assigned to any data record.',
'message_manage_blocklist_remove_stmt_failed' => 'Something went wrong. Please try again later.',
'message_manage_blocklist_save_stmt_failed' => 'Something went wrong. Please try again later.',
//functions\backend_functions\manage_blocklist.php

//functions\backend_functions\manage_contents.php
'message_manage_contents_no_name' => 'No name was provided.',
'message_manage_contents_invalid_url' => 'The URL provided is reserved for the system and therefore not available.',
'message_manage_contents_no_title' => 'No title was provided.',
'message_manage_contents_no_content' => 'No content was provided.',
//functions\backend_functions\manage_contents.php

//functions\backend_functions\manage_navigations.php
'message_manage_navigations_no_url' => 'No URL was provided.',
'message_manage_navigations_invalid_url' => 'The URL provided is reserved for the system and therefore not available.',
'message_manage_navigations_no_name' => 'No name was provided.',
'message_manage_navigations_no_order_value' => 'No number for the order was provided.',
'message_manage_navigations_invalid_order_value' => 'The value is not numeric.',
//functions\backend_functions\manage_navigations.php

//functions\backend_functions\manage_blog.php
'message_manage_blog_no_title' => 'No title was provided.',
'message_manage_blog_no_content' => 'No content was provided.',
//functions\backend_functions\manage_blog.php

//functions\backend_functions\upload_files.php
'message_upload_files_no_file' => 'No file was provided.',
'message_upload_files_no_file_title' => 'No file title was provided.',
'message_upload_files_no_file_description' => 'No file description was provided.',
'message_upload_files_invalid_extension' => 'Invalid file extension.',
'message_upload_files_invalid_size' => 'Invalid file size, the file must be a maximum of 2.5 MB.',
'message_upload_files_invalid_type' => 'Invalid file.',
//functions\backend_functions\upload_files.php

//functions\backend_functions\manage_navigations.php
'home_nav_item' => 'Home',
'blog_nav_item' => 'Blog',
'login_nav_item' => 'Login',
'register_nav_item' => 'Register',
'profile_settings_nav_item' => 'Profile settings',
'dashboard_nav_item' => 'Dashboard',
'dashboard_moderator_nav_item' => 'Dashboard',
'logout_nav_item' => 'Logout',
'dashboard_moderator_nav_item' => 'Dashboard',

'dashboard_nav_moderator_1' => 'Back to homepage',
'dashboard_nav_moderator_2' => 'Dashboard',
'dashboard_nav_administrator_1' => 'Back to homepage',
'dashboard_nav_administrator_2' => 'Dashboard',
'dashboard_nav_administrator_3' => 'Settings',
'dashboard_nav_administrator_4' => 'Activity log',
'dashboard_nav_administrator_5' => 'Error log',
'dashboard_nav_administrator_6' => 'Blocklist',
'dashboard_nav_administrator_7' => 'User management',
'dashboard_nav_administrator_8' => 'Contents',
'dashboard_nav_administrator_9' => 'Navigations',

'dashboard_nav_1' => 'Upload files',
'dashboard_nav_2' => 'Blog',
'dashboard_nav_3' => 'Logout',
//functions\backend_functions\manage_navigations.php

//handlers\backend_login_handler.php
'backend_login_handler_text_1' => 'You have successfully authorized yourself to access the backend.',
'backend_login_handler_btn_1' => 'Go to the dashboard',
'backend_login_handler_text_2' => 'Your session has been terminated for security reasons.',
'backend_login_handler_btn_2' => 'Return',
//handlers\backend_login_handler.php

//handlers\backend_logout_handler.php
'backend_logout_handler_text' => 'You have been successfully logged out.',
'backend_logout_handler_btn' => 'Back to the homepage',
//handlers\backend_logout_handler.php

//handlers\blocklist_handler.php
'blocklist_handler_text_1' => 'The command was successfully executed.',
'blocklist_handler_btn_1' => 'Return',
'blocklist_handler_text_2' => 'Your session has been terminated for security reasons.',
'blocklist_handler_btn_2' => 'Return',
//handlers\blocklist_handler.php

//handlers\error_log_handler.php
'error_log_handler_text_1' => 'The error log has been successfully cleared.',
'error_log_handler_btn_1' => 'Return',
'error_log_handler_text_2' => 'Your session has been terminated for security reasons.',
'error_log_handler_btn_2' => 'Return',
//handlers\error_log_handler.php

//handlers\manage_blog_handler.php
'manage_blog_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'manage_blog_handler_csrf_btn' => 'Return',
'manage_blog_handler_text_1' => 'The requested blog post does not exist.',
'manage_blog_handler_btn_1' => 'Return',
'manage_blog_handler_text_2' => 'The blog post has been successfully saved.',
'manage_blog_handler_btn_2' => 'Return',
'manage_blog_handler_text_3' => 'The blog post has been successfully edited.',
'manage_blog_handler_btn_3' => 'Return',
'manage_blog_handler_text_4' => 'The blog post has been successfully removed.',
'manage_blog_handler_btn_4' => 'Return',
//handlers\manage_blog_handler.php

//handlers\manage_contents_handler.php
'manage_contents_csrf_text' => 'Your session has been terminated for security reasons.',
'manage_contents_csrf_btn' => 'Return',
'manage_contents_text_1' => 'The requested content does not exist.',
'manage_contents_btn_1' => 'Return',
'manage_contents_text_2' => 'The custom content has been successfully saved.',
'manage_contents_btn_2' => 'Return',
'manage_contents_text_3' => 'The custom content has been successfully edited.',
'manage_contents_btn_3' => 'Return',
'manage_contents_text_4' => 'The custom content has been successfully removed.',
'manage_contents_btn_4' => 'Return',
//handlers\manage_contents_handler.php

//handlers\manage_navigations_handler.php
'manage_navigations_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'manage_navigations_handler_csrf_btn' => 'Return',
'manage_navigations_handler_text_1' => 'Such a primary navigation element does not exist.',
'manage_navigations_handler_btn_1' => 'Return',
'manage_navigations_handler_text_2' => 'Such a secondary navigation element does not exist.',
'manage_navigations_handler_btn_2' => 'Return',
'manage_navigations_handler_text_3' => 'The element for primary navigation has been successfully created.',
'manage_navigations_handler_btn_3' => 'Return',
'manage_navigations_handler_text_4' => 'The element for secondary navigation has been successfully created.',
'manage_navigations_handler_btn_4' => 'Return',
'manage_navigations_handler_text_5' => 'The primary navigation element has been successfully edited.',
'manage_navigations_handler_btn_5' => 'Return',
'manage_navigations_handler_text_6' => 'The secondary navigation element has been successfully edited.',
'manage_navigations_handler_btn_6' => 'Return',
'manage_navigations_handler_text_7' => 'The primary navigation element has been successfully removed.',
'manage_navigations_handler_btn_7' => 'Return',
'manage_navigations_handler_text_8' => 'The secondary navigation element has been successfully removed.',
'manage_navigations_handler_btn_8' => 'Return',
//handlers\manage_navigations_handler.php

//handlers\settings_handler.php
'settings_handler_text_1' => 'The settings have been successfully updated.',
'settings_handler_btn_1' => 'Return',
'settings_handler_text_2' => 'Your session has been terminated for security reasons.',
'settings_handler_btn_2' => 'Return',
//handlers\settings_handler.php

//handlers\upload_files_handler.php
'upload_files_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'upload_files_handler_csrf_btn' => 'Return',
'upload_files_handler_text_1' => 'The file you are looking for does not exist.',
'upload_files_handler_btn_1' => 'Return',
'upload_files_handler_text_2' => 'Your file has been successfully uploaded.',
'upload_files_handler_btn_2' => 'Return',
'upload_files_handler_text_3' => 'The file has been successfully edited.',
'upload_files_handler_btn_3' => 'Return',
'upload_files_handler_text_4' => 'The file has been successfully removed.',
'upload_files_handler_btn_4' => 'Return',
//handlers\upload_files_handler.php

//handlers\users_handler.php
'users_handler_csrf_text' => 'Your session has been terminated for security reasons.',
'users_handler_csrf_btn' => 'Return',
'users_handler_text_1' => 'The user has been successfully removed.',
'users_handler_btn_1' => 'Return',
'users_handler_text_2' => 'The user level have been successfully updated.',
'users_handler_btn_2' => 'Return',
//handlers\users_handler.php

//templates\backend_templates\activity_log_template.php
'activity_log_template_ip_address' => 'IP address',
'activity_log_template_browser' => 'Browser',
'activity_log_template_requested_url' => 'Requested URL',
'activity_log_template_timestamp' => 'Timestamp',
'activity_log_template_registered_user' => 'Registered user',
'activity_log_template_no_user' => 'No registered user',
'activity_log_template_no_entries_title' => 'No entries in the activity log',
'activity_log_template_no_entries_text' => 'There are no entries in the activity log.',
//templates\backend_templates\activity_log_template.php

//templates\backend_templates\backend_login_template.php
'backend_login_template_label_username' => 'Username',
'backend_login_template_label_password' => 'Registered user',
'backend_login_template_btn' => 'Authentication for the backend',
'backend_login_template_btn_return' => 'Return to home page',
//templates\backend_templates\backend_login_template.php

//templates\backend_templates\blocklist_template.php
'blocklist_template_title_1' => 'Blocklist for registration',
'blocklist_template_text_1' => 'In this section, usernames, email prefixes, and email domains can be blocked, preventing them from being accepted during registration. The system is based on prefixes that must be used to declare the type of data to be blocked. Saving or removing is done via the respective prefix.',
'blocklist_template_label_command' => 'Enter a command',
'blocklist_template_btn' => 'Submit',
'blocklist_template_title_2' => 'Blocked usernames',
'blocklist_template_text_2' => 'Currently, no usernames have been excluded from registration.',
'blocklist_template_title_3' => 'Blocked email names',
'blocklist_template_text_3' => 'Currently, no email names have been excluded from registration.',
'blocklist_template_title_4' => 'Blocked email addresses',
'blocklist_template_text_4' => 'Currently, no email addresses have been excluded from registration.',
'blocklist_template_title_5' => 'Blocked email domains',
'blocklist_template_text_5' => 'Currently, no email domains have been excluded from registration.',
//templates\backend_templates\blocklist_template.php

//templates\backend_templates\dashboard_moderator_template.php
'dashboard_moderator_template_title' => 'Moderator dashboard',
'dashboard_moderator_template_text' => 'You are now viewing the moderator section of the dashboard.',
//templates\backend_templates\dashboard_moderator_template.php

//templates\backend_templates\dashboard_template.php
'dashboard_template_title_1' => 'Error system',
'dashboard_template_text_1' => 'This section displays general errors. If you dont see any errors here, then everything is working as expected.',
'dashboard_template_title_2' => 'System information',
'dashboard_template_title_3' => 'Most recent users',
'dashboard_template_text_3' => 'Currently, no users are registered.',
'dashboard_template_title_4' => 'Online users',
'dashboard_template_text_4' => 'Currently, no users are online.',
'dashboard_template_title_5' => 'Users who have not been activated',
'dashboard_template_text_5' => 'Currently, there are no users who have not been activated.',
'dashboard_template_title_6' => 'Moderators',
'dashboard_template_text_6' => 'Currently, there are no moderators.',
//templates\backend_templates\dashboard_template.php

//templates\backend_templates\error_log_template.php
'error_log_template_title_1' => 'Error log',
'error_log_template_text_1' => 'The error log can only be cleared once the errors have been resolved. Otherwise, they will be registered again.',
'error_log_template_btn' => 'Clear error log',
'error_log_template_error_number' => 'Error number',
'error_log_template_error_string' => 'Error string',
'error_log_template_error_file' => 'Error file',
'error_log_template_error_line' => 'Error line',
'error_log_template_registered_at' => 'Registered at',
'error_log_template_title_2' => 'No entries in the error log',
'error_log_template_text_2' => 'The error log contains no errors, so the system is working flawlessly.',
//templates\backend_templates\error_log_template.php

//templates\backend_templates\manage_blog_template.php
'manage_blog_template_label_1' => 'Edit the title of the blog post',
'manage_blog_template_label_2' => 'Edit the content the blog post',
'manage_blog_template_btn_1' => 'Edit',
'manage_blog_template_btn_2' => 'Remove',
'manage_blog_template_title_1' => 'Create a blog post',
'manage_blog_template_text_1' => 'In this section, a blog post can be created.',
'manage_blog_template_label_3' => 'Title of the blog post',
'manage_blog_template_label_4' => 'Content of the blog post',
'manage_blog_template_btn_3' => 'Submit',
'manage_blog_template_title_2' => 'Blog posts',
'manage_blog_template_text_2' => 'Back to creating a blog post.',
'manage_blog_template_text_3' => 'No blog post has been created yet.',
'manage_blog_template_title_3' => 'Uploaded files',
'manage_blog_template_text_4' => 'No files have been uploaded yet.',
//templates\backend_templates\manage_blog_template.php

//templates\backend_templates\manage_contents_template.php
'manage_contents_template_text_1' => 'View custom page',
'manage_contents_template_label_1' => 'Edit name for the URL',
'manage_contents_template_label_2' => 'Edit the title',
'manage_contents_template_label_3' => 'Edit the content of the page',
'manage_contents_template_btn_1' => 'Edit',
'manage_contents_template_btn_2' => 'Remove',
'manage_contents_template_title_1' => 'Create a custom page',
'manage_contents_template_text_2' => 'In this section, a custom page can be created. Keep in mind that it must then be assigned to a navigation menu.',
'manage_contents_template_label_4' => 'Name for the URL',
'manage_contents_template_label_5' => 'Enter a title',
'manage_contents_template_label_6' => 'Enter the content of the new page',
'manage_contents_template_btn_3' => 'Submit',
'manage_contents_template_title_2' => 'Contents',
'manage_contents_template_text_3' => 'Back to creating a custom page',
'manage_contents_template_text_4' => 'No custom page has been created yet.',
'manage_contents_template_title_3' => 'Uploaded files',
'manage_contents_template_text_5' => 'No files have been uploaded yet.',
//templates\backend_templates\manage_contents_template.php

//templates\backend_templates\manage_navigations_template.php
'manage_navigations_template_label_1' => 'Edit name for the URL',
'manage_navigations_template_label_2' => 'Edit name for the navigation element',
'manage_navigations_template_label_3' => 'Edit numerical order for the element',
'manage_navigations_template_btn_1' => 'Edit',
'manage_navigations_template_btn_2' => 'Remove',
'manage_navigations_template_title_1' => 'Create a primary navigation element',
'manage_navigations_template_label_4' => 'Enter a name for the URL',
'manage_navigations_template_label_5' => 'Enter a name for the navigation element',
'manage_navigations_template_label_6' => 'Establish a numerical order for the element',
'manage_navigations_template_btn_3' => 'Save',
'manage_navigations_template_title_2' => 'Create a secondary navigation element',
'manage_navigations_template_title_3' => 'Custom created pages that can be added to a navigation',
'manage_navigations_template_text_1' => 'Currently, there are no custom page creation options.',
'manage_navigations_template_title_4' => 'Primary navigation elements',
'manage_navigations_template_text_2' => 'Back to navigation management.',
'manage_navigations_template_text_3' => 'The primary navigation currently contains no elements.',
'manage_navigations_template_title_5' => 'Secondary navigation elements',
'manage_navigations_template_text_4' => 'Back to navigation management.',
'manage_navigations_template_text_5' => 'The secondary navigation currently contains no elements.',
//templates\backend_templates\manage_navigations_template.php

//templates\backend_templates\message_remove_user.php
'message_remove_user_text_1' => 'Are you sure you want to remove that user?',
'message_remove_user_btn_1' => 'Confirm',
'message_remove_user_btn_2' => 'Cancel',
//templates\backend_templates\message_remove_user.php

//templates\backend_templates\settings_template.php
'settings_template_title' => 'Settings',
'settings_template_btn' => 'Submit',
//templates\backend_templates\settings_template.php

//templates\backend_templates\upload_files_template.php
'upload_files_template_file_uploaded_by' => 'File uploaded by:',
'upload_files_template_file_name' => 'File name:',
'upload_files_template_label_1' => 'File title',
'upload_files_template_label_2' => 'File description',
'upload_files_template_btn_1' => 'Edit file',
'upload_files_template_btn_2' => 'Remove',
'upload_files_template_title_1' => 'Upload file',
'upload_files_template_text_1' => 'In this area, files can be uploaded that can later be integrated into your own content.',
'upload_files_template_label_3' => 'File title',
'upload_files_template_label_4' => 'File description',
'upload_files_template_label_5' => 'Search for file',
'upload_files_template_btn_3' => 'Upload file',
'upload_files_template_title_2' => 'Uploaded files',
'upload_files_template_text_2' => 'Back to uploading files',
'upload_files_template_text_3' => 'No files have been uploaded yet.',
//templates\backend_templates\upload_files_template.php

//templates\backend_templates\users_template.php
'users_template_username' => 'Username',
'users_template_email' => 'E-Mail',
'users_template_user_level' => 'User level',
'users_template_registered' => 'Registered',
'users_template_last_activity' => 'Last activity',
'users_template_remove' => 'Remove',
'users_template_change_user_level' => 'Change user level',
'users_template_online' => 'Online',
'users_template_btn_1' => 'Remove',
'users_template_btn_2' => 'Change',
'users_template_no_entries_title' => 'No registered users',
'users_template_no_entries_text' => 'There are currently no registered users.',
//templates\backend_templates\users_template.php

];
