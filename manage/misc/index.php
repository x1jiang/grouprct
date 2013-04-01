<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$daytime = strtotime(date('Y-m-d'));

$team_count = Table::Count('team');
$order_count = Table::Count('order');
$user_count = Table::Count('user');
$subscribe_count = Table::Count('subscribe');

$order_today_count = Table::Count('order', array(
	"create_time > {$daytime}",
));

$user_today_count = Table::Count('user', array(
	"create_time > {$daytime}",
));

include template('manage_misc_index');
