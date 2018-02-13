<?php
if(!isset($_POST['label']))
	exit;

require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

if($_POST['label'] == 'inbox')
	require HTML . 'cProxy_Minimail_inbox.html';
elseif($_POST['label'] == 'sent')
	require HTML . 'cProxy_Minimail_sent.html';
elseif($_POST['label'] == 'trash')
	require HTML . 'cProxy_Minimail_trash.html';
elseif($_POST['label'] == 'conversation')
	require HTML . 'cProxy_Minimail_conversation.html';
?>