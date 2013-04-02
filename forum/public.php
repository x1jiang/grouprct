<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();
need_auth(option_yes('navforum'));

$publics = option_category('public');

$id = abs(intval($_GET['id']));
$condition = array( 'parent_id' => 0, );

if ( $id && $public = Table::Fetch('category', $id) ){ 
	$condition['public_id'] = $id;
} else if ($id) {
	redirect( WEB_ROOT . '/forum/public.php');	
} else {
	$condition[] = 'public_id > 0';
}

$topics = DB::LimitQuery('topic', array(
			'condition' => $condition,
			'order' => 'ORDER BY head DESC, last_time DESC',
			));
$user_ids = Utility::GetColumn($topics, 'user_id');
$users = Table::Fetch('user', $user_ids);
$public = Table::Fetch('category', $id);

include template('forum_public');
