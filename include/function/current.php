<?php
function current_frontend() {
	global $INI;
	$a = array(
			'/index.php' => 'Today',
			'/team/index.php' => 'History',
			'/help/tour.php' => 'Our' . $INI['system']['abbreviation'],
			'/subscribe.php' => 'Subscribe',
			);
	if (option_yes('navforum')) {
		unset($a['/subscribe.php']);
		$a['/forum/index.php'] = 'Forum';
	}
	$r = $_SERVER['REQUEST_URI'];
	if (preg_match('#/team#',$r)) $l = '/team/index.php';
	elseif (preg_match('#/help#',$r)) $l = '/help/tour.php';
	elseif (preg_match('#/subscribe#',$r)) $l = '/subscribe.php';
	else $l = '/index.php';
	return current_link(null, $a);
}

function current_backend() {
	global $INI;
	$a = array(
			'/manage/misc/index.php' => 'Home',
			'/manage/team/index.php' => 'Group',
			'/manage/order/index.php' => 'Order',
			'/manage/coupon/index.php' => $INI['system']['couponname'],
			'/manage/user/index.php' => 'User',
			'/manage/partner/index.php' => 'Merchant',
			'/manage/market/index.php' => 'Promotion',
			'/manage/category/index.php' => 'Category',
			'/manage/system/index.php' => 'Configuration',
			);
	$r = $_SERVER['REQUEST_URI'];
	if (preg_match('#/manage/(\w+)/#',$r, $m)) {
		$l = "/manage/{$m[1]}/index.php";
	} else $l = '/manage/misc/index.php';
	return current_link($l, $a);
}

function current_biz() {
	global $INI;
	$a = array(
			'/biz/index.php' => 'Home',
			'/biz/settings.php' => 'Merchant info',
			'/biz/coupon.php' => $INI['system']['couponname'] . ' list',
			);
	$r = $_SERVER['REQUEST_URI'];
	if (preg_match('#/biz/coupon#',$r)) $l = '/biz/coupon.php';
	elseif (preg_match('#/biz/settings#',$r)) $l = '/biz/settings.php';
	else $l = '/biz/index.php';
	return current_link($l, $a);
}

function current_forum($selector='index') {
	global $city;
	$a = array(
			'/forum/index.php' => 'All',
			'/forum/city.php' => "{$city['name']} area",
			'/forum/public.php' => 'public area',
			);
	if (!$city) unset($a['/forum/city.php']);
	$l = "/forum/{$selector}.php";
	return current_link($l, $a, true);
}

function current_city($cename, $citys) {
	$link = "/city.php?ename={$cename}";
	$links = array();
	foreach($citys AS $city) {
		$links["/city.php?ename={$city['ename']}"] = $city['name'];
	}
	return current_link($link, $links);
}

function current_coupon_sub($selector='index') {
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/coupon/index.php' => 'unused',
		'/coupon/consume.php' => 'used',
		'/coupon/expire.php' => 'expired',
	);
	$l = "/coupon/{$selector}.php";
	return current_link($l, $a);
}

function current_account($selector='/account/settings.php') {
	global $INI;
	$a = array(
		'/order/index.php' => 'My orders',
		'/coupon/index.php' => 'My ' . $INI['system']['couponname'],
		'/credit/index.php' => 'My account',
		'/account/settings.php' => 'Account info',
	);
	return current_link($selector, $a, true);
}

function current_about($selector='us') {
	global $INI;
	$a = array(
		'/about/us.php' => 'About ' . $INI['system']['abbreviation'],
		'/about/contact.php' => 'Contact',
		'/about/job.php' => 'Jobs',
		'/about/privacy.php' => 'Disclaimer',
		'/about/terms.php' => 'Rules',
	);
	$l = "/about/{$selector}.php";
	return current_link($l, $a, true);
}

function current_help($selector='faqs') {
	global $INI;
	$a = array(
		'/help/tour.php' => 'Our' . $INI['system']['abbreviation'],
		'/help/faqs.php' => 'FAQs',
		'/help/zuitu.php' => 'What '.$INI['system']['abbreviation'] . '?',
	);
	$l = "/help/{$selector}.php";
	return current_link($l, $a, true);
}

function current_order_index($selector='index') {
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/order/index.php?s=index' => 'All',
		'/order/index.php?s=unpay' => 'unpay',
		'/order/index.php?s=pay' => 'pay',
	);
	$l = "/order/index.php?s={$selector}";
	return current_link($l, $a);
}

function current_link($link, $links, $span=false) {
	$html = '';
	$span = $span ? '<span></span>' : '';
	foreach($links AS $l=>$n) {
		if (trim($l,'/')==trim($link,'/')) {
			$html .= "<li class=\"current\"><a href=\"{$l}\">{$n}</a>{$span}</li>";
		}
		else $html .= "<li><a href=\"{$l}\">{$n}</a>{$span}</li>";
	}
	return $html;
}

