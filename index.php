<?php
require_once(dirname(__FILE__) . '/app.php');

if(!$INI['db']['host']) redirect( WEB_ROOT . '/install.php' );

$request_uri = 'index';
$team = current_team($city['id']);
if ($team) {
	$_GET['id'] = abs(intval($team['id']));
	die(require_once('team.php'));
}

include template('subscribe');
