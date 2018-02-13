<?php
require '../../KERNEL-XDRCMS/Init.php';
if(!USER::$LOGGED)
	exit;

header('Content-Type: application/json;charset=UTF-8');
$a = [];
$q = $MySQLi->query('SELECT users.id, users.username FROM users, messenger_friendships WHERE (messenger_friendships.user_one_id = ' . USER::$Data['ID'] . ' AND users.id = messenger_friendships.user_two_id) OR (messenger_friendships.user_two_id = ' . USER::$Data['ID'] . ' AND users.id = messenger_friendships.user_one_id)');
if(!$q || $q->num_rows === 0):
	echo json_encode($a);
	exit;
endif;

while($uR = $q->fetch_assoc()):
	$_SESSION['Security']['Friends'][$uR['id']] = true;
	$a[] = ['id' => $uR['id'], 'name' => $uR['username']];
endwhile;

echo json_encode($a);
?>