<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$title = strval($_GET['title']);

$condition = array(
	'team_id > 0',
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

$count = Table::Count('ask', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$asks = DB::LimitQuery('ask', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$user_ids = Utility::GetColumn($asks, 'user_id');
$team_ids = Utility::GetColumn($asks, 'team_id');

$users = Table::Fetch('user', $user_ids);
$teams = Table::Fetch('team', $team_ids);

include template('manage_misc_ask');
