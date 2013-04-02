<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

need_manager();

$action = strval($_GET['action']);
$id = $topic_id = abs(intval($_GET['id']));
$topic = Table::Fetch('topic', $id);
$pid = abs(intval($topic['parent_id']));

if (!$topic || !$id) {
	json('Topic not exist.', 'alert');
}
elseif ( $action == 'topicremove') {
	if ( $pid==0 ) {
		Table::Delete('topic', $id);
		Table::Delete('topic', $id, 'parent_id');
	} else {
		Table::Delete('topic', $id);
		Table::UpdateCache('topic', $pid, array(
			'reply_number' => Table::Count('topic', array('parent_id' => $pid) ),
		));
	}
	Session::Set('notice', 'Succeed to delete topic.');
	json(null, 'refresh');
}
elseif ( $action == 'topichead' ) {
	if ( $topic['parent_id']>0 ) {
		json('Only main topic can be set to top.', 'alert');
	}
	$head = ($topic['head']==0) ? time() : 0;
	Table::UpdateCache('topic', $id, array( 'head' => $head,));
	$tip = $head ? 'Succeed to set top' : 'Cancel set top';
	Session::Set('notice', $tip);
	json(null, 'refresh');
}
