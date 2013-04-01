<?php
class ZCoupon
{
	static public function Consume($coupon) {
		if ( !$coupon['consume']=='N' ) return false;
		$u = array(
			'ip' => Utility::GetRemoteIp(),
			'consume_time' => time(),
			'consume' => 'Y',
		);
		Table::UpdateCache('coupon', $coupon['id'], $u);
		ZFlow::CreateFromCoupon($coupon);
		return true;
	}

	static public function CheckOrder($order) {
		$coupon_array = array('coupon', 'pickup');
		$team = Table::FetchForce('team', $order['team_id']);
		if (!in_array($team['delivery'], $coupon_array)) return;
		if ( $team['now_number'] >= $team['min_number'] ) {
			//init coupon create;
			if ($team['now_number']-$team['min_number']<5) {
				$orders = DB::LimitQuery('order', array(
					'condition' => array(
						'team_id' => $order['team_id'],
						'state' => 'pay',
					),
				));
				foreach($orders AS $order) {
					self::Create($order);
				}
			}
			else{
				self::Create($order);
			}
		}
	}

	static public function Create($order) {
		$team = Table::Fetch('team', $order['team_id']);
		$partner = Table::Fetch('partner', $order['partner_id']);
		$ccon = array('order_id' => $order['id']);
		$count = Table::Count('coupon', $ccon);

		while($count<$order['quantity']) {
			$id = Utility::GenSecret(8, Utility::CHAR_NUM);
			$cv = Table::Fetch('coupon', $id);
			if ($cv) continue;
			$coupon = array(
					'id' => $id,
					'user_id' => $order['user_id'],
					'partner_id' => $team['partner_id'],
					'order_id' => $order['id'],
					'credit' => $team['credit'],
					'team_id' => $order['team_id'],
					'secret' => Utility::GenSecret(6, Utility::CHAR_WORD),
					'expire_time' => $team['expire_time'],
					'create_time' => time(),
					);
			DB::Insert('coupon', $coupon);
			sms_coupon($coupon);
			$count = Table::Count('coupon', $ccon);
		}
	}
}
