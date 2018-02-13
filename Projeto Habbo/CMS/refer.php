<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 

///// Variables /////
$r = $_GET['r'];
///// Terminan variables /////


///// Verificar si existe el usuario /////
$sql = mysql_query("SELECT * FROM users WHERE ip_last='".$remote_ip."'");
    if(mysql_num_rows($sql) > 0) {
header("Location: http://Habbz.biz/");
        die;
//// Termina verificar usuario /////
    }
else
{
///// Verificar si existe el referido /////
$sql = mysql_query("SELECT * FROM users_referidos WHERE ip_referida='$_SERVER[REMOTE_ADDR]'");
    if(mysql_num_rows($sql) > 0) {
header("Location: http://Habbz.biz/");
        die;
///// Termina verificar referido /////
    }
else
	{

$_SESSION['referido'] = "1";
$_SESSION['userreferido'] = $r;
header("Location: http://Habbz.biz/register");
	}
}
?>