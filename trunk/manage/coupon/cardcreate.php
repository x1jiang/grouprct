<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

if (is_post()){
	$card = $_POST;

	$card['quantity'] = abs(intval($card['quantity']));
	$card['money'] = abs(intval($card['money']));
	$card['partner_id'] = abs(intval($card['partner_id']));
	$card['begin_time'] = strtotime($card['begin_time']);
	$card['end_time'] = strtotime($card['end_time']);

	$error = array();
	if ( $card['money'] < 1 ) {
		$error[] = "cannot be less than 1";
	}
	if ( $card['quantity'] < 1 || $card['quantity'] > 1000 ) {
		$error[] = "quantity is 1-1000";
	}
	$today = strtotime(date('Y-m-d'));
	if ( $card['begin_time'] < $today ) {
		$error[] = "Begin time cannot be less than today.";
	}
	elseif ( $card['end_time'] < $card['begin_time'] ) {
		$error[] = "end time cannot be less than begin time";
	}
	if ( !$error && ZCard::CardCreate($card) ) {
		Session::Set('notice', "succeed to create {$card['quantity']} cards.");
		redirect(WEB_ROOT . '/manage/coupon/cardcreate.php');
	}
	$error = join("<br />", $error);
	Session::Set('error', $error);
}
else {
	$card = array(
		'begin_time' => time(),
		'end_time' => strtotime('+3 months'),
		'quantity' => 10,
		'money' => 10,
		'code' => date('Ymd').'_ZT',
	);
}

include template('manage_coupon_cardcreate');
