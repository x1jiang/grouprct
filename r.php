<?php
require_once(dirname(__FILE__) . '/app.php');

$id = abs(intval($_GET['r']));
if ($id) { 
	cookieset('_rid', $id);
}
redirect( WEB_ROOT  . '/index.php');
