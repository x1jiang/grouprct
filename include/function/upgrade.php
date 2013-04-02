<?php
/*
 * here for upgrade the database and group buy script,firstly upgrade database
 * author: fenghaidongchina@gmail.com
 */
function zuitu_action($action, $version='V1.0') {
	global $INI;
	$user = $INI['sms']['user'];
	$host = strtolower(strval($_SERVER['HTTP_HOST']));
	$url = "http://notice.zuitu.com/version.php?action={$action}&version={$version}&user={$user}&host={$host}";
	$r = Utility::HttpRequest($url);
	return json_decode($r, true);
}

function zuitu_upgrade($action, $version='V1.0') {
	$result = zuitu_action($action, $version);
	if (is_array($result) && 'db'==$action) {
		foreach($result As $onesql) {
			$r = DB::Query($onesql);
		}
		return true;
	}
	return $result;
}

function zuitu_version() {
	return zuitu_action('version');
}
