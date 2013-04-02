<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

($secret = strval($_GET['code'])) || ($secret=strval($_GET['email']));

if (empty($secret)) {
	($email = Session::Get('unemail')) || ($email = $login_user['email']);
	$wwwlink = mail_zd($email);
	die(include template('account_verify'));	
}
else if ( strpos($secret, '@') ) {
	Session::Set('unemail', $secret);
	mail_sign_email($secret);
	redirect( WEB_ROOT . '/account/verify.php');
}

$user = Table::Fetch('user', $secret, 'secret');
if ( $user ) {
	Table::UpdateCache('user', $user['id'], array(
		'enable' => 'Y',
	));
	Session::Set('notice', 'Congratulations,email has been verified.');
	ZLogin::Login($user['id']);
	redirect(get_loginpage(WEB_ROOT . '/index.php'));
}

redirect(WEB_ROOT . '/index.php');
