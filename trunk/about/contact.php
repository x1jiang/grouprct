<?php
/*
 * how to contact the webmaster,here,it's proving the content
 * author: fenghaidongchina@gmail.com
 */
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', 'about_contact');
include template('about_contact');
