<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

if ( $_POST ) {
	$team_id = abs(intval($_POST['team_id']));
	$service = $_POST['service'];
	$state = $_POST['state'];
	if (!$team_id || !$service || !$state) die('-ERR ERR_NO_DATA');
	
	$condition = array(
		'service' => $service,
		'state' => $state,
		'team_id' => $team_id,
	);
	$orders = DB::LimitQuery('order', array(
		'condition' => $condition,
		'order' => 'ORDER BY id DESC',
	));

	if (!$orders) die('-ERR ERR_NO_DATA');
	$team = Table::Fetch('team', $team_id);
	$name = 'order_'.date('Ymd');
	$kn = array(
			'id' => 'id',
			'pay_id' => 'pay id',
			'service' => 'service',
			'price' => 'price',
			'quantity' => 'quantity',
			'fare' => 'fare fee',
			'origin' => 'total amount',
			'money' => 'money',
			'credit' => 'credit',
			'state' => 'pay state',
			'remark' => 'remark',
			'express' => 'express info',
			'username' => 'username',
			'useremail' => 'useremail',
			'usermobile' => 'usermobile',
			);

	if ( $team['delivery'] == 'express' ) {
		$kn = array_merge($kn, array(
					'realname' => 'realname',
					'mobile' => 'mobile',
					'zipcode' => 'zipcode',
					'address' => 'address',
					));
	}
	$pay = array(
			'alipay' => 'alipay',
			'tenpay' => 'tenpay',
			'chinabank' => 'chinabank',
			'credit' => 'credit',
			'cash' => 'cash',
			'' => 'others',
			);
	$state = array(
			'unpay' => 'unpay',
			'pay' => 'pay',
			);
	$eorders = array();
	foreach( $orders AS $one ) {
		$one['fare'] = ($one['delivery'] == 'express') ? $one['fare'] : 0;
		$one['service'] = $pay[$one['service']];
		$one['price'] = $team['market_price'];
		$one['state'] = $state[$one['state']];
		$eorders[] = $one;
	}
	down_xls($eorders, $kn, $name);
}

include template('manage_market_downorder');
