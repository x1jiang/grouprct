<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$now = time();
$condition = array(
	'system' => 'Y',
	"end_time > {$now}",
);
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));
$cities = Table::Fetch('category', Utility::GetColumn($teams, 'city_id'));
$groups = Table::Fetch('category', Utility::GetColumn($teams, 'group_id'));

$selector = 'index';
include template('manage_team_index');
