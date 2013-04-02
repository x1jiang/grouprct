<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);

$system = Table::Fetch('system', 1);

if ($_POST) {
	unset($_POST['commit']);
	/* hot city convert */
	$cityname = preg_split('/[\s,]+/', $_POST['hotcity'], -1, PREG_SPLIT_NO_EMPTY);
	$hotcity = array();
	$cities = DB::LimitQuery('category', array(
		'condition' => array(
			'name' => $cityname,
			'zone' => 'city',
		),
	));
	$oa = Utility::OptionArray($cities, 'name', 'id');
	$_POST['hotcity'] = array();
	foreach($cityname AS $one) { $_POST['hotcity'][] = $oa[$one]; }
	/* merget */
	$INI = Config::MergeINI($INI, $_POST);
	$INI = ZSystem::GetUnsetINI($INI);
	/* end */

	$value = Utility::ExtraEncode($INI);
	$table = new Table('system', array('value'=>$value));
	if ( $system ) $table->SetPK('id', 1);
	$flag = $table->update(array( 'value'));

	Session::Set('notice', 'Update succeed.');
	redirect( WEB_ROOT . '/manage/system/city.php');	
}

$hotcity = Utility::GetColumn($hotcities, 'name');
$hotcity = join(', ', $hotcity);
include template('manage_system_city');
