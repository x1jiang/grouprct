<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$n = strval($_GET['n']);
$v = strval($_GET['v']);

if ( 'signupemail' == $n ) {
	$u = Table::Fetch('user', $v, 'email');
	if ( $u ) Output::Json(null, 1);
	Output::Json(0);
}
elseif ( 'signupname' == $n ) {
	$u = Table::Fetch('user', $v, 'username');
	if ( $u ) Output::Json(null, 1);
	Output::Json(0);
}
