<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);
$pages = array(
	'help_tour' => 'Enjoy' . $INI['system']['abbreviation'],
	'help_faqs' => 'FAQz',
	'help_zuitu' => $INI['system']['abbreviation'].'?',
	'help_api' => 'API',
	'about_contact' => 'Contact',
	'about_us' => 'About ' . $INI['system']['abbreviation'],
	'about_job' => 'Jobs',
	'about_terms' => 'Protocles',
	'about_privacy' => 'Disclaimer',
);

$id = strval($_GET['id']);
if ( $id && !in_array($id, array_keys($pages))) { 
	redirect( WEB_ROOT . "/manage/system/page.php");
}
$n = Table::Fetch('page', $id);

if ( $_POST ) {
	$table = new Table('page', $_POST);
	$table->SetStrip('value');
	if ( $n ) {
		$table->SetPk('id', $id);
		$table->update( array('id', 'value') );
	} else {
		$table->insert( array('id', 'value') );
	}
	Session::Set('notice', "Page：{$pages[$id]} edit succeed.");
	redirect( WEB_ROOT . "/manage/system/page.php?id={$id}");
}

$value = $n['value'];
include template('manage_system_page');
