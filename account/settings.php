<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();
if ( $_POST ) {
	$update = array(
		'email' => $_POST['email'],
		'username' => $_POST['username'],
		'realname' => $_POST['realname'], 
		'zipcode' => $_POST['zipcode'],
		'address' => $_POST['address'],
		'mobile' => $_POST['mobile'], 
		'gender' => $_POST['gender'], 
		'city_id' => $_POST['city_id'],
		'qq' => $_POST['qq'],
		'city_id' => $_POST['city_id'],
	);
	$avatar = upload_image('upload_image',$login_user['avatar'],'user');
	$update['avatar'] = $avatar;

	if ( $_POST['password'] == $_POST['password2']
			&& $_POST['password'] ) {
		$update['password'] = $_POST['password'];
	}

	if ( ZUser::Modify($login_user['id'], $update) ) {
		Session::Set('notice', 'Succeed to modify account info.');
		redirect( WEB_ROOT . '/account/settings.php ');
	} else {
		Session::Set('error', 'Fail to modify account info.');
	}
}

$readonly['email'] = defined('UC_API') ? '' : 'readonly';
$readonly['username'] = defined('UC_API') ? 'readonly' : '';

include template('account_settings');
