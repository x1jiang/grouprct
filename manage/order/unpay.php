<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

$condition = array(
	'state' => 'unpay',
	'team_id > 0',
);

/* filter */
$uemail = strval($_GET['uemail']);
if ($uemail) {
	$uuser = Table::Fetch('user', $uemail, 'email');
	if($uuser) $condition['user_id'] = $uuser['id'];
	else $uemail = null;
}
$team_id = abs(intval($_GET['team_id']));
if ($team_id) {
	$condition['team_id'] = $team_id;
} else { $team_id = null; }
/* end filter */

$count = Table::Count('order', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('order', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$pay_ids = Utility::GetColumn($orders, 'pay_id');
$pays = Table::Fetch('pay', $pay_ids);

$user_ids = Utility::GetColumn($orders, 'user_id');
$users = Table::Fetch('user', $user_ids);

$team_ids = Utility::GetColumn($orders, 'team_id');
$teams = Table::Fetch('team', $team_ids);

include template('manage_order_unpay');
