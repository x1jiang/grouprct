<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_login();

$money = abs(intval($_GET['money']));
if (!$money) $money = '';

if($INI['alipay']['mid']) {
	$ordercheck['alipay'] = 'checked';
}
else if($INI['chinabank']['mid']) {
	$ordercheck['chinabank'] = 'checked';
}
else if($INI['tenpay']['mid']) {
	$ordercheck['tenpay'] = 'checked';
}

include template('credit_charge');
