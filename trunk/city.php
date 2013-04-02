<?php
require_once(dirname(__FILE__) . '/app.php');

$ename = strval($_GET['ename']);

($currefer = strval($_GET['refer'])) || ($currefer = strval($_GET['r']));
if ($ename!='none') {
	$city = Table::Fetch('category', $ename, 'ename');
	if ($city) { 
		cookie_city($city);
		$currefer = udecode($currefer);
		if ($currefer) {
			redirect($currefer);
		} else if ( $_SERVER['HTTP_REFERER'] ) {
			if (!preg_match('#'.$_SERVER['HTTP_HOST'].'#', $_SERVER['HTTP_REFERER'])) {
				redirect( WEB_ROOT . '/index.php');
			}
			if (preg_match('#/city#', $_SERVER['HTTP_REFERER'])) {
				redirect(WEB_ROOT .'/index.php');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
		redirect(WEB_ROOT .'/index.php');
	}
}

$cities = DB::LimitQuery('category', array(
	'condition' => array( 'zone' => 'city') ,
));
$cities = Utility::AssColumn($cities, 'letter', 'ename');
include template('city');
