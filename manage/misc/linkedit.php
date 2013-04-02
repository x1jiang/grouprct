<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$id = abs(intval($_REQUEST['id']));
$friendlink = Table::Fetch('friendlink', $id);
$table = new Table('friendlink', $_POST);
$table->letter = strtoupper($table->letter);
$uarray = array( 'title','url','logo','sort_order'); 

if (!$_POST['title'] || !$_POST['url'] ) {
	Session::Set('error', 'website name and URL cannot be empty.');
	redirect(null);
}

if ( $friendlink ) {
	if ( $flag = $table->update( $uarray ) ) {
		Session::Set('notice', 'Edit succeed.');
	} else {
		Session::Set('error', 'Edit fail.');
	}
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'Add OK.');
	} else {
		Session::Set('error', 'Add fail.');
	}
}

redirect(null);
