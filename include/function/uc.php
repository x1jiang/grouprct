<?php
if(file_exists(WWW_ROOT . '/uc_client/index.php')) {
	require_once(WWW_ROOT . '/uc_client/index.php');
}

function zuitu_uc_login($email, $pass) {
	if (!function_exists('uc_user_login')) return array();
	if (!defined('UC_API')) return array();
	$isuid = strpos($email, '@') ? 2 : 0;
	if (strtolower(UC_CHARSET)!='utf-8') { $email = mb_convert_encoding($email, UC_CHARSET, 'UTF-8'); }
	$ucresult = uc_user_login($email, $pass, $isuid, 1);
	$uckey = array( 'uid', 'username', 'password', 'email', 'duplicate' );
	$ucresult = array_combine($uckey, $ucresult);
	DB::Query('SET NAMES UTF8;');
	if ($ucresult['uid']>0 && $ucresult['email'] ) {
		$eu = Table::Fetch('user', $ucresult['email'], 'email');
		if ( $eu ) {
			if ($eu['username'] != $ucresult['username']) {
				$epass = ZUser::GenPassword($ucresult['password']);
				Table::UpdateCache('user', $eu['id'], array(
					'username' => $ucresult['username'],
					'password' => $epass,
				));
				return Table::FetchForce('user', $eu['id']);
			}
			return $eu;
		}
		unset($ucresult['uid']);
		unset($ucresult['duplicate']);
		if (strtolower(UC_CHARSET)!='utf-8') { $ucresult['username'] = mb_convert_encoding($ucresult['username'], 'UTF-8', UC_CHARSET); }
		$newuser_id = ZUser::Create($ucresult, false);
		if ($newuser_id) {
			return Table::Fetch('user', $newuser_id);
		}
	}
	return array();
}

function zuitu_uc_register($email, $username, $password) {
	if (!function_exists('uc_user_login')) return true;
	if (!defined('UC_API')) return true;
	if (strtolower(UC_CHARSET)!='utf-8') { $username = mb_convert_encoding($username, UC_CHARSET, 'UTF-8'); }
	$uid = uc_user_register($username, $password, $email);
	DB::Query('SET NAMES UTF8;');
	return $uid > 0;
}

function zuitu_uc_updatepw($email, $username, $password) {
	if (!function_exists('uc_user_login')) return true;
	if (!defined('UC_API')) return true;
	if (strtolower(UC_CHARSET)!='utf-8') { 
		$username = mb_convert_encoding($username, UC_CHARSET, 'UTF-8'); 
		$email = mb_convert_encoding($email, UC_CHARSET, 'UTF-8'); 
	}
	$rid = uc_user_edit($username, $oldpw, $password, $email, 1);
	DB::Query('SET NAMES UTF8;');
	return $rid >= 0;
}

function zuitu_uc_synlogin($email, $pass) {
	if (!function_exists('uc_user_login')) return array();
	if (!defined('UC_API')) return array();
	$isuid = strpos($email, '@') ? 2 : 0;
	if (strtolower(UC_CHARSET)!='utf-8') { $email = mb_convert_encoding($email, UC_CHARSET, 'UTF-8'); }
	$ucresult = uc_user_login($email, $pass, $isuid, 1);
	$uckey = array( 'uid', 'username', 'password', 'email', 'duplicate' );
	$ucresult = array_combine($uckey, $ucresult);
	if ($ucresult['uid']>0 ) {
		$script_string = uc_user_synlogin($ucresult['uid']);
		Session::Set('script', $script_string);
	}
	DB::Query('SET NAMES UTF8;');
}

function zuitu_uc_synlogout() {
	if (!function_exists('uc_user_login')) return true;
	if (!defined('UC_API')) return true;
	$script_string = uc_user_synlogout();
	Session::Set('script', $script_string);
	DB::Query('SET NAMES UTF8;');
}
