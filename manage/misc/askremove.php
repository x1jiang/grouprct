<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$id = abs(intval($_GET['id']));
Table::Delete('ask', $id);
Session::Set('notice', "Succeed to delete.");
redirect(udecode($_GET['r']));
