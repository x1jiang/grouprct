<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');

$id = abs(intval($_GET['id']));
$team = Table::Fetch('team', $id);

if ( $team['delivery']=='express' ) {
	$oc = array(
		'state' => 'pay',
		'team_id' => $id,
	);
	$orders = DB::LimitQuery('order', array('condition'=>$oc));
	$kn = array(
		'realname' => 'Name',
		'mobile' => 'Mobile number',
		'address' => 'Address',
	);
	$name = "team_{$id}_".date('Ymd');
	down_xls($orders, $kn, $name);
}
else {
	$cc = array(
		'team_id' => $id,
		);
	$coupons = DB::LimitQuery('coupon', array('condition'=>$cc));
	$users = Table::Fetch('user', Utility::GetColumn($coupons, 'user_id'));
	$kn = array(
		'email' => 'User ',
		'mobile' => 'Mobile number',
		'id' => "{$INI['system']['couponname']}ID",
		'secret' => "{$INI['system']['couponname']}Password",
	);
	
	$ecs = array();
	foreach($coupons As $o) {
		$u = $users[$o['user_id']];
		$ecs[] = array(
			'id' => $o['id'],
			'secret' => $o['secret'],
			'mobile' => $u['mobile'],
			'email' => $u['email'],
		);
	}
	$name = "team_{$id}_".date('Ymd');
	down_xls($ecs, $kn, $name);
}
