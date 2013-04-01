<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

if ( $_POST ) {
	$team_id = abs(intval($_POST['team_id']));
	$consume = $_POST['consume'];
	if (!$team_id || !$consume) die('-ERR ERR_NO_DATA');
	
	$condition = array(
		'team_id' => $team_id,
		'consume' => $consume,
	);

	$coupons = DB::LimitQuery('coupon', array(
		'condition' => $condition,
	));

	if (!$coupons) die('-ERR ERR_NO_DATA');
	$team = Table::Fetch('team', $team_id);
	$name = 'coupon_'.date('Ymd');
	$kn = array(
		'id' => 'id',
		'secret' => 'password',
		'date' => 'date',
		'consume' => 'consume',
		);

	$consume = array(
		'Y' => 'consumed',
		'N' => 'unconsumed',
	);
	$ecoupons = array();
	foreach( $coupons AS $one ) {
		$one['id'] = "#{$one['id']}";
		$one['consume'] = $consume[$one['consume']];
		$one['date'] = date('Y-m-d', $one['expire_time']);
		$ecoupons[] = $one;
	}
	down_xls($ecoupons, $kn, $name);
}

include template('manage_market_downcoupon');
