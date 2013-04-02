<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$action = strval($_GET['action']);
$cid = strval($_GET['id']);
$sec = strval($_GET['secret']);

if ($action == 'needlogin') {
	$html = render('ajax_dialog_needlogin');
	json($html, 'dialog');
}
