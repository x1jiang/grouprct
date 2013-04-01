<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
$condition = array();

/* filter */
$ptitle = strval($_GET['ptitle']);
if ($ptitle ) {
	$condition[] = "title LIKE '%".mysql_escape_string($ptitle)."%'";
}
/* filter end */

$count = Table::Count('partner', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$partners = DB::LimitQuery('partner', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

include template('manage_partner_index');
