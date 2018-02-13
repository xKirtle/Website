<?php
require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;
	
$MySQLi->query('DELETE FROM xdrcms_minimail WHERE SenderId != 0 AND InBin = 1 AND OwnerId = ' . USER::$Data['ID']);
$dA = true;
require HTML . 'cProxy_Minimail_trash.html';
?>