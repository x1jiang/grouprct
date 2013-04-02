<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

$key = $INI['tenpay']['sec'];

$resHandler = new PayResponseHandler();
$resHandler->setKey($key);
if($resHandler->isTenpaySign()) {
	$v_oid = $resHandler->getParameter("sp_billno");
	$v_amount = moneyit($resHandler->getParameter("total_fee")*0.01);
	$pay_result = $resHandler->getParameter("pay_result");
	list($_, $order_id, $quantity, $_) = explode('-', $v_oid, 4);

	if( "0" == $pay_result ) {

		/* charge */
		if ( $_ == 'charge' ) {
			@list($_, $user_id, $create_time, $_) = explode('-', $v_oid, 4);
			if(ZFlow::CreateFromCharge($v_amount, $user_id, $create_time, 'tenpay')){
				Session::Set('notice', "财付通充值{$v_amount}元成功！");
			}
			redirect(WEB_ROOT . '/credit/index.php');
		}
		/* end charge */

		$order = Table::Fetch('order', $order_id);
		if (  $order['state'] == 'unpay' ) {
			//1
			$table = new Table('order');
			$table->SetPk('id', $order_id);
			$table->pay_id = $v_oid;
			$table->state = 'pay';
			$table->quantity = $quantity;
			$table->money = $v_amount;
			$flag = $table->update( array('state', 'pay_id', 'money', 'quantity') );

			/* credit calc */
			/*$user = Table::Fetch('user', $order['user_id']);
			Table::UpdateCache('user', $order['user_id'], array(
						'money' => ($user['money'] - $order['credit']),
						));
			/* end */

			if ( $flag ) {
				$table = new Table('pay');
				$table->id = $v_oid;
				$table->order_id = $order_id;
				$table->money = $v_amount;
				$table->currency = 'CNY';
				$table->bank = '财付通';
				$table->service = 'tenpay';
				$table->create_time = time();
				$table->insert( array('id', 'order_id', 'money', 'currency', 'service', 'create_time', 'bank') );

				//update team state//
				ZTeam::BuyOne($order);
			}
			//update team,user,order,flow state//
		}
		//die(0);
		$show = WEB_ROOT . "/order/pay.php?id={$order_id}";
		$resHandler->doShow($show);
	} 
}
include template('order_return_error');
?>
