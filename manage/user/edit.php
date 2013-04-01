<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$id = abs(intval($_GET['id']));
$user = Table::Fetch('user', $id);

if ( $_POST && $id==$_POST['id'] ) {
	$table = new Table('user', $_POST);
	$up_array = array(
			'username', 'realname', 
			'mobile', 'zipcode', 'address',
			'secret',
			);
	if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
	if ( $id == 1 && $login_user_id > 1 ) {
		Session::Set('notice', 'No right to modify admin info');
		redirect( WEB_ROOT . "/manage/user/index.php");
	}
	$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
	if ($table->password ) {
		$table->password = ZUser::GenPassword($table->password);
		$up_array[] = 'password';
	}
	$flag = $table->update( $up_array );
	if ( $flag ) {
		Session::Set('notice', 'Update succeed.');
		redirect( WEB_ROOT . "/manage/user/edit.php?id={$id}");
	}
	Session::Set('error', 'Update fail.');
	$user = $_POST;
}

include template('manage_user_edit');
