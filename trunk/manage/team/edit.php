<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);
$id = abs(intval($_GET['id']));
if (!$id || !$team = Table::Fetch('team', $id)) {
	Utility::Redirect( WEB_ROOT . '/team/create.php');
}

if ($_POST) {
	$insert = array(
		'title', 'market_price', 'team_price', 'end_time', 'begin_time', 'expire_time', 'min_number', 'max_number', 'summary', 'notice', 'per_number',
		'product', 'image',  'detail', 'userreview', 'systemreview', 'image1', 'image2', 'flv', 'card', 'conduser',
		'delivery', 'mobile', 'address', 'fare', 'express', 'credit',
		'user_id', 'city_id', 'group_id', 'partner_id', 
	/**********add by fenghaidongchina@gmail.com********************/
	   'buyonce',
	/**********above code is for buyonce feature********************/
		);
	$table = new Table('team', $_POST);
	$table->SetStrip('detail', 'systemreview', 'notice');
	$table->begin_time = strtotime($_POST['begin_time']);
	$table->city_id = abs(intval($table->city_id));
	$table->end_time = strtotime($_POST['end_time']);
	$table->expire_time = strtotime($_POST['expire_time']);
	$table->image = upload_image('upload_image', $team['image'], 'team');
	$table->image1 = upload_image('upload_image1',$team['image1'],'team');
	$table->image2 = upload_image('upload_image2',$team['image2'],'team');
    /****add by fenghaidongchina@gmail.com for buyonce***/
	$table->buyonce = $_POST['buyonce']; 
	/***above code is to fix buyonce bug***************/
	
	$error_tip = array();
	if ( !$error_tip)  {
		if ( $table->update($insert) ) {

			$field = strtoupper($table->conduser)=='Y' ? null : 'quantity';
			$now_number = Table::Count('order', array(
						'team_id' => $table->id,
						'state' => 'pay',
						), $field);
			Table::UpdateCache('team', $table->id, array(
				'now_number' => $now_number,
			));

			Session::Set('notice', 'Modify group-buy info successfully.');
			Utility::Redirect( WEB_ROOT. "/manage/team/edit.php?id={$team['id']}");
		} else {
			Session::Set('error', 'Modify group-buy info fail,check environment info?');
		}
	}
}

$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');

$partners = DB::LimitQuery('partner', array(
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
include template('manage_team_edit');
