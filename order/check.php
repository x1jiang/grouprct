<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = abs(intval($_GET['id']));
$order = Table::Fetch('order', $id);
if (!$order) { 
	Session::Set('error', 'Order not exist.');
	redirect( WEB_ROOT . '/index.php' );
}
$team = Table::Fetch('team', $order['team_id']);
$team['state'] = team_state($team);

if ( $team['close_time'] ) {
	redirect( WEB_ROOT . "/team.php?id={$id}");
}

if ( $order['state'] == 'unpay' ) {
	if($INI['alipay']['mid'] && $order['service']=='alipay') {
		$ordercheck['alipay'] = 'checked';
	}
	else if($INI['chinabank']['mid'] && $order['service']=='chinabank') {
		$ordercheck['chinabank'] = 'checked';
	}
	else if($INI['tenpay']['mid'] && $order['service']=='tenpay') {
		$ordercheck['tenpay'] = 'checked';
	}
	else if($INI['alipay']['mid']) {
		$ordercheck['alipay'] = 'checked';
	}
	else if($INI['tenpay']['mid']) {
		$ordercheck['tenpay'] = 'checked';
	}
	else if($INI['chinabank']['mid']) {
		$ordercheck['chinabank'] = 'checked';
	}
	die(include template('order_check'));
}

redirect( WEB_ROOT . "/order/view.php?id={$id}");
