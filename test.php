<?php
	require_once(dirname(__FILE__) . '/app.php');
 

	$cities = DB::LimitQuery('category', array(
	'condition' => array( 'zone' => 'city') ,
));

	print_r($INI) ; 
	print_r($cities);
 	$request_uri = 'index';
	$team = current_team($city['id']);
	print_r($currency ) ;
	print_r($login_user_id) ;
	print_r($login_user );
	print_r($city );
	print_r($hotcities );

 	$count = Table::Count('card', $noCondition);
 	$coupons = DB::LimitQuery('card', $noCondition);
  	$id=100;
  
  
  
	$condition = array( 
		'user_id' =>1, 
		'credit > 0',
		'pay' => 'Y',
		);
	$money = Table::Count('invite', $condition, 'credit');
	$count = Table::Count('invite', $condition);
  ?>