<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));
$v = strval($_GET['v']);


if ( 'sms' == $action ) {
	$mobile = $v;
	$html = render('manage_ajax_dialog_miscsms');
	json($html, 'dialog');
}
else if( 'smssend' == $action ) {
	$mobile = $v;
	$content = strval($_GET['content']);
	if ( true=== ($ret = sms_send($mobile, $content))  ) {
		json('call_succ();', 'eval');
	}
	json('call_fail("'.$ret.'");', 'eval');
}
else if ( 'link' == $action ) {
	if ($id) $link = Table::Fetch('friendlink', $id);
	$html = render('manage_ajax_dialog_misclink');
	json($html, 'dialog');
}
else if ( 'linkremove' == $action ) {
	if ($id) $link = Table::Fetch('friendlink', $id);
	if (!$link) json('Wrong input information.', 'alert');
	Table::Delete('friendlink', $id);
	Session::Set('notice', 'Succeed to delete link.');
	json(null, 'refresh');
}
