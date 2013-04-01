<?php
function mail_custom($emails=array(), $subject, $message) {
	global $INI;
	settype($emails, 'array');

	$options = array(
		'contentType' => 'text/html',
		'encoding' => 'UTF-8',
	);

	$from = $INI['mail']['from'];
	$to = array_shift($emails);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options, $emails);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options, $emails);
	}
}

function mail_sign($user) {
	global $INI;
	if ( empty($user) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array( 'user' => $user,);
	$message = render('mail_sign_verify', $vars);
	$subject = 'Thanks,'.$INI['system']['sitename'].'，please verify Email to get more service';

	$options = array(
		'contentType' => 'text/html',
		'encoding' => 'UTF-8',
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

function mail_sign_id($id) {
	$user = Table::Fetch('user', $id);
	mail_sign($user);
}

function mail_sign_email($email) {
	$user = Table::Fetch('user', $email, 'email');
	mail_sign($user);
}

function mail_repass($user) {
	global $INI;
	if ( empty($user) ) return true;
	$from = $INI['mail']['from'];
	$to = $user['email'];

	$vars = array( 'user' => $user,);
	$message = render('mail_repass', $vars);
	$subject = $INI['system']['sitename'] . 'Reset password.';

	$options = array(
		'contentType' => 'text/html',
		'encoding' => 'UTF-8',
	);
	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

function mail_subscribe($city, $team, $partner, $subscribe) 
{
	global $INI;
	$week = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
	$today = date('Y-n-j') . $week[date('w')];
	$vars = array(
		'today' => $today,
		'team' => $team,
		'city' => $city,
		'subscribe' => $subscribe,
		'partner' => $partner,
		'help_email' => $INI['subscribe']['helpemail'],
		'help_mobile' => $INI['subscribe']['helpphone'],
		'notice_email' => $INI['mail']['reply'],
	);
	$message = render('mail_subscribe_team', $vars);
	$options = array(
		'contentType' => 'text/html',
		'encoding' => 'UTF-8',
	);
	$from = $INI['mail']['from'];
	$to = $subscribe['email'];
	$subject = $INI['system']['sitename'] . "today's group buy：{$team['title']}";

	if ($INI['mail']['mail']=='mail') {
		Mailer::SendMail($from, $to, $subject, $message, $options);
	} else {
		Mailer::SmtpMail($from, $to, $subject, $message, $options);
	}
}

function mail_invitation($emails, $content, $name) {
	global $INI;
	if(empty($emails)) return;

	$emails = preg_split('/[\s,]+/', $emails, -1, PREG_SPLIT_NO_EMPTY);
	$subject = "You friend [{$name}] invites you to join into {$INI['system']['sitename']}";
	$vars = array( 
			'name' => $name,
			'content' => $content,
			);
	$message = render('mail_invite', $vars);

	$step = ceil(count($emails)/20);
	for($i=0; $i<$step; $i++) {
		$offset = $i * 20;
		$tos = array_slice($emails, $offset, 20);
		mail_custom($tos, $subject, $message);
	}
	return true;
}
