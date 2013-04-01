<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$daytime = strtotime(date('Y-m-d'));
$condition = array(
	'consume' => 'N',
	'expire_time >= ' . $daytime,
);

$count = Table::Count('coupon', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$coupons = DB::LimitQuery('coupon', array(
	'condition' => $condition,
	'order' => 'ORDER BY expire_time ASC',
	'size' => $pagesize,
	'offset' => $offset,
));

$users = Table::Fetch('user', Utility::GetColumn($coupons, 'user_id'));
$teams = Table::Fetch('team', Utility::GetColumn($coupons, 'team_id'));
$selector = 'index';
include template('manage_coupon_index');
