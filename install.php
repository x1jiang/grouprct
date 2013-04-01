<?php
require_once( dirname(__FILE__) . '/include/application.php');
header('Content-Type: text/html; charset=UTF-8;'); 
Session::Init();

$writeable['c'] = is_writable(dirname(__FILE__) . '/include/configure/');
$writeable['d'] = is_writable(dirname(__FILE__) . '/include/data/');
$writeable['t'] = is_writable(dirname(__FILE__) . '/static/team/');
$writeable['u'] = is_writable(dirname(__FILE__) . '/static/user/');

if (is_get() ) {
	$db = array(
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'name' => 'zuitu_db',
	);
	if (!is_writable(DIR_COMPILED)) {
		die( 'include/compiled/  - Directory must be writeable！');
	}
	die(include template('install_step'));
}
$db = $_POST['db'];
$m = mysql_connect($db['host'], $db['user'], $db['pass']);

if (!$writeable['c']) {
	Session::Set('error', 'include/configure/ not writeable');
	redirect('install.php');
}

if (!$writeable['d']) {
	Session::Set('error', 'include/data/ not writeable');
	redirect('install.php');
}

if (!$writeable['t']) {
	Session::Set('error', 'static/team/ not writeable');
	redirect('install.php');
}

if (!$writeable['u']) {
	Session::Set('error', 'static/user/ not writeable');
	redirect('install.php');
}

if ( !$m ) {
	Session::Set('error', 'Wrong database configuration.');
	redirect('install.php');
}

if ( !mysql_select_db($db['name'], $m) 
		&& !mysql_query("CREATE database `{$db['name']}`;", $m) ) {
	Session::Set('error', "Choose database {$db['name']} wrong，not exist?");
	redirect('install.php');
}
mysql_select_db($db['name'], $m);

$dir = dirname(__FILE__);
$sql = '';
$f = file($dir . '/include/configure/db.sql');
foreach($f AS $l) {
	if ( strpos(trim($l), '--')===0 || strpos(trim($l), '/*') === 0 || !trim($l)) {
		continue;
	}
	$sql .= $l;
}

mysql_query("SET names UTF8;");
$sqls = explode(';', $sql);

foreach($sqls AS $sql) {
	mysql_query($sql, $m);
}

$PHP = array(
	'db' => $db,
);
if ( write_php_file($PHP, SYS_PHPFILE) ) {
	Session::Set('notice', 'Succeed to install OGO script,please remove file:install.php.');
}
redirect('index.php');
