<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);

if ($_POST) {
	$team = $_POST;
	$insert = array(
		'title', 'market_price', 'team_price', 'end_time', 'begin_time', 'expire_time', 'min_number', 'max_number', 'summary', 'notice', 'conduser', 'per_number',
		'product', 'image', 'detail', 'userreview', 'systemreview', 'image1', 'image2', 'flv', 'card',
		'mobile', 'address', 'fare', 'express', 'delivery', 'credit',
		'user_id', 'state', 'city_id', 'group_id', 'partner_id',
		'buyonce'); /*******here fix bug20 ,buyonce and buy again feature is now working******/ 
		            /**author:fenghaidongchina@gmail.com***********************/
	$team['user_id'] = $login_user_id;
	$team['state'] = 'none';
	$team['begin_time'] = strtotime($team['begin_time']);
	$team['city_id'] = abs(intval($team['city_id']));
	$team['end_time'] = strtotime($team['end_time']);
	$team['expire_time'] = strtotime($team['expire_time']);
	$team['image'] = upload_image('upload_image', null, 'team');
	$team['image1'] = upload_image('upload_image1', null, 'team');
	$team['image2'] = upload_image('upload_image2', null, 'team');
	$table = new Table('team', $team);
	$table->SetStrip('detail', 'systemreview', 'notice');
	if ( $team_id = $table->insert($insert) ) {
		Utility::Redirect( WEB_ROOT . "/manage/team/index.php");
	}
}
else {
	$profile = Table::Fetch('leader', $login_user_id, 'user_id');
	//1
	$team = array();
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+1 days');
	$team['end_time'] = strtotime('+2 days'); 
	$team['expire_time'] = strtotime('+3 months +1 days');
	$team['min_number'] = 10;
	$team['per_number'] = 1;
	$team['market_price'] = 1;
	$team['team_price'] = 1;
	//3
	$team['delivery'] = 'coupon';
	$team['address'] = $profile['address'];
	$team['mobile'] = $profile['mobile'];
	$team['fare'] = 5;
	$team['conduser'] = $INI['system']['conduser'] ? 'Y' : 'N';
}

$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');

$partners = DB::LimitQuery('partner', array(
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
$selector = 'create';
include template('manage_team_create');
