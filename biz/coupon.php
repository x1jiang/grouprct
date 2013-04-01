<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_partner();
$partner_id = abs(intval($_SESSION['partner_id']));
$login_partner = Table::Fetch('partner', $partner_id);

$title = strval($_GET['title']);
$condition = $t_con = array(
	'partner_id' => $partner_id,
);
if ($title) { 
	$t_con[] = "title like '%".mysql_escape_string($title)."%'";
	$teams = DB::LimitQuery('team', array(
				'condition' => $t_con,
				));
	$team_ids = Utility::GetColumn($teams, 'id');
	if ( $team_ids ) {
		$condition['team_id'] = $team_ids;
	} else { $title = null; }
}

$count = Table::Count('coupon', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 10);

$coupons = DB::LimitQuery('coupon', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$team_ids = Utility::GetColumn($coupons, 'team_id');
$teams = Table::Fetch('team', $team_ids);

$user_ids = Utility::GetColumn($coupons, 'user_id');
$users = Table::Fetch('user', $user_ids);

include template('biz_coupon');
