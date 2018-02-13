<?php
if(!isset($_POST['messageId'], $_POST['start'], $_POST['label']) || !is_numeric($_POST['messageId']))
	exit;

require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

$MySQLi->query('UPDATE xdrcms_minimail SET InBin = 0, IsReaded = 1 WHERE Id = ' . $_POST['messageId'] . ' AND SenderId != 0 AND OwnerId = ' . USER::$Data['ID']);

$uM = true;
require HTML . 'cProxy_Minimail_trash.html';
?>