<?php
function get_city($ip=null) {
	global $INI;
	$cities = option_category('city');
	$ip = ($ip) ? $ip : Utility::GetRemoteIP();
	$url = "http://open.baidu.com/ipsearch/s?wd={$ip}&tn=baiduip";
	$res = mb_convert_encoding(Utility::HttpRequest($url), 'UTF-8', 'GBK');
	if ( preg_match('#from：<b>(.+)</b>#Ui', $res, $m) ) {
		foreach( $cities AS $cid=>$cname) {
			if ( FALSE !== strpos($m[1], $cname) ) {
				return Table::Fetch('category', $cid);
			}
		}
	}
	return array();
}

function mail_zd($email) {
	global $option_mail;
	if ( ! Utility::ValidEmail($email) ) return false;
	preg_match('#@(.+)$#', $email, $m);
	$suffix = strtolower($m[1]);
	return $option_mail[$suffix];
}

global $option_gender;
$option_gender = array(
		'M' => 'Male',
		'F' => 'Female',
		);
global $option_pay;
$option_pay = array(
		'pay' => 'pay',
		'unpay' => 'unpay',
		);
global $option_service;
$option_service = array(
		'alipay' => 'alipay',
		'tenpay' => 'tenpay',
		'chinabank' => 'chinabank',
		'cash' => 'cash',
		'credit' => 'credit', //余款支付
		'other' => 'other',
		);
global $option_delivery;
$option_delivery = array(
		'express' => 'express',
		'coupon' => 'coupon',
		'pickup' => 'pickup',
		);
global $option_flow;
$option_flow = array(
		'buy' => 'buy',
		'invite' => 'invite',
		'store' => 'store',
		'withdraw' => 'withdrea',
		'coupon' => 'coupon',
		'refund' => 'refund',
		'register' => 'register',
		'charge' => 'charge',
		);
global $option_mail;
$option_mail = array(
		'gmail.com' => 'https://mail.google.com/',
		'163.com' => 'http://mail.163.com/',
		'126.com' => 'http://mail.126.com/',
		'qq.com' => 'http://mail.qq.com/',
		'sina.com' => 'http://mail.sina.com/',
		'sohu.com' => 'http://mail.sohu.com/',
		'yahoo.com.cn' => 'http://mail.yahoo.com.cn/',
		'yahoo.com' => 'http://mail.yahoo.com/',
		);
global $option_cond;
$option_cond= array(
		'Y' => 'total buyers',
		'N' => 'total sales',
		);
global $option_buyonce;
$option_buyonce = array(
		'Y' => 'buy once',
		'N' => 'buy again',
		);
global $option_yn;
$option_yn = array(
		'Y' => 'Yes',
		'N' => 'No',
		);
