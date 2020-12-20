<?php

return [

	'user-management' => [
		'title' => 'User Management',
		'fields' => [
			'created_at' => 'Time',
			'updated_at' => 'Modified time',
		],
	],

	'permissions' => [
		'title' => 'Permissions',
		'fields' => [
			'name' => 'Name',
			'guard_name' => 'Guard name',
			'created_at' => 'Time',
			'updated_at' => 'Modified time',
		],
	],

	'roles' => [
		'title' => 'Roles',
		'fields' => [
			'name' => 'Name',
			'permission' => 'Permissions',
			'created_at' => 'Time',
			'updated_at' => 'Modified time',
		],
	],

	'users' => [
		'title' => 'Users',
		'fields' => [
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
			'created_at' => 'Time',
			'updated_at' => 'Modified time',
		],
	],
	'app_create' => 'Create',
	'app_save' => 'Save',
	'app_edit' => 'Edit',
	'app_view' => 'View',
	'app_back' => 'Back',
	'app_update' => 'Update',
	'app_list' => 'List',
	'app_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'app_logout' => 'Logout',
	'app_add_new' => 'Add new',
	'app_are_you_sure' => 'Are you sure?',
	'app_back_to_list' => 'Back to list',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Delete',
	'global_title' => 'laraACL',
];