/* manage current */
function mcurrent_misc($selector=null) {
	$a = array(
		'/manage/misc/index.php' => 'Home',
		'/manage/misc/ask.php' => 'FAQs',
		'/manage/misc/feedback.php' => 'Feedbacks',
		'/manage/misc/smssubscribe.php' => 'Subscribe',
		'/manage/misc/subscribe.php' => 'Subscribe',
		'/manage/misc/invite.php' => 'Invitation',
		'/manage/misc/link.php' => 'Links',
		'/manage/misc/money.php' => 'Finance',
	);
	$l = "/manage/misc/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_misc_money($selector=null){
	$selector = $selector ? $selector : 'store';
	$a = array(
		'/manage/misc/money.php?s=store' => 'Charge online',
		'/manage/misc/money.php?s=charge' => 'Charge offline',
		'/manage/misc/money.php?s=withdraw' => 'Withdraw',
		'/manage/misc/money.php?s=cash' => 'Cash',
		'/manage/misc/money.php?s=refund' => 'Rufund',
	);
	$l = "/manage/misc/money.php?s={$selector}";
	return current_link($l, $a);
}

function mcurrent_misc_invite($selector=null){
	$selector = $selector ? $selector : 'index';
	$a = array(
		'/manage/misc/invite.php?s=index' => 'invitations',
		'/manage/misc/invite.php?s=record' => 'pays',
	);
	$l = "/manage/misc/invite.php?s={$selector}";
	return current_link($l, $a);
}
function mcurrent_order($selector=null) {
	$a = array(
		'/manage/order/index.php' => 'ongoing',
		'/manage/order/pay.php' => 'pay',
		'/manage/order/unpay.php' => 'unpay',
	);
	$l = "/manage/order/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_user($selector=null) {
	$a = array(
		'/manage/user/index.php' => 'user list',
		'/manage/user/manager.php' => 'admin list',
	);
	$l = "/manage/user/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_team($selector=null) {
	$a = array(
		'/manage/team/index.php' => 'ongoing',
		'/manage/team/success.php' => 'success',
		'/manage/team/failure.php' => 'fail',
		'/manage/team/create.php' => 'create buy',
	);
	$l = "/manage/team/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_feedback($selector=null) {
	$a = array(
		'/manage/feedback/index.php' => 'index',
	);
	$l = "/manage/feedback/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_coupon($selector=null) {
	$a = array(
		'/manage/coupon/index.php' => 'uncomsumed',
		'/manage/coupon/consume.php' => 'consumed',
		'/manage/coupon/expire.php' => 'expired',
		'/manage/coupon/card.php' => 'coupon',
		'/manage/coupon/cardcreate.php' => 'create coupon',
	);
	$l = "/manage/coupon/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_category($selector=null) {
	$zones = get_zones();
	$a = array();
	foreach( $zones AS $z=>$o ) {
		$a['/manage/category/index.php?zone='.$z] = $o;
	}
	$l = "/manage/category/index.php?zone={$selector}";
	return current_link($l,$a,true);
}
function mcurrent_partner($selector=null) {
	$a = array(
		'/manage/partner/index.php' => 'merchant list',
		'/manage/partner/create.php' => 'create merchant',
	);
	$l = "/manage/partner/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_market($selector=null) {
	$a = array(
		'/manage/market/index.php' => 'email promotion',
		'/manage/market/sms.php' => 'SMS promotion',
		'/manage/market/down.php' => 'data download',
	);
	$l = "/manage/market/{$selector}.php";
	return current_link($l,$a,true);
}
function mcurrent_market_down($selector=null) {
	$a = array(
		'/manage/market/down.php' => 'mobile numbers',
		'/manage/market/downemail.php' => 'emails',
		'/manage/market/downorder.php' => 'orders',
		'/manage/market/downcoupon.php' => 'coupons',
		'/manage/market/downuser.php' => 'users',
	);
	$l = "/manage/market/{$selector}.php";
	return current_link($l,$a,true);
}

function mcurrent_system($selector=null) {
	$a = array(
		'/manage/system/index.php' => 'index',
		'/manage/system/option.php' => 'option',
		'/manage/system/bulletin.php' => 'bulletin',
		'/manage/system/pay.php' => 'pay',
		'/manage/system/email.php' => 'email',
		'/manage/system/sms.php' => 'sms',
		'/manage/system/city.php' => 'city',
		'/manage/system/page.php' => 'page',
		'/manage/system/cache.php' => 'cache',
		'/manage/system/skin.php' => 'skin',
		'/manage/system/template.php' => 'template',
		'/manage/system/upgrade.php' => 'upgrade',
	);
	$l = "/manage/system/{$selector}.php";
	return current_link($l,$a,true);
}
