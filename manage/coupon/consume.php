<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$daytime = strtotime(date('Y-m-d'));
$condition = array(
	'consume' => 'Y',
);

$count = Table::Count('coupon', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$coupons = DB::LimitQuery('coupon', array(
	'condition' => $condition,
	'order' => 'ORDER BY consume_time DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$users = Table::Fetch('user', Utility::GetColumn($coupons, 'user_id'));
$teams = Table::Fetch('team', Utility::GetColumn($coupons, 'team_id'));
$selector = 'index';
include template('manage_coupon_consume');
