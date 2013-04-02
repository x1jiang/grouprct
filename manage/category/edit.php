<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$id = abs(intval($_REQUEST['id']));
$category = Table::Fetch('category', $id);
$table = new Table('category', $_POST);
$table->letter = strtoupper($table->letter);
$uarray = array('zone','ename','letter','name','czone','sort_order'); 

if (!$_POST['name'] || !$_POST['ename'] || !$_POST['letter']) {
	Session::Set('error', 'name,letter cannot to be empty');
	redirect(null);
}

if ( $category ) {
	if ( $flag = $table->update( $uarray ) ) {
		Session::Set('notice', 'Succeed to edit category.');
	} else {
		Session::Set('error', 'Fail to edit category.');
	}
	option_category($category['zone'], true);
} else {
	if ( $flag = $table->insert( $uarray ) ) {
		Session::Set('notice', 'Succeed to create category.');
	} else {
		Session::Set('error', 'Fail to create category.');
	}
}

option_category($table->zone, true);
redirect(null);
