<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager(true);
$template_id = trim(strval($_GET['id']));
$template_id = str_replace('\\', '_', $template_id);
$template_id = str_replace('/', '_', $template_id);

if ( $_POST ) {
	$path = DIR_TEMPLATE .'/' . $template_id;
	if(is_writable($path) && !is_dir($path) && is_file($path)) {
		$flag = file_put_contents($path, stripslashes(trim($_POST['content'])));
	}
	if ( $flag ) {
		Session::Set('notice', "template {$template_id} modify succeed.");
	} else {
		Session::Set('error', "template {$template_id} modify failed.");
	}
	redirect(WEB_ROOT . "/manage/system/template.php?id={$template_id}");
}

$temps = scandir(DIR_TEMPLATE);
$may = array();
foreach($temps AS $one) {
	if(is_dir(DIR_TEMPLATE . '/' .$one)) continue;
	if(!is_writable(DIR_TEMPLATE . '/' .$one)) continue;
	$may[] = $one;
}
$may = array_combine($may, $may);

if ($template_id && file_exists(DIR_TEMPLATE .'/' . $template_id)) {
	$content = trim(file_get_contents( DIR_TEMPLATE .'/'.$template_id ));
} else {
	$template_id = null;
}

include template('manage_system_template');
