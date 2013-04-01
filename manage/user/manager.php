<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();

/* build condition */
$condition = array('manager'=>'Y',);
$count = Table::Count('user', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$users = DB::LimitQuery('user', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_user_manager');
