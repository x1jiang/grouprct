<?php
class ZTeam
{
	static public function DeleteTeam($id) {
		$orders = Table::Fetch('order', array($id), 'team_id');
		foreach( $orders AS $one ) {
			if ($one['state']=='pay') return false;
			if ($order['card_id']) {
				Table::UpdateCache('card', $order['card_id'], array(
					'team_id' => 0,
					'order_id' => 0,
					'consume' => 'N',
				));
			}
			Table::Delete('order', $one['id']);
		}
		return Table::Delete('team', $id);
	}

	static public function BuyOne($order) {
		$order = Table::FetchForce('order', $order['id']);
		$team = Table::FetchForce('team', $order['team_id']);
		$plus = $team['conduser']=='Y' ? 1 : $order['quantity'];
		$team['now_number'] += $plus;
		if ( $team['max_number']>0 
				&& $team['now_number'] >= $team['max_number'] ) {
			$team['close_time'] = time();
		}
		Table::UpdateCache('team', $team['id'], array(
			'close_time' => $team['close_time'],
			'now_number' => array( "`now_number` + {$plus}", ),
		));

		/* cash flow */
		ZFlow::CreateFromOrder($order);
		/* order : send coupon ? */
		ZCoupon::CheckOrder($order);
		/* order : invite buy */
		ZInvite::CheckInvite($order);
	}
}
?>
