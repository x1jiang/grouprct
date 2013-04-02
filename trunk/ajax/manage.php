<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

if ( 'orderrefund' == $action) {
	$order = Table::Fetch('order', $id);
	$rid = strtolower(strval($_GET['rid']));
	if ( $rid == 'credit' ) {
		ZFlow::CreateFromRefund($order);
	} else {
		Table::UpdateCache('order', $id, array('state' => 'unpay'));
	}
	/* team -- */
	$team = Table::Fetch('team', $order['team_id']);
	team_state($team);
	if ( $team['state'] != 'failure' ) {
		$minus = $team['conduser'] == 'Y' ? 1 : $order['quantity'];
		Table::UpdateCache('team', $team['id'], array(
					'now_number' => array( "now_number - {$minus}", ),
		));
	}
	/* card refund */
	if ( $order['card_id'] ) {
		Table::UpdateCache('card', $order['card_id'], array(
			'consume' => 'N',
			'team_id' => 0,
			'order_id' => 0,
		));
	}
	/* coupons */
	if ( in_array($team['delivery'], array('coupon', 'pickup') )) {
		$coupons = Table::Fetch('coupon', array($order['id']), 'order_id');
		foreach($coupons AS $one) Table::Delete('coupon', $one['id']);
	}

	/* order update */
	Table::UpdateCache('order', $id, array(
				'card' => 0, 
				'card_id' => '',
				'express_id' => 0,
				'express_no' => '',
				));
	Session::Set('notice', 'Succeed to refund');
	json(null, 'refresh');
}
elseif ( 'orderremove' == $action) {
	$order = Table::Fetch('order', $id);
	if ( $order['state'] != 'unpay' ) {
		json('CANNOT delete paid order', 'alert');
	}
	/* card refund */
	if ( $order['card_id'] ) {
		Table::UpdateCache('card', $order['card_id'], array(
			'consume' => 'N',
			'team_id' => 0,
			'order_id' => 0,
		));
	}
	Table::Delete('order', $order['id']);
	Session::Set('notice', "Succeed to delete order {$order['id']}.");
	json(null, 'refresh');
}
else if ( 'ordercash' == $action ) {
	$order = Table::Fetch('order', $id);
	ZOrder::CashIt($order);
	$user = Table::Fetch('user', $order['user_id']);
	Session::Set('notice', "Succeed to pay cash for order，user：{$user['email']}");
	json(null, 'refresh');
}
else if ( 'teamdetail' == $action) {
	$team = Table::Fetch('team', $id);
	$partner = Table::Fetch('partner', $team['partner_id']);

	$paycount = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	));
	$buycount = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'quantity');
	$onlinepay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'money');
	$creditpay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'credit');
	$cardpay = Table::Count('order', array(
		'state' => 'pay',
		'team_id' => $id,
	), 'card');
	$couponcount = Table::Count('coupon', array(
		'team_id' => $id,
	));
	$team['state'] = team_state($team);
	$city_id = abs(intval($team['city_id']));
	$subcond = array(); if($city_id) $subcond['city_id'] = $city_id;
	$subcount = Table::Count('subscribe', $subcond);
	$subcond['enable'] = 'Y';
	$smssubcount = Table::Count('smssubscribe', $subcond);

	/* send team subscribe mail */	
	$team['noticesubscribe'] = ($team['close_time']==0&&is_manager());
	$team['noticesmssubscribe'] = ($team['close_time']==0&&is_manager());
	/* send success coupon */
	$team['noticesms'] = ($team['delivery']!='express')&&(in_array($team['state'], array('success', 'soldout')))&&is_manager();
	/* teamcoupon */
	$team['teamcoupon'] = ($team['noticesms']&&$buycount>$couponcount);
	$team['needline'] = ($team['noticesms']||$team['noticesubscribe']||$team['teamcoupon']);

	$html = render('manage_ajax_dialog_teamdetail');
	json($html, 'dialog');
}
else if ( 'teamremove' == $action) {
	$team = Table::Fetch('team', $id);
	$order_count = Table::Count('order', array(
		'team_id' => $id,
		'state' => 'pay',
	));
	if ( $order_count > 0 ) {
		json('CANNOT delete due to paid order in this group buy.', 'alert');
	}
	ZTeam::DeleteTeam($id);

	/* remove coupon */
	$coupons = Table::Fetch('coupon', array($id), 'team_id');
	foreach($coupons AS $one) Table::Delete('coupon', $one['id']);
	/* remove order */
	$orders = Table::Fetch('order', array($id), 'team_id');
	foreach($orders AS $one) Table::Delete('order', $one['id']);
	/* end */

	Session::Set('notice', "Succeed to delete Group buy {$id}.");
	json(null, 'refresh');
}
else if ( 'cardremove' == $action) {
	$id = strval($_GET['id']);
	$card = Table::Fetch('card', $id);
	if (!$card) json('No coupon', 'alert');
	if ($card['consume']=='Y') { json('Coupon has beed used,cannot delete.', 'alert'); }
	Table::Delete('card', $id);
	Session::Set('notice', "Succeed to delete coupon:{$id}.");
	json(null, 'refresh');
}
else if ( 'userview' == $action) {
	$user = Table::Fetch('user', $id);
	$html = render('manage_ajax_dialog_user');
	json($html, 'dialog');
}
else if ( 'usermoney' == $action) {
	$user = Table::Fetch('user', $id);
	$money = intval($_GET['money']);
	if ( ZFlow::CreateFromStore($id, $money) ) {
		$action = ($money>0) ? 'charge' : 'withdraw';
		$money = abs($money);
		json(array(
					array('data' => "succeed to charge {$action}{$money}", 'type'=>'alert'),
					array('data' => null, 'type'=>'refresh'),
				  ), 'mix');
	}
	json('Fail to charge', 'alert'); 
}
else if ( 'orderexpress' == $action ) {
	$express_id = abs(intval($_GET['eid']));
	$express_no = strval($_GET['nid']);
	if (!$express_id) $express_no = null;
	Table::UpdateCache('order', $id, array(
		'express_id' => $express_id,
		'express_no' => $express_no,
	));
	json(array(
				array('data' => "Succeed to change delivery info", 'type'=>'alert'),
				array('data' => null, 'type'=>'refresh'),
			  ), 'mix');
}
else if ( 'orderview' == $action) {
	$order = Table::Fetch('order', $id);
	$user = Table::Fetch('user', $order['user_id']);
	$team = Table::Fetch('team', $order['team_id']);
	if ($team['delivery'] == 'express') {
		$option_express = option_category('express');
	}
	$payservice = array(
		'alipay' => 'alipay',
		'tenpay' => 'tenpay',
		'chinabank' => 'chinabank',
		'credit' => 'credit',
		'cash' => 'cash',
	);
	$paystate = array(
		'unpay' => '<font color="green">unpay</font>',
		'pay' => '<font color="red">pay</font>',
	);
	$option_refund = array(
		'credit' => 'refund to account',
		'online' => 'refund through other channels',
	);
	$html = render('manage_ajax_dialog_orderview');
	json($html, 'dialog');
}
else if ( 'inviteok' == $action ) {
	$invite = Table::Fetch('invite', $id);
	if (!$invite || $invite['pay']!='N') {
		json('No right to do so.', 'alert');
	}
	if(!$invite['team_id']) {
		json('No buying action.', 'alert');
	}
	$team = Table::Fetch('team', $invite['team_id']);
	$team_state = team_state($team);
	if (!in_array($team_state, array('success', 'soldout'))) {
		json('Only successful group buy can get bonus.', 'alert');
	}
	Table::UpdateCache('invite', $id, array(
				'pay' => 'Y', 
				'admin_id'=>$login_user_id,
				));
	$invite = Table::FetchForce('invite', $id);
	ZFlow::CreateFromInvite($invite);
	Session::Set('notice', 'Succeed to get invitation bonus.');
	json(null, 'refresh');
}
else if ( 'inviteremove' == $action ) {
	Table::Delete('invite', $id);
	Session::Set('notice', 'Delete the wrong invitation record.');
	json(null, 'refresh');
}
else if ( 'subscriberemove' == $action ) {
	$subscribe = Table::Fetch('subscribe', $id);
	if ($subscribe) {
		ZSubscribe::Unsubscribe($subscribe);
		Session::Set('notice', "Succeed to unsubscribe email address：{$subscribe['email']}.");
	}
	json(null, 'refresh');
}
else if ( 'smssubscriberemove' == $action ) {
	$subscribe = Table::Fetch('smssubscribe', $id);
	if ($subscribe) {
		ZSMSSubscribe::Unsubscribe($subscribe['mobile']);
		Session::Set('notice', "Succeed to unsubscribe cell phone：{$subscribe['mobile']}.");
	}
	json(null, 'refresh');
}
else if ( 'partnerremove' == $action ) {
	$partner = Table::Fetch('partner', $id);
	$count = Table::Count('team', array('partner_id' => $id) );
	if ($partner && $count==0) {
		Table::Delete('partner', $id);
		Session::Set('notice', "Succeed to delete merchant：{$id}.");
		json(null, 'refresh');
	}
	if ( $count > 0 ) {
		json('Fail to delete,the merchant has ongoing group buy item.', 'alert'); 
	}
	json('Fail to delete the merchant.', 'alert'); 
}
else if ( 'noticesms' == $action ) {
	$nid = abs(intval($_GET['nid']));
	$now = time();
	$team = Table::Fetch('team', $id);
	$condition = array( 'team_id' => $id, );
	$coups = DB::LimitQuery('coupon', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 1,
				));
	if ( $coups ) {
		foreach($coups AS $one) {
			$nid++;
			sms_coupon($one);
		}
		json("X.misc.noticesms({$id},{$nid});", 'eval');
	} else {
		json($INI['system']['couponname'].'send completely', 'alert');
	}
}
else if ( 'noticesmssubscribe' == $action ) {
	$nid = abs(intval($_GET['nid']));
	$team = Table::Fetch('team', $id);
	$condition = array( 'enable' => 'Y' );
	if(abs(intval($team['city_id']))) {
		$condition['city_id'] = abs(intval($team['city_id']));
	}
	$subs = DB::LimitQuery('smssubscribe', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 10,
				));
	$content = render('manage_tpl_smssubscribe');
	if ( $subs ) {
		$mobiles = Utility::GetColumn($subs, 'mobile');
		$nid += count($mobiles);
		$mobiles = implode(',', $mobiles);
		$smsr = sms_send($mobiles, $content);
		if ( true === $smsr ) {
			usleep(500000);
			json("X.misc.noticenextsms({$id},{$nid});", 'eval');
		} else {
			json("Fail to send，error code：{$smsr}", 'alert');
		}
	} else {
		json('Send the subscribing SMS completely.', 'alert');
	}
}
else if ( 'noticesubscribe' == $action ) {
	$nid = abs(intval($_GET['nid']));
	$now = time();
	$team = Table::Fetch('team', $id);
	$partner = Table::Fetch('partner', $team['partner_id']);
	$city = Table::Fetch('category', $team['city_id']);
	$condition = array( 'city_id' => $team['city_id'], );
	$subs = DB::LimitQuery('subscribe', array(
				'condition' => $condition,
				'order' => 'ORDER BY id ASC',
				'offset' => $nid,
				'size' => 1,
				));
	if ( $subs ) {
		foreach($subs AS $one) {
			$nid++;
			try{
				ob_start();
				mail_subscribe($city, $team, $partner, $one);
				ob_get_clean();
			}catch(Exception $e){}
			$cost = time() - $now;
			if ( $cost >= 20 ) {
				json("X.misc.noticenext({$id},{$nid});", 'eval');
			}
		}
		json("X.misc.noticenext({$id},{$nid});", 'eval');
	} else {
		json('Send the subscribing email completely.', 'alert');
	}
}
elseif ( 'categoryedit' == $action ) {
	if ($id) {
		$category = Table::Fetch('category', $id);
		if (!$category) json('No data', 'alert');
		$zone = $category['zone'];
	} else {
		$zone = strval($_GET['zone']);
	}
	if ( !$zone ) json('Make sure the category', 'alert');
	$zone = get_zones($zone);

	$html = render('manage_ajax_dialog_categoryedit');
	json($html, 'dialog');
}
elseif ( 'categoryremove' == $action ) {
	$category = Table::Fetch('category', $id);
	if (!$category) json('No such category', 'alert');
	if ($category['zone'] == 'city') {
		$tcount = Table::Count('team', array('city_id' => $id));
		if ($tcount ) json('Group buy item exists in this category.', 'alert');
	}
	elseif ($category['zone'] == 'group') {
		$tcount = Table::Count('team', array('group_id' => $id));
		if ($tcount ) json('Group buy item exists in this category.', 'alert');
	}
	elseif ($category['zone'] == 'express') {
		$tcount = Table::Count('order', array('express_id' => $id));
		if ($tcount ) json('Group buy orders exists in this category.', 'alert');
	}
	elseif ($category['zone'] == 'public') {
		$tcount = Table::Count('topic', array('public_id' => $id));
		if ($tcount ) json('Group buy topics exists in this category.', 'alert');
	}
	Table::Delete('category', $id);
	option_category($category['zone']);
	Session::Set('notice', 'Succeed to delete the category.');
	json(null, 'refresh');
}
else if ( 'teamcoupon' == $action ) {
	$team = Table::Fetch('team', $id);
	team_state($team);
	if (!$team['close_time'] || $team['now_number']<$team['min_number'])
		json('Group buy not ending or not reaching the lowest limit.', 'alert');
	$orders = DB::LimitQuery('order', array(
				'condition' => array(
					'team_id' => $id,
					'state' => 'pay',
					),
				));
	foreach($orders AS $order) {
		ZCoupon::Create($order);
	}
	json('Succeed to send coupon.',  'alert');
}
