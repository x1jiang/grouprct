<?php
/*
 * author:fenghaidongchina@gmail.com
 */
require_once(dirname(dirname(__FILE__)) . '/app.php');
require_once(dirname(__FILE__) . '/paybank.php');

need_login();

if (is_post()) {
	$order_id = abs(intval($_POST['order_id']));
} else {
	if ( $_GET['id'] == 'charge' ) {
		redirect( WEB_ROOT. '/credit/index.php');
	}
	$order_id = $id = abs(intval($_GET['id']));
}
if(!$order_id || !($order = Table::Fetch('order', $order_id))) {
	redirect( WEB_ROOT. '/index.php');
}

if (is_post()&&$_POST['paytype']) {
	$uarray = array( 'service' => pay_getservice($_POST['paytype']) );
	Table::UpdateCache('order', $order_id, $uarray);
	$order = Table::Fetch('order', $order_id);
	$order['service'] = pay_getservice($_POST['paytype']);
}

//payed order
if ( $order['state'] == 'pay' ) {  
	if ( is_get() ) {
		$team = Table::Fetch('team', $order['team_id']);
		die(include template('order_pay_success'));		
	} else {
		redirect(WEB_ROOT  . "/order/pay.php?id={$order_id}");
	}
}

$team = Table::Fetch('team', $order['team_id']);
$randno = rand(1000,9999);
$total_money = moneyit($order['origin'] - $login_user['money']);
if ($total_money<0) { $total_money = 0; $order['service'] = 'credit'; }

/* credit pay */
if ( $_POST['action'] == 'redirect' ) {
	redirect($_POST['reqUrl']);
}
elseif ( $_POST['service'] == 'credit' ) {
	if ( $order['origin'] > $login_user['money'] ) {
		Table::Delete('order', $order_id);
		redirect( WEB_ROOT . '/order/index.php');
	}
	Table::UpdateCache('order', $order_id, array(
				'service' => 'credit',
				'money' => 0,
				'state' => 'pay',
				'credit' => $order['origin'],
				));
	$order = Table::FetchForce('order', $order_id);
	ZTeam::BuyOne($order);
	redirect( WEB_ROOT . "/order/pay.php?id={$order_id}");
}
elseif ( $order['service'] == 'chinabank' ) {
	/* credit pay */
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */

	$v_mid = $INI['chinabank']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/chinabank/return.php';
	$key   = $INI['chinabank']['sec'];
	$v_oid = "go-{$order['id']}-{$order['quantity']}-{$randno}";
	$v_amount = $total_money;
	$v_moneytype = 'CNY';
	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;
	$v_md5info = strtoupper(md5($text));

	include template('order_pay');
}
elseif ( $order['service'] == 'tenpay' ) {
	/* credit pay */
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */

	$v_mid = $INI['tenpay']['mid'];
	$v_url = $INI['system']['wwwprefix']. '/order/tenpay/return.php';
	$key   = $INI['tenpay']['sec'];
	$v_oid = "go-{$order['id']}-{$order['quantity']}-{$randno}";
	$v_amount = intval($total_money * 100);
	$v_moneytype = 'CNY';
	$text = $v_amount.$v_moneytype.$v_oid.$v_mid.$v_url.$key;

	/* must */
	$sp_billno = $v_oid;
	$transaction_id = $v_mid. date('Ymd'). date('His') .rand(1000,9999);
	$desc = $team['title'];
	/* end */
	
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);
	$reqHandler->setParameter("bargainor_id", $v_mid);
	$reqHandler->setParameter("cs", "UTF-8");
	$reqHandler->setParameter("sp_billno", $sp_billno);
	$reqHandler->setParameter("transaction_id", $transaction_id);
	$reqHandler->setParameter("total_fee", $v_amount);
	$reqHandler->setParameter("return_url", $v_url);
	$reqHandler->setParameter("desc", $desc);
	$reqHandler->setParameter("spbill_create_ip", Utility::GetRemoteIp());
	$reqUrl = $reqHandler->getRequestURL();

	if($_POST['paytype']!='tenpay') {
		$reqHandler->setParameter('bank_type', pay_getqqbank($_POST['paytype']));
		$reqUrl = $reqHandler->getRequestURL();
		redirect( $reqUrl );
	}

	include template('order_pay');
}
else if ( $order['service'] == 'alipay' ) {
	
	/* credit pay */
	$credit = moneyit($order['origin'] - $total_money);
	if ($order['credit']!=$credit) {
		Table::UpdateCache('order', $order_id, array('credit'=>$credit,));
	}
	/* end */

	$_input_charset = 'utf-8';
	$service = 'create_direct_pay_by_user';
	$partner = $INI['alipay']['mid'];
	$security_code = $INI['alipay']['sec'];
	$seller_email = $INI['alipay']['acc'];

	$sign_type = 'MD5';
	$out_trade_no = "go-{$order['id']}-{$order['quantity']}-{$randno}";

	$return_url = $INI['system']['wwwprefix'] . '/order/alipay/return.php';
	$notify_url = $INI['system']['wwwprefix'] . '/order/alipay/notify.php';
	$show_url =   $INI['system']['wwwprefix'] . "/team.php?id={$team['id']}";

	$subject = preg_replace('/[\r\n\s]+/','',strip_tags($team['title']));
	$body = $show_url;
	$quantity = $order['quantity'];

	$parameter = array(
			"service"         => $service,
			"partner"         => $partner,      
			"return_url"      => $return_url,  
			"notify_url"      => $notify_url, 
			"_input_charset"  => $_input_charset, 
			"subject"         => $subject,  	 
			"body"            => $body,     	
			"out_trade_no"    => $out_trade_no,
			"total_fee"       => $total_money,  
			"payment_type"    => "1",
			"show_url"        => $show_url,
			"seller_email"    => $seller_email,  
			);
	$alipay = new AlipayService($parameter, $security_code, $sign_type);
	$sign = $alipay->Get_Sign();
	include template('order_pay');
}
else if ( $order['service'] == 'credit' ) {
	$total_money = $order['origin'];
	die(include template('order_pay'));
} 
else {
	Session::Set('error', '无合适的支付方式或余额不足');
	redirect( WEB_ROOT. "/team.php?id={$order_id}");
}
