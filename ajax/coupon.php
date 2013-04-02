<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$action = strval($_GET['action']);
$cid = strval($_GET['id']);
$sec = strval($_GET['secret']);

if ($action == 'dialog') {
	$html = render('ajax_dialog_coupon');
	json($html, 'dialog');
}
else if($action == 'query') {
	$coupon = Table::FetchForce('coupon', $cid);
	$partner = Table::Fetch('partner', $coupon['partner_id']);
	$team = Table::Fetch('team', $coupon['team_id']);
	$e = date('Y-m-d', $team['expire_time']);

	if (!$coupon) { 
		$v[] = "#{$cid}&nbsp;invalid";
	} else if ( $coupon['consume'] == 'Y' ) {
		$v[] = $INI['system']['couponname'] . 'invalid';
		$v[] = 'Consumed on：' . date('Y-m-d H:i:s', $coupon['consume_time']);
	} else if ( $coupon['expire_time'] < strtotime(date('Y-m-d')) ) {
		$v[] = "#{$cid}&nbsp;expired";
		$v[] = 'Expired date：' . date('Y-m-d', $coupon['consume_time']);
	} else {
		$v[] = "#{$cid}&nbsp;valid";
		$v[] = "{$team['title']}";
		$v[] = "valid to &nbsp;{$e}";
	}
	$v = join('<br/>', $v);
	$d = array(
			'html' => $v,
			'id' => 'coupon-dialog-display-id',
			);
	json($d, 'updater');
}

else if($action == 'consume') {
	$coupon = Table::FetchForce('coupon', $cid);
	$partner = Table::Fetch('partner', $coupon['partner_id']);
	$team = Table::Fetch('team', $coupon['team_id']);

	if (!$coupon) {
		$v[] = "#{$cid}&nbsp;invalide";
		$v[] = 'Fail to consume.';
	}
	else if ($coupon['secret']!=$sec) {
		$v[] = $INI['system']['couponname'] . 'ID not correct';
		$v[] = 'Fail to consume.';
	} else if ( $coupon['expire_time'] < strtotime(date('Y-m-d')) ) {
		$v[] = "#{$cid}&nbsp; expired";
		$v[] = 'expired time：' . date('Y-m-d', $coupon['consume_time']);
		$v[] = 'Fail to consume.';
	} else if ( $coupon['consume'] == 'Y' ) {
		$v[] = "#{$cid}&nbsp;consumed";
		$v[] = 'consume：' . date('Y-m-d H:i:s', $coupon['consume_time']);
		$v[] = 'Fail to consume.';
	} else {
		ZCoupon::Consume($coupon);
		//credit to user'money'
		$tip = ($coupon['credit']>0) ? " pay back {$coupon['credit']}" : '';
		$v[] = $INI['system']['couponname'] . 'valid';
		$v[] = 'consume：' . date('Y-m-d H:i:s', time());
		$v[] = 'Succeed to consume' . $tip;
	}
	$v = join('<br/>', $v);
	$d = array(
			'html' => $v,
			'id' => 'coupon-dialog-display-id',
			);
	json($d, 'updater');
}
else if ($action == 'sms') {
	$coupon = Table::Fetch('coupon', $cid);
	if ( $coupon['sms']>=5 && !is_manager() ) { 
		json('At most sending SMS 5 times', 'alert'); 
	}
	$interval = abs(intval($INI['sms']['interval']));
	$lefttime = $interval + $coupon['sms_time'] - time();
	if ( !is_manager() && $lefttime>0 ) {
		json("Please in {$lefttime} seconds,try to send coupon via SMS", 'alert');
	}
	if (!$coupon||!is_login()||($coupon['user_id']!= ZLogin::GetLoginId()&&!is_manager())) {
		json('No right to download', 'alert');
	}
	$flag = sms_coupon($coupon);
	if ( $flag === true ) {
		json('Succeed to send SMS.', 'alert');
	} else if ( is_string($flag) ) {
		json($flag, 'alert');
	}
	json("Fail to send SMS，error code：{$code}", 'alert');
}
