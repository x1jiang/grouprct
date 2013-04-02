<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);
$system = Table::Fetch('system', 1);

if ($_POST) {
	unset($_POST['commit']);
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	$INI['system']['gzip'] = abs(intval($INI['system']['gzip']>0));
	$INI['system']['partnerdown'] = abs(intval($INI['system']['partnerdown']>0));
	$INI['system']['emailverify'] = abs(intval($INI['system']['emailverify']>0));
	$INI['system']['forum'] = abs(intval($INI['system']['forum']>0));
	$INI['system']['conduser'] = abs(intval($INI['system']['conduser']>0));

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Update succeed.');
	redirect( WEB_ROOT . '/manage/system/index.php');	
}

include template('manage_system_index');
