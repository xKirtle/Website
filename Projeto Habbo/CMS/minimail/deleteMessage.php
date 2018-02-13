<?php
if(!isset($_POST['messageId'], $_POST['start'], $_POST['label'], $_POST['conversationId']))
	exit;

require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

$mCA = !is_numeric($_POST['messageId']);
$mId = str_replace('campaign-message-', '', $_POST['messageId']);
if(!is_numeric($mId))
	exit;

if($mCA):
	$MySQLi->query('DELETE FROM xdrcms_minimail WHERE Id = ' . $mId . ' AND SenderId = 0 AND InBin = 0 AND OwnerId = ' . USER::$Data['ID']);
else:
	if($_POST['label'] === 'trash')
		$MySQLi->query('DELETE FROM xdrcms_minimail WHERE Id = ' . $mId . ' AND SenderId != 0 AND InBin = 1 AND OwnerId = ' . USER::$Data['ID']);
	elseif($_POST['label'] === 'sent')
		$MySQLi->query('DELETE FROM xdrcms_minimail WHERE Id = ' . $mId . ' AND SenderId = ' . USER::$Data['ID'] . ' AND InBin = 0 AND OwnerId = ' . USER::$Data['ID']);
	else
		$MySQLi->query('UPDATE xdrcms_minimail SET InBin = 1, IsReaded = 1 WHERE Id = ' . $mId . ' AND SenderId != 0 AND OwnerId = ' . USER::$Data['ID']);
endif;

if($mCA)
	$mDC = true;
else
	$mTB = true;
if($_POST['label'] === 'trash')
	require HTML . 'cProxy_Minimail_trash.html';
elseif($_POST['label'] === 'sent')
	require HTML . 'cProxy_Minimail_sent.html';
else
	require HTML . 'cProxy_Minimail_inbox.html';
?>