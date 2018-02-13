<?php
if(!isset($_POST['recipientIds'], $_POST['subject'], $_POST['body']) || strlen($_POST['subject']) > 20 || strlen($_POST['body']) > 4096)
	if(!isset($_POST['messageId'], $_POST['body']) || strlen($_POST['body'] > 4096))
		exit;

require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

$a = [];
$mId = (isset($_POST['messageId'])) ? $_POST['messageId'] : 0;
$Re = (isset($_POST['messageId'])) ? '' : $_POST['recipientIds'];
$Ti = (isset($_POST['messageId'])) ? '' : $_POST['subject'];
$Si = (isset($_POST['messageId'])) ? 0 : USER::$Data['ID'];

if(isset($_POST['messageId'])):
	$q = $MySQLi->query('SELECT ToIds, Title, SenderId, RelatedId FROM xdrcms_minimail WHERE Id = ' . $mId . ' AND OwnerId = ' . USER::$Data['ID']);
	if(!$q || $q->num_rows !== 1)	exit;
	$q = $q->fetch_assoc();
	$Re = $q['ToIds'];
	$Ti = $q['Title'];
	$Si = $q['SenderId'];
	$a = (is_numeric($Re)) ? [$Re] : explode(',', $Re);
	if(!in_array($q['SenderId'], $a))
		$a[] = $q['SenderId'];
	$a = array_diff($a, [USER::$Data['ID']]);
	$Re = '';

	foreach($a as $R)
		$Re .= $R . ',';
	$Re = substr($Re, 0, -1);
	$mId = $q['RelatedId'];

	goto salt;
endif;

if(is_numeric($Re) && isset($_SESSION['Security']['Friends'][$_POST['recipientIds']])):
	$a = [$_POST['recipientIds']];
elseif(strstr(',', $_POST['recipientIds'])):
	$a = explode(',', $_POST['recipientIds']);

	foreach($a as $R):
		if(!is_numeric($R) || !isset($_SESSION['Security']['Friends'][$R])):
			require HTML . 'cProxy_Minimail_inbox.html';
			exit;
		endif;
	endforeach;
else:
	require HTML . 'cProxy_Minimail_inbox.html';
	exit;
endif;

salt:
if(count($a) > 50):
	$sM = true;
	require HTML . 'cProxy_Minimail_inbox.html';

	exit;
endif;

$q = $MySQLi->query('INSERT INTO xdrcms_minimail (OwnerId, SenderId, ToIds, Title, Message, Created, RelatedId) VALUES (' . USER::$Data['ID'] . ', ' . USER::$Data['ID'] . ', \'' . $Re . '\', \'' . $Ti . '\', \'' . $_POST['body'] . '\', ' . time() . ', ' . $mId . ')');
if($mId === 0):
	$mId = $MySQLi->insert_id;
	$MySQLi->query('UPDATE xdrcms_minimail SET RelatedId = ' . $mId . ' WHERE Id = ' . $mId);
endif;

foreach($a as $R)
	$MySQLi->query('INSERT INTO xdrcms_minimail (OwnerId, SenderId, ToIds, Title, Message, Created, RelatedId) VALUES (' . $R . ', ' . USER::$Data['ID'] . ', \'' . $Re . '\', \'' . $Ti. '\', \'' . $_POST['body'] . '\', ' . time() . ', ' . $mId . ')');

$sM = true;
require HTML . 'cProxy_Minimail_inbox.html';
?>