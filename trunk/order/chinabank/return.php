<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

$key = $INI['chinabank']['sec'];
$v_oid     = trim($_POST['v_oid']);  // 商户发送的v_oid定单编号   
$v_pmode   = trim($_POST['v_pmode']); // 支付方式（字符串）   
$v_pstatus = trim($_POST['v_pstatus']);   //支付状态 ：20 成功,30 失败
$v_pstring = trim($_POST['v_pstring']);   // 支付结果信息
$v_amount  = trim($_POST['v_amount']);     // 订单实际支付金额
$v_moneytype = trim($_POST['v_moneytype']); //订单实际支付币种    
$remark1   = trim($_POST['remark1' ]);      //备注字段1
$remark2   = trim($_POST['remark2' ]);     //备注字段2
$v_md5str  = trim($_POST['v_md5str' ]);   //拼凑后的MD5校验值  

/* 重新计算md5的值 */
$text = "{$v_oid}{$v_pstatus}{$v_amount}{$v_moneytype}{$key}";
$md5string = strtoupper(md5($text));

/* 判断返回信息，如果支付成功，并且支付结果可信，则做进一步的处理 */
if ($v_md5str == $md5string) {
	list($_, $order_id, $quantity, $_) = explode('-', $v_oid, 4);
	if($v_pstatus=="20") {

		/* charge */
		if ( $_ == 'charge' ) {
			@list($_, $user_id, $create_time, $_) = explode('-', $v_oid, 4);
			$service = 'chinabank';
			if(ZFlow::CreateFromCharge($v_amount,$user_id,$create_time,$service)) {
				Session::Set('notice', "网银在线充值{$v_amount}元成功！");
			};
			redirect(WEB_ROOT . '/credit/index.php');
		}
		/* end charge */

		//0
		$order = Table::Fetch('order', $order_id);
		if ( $order['state'] == 'unpay' ) {
			//1
			$table = new Table('order');
			$table->SetPk('id', $order_id);
			$table->pay_id = $v_oid;
			$table->state = 'pay';
			$table->quantity = $quantity;
			$table->money = $v_amount;
			$flag = $table->update( array('state', 'pay_id', 'money', 'quantity') );

			/* credit calc */
			/* $user = Table::Fetch('user', $order['user_id']);
			Table::UpdateCache('user', $order['user_id'], array(
						'money' => ($user['money'] - $order['credit']),
						));
			/* end */

			if ( $flag ) {
				$table = new Table('pay');
				$table->id = $v_oid;
				$table->order_id = $order_id;
				$table->money = $v_amount;
				$table->currency = $v_moneytype;
				$table->bank = mb_convert_encoding($v_pmode,'UTF-8','GBK');
				$table->service = 'chinabank';
				$table->create_time = time();
				$table->insert( array('id', 'order_id', 'money', 'currency', 'service', 'create_time', 'bank') );

				//update team state//
				ZTeam::BuyOne($order);
			}
			//update team,user,order,flow state//
		}
		redirect(WEB_ROOT . "/order/pay.php?id={$order_id}");
	} 
}
include template('order_return_error');
?>
