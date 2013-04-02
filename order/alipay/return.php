<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

$_input_charset = 'utf-8';
$partner = $INI['alipay']['mid'];
$security_code = $INI['alipay']['sec'];
$sign_type = 'MD5';
$transport = 'http';

/* very import, this value is add by my phpframewrok */
unset($_GET['param']);  
/* end */

$alipay = new AlipayNotify($partner, $security_code, $sign_type, $_input_charset, $transport);
$verify_result = $alipay->return_verify();

$out_trade_no = $_GET['out_trade_no'];   //获取订单号
$total_fee  = $_GET['total_fee'];      //获取总价格  
@list($_, $order_id, $quantity, $_) = explode('-', $out_trade_no, 4);

if ( $_ == 'charge' ) {
	if ( $verify_result ) {
		if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
			@list($_, $user_id, $create_time, $_) = explode('-', $out_trade_no, 4);
			if(ZFlow::CreateFromCharge($total_fee, $user_id, $create_time, 'alipay')){
				Session::Set('notice', "支付宝充值{$total_fee}元成功！");
			}
		}
	}
	redirect(WEB_ROOT . '/credit/index.php');
}

if($verify_result) {
	if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		$order = Table::Fetch('order', $order_id);
		if ( $order['state'] == 'unpay' ) {
			//1
			$table = new Table('order');
			$table->SetPk('id', $order_id);
			$table->pay_id = $out_trade_no;
			$table->money = $total_fee;
			$table->state = 'pay';
			$table->quantity = $quantity;
			$flag = $table->update(array('state', 'pay_id', 'total_fee', 'quantity'));

			if ( $flag ) {
				$table = new Table('pay');
				$table->id = $out_trade_no;
				$table->order_id = $order_id;
				$table->money = $total_fee;
				$table->currency = 'CNY';
				$table->bank = '支付宝';
				$table->service = 'alipay';
				$table->create_time = time();
				$table->insert( array('id', 'order_id', 'money', 'currency', 'service', 'create_time', 'bank') );

				//update team,user,order,flow state//
				ZTeam::BuyOne($order);
			}
		}
		redirect( WEB_ROOT . "/order/pay.php?id={$order_id}");
	}
}

redirect( WEB_ROOT . "/order/pay.php?id={$order_id}");
