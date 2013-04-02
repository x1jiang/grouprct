<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();
need_auth(option_yes('navforum'));

$condition = array( 
		'city_id' => $city['id'],
		'team_id' => 0,
		'parent_id' => 0,
		);

$topics = DB::LimitQuery('topic', array(
			'condition' => $condition,
			'order' => 'ORDER BY head DESC, last_time DESC',
			));
$user_ids = Utility::GetColumn($topics, 'user_id');
$users = Table::Fetch('user', $user_ids);

include template('forum_city');
